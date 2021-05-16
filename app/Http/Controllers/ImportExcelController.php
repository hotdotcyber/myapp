<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Imports\CsvDataImport;


class ImportExcelController extends Controller
{
   function index(){
  $data=DB::TABLE('customer_models')->orderBy('name','DESC')->get();
   }

   function import(Request $request)
    { 
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();
    // $data = Excel::load($path)->get();

     $data = Excel::import(new  CsvDataImport, $path);
     //$path = $request->file('select_file');
     //$data = Excel::import(new UserNamesImport, $path);
     /*
     dd($data);
     if($data->count()>0){
         foreach($data->toArray() as $key =>$value){
             foreach($value as $row){
                 $insert_data[]=array(
                    'name'  => $row['name'],
                    'phoneno' => $row['phoneno'],
                    'email'   => $row['email'],
                    'type'    => $row['type']
                 );
             }
         }
         if(!empty($insert_data)){
            DB::table('customer_models')->insert($insert_data);
         }
         */
     }

    // return response()->json(['message' => 'uploaded successfully'], 200);
    
}

