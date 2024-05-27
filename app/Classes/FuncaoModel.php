<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

/**
 * Description of FuncaoModel
 *
 * @author Celia Regina
 */
class FuncaoModel {
    
    
     //CONSULTAS
    public function ConsultaFuncao($idFuncao) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFuncao_decripto = $seguranca -> decripto($idFuncao);
        
        $results = DB::table('funcaos')                                          
                               ->select('funcaos.*')
                               ->where('funcaos.CmpStatus', '=', 'ATV');            

        if($idFuncao_decripto > 0){
            $results =  $results ->where('funcaos.idfuncao', '=', $idFuncao_decripto);
        }

        $results =  $results ->orderBy('funcaos.CmpDescricao')
                               ->get();
       

        return $results;
    }
    
    public function ConsultaFuncao2() { //PARA O CASO DA FUNÇÃO JA TER SIDO CRIADO O TURNO DE TRABALHO
        
       
       /* $results = DB::table('funcao_condominios') 
                    ->join('turnos', 'funcao_condominios.idfuncao_condominios', '<>', 'turnos.funcao_idfuncao')  
                    ->select('funcao_condominios.*')
                    ->where('funcao_condominios.CmpStatus', '=', 'ATV')
                    ->where('turnos.CmpStatus', '=', 'ATV')
                    ->get();*/
        
        //retirando uma funcao já cadastrada
       /* 
        * " SELECT *                                                                           
                                FROM funcao_condominios
                                WHERE funcao_condominios.idfuncao_condominios 
                                NOT IN (SELECT funcao_idfuncao FROM turnos WHERE CmpStatus = 'ATV')
                                AND funcao_condominios.CmpStatus = 'ATV'"*/
        
         $results =   DB::select(" SELECT *                                                                           
                                FROM funcaos
                                WHERE funcaos.idfuncao
                                AND funcaos.CmpStatus = 'ATV'
                                ORDER BY funcaos.CmpDescricao"); 

        return $results;
    }
    
     //CONSULTAS, PARA O CADASTRO DO CONDOMINIO
    public function ConsultaFuncao3() {
        
        $results = DB::table('funcaos')                                          
                    ->select('funcaos.*')
                    ->where('funcaos.CmpStatus', '=', 'ATV') 
                    ->get();
        
        return $results;
    }
    
    public function insereFuncao($request){
        
        DB::beginTransaction();
        
        try {
        
            
            //REALIZAR UMA BUSCA. SE EXISTIR, ARQUIVAR.
            $funcao = new \App\FuncaoCondominio();  

            $funcao -> Cmpdescricao = $request->input("descricao");
            $funcao -> CmpStatus = "ATV"; 
            $funcao -> CmpDataInclusao = date('Y-m-d H:i:s');
            $funcao -> CmpObs = $request->input("obs");
            $funcao -> CmpTextoAjuda = $request->input("ajuda");
            
            //RELACIONAMENTO COM O CONDOMINIO
            //$funcao -> condominio() -> associate(Auth::user()-> condominio_idcondominio); 

            //REALIZA O COMMIT DA OPERACAO
            $funcao -> save(); 
            
            
            
            
            /*$diaDeTrabalho = new \App\DiaDeTrabalho();
            
            $diaDeTrabalho -> primeiro_turno() -> associate($resultPriTurno -> idturno);
            $diaDeTrabalho -> segundo_turno() -> associate($resultSegTurno -> idturno);
            $diaDeTrabalho -> funcao() -> associate($result -> idfuncao);*/
            
            DB::commit();

            return "SUC_CAD_FCA";

        } catch (Exception $e) {

            DB::rollback();
            // something went wrong
            $erros-> CmpOcorrencia = $e->getMessage();
            $erros-> data_ocorrencia = date('Y-m-d H:i:s');
            $erros-> CmpStatus = 'ATV';
            //$erros-> condominio_idcondominio = $condominio->idcondominio;
            $erros->save();   

            $historico = new \App\Classes\HistoricoOperacaoModel();
//            $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ALT", "OK", "CONDOMINIO");

            DB::commit();
            
            return "ERR_CAD_FCA";
        }    
     /*   $historico = new HistoricoOperacaoModel();
        $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "ANEXO");
        
        return $anexo -> idanexo; */        
    }
    
     public function insereFuncaoTurno($request){
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                
        DB::beginTransaction();
        
        try {
                             
            //REALIZAR UMA BUSCA. SE EXISTIR, ARQUIVAR.
            $funcao = new \App\Funcao();

            $funcao -> Cmpdescricao = $request->input("descricao");
            $funcao -> CmpStatus = "ATV"; 
            $funcao -> CmpDataInclusao = date('Y-m-d H:i:s');
            $funcao -> CmpObs = $request->input("obs");
            $funcao -> CmpTextoAjuda = $request->input("ajuda");
            
            //RELACIONAMENTO COM O CONDOMINIO
            //$funcao -> condominio() -> associate(Auth::user()-> condominio_idcondominio); 

            //REALIZA O COMMIT DA OPERACAO
            $funcao -> save(); 
                
              
           
            
            DB::commit();

            return $funcao -> idfuncao;

        } catch (Exception $e) {

            DB::rollback();
            // something went wrong
            $erros-> CmpOcorrencia = $e->getMessage();
            $erros-> data_ocorrencia = date('Y-m-d H:i:s');
            $erros-> CmpStatus = 'ATV';
            //$erros-> condominio_idcondominio = $condominio->idcondominio;
            $erros->save();   

            $historico = new \App\Classes\HistoricoOperacaoModel();
//            $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ALT", "OK", "CONDOMINIO");

            DB::commit();
            
            return "ERR_CAD_FCA";
        }    
     /*   $historico = new HistoricoOperacaoModel();
        $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "ANEXO");
        
        return $anexo -> idanexo; */        
    }
    
    
     //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdateFuncao(Request $request, $idFuncao){            
        
        //begin
        DB::beginTransaction();
        
        try { 
            
                //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                $idFuncao_decripto = $seguranca->decripto($idFuncao);
                
                DB::table('funcaos')
                        ->where('idfuncao', $idFuncao_decripto)
                        ->update(array('CmpDescricao' => $request->input("descricao"),
                                       'CmpTextoAjuda' => $request->input("ajuda"),
                                       'CmpObs' => $request->input("obs")));
               
                DB::commit();
                
                return "SUC_EDI_FUN";

        } catch (Exception $e) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ALT", "OK", "CLASSIFICADOS");

                DB::commit();

                return "ERR_EDI_FUN";
        }
    }
    
    //EXCLUIR TODOS OS ANEXOS DO DOCUMENTO
    ////ATUALZA DOCUMENTO
    public function ExcluirFuncao($idFuncao){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFuncao_decripto = $seguranca->decripto($idFuncao);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('funcaos')                          
                    ->where('funcaos.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('funcaos.idfuncao', '=', $idFuncao_decripto)                    
                    ->update(array('funcaos.CmpStatus' => 'DTV'));
                        
               
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_FUN";

        } catch (Exception $ex) {

            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            // something went wrong
            /*$erros-> CmpOcorrencia = ;
            $erros-> data_ocorrencia = date('Y-m-d H:i:s');
            $erros-> CmpStatus = 'ATV';
            $erros-> condominio() = $sessao->condominio_idcondominio;
            $erros->save();

            DB::commit();*/
            return "ERR_EXC_FUN"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }
}
