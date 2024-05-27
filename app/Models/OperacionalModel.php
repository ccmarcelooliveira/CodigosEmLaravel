<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * OBJETIVO: Guardar métodos importantes avulsos
 */

namespace App\Classes;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

/**
 * Description of OperacionalModel
 *
 * @author Celia Regina
 */

class OperacionalModel {
    //put your code here
  
    //VAI RECEBER O TIPO DE MENU A SER EXIBIDO: NOR -> NORMAL; AV1 -> AVANCADO 1; AV2 -> AVANCADO 2
    public function recuperaNomeBlade($CLASSE_MENU){
    
        $retorno = "";
        
        /*$condominio = \App\Condominio::find(Auth::user()->condominio_idcondominio);   
        $link = $condominio->CmpLink;*/

        $variavel = new \App\Classes\VariavelModel();
        $pasta = $variavel->ConsultaVariavel(Auth::user()->oficina_idoficina,"pasta");

        $perfil_object = \App\Perfil::find(Auth::user()->perfil_idperfil);        
        $perfil = $perfil_object->CmpSigla;
                
        /*if($CLASSE_MENU == "nor"){
            $retorno = "master.clientes.".$pasta.".".$link."_".$perfil;
        }
        if($CLASSE_MENU == "av1"){
            $retorno = "master.clientes.".$pasta.".".$link."_".$perfil."_AVA";
        }
        if($CLASSE_MENU == "av2"){
            $retorno = "master.clientes.".$pasta.".".$link."_".$perfil."_AVA2";
        }*/
        
        //echo $retorno;
        return $retorno;
             
         
    }
        
    public function recuperaPerfil(){
    
        
        $perfil = \App\Perfil::find(Auth::user()->perfil_idperfil);
        
        return $perfil_sigla = $perfil->CmpSigla;            
         
    }
    
    
}
