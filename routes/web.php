<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OpinionController;
use App\Http\Controllers\Backend\PhotoController;

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
    return view('home');
});

Route::get('/t-login', LoginController::getActionUrl(LoginController::ACTION_LOGIN_FORM));
Route::post('/t-login', LoginController::getActionUrl(LoginController::ACTION_LOGIN))->name('login');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 't-admin'], function () {
	Route::get('/', MenuController::getActionUrl(MenuController::ACTION_INDEX))->name('admin-menu');

	Route::get('/courses', CourseController::getActionUrl(CourseController::ACTION_INDEX))->name('courses-list');
	Route::get('/courses/create', CourseController::getActionUrl(CourseController::ACTION_SHOW_CREATE_FORM));
	Route::get('/courses/edit/{id}', CourseController::getActionUrl(CourseController::ACTION_SHOW_EDIT_FORM))->name('edit-course');
	Route::post('/courses/create', CourseController::getActionUrl(CourseController::ACTION_CREATE));
	Route::post('/courses/update', CourseController::getActionUrl(CourseController::ACTION_UPDATE));
	Route::get('/courses/delete/{id}', CourseController::getActionUrl(CourseController::ACTION_DELETE))->name('delete-course');

	Route::get('/opinions', OpinionController::getActionUrl(OpinionController::ACTION_INDEX))->name('opinions-list');
	Route::get('/opinions/create', OpinionController::getActionUrl(OpinionController::ACTION_SHOW_CREATE_FORM));
	Route::get('/opinions/edit/{id}', OpinionController::getActionUrl(OpinionController::ACTION_SHOW_EDIT_FORM))->name('edit-opinion');
	Route::post('/opinions/create', OpinionController::getActionUrl(OpinionController::ACTION_CREATE))->name('create-opinion');
	Route::post('/opinions/update', OpinionController::getActionUrl(OpinionController::ACTION_UPDATE))->name('update-opinion');
	Route::get('/opinions/delete/{id}', OpinionController::getActionUrl(OpinionController::ACTION_DELETE))->name('delete-opinion');

	Route::get('/photo', PhotoController::getActionUrl(PhotoController::ACTION_INDEX))->name('photos-list');
	Route::get('/photo/create', PhotoController::getActionUrl(PhotoController::ACTION_SHOW_CREATE_FORM))->name('create-photo-form');;
	Route::get('/photo/edit/{id}', PhotoController::getActionUrl(PhotoController::ACTION_SHOW_EDIT_FORM))->name('edit-photo');
	Route::post('/photo/create', PhotoController::getActionUrl(PhotoController::ACTION_CREATE))->name('create-photo');
	Route::post('/photo/update', PhotoController::getActionUrl(PhotoController::ACTION_UPDATE))->name('update-photo');
	Route::get('/photo/delete/{id}', PhotoController::getActionUrl(PhotoController::ACTION_DELETE))->name('delete-photo');

	Route::get('/images/get-all', ImageController::getActionUrl(ImageController::ACTION_GET_ALL))->name('images-get');
	Route::post('/images/upload', ImageController::getActionUrl(ImageController::ACTION_UPLOAD))->name('image-upload');
});
