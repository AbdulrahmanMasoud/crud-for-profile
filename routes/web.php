<?php
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class,'create']);
Route::post('register', [UserController::class,'store']);
Route::post('checklogin', [UserController::class,'login']);
Route::get('login', function () {
    if(session()->has('user')){
      return redirect('users');
    }else{
        return view('pages.login');
    }
});

Route::get('/logout', function () {
    if(session()->has('user')){
        session()->pull('user');
    }
        return redirect('login');
    
});

Route::get('users', [UserController::class,'index'])->name('users')->middleware('checkuser');
Route::get('users/edit/{id}', [UserController::class,'edit'])->name('users.edit');
Route::post('users/update', [UserController::class,'update'])->name('users.update');
Route::get('users/delete/{id}', [UserController::class,'destroy'])->name('users.delete');
