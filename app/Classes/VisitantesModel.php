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
 * Description of VeiculoModel
 *
 * @author Celia Regina
 */
class VisitantesModel {
    //put your code here
    
     public function VisitantesModel(){

     }
     
     public function insereVisitante(\Illuminate\Http\Request $request){ 
         
            $visitantes = new \App\Visitantes();
         
            DB::beginTransaction();
        
                try {
                    //CRIACAO DOS VEICULOS
                    $visitantes -> CmpNome = $request->input("nomeVisitante");
                    $visitantes -> CmpCNPJ_CPF = $request->input("cnpj_cpf");   
                    $visitantes -> CmpDataInclusao = date('Y-m-d H:i:s');
                    $visitantes -> CmpObs = $request->input("obs"); 
                    $visitantes -> CmpStatus = "ATV";
                    $visitantes -> CmpTipoVisitante = 2;

                     //RELACIONAMENTO COM O CONDOMINIO
                    $visitantes -> condominio() -> associate(Auth::user()->condominio_idcondominio); 
                    $visitantes -> apartamento() -> associate($request->input("selApartamento"));
                    $result = $visitantes->save();

                    //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
                    $util = new \App\Util\Util();

                    $historico = new \App\Classes\HistoricoOperacaoModel();
                    //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "VEICULO");
                    //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "VISITANTES");
                                   
                    DB::commit();
                    
                    return $visitantes->idvisitantes;

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
                    
                    return "ERR_CAD_VIS";
            }    
    }
    
   
    
    //CONSULTAR APARTAMENTO COM ARGUMENTOS
    //31/12/2017
    public function consultarVisitante($idVisitante){
       
            
            $query = DB::table('visitantes')                                          
                                ->join('apartamentos', 'visitantes.apartamento_idapartamento', '=', 'apartamentos.idapartamento')     
                                ->select('visitantes.idvisitantes',
                                          'visitantes.CmpNome',
                                          'visitantes.CmpDataInclusao',
                                          'visitantes.CmpCNPJ_CPF',
                                          'visitantes.apartamento_idapartamento',
                                          'visitantes.CmpObs',
                                          'apartamentos.CmpApto',
                                          'apartamentos.CmpBloco')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('visitantes.CmpStatus', '=', 'ATV');
            
                                if($idVisitante > 0){
                                    $query = $query ->where('visitantes.idvisitantes', '=', $idVisitante); 
                                }    
                                
                                if(Auth::user()->apartamento_idapartamento != null){
                                      $query = $query->where('visitantes.apartamento_idapartamento', '=', Auth::user()->apartamento_idapartamento);   
                                }  
                                
                                $query = $query->where('visitantes.CmpTipoVisitante', '=', 2)
                                ->where('visitantes.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio) 
                                ->get();
            
                                return $query;
        

    }

    
    
    //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdateVisitante(\Symfony\Component\HttpFoundation\Request $request, $idVisitantes){ 
        //begin
        DB::beginTransaction();
        
        try {             
                //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                $idVisitantes_decripto = $seguranca->decripto($idVisitantes);
                
                DB::table('visitantes')
                        ->where('idvisitantes', $idVisitantes_decripto)
                            ->update(array('CmpNome' => $request->input("nome"),                                                                                             
                                            'CmpCNPJ_CPF' => $request->input("cnpj_cpf"),                                                                                                                                                                                               
                                            'CmpObs' => $request->input("obs"),                                                                                              
                                            'apartamento_idapartamento' => $request->input("selApartamento")));
               
                DB::commit();
                
                return "SUC_CAD_VIS";

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
                
                return "ERR_CAD_VIS";

        }
    }
        
    //EXCLUIR TODOS OS ANEXOS DO DOCUMENTO
    ////ATUALZA DOCUMENTO
    public function ExcluirVisitante($idVisitante){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVisitante_decripto = $seguranca->decripto($idVisitante);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('visitantes')                          
                    ->where('visitantes.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('visitantes.idvisitantes', '=', $idVisitante_decripto) 
                    ->where('visitantes.CmpTipoVisitante', '=', 2)
                    ->update(array('visitantes.CmpStatus' => 'DTV'));
                        
               
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_VEI";

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
            return "ERR_EXC_VEI"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    } 
    
    
}
