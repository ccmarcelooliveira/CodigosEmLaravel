<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
use Illuminate\Support\Facades\DB;
/**
 * Description of Naturalidade
 *
 * @author Carl Sagan
 */
class Naturalidade {
    //put your code here
    
    //CONSULTAR APARTAMENTO COM ARGUMENTOS
    //31/12/2017
    public function ConsultarNaturalidade($idNaturalidade, $idNacionalidade)
    {              
        $results = DB::table('naturalidades')                                          
                                ->select('naturalidades.*')
                                ->where('naturalidades.CmpStatus', '=', 'ATV')
                                ->where('naturalidades.nacionalidade_idnacionalidade', '=', $idNacionalidade);
        if($idNaturalidade != null && $idNaturalidade != "") $results = $results ->where('naturalidades.idnaturalidade', '=', $idNaturalidade);
        return $results = $results ->get();

    }
    
    public function ConsultarNaturalidadePorId($id)
    {
        return $results = DB::table('naturalidades')                                          
                                ->select('naturalidades.*')
                                ->where('naturalidades.CmpStatus', '=', 'ATV')                                                 
                                ->get();


    }
    
    //CONSULTAR APARTAMENTO COM ARGUMENTOS
    //18/06/2020
    public function ConsultarNaturalidadePorNacionalidade($idNacionalidade)
    {  
        $results = DB::table('naturalidades')                                          
                                ->select('naturalidades.idnaturalidade','naturalidades.CmpDescricao','naturalidades.CmpSigla')
                                ->where('naturalidades.nacionalidade_idnacionalidade', '=', $idNacionalidade)                                                 
                                ->orderBy('CmpDescricao')
                                ->get();
        
        return $results;
    }
    
    public function DescricaoNaturalidade($lista){
     
        foreach($lista as $item){
            return $item -> CmpDescricao;
        }
    }    
}
