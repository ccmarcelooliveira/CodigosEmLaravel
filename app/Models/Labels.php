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
class Labels {
    //put your code here
    
    public function getLabels($tipo){                   
        
        switch ($tipo) {            
           
            case "CONSULTOFI":
                return "Negócio <small>Consultar</small>";
                break;
            
            case "CADOFI":
                return "Negócio <small>Cadastrar</small>";    
                
            case "TELA":    
                return new \App\Http\Controllers\Client\ControleSistema\ControleTelaController();
                
            case "OPE":    
                return new \App\Http\Controllers\Client\ControleSistema\OperacionalController();
                        
            case "NOT":
                return new \App\Http\Controllers\Client\Comunicacao\Noticias\NoticiasController();
                
            case "UTIL":
                return new \App\Util\Util();
                
            case "OFILIST":
                return \App\Models\Oficina::all(); 
        }
    }
}
