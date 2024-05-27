<?php

namespace App\Http\Controllers\AdministracaoDagoba\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    //retorna numero de condominios novos, ainda não ativados
    public function ConsultarInfCondominios(){
        
        $data = array();
        
        $condominio = new \App\Classes\CondominioModel();
        return $condominio ->ConsultarCondominiosDesativados();        
        
         
    }
}
