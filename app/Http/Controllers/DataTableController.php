<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Jobs\SendWelcomeEmail;
use App\Models\Student;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Events\UserRegistered;

class DataTableController extends Controller
{
    //
    public function index(){

        $students = Student::all();
        //$pageData['students']=$students;
        $pageData = [];
        return view('student_datatable',['pageData'=>$pageData]);
    }

    public function getStudentList(Request $request)
    {
        //
        $allInputs = $request->all();
        //dd($allInputs);
        $searchval = $allInputs['search']['value'];        

        $response = [];
        $page=1;
        $offset=0;
        $per_page =  isset($request->length) ? $request->length : 10;
        //$offset = (($page - 1) * $per_page);
        $offset = isset($request->start) ? $request->start : 0;

        if(trim($searchval) != ''){
            $totalRecs = Student::where('firstname','like',"%$searchval%")->orWhere('lastname','like',"%$searchval%")->count();
            $students = Student::where('firstname','like',"%$searchval%")->orWhere('lastname','like',"%$searchval%")->offset($offset)->limit(10)->get();
        }else{
            $totalRecs = Student::count();
            $students = Student::offset($offset)->limit(10)->get();
        }
        
        
        $dataTableSet = [
            'draw'=>$page,
            'recordsTotal'=>$totalRecs,
            'recordsFiltered'=>$totalRecs,
            'data'=>[],
        ];
        //$dataTableSet['data'] = [];

        foreach($students as $student){
            $dataTableSet['data'][] = array(
                'sid'=>$student->id,        
                'student_name'=>$student->firstname." ".$student->lastname,
                'email'=>$student->email,     
                'gender'=>$student->gender == 'm' ? 'Male' : 'Female',           
            );    
        }
        //dd($dataTableSet);

        //$tempstr='["draw":1,"recordsTotal":12,"recordsFiltered":12,"data":[["sid":1,"student_name":"KaushalKapadiya","email":"kaushal@gmail.com","gender":"Male"],["sid":2,"student_name":"DharmikKapadiya","email":"kaushal@gmail.com","gender":"Male"],["sid":3,"student_name":"RohitSharma","email":"kaushal@gmail.com","gender":"Male"],["sid":4,"student_name":"AnushkaSharma","email":"kaushal@gmail.com","gender":"Male"],["sid":5,"student_name":"ViratKohli","email":"kaushal@gmail.com","gender":"Male"],["sid":6,"student_name":"AmishaPatel","email":"kaushal@gmail.com","gender":"Male"],["sid":7,"student_name":"UrvashiRoutela","email":"kaushal@gmail.com","gender":"Male"],["sid":8,"student_name":"KaushalKapadiya","email":"kaushal@gmail.com","gender":"Male"],["sid":9,"student_name":"KaushalKapadiya","email":"kaushal@gmail.com","gender":"Male"],["sid":10,"student_name":"KaushalKapadiya","email":"kaushal@gmail.com","gender":"Male"]]]';
        //return $tempstr;

        return response()->json($dataTableSet);
        
    }
}
