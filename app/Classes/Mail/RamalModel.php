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
 * Description of RamalModel
 *
 * @author Celia Regina
 */
class RamalModel {
    
        public function RamalModel(){

        }
    
        public function insereRamal($idCondominio,$idUsuario,$estruturaRamal,$numero_apartamento,$numero_bloco,$auto){ 
  
            //APARTAMENTO
            //RAMAL
            $ramal = new \App\Ramal();
            
            //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
            $util = new \App\Util\Util();
             
            //echo $util -> formacaoRamalApartamento($estruturaRamal,$numero_apartamento,$numero_bloco) ."--". $estruturaRamal."-".$numero_apartamento."-".$numero_bloco;
            //Monta o numero do Ramal
            $ramal -> CmpRamal = $util -> formacaoRamalApartamento($estruturaRamal,$numero_apartamento,$numero_bloco);
            //echo "<BR>";
            $ramal-> CmpStatus = 'AGU';
            $ramal-> CmpDataInclusao = date('Y-m-d H:i:s');
            $ramal-> CmpAuto = $auto;  
            $ramal-> CmpComentario = "";
            $ramal -> condominio() -> associate($idCondominio);  
                
            /*****************************FIM HISTORICO DE OPERACOES**************************************************/
            $result = $ramal->save();
            $historico = new \App\Classes\HistoricoOperacaoModel();
            //0$historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "RAMAL");
            $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "RAMAL");
            
            return $ramal->idramal;
        }
        
        //O USUARIO INSERE O RAMAL NA MAO
        public function insereRamalManual($request){ 

            $retorno = "";
            echo "teste"; 
            //begin
            DB::beginTransaction();

            try { 
                    $ramal = new \App\Ramal();
            
                    //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
                    //$util = new \App\Util\Util();

                    //CRIA O RAMAL, ONDE VAI FICAR O NÚMERO.
                    $ramal->CmpRamal = $request->input("ramal");
                    $ramal->CmpStatus = 'ATV';
                    $ramal->CmpDataInclusao = date('Y-m-d H:i:s');
                    $ramal-> CmpAuto = 2;       //NÃO FOI CRIADO AUTOMATICO
                    $ramal -> condominio() ->associate(Auth::user()->condominio_idcondominio); 
                    $ramal->CmpComentario = $request->input("comentario");

                    /*****************************FIM HISTORICO DE OPERACOES**************************************************/
                    $result = $ramal->save();

                    //GRUPO RAMAL, CRIA AS INFORMAÇÕES ASSOCIADAS AO RAMAL QUE ACABOU DE SER MONTADO
                    $grupoRamal = new \App\GrupoRamal();
                    $grupoRamal -> areaComum() -> associate($request->input("idArea"));  
                    $grupoRamal -> ramal() -> associate($ramal -> idramal);
                    $grupoRamal -> condominio() -> associate(Auth::user()->condominio_idcondominio);  
                    $grupoRamal->CmpComentario = $request->input("comentario");
                    $grupoRamal -> save();

                    $retorno = "SUC_CAD_RAM";
                    
                    DB::commit();

            } catch (Exception $e) {

                    DB::rollback();
                    // something went wrong
                    $erros-> CmpOcorrencia = $e->getMessage();
                    $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                    $erros-> CmpStatus = 'ATV';
                    //$erros-> condominio_idcondominio = $condominio->idcondominio;
                    $erros->save();   

                    $historico = new \App\Classes\HistoricoOperacaoModel();
                    $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "RAMALS");

                    $retorno = "ERR_CAD_RAM";
                    
                    DB::commit();

            }
        }
        
        public function consultaRamal($idRamal) {
           
            //GRADE DE SEGURANCA
            $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
            $idRamal_decripto = $seguranca->decripto($idRamal);
                        
            $grupo_ramal = DB::table('grupo_ramals')
                        ->join('area_comums', 'grupo_ramals.area_comum_idarea_comum', '=', 'area_comums.idarea_comum')  
                        ->join('ramals', 'grupo_ramals.ramal_idramal', '=', 'ramals.idramal')  
                        ->select('ramals.idramal',
                                'ramals.CmpRamal',
                                'ramals.CmpAuto', 
                                'area_comums.CmpAreaComum',
                                'area_comums.CmpAreaComum',
                                'area_comums.CmpStatus',
                                'grupo_ramals.CmpComentario')
                        ->where('ramals.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                        ->where('ramals.CmpStatus', '=', "ATV")
                        ->where('ramals.idramal', '=', $idRamal_decripto);

            //UNIÃO DOS DADOS
            $results = DB::table('ramals')
                        ->join('apartamentos', 'ramals.idramal', '=', 'apartamentos.ramal_idramal')                        
                        ->join('moradors', 'moradors.apartamento_idapartamento', '=', 'apartamentos.idapartamento') 
                        ->select('ramals.idramal',
                                'ramals.CmpRamal',
                                'ramals.CmpAuto', 
                                'apartamentos.CmpApto',
                                'apartamentos.CmpBloco',
                                'moradors.CmpNome',
                                'ramals.CmpComentario')
                        ->where('ramals.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio);
            
             if($idRamal_decripto > 0){
                  $results = $results -> where('ramals.idramal', '=', $idRamal_decripto);
             } 
             
             $results = $results -> where('ramals.CmpStatus', '=', "ATV")
             ->union($grupo_ramal)
             ->get();
                
               
            
            return $results;
        }
        
         //ATUALZA DOCUMENTO
        public function atualizaRamal($request,$sessao,$idramal){ 
            
            DB::beginTransaction();

            try {    
                if($request->isMethod("post")){

                    DB::table('Ramals')->where('idramal', $idramal)->update(array('CmpRamal' => $request->input("ramal")));

                }   
                $retorno = "SUC_CAD_RAM";
                DB::commit();

            } catch (Exception $e) {

                    DB::rollback();
                    // something went wrong
                    $erros-> CmpOcorrencia = $e->getMessage();
                    $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                    $erros-> CmpStatus = 'ATV';
                    //$erros-> condominio_idcondominio = $condominio->idcondominio;
                    $erros->save();   

                    $historico = new \App\Classes\HistoricoOperacaoModel();
                    $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "RAMALS");

                    $retorno = "ERR_CAD_RAM";
                    
                    DB::commit();

            }    
        }
        
        public function AtivarRamal($idcondominio){            
            
            //begin
            DB::beginTransaction();

            try { 
                    DB::table('ramals')->where('condominio_idcondominio', $idcondominio)->update(array('CmpStatus' => 'ATV'));

                    DB::commit();

            } catch (Exception $e) {

                    DB::rollback();
                    // something went wrong
                    $erros-> CmpOcorrencia = $e->getMessage();
                    $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                    $erros-> CmpStatus = 'ATV';
                    //$erros-> condominio_idcondominio = $condominio->idcondominio;
                    $erros->save();   

                    $historico = new \App\Classes\HistoricoOperacaoModel();
                    $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "RAMALS");

                    DB::commit();

            }
        } 
        
        //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdateRamal(\Symfony\Component\HttpFoundation\Request $request, $idRamal){            
        //echo "antes " . $idVeiculo;
        //begin
        DB::beginTransaction();
        
        try { 
            
                //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                $idRamal_decripto = $seguranca->decripto($idRamal);
                
                DB::table('ramals')
                        ->where('idramal', $idRamal_decripto)
                        ->update(array('CmpRamal' => $request->input("ramal"),'CmpComentario' => $request->input("comentario")));
                
                DB::commit();
                
                return "SUC_EDI_RAM";

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
                
                return "ERR_EDI_RAM";

        }
    }
    
    //EXCLUIR TODOS OS ANEXOS DO DOCUMENTO
    ////ATUALZA DOCUMENTO
    public function ExcluirRamal($idRamal){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idRamal_decripto = $seguranca->decripto($idRamal);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('ramals')                          
                    ->where('ramals.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('ramals.idramal', '=', $idRamal_decripto)                    
                    ->update(array('ramals.CmpStatus' => 'DTV'));
                        
               
                $historico = new HistoricoOperacaoModel();
                
               
                DB::commit();
                    
                return "SUC_EXC_RAM";

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
            return "ERR_EXC_RAM"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }
    
    
    
    public function ConsultaRamalApto($idApto) {
         
        //UNIÃO DOS DADOS
        $results = DB::table('ramals')
                    ->join('apartamentos', 'ramals.idramal', '=', 'apartamentos.ramal_idramal')  
                    ->select('ramals.idramal','ramals.CmpRamal','ramals.CmpAuto')
                    ->where('apartamentos.idapartamento', '=', $idApto)                    
                    ->where('ramals.CmpStatus', '=', "ATV")                    
                    ->get();           
            
            return $results;
        }
}
