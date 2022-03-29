<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Homemodel;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Arr;
use App\Exports\BulkExport;
use App\Imports\BulkImport;
use Maatwebsite\Excel\Facades\Excel;
 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;

class HomeController extends Controller
{

//     public function __construct() {
//       $this->middleware('auth');
//    }
     
    function Homepage()
    {   
      
        return view('Dashboard');
    }


    function crud_opration()
    { 
        $result = DB::table('employee')->paginate(5);
        // echo "<pre>";
        // print_r($result);
        // die;
      return view('user/crud',compact("result"));  
    }


    function Insert_crud(Request $request)
    { 
        
        $role= (rand(1,5));

        $result = DB::table('employee')->insertGetId(array(
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),            
            'designation' => $request->input('designation'),            
            'role' => $role,            
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ));

        echo "Record inserted successfully. $result <br/>";
        echo '<pre><a href = "/CRUD">Click Here</a> to go back.';
       echo "test"; 
       die;
    }



function ajax_opration()
{
    $result  = DB::table('employee')->paginate(5);;
    
 
  return view('user/ajax',compact("result")); 
}


function getemployeetable()
{
      $result = DB::table('employee')->get();

}


function ajaxinsert(Request $request)
    {   
       

        $role= (rand(1,5));
        $dataResult = DB::table('employee')->insertGetId(array(
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'mobile' => $request->input('mobile'),            
            'designation' => $request->input('designation'),            
            'role' => $role,            
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ));

      

        return response()->json([
            'success' => true,
            'message' => 'Employee successfully Added',
        ]);
}

function ajaxedit(Request $request)
{
$role= (rand(1,5));
$affectedRows = Homemodel::where("id", $request->input('id'))->update(["name" => $request->input('name'),
    "address" => $request->input('address'),
    "mobile" => $request->input('mobile'),
    "designation" => $request->input('designation')


]);

return response()->json([
            'success' => true,
            'message' => 'Employee  Update successfully',
        ]);
}



function edit_employee()
{
    $id =  $_GET['id'];
     
   $emp_info= Homemodel::where('id',"=", $id)->first();


  
    return json_encode($emp_info);

}

function deleteemployee(Request $request){
    $id=$request->input('id');

    $result=Homemodel::where('id','=',$id)->delete();
    
    if($result == true){
        $response=Array(
            'status'=>true,
            'alerttype'=>'success',
            'massage'=>'Employee Deleted Successfull..!'
        );
        return $response;
    }else{
        $response=Array(
            'status'=>false,
            'alerttype'=>'error',
            'massage'=>'Deleting Error..Employe id can not find...!'
        );
        return $response;
    }
   
}







//Login

 
public function AutoCity()
{ 
    return view('user/autocity');
  //  return view('user/autocity',compact("result"));
    
    
}

function SignoutUser(Request $request) {
    
   
      Auth::logout();
      return redirect()->route('login_View');
    }














}
