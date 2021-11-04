<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;



class ForgotPasswordController extends Controller
{
    public function sendEmail(Request $request){
        if(!$this->validateEmail($request->email)){
            return $this->failedResponse();
        }
        
        $this->send($request->email);
        return $this->successResponse();
    }
    public function send($email){
        $token = $this->createToken($email);
        Mail::to($email)->send(new ForgotPasswordMail($token));

    }
    public function createToken($email){
        $oldToken = DB::table('password_resets')->where('email', $email)->first();
        $token = Str::random(60);
        $this->saveToken($token, $email);
        return $token;
    }
    public function saveToken($token, $email){
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }
    public function validateEmail($email){
        return !!User::where ('email', $email)-> first();
    }
    public function failedResponse(){
        return response()->json([
            'error' => 'Email dose\'t found on our database'
        ], Response::HTTP_NOT_FOUND);
    }
    public function successResponse(){
        return response()->json([
            'success' => 'Reset Email is send successfull, please check your inbox'
        ], Response::HTTP_OK);
    }
}
