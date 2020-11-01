<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{

    // view the view page

    public function View_banner()
    {
        $View_banners = banner::get();
        return view('Back-End.banners.view_banner', compact('View_banners'));
    }

    // show the add banner page
    public function add_banner()
    {
        return view('Back-End.banners.Add_banner');
    }

    //store data of banner add page
    public function store_banner(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // check if the title is empty
            if (empty($data['title'])) {
                $title = '';
            } else {
                $title = $data['title'];
            }
            if (empty($data['description'])) {
                $description = '';
            } else {
                $description = $data['description'];
            }

            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            // check the image
            if (empty($data['image'])) {
                Toastr::error('Please Enter an Image before You submit your File', 'Error');
                return back();
            }

            // start inserting data
            if ($request->hasFile('image')) {
                $tmp_image = $request->file('image');
                if ($tmp_image->isValid()) {
                    $extention = $tmp_image->clientExtension();
                    $fileName = rand(1, 10000000000) . '.' . $extention;
                    $image_path = 'front-images/banners/' . $fileName;
                    Image::make($tmp_image)->resize(1200, 600)->save($image_path);
                }
            }
            $insertbanner = new banner;
            $insertbanner->images = $fileName;
            $insertbanner->Title = $title;
            $insertbanner->Description = $description;
            $insertbanner->status = $status;
            $insertbanner->save();
            Toastr::Success('The banner has been Inserted Successfully', 'Success');
            return redirect('bannerSection/add_banner');
        }
    }
    //edit the banner
    public function Edit_banner(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // valdiations
            // check if the title is empty
            if (empty($data['title'])) {
                $title = '';
            } else {
                $title = $data['title'];
            }
            if (empty($data['description'])) {
                $description = '';
            } else {
                $description = $data['description'];
            }

            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            // check the image
            if (empty($data['image'])) {
                $fileName = $data['current_image'];
            }
            // start inserting data
            if ($request->hasFile('image')) {
                $tmp_image = $request->file('image');
                if ($tmp_image->isValid()) {
                    $extention = $tmp_image->clientExtension();
                    $fileName = rand(1, 10000000000) . '.' . $extention;
                    $image_path = 'front-images/banners/' . $fileName;
                    Image::make($tmp_image)->resize(1200, 600)->save($image_path);
                }
            }
            banner::where(['id' => $id])->update([
                'Title' => $title,
                'Description' => $description,
                'status' => $status,
                'images' => $fileName,
            ]);
            Toastr::Success('The banner has been Edit Successfully', 'Success');
            return back();
        }

        $edit_banner = banner::where(['id' => $id])->first();
        return view('Back-End.banners.edit_banner', compact('edit_banner'));
    }


    // delete the banner
    public function delete_banner($id)
    {

        if (empty($id)) {
            Toastr::error('The Banner is Not Found', 'Error');
            return back();
        } else {

            banner::where(['id' => $id])->delete();
            Toastr::success('The Banner has been Deleted successfully', 'Success');
            return back();
        }
    }
}
