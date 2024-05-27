<?php

namespace App\Http\Controllers\Client\ControleSistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Hash;
use Auth;

class OperacionalController extends Controller
{
    public function montaNomeLinkBlade($CLASSE_MENU){
        $operacional = new \App\Classes\OperacionalModel();
        //$perfil = $operacional -> recuperaPerfil();
        return $operacional -> recuperaNomeBlade($CLASSE_MENU);
    }
    
    public function perfil(){
        $operacional = new \App\Classes\OperacionalModel();
        return $operacional ->recuperaPerfil();
    }
}
