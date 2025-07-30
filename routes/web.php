<?php

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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('profilecreation.wrapper');
});

Route::get('/dash', function () {
    return view('Frontend.dashboard');
})->name("dshboardhtml");


Route::get('/uzair', function () {
    return view('index');
});

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




// user pannle start

Route::group(["middleware"=>"user.guest"],function(){
Route::get('create_user_info/', [ UserAccountCreation::class, 'index' ])->name('user.emailpassword');
Route::post('postdata1/', [ UserAccountCreation::class, 'postemailpassword' ])->name('user.emailpassword');
Route::get('create_personal_info/', [ UserAccountCreation::class, 'personal_info_form' ])->name('user.personal_info_form');
Route::get('create_working_info/', [ UserAccountCreation::class, 'personal_working_form' ])->name('user.personal_working_form');

Route::post('postdata2/', [ UserAccountCreation::class, 'personalinfo' ])->name('user.postpersonal_info');
Route::post('postdata3/', [ UserAccountCreation::class, 'workinginfo' ])->name('user.workinginfo');

Route::get('/wrapper-screen', [ UserAccountCreation::class, 'wrapperscreen' ])->name('user.wrapperscreen');



// authentication controller

Route::get('auth/login/', [ AuthenticationController::class, 'loginform' ])->name('auth.loginpage');
Route::post('authenticate/user', [ AuthenticationController::class, 'authenticate' ])->name('user.auth');

});
Route::group(["middleware"=>"user.auth"],function(){


Route::get('user/dashboard', [ UserPannelController::class, 'index' ])->name('user.dashboardpannel');
Route::get('user/logout', [ UserPannelController::class, 'logoutuser' ])->name('user.logout');
Route::get('ugetid', [ UserPannelController::class, 'getid' ])->name('user.getid');
Route::post('profile/update', [ UserPannelController::class, 'profileupdate' ])->name('user.profileupdate');
Route::get('account/setting', [ UserPannelController::class, 'accountsetting' ])->name('user.accountsetting');
Route::post('account/update', [ UserPannelController::class, 'accountupdate' ])->name('user.accountupdate');
Route::get('profile/remove', [ UserPannelController::class, 'removeprofile' ])->name('user.removeprofile');



Route::get('/feed', [ HomeController::class, 'GetAllIdeas' ])->name('clienthomepage');
Route::get('/viewfeedback/{slug}', [ FeedbackViewController::class, 'viewfeedback' ])->name('viewfeedback');
Route::post('/postcomment', [ FeedbackViewController::class, 'postcomment' ])->name('postcomment');
Route::get('/deletecomment/{slug}', [ FeedbackViewController::class, 'deletecomment' ])->name('deletecomment');


});



Route::get('user/idea', [ IdeaCrudMgmtController::class, 'index' ])->name('user.ideaform');
Route::post('user/idea/post', [ IdeaCrudMgmtController::class, 'ideapost' ])->name('user.ideapost');
Route::get('user/idea/get', [ IdeaCrudMgmtController::class, 'getidea' ])->name('user.getidea');
Route::get('idea/xyz/{slug}', [ IdeaCrudMgmtController::class, 'deleteidea' ])->name('user.deleteidea');
Route::get('idea/update/{slug}', [ IdeaCrudMgmtController::class, 'updateidea' ])->name('user.updateidea');
Route::post('idea/update/post/{slug}', [ IdeaCrudMgmtController::class, 'updateideapost' ])->name('user.updateideapost');




Route::get('image-upload', [ImageController::class, 'index']);
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');

Route::get('/cls', function () {
    $output = '';
    $output .= Artisan::call('config:clear');
    $output .= Artisan::call('route:clear');
    $output .= Artisan::call('cache:clear');
    $output .= Artisan::call('view:clear');

    return nl2br("Caches cleared!");
});
