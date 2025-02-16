<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AboutController;
//use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PupilController;
use App\Http\Controllers\DataTableController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UsersController;

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
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'index']);
Route::get('/login', [UserController::class, 'login'])->name('login');
//Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth','adminAccess');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
//Route::get('/user/create', [UserController::class, 'create']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/signup', [UserController::class, 'store'])->name('signup');


Route::get('/studentlist', [StudentController::class, 'index']);
Route::post('/savestudent', [StudentController::class, 'store']); 


Route::get('/studentlist2', [DataTableController::class, 'index']);
Route::post('/liststudents', [DataTableController::class, 'getStudentList']);

Route::get('/studentlist3', [PupilController::class, 'index']);
Route::get('/students/data', [PupilController::class, 'getData'])->name('students.data');


/* Route::middleware(['throttle:global'])->group(function () {
    Route::post('/savestudent', [StudentController::class, 'store']);
}); */

Route::get('/logout', function () { 
    Auth::logout();
    return redirect('login');
})->name('logout');

Route::post('/signin', function(Request $request){
    
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);

});


Route::delete('deleteYoaks/{id}',function($id=0){
    return response()->json("$id hhh",200);
});


/**  Admin Routes */

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth','adminAccess')->name('admin.dashboard');
Route::get('/admin/login', [LoginController::class, 'index']);
Route::post('/admin/signin', [LoginController::class, 'login']);


Route::get('/admin/userlist', [UsersController::class, 'index'])->middleware('auth','adminAccess')->name('admin.userlist');
Route::post('/admin/usersdata', [UsersController::class, 'getUsersData'])->middleware('auth','adminAccess');
Route::get('/admin/user/view/{id}', [UsersController::class, 'show'])->middleware('auth','adminAccess');
Route::get('/admin/user/add', [UsersController::class, 'show'])->middleware('auth','adminAccess');
Route::get('/admin/user/edit/{id}', [UsersController::class, 'edit'])->middleware('auth','adminAccess');
Route::post('/admin/user/userdetail', [UsersController::class, 'getUserDetail'])->middleware('auth','adminAccess');

//Route::post('/admin/user/create', [UsersController::class, 'create'])->middleware('auth','adminAccess');
Route::post('/admin/user/update', [UsersController::class, 'update'])->middleware('auth','adminAccess');


Route::get('/admin/signout', function(){
    Auth::logout();    
    return redirect('/admin/login')->with('success', 'Logged Out Successfully!');
})->name('adminsignout');

/**   */