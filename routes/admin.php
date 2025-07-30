<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\BlogMgmtController;
use App\Http\Controllers\frontend\IdeaCrudMgmtController;
use App\Http\Controllers\admin\IdeaCategoryMgmtController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserAccountCreation;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\frontend\FeedbackViewController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\UserPannelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;




Route::group(["prefix"=>"admin"],function(){

             Route::group(['middleware'=>"admin.guest"],function(){

Route::get('auth/login/', [ AuthenticationController::class, 'loginform' ])->name('auth.loginpage');
Route::post('authenticate/user', [ AuthenticationController::class, 'authenticate' ])->name('user.auth');


             });

             Route::group(["middleware"=>"admin.auth"],function(){

Route::get('Dashboard', [ AdminDashboardController::class, 'welcome' ])->name('welcome');
Route::get('show/admin', [ AdminDashboardController::class, 'showadmin' ])->name('showadmin');
Route::get('add/admin', [ AdminDashboardController::class, 'addadmin' ])->name('addadmin');
Route::post('add/admin', [ AdminDashboardController::class, 'adminpost' ])->name('adminpost');
Route::get('delete/{id}', [ AdminDashboardController::class, 'admindelete' ])->name('admindelete');

Route::get('logout', [ AdminDashboardController::class, 'logoutadmin' ])->name('logoutadmin');

Route::get('showblog', [ BlogMgmtController::class, 'index' ])->name('blog.show');
Route::get('createblog', [ BlogMgmtController::class, 'createblog' ])->name('blog.create');
Route::post('blogpost', [ BlogMgmtController::class, 'postblog' ])->name('blog.store');
Route::get('deleteblog/{id}', [ BlogMgmtController::class, 'deleteblog' ])->name('blog.delete');
Route::get('updateblog/{id}', [ BlogMgmtController::class, 'updateblog' ])->name('blog.updateblog');
Route::post('updateblogpost/{id}', [ BlogMgmtController::class, 'updateblogpost' ])->name('blog.updatepostblog');



Route::get('ideacategory', [ IdeaCategoryMgmtController::class, 'createcategory' ])->name('category.create');
Route::post('ideacategory/post', [ IdeaCategoryMgmtController::class, 'postideacategory' ])->name('category.post');

Route::get('get/ideacategory', [ IdeaCategoryMgmtController::class, 'showcategory' ])->name('category.show');
Route::get('deletecategory/{id}', [ IdeaCategoryMgmtController::class, 'deletecategory' ])->name('category.delete');
Route::get('updatecategory/{id}', [ IdeaCategoryMgmtController::class, 'updatecategory' ])->name('category.update');
Route::post('updatecategorypost/{id}', [ IdeaCategoryMgmtController::class, 'postupdatecategory' ])->name('category.updatepost');



             });



});
// Route::group("middleware")
