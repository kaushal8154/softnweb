<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendStatusUpdateEmail;

use App\Models\Complaint;

class ComplaintController extends Controller
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

    public function deleteComplaint(Request $request){
        $request->validate([
            'cmpid' => 'required|numeric',                        
        ]);        

        $authid = Auth::id();
        $exists = Complaint::where(['id'=>$request->cmpid,'user_id'=>$authid])->exists();
        if (!$exists) {
            $response = array('success'=>false,'message'=>'Invalid Request!','data'=>[]);
            return response()->json($response);
        }

        Complaint::find($request->cmpid)->delete();
        $response = array('success'=>true,'message'=>'Success!','data'=>[]);
        return response()->json($response);

    }

    public function updateComplaintStatus(Request $request){
        $request->validate([
            'cmpid' => 'required|numeric',            
            'status' => 'required|in:open,resolved,inprogress,unavailable,closed',            
        ]);        

        $authid = Auth::id();
        $exists = DB::table("complaints")->where(['id'=>$request->cmpid,'techie_id'=>$authid])->exists();

        if(!$exists){
            $response = array('success'=>false,'message'=>'Invalid Request!','data'=>[]);
            return response()->json($response);
        }
        
        $complaint = Complaint::find($request->cmpid);
        $complaint->status = $request->status;
        $complaint->save();

        $userInfo = DB::table("users")->select("firstname","lastname","email")->where('id',$complaint->user_id)->first();

        $mailData = [ 
                        'username'=>$userInfo->firstname." ".$userInfo->lastname,
                        'useremail'=>$userInfo->email,
                        'complaint_sub'=>$complaint->subject,                      
                    ];
        dispatch(new SendStatusUpdateEmail($mailData));
        //SendStatusUpdateEmail::dispatch($mailData);

        $response = array('success'=>true ,'message'=>'success!','data'=>[]);
        return response()->json($response);

    }

    public function assignComplaint(Request $request){
        $request->validate([
            'cmpid' => 'required|numeric',            
            'techie_id' => 'required|numeric',            
        ]);    

        $user_type = DB::table("users")->where('id',$request->techie_id)->value('user_type');
        if($user_type != 'techie'){
            $response = array('success'=>false ,'message'=>'Invalid Request!','data'=>[]);
            return response()->json($response);                    
        }
        
        $complaint = Complaint::find($request->cmpid);        
        $complaint->techie_id = $request->techie_id;        
        $complaint->save();

        $response = array('success'=>true ,'message'=>'success!','data'=>[]);
        return response()->json($response);

    }

    public function getComplaintList(Request $request){

        $request->validate([
            'page' => 'numeric',            
        ]);    

        $page = isset($request->page) ? $request->page : 1;        
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $status = isset($request->status) ? $request->status : 'all';        

        $query = DB::table("complaints")
                        ->select("complaints.*","u.firstname","u.lastname","t.firstname as techie_fname","t.lastname as techie_lname")
                        ->leftJoin("users as u","u.id","complaints.user_id")
                        ->leftJoin("users as t","t.id","complaints.techie_id")
                        ->where('complaints.deleted_at','=',null);                                       
                       
        if($status != 'all'){
            $query->where("complaints.status",$status);
        }
        
        $query->offset($offset)->limit($limit)
                ->orderBy('id','desc');

        $complaints = $query->get();
        //dd($complaints);

        if($complaints->isEmpty()){
            $response = array('success'=>false,'message'=>'Not found','data'=>[]);
            return response()->json($response);
        }
                
        $response = array('success'=>true ,'message'=>'','data'=>$complaints);
        return response()->json($response);
    }

    public function getAssignedComplaints(Request $request){
        $authid = Auth::id();

        $request->validate([
            'page' => 'numeric',            
        ]);    

        $page = isset($request->page) ? $request->page : 1;        
        $status = isset($request->status) ? $request->status : 'all';        
        $limit = 5;
        $offset = ($page - 1) * $limit;        

        $query = DB::table("complaints")
                        ->select("*")   
                        ->where('deleted_at','=',null)                                        
                        ->where('techie_id',$authid);                                        

        if($status != 'all'){
             $query->where("status",$status);
        }
        
        $query->offset($offset)->limit($limit)
                ->orderBy('id','desc');

        $complaints = $query->get();
        //dd($complaints);

        if($complaints->isEmpty()){
            $response = array('success'=>false,'message'=>'Not found','data'=>[]);
            return response()->json($response);
        }
        
        $response = array('success'=>true ,'message'=>'','data'=>$complaints);
        return response()->json($response);

    }

    public function getMyComplaints(Request $request){
        $authid = Auth::id();

        $request->validate([
            'page' => 'numeric',            
        ]);    

        $page = isset($request->page) ? $request->page : 1;        
        $status = isset($request->status) ? $request->status : 'all';        
        $limit = 5;
        $offset = ($page - 1) * $limit;        

        $query = DB::table("complaints")
                        ->select("*")   
                        ->where('deleted_at','=',null)                                        
                        ->where('user_id',$authid);                                        

        if($status != 'all'){
             $query->where("status",$status);
        }
        
        $query->offset($offset)->limit($limit)
                ->orderBy('id','desc');

        $complaints = $query->get();
        //dd($complaints);

        if($complaints->isEmpty()){
            $response = array('success'=>false,'message'=>'Not found','data'=>[]);
            return response()->json($response);
        }
        
        $response = array('success'=>true ,'message'=>'','data'=>$complaints);
        return response()->json($response);

    }

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
        $request->validate([
            'subject' => 'required',
            'description' => 'required',        
        ]);  
        
        $authid = Auth::id();
        //$uuid = Str::uuid();

        $complaint = new Complaint;
        //$complaint->uuid = $uuid;
        $complaint->user_id = $authid;
        $complaint->subject = $request->subject;
        $complaint->description = $request->description;
        $complaint->save();

        $response = array('success'=>true ,'message'=>'Complaint Submitted!','data'=>[]);
        return response()->json($response);

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
}
