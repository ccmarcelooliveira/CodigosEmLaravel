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
 * Description of FornecedorModel
 *
 * @author Celia Regina
 */
class FornecedorModel {
   
    
    public function ConsultaFornecedor($idFornecedor) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFornecedor_decripto = $seguranca -> decripto($idFornecedor);
        
        if($idFornecedor_decripto > 0){
            
            $results = DB::table('fornecedores')                                               
                                    ->select('fornecedores.*')
                                    ->where('fornecedores.condominio_idcondominio', '=',  Auth::user()->condominio_idcondominio)
                                    ->where('fornecedores.idfornecedores', '=',  $idFornecedor_decripto)
                                    ->where('fornecedores.CmpStatus', '=', 'ATV')
                                    -> orderBy('CmpRazaoSocial')
                                    ->get();
            
        }else{        
           
             $results = DB::table('fornecedores')                                               
                        ->select('fornecedores.*')
                        ->where('fornecedores.condominio_idcondominio', '=',  Auth::user()->condominio_idcondominio)
                        ->where('fornecedores.CmpStatus', '=', 'ATV')
                        -> orderBy('CmpRazaoSocial')
                        ->get();
        }    

        return $results;
    }
    
    public function insereFornecedor($request){
        
        $util = new \App\Util\Util();
        $data = array();
        
        $fornecedor = new \App\Fornecedores();
       
         //Inicio transacao
        DB::beginTransaction();
        try { 
                $fornecedor -> CmpRazaoSocial = $request->input("fornecedor");
                $fornecedor -> CmpCategoriaPessoa = $request->input("catPessoa");

                $fornecedor -> CmpCNPJ_CPF = $request->input("cnpj_cpf");
                $fornecedor -> CmpEndereco = $request->input("endereco"); 
                $fornecedor -> CmpTelFixo = $request->input("tel_fixo");
                $fornecedor -> CmpCel = $request->input("tel_cel");                   //DOCUMENTO ANEXADO
                $fornecedor -> CmpEmail = $request->input("email");
                $fornecedor -> CmpSite = $request->input("site");
                $fornecedor -> CmpDescricao = $request->input("obs");
                $fornecedor -> CmpDataInclusao = date('Y-m-d H:i:s');
                $fornecedor -> CmpStatus = "ATV";

                //RELACIONAMENTO COM O CONDOMINIO
                $fornecedor -> condominio() -> associate(Auth::user()->condominio_idcondominio);              

                //REALIZA O COMMIT DA OPERACAO
                $fornecedor -> save(); 
               //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "FORNECEDOR");                

            DB::commit();

            return $fornecedor -> idfornecedores;

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "NOK", "FORNECEDOR");                
            
            DB::commit();
            
            return "ERR_CAD_FOR"; //ERRO DE INSERCAO DE DOCUMENTO
        }   
        
    }
    
    public function editarFornecedor($request,$idFornecedor){ 
        
        $data = array();  
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFornecedor_decripto = $seguranca->decripto($idFornecedor);

        //Inicio transacao
        DB::beginTransaction();
        try { 

            DB::table('fornecedores')
                    ->where('idfornecedores', $idFornecedor_decripto)
                    ->where('condominio_idcondominio', Auth::user()->condominio_idcondominio)
                    ->update(array('CmpRazaoSocial' => $request->input("fornecedor"),
                                    'CmpCategoriaPessoa' => $request->input("catPessoa"),                                        
                                    'CmpCNPJ_CPF' => $request->input("cnpj_cpf"), 
                                    'CmpEndereco' => $request->input("endereco"),   
                                    'CmptelFixo' => $request->input("telFixo"),      
                                    'CmpCel' => $request->input("cel"),
                                    'CmpEmail' => $request->input("email"),
                                    'CmpSite' => $request->input("site"),
                                    'CmpDescricao' => $request->input("descricao")                                                                                        
                                      ));

            //INSERINDO HISTÓRICO
            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "OK", "FORNECEDOR");                

            DB::commit();

            return "SUC_EDI_FOR"; //ERRO DE INSERCAO DE DOCUMENTO

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "NOK", "FORNECEDOR");                
            
            DB::commit();
            return "ERR_EDI_FOR"; //ERRO DE INSERCAO DE DOCUMENTO
        }     
        
        //return $data["resultado"];
        
    }
    
    //ATUALZA FORNECEDOR
    public function excluirFornecedor($idFornecedor){ 

        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();
                
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFornecedor_decripto = $seguranca->decripto($idFornecedor);
        
        //Inicio transacao
        DB::beginTransaction();
        try { 
            DB::table('fornecedores')->where('idfornecedores', $idFornecedor_decripto)->update(array('CmpStatus' => 'DTV'));        
             //INSERINDO HISTÓRICO
            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "OK", "FORNECEDOR");                

            DB::commit();

            return "SUC_EXC_FOR"; //ERRO DE INSERCAO DE DOCUMENTO

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "NOK", "FORNECEDOR");                
            
            DB::commit();
            
            return "ERR_EXC_FOR"; //ERRO DE INSERCAO DE DOCUMENTO
        }  

        //return $data["resultado"];
    }
}
