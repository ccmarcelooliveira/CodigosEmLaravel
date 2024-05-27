<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
/**
 * Description of BemModel
 *
 * @author Celia Regina
 */
class AnoModel {
    
      //CONSULTAS
    public function ConsultaAno() {
          
        $results = DB::table('resumo_previsao_orcamentarias') 
                               ->select('CmpAno')
                               ->where('condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                               ->max('CmpAno');
        return $results;
    }
    
    
}
