<?php

use App\Http\Controllers\Api\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/list', function () {
    $data['students'] = Student::latest()->get();
    return response()->json(['data'=>$data,'status'=>200]);
});

Route::get('students', [StudentController::class,'index']);
Route::post('students', [StudentController::class,'store']);
Route::get('/students/edit/{id}', [StudentController::class,'edit']);
Route::post('/students/update/', [StudentController::class,'update']);