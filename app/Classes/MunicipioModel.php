<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;

/**
 * Description of MunicipioModel
 *
 * @author Carl Sagan
 */
class MunicipioModel {
    //put your code here
    
    public function GetListaMunicipios() {
        return \App\municipio::all();        
    }
    
    public function GetMunicipioEspecifico(){
        return \App\municipio::find($listaCondominio -> municipio_idmunicipio);
        
    }
}
