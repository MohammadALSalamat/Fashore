<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserSection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontUserController;
use App\Http\Controllers\FrontIndexController;
use App\Http\Controllers\BackDashboardController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Back end controllers
Route::match(['get', 'post'], '/admin', [BackDashboardController::class, 'login_page'])->name('login_page');

// log out
Route::get('/logout', [BackDashboardController::class, 'logout'])->name('logout');
// security part start thr admin panel page.
Route::group(['middleware' => ['admin']], function () {


    /*+++++++++++++++++++++++++++++++ Start the user Routs +++++++++++++++++++++++++++*/

    // show the dashboard
    Route::get('/dashboard', [BackDashboardController::class, "dashboard"])->name('dashboard');
    // user section
    Route::get('/users_section/ViewAdmins', [UserSection::class, 'view_Admins'])->name('view_admins'); // admin section
    Route::get('/users_section/ViewUsers', [UserSection::class, 'view_users'])->name('view_users'); // front users sections
    Route::get('/users_section/Add', [UserSection::class, 'Add_users'])->name('Add_users');
    Route::post('/users_section/Add_user', [UserSection::class, 'Store_users'])->name('Insert_users');
    //user sittings
    Route::get('/profile', [UserSection::class, 'sittings'])->name('sittings');
    // check the password validate
    Route::get('/admin/check-pwd', [UserSection::class, 'changPass']);
    Route::patch('/admin/update_password', [UserSection::class, 'update_password'])->name('update_password');
    //update prodile username
    Route::match(['get', 'post'], '/admin/update_profile/{id]', [UserSection::class, 'update_profile'])->name('update_profile');
    // delete the user
    Route::match(['get', 'post'], '/admin/user/{id}', [UserSection::class, 'Delete_user']); // delete admins
    Route::match(['get', 'post'], '/admin/Delete_Front_user/{id}', [UserSection::class, 'Delete_Front_user']); // delete Fron users
    // modify the user
    Route::get('users/Edit/{id}', [UserSection::class, 'Edit_user'])->name('Edit_user');
    Route::post('Edit/{id}', [UserSection::class, 'Modify_user']);

    // show the banuser page
    Route::get('user/banned', [UserSection::class, "banned_user"])->name('ban_users');

    /*+++++++++++++++++++++++++++++++ End  the user Routs +++++++++++++++++++++++++++*/
    /*+++++++++++++++++++++++++++++++ End  the Categories Routs +++++++++++++++++++++++++++*/

    Route::get('CategorySection/View_categories', [CategoryController::class, 'view_category'])->name('view_category'); // show category
    Route::get('CategorySection/Add_categories', [CategoryController::class, 'add_category'])->name('add_category');
    Route::post('CategorySection/Store_categories', [CategoryController::class, 'store_category'])->name('store_category');
    Route::match(['get', 'post'], '/admin/category/{id}', [CategoryController::class, 'delete_category']); // delete banner
    Route::match(['get', 'post'], 'CategorySection/Edit/{id}', [CategoryController::class, 'Edit_category'])->name('Edit_category');
    /*+++++++++++++++++++++++++++++++ End  the Categories Routs +++++++++++++++++++++++++++*/

    /*+++++++++++++++++++++++++++++++ End  the products Routs +++++++++++++++++++++++++++*/
    Route::get('productSection/Show_product', [ProductController::class, 'show_product'])->name('show_product'); // show the view products
    Route::get('productSection/Add_product', [ProductController::class, 'add_product'])->name('add_product'); // add new product
    Route::post('productSection/Store_product', [ProductController::class, 'Store_product'])->name('Store_product'); // store the product to database
    Route::match(['get', 'post'], 'productSection/Edit_product/{id}', [ProductController::class, 'Edit_product'])->name('Edit_product');
    Route::match(['get', 'post'], '/admin/product/{id}', [ProductController::class, 'Delete_product']); // delete product


    /*+++++++++++++++++++++++++++++++ Start  the products alternative  Routs +++++++++++++++++++++++++++*/
    Route::get('productSection/Show_altter_product/{id}', [ProductController::class, 'Show_altter_product'])->name('Show_altter_product'); // show the view products



    /*+++++++++++++++++++++++++++++++ End  the products Routs +++++++++++++++++++++++++++*/



    /*+++++++++++++++++++++++++++++++ Start  the Banners Routs +++++++++++++++++++++++++++*/
    Route::get('bannerSection/View_banner', [BannerController::class, 'View_banner'])->name('View_banner'); // show Banners
    Route::get('bannerSection/add_banner', [BannerController::class, 'Add_banner'])->name('add_banner'); // show page
    Route::post('bannerSection/store_banner', [BannerController::class, 'store_banner'])->name('store_banner'); // show page
    Route::match(['get', 'post'], '/admin/banner/{id}', [BannerController::class, 'delete_banner']); // delete banner
    Route::match(['get', 'post'], 'banner/Edit/{id}', [BannerController::class, 'Edit_banner'])->name('Edit_banner');
    /*+++++++++++++++++++++++++++++++ End  the Banners Routs +++++++++++++++++++++++++++*/
});



//front end controllers
Route::get('/', [FrontIndexController::class, 'main_page'])->name('main_page'); // main page for users
// login page
Route::match(['get', 'post'], '/login_page', [FrontIndexController::class, 'Front_login'])->name('Login_page');
Route::match(['get', 'post'], '/register_page', [FrontIndexController::class, 'Front_register'])->name('register_page');

// log out
Route::get('/Front_logout', [FrontIndexController::class, 'logout'])->name('Front_logout');

Auth::routes();
Route::group(['middleware' => ['Front']], function () {
    // user's profile that user can not access unless he register first

    Route::get('/profile/{id}', [FrontUserController::class, 'Profile'])->name('show_profile');
});
