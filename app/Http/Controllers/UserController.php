<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    //
    public function index(){
        return view("index.page");
    }

    public function login(Request $request){
        $data = array();
        $data["projeto"] = "Praxos Auto";
        $data["logo_auto_azul"] = "Praxos Auto";
     
        return view("login.page",$data);        
    }

    public function auth(Request $request){
        //dd("AUTH");

        $data = array();
        $data["projeto"] = "Praxos Auto";
        $data["logo_auto_azul"] = "Praxos Auto";

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'E-mail é obrigatório',
            'password.required' => 'Senha é obrigatório'
        ]);
        
        if(Auth::attempt(['email' => $request ->email, 'password' => $request ->password] )){
            
            if(Auth::user() -> admin == 1){
                echo "Admin";
                return redirect()->intended('admin');
            }else{
                echo "Client";
                return redirect()->intended('client');
            }
            
        }else{            
            return redirect()->back()->with('danger','E-mail ou senha inválida.');
        }
    }    
}
