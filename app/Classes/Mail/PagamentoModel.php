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
 * Description of PagamentoModel
 *
 * @author Celia Regina
 */
class PagamentoModel {
    
    
    public function ConsultaPagamento($idPagamento) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPagamento_decripto = $seguranca -> decripto($idPagamento);
         
        $results = DB::table('pagamentos')          
            ->join('plano_contas', 'plano_contas.idplano_contas', '=', 'pagamentos.planocontas_idplanocontas') 
            ->select('pagamentos.idpagamento',
                    'pagamentos.CmpDataVencimento',
                    'pagamentos.CmpDataPagamento',
                    'pagamentos.CmpValor',
                    'pagamentos.CmpMesAno',                   
                    'pagamentos.CmpDescricao',                   
                    'pagamentos.planocontas_idplanocontas',                   
                    'pagamentos.CmpDataInclusao',
                    'pagamentos.CmpStatus',
                    'plano_contas.CmpConta')                                      
                    ->where('pagamentos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio);
                    //->whereIn('pagamentos.CmpStatus', ['PEN','ATV','BAI','SUS']) ;

            if($idPagamento_decripto > 0){
                    $results = $results ->where('pagamentos.idpagamento', '=', $idPagamento_decripto);
            }                
                    $results = $results -> get();
                                    
           // echo "lista " . $results;
        return $results;
    }

    /**
     * CONSULTA POR ID APARTAMENTO
     * @param type $idPagamento
     * @return type
     */
    
    public function ConsultaPagamentoPorIdApartamento() {
               
        $util = new \App\Util\Util();
        
        $results = DB::table('pagamentos')  
            ->select('pagamentos.idpagamento',
                    'pagamentos.CmpDataVencimento',
                    'pagamentos.CmpValor',
                    'pagamentos.CmpMesAno',
                    'pagamentos.CmpStatus')                                      
                    ->where('pagamentos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                    ->where('pagamentos.apartamento_idapartamento', '=', Auth::user()->apartamento_idapartamento)
                    ->where('pagamentos.CmpStatus', '=', 'ATV')
                    ->get();
        
        foreach ($results as $item){
            $item -> CmpDataVencimento = strtoupper($util -> mes_extenso_previsao($item -> CmpMesAno)) ."/". substr($item -> CmpMesAno, 3, 4) ." -- EM ATRASO";
            $item -> CmpValor = "R$ ". number_format($item -> CmpValor, 2, ',', '.'); 
            
            echo $util -> diff($item -> CmpDataVencimento, date('d/m/Y'), "d") . "<BR>";
            //echo $util -> mes_extenso_previsao($item -> CmpMesAno) . "<BR>";
            /*$util -> recupera_partes_data($data, $parte)
                    mes_extenso_previsao($mes_ano)
                    
                    diff($inicio, $fim, $tipo)*/
        }
        
        return $results;
    }
    
    
    public function ConsultaPagamentoV2($idPagamento) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPagamento_decripto = $seguranca -> decripto($idPagamento);
         
        $results = DB::table('pagamentos')          
            ->join('plano_contas', 'plano_contas.idplano_contas', '=', 'pagamentos.planocontas_idplanocontas') 
            ->select('pagamentos.idpagamento',
                    'pagamentos.CmpDataVencimento',
                    'pagamentos.CmpDataPagamento',
                    'pagamentos.CmpValor',
                    'pagamentos.CmpMesAno',                   
                    'pagamentos.CmpDescricao',                   
                    'pagamentos.planocontas_idplanocontas',                   
                    'pagamentos.CmpDataInclusao',
                    'plano_contas.CmpConta')  
                    ->where('pagamentos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                    ->where('pagamentos.CmpStatus', '=', 'PEN');

            if($idPagamento_decripto > 0){
                    $results = $results ->where('pagamentos.idpagamento', '=', $idPagamento_decripto);
            }                
                    $results = $results -> get();
                                    
            //echo "lista " . $results;
        return $results;
    }

    public function ConsultaTotalPagamentoPorConta(Request $request) {
        
        $mesAno = "";
        $contador = 0;
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();   
       
        $mes_ano = explode("/", $request->input("vencto"));
        $mesAno = $mes_ano[1]."_".$mes_ano[2]; 
        
        $results =  DB::select("SELECT SUM(pagamentos.CmpValor) total
                                       FROM pagamentos 
                                       WHERE planocontas_idplanocontas = ".$request->input("conta").                                       
                                       " AND condominio_idcondominio = ".Auth::user() -> condominio_idcondominio.
                                       " AND CmpMesAno = '".$mesAno."' AND CmpStatus = 'ATV'"); 
        foreach($results as $item){
             //return $item -> total;
            $contador = $contador + $item -> total; 
        }
       
        return $contador;
    }
    
    public function ConsultaTotalPagamentoPorConta_V2($conta,$mesAno) {
       
        $contador = 0;
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();         
        
        $results =  DB::select("SELECT SUM(pagamentos.CmpValor) total
                                       FROM pagamentos 
                                       WHERE planocontas_idplanocontas = ".$conta.                                       
                                       " AND condominio_idcondominio = ".Auth::user() -> condominio_idcondominio.
                                       " AND CmpMesAno = '".$mesAno."' AND CmpStatus IN ('PEN','BAI', 'ATV')"); 
        foreach($results as $item){
             //return $item -> total;
            $contador = $contador + $item -> total; 
        }
       
        return $contador;
    }
    
    public function ConsultaTotalMultiplosPagamentos(Request $request, $novaData) {
        
        $mesAno = "";
        $contador = 0;
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();   
       
        $mes_ano = explode("/", $novaData);
        $mesAno = $mes_ano[1]."_".$mes_ano[2]; 
        
        $results =  DB::select("SELECT SUM(pagamentos.CmpValor) total
                                       FROM pagamentos 
                                       WHERE planocontas_idplanocontas = ".$request->input("conta").                                       
                                       " AND condominio_idcondominio = ".Auth::user() -> condominio_idcondominio.
                                       " AND CmpMesAno = '".$mesAno."' AND CmpStatus = 'BAI'"); 
        foreach($results as $item){
             //return $item -> total;
            $contador = $contador + $item -> total; 
        }
       
        return $contador;
    }
    
    public function ConsultaTotalPagamentoPorConta2($data,$conta,$subconta) {
        
        $mesAno = "";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $mes_ano = explode("/", $data);
        $mesAno = $mes_ano[1]."_".$mes_ano[2]; 
        /*echo "SELECT SUM(pagamentos.CmpValor) total
                                       FROM pagamentos 
                                       WHERE planocontas_idplanocontas = ".$conta.
                                       " AND planosubcontas_idplanosubcontas = ". $subconta.
                                       " AND condominio_idcondominio = ".Auth::user() -> condominio_idcondominio.
                                       " AND CmpMesAno = '".trim($mesAno)."' AND CmpStatus = 'ATV'";*/
        $results =  DB::select("SELECT SUM(pagamentos.CmpValor) total
                                       FROM pagamentos 
                                       WHERE planocontas_idplanocontas = ".$conta.
                                       " AND planosubcontas_idplanosubcontas = ". $subconta.
                                       " AND condominio_idcondominio = ".Auth::user() -> condominio_idcondominio.
                                       " AND CmpMesAno = '".trim($mesAno)."' AND CmpStatus = 'ATV'"); 
        //return $results;
        
        if(isset($results)){
            foreach($results as $item){
                return $item -> total;
            }
        }else{
            return 0;
        }
    }
    
    //PAGAMENTO 
    public function cadastrarPagamento($request){

        $util = new \App\Util\Util();
        $pagamento = new \App\Pagamento($request->all());

        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        
                try {
                    
                //$mensagem -> CmpDescricao = $request->input("descricao");
                $pagamento -> CmpDataVencimento = $util->formatarDataMysql($request->input("vencto"));  
                if($request->input("pagto") != "") $pagamento -> CmpDataPagamento = $util->formatarDataMysql($request->input("pagto"));
                
                $pagamento -> CmpValor = $util->RetirarPonto_PontoVirgula($request->input("valor"));
                //$pagamento -> CmpCaixaPequeno = $request->input("caixaPequeno");
                $pagamento -> CmpDescricao = $request->input("descricao");   

                //MONTAGEM DO MES_ANO
                $mes = $util->recupera_partes_data($request->input("vencto"),'m') - 1;       
                $ano = $util->recupera_partes_data($request->input("vencto"),'a');
                $mes_ano = $util->mes_ano_previsao($mes,$ano);
                $pagamento -> CmpMesAno = $mes_ano;   

                //$pagamento -> CmpClasseMovimento = $request->input("formPagto");
                $pagamento -> CmpDataInclusao = date('Y-m-d H:i:s');
                $pagamento -> CmpStatus = "PEN"; //STATUS POSSIVEIS: PEN, BAI...

                //RELACIONAMENTO COM O CONDOMINIO
                $pagamento -> condominio() -> associate(Auth::user()->condominio_idcondominio); 

               // if($request->input("fornecedor") != "") $pagamento -> fornecedor() -> associate($request->input("fornecedor")); 

                //$pagamento -> contas() -> associate($request->input("conta"));
                $pagamento -> contas() -> associate($request->input("conta"));
               // $pagamento -> subcontas() -> associate($request->input("subconta"));

                //REALIZA O COMMIT DA OPERACAO
                $result = $pagamento -> save(); 

               /* $historico = new HistoricoOperacaoModel();
                $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "FORNECEDOR");
                */
                   
                DB::commit();
                    
                return $pagamento -> idpagamento;   

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
            return "ERR_CAD_PAG"; //ERRO DE INSERCAO DE DOCUMENTO
        }        

    }
    
    //INSERÇÃO DE MÚLTIPLOS PAGAMENTOS 
    public function CadastrarMultiplosPagamentos($request,$novaData){

        
        $util = new \App\Util\Util();
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        
                try {                
                    
                    $pagamento = new \App\Pagamento($request->all());
                    
                    //$mensagem -> CmpDescricao = $request->input("descricao");
                    $pagamento -> CmpDataVencimento = $util->formatarDataMysql($novaData);  
                    if($request->input("pagto") != "") $pagamento -> CmpDataPagamento = $util->formatarDataMysql($request->input("pagto"));

                    $pagamento -> CmpValor = $util->RetirarPonto_PontoVirgula($request->input("valor"));
                    //$pagamento -> CmpCaixaPequeno = $request->input("caixaPequeno");
                    $pagamento -> CmpDescricao = $request->input("descricao");   
                    
                    //MONTAGEM DO MES_ANO
                    $mes = $util->recupera_partes_data(trim($novaData),'m') - 1;  
                   
                    $ano = $util->recupera_partes_data(trim($novaData),'a');
                    $mes_ano = $util->mes_ano_previsao($mes,$ano);
                    $pagamento -> CmpMesAno = $mes_ano;   

                    //$pagamento -> CmpClasseMovimento = $request->input("formPagto");
                    $pagamento -> CmpDataInclusao = date('Y-m-d H:i:s');
                    $pagamento -> CmpStatus = "PEN"; //STATUS POSSIVEIS: PEN, BAI...

                    //RELACIONAMENTO COM O CONDOMINIO
                    $pagamento -> condominio() -> associate(Auth::user()->condominio_idcondominio); 

                   // if($request->input("fornecedor") != "") $pagamento -> fornecedor() -> associate($request->input("fornecedor")); 

                    //$pagamento -> contas() -> associate($request->input("conta"));
                    $pagamento -> contas() -> associate($request->input("conta"));
                   // $pagamento -> subcontas() -> associate($request->input("subconta"));

                    //REALIZA O COMMIT DA OPERACAO
                    $result = $pagamento -> save(); 

                   /* $historico = new HistoricoOperacaoModel();
                    $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "FORNECEDOR");
                    */

                    DB::commit();

                    return $pagamento -> idpagamento; 
                    

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
            return "ERR_CAD_PAG"; //ERRO DE INSERCAO DE DOCUMENTO
        }        
        
        

    }
    
    
    
    //INSERÇÃO DAS COTAS CONDOMINIAIS DO CONDOMÍNIO
    public function CadastrarCotaCondominial($diaPagto,$valor,$ano,$conta){
        
        $util = new \App\Util\Util();
        $bloco = "";
        $contador = 0;
        $inicio = 1;
        $virgula = "";
        $totalAptos = 0;
        $totalCoberturas = 0;
        $totalSql = 0;
            
        
        $apartamentoModel = new \App\Classes\ApartamentoModel();
        $lista = $apartamentoModel -> consultarApartamento();
        
        $infra = new \App\Classes\InfraEstruturaModel();
        $infraModel = $infra -> ConsultaInfraEstruturaCadastro(Auth::user()->condominio_idcondominio);
                 
        $valorCondominio = 0;
        $valorTaxaExtra = 0;
        $valorCondominioCobertura = 0;
        $valorTaxaExtraCobertura = 0;
        
        foreach($infraModel as $item){
            $totalAptos = $totalAptos + (($item -> CmpNumAndares - $item->CmpAptoInicio +1) * $item -> CmpNumAptosPorAndar  * $item -> CmpNumBlocos);// + $item -> CmpConberturaPorPredio;
            
            $totalCoberturas = $totalCoberturas +  ($item -> CmpConberturaPorPredio * $item -> CmpNumBlocos);
        }
        
        /* " TOTAL " . ($totalAptos + $totalCoberturas). "<BR>";       
        echo $valor ."<BR>";*/
        $valor = ($util-> RetirarPonto_PontoVirgula(($valor))/12) / ($totalAptos + $totalCoberturas);
                
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        
                try {                
                                                          
                    foreach($lista as $item){
                        
                        for ($j = 1; $j <= 12; $j++){
                            //MONTAGEM DO MES_ANO
                                                        
                            if($j < 10) $contador = "0".$j;
                            else $contador = $j;

                            $bloco = $bloco . $virgula . "('".$ano."-".$contador."-".$diaPagto."','".date('Y-m-d H:i:s')."','".$valor."','".$item->CmpApto ."-".$item->CmpBloco."','".$contador."_".$ano."','ATV',".Auth::user()->condominio_idcondominio.",".$item->idapartamento.",".$conta.")";
                            $virgula = ",";
                            $totalSql++;
                        }
                        
                        $j=1;
                        
                        if($totalSql <= 245){
                            
                            $sql = "INSERT INTO pagamentos(CmpDataVencimento, "
                                            . " CmpDataInclusao,"
                                            . " CmpValor, "
                                            . " CmpDescricao,"
                                            . " CmpMesAno,"
                                            . " CmpStatus,"
                                            . " condominio_idcondominio,"
                                            . " apartamento_idapartamento,"
                                            . " planocontas_idplanocontas) "
                                            . " VALUES " . $bloco;
                                            
                            $bloco = "";
                            $virgula = "";
                            $results =  DB::insert($sql);
                            $totalSql = 0;
                            
                        }
                    }    
                   
                    
                    DB::commit();
                    
                    

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
            $erros->save();*/

            DB::commit();
            return "ERR_CAD_PAG"; //ERRO DE INSERCAO DE DOCUMENTO
        }        

    }
    
    /***
     * CADASTRO DE PAGAMENTO DE FORMA AUTOMÁTICA
     */
    
     //PAGAMENTO 
    public function CadastrarPagamentoReserva($Vencto,$valor,$descricao,$conta){

        $util = new \App\Util\Util();
        $pagamento = new \App\Pagamento();
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        
                try {
                    
                //$mensagem -> CmpDescricao = $request->input("descricao");
                $pagamento -> CmpDataVencimento = $util->formatarDataMysql($Vencto);  
                $pagamento -> CmpValor = $util->RetirarPonto_PontoVirgula($valor);
                $pagamento -> CmpDescricao = $descricao;   

                //MONTAGEM DO MES_ANO
                $mes = $util->recupera_partes_data($Vencto,'m') - 1;       
                $ano = $util->recupera_partes_data($Vencto,'a');
                $mes_ano = $util->mes_ano_previsao($mes,$ano);
                $pagamento -> CmpMesAno = $mes_ano;   

                $pagamento -> CmpDataInclusao = date('Y-m-d H:i:s');
                $pagamento -> CmpStatus = "PEN"; //PEN - > pagamento pendente; ATV - > regularizado.

                //RELACIONAMENTO COM O CONDOMINIO
                $pagamento -> condominio() -> associate(Auth::user()->condominio_idcondominio); 
                $pagamento -> contas() -> associate($conta);

                //REALIZA O COMMIT DA OPERACAO
                $result = $pagamento -> save(); 

               /* $historico = new HistoricoOperacaoModel();
                $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "FORNECEDOR");
                */
                   
                DB::commit();
                    
                return $pagamento -> idpagamento;   

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
            return "ERR_CAD_PAG"; //ERRO DE INSERCAO DE DOCUMENTO
        }        

    }
    
    
    //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO.
    //01AGO2019 - CÓDIGO ABSORVIDO PELO CONTROLLER DE PAGAMENTO.
    
    /*public function UpdatePagamento(Request $request, $idPagamento){            
        
        //INTELIGENCIA DE NEGOCIO PARA ACERTO DE CONTAS 
        $tikunaController = new \App\Http\Controllers\Tikuna\TikunaController();
        
    }*/
    
    public function UpdatePagamento(Request $request, $idPagamento){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPagamento_decripto = $seguranca->decripto($idPagamento);
        /*echo "<br>";
        echo $idPagamento;*/
        $result = 0;
        $dt = "";
        
        //Inicio transacao
        DB::beginTransaction();
        
        try {  
               // echo $idPagamento_decripto . "<BR>";
               $mes_ano = $util -> MontarMesAno(trim($request->input("vencto")));
              //echo "<BR>teste " . $request->input("descricao"). "<BR>";
               /*echo $util ->formatarDataMysql($request->input("vencto")) . "<BR>";
               echo $request->input("conta") . "<BR>";
               echo $request->input("valor") . "<BR>";
               echo "FORNEcedor " . $util ->TestaVariavelRequest($request->input("fornecedor"));
               echo "<BR>";*/
               //ATUALIZAÇÃO DE PAGAMENTO
                DB::table('pagamentos')
                               ->where('pagamentos.idpagamento', $idPagamento_decripto)                    
                               ->update(array('CmpDataVencimento' => $util ->formatarDataMysql($request->input("vencto")),
                                               'CmpValor' => $util->RetirarPonto_PontoVirgula($request->input("valor")), 
                                               'planocontas_idplanocontas' => $request->input("conta"),
                                               'CmpDescricao' => $request->input("descricao"),
                                               'CmpMesAno' => $mes_ano));     
               
                
                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "BAI", "OK", "PAG");                

            DB::commit();

            return "PAG_EDI_SUC";

        } catch (Exception $ex) {

            echo "Erro<br>";
            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "BAI", "NOK", "PAG");                
            
            DB::commit();
            return "PAG_EDI_ERR"; //ERRO DE INSERCAO DE DOCUMENTO
        }   



    }
    
    /**
     * LOCK PARA PAGAMENTO
     * @param type $idPagamento
     */
    
    public function PagamentoLOCK($idPagamento) {
                
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        try {
                //echo "LOCK PAGAMENTO<BR>";
                //LOCK PAGAMENTO
                DB::table('pagamentos')
                            ->where('pagamentos.idpagamento', $seguranca->decripto($idPagamento))-> lockForUpdate();

                DB::commit();

                return "SUC_LOCK_PAG";

        } catch (Exception $e) {

                DB::rollback();                                        

                return "ERR_LOCK_PAG";

        }
    }
    
    //ALTERA O STATUS DO PAGAMENTO
    public function StatusPagamento($idPagamento,$status){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();
        $pagamentoModel = new \App\Classes\PagamentoModel();
        $saldoModel = new \App\Classes\SaldoAtualContaModel();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPagamento_decripto = $seguranca->decripto($idPagamento);
        $result = 0;
        
        $saldo = 0;
        $novoTotal = 0; 
        $mes_ano = ""; 
        
        //Inicio transacao
        DB::beginTransaction();
        try {                        
            
                //CONSULTAR CONTA, SUB CONTA, ANO E MÊS.
                /*$pagamento = $pagamentoModel -> ConsultaPagamentoV2($idPagamento); 
                
                foreach($pagamento as $item){
                    
                  $mes_ano = explode("_", $item -> CmpMesAno);
                    echo "teste  ". $item -> CmpMesAno. "-". $mes_ano[0] . " - ".$mes_ano[1];
                    
                    //RECUPERAR SALDO CONTA
                    echo "saldo " . $saldo = $saldoModel ->consultaSaldoTotalConta($item->planocontas_idplanocontas, $mes_ano[1], $mes_ano[0]);
                    echo "<BR>";
                    
                    $novoTotal = ($saldo - $item -> CmpValor);
                    echo $atualizarSaldo = $saldoModel -> UpdateSaldoAtualConta2($item->planocontas_idplanocontas, $mes_ano[1], $mes_ano[0], $novoTotal);
                 */   
                   // if($atualizarSaldo != "ERR_EDI_SALDO"){
                        //echo "GRADE DE SEGURANCA                ";
                        DB::table('pagamentos')->where('idpagamento', $idPagamento_decripto)->update(array('CmpStatus' => $status));  
                        DB::commit();
                    /*}else{
                        DB::rollback();
                    }*/
                    
                //}
                
                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "OK", "PAG");                

            

            return "PAG_SUC_EDI";

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "NOK", "PAG");                
            
            DB::commit();
            return "PAG_ERR_EDI"; //ERRO DE INSERCAO DE DOCUMENTO
        }   



    }
    
    public function BaixarPagamento($request, $idPagamento){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \app\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPagamento_decripto = $seguranca->decripto($idPagamento);
        $result = 0;
        $dt = "";
        
        //Inicio transacao
        DB::beginTransaction();
        
        try {  
               
            $result = DB::table('pagamentos')
                        ->where('idpagamento', $idPagamento_decripto)
                        ->update(array( 'CmpDataPagamento' => $util->formatarDataMysql($request->input("pagto")),
                            'CmpStatus' => "BAI"));     
               
                
                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "BAI", "OK", "PAG");                

            DB::commit();

            return "PAG_BAI_SUC";

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "BAI", "NOK", "PAG");                
            
            DB::commit();
            return "PAG_BAI_ERR"; //ERRO DE INSERCAO DE DOCUMENTO
        }   



    }
    
    
    
    
}
