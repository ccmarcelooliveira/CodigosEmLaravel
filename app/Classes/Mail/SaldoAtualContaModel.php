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
 * Description of SaldoAtualConta
 *
 * @author Celia Regina
 */
class SaldoAtualContaModel {
    //
    
    public function consultaSaldoAtualConta($request,$novaData) {           
           //echo $request->input("conta");
        //echo "SALDO ";
        $idSaldo = 0;
        
        //echo $nomeConta;
        $tam = strlen(trim($novaData));
        //echo "<br>";
        $ano = substr($novaData, $tam-4, $tam);
        //echo "<BR>";
        $mes = substr($novaData, 3, 2);
       
        $results =  DB::select(" SELECT * FROM saldo_atual_contas "
                                    . " WHERE condominio_idcondominio = ".Auth::user() -> condominio_idcondominio
                                    . " AND saldo_atual_contas.planocontas_idplanocontas = ".$request->input("conta")
                                    //. " AND saldo_atual_contas.planosubcontas_idplanosubcontas = ". $request->input("subconta")
                                    . " AND saldo_atual_contas.CmpAno = ". $ano
                                    . " AND saldo_atual_contas.CmpMes = ". $mes
                                    . " AND saldo_atual_contas.CmpStatus = 'ATV'");    
    
        if(isset($results)){
            foreach($results as $item){
                $idSaldo = $item -> idsaldo_atual_contas;
            }
        }else{
            $idSaldo = 0;
        }
         
        //echo "<BR>RETORNO SALDO " .  $idSaldo . "<BR>";
        return $idSaldo;
    }
    
    public function ConsultaSaldoAtualContaV2($data,$conta,$subconta) {           
          
        $idSaldo = 0;
        $tam = strlen(trim($data));
        $ano = substr(trim($data), $tam-4, $tam);
        $mes = substr(trim($data), 3, 2);
       
        $results =  DB::select(" SELECT * FROM saldo_atual_contas "
                                    . " WHERE condominio_idcondominio = ".Auth::user() -> condominio_idcondominio
                                    . " AND saldo_atual_contas.planocontas_idplanocontas = ".$conta
                                    . " AND saldo_atual_contas.planosubcontas_idplanosubcontas = ". $subconta
                                    . " AND saldo_atual_contas.CmpAno = ". $ano
                                    . " AND saldo_atual_contas.CmpMes = ". $mes
                                    . " AND saldo_atual_contas.CmpStatus = 'ATV'");    
    
        if(isset($results)){
            foreach($results as $item){
                $idSaldo = $item -> idsaldo_atual_contas;
            }
        }else{
            $idSaldo = 0;
        }
         
        //echo "<BR>RETORNO SALDO " .  $idSaldo . "<BR>";
        return $idSaldo;
    }
    
    //PARA REALIZAR O LOCK DA ENTIDADE SALDO
    public function ConsultaSaldoLOCK($planoConta, $planoSubConta, $ano, $mes) {           
       
        try {
            //echo "LOCK SALDO<BR>";
            DB::table(" SELECT CmpSaldo FROM saldo_atual_contas "
                                        . " WHERE condominio_idcondominio = ".Auth::user() -> condominio_idcondominio
                                        . " AND saldo_atual_contas.planocontas_idplanocontas = ".$planoConta
                                        . " AND saldo_atual_contas.planosubcontas_idplanosubcontas = ". $planoSubConta
                                        . " AND saldo_atual_contas.CmpAno = ". $ano
                                        . " AND saldo_atual_contas.CmpMes = ". $mes)-> lockForUpdate();   
            return "SUC_LOCK_SD_ATUAL"; //ERRO DE INSERCAO DE DOCUMENTO
            
        } catch (Exception $ex) {
            //echo "NAO LOCK SALDO<BR>";
            return "ERR_LOCK_SD_ATUAL"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
        
    }
    
    public function consultaSaldoTotalConta($planoConta, $ano, $mes) {           
           //echo $request->input("conta");
        //echo "SALDO ";
        $total = 0;
        /*$tam = strlen($request->input("vencto"));
        $ano = substr($request->input("vencto"), $tam-4, $tam);
        */
        //$planoConta. " SUB ".$planoSubConta . " ANO " . $ano . " MES " . $mes;
        //echo "<BR>";
        /*echo " SELECT CmpSaldo FROM saldo_atual_contas "
                                    . " WHERE condominio_idcondominio = ".Auth::user() -> condominio_idcondominio
                                    . " AND saldo_atual_contas.planocontas_idplanocontas = ".$planoConta
                                    . " AND saldo_atual_contas.planosubcontas_idplanosubcontas = ". $planoSubConta
                                    . " AND saldo_atual_contas.CmpAno = ". $ano
                                    . " AND saldo_atual_contas.CmpMes = ". $mes;*/
        echo " SELECT CmpSaldo FROM saldo_atual_contas "
                                    . " WHERE condominio_idcondominio = ".Auth::user() -> condominio_idcondominio
                                    . " AND saldo_atual_contas.planocontas_idplanocontas = ".$planoConta
                                    //. " AND saldo_atual_contas.planosubcontas_idplanosubcontas = ". $planoSubConta
                                    . " AND saldo_atual_contas.CmpAno = ". $ano
                                    . " AND saldo_atual_contas.CmpMes = ". $mes;
        echo "<BR>";
        $results =  DB::select(" SELECT CmpSaldo FROM saldo_atual_contas "
                                    . " WHERE condominio_idcondominio = ".Auth::user() -> condominio_idcondominio
                                    . " AND saldo_atual_contas.planocontas_idplanocontas = ".$planoConta
                                    //. " AND saldo_atual_contas.planosubcontas_idplanosubcontas = ". $planoSubConta
                                    . " AND saldo_atual_contas.CmpAno = ". $ano
                                    . " AND saldo_atual_contas.CmpMes = ". $mes);   
    
        if(isset($results)){
            foreach($results as $item){
                $total = $item -> CmpSaldo;
            }
        }else{
            $total = 0;
        }
         
        return $total;
        
    }
    
    //    
    public function insereSaldoAtualConta(Request $request,$total,$novaData){ 
  
            echo "SALDO " . $novaData;
        
            $saldoAtualContas = new \App\SaldoAtualContas();
            $util = new \App\Util\Util();          
            
            //INÍCIO DA TRANSAÇÃO DO BANCO
            DB::beginTransaction();
        
            try {
                    //Monta o numero do Ramal
                   echo "Ano " .  $saldoAtualContas -> CmpAno = $util -> devolve_partes_data($novaData,"a");
                    $saldoAtualContas -> CmpMes = $util -> devolve_partes_data($novaData,"m");
                    $saldoAtualContas -> CmpStatus = 'ATV';
                    $saldoAtualContas -> CmpDataInclusao = date('Y-m-d H:i:s');
                    $saldoAtualContas -> CmpSaldo = $total;   

                    $saldoAtualContas -> condominio() ->associate(Auth::user() -> condominio_idcondominio);  
                    $saldoAtualContas -> conta() -> associate($request->input("conta"));
                    //$saldoAtualContas -> subconta() -> associate($request->input("subconta"));

                    /*****************************FIM HISTORICO DE OPERACOES**************************************************/
                    $result = $saldoAtualContas -> save();

                    //$historico = new HistoricoOperacaoModel();
                    //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "RAMAL");
                    
                    DB::commit();

                    return $saldoAtualContas->idsaldo_atual_contas;

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
                    return "ERR_CAD_SD_ATUAL"; //ERRO DE INSERCAO DE DOCUMENTO
                }               
        }
        
        public function InsereSaldoAtualContaV2($conta, $subConta, $ano, $mes, $totalAtualizado){ 
  
        
            $saldoAtualContas = new \App\SaldoAtualContas();
            $util = new \App\Util\Util();
          
            //echo "<BR> Total Atualizado:  " . $totalAtualizado . "<BR>";// . " - " . $nomeConta . "<BR>";
            //INÍCIO DA TRANSAÇÃO DO BANCO
            DB::beginTransaction();
        
            try {
                    //Monta o numero do Ramal
                    $saldoAtualContas -> CmpAno = $ano;
                    $saldoAtualContas -> CmpMes = $mes;
                    $saldoAtualContas -> CmpStatus = 'ATV';
                    $saldoAtualContas -> CmpDataInclusao = date('Y-m-d H:i:s');
                    $saldoAtualContas -> CmpSaldo = $totalAtualizado;   

                    $saldoAtualContas -> condominio() ->associate(Auth::user() -> condominio_idcondominio);  
                    $saldoAtualContas -> conta() -> associate($conta);
                    $saldoAtualContas -> subconta() -> associate($subConta);

                    /*****************************FIM HISTORICO DE OPERACOES**************************************************/
                    $result = $saldoAtualContas -> save();

                    //$historico = new HistoricoOperacaoModel();
                    //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "RAMAL");
                    
                    DB::commit();

                    return $saldoAtualContas->idsaldo_atual_contas;

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
                    return "ERR_CAD_SD_ATUAL"; //ERRO DE INSERCAO DE DOCUMENTO
                }               
        }
        
        
        public function UpdateSaldoAtualConta($request, $totalAtualizado,$novaData){ 
        
            $data = array();

            //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
            $util = new \app\Util\Util();

            //GRADE DE SEGURANCA
            /*$seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
            $idBem_decripto = $seguranca->decripto($idBem);*/

            echo "Data Saldo " .  $novaData;
            $result = 0;
            $ano = "";
            $mes = "";

                //Inicio transacao
                DB::beginTransaction();

                try {  

                        echo " tedte " . $data = $util -> SplitDate($novaData);        

                        $result = DB::table('saldo_atual_contas')
                                     ->where('planocontas_idplanocontas', $request->input("conta"))                                    
                                     ->where('CmpAno', $data["ano"])
                                     ->where('CmpMes', $data["mes"])
                                     ->update(array('CmpSaldo' => $totalAtualizado));     


                        //INSERINDO HISTÓRICO
                        $historico = new \App\Classes\HistoricoOperacaoModel();
                        //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "OK", "BEM");                

                    DB::commit();

                    return "SUC";

                } catch (Exception $ex) {

                    //DESFAZ OPERAÇÃO
                    DB::rollback();

                    //CLASSE DE ERROS DO PROJETO
                    $erros = new \App\Classes\ErroModel();
                    $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

                    $historico = new \App\Classes\HistoricoOperacaoModel();
                   // $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "NOK", "BEM");                

                    DB::commit();
                    return "ERR"; //ERRO DE INSERCAO DE DOCUMENTO
                }   

        }
        public function UpdateSaldoAtualConta2($conta, $ano,$mes, $totalAtualizado){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        /*$seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idBem_decripto = $seguranca->decripto($idBem);*/
        $result = 0;
        echo $conta." -". $ano." -".$mes." -". $totalAtualizado . "<BR>";
        
        DB::beginTransaction();        
        try {  
               
                //ATUALIZAÇÃO DO SALDO DA CONTA
                DB::table('saldo_atual_contas')
                        ->where('CmpAno', $ano)
                        ->where('CmpMes', $mes)
                        ->where('planocontas_idplanocontas', $conta)
                        //->where('planosubcontas_idplanosubcontas', $subconta)
                        ->update(array('CmpSaldo' => $totalAtualizado));
                 
                
                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "OK", "BEM");                

                DB::commit();

                return "SUC_EDI_SALDO";

        } catch (Exception $ex) {
            
            DB::rollback();
            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
           // $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "NOK", "BEM");                
            
            DB::commit();
            return "ERR_EDI_SALDO"; //ERRO DE INSERCAO DE DOCUMENTO
        } 


    }
    
    /*ATUALIZAÇÃO DAS CONTAS */
    public function UpdateInsertSaldoContas($data,$conta,$subConta){
        
        //echo "<BR> DATA ". $data . " - CONTA : " . $conta . " SUB ". $subConta . "<BR>";
        $pagamentoModel = new \App\Classes\PagamentoModel();
        $tam = strlen(trim($data));
        $ano = substr(trim($data), $tam-4, $tam);
        $mes = substr(trim($data), 3, 2);
        
        $total = $pagamentoModel -> ConsultaTotalPagamentoPorConta2($data,$conta,$subConta); 
        if($total == null){
            $total = 0;
        }
        
        if($this -> ConsultaSaldoAtualContaV2($data,$conta,$subConta) > 0){   
            //echo "UPDATE <BR>";
            $this ->  UpdateSaldoAtualConta2($conta, $subConta, $ano, $mes, $total);
        }else{ 
            //echo "INSERT <BR>";
            $this -> InsereSaldoAtualContaV2($conta, $subConta, $ano, $mes, $total);
        }
    }
}
