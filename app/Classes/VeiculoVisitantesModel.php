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
class VeiculoVisitantesModel {
    //put your code here
    
     public function VeiculoVisitantesModel(){

     }
     
     public function insereVeiculoVisitante(\Illuminate\Http\Request $request){ 
         
            $veiculo = new \App\Veiculos();
         
            //CRIACAO DOS VEICULOS
            $veiculo -> CmpTipoVeiculo = $request->input("catVeiculo");
            $veiculo -> CmpMarca = $request->input("marca");
            $veiculo -> CmpModelo = $request->input("modelo");
            $veiculo -> CmpPlaca = $request->input("placa");
            $veiculo -> CmpCor = $request->input("cor");
            
            $veiculo -> CmpStatus = "ATV";                              //Reservado
            $veiculo -> vaga_garagem_idvaga_garagem =  $request->input("catVagaGaragem");
            $veiculo -> condominio_idcondominio = Auth::user()->condominio_idcondominio;
            $veiculo -> CmpDataInclusao = date('Y-m-d H:i:s');
            $veiculo -> CmpDespacho = "..."; 
            $veiculo -> cartao_idcartao = $request->input("catCartaoEstacionamento");
            
            $result = $veiculo->save();
            
            //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
            $util = new \App\Util\Util();
            
            $historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "VEICULO");
            $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "VEICULO");
    
            return $veiculo->idveiculo;
    }
    
   
    
    //CONSULTAR APARTAMENTO COM ARGUMENTOS
    //31/12/2017
    public function consultarVeiculoVisitante($idVeiculo){
       
        if($idVeiculo != ""){
            
             return DB::table('veiculos')                                          
                                ->join('apartamentos', 'veiculos.apartamento_idapartamento', '=', 'apartamentos.idapartamento')     
                                ->select('veiculos.*','apartamentos.*')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('veiculos.CmpStatus', '=', 'ATV')                                  
                                ->where('veiculos.idveiculo', '=', $idVeiculo) 
                                ->get();
        }else{
            
           /* $results = DB::table('veiculos')                                          
                                ->join('vaga_garagems', 'vaga_garagems.idvaga_garagem', '=', 'veiculos.vaga_garagem_idvaga_garagem')  
                                ->join('cartaos', 'cartaos.idcartao', '=', 'veiculos.cartao_idcartao')
                                ->join('apartamentos', 'vaga_garagems.apartamento_idapartamento', '=', 'apartamentos.idapartamento')     
                                ->leftJoin('anexos', 'veiculos.idveiculo', '=', 'anexos.CmpDonoAnexo')
                                ->select('vaga_garagems.*','veiculos.*','cartaos.*','anexos.*','apartamentos.*')
                                ->where('vaga_garagems.CmpStatus', '=', 'ATV')
                                ->where('anexos.CmpStatus', '=', 'ATV')
                                ->where('anexos.CmpCategoriaObjeto', '=', 'V_IMG')
                                ->where('veiculos.CmpStatus', '=', 'ATV')                                        
                                ->get();
            * 
            */
            //echo "aqui";
            return DB::table('veiculos')                                          
                                ->join('apartamentos', 'veiculos.apartamento_idapartamento', '=', 'apartamentos.idapartamento')     
                                ->select('veiculos.*','apartamentos.*')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('veiculos.CmpStatus', '=', 'ATV')  
                                
                                ->get();
            
        }
                               
                          


    }

    
    
    //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdateVeiculoVisitante(\Symfony\Component\HttpFoundation\Request $request, $idVeiculo){            
        //echo "antes " . $idVeiculo;
        //begin
        DB::beginTransaction();

        
        try { 
            
                //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                $id_decripto = $seguranca->decripto($idVeiculo);
                
                DB::table('veiculos')->where('idveiculo', $id_decripto)->update(array('CmpTipoVeiculo' => $request->input("catVeiculo"),                                                                                             
                                                                                              'CmpPlaca' => $request->input("placa"),                                                                                                                                                                                               
                                                                                              'CmpDespacho' => $request->input("descricao"),                                                                                              
                                                                                              'apartamento_idapartamento' => $request->input("selApartamento")
                                                                                              ));
                
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
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ALT", "OK", "CONDOMINIO");

                DB::commit();

        }
    }
        
    //EXCLUIR TODOS OS ANEXOS DO DOCUMENTO
    ////ATUALZA DOCUMENTO
    public function ExcluirVeiculoVisitante($idVeiculo){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVeiculo_decripto = $seguranca->decripto($idVeiculo);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('veiculos')                          
                    ->where('veiculos.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('veiculos.idveiculo', '=', $idVeiculo_decripto)                    
                    ->update(array('veiculos.CmpStatus' => 'DTV'));
                        
               
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
    
    
    //DASHBOARD
    public function ConsultarTodosVeiculosVisitantes() {
       
        return $results = DB::table('veiculos')                                          
                    ->select('veiculos.idveiculo')                                                     
                    ->where('veiculos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)                   
                    ->get();
    }
    
    
     public function ConsultarTodasEntrega() {
       
        return $results = DB::table('entregas')                                          
                    ->select('entregas.identregas')                                                     
                    ->where('entregas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)                    
                    ->get();
    }
}
