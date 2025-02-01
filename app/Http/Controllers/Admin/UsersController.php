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

        $pageData = [];
        return view('admin.users.list',['pageData'=>$pageData]);
    }

    public function getUserDetail(Request $request){
        $credentials = $request->validate([
            'userid' => ['required', 'numeric'],            
        ]);


        $apiData = [];
        $response = ['success'=>false,'message'=>'','data'=>$apiData];
        
        return response()->json($response);

    }

    public function show($userid=0){                 
        
        $user = DB::table("users")->where('id',$userid)->first();        
        if(empty($user)){
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        $pageData = $user;
        return view('admin.users.show',['pageData'=>$pageData]);
    }

    public function edit($userid=''){         

        $pageData = [];
        return view('admin.users.add',['pageData'=>$pageData]);
    }

    public function create(Request $request){         

        $pageData = [];
        return view('admin.users.add',['pageData'=>$pageData]);
    }

    public function update(Request $request){         
        
        $pageData = [];
        return view('admin.users.list',['pageData'=>$pageData]);
    }

    // This is pagination function
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
            $uid = $item->id;
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

            
            //$item->actions = "<a href='".url('admin/user/view/'.$uid)."' class='btn btn-block bg-gradient-primary btn-xs' >View</a>  ";
            $item->actions = "<a href='javascript:void(0);' data-toggle='modal' data-target='#modal-lg' class='btn btn-block bg-gradient-primary btn-xs view-info' data-rid='".$item->id."' >View</a> ";
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
