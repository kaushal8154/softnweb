<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\ComplaintController;


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

Route::post('/signup', function (Request $request) {  
    $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'type' => 'required|in:user,techie',
        'email' => 'required|email',        
        'password' => 'required',        
    ]);
    //dd("here");

    //$emailExist = User::where('email', $request->email)->count();  
    $emailExist = User::where('email', $request->email)->exists();  

    if($emailExist == 1){
        $response = array('success'=>false,'message'=>'Email already exists!','data'=>[]);
        return response()->json($response);
    }

    $hashedPassword = Hash::make($request->password);
    User::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'password' => $hashedPassword,
    ]);

    $response = array('success'=>true,'message'=>'Registered Succesfully!','data'=>[]);

    return response()->json($response);

});

Route::post('/raiseComp',[ComplaintController::class, 'store'])->middleware('auth:sanctum','customerAccess'); 
Route::post('mycomplaints',[ComplaintController::class, 'getMyComplaints'])->middleware('auth:sanctum','customerAccess'); 
Route::post('/deleteComplaint',[ComplaintController::class, 'deleteComplaint'])->middleware('auth:sanctum','customerAccess'); 


Route::post('complaintList',[ComplaintController::class, 'getComplaintList'])->middleware('auth:sanctum','adminAccess'); 
Route::post('assignComplaint',[ComplaintController::class, 'assignComplaint'])->middleware('auth:sanctum','adminAccess'); 


Route::post('assignedcomplaints',[ComplaintController::class, 'getAssignedComplaints'])->middleware('auth:sanctum','techieAccess'); 
Route::post('updateCmpStatus',[ComplaintController::class, 'updateComplaintStatus'])->middleware('auth:sanctum','techieAccess'); 




Route::post('/signin', function (Request $request) {  
    //dd($request->email);

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',        
    ]);    
    //dd($request->password);
    $user = User::where('email', $request->email)->first();    
     
    if (! $user || ! Hash::check($request->password, $user->password)) {
        
        /* throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]); */

        $data = array();        

        $response = array('success'=>false,'message'=>'Incorrect Email or Password','data'=>$data);
        return response()->json($response);

    }
 
    //return $user->createToken($request->device_name)->plainTextToken;
    $device_name = isset($request->device_name) ? $request->device_name : '';
    $token = $user->createToken($device_name,['*'])->plainTextToken;
    $response = array('success'=>true,'message'=>'Logged In Succesfully!','token'=>$token,'data'=>[]);
    return response()->json($response);
});
