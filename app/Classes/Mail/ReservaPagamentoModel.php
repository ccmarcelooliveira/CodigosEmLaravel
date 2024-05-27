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
class ReservaPagamentoModel {
    
      //CONSULTAS
    public function ConsultaReservaPagamento($idReserva) {
        //echo $perfil;
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idReserva_decripto = $seguranca -> decripto($idReserva);
        //echo $perfil;
        $results = "";
        $perfil = Auth::user()-> perfil_idperfil;
        
        if($perfil == 1){
            
            $results = DB::table('reservas')       
                               ->join('apartamentos', 'reservas.apartamento_idapartamento', '=', 'apartamentos.idapartamento')
                               ->join('area_comums', 'area_comums.idarea_comum', '=', 'reservas.area_comum_idarea_comum')
                                ->select('reservas.CmpDataReserva','reservas.CmpDataInclusao',
                                        'reservas.idreserva',
                                        'reservas.CmpCodigoUnico',
                                        'reservas.CmpStatus',
                                        'reservas.CmpComentario',                                        
                                        'reservas.CmpMotivo',
                                        'apartamentos.CmpApto',
                                        'apartamentos.CmpBloco',
                                        'area_comums.CmpAreaComum'
                                        )  
                               ->where('reservas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                               ->where('apartamentos.idapartamento', '=', Auth::user()->apartamento_idapartamento)                                
                               ->get();
            
        }
        if($perfil == 3 || $perfil == 2){ //Administrador ou operador
            
                $results = DB::table('reservas')   
                            ->join('apartamentos', 'reservas.apartamento_idapartamento', '=', 'apartamentos.idapartamento')
                            ->join('area_comums', 'area_comums.idarea_comum', '=', 'reservas.area_comum_idarea_comum')
                            ->select('reservas.CmpDataReserva',
                                    'reservas.CmpDataInclusao',
                                    'reservas.idreserva',
                                    'reservas.CmpCodigoUnico',
                                    'reservas.CmpStatus',
                                    'reservas.CmpComentario',                                    
                                    'reservas.CmpMotivo',
                                    'apartamentos.CmpApto',
                                    'apartamentos.CmpBloco',
                                    'area_comums.CmpAreaComum')                                             
                            ->where('reservas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                            ->where('reservas.CmpStatus', '<>', "DTV")
                            ->orderBy('reservas.CmpDataReserva', 'desc')
                            ->get();
                
        }
        
        return $results;
    }
    
    public function ConsultaReservaDashBoard() {
       
        $results = DB::table('reservas')   
                    ->join('apartamentos', 'reservas.apartamento_idapartamento', '=', 'apartamentos.idapartamento')
                    ->join('area_comums', 'area_comums.idarea_comum', '=', 'reservas.area_comum_idarea_comum')
                    ->select('reservas.CmpDataReserva',
                            'reservas.CmpDataInclusao',
                            'reservas.idreserva',
                            'reservas.CmpCodigoUnico',
                            'reservas.CmpStatus',
                            'reservas.CmpComentario',                                    
                            'reservas.CmpMotivo',
                            'apartamentos.CmpApto',
                            'apartamentos.CmpBloco',
                            'area_comums.CmpAreaComum')                                             
                    ->where('reservas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                    ->where('reservas.CmpStatus', '=', "ATV")
                    ->orderBy('reservas.CmpDataReserva', 'desc')
                    ->get();
                
        
        
        return $results;
    }
    
    public function ConsultaReservaPorID($idReserva) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idReserva_decripto = $seguranca -> decripto($idReserva);
        
            return $results = DB::table('reservas')       
                        ->join('apartamentos', 'reservas.apartamento_idapartamento', '=', 'apartamentos.idapartamento') 
                        ->join('moradors', 'reservas.apartamento_idapartamento', '=', 'moradors.apartamento_idapartamento')
                        ->join('area_comums', 'area_comums.idarea_comum', '=', 'reservas.area_comum_idarea_comum')
                         ->select('reservas.CmpDataReserva',
                                 'reservas.CmpDataInclusao',
                                 'reservas.idreserva',
                                 'reservas.CmpCodigoUnico',
                                 'reservas.CmpStatus',
                                 'reservas.CmpComentario',                                 
                                 'reservas.CmpMotivo',
                                 'apartamentos.CmpApto',
                                 'apartamentos.CmpBloco',
                                 'area_comums.CmpAreaComum',
                                 'moradors.idmorador',
                                 'moradors.CmpNome')                                        

                        ->where('reservas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                        ->where('reservas.idreserva', '=', $idReserva_decripto)
                        ->where('moradors.CmpStatus', '=', "ATV")
                        ->get();
            
    }
    
    public function ConsultaReservaPorData($request) {
        $util = new \app\Util\Util();
        //echo "TSTE ". $util->formatarDataMysql($request->input("dataReserva"));
        
        $results = DB::table('reservas')       
                                   ->select('reservas.*')                 
                                   ->where('reservas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                                   ->where('reservas.CmpDataReserva', '=', $util->formatarDataMysql($request->input("dataReserva")))
                                   ->where('reservas.CmpStatus', '<>', "DTV")
                                   ->where('reservas.CmpStatus', '<>', "ATV")
                                   ->where('reservas.CmpStatus', '<>', "ANS")
                                   ->where('reservas.CmpStatus', '<>', "ACT")     
                                   ->get();
         return count($results);
    }
    
    
    public function ConsultaReservaPorAreaComum($idAreaComum) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAreaComum_decripto = $seguranca -> decripto($idAreaComum);
        
            return $results = DB::table('reservas')
                        ->select('reservas.*')
                        ->where('reservas.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                        ->where('reservas.area_comum_idarea_comum', '=', $idAreaComum_decripto)
                        ->where('reservas.CmpStatus', '=', "ATV");
            
    }
    
    public function insereReservaPagamento($idReserva,$idPagamento){
      
        $util = new \app\Util\Util();
        
         //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        
        try {
            
                $reservaPagamento = new \App\ReservaPagamento();
       
                $reservaPagamento -> CmpDataInclusao = date('Y-m-d');
                $reservaPagamento -> CmpStatus = "ATV"; //APR -> para ser aprovada. ANS -> Análise       
                                
                //RELACIONAMENTO COM O CONDOMINIO
                $reservaPagamento -> condominio() -> associate(Auth::user()-> condominio_idcondominio);
                $reservaPagamento -> reservas() -> associate($idReserva);
                $reservaPagamento -> pagamento() -> associate($idPagamento);

                //REALIZA O COMMIT DA OPERACAO
                $result = $reservaPagamento -> save();                         
               
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return $reservaPagamento -> idreserva;

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
                return "ERR_INS_RES"; //ERRO DE INSERCAO DE DOCUMENTO
        }
    }
    
        //EXCLUIR TODOS OS ANEXOS DO DOCUMENTO
    ////ATUALZA DOCUMENTO
    public function ExcluirReserva($idReserva){
    
        $status = "";
            
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idReserva_decripto = $seguranca->decripto($idReserva);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                if(Auth::user()->perfil_idperfil == 1){
                    $status = "DTV";
                }else{
                    $status = "DTS"; 
                }
                DB::table('reservas')                          
                    ->where('reservas.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('reservas.idreserva', '=', $idReserva_decripto)                    
                    ->update(array('reservas.CmpStatus' => $status));
                        
               
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_RES";

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
            return "ERR_EXC_RES"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    } 

    //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdateReserva(\Symfony\Component\HttpFoundation\Request $request, $idReserva){            
        
        DB::beginTransaction();
        
        try { 
            
                //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                $idReserva_decripto = $seguranca->decripto($idReserva);
                
                if($request->input("aprovar") == 1) $status = "ACT";
                if($request->input("aprovar") == 2) $status = "RJT";                
                
                DB::table('reservas')
                        ->where('idreserva', $idReserva_decripto)
                        ->update(array('CmpStatus' => $status));
                
                DB::commit();
                
                return "SUC_APR";

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
                
                return "ERR_APR";

        }
    }
    
    
}
