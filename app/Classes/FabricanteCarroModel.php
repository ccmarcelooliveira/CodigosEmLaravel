<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;
use Auth;

/**
 * Description of PlanoSubContasModel
 *
 * @author Celia Regina
 */
class FabricanteCarroModel {
    
    public function ConsultaFabricanteCarro($idFabricante) {
        
        //echo $idPlanoContas;
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFabricante_decripto = $seguranca -> decripto($idFabricante); 
           

        $results = DB::table('fabricante_autos')      
                               ->select('fabricante_autos.*')                    
                               ->where('fabricante_autos.CmpStatus', '=', 'ATV');
        
                                if($idFabricante_decripto > 0){
                                   $results = $results ->where('fabricante_autos.idfabricante_auto', '=', $idFabricante_decripto);
                                }   
                                $results = $results->orderBy('fabricante_autos.CmpFabricante')->get();
        
        return $results;
    }
    
    
        
        
    public function inserePlanoSubContas($request,$idPlanoContas,$criacaoAutomatica){
          
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPlanoContas_decripto = $seguranca -> decripto($idPlanoContas);
        
        $anexo_cod = $util -> geraNumeroAleatorio();
        
        $planoSubContas = new \App\PlanoSubContas();
        
        DB::beginTransaction();
        
        try {
                $planoSubContas -> CmpNomeSubConta = $request->input("conta");
                $planoSubContas -> CmpDescricao = $request->input("obs");
                $planoSubContas -> CmpClassificacao = $request->input("classificacao");              

                $planoSubContas -> CmpStatus = "ATV"; 
                $planoSubContas -> CmpDataInclusao = date('Y-m-d H:i:s');
                $planoSubContas -> auto = $criacaoAutomatica;
                
                //RELACIONAMENTO COM O CONDOMINIO
                $planoSubContas -> condominio() -> associate(Auth::user()->condominio_idcondominio); 
                $planoSubContas -> planocontas() -> associate($idPlanoContas_decripto); 
                
                //REALIZA O COMMIT DA OPERACAO
                $planoSubContas -> save(); 

                //uploadAnexo($file,$sessao,$descriaoObjeto, $siglaObjeto,$idObjeto)
                //$data["resp"] = "<div class='alert alert-success'>Plano Contas cadastrado</div>";

                DB::commit();

                return $planoSubContas -> idplano_sub_contas;   

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "NOK", "BEM");                
            
            DB::commit();
            
            return "ERR_CAD_PLSUCO"; //ERRO DE INSERCAO DE DOCUMENTO
        }            
    }
    
    //PARA O CASO DE INSERÇÃO AUTOMATICA NA INSERÇÃO DA CONTA
     public function inserePlanoSubContasAuto(\app\Util\Parametros $parametros){
          
        $util = new \App\Util\Util();
        $anexo_cod = $util -> geraNumeroAleatorio();
        
        $planoContas = new \App\PlanoSubContas();
        
        $planoContas -> CmpNomeSubConta = $parametros -> getNomeSubConta();
        $planoContas -> CmpDescricao = $parametros -> getDescricao();
        $planoContas -> CmpClassificacao = $parametros ->getClassificacao();             
       
        $planoContas -> CmpStatus = "ATV"; 
        $planoContas -> CmpDataInclusao = date('Y-m-d H:i:s');
       
        //RELACIONAMENTO COM O CONDOMINIO
        $planoContas -> condominio() -> associate(Auth::user()->condominio_idcondominio); 
        $planoContas -> planocontas() -> associate($parametros ->getIdConta()); 
        //REALIZA O COMMIT DA OPERACAO
        $idplanocontas = $planoContas -> save(); 
        
        //uploadAnexo($file,$sessao,$descriaoObjeto, $siglaObjeto,$idObjeto)
        //$data["resp"] = "<div class='alert alert-success'>Plano Contas cadastrado</div>";
        
        return $planoContas -> $idplanocontas;         
    }
    
    
    //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdatePlanoSubContas(Request $request, $idPlanoSubContas){            
        //echo "antes " . $idVeiculo;
        //begin
        DB::beginTransaction();
        
        try { 
            
                //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                $idPlanoSubContas_decripto = $seguranca->decripto($idPlanoSubContas);
                
                DB::table('plano_sub_contas')->where('idplano_sub_contas', $idPlanoSubContas_decripto)->update(array(                                                                                            
                                                                                              'CmpClassificacao' => $request->input("classificacao"),                                                                                                                                                                                               
                                                                                              'CmpDescricao' => $request->input("obs"), 
                                                                                              'CmpNomeSubConta' => $request->input("conta")
                                                                                              ));                
                DB::commit();
                
                return "SUC_EDI_PLSUCO";

        } catch (Exception $e) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ALT", "OK", "CONDOMINIO");

                DB::commit();
                
                return "ERR_EDI_PLSUCO";

        }
    }
    
    public function ExcluirPlanoSubContas($idPlanoContas,$idPlanoSubContas){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        echo $idPlanoSubContas_decripto = $seguranca->decripto($idPlanoSubContas);
        
        //Inicio transacao
        DB::beginTransaction();
        
        try {             
                                 
                DB::table('plano_sub_contas') -> where('idplano_sub_contas', $idPlanoSubContas_decripto)->update(array('CmpStatus' => 'DTV'));               

                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "OK", "BEM");                

                DB::commit();

                return "SUC_EXC_PLSUCO";

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            ///$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "NOK", "BEM");                
            
            DB::commit();
            return "ERR_EXC_PLSUCO"; //ERRO DE INSERCAO DE DOCUMENTO
        }   



    }
    
    //PARA A PREVISÃO ORÇAMENTÁRIA
     public function ConsultaPlanoSubContasPorTipo($idTipoConta) {
         
        //echo $idTipoConta;
        if($idTipoConta == "REC") $idTipoConta = 1;
        if($idTipoConta == "DES") $idTipoConta = 2;
        
        $results = DB::table('plano_sub_contas') 
                    ->join('plano_contas', 'plano_contas.idplano_contas', '=', 'plano_sub_contas.plano_contas_idplano_contas')
                    ->select('plano_sub_contas.*','plano_contas.*')
                    ->where('plano_sub_contas.CmpStatus', '=', 'ATV')
                    ->where('plano_sub_contas.auto', '=', 'NAO')
                    ->where('plano_contas.CmpStatus', '=', 'ATV')
                    ->where('plano_sub_contas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                    ->where('plano_contas.CmpCategoriaConta', '=', $idTipoConta)
                    ->get();

        return $results;
    }
}
