<?php

namespace App\Http\Controllers;

//use App\Jobs\SendWelcomeEmail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Events\UserRegistered;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$response = [];
        $students = Student::all();
        //dd($students);
        
        $pageData['students']=$students;
        return view('studentlist',['pageData'=>$pageData]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function getStudentList(Request $request)
    {
        //
        $response = [];
        $students = Student::all();

        $dataTableSet = ['data'];
        foreach($students as $student){
            $dataTableSet['data'][] = array(
                $student->id,        
                $student->firstname."" .$student->lastname,
                $student->email,     
                $student->gender == 'm' ? 'Male' : 'Female',           
            );    
        }

        return response()->json($dataTableSet);
        
    }
 */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if($request->ajax()){
            
            $validated = $request->validate([ 
                'firstname' => 'required|max:255',
                'lastname' => 'required',
                'email' => 'required|email|max:255',
                'gender' => 'required',
            ]);

            $data = [];            
            $studentEmail = Student::where('email', $request->email)->count();
            if($studentEmail >=1){
                $response = array('status'=>0,'message'=>'Student Email alreay Exist!','data'=>$data);
                return response()->json($response);
            }else{

                $student = new Student; 
                $student->firstname = $request->firstname;  
                $student->lastname = $request->lastname; 
                $student->email = $request->email; 

                $hashpassword = Hash::make($request->password);
                $student->password = $hashpassword; 
                $student->gender = $request->gender; 
                $student->status = 1; 

                $student->save();

                $studentlisthtml="";
                $students = Student::all();    
                $pageData['students']=$students;
                $studentlisthtml = view('students.list',['pageData'=>$pageData])->render();
                //dd($studentlisthtml);

                $data['listrows']=$studentlisthtml;
                $response = array('status'=>1,'message'=>'Student Added!','data'=>$data);
                
                //dispatch_now(new SendWelcomeEmail($student));
                event(new UserRegistered($student));

                return response()->json($response);

            }      
            
        }
        
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required',
            'email' => 'required|email|max:255',
            'gender' => 'required',
        ]);

        $studentEmail = Student::where('email', $request->email)->count();
        if($studentEmail >=1){
            return redirect('studentlist')->with('errmessage', 'Student Email alreay Exist!');
        }        


        $student = new Student; 
        $student->firstname = $request->firstname;  
        $student->lastname = $request->lastname; 
        $student->email = $request->email; 

        $hashpassword = Hash::make($request->password);
        $student->password = $hashpassword; 
        $student->gender = $request->gender; 
        $student->status = 1; 

        $student->save();


        return redirect('studentlist')->with('sucmessage', 'Student Added!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
