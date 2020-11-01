<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    // view the categories section

    public function view_category()
    {
        $categories = Category::get();
        return view('Back-End.Category.view_category', compact('categories'));
    }

    // add page for categories
    public function add_category()
    {
        $levels = Category::where(['parent_id' => 0])->get();

        return view('Back-End.Category.add_categories', compact('levels'));
    }

    // add page for categories
    public function store_category(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['name_cat'])) {
                Toastr::error('Please Add The Name of Category', 'Error');
                return back();
            }
            // if the main category is doblcite must tell user not to add
            $checkMainCategory = Category::where(['Cat_name' => $data['name_cat']])->count();
            if ($checkMainCategory == 1) {
                Toastr::error('This category is Already Exist , Change the name Please', 'Error');
                return back();
            }
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            $insertCategory = new Category;
            $insertCategory->parent_id = $data['level'];
            $insertCategory->Cat_name = $data['name_cat'];
            $insertCategory->Cat_url = $data['url_cat'];
            $insertCategory->status = $status;
            $insertCategory->save();
            Toastr::success(' You Add The Category Successfully', 'Success');
            return back();
        }
    }

    // edit category
    public function Edit_category(Request $request, $id)
    {
        $Edit_category = Category::where(['id' => $id])->first();
        $sub_Cats = Category::where(['parent_id' => 0])->get();
        $level = Category::where(['id' => $Edit_category->parent_id])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['name_cat'])) {
                Toastr::error('Please Add The Name of Category', 'Error');
                return back();
            }
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where(['id' => $id])->update([
                'parent_id' => $data['level'],
                'Cat_name' => $data['name_cat'],
                'Cat_url' => $data['url_cat'],
                'status' => $status,
            ]);
            Toastr::success(' Your Category has been Updated Successfully', 'Success');
            return back();
        }
        return view('Back-End.Category.edit_category', compact('Edit_category', 'level', 'sub_Cats'));
    }

    public function delete_category($id)
    {
        if (empty($id)) {
            Toastr::error('The User is Not registered yet', 'Error');
            return back();
        } else {

            Category::where(['id' => $id])->delete();
            Toastr::success('The User has been Deleted successfully :)', 'Success');
            return back();
        }
    }
}
