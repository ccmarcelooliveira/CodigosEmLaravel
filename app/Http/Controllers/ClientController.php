<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class ClientController extends Controller
{
    public function index(Request $request){        
       
        $controller = new \App\Http\Controllers\Client\Apresentacao\ApresentacaoController();
        $data = array();
        //echo "primeiro acesso";
        //A APRESENTACAO PODE SER NOTICIA OU DASHBOARD.
        return $controller -> ConsultarInfApresentacao("not","","",$request);
        
       //s return view('cliente.dashboard.dashboard', $data);
        
    }
    
    //SAÃDA DO SISTEMA
    public function sair(){
        
        Auth::logout();
        return redirect()->intended('/');
    }
    
    
}
