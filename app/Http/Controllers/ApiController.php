<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
   
   
    function ajax_opration() 
    {
        return  $result  = DB::table('employee')->get();
    }


 function ajaxinsert()
 {
     return "test Ok";
 }

 // test





















}
