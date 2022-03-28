<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;


class FileController extends Controller
{
   



function File_Import()
{

    return view('user/File_Import'); 
}




function import(Request $request)
{
    $result= Excel::import(new UsersImport, $request->file('file')->store('temp'));
  
    $response=([
        'status'=> 200,
        'massage'=> "Your file Import succesfully",
        'data'=> $result
    ]);
    
 return   back($response);
    
}

function File_export()
{
    return Excel::download(new UsersExport, 'users-collection.xlsx');
}
















}
