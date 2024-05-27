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
class ManutencaoProgramadaModel {
    
      //CONSULTAS
    public function ConsultaManutencaoProgramada($idManutencao) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idManutencao_decripto = $seguranca -> decripto($idManutencao);
        
        if($idManutencao_decripto > 0){
            
            $results = DB::table('manutencao_programadas')                                          
                                   ->select('manutencao_programadas.*')
                                   ->where('manutencao_programadas.CmpStatus', '=', 'ATV')                  
                                   ->where('manutencao_programadas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                                   ->where('manutencao_programadas.idmanutencao_programada', '=', $idManutencao_decripto)
                                   ->get();
            
        }else{        
         
            $results = DB::table('manutencao_programadas')                                          
                        ->select('manutencao_programadas.*')
                        ->where('manutencao_programadas.CmpStatus', '=', 'ATV')                  
                        ->where('manutencao_programadas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                        ->get();
        }    

        return $results;
    }
    
     public function insereManutencaoProgramada($request){
       
        $manutencaoProgramada = new \App\ManutencaoProgramada();
        
                        
        $manutencaoProgramada -> CmpDataInicio = \Carbon\Carbon::createFromFormat("d/m/Y", $request->input("datainicio"))->format("Y-m-d");
        $manutencaoProgramada -> CmpDataFim = \Carbon\Carbon::createFromFormat("d/m/Y", $request->input("datafim"))->format("Y-m-d");
        $manutencaoProgramada -> CmpDataInclusao = date('Y-m-d H:i:s');
        $manutencaoProgramada -> CmpStatus = "ATV";                   
        
        $manutencaoProgramada -> CmpAssunto = $request->input("assunto");
        $manutencaoProgramada -> CmpDescricao = $request->input("descricao");
        
        //RELACIONAMENTO COM O CONDOMINIO
        $manutencaoProgramada -> condominio() -> associate(Auth::user()-> condominio_idcondominio);
        $manutencaoProgramada -> areacomum() -> associate($request->input("areCom"));
        
        $util = new \App\Util\Util();

        //REALIZA O COMMIT DA OPERACAO
        $result = $manutencaoProgramada -> save(); 
       /* $historico = new HistoricoOperacaoModel();
        $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "ANEXO");
        */
        return $manutencaoProgramada -> idmanutencao_programada;         
    }
    
    
     public function ExcluirManutencaoProgramada($idManutencao){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idManutencao_decripto = $seguranca->decripto($idManutencao);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('manutencao_programadas')                          
                    ->where('manutencao_programadas.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('manutencao_programadas.idmanutencao_programada', '=', $idManutencao_decripto)                    
                    ->update(array('manutencao_programadas.CmpStatus' => 'DTV'));
                        
               
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_MNTPRO";

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
            return "ERR_EXC_MNTPRO"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    } 
    
    //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdateManutencaoProgramada(\Symfony\Component\HttpFoundation\Request $request, $idManutencao){            
        
        $util = new \app\Util\Util();
        
        DB::beginTransaction();
        
        try { 
            
                //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                $idManutencao_decripto = $seguranca->decripto($idManutencao);
                //::createFromFormat(, );
                $dataInicio = $util->formatarDataMysql($request->input("datainicio"));
                $dataFim = $util->formatarDataMysql($request->input("datafim"));
                
                DB::table('manutencao_programadas')
                        ->where('idmanutencao_programada', $idManutencao_decripto)
                        ->update(array('CmpDataInicio' => $dataInicio,                                                                                             
                                            'CmpDataFim' => $dataFim,                                                                                                                                                                                               
                                            'CmpAssunto' => $request->input("assunto"), 
                                            'area_comum_idarea_comum' => $request->input("areCom"), 
                                            'CmpDescricao' => $request->input("descricao")
                                            ));
                
                DB::commit();
                
                return "ERR_EDI_MNTPRO";

        } catch (Exception $e) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ALT", "OK", "CONDOMINIO");

                DB::commit();
                
                return "ERR_EDI_MNTPRO";

        }
    }
}
