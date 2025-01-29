<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function index(){         
        return view('admin.users.list');
    }

    public function getUsersData(Request $request){
        //$students = Student::all();
    
        $columns = ['id', 'name', 'email', 'created_at'];

        $offset=$request->start;
        $limit=$request->length;

        /* $totalRecords = DB::table("users")->count();
        $data = DB::table("users")->offset($offset)->limit($limit)->get();         */

        $search_val = $request->search['value'];
        $orderColumn = $request->order[0]['column'];
        if($orderColumn){
            $orderBy = 'id';
        }

        switch($orderColumn){
            case 0:
                $orderBy = 'id';
                break;
            case 1:
                $orderBy = 'firstname';
                break;    
            case 2:
                $orderBy = 'firstname';
                break; 
            case 4:
                    $orderBy = 'created_at';
                    break;            
            default:    
                $orderBy = 'id';            
        }

        $order = $request->order[0]['dir'];

        $query = DB::table('users')->select('*');
        if(trim($search_val) != ''){
            $query->where("firstname","like","%$search_val%");
            $query->orWhere("lastname","like","%$search_val%");
            $query->orWhere("email","like","%$search_val%");
        }

        $totalRecords = $query->count();
        $data = $query->offset($offset)->orderBy($orderBy,$order)->limit($limit)->get();

        foreach($data as $item){
            $item->fullname = $item->firstname.' '.$item->lastname;
            $item->date = date("Y-m-d H:i:s",strtotime($item->created_at));
            //$imgurl = url('user_photos/'.$item->profile_photo);
            $img_path = storage_path("app/public/user_photos/".$item->profile_photo);
            if(trim($item->profile_photo) != '' && file_exists($img_path)){
                $imgurl = asset('storage/user_photos/'.$item->profile_photo);
                $item->profile_photo = "<img src='".$imgurl."' width='70' />";    
            }else{
                
                $item->profile_photo = "";
            }

           
            $item->actions = "<a href='javascript:void(0)' class='btn btn-block bg-gradient-primary btn-xs' >View</a>  ";
            $item->actions.= "<a href='javascript:void(0)' class='btn btn-block bg-gradient-secondary btn-xs' href='#' >Edit</a>  ";
            $item->actions.= "<a href='javascript:void(0)' class='btn btn-block bg-gradient-danger btn-xs' href='#' >Delete</a>  ";
            
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }
}
