<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\StaffExport;
use App\Exports\Cham_Cong_Export;
use Maatwebsite\Excel\Facades\Excel;
  
class ExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new StaffExport, 'staff.xlsx');
    }
       /**
    * @return \Illuminate\Support\Collection
    */
    public function cham_cong_export() 
    {
        return Excel::download(new Cham_Cong_Export, 'cham_cong.xlsx');
    }
}