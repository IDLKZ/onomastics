<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class AuthController extends Controller
{
    public function login(){
        $validator = JsValidator::make(["email"=>"required|email","password"=>"required|min:4"]);
        return view("login",compact("validator"));
    }

    public function auth(Request $request){
        $this->validate($request,["email"=>"required|email","password"=>"required|min:4"]);
        if(auth()->attempt(["email"=>$request->email,"password"=>$request->password])){
            switch (Auth::user()->role_id){
                case 1:{
                    return redirect()->route("adminHome");
                }
                case 2:{
                    return redirect()->route("adminHome");
                }
                default:{
                    return  redirect("/");
                }
            }
        }
        else{

            return redirect()->route("login")->withErrors(["attempt"=>__("auth.failed")]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
}
