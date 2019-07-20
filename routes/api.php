<?php

use App\Http\Controllers\Frontend\Api\CourseController;
use App\Http\Controllers\Frontend\Api\EnrollController;
use App\Http\Controllers\Frontend\Api\OpinionController;
use App\Http\Controllers\Frontend\Api\PhotoController;
use App\Http\Controllers\Frontend\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/get-courses', CourseController::getActionUrl(CourseController::ACTION_GET_COURSES));
Route::get('/get-course/{id}', CourseController::getActionUrl(CourseController::ACTION_GET_COURSE));
Route::get('/get-opinions', OpinionController::getActionUrl(OpinionController::ACTION_GET_OPINIONS));
Route::get('/get-photo', PhotoController::getActionUrl(PhotoController::ACTION_GET_PHOTOS));
Route::post('/send-enroll-form', EnrollController::getActionUrl(EnrollController::ACTION_ENROLL));

