<?php

/**
 * Objetivo: Controlar e facilitar a manipulação de mensagens atraves do sistema
 */

namespace App\Http\Controllers\ControleSistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControleMensagem extends Controller
{
   
    public function MsgPadrao($label){
        
        return "Por favor, informe ".$label." correta(o)!";
          
    }
    
    public function MsgPadraoMoeda(){
        
        return "Ex.: R$ 1.000,00";
          
    }
}
