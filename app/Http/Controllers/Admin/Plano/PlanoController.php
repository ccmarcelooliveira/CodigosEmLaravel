<?php

namespace App\Http\Controllers\AdministracaoDagoba\Plano;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanoController extends Controller
{
    public function ConsultarInfPlano(){
        
        $data = array();
        
        $planoModel = new \App\Classes\PlanoModel();
        
        //RELAÇÃO DE TABELAS
        $listaPlanos = $planoModel -> ConsultaPlano();
        $data["listaPlanos"] =  $listaPlanos;
        
        return view('administracaoDagoba.planos.ConsultarPlano', $data);
    }
        
    //CADASTRAR MENU CONDOMINIO PADRAO
    public function CadastrarInfPlano(Request $request){
        
        $data = array();   
    
        if($request->isMethod("POST")){
            //Adicionar os dados do form
            
            $plano = new \App\plano($request->all());
                    
            $plano -> CmpDescricao = $request->input("plano");
            $plano -> CmpCustoPorApto = $request->input("custo");
            $plano -> CmpDescontoCustoApto = $request->input("desconto");
            $plano -> CmpMaxUsuarios = $request->input("adicionais");
            $plano -> CmpStatus = "ATV";

            $plano->save();

            return $this -> ConsultarInfPlano();    
        }
        
        return view('administracaoDagoba.planos.CadastrarPlano', $data);
    }
    
    public function EditarInfPlano(Request $request,$id){
        
        $data = array();
        
        //CLASSE UTIL
        $util = new \App\Util\Util();
    
        $planoModel = new \App\Classes\PlanoModel();
        $plano = $planoModel -> ConsultaPlanoPorID($id);        
        
        $data["idplano"] = $plano -> idplano;
        $data["plano"] = $plano -> CmpDescricao;
        $data["custo"] = $plano -> CmpCustoPorApto;
        $data["desconto"] = $plano -> CmpDescontoCustoApto;
        $data["adicional"] = $plano -> CmpMaxUsuarios;
        
        if($request->isMethod("POST")){
            //Adicionar os dados do form
            $planoModel = new \App\Classes\PlanoModel();
                        
            $planoModel -> EditarPlano($request,$plano -> idplano);
            
            return $this -> ConsultarInfPlano();
        }
        
        return view('administracaoDagoba.planos.EditarPlano', $data);
    }
    
    
    public function ExcluirInfPlano($id){
        
        $planoModel = new \App\Classes\PlanoModel();
        $planoModel -> ExcluirPlano($id);
         
        return $this->ConsultarInfPlano();
    }
}
