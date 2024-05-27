<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
use Illuminate\Support\Facades\DB;

/**
 * Description of Nacionalidade
 *
 * @author Carl Sagan
 */
class Nacionalidade {
    //put your code here
    
    public function ConsultarNacionalidade($id){

        $results = DB::table('nacionalidades')                                          
                                ->select('nacionalidades.*')
                                ->where('nacionalidades.CmpStatus', '=', 'ATV');
        
                                if($id != "") $results = $results ->where('nacionalidades.idnacionalidade', '=', $id);
        
                               return $results = $results ->get();


      
    }
    
     public function DescricaoNacionalidade($lista){
     
        foreach($lista as $item){
            return $item -> CmpDescricao;
        }
    }
     
}
