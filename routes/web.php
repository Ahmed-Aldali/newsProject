<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



    });





Route::prefix('cms/')->middleware('guest:admin,author')->group(function(){
    Route::get('loginType' , [UserAuthController::class , 'loginType'])->name('login.type');
    Route::get('{guard}/login' , [UserAuthController::class , 'showLogin'])->name('login.view');
    Route::post('{guard}/login' , [UserAuthController::class , 'login']);
});

Route::prefix('cms/')->middleware('auth:admin,author')->group(function(){
    Route::get('logout' , [UserAuthController::class , 'logout'])->name('logout');

    Route::get('edit-profile' , [UserAuthController::class , 'editProfile'])->name('edit-profile');
    Route::post('update-profile' , [UserAuthController::class , 'updateProfile'])->name('update-profile');


    Route::get('Change-password' , [UserAuthController::class , 'changePassword'])->name('change-password');
    Route::post('update-password' , [UserAuthController::class , 'updatePassword'])->name('update-password');

});
Route::prefix('cms')->middleware('auth:admin,author')->group(function(){
    Route::view('/home' , 'cms.home')->name('home');
    Route::view('/temp' , 'cms.temp');
    Route::resource('countries' , CountryController::class);
    Route::post('countries-update/{id}' , [CountryController::class , 'update'])->name('countries-update');

    Route::resource('cities' , CityController::class);
    Route::post('cities-update/{id}' , [CityController::class , 'update'])->name('cities-update');

    Route::resource('admins' , AdminController::class);
    Route::post('admins-update/{id}' , [AdminController::class , 'update'])->name('admins-update');
    Route::get('indexTrash' , [AdminController::class , 'indexTrash'])->name('indexTrash');
    Route::get('admins_restore/{id}',[AdminController::class , 'restore'])->name('admins.restore');
    Route::get('admins_restoreAll',[AdminController::class , 'restoreAll'])->name('admins.restoreAll');
    Route::get('admins_forceDelete/{id}',[AdminController::class , 'forceDelete'])->name('admins.forceDelete');
    Route::get('admins_forceDeleteAll',[AdminController::class , 'forceDeleteAll'])->name('admins.forceDeleteAll');



    Route::resource('authors' , AuthorController::class);
    Route::post('authors-update/{id}' , [AuthorController::class , 'update'])->name('authors-update');

    Route::resource('categories' , CategoryController::class);
    Route::post('categories-update/{id}' , [CategoryController::class , 'update'])->name('categories-update');

    Route::resource('articles' , ArticleController::class);
    Route::post('articles-update/{id}' , [ArticleController::class , 'update'])->name('articles-update');

    Route::get('/index/articles/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');
    Route::get('/index/CategoryArticles/{id}', [ArticleController::class, 'indexCategoryArticles'])->name('indexCategoryArticles');
    Route::get('/create/articles/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');
    Route::post('/create/articles/{id}', [ArticleController::class, 'createArticle'])->name('createArticleTag');

    Route::resource('sliders' , SliderController::class);
    Route::post('sliders-update/{id}' , [SliderController::class , 'update'])->name('sliders-update');

    Route::resource('comments' , CommentController::class);
    Route::resource('contacts' , ContactController::class);

    Route::resource('roles' , RoleController::class);
    Route::post('roles-update/{id}' , [RoleController::class , 'update'])->name('roles-update');

    Route::resource('permissions' , PermissionController::class);
    Route::post('permissions-update/{id}' , [PermissionController::class , 'update'])->name('permissions-update');

    Route::resource('roles.permissions' , RolePermissionController::class);


});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/', [HomeController::class, 'index']);

        Route::prefix('news')->group(function(){
            Route::get('index', [HomeController::class, 'index'])->name('news.index');
            Route::get('all/{id}', [HomeController::class, 'allNews'])->name('news.all');
            Route::get('details/{id}', [HomeController::class, 'details'])->name('news.details');
            Route::get('Tags/{tag}', [HomeController::class, 'TagNewsIndex'])->name('TagNews');

            Route::get('showContact', [HomeController::class, 'showContact'])->name('news.showContact');
            Route::post('storeContact', [HomeController::class, 'storeContact']);

        });


        // Route::prefix('news')->middleware('auth:viewer')->group(function(){
        Route::prefix('news')->group(function(){

            Route::post('storeComment', [HomeController::class, 'storeComment'])->name('news.storeComment');

        });



    });
