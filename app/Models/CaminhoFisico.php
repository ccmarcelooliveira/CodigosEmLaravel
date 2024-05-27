<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of CaminhoFisico
 *
 * @author Marcelo Fabiano
 */
class CaminhoFisico {
    //put your code here
     
    public function getCaminhoFisico($tipo)
    {   
        switch ($tipo) {            
           
            case "SEG":
                return new \App\Http\Controllers\Client\ControleSistema\SegurancaController();
                break;
            
            case "TELA":    
                return new \App\Http\Controllers\ControleSistema\ControleTelaController();
                break;
            
            case "OPE":    
                return new \App\Http\Controllers\Client\ControleSistema\OperacionalController();
                break;
            
            case "NOT":
                return new \App\Http\Controllers\Client\Comunicacao\Noticias\NoticiasController();
                break;
            
            case "UTIL":
                return new \App\Util\Util();
                break;
            
            case "OFILIST":
                return \App\Models\Negocio::all(); 
                break;
            
            case "OFIMODEL":
                return new \App\Classes\NegocioModel(); 
                break;
            
            case "NEG":
                return new \App\Http\Controllers\Admin\Negocio\NegocioController(); 
                break;
        }
    }    
    
}
