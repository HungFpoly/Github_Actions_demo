<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cham_Cong extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_nhan_vien',
        'checkin',
        'checkout',
        'ngay',
        'gio_checkin',
        'gio_checkout',
        'so_gio' ,
    ];
    public function GetCham_cong()
    {
        try {
            return DB::table('staff')
            ->join('cham__congs', 'staff.ma_nhan_vien', '=', 'cham__congs.ma_nhan_vien')
            ->select('staff.ma_nhan_vien', 'staff.ten_nhan_vien','staff.anh', 'cham__congs.ngay',
             'cham__congs.gio_checkin','cham__congs.gio_checkout','cham__congs.so_gio')
            ->get();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}