<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('data', [APIController::class, 'getData']);  // GET: ดึงข้อมูล

// Route::controller(StudentController::class)->group(function () {
//     Route::GET('/allstudent', 'GetAllStudents');
//     Route::POST('/addstudent', 'AddData');
//     Route::DELETE('/deletestudent/{id}', 'DeleteData');
//     Route::PUT('/updatestudents/{id}',  'UpdateData');
//     Route::PATCH('/updatepatch/{id}', 'updatepatch');

// });
// Route::controller(APIController::class)->group(function () {
//     Route::get('/getpostdata','getPostData');
//     Route::get('/getpostbyid/{id}', 'getPostDataByID');
//     Route::get('/getuserdata', 'getUser');

// });

Route::post('register', [AuthController::class,'Register']);
Route::post('login', [AuthController::class,'Login']);
Route::post('logout', [AuthController::class,'Logout'])
        ->middleware('auth:sanctum');
Route::apiResource('posts', PostController::class);
