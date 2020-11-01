<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    // Show the Add product page
    public function add_product()
    {
        // get all cactegories from category table and fetch the sub categories
        $showCategories = Category::with('frontCategory')->where(['parent_id' => 0])->get();
        return view('Back-End.products.add_product', compact('showCategories'));
    }

    // show the product table
    public function show_product(Request $request)
    {
        // get the products and its category detailes
        $All_product = Product::with('Category_id')->where(['status' => 1])->get();
        // detch the data from the databse
        return view('Back-End.products.view_product', compact('All_product'));
    }
    // store data from creating product from
    public function Store_product(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // validations
            //required Files
            if (empty($data['product_name']) || empty($data['product_code']) || empty($data['product_color']) || empty($data['product_price'])) {
                Toastr::error('Please Fill the Reuired Files', 'Error');
                return back();
            }
            //image validation
            if (empty($data['product_image'])) {
                Toastr::error('Image is Reuired', 'Error');
                return back();
            }
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            if ($request->hasFile('product_image')) {
                $image_tmp = $request->file('product_image');
                if ($image_tmp->isValid()) {
                    $extention = $image_tmp->clientExtension();
                    $filename = rand(1, 1000000000) . '.' . $extention;
                    $path_image_Small = 'front-images/products/Image_small/' . $filename;
                    $path_image_Midume = 'front-images/products/Image_midume/' . $filename;
                    $path_image_Larg = 'front-images/products/Image_larg/' . $filename;
                    Image::make($image_tmp)->resize(300, 300)->save($path_image_Small);
                    Image::make($image_tmp)->resize(600, 600)->save($path_image_Midume);
                    Image::make($image_tmp)->resize(900, 900)->save($path_image_Larg);
                }
            }
            $newProduct = new Product;
            $newProduct->product_id = $data['Product_id'];
            $newProduct->product_name = $data['product_name'];
            $newProduct->Description = $data['description'];
            $newProduct->price = $data['product_price'];
            $newProduct->product_color = $data['product_color'];
            $newProduct->product_code = $data['product_code'];
            $newProduct->status = $status;
            $newProduct->product_image = $filename;
            $newProduct->save();
            Toastr::success('Your Product has been inserted Successfully', 'Success');
            return back();
        }
    }

    public function Edit_product(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            //check the comes data....
            if (empty($data['product_name']) || empty($data['product_code']) || empty($data['product_color']) || empty($data['product_price'])) {
                Toastr::error('Please Fill the Reuired Files', 'Error');
                return back();
            }
            //image validation
            if (!empty($data['product_image'])) {
                if ($request->hasFile('product_image')) {
                    $image_tmp = $request->file('product_image');
                    if ($image_tmp->isValid()) {
                        $extention = $image_tmp->clientExtension();
                        $filename = rand(1, 1000000000) . '.' . $extention;
                        $path_image_Small = 'front-images/products/Image_small/' . $filename;
                        $path_image_Midume = 'front-images/products/Image_midume/' . $filename;
                        $path_image_Larg = 'front-images/products/Image_larg/' . $filename;
                        Image::make($image_tmp)->resize(300, 300)->save($path_image_Small);
                        Image::make($image_tmp)->resize(600, 600)->save($path_image_Midume);
                        Image::make($image_tmp)->resize(900, 900)->save($path_image_Larg);
                    } else {
                        $filename = $data['current_image'];
                    }
                } else {
                    $filename = $data['current_image'];
                }
            } else {
                $filename = $data['current_image'];
            }
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            Product::where(['id' => $id])->update([
                'product_id' => $data['Product_id'],
                'product_name' => $data['product_name'],
                'Description' => $data['description'],
                'price' => $data['product_price'],
                'product_color' => $data['product_color'],
                'product_code' => $data['product_code'],
                'status' => $status,
                'product_image' => $filename,
            ]);
            Toastr::success('Your Product has been updated Successfully', 'Success');
        }
        $Edit_product = Product::with('Category_id')->where(['id' => $id])->first();
        $showCategories = Category::with('frontCategory')->where(['parent_id' => 0])->get();

        return view('Back-End.products.edIt_product', compact('Edit_product', 'showCategories'));
    }

    public function Delete_product($id)
    {
        if (empty($id)) {
            Toastr::error('The Product is Not there', 'Error');
            return back();
        } else {
            Product::where(['id' => $id])->delete();
            Toastr::success('The Product has been Deleted successfully :)', 'Success');
            return back();
        }
    }


    ///////// start the Altter product section to insert more detailes for products //////////////

    public function Show_altter_product($id)
    {
        $Altter_product = Product::with(['altter_id', 'Category_id'])->where(['id' => $id])->first();

        return view('Back-End.products.view_single_product', compact('Altter_product'));
    }
}
