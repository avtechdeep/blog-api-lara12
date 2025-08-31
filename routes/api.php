<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MemberResourceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//testing api route
// Route::get("/test", function(){
//     return ["name"=>"Deep Vaishnave", "channel"=>"avtechnologies.com"];
// });


//localhost/api/students =>for show all student list
//localhost/api/add-student  =>for add student and body in send name,enail,phone value by postman/thunder
//localhost/api/update-student =>For Update student and body in send id,name,email,phone,value by postman/thunder
//localhost/api/delete-student/2 =>For Delete i need to send id in url by postman/thunder


Route::get('students',[StudentController::class, 'list']);

Route::post('add-student',[StudentController::class, 'addStudent']);

Route::put('update-student',[StudentController::class, 'updateStudent']);

Route::delete('delete-student/{id}',[StudentController::class, 'deleteStudent']);


//Validate API = localhost/api/add-student  =>for add student and body in send name,enail,phone sent value by postman/thunder with not blank and not wrong email


//make resource controller MemberResourceController (We can use without diff-2 route)
//Check http://127.0.0.1:8000/api/member show all Student model data's
//Check update put http://127.0.0.1:8000/api/member/10
// http://127.0.0.1:8000/api/member/create
Route::resource('member',MemberResourceController::class);

