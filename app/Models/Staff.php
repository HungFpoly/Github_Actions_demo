<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Staff extends Model
{

    protected $fillable = [
        'ma_nhan_vien',
        'ten_nhan_vien',
        'anh',
        'ngay_sinh',
        'dia_chi',
        'dia_chi_thuong_tru',
        'cmnd',
        'sdt',
        'email',
        'quoc_tich',
        'gioi_tinh'
    ];
    public function GetStaff()
    {
        try {
            return DB::table('staff as s')
            ->select( 's.ma_nhan_vien',
            's.ten_nhan_vien',
            's.anh',
            's.ngay_sinh',
            's.dia_chi',
            's.dia_chi_thuong_tru',
            's.cmnd',
            's.sdt',
            's.email',
            's.quoc_tich',
            's.gioi_tinh')
            ->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
