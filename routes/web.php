<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/page-managment/home/main', 'HomePageController@main');
Route::get('/page-managment/home/about', 'HomePageController@about');
Route::get('/page-managment/home/project', 'HomePageController@project');
Route::get('/page-managment/home/testimonials/add', 'HomePageController@addTestimonials');
Route::get('/page-managment/home/testimonials/list', 'HomePageController@listTestimonials');
Route::get('/page-managment/home/testimonials/edit/{id}', 'HomePageController@editTestimonials');
Route::get('/page-managment/home/contact-banner', 'HomePageController@contactBanner');

Route::get('/page-managment/about/main', 'AboutPageController@main');
Route::get('/page-managment/about/partners', 'AboutPageController@partners');

Route::get('/page-managment/contact/main', 'ContactPageController@main');

Route::get('/page-managment/projects/add', 'ProjectPageController@add');
Route::get('/page-managment/projects/list', 'ProjectPageController@list');
Route::get('/page-managment/projects/edit/{id}', 'ProjectPageController@edit');
Route::get('/page-managment/projects/contents', 'ProjectPageController@contents');

Route::get('/page-managment/gallery/add', 'GalleryPageController@add');
Route::get('/page-managment/gallery/list', 'GalleryPageController@list');
Route::get('/page-managment/gallery/edit/{id}', 'GalleryPageController@edit');

Route::get('/page-managment/services/main-content', 'ServicePageController@mainContents');
Route::get('/page-managment/services/add', 'ServicePageController@add');
Route::get('/page-managment/services/list', 'ServicePageController@list');
Route::get('/page-managment/services/edit/{id}', 'ServicePageController@edit');

Route::get('/page-managment/settings/footer', 'FooterSettingsController@footerContents');


//POST ROUTES
Route::post('/save-banner-images', 'HomePageController@saveBannerImages');
Route::post('/save-about-contents', 'HomePageController@saveAboutContents');
Route::post('/save-project-contents', 'HomePageController@saveProjectContents');
Route::post('/save-testimonials', 'HomePageController@saveTestimonials');
Route::post('/page-managment/home/testimonials/update/{id}', 'HomePageController@updateTestimonials');
Route::delete('/page-managment/home/testimonials/delete/{id}', 'HomePageController@destroy');
Route::post('/save-home-contact-banner-contents', 'HomePageController@saveHomeContactBannerContents');

Route::post('/save-about-page-contents', 'AboutPageController@saveAboutContents');
Route::post('/save-about-page-partners', 'AboutPageController@saveAboutPartners');

Route::post('/save-contact-page-contents', 'ContactPageController@saveContactContents');

Route::post('/save-projects', 'ProjectPageController@saveProjects');
Route::post('/page-managment/projects/update/{id}', 'ProjectPageController@updateProject');
Route::post('/save-project-page-contents', 'ProjectPageController@saveProjectPageContents');
Route::delete('/page-managment/projects/delete/{id}', 'ProjectPageController@destroy');

Route::post('/save-gallery', 'GalleryPageController@saveGallery');
Route::post('/page-managment/gallery/update/{id}', 'GalleryPageController@updateGallery');
Route::delete('/page-managment/gallery/delete/{id}', 'GalleryPageController@destroy');

Route::post('/save-services-main-contents', 'ServicePageController@saveServiceMainContents');
Route::post('/save-services', 'ServicePageController@saveServices');
Route::post('/page-managment/services/update/{id}', 'ServicePageController@updateServices');
Route::delete('/page-managment/services/delete/{id}', 'ServicePageController@destroy');

Route::post('/save-footer-contents', 'FooterSettingsController@saveFooterContents');




