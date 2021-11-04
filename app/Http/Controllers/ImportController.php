<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Imports\StaffImport;
use App\Imports\cham_cong_Import;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
  
class ImportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        $validatedData = $request->validate([
 
            'file' => 'required|mimes:xls,xlsx',
  
         ]);
        Excel::import(new StaffImport,request()->file('file'));
        Toastr::success('Imported successfully:)','Success'); ;
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function cham_cong_import(Request $request) 
    {
        $validatedData = $request->validate([
 
            'file' => 'required|mimes:xls,xlsx',
  
         ]);
        Excel::import(new Cham_Cong_Import,request()->file('file'));
        Toastr::success('Imported successfully:)','Success'); ;
        return back();
    }
}