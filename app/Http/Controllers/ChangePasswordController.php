<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use DB;

class ChangePasswordController extends Controller
{
    public function process(ChangePasswordRequest $request){
        return $this->getPasswordResetTableRow($request)->count() > 0 ? $this->changePassword($request) : $this->tokenNotFoundResponse();
        

    }

    private function getPasswordResetTableRow($request){
        return DB::table('password_resets')->where(['email'=> $request->email, 'token' => $request->resetToken]);
    }
    private function changePassword($request){
        $user = User::Where('email', $request->email)->first();
        $user->update(['password'=> bcrypt($request->password)]);
        $this->getPasswordResetTableRow($request)->delete();
        return response()->json(['success' => 'Password Successfuly Changed'], Response::HTTP_CREATED);

    }
    private function tokenNotFoundResponse(){
        return response()->json(['error' => 'Token or Email is incorrect'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
