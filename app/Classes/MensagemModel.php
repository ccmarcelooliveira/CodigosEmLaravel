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
 * Description of MensagemModel
 *
 * @author Celia Regina
 */
class MensagemModel {
   
    public function insereMensagem($request){
        
        $util = new \App\Util\Util();        
        //CLASSE INTERMEDIARIA DE PARAMETROS 
        $parametros = new \App\Util\Parametros();
        
        $mensagem = new \App\Mensagem($request->all());       
      
        $mensagem -> CmpTitulo = $request->input("titulo");
        $mensagem -> CmpTexto = $request->input("descricao");
        $mensagem -> CmpDataInclusao = date('Y-m-d H:i:s');
        $mensagem -> CmpStatus = "ATV";
        $mensagem -> CmpCodigoUnico = $util -> geraNumeroAleatorio();
      
        //RELACIONAMENTO COM O CONDOMINIO
        $mensagem -> condominio() -> associate(Auth::user() -> condominio_idcondominio);
        
        //DESTINO
        if(strlen($request->input("apartamento")) > 0){
            if($request->input("apartamento") != "adm"){
                $mensagem -> destino() -> associate($request->input("apartamento")); 
                $parametros -> setApartamentoDestino($request->input("apartamento"));
            }    
        }
        
        if(Auth::user()->perfil_idperfil != 2 || 
                Auth::user()->perfil_idperfil != 3 || 
                Auth::user()->perfil_idperfil != 6){ 
            
            $mensagem -> origem() ->associate(Auth::user() -> apartamento_idapartamento);
            $parametros -> setApartamentoOrigem(Auth::user()->apartamento_idapartamento);
            
        }
     
        
        //REALIZA O COMMIT DA OPERACAO
        $result = $mensagem -> save(); 
        
        $idmensagem = $mensagem -> idmensagem;
        
        if($request->input("divulgacao") == 1){
            //COLETAR NOTICIAS
            //CONTROLE DA GERAÇÃO DAS NOTÍCIAS
            $noticiasController = new \App\Http\Controllers\NoticiasController();

           
            $parametros -> setIdObjeto($idmensagem);
            $parametros -> setTitulo($request->input("titulo"));
            $parametros -> setTexto($request->input("descricao"));
            $parametros -> setTipoObjeto("MSG");
            $parametros -> setIdCondominio(Auth::user()->condominio_idcondominio);
            

            $noticiasController -> coletarNoticias($parametros);
        }
    }
    
    public function insereRespostaMensagem($request){
       
        $util = new \App\Util\Util();
        $mensagem = new \App\Mensagem($request->all());
             
        $mensagem -> CmpTitulo = "";
        $mensagem -> CmpTexto = $request->input("resposta");
        $mensagem -> CmpDataInclusao = date('Y-m-d H:i:s');
        $mensagem -> CmpStatus = "RES";
        $mensagem -> CmpCodigoUnico = $request->input("val");

        //RELACIONAMENTO COM O CONDOMINIO
        $mensagem -> condominio() -> associate(Auth::user() -> condominio_idcondominio);
        
        //DESTINO
        if(Auth::user()->perfil_idperfil != 2 || 
                Auth::user()->perfil_idperfil != 3 || 
                Auth::user()->perfil_idperfil != 6){ 
            $mensagem -> origem() -> associate(Auth::user() -> apartamento_idapartamento); 
        }
                
        //REALIZA O COMMIT DA OPERACAO
        $result = $mensagem -> save(); 
        
    }
    
    //CONSULTAR MENSAGEM PARA EXIBIR NO CLIENTE
    //O MODO diz respeito a quem solicita o código:cliente, morador ou geral.
    public function consultaMensagem($sessao,$modo) {

        $sql = "";
        /*
        $results = DB::table('mensagems')                                               
                    ->select('mensagems.*')
                    ->where('mensagems.condominio_idcondominio', '=', $idCondominio)
                    ->where('mensagems.CmpStatus', '=', 'ATV')
                    -> orderBy('CmpDataInclusao','desc')
                    ->get();
        **/
        
         if($modo == "geral"){
            // $sql = " AND apartamento_idapartamento is null";
              /*$sql = " AND (apartamento_idapartamento_destino is null 
                     OR apartamento_idapartamento_origem is null )"; */ 
         }        
         
         if($modo == "morador"){
              $sql = " AND apartamento_idapartamento is not null";
         }
         
         if($modo == "cliente"){
             $sql = " AND (apartamento_idapartamento_destino = ".$sessao -> apartamento_idapartamento
                    . " OR apartamento_idapartamento_origem = ".$sessao -> apartamento_idapartamento.")"; 
         }
         
         $results =  DB::select(" SELECT * FROM mensagems "
                                    . " WHERE condominio_idcondominio = ".$sessao -> condominio_idcondominio
                                    . $sql
                                    . " AND CmpStatus = 'ATV' OR CmpStatus = 'ATD'");  

        return $results;
    }
    
    //CONSULTAR A RESPOSTA DA MENSAGEM
    public function consultarRespostaMensagem($codigoUnico) {
        
        ECHO " SELECT * FROM mensagems "
                                    . " WHERE condominio_idcondominio = ". Auth::user() -> condominio_idcondominio
                                    . " AND CmpStatus = 'RES' "
                                    . " AND CmpCodigoUnico = '".$codigoUnico."'";
        $results =  DB::select(" SELECT * FROM mensagems "
                                    . " WHERE condominio_idcondominio = ". Auth::user() -> condominio_idcondominio
                                    . " AND CmpStatus = 'RES' "
                                    . " AND CmpCodigoUnico = '".$codigoUnico."'");  

        return $results;
    }
}
