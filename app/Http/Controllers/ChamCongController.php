<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cham_Cong;


class ChamCongController extends Controller
{
    public function getCham_Cong(){
        $model = new Cham_Cong();
        $data = $model->GetCham_cong();
        return  response()->json($data);
        
    }
}
