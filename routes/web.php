<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\DictionaryController as AdminDictionaryController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\MaterialController as AdminMaterialController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\AdvantageController as AdminAdvantageController;
use App\Http\Controllers\Admin\EmailController as AdminEmailController;
use App\Http\Controllers\Admin\FooterController as AdminFooterController;
use \App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\SocialController as AdminSocialController;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...




        Route::get("/",[FrontendController::class,"index"])->name("main");
        Route::get("/about-us",[FrontendController::class,"about"])->name("about");
        Route::get("/news",[FrontendController::class,"news"])->name("news");
        Route::get("/news-show/{alias}",[FrontendController::class,"singleNews"])->name("singleNews");
        Route::get("/article",[FrontendController::class,"article"])->name("article");
        Route::get("/article-show/{alias}",[FrontendController::class,"singleArticle"])->name("singleArticle");
        Route::get("/book",[FrontendController::class,"book"])->name("book");
        Route::get("/book-show/{alias}",[FrontendController::class,"singleBook"])->name("singleBook");
        Route::get("/dictionary",[FrontendController::class,"dictionary"])->name("dictionary");
        Route::get("/author",[FrontendController::class,"author"])->name("author");
        Route::get("/author-book/{id}",[FrontendController::class,"authorBook"])->name("authorBook");
        Route::get("/gallery",[FrontendController::class,"gallery"])->name("gallery");
        Route::get("/contact",[FrontendController::class,"contact"])->name("contact");
        Route::get("/search",[FrontendController::class,"search"])->name("search");
        Route::post("/send-message",[FrontendController::class,"sendMessage"])->name("send-message");

        Route::group(["middleware"=>"guest"],function (){
           Route::get("/login",[AuthController::class,"login"])->name("login");
           Route::post("/auth",[AuthController::class,"auth"])->name("auth");
        });

        Route::group(["middleware"=>"auth"],function (){
           Route::get("/logout",[AuthController::class,"logout"])->name("logout");
        });


    //Admin
        Route::group(["prefix"=>"admin","middleware"=>"editor"],function (){
            Route::group(["middleware"=>"admin"],function (){
                Route::resource("admin-user",UserController::class);
                Route::resource("admin-gallery",AdminGalleryController::class);
                Route::resource("admin-partner",AdminPartnerController::class);
                Route::resource("admin-team",AdminTeamController::class);
            });
           Route::get("/",[AdminMainController::class,"index"])->name("adminHome");
           Route::resource("admin-news",AdminNewsController::class);
           Route::resource("admin-article",AdminArticleController::class);
           Route::resource("admin-dictionary", AdminDictionaryController::class);
           Route::resource("admin-author",AdminAuthorController::class);
           Route::resource("admin-book",AdminBookController::class);
           Route::resource("admin-material",AdminMaterialController::class);
           Route::resource("admin-slider",AdminSliderController::class);
           Route::resource("admin-about",AdminAboutController::class);
           Route::resource("admin-about",AdminAboutController::class);
           Route::resource("admin-advantage",AdminAdvantageController::class);
           Route::resource("admin-email",AdminEmailController::class);
           Route::resource("admin-footer",AdminFooterController::class);
           Route::resource("admin-social",AdminSocialController::class);
        });











});
