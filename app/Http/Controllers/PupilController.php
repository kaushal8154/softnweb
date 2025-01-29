<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
//use App\Events\UserRegistered;

class PupilController extends Controller
{
    //
    public function index(){
        /* $students = Student::all();
        $pageData = [];
        $pageData['students']=$students;
        return view('student_datatable',['pageData'=>$pageData]); */

        return view('pupilslist');

    }

    public function getData(Request $request){
        //$students = Student::all();
    
        $columns = ['id', 'name', 'email', 'created_at'];

        $query = Student::query();

        // Search functionality
        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search) {
                $q->where('firstname', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        // Ordering
        if ($request->input('order')) {
            $order = $request->input('order')[0];
            $column = $columns[$order['column']];
            $dir = $order['dir'];
            $query->orderBy($column, $dir);
        }

        // Pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $totalRecords = $query->count();

        $data = $query->skip($start)->take($length)->get();

        foreach($data as $item){
            $item->fullname = $item->firstname.' '.$item->lastname;
            $item->gender = $item->gender == 'm' ? 'male' : 'female';
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);

    }
}
