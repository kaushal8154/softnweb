<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
//use App\Events\UserRegistered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login() 
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'firstname' => 'required|max:250',
            'lastname' => 'required|max:250',
            'email' => 'required|email|max:250',
        ]);
        //dd("here");
        $postData = $request->all();
        $pageData = [];
        //dd($postData);
        extract($postData);
        
        $userfound = User::where('email', $email)->count();
        if($userfound > 0){
            //$pageData['error']="Email already registered";
            session(['msgType' => 'error','msgClass' => 'alert-danger','message' => 'Email already registered']);
            //return redirect('/user/create');
            return redirect('/register');
        }        

        $newfilename="";
        if($request->hasFile('profilephoto')){
            /* if ($request->file('photo')->isValid()) {

            } */            

            $fileuserphoto = $request->file('profilephoto'); 
            //$filename = $fileuserphoto->getClientOriginalName();
            $extension = $fileuserphoto->getClientOriginalExtension();
            $randomStr = Str::random(15);
            $newfilename = $randomStr.".$extension";

            /* $filepath = $request->file('profilephoto')->store(
                'avatars/'.$newfilename,
            );     */

            $path = $request->file('profilephoto')->storeAs(
                'public/avatars',
                $newfilename
            );

        }

        $current_timestamp = time();
        $current_datetime = date('Y-m-d H:i');

        $userModel = new User; 
        $userModel->firstname = $firstname;
        $userModel->lastname = $lastname; 
        $userModel->email = $email; 
        $userModel->profile_photo = $newfilename;         
        $userModel->password = Hash::make($password);        
        $userModel->created_at = $current_timestamp;
        $userModel->updated_at = $current_timestamp;
        //$userModel->created_date = $current_datetime;
        //$userModel->updated_date = $current_datetime;

        $userModel->save();    

        /** Send Admin email  */
        //event(new UserRegistered($userModel));

        /* $adminemail = 'kaushalkapadiya@gmail.com'; 
        $mailBody = array('firstname'=>'ABC','lastname'=>'XYZ');
        Mail::send('mails.registration',$mailBody, function($message) use ($adminemail)
        {    
            $message->to($adminemail)->subject('This is test e-mail');    
        }); */

        /** ------------------  */

        /* session(['msgType' => 'success','message' => 'Registered Successfully! Please Log In to continue.']); */
        session(['msgType' => 'error','msgClass' => 'alert-success','message' => 'Registered Successfully! Please Log In to continue.']);
        return redirect('/login');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**   */

    public function dummyAPIdata(){

        $data = array();
        $data['page_content']="This is dummy string.";

        $response = array('success'=>true ,'message'=>'','data'=>[$data]);
        return response()->json($response);
    }
}
