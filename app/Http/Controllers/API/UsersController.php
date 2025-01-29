<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){

    }

    public function dummyAPIdata(){

        $data = array();
        $data['page_content']="This is dummy string.";

        $response = array('success'=>true ,'message'=>'','data'=>[$data]);
        return response()->json($response);
    }
}
