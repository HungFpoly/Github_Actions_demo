<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use DB;
use Session;

class FormController extends Controller
{
    // view form
    public function index()
    {
        $staff = Staff::all();
         return response()->json($staff);
    }


    // view update
    public function getStaffById($id){
        $staff = Staff::find($id);
        return response()->json($staff::find($id), 200);

    }
    public function staffUpdate(Request $request, $id)
    {
        $image = time().'.'.$request->anh->extension();  
        $request->anh->move(public_path('images'), $image);
        $staff = Staff :: find($id)->update([
            'ma_nhan_vien'     => $request->ma_nhan_vien,
            'ten_nhan_vien'          => $request->ten_nhan_vien,
            'anh' => $image,
            'ngay_sinh' => $request->ngay_sinh,
            'dia_chi'     => $request->dia_chi,
            'dia_chi_thuong_tru'   => $request->dia_chi_thuong_tru,
            'cmnd'       => $request->cmnd,
            'email'       => $request->email,
            'sdt' => $request->sdt,
            'quoc_tich'       => $request->quoc_tich,
            'gioi_tinh'       => $request->gioi_tinh,
        ]);
        return response()->json([
            'success' => 'Update successfully'
        ], Response::HTTP_OK);
          
    }

    // save 
    public function staffAdd(Request $request)
    {
        $request->validate([
            'ma_nhan_vien'     => 'required|string|max:255|unique:staff',
            'ten_nhan_vien'          => 'required',
            'ngay_sinh' => 'required|date|min:9',
            'dia_chi'     => 'required|string|max:255',
            'dia_chi_thuong_tru'   => 'required|string|max:255',
            'cmnd'       => 'required|max:255',
            'email'       => 'required|email|max:255',
            'sdt' => 'required|max:255',
            'quoc_tich'       => 'required|string|max:255',
            'gioi_tinh'       => 'required|string|max:255',
        ]);
        $image = time().'.'.$request->anh->extension();  
        $request->anh->move(public_path('images'), $image);
        $staff = Staff :: create([
            'ma_nhan_vien'     => $request->ma_nhan_vien,
            'ten_nhan_vien'          => $request->ten_nhan_vien,
            'anh' => $image,
            'ngay_sinh' => $request->ngay_sinh,
            'dia_chi'     => $request->dia_chi,
            'dia_chi_thuong_tru'   => $request->dia_chi_thuong_tru,
            'cmnd'       => $request->cmnd,
            'email'       => $request->email,
            'sdt' => $request->sdt,
            'quoc_tich'       => $request->quoc_tich,
            'gioi_tinh'       => $request->gioi_tinh,
        ]);
         return response()->json([
             'success'=> 'Insert successfully'
         ], Response::HTTP_OK);
    }

    // view delete
    public function staffDelete($id)
    {
        $delete = Staff::find($id);
        $delete->delete();
        return response()->json([
            'success'=> 'Delete successfully'
        ], Response::HTTP_OK);
    }
}