<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Class1Controller;
use App\Http\Controllers\Admin\Class_typeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AttendenceController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\LogoutController;


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
    return view('auth.login');
    
   
});
Auth::routes();

Route::group(['middleware' => ['auth']], function() {


    
    Route::get('dashboard',[DashboardController::class,'index']) ->name('dashboard');
    // Route::get('logout',[LoginController::class,'logout']) ->name('admin.logout');
    Route::get('logout', [LogoutController::class,'perform'])->name('logout.perform');
    
    Route::get('/year/index',[YearController::class,'index']) ->name('admin.year.index');
    Route::get('/year/create',[YearController::class,'create']) ->name('admin.year.create');
    Route::post('/year/store',[YearController::class,'store']) ->name('admin.year.store');
    Route::get('/year/edit/{id}',[YearController::class,'edit']) ->name('admin.year.edit');
    Route::put('/year/edit/{id}',[YearController::class,'update']) ->name('admin.year.update');
    Route::post('/year/ajax_search',[YearController::class,'ajax_search']) ->name('admin.year.ajax_search');
    Route::get('/year/trashed',[YearController::class,'trashed']) ->name('admin.year.trash');
    Route::get('/year/restore/{id}',[YearController::class,'restore']) ->name('admin.year.restore');
    Route::get('/year/destroy/{id}',[YearController::class,'destroy']) ->name('admin.year.destroy');
    
    Route::get('/user/index',[UserController::class,'index']) ->name('admin.user.index');
    Route::get('/user/create',[UserController::class,'create']) ->name('admin.user.create');
    Route::get('/user/edit/{id}',[UserController::class,'edit']) ->name('admin.user.edit');
    Route::post('/user/store',[UserController::class,'store']) ->name('admin.user.store');
    Route::put('/user/edit/{id}',[UserController::class,'update']) ->name('admin.user.update');
    Route::post('/user/ajax_search',[UserController::class,'ajax_search']) ->name('admin.user.ajax_search');
    Route::get('/user/trashed_users',[UserController::class,'trashed_users']) ->name('admin.user.trash');
    Route::get('/user/restore/{id}',[UserController::class,'restore']) ->name('admin.user.restore');
    Route::get('/user/destroy/{id}',[UserController::class,'destroy']) ->name('admin.user.destroy');
    
    Route::get('/class1/index',[Class1Controller::class,'index']) ->name('admin.class1.index');
    Route::get('/class1/create',[Class1Controller::class,'create']) ->name('admin.class1.create');
    Route::post('/class1/store',[Class1Controller::class,'store']) ->name('admin.class1.store');
    Route::get('/class1/edit/{id}',[Class1Controller::class,'edit']) ->name('admin.class1.edit');
    Route::put('/class1/edit/{id}',[Class1Controller::class,'update']) ->name('admin.class1.update');
    Route::post('/class1/ajax_search',[Class1Controller::class,'ajax_search']) ->name('admin.class1.ajax_search');
    Route::get('/class1/trashed',[Class1Controller::class,'trashed']) ->name('admin.class1.trash');
    Route::get('/class1/restore/{id}',[Class1Controller::class,'restore']) ->name('admin.class1.restore');
    Route::get('/class1/destroy/{id}',[Class1Controller::class,'destroy']) ->name('admin.class1.destroy');
    
    Route::get('/class_type/index',[Class_typeController::class,'index']) ->name('admin.class_type.index');
    Route::get('/class_type/create',[Class_typeController::class,'create']) ->name('admin.class_type.create');
    Route::post('/class_type/store',[Class_typeController::class,'store']) ->name('admin.class_type.store');
    Route::get('/class_type/edit/{id}',[Class_typeController::class,'edit']) ->name('admin.class_type.edit');
    Route::put('/class_type/edit/{id}',[Class_typeController::class,'update']) ->name('admin.class_type.update');
    Route::post('/class_type/ajax_search',[Class_typeController::class,'ajax_search']) ->name('admin.class_type.ajax_search');
    Route::get('/class_type/trashed',[Class_typeController::class,'trashed']) ->name('admin.class_type.trash');
    Route::get('/class_type/restore/{id}',[Class_typeController::class,'restore']) ->name('admin.class_type.restore');
    Route::get('/class_type/destroy/{id}',[Class_typeController::class,'destroy']) ->name('admin.class_type.destroy');
    
    Route::get('/student/index',[StudentController::class,'index']) ->name('admin.student.index');
    Route::get('/student/create',[StudentController::class,'create']) ->name('admin.student.create');
    Route::post('/student/store',[StudentController::class,'store']) ->name('admin.student.store');
    Route::get('/student/edit/{id}',[StudentController::class,'edit']) ->name('admin.student.edit');
    Route::put('/student/edit/{id}',[StudentController::class,'update']) ->name('admin.student.update');
    Route::post('/student/ajax_search',[StudentController::class,'ajax_search']) ->name('admin.student.ajax_search');
    Route::get('/student/trashed',[StudentController::class,'trashed']) ->name('admin.student.trash');
    Route::get('/student/restore/{id}',[StudentController::class,'restore']) ->name('admin.student.restore');
    Route::get('/student/destroy/{id}',[StudentController::class,'destroy']) ->name('admin.student.destroy');
    Route::post('/student/count',[StudentController::class,'count']) ->name('admin.student.count');
    
    Route::get('/attendence/index',[AttendenceController::class,'index']) ->name('admin.attendence.index');
    Route::get('/attendence/create',[AttendenceController::class,'create']) ->name('admin.attendence.create');
    Route::post('/attendence/store',[AttendenceController::class,'store']) ->name('admin.attendence.store');
    Route::get('/attendence/edit/{id}',[AttendenceController::class,'edit']) ->name('admin.attendence.edit');
    Route::put('/attendence/edit/{id}',[AttendenceController::class,'update']) ->name('admin.attendence.update');
    Route::post('/attendence/ajax_search',[AttendenceController::class,'ajax_search']) ->name('admin.attendence.ajax_search');
    Route::get('/attendence/trashed',[AttendenceController::class,'trashed']) ->name('admin.attendence.trash');
    Route::get('/attendence/restore/{id}',[AttendenceController::class,'restore']) ->name('admin.attendence.restore');
    Route::get('/attendence/destroy/{id}',[AttendenceController::class,'destroy']) ->name('admin.attendence.destroy');
    
    Route::get('/course/index',[CourseController::class,'index']) ->name('admin.course.index');
    Route::get('/course/create',[CourseController::class,'create']) ->name('admin.course.create');
    Route::post('/course/store',[CourseController::class,'store']) ->name('admin.course.store');
    Route::get('/course/edit/{id}',[CourseController::class,'edit']) ->name('admin.course.edit');
    Route::put('/course/edit/{id}',[CourseController::class,'update']) ->name('admin.course.update');
    Route::post('/course/ajax_search',[CourseController::class,'ajax_search']) ->name('admin.course.ajax_search');
    Route::get('/course/trashed',[CourseController::class,'trashed']) ->name('admin.course.trash');
    Route::get('/course/restore/{id}',[CourseController::class,'restore']) ->name('admin.course.restore');
    Route::get('/course/destroy/{id}',[CourseController::class,'destroy']) ->name('admin.course.destroy');
    
    Route::get('/evaluation/index',[EvaluationController::class,'index']) ->name('admin.evaluation.index');
    Route::get('/evaluation/create',[EvaluationController::class,'create']) ->name('admin.evaluation.create');
    Route::post('/evaluation/store',[EvaluationController::class,'store']) ->name('admin.evaluation.store');
    Route::get('/evaluation/edit/{id}',[EvaluationController::class,'edit']) ->name('admin.evaluation.edit');
    Route::put('/evaluation/edit/{id}',[EvaluationController::class,'update']) ->name('admin.evaluation.update');
    Route::post('/evaluation/ajax_search',[EvaluationController::class,'ajax_search']) ->name('admin.evaluation.ajax_search');
    Route::get('/evaluation/trashed',[EvaluationController::class,'trashed']) ->name('admin.evaluation.trash');
    Route::get('/evaluation/restore/{id}',[EvaluationController::class,'restore']) ->name('admin.evaluation.restore');
    Route::get('/evaluation/destroy/{id}',[EvaluationController::class,'destroy']) ->name('admin.evaluation.destroy');
    
});


