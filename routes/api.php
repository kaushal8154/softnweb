<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\API\UsersController;


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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('/signin', function (Request $request) {  // /sanctum/token
    //dd($request->email);

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);    
    //dd($request->password);
    $user = User::where('email', $request->email)->first();    
     
    if (! $user || ! Hash::check($request->password, $user->password)) {
        
        /* throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]); */

        $data = array();        

        $response = array('status'=>false,'message'=>'Incorrect Email or Password','data'=>$data);
        return response()->json($response);

    }
 
    //return $user->createToken($request->device_name)->plainTextToken;
    $token = $user->createToken($request->device_name,['*'],now()->addMinutes(60))->plainTextToken;
    $response = array('status'=>true,'message'=>'Logged In Succesfully!','token'=>$token,'data'=>[]);
    return response()->json($response);
});

Route::get('/dummyData', [UserController::class, 'dummyAPIdata'])->middleware('auth:sanctum');
//Route::get('/dummyData', [UsersController::class, 'dummyAPIdata']);

/* Route::delete('/deleteYoaks/{id}',function(){
    return response()->json("$id hhh",200);
}); */