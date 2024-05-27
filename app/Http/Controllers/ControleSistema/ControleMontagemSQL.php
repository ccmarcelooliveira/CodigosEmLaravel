<?php

/**
 * Objetivo: Controlar e facilitar a manipulação de mensagens atraves do sistema
 */

namespace App\Http\Controllers\Master\ControleSistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControleMontagemSQL extends Controller
{
   
    public function Montar_AND_SQL($str){
        
        $i = 0;
        $flag_mont = 0;
        $flag_model = 0;
        $parenteses = "(";
        $sql = "";
        $LISTA = "";
        
        $str = explode(" ", $str); //SEPARA AS PARTES DA STRING, COM SEPARAÇÃO EM BRANCO
        
        //$lista_pecas = $lista_pecas . ")";      
        
        //if($montadora != "") $montadora =  " WHERE CmpAplicacao like '%".$montadora."%'";
       
        for ($i = 1; $i <= count($str); $i++){ 
            if($i > 1) $sql = $sql . " AND ";
            $sql = $sql . " CmpCategoria like '%".$str[$i]."%'";
        }
        
        $sql = $sql . " WHERE (".$sql.")";
        
        $results =  DB::select("SELECT DISTINCT CmpCategoria FROM pecas " . $sql); 
              
        return $results;
      
          
    }
    
    public function Montar_OR_SQL(){
        
        return "Ex.: R$ 1.000,00";
          
    }
}
