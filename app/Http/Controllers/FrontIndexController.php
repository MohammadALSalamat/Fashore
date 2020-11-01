<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Category;
use App\Models\FrontUser;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class FrontIndexController extends Controller
{
    // this controller is for User interface

    public function main_page(Request $request)
    {
        // get the detailes of registerd user

        $username = FrontUser::where(['email' => Session::get('UserEmail')])->first();

        // show the banner side_show
        $slideShow = banner::where(['status' => 1])->get();

        // get the categories and sub categories if found using the relation in Model Category
        $Categories = Category::with('frontCategory')
            ->where(['parent_id' => 0, 'status' => 1])
            ->get(); // main categories and sub categories

        return view('layouts.front-layout.main_desgin', compact('username', 'slideShow', 'Categories'));
    }

    // register page
    public function Front_register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //valdiations
            $checkUserDetailes = FrontUser::where(['username' => $data['username']])->count();
            if ($checkUserDetailes === 1) {
                Toastr::error('The User name is Already Exist:)', 'Error');
                return back();
            }
            //valdiations
            $checkUserEmail = FrontUser::where(['email' => $data['email']])->count();
            if ($checkUserEmail == 1) {
                Toastr::error('The Email is Already Exist:)', 'Error');
                return back();
            }
            if (empty($data['f_name'])) {
                $data['f_name'] = "";
            }
            if (empty($data['l_name'])) {
                $data['l_name'] = "";
            }
            if (empty($data['Desc'])) {
                $data['Desc'] = "";
            }
            if (empty($data['status'])) {
                $status = 1;
            }

            $newData = new FrontUser;
            $newData->First_name = $data['f_name'];
            $newData->Last_name = $data['l_name'];
            $newData->username = $data['username'];
            $newData->email = $data['email'];
            $newData->password = md5($data['pass']);
            $newData->status = $status;
            $newData->description = $data['Desc'];
            $newData->avatar = 'profile_defult.jpg';
            $newData->save();
            return back();
            Toastr::success('The user has been added you can login now:)', 'Success');
        }
        return view('Front-End.register_page');
    }

    // login function
    public function Front_login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //valdiations
            $checkUserDetailes = FrontUser::where(['email' => $data['email'], 'password' => md5($data['pass'])])->count();
            if ($checkUserDetailes == 1) {
                // out the usr in session
                Session::put('UserEmail', $data['email']); // this session uses for valids authontcation
                return redirect('/');
            } else {
                Toastr::error('Please Check Again or Register if you are not registered yet', 'Error');
                return back();
            }
        }
        return view('Front-End.login_page');
    }

    //logout

    public function logout()
    {
        Session::flush('UserEmail');
        return redirect('/login_page');
    }
}
