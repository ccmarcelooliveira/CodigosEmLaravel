<?php

namespace App\Http\Controllers\Client\ControleSistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Crypt;
use \Illuminate\Contracts\Encryption\DecryptException;

/**
 * Objetivo: Implementar um sistema de critpografia para aumentar a segunranca.
 * 
 */
class SegurancaController extends Controller
{
    public function cripto($valor){
        
        return Crypt::encrypt($valor);
        
    }
    
    public function decripto($valor) {
        
        try{            
            return Crypt::decrypt($valor);
            
        } catch (DecryptException $e){
            echo "ERRO DEC";
        }    
    }
}
