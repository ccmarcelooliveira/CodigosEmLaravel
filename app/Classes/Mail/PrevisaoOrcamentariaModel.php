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
 * Description of PrevisaoOrcamentariaModel
 *
 * @author Celia Regina
 */
class PrevisaoOrcamentariaModel {
    
    //CONSULTAS
    public function ConsultaPrevisaoOrcamentaria($idPrevisao) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPrevisao_decripto = $seguranca -> decripto($idPrevisao);
        
        if($idPrevisao_decripto > 0){
            
            $results = DB::table('previsao_orcamentarias')                                          
                                   ->select('previsao_orcamentarias.*')
                                   ->where('previsao_orcamentarias.CmpStatus', '=', 'ATV')                  
                                   ->where('previsao_orcamentarias.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                                   ->where('previsao_orcamentarias.idprevisao_orcamentarias', '=', $idPrevisao_decripto)
                                   ->get();
            
        }else{        
         
            $results = DB::table('previsao_orcamentarias')                                          
                        ->select('previsao_orcamentarias.*')
                        ->where('previsao_orcamentarias.CmpStatus', '=', 'ATV')                  
                        ->where('previsao_orcamentarias.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                        ->get();
        }
            

        return $results;
    }
    
    public function ConsultaPrevisaoOrcamentariaPorConta($idResumoPrevisao) {
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        //$idConta_decripto = $seguranca -> decripto($idConta);       
       
        $idResumoPrevisao_decripto = $seguranca -> decripto($idResumoPrevisao);
                 
        $results = DB::table('previsao_orcamentarias')   
                               ->join('plano_contas', 'plano_contas.idplano_contas', '=', 'previsao_orcamentarias.planocontas_idplanocontas')  
                               ->join('plano_sub_contas', 'plano_sub_contas.idplano_sub_contas', '=', 'previsao_orcamentarias.planosubcontas_idplanosubcontas')  
                               ->select('previsao_orcamentarias.*','plano_sub_contas.*','plano_contas.*')
                               ->where('previsao_orcamentarias.CmpStatus', '=', 'ATV')                  
                               ->where('previsao_orcamentarias.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                               //->where('previsao_orcamentarias.planocontas_idplanocontas', '=', $idConta_decripto)
                               ->where('previsao_orcamentarias.resumo_prevOrc_idprevOrc', '=', $idResumoPrevisao_decripto)
                               ->where('previsao_orcamentarias.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                               ->get();
            

        return $results;
    }
    
    public function ConsultaPrevisaoOrcamentariaMensal($idPlanoConta,$idPlanoSubConta,$ano,$mes) {
       
        $total = 0;
       
        $util = new \App\Util\Util();
         
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
           // echo $util->DefinirCampoPrevisao($mes);
        $results = DB::table('previsao_orcamentarias')                                          
                               ->select('previsao_orcamentarias.'.$util->DefinirCampoPrevisao($mes).' as montante')
                               ->where('previsao_orcamentarias.CmpStatus', '=', 'ATV')    
                               ->where('previsao_orcamentarias.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio) 
                               ->where('previsao_orcamentarias.planocontas_idplanocontas', '=', $idPlanoConta)
                               ->where('previsao_orcamentarias.planosubcontas_idplanosubcontas', '=', $idPlanoSubConta)
                               ->where('previsao_orcamentarias.CmpAno', '=', $ano)
                               ->get();

        foreach ($results as $item){            
            $total = $item -> montante;
        }
        return $total;
    }
    
    /**
     * A IDEIA AQUI, É INCLUIR CONTAS NOVAS PARA NÃO TER QUE RECRIAR A PREVISÃO ORÇAMENTÁRIA
     */
    //CONSULTAS
    public function ConsultaPrevisaoOrcamentariaPorTipoConta($idResumoPrevisao, $tipoConta) {
        
        $data = array();
        //DEFININDO RECEITA OU DESPESA
        if($tipoConta == "RECEITA") $categoriaConta = "R";
        if($tipoConta == "DESPESA") $categoriaConta = "D";
          //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idResumoPrevisao_decripto = $seguranca -> decripto($idResumoPrevisao);
               
       /* echo " SELECT 
                                       '' as idprevisao_orcamentarias, 
                                       '' as resumo_prevOrc_idprevOrc,
                                       '' as CmpDataInclusao,         
                                       '' as CmpMontanteJaneiro,
                                       '' as CmpMontanteFevereiro,
                                       '' as CmpMontanteMarco,
                                       '' as CmpMontanteAbril,
                                       '' as CmpMontanteMaio,
                                       '' as CmpMontanteJunho,
                                       '' as CmpMontanteJulho,
                                       '' as CmpMontanteAgosto,
                                       '' as CmpMontanteSetembro,
                                       '' as CmpMontanteOutubro,
                                       '' as CmpMontanteNovembro,
                                       '' as CmpMontanteDezembro,
                                       '' as CmpAno,  
                                       '' as CmpValorOriginal,
                                       '' as CmpAjuste,
                                       p.CmpConta,
                                       p.idplano_contas                                                                             
                                       FROM plano_contas p "
                                    . " WHERE p.CmpCategoriaConta = '".$categoriaConta
                                    . "' AND p.idplano_contas NOT IN (SELECT po.planocontas_idplanocontas "
                                    . " FROM previsao_orcamentarias po "
                                    . " WHERE po.resumo_prevOrc_idprevOrc = ".$idResumoPrevisao_decripto.""
                                    . " AND po.CmpStatus = 'ATV')"
                                    . " UNION "
                                    . " SELECT po.idprevisao_orcamentarias,
                                       po.resumo_prevOrc_idprevOrc, 
                                       po.CmpDataInclusao,
                                       po.CmpMontanteJaneiro,
                                       po.CmpMontanteFevereiro,
                                       po.CmpMontanteMarco,
                                       po.CmpMontanteAbril,
                                       po.CmpMontanteMaio,
                                       po.CmpMontanteJunho,
                                       po.CmpMontanteJulho,
                                       po.CmpMontanteAgosto,
                                       po.CmpMontanteSetembro,
                                       po.CmpMontanteOutubro,
                                       po.CmpMontanteNovembro,
                                       po.CmpMontanteDezembro,
                                       po.CmpAno,
                                       po.CmpValorOriginal,
                                       po.CmpAjuste,                                       
                                       pc.CmpConta,
                                       pc.idplano_contas                                       
                                       FROM previsao_orcamentarias po, plano_contas pc
                                       WHERE po.planocontas_idplanocontas = pc.idplano_contas 
                                        AND pc.CmpCategoriaConta = '".$categoriaConta
                                       . "' AND po.resumo_prevOrc_idprevOrc = ".$idResumoPrevisao_decripto
                                       . " AND pc.CmpStatus = 'ATV'
                                        AND pc.idplano_contas";*/
        
        $result =  DB::select(" SELECT 
                                       '' as idprevisao_orcamentarias, 
                                       '' as resumo_prevOrc_idprevOrc,
                                       '' as CmpDataInclusao,         
                                       '' as CmpMontanteJaneiro,
                                       '' as CmpMontanteFevereiro,
                                       '' as CmpMontanteMarco,
                                       '' as CmpMontanteAbril,
                                       '' as CmpMontanteMaio,
                                       '' as CmpMontanteJunho,
                                       '' as CmpMontanteJulho,
                                       '' as CmpMontanteAgosto,
                                       '' as CmpMontanteSetembro,
                                       '' as CmpMontanteOutubro,
                                       '' as CmpMontanteNovembro,
                                       '' as CmpMontanteDezembro,
                                       '' as CmpAno,  
                                       '' as CmpValorOriginal,
                                       '' as CmpAjuste,
                                       p.CmpConta,
                                       p.idplano_contas                                                                             
                                       FROM plano_contas p "
                                    . " WHERE p.CmpCategoriaConta = '".$categoriaConta
                                    . "' AND p.idplano_contas NOT IN (SELECT po.planocontas_idplanocontas "
                                    . " FROM previsao_orcamentarias po "
                                    . " WHERE po.resumo_prevOrc_idprevOrc = ".$idResumoPrevisao_decripto.""
                                    . " AND po.CmpStatus = 'ATV')"
                                    . " UNION "
                                    . " SELECT po.idprevisao_orcamentarias,
                                       po.resumo_prevOrc_idprevOrc, 
                                       po.CmpDataInclusao,
                                       po.CmpMontanteJaneiro,
                                       po.CmpMontanteFevereiro,
                                       po.CmpMontanteMarco,
                                       po.CmpMontanteAbril,
                                       po.CmpMontanteMaio,
                                       po.CmpMontanteJunho,
                                       po.CmpMontanteJulho,
                                       po.CmpMontanteAgosto,
                                       po.CmpMontanteSetembro,
                                       po.CmpMontanteOutubro,
                                       po.CmpMontanteNovembro,
                                       po.CmpMontanteDezembro,
                                       po.CmpAno,
                                       po.CmpValorOriginal,
                                       po.CmpAjuste,                                       
                                       pc.CmpConta,
                                       pc.idplano_contas                                       
                                       FROM previsao_orcamentarias po, plano_contas pc
                                       WHERE po.planocontas_idplanocontas = pc.idplano_contas 
                                        AND pc.CmpCategoriaConta = '".$categoriaConta
                                       . "' AND po.resumo_prevOrc_idprevOrc = ".$idResumoPrevisao_decripto
                                       . " AND pc.CmpStatus = 'ATV'
                                        AND pc.idplano_contas");  
        

        
                                   
        return $result;
    }
    
    public function inserePrevisaoOrcamentaria($request, $idResumoPrevisao){
            
        //echo "insere";
        $util = new \App\Util\Util();    
        
        //CLASSE INTERMEDIARIA DE PARAMETROS 
        //$parametros = new \App\Util\Parametros();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                
       //echo "depois";
       $valor_ajustado = 0;
       $valor_ajustado_mensal = 0;
       $valor_total_ajustado = 0;
       $valor_total = 0;
       $ajuste = 0;
       //echo "total Despesa " . $request->input("total_despesa"); 
       //echo "TESTE " .$request->input("total_despesa") ."<BR>";
       DB::beginTransaction();
        
       try {
           
           /*echo "antes";
           echo "<BR>";
           echo " total ". $request->input("total_despesa") . "<BR>";*/
            //PARA DESPESA
            for ($j = 0; $j < $request->input("total_despesa"); $j++) {

                 //echo " DESPESA ". $j . "<BR>";
                 $previsaoOrcamentaria = new \App\PrevisaoOrcamentaria($request->all());                

                 //DIVISÃO POR 12 MESES
                // echo "valor " .$request->input("valor_ajustado_d_".$j). " J " . $j . "<BR>"; 
                         
                 if($request->input("valor_ajustado_d_".$j) != "")
                 {
                     $valor_ajustado =  trim($request->input("valor_ajustado_d_".$j));                     
                 }else{
                     $valor_ajustado =  0;
                 }
                 
                 if($request->input("ajuste_d_".$j) != "")
                 {                 
                     $ajuste = $request->input("ajuste_d_".$j);
                 }else
                 {
                     $ajuste = 0;
                 }
                         
                 //echo "<BR>";
                 $valor_ajustado_mensal = str_replace(".","",$valor_ajustado)/12;
                 $valor_total =  str_replace(",",".",str_replace(".","",$valor_ajustado)); 

                 $previsaoOrcamentaria -> CmpMontanteJaneiro = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteFevereiro = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteMarco = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteAbril = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteMaio = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteJunho = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteJulho = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteAgosto= $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteSetembro = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteOutubro = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteNovembro = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpMontanteDezembro = $valor_ajustado_mensal;
                 $previsaoOrcamentaria -> CmpValorOriginal = $valor_total;
                 $previsaoOrcamentaria -> CmpAjuste = $ajuste;
                 
                 //$previsaoOrcamentaria -> CmpCodigoPrevisao = '';

                 $previsaoOrcamentaria -> condominio() -> associate(Auth::user()-> condominio_idcondominio);
                 $previsaoOrcamentaria -> planoContas() -> associate($seguranca -> decripto($request->input("cd".$j)));
                 $previsaoOrcamentaria -> planoSubContas() -> associate($seguranca -> decripto($request->input("csd".$j)));
                 $previsaoOrcamentaria -> resumoPrevisao() -> associate($idResumoPrevisao);

                 $seguranca -> decripto($request->input("cd".$j)) . " -- " . $seguranca -> decripto($request->input("csd".$j))."<BR>";
                 $previsaoOrcamentaria -> CmpDataInclusao = date('Y-m-d H:i:s');
                 $previsaoOrcamentaria -> CmpStatus = "ATV";
                 $previsaoOrcamentaria -> CmpAno = $request->input("ano");
                 //$previsaoOrcamentaria -> CmpObs = $request->input("obs");

                 $previsaoOrcamentaria -> save();

                // return $previsaoOrcamentaria -> idprevisao_orcamentarias;

                $valor_total_ajustado = $valor_total_ajustado + $valor_ajustado;

            }
            
            DB::commit();
            
            $data["msg"] = "SUC_CAD_PREORC"; //ERRO DE INSERCAO DE DOCUMENTO
            return $data;
            
       } catch (Exception $ex) {
           
            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
           // $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "NOK", "BEM");                
            
            DB::commit();
            
            $data["msg"] = "ERR_CAD_PREORC"; //ERRO DE INSERCAO DE DOCUMENTO            
            return $data;
       }
       
       
        
    }
    
     public function UpdatePrevisaoOrcamentaria($request, $idResumoPrevisaoOrcamentaria){ 
        
        $data = array();
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idResumoPrevisaoOrcamentaria_decripto = $seguranca->decripto($idResumoPrevisaoOrcamentaria);
        $result = 0;
        
        $total = 0; //PARA ACERTAR O VALOR DO RESUMO DA PREVISÃO ORÇAMENTÁRIA.
        $total_acumulado = 0;
        $variacao_total = 0; //GUARDA OS VALORES DE VARIAÇÃO PARA O TOTAL
        
        //Inicio transacao
        DB::beginTransaction();
        
        try {  
            
            //echo "teste<br> -- " .$request->input("total_despesa");
                      
            //ATUALIZAÇÃO PARA A DESPESA
            for ($j = 1; $j <= $request->input("total_despesa"); $j++) {            
               
                if($seguranca -> decripto($request->input("iddpo".$j)) != ""){ //PREVISAO JÁ EXISTENTE  
                        
                    $result = DB::table('previsao_orcamentarias')
                                ->where('idprevisao_orcamentarias', $seguranca -> decripto(trim($request->input("iddpo".$j))))
                                ->update(array( 'CmpMontanteJaneiro' => $util->RetirarPonto_PontoVirgula(trim($request->input("jan_d_".$j))),
                                                'CmpMontanteFevereiro' => $util->RetirarPonto_PontoVirgula(trim($request->input("fev_d_".$j))),
                                                'CmpMontanteMarco' => $util->RetirarPonto_PontoVirgula(trim($request->input("mar_d_".$j))),
                                                'CmpMontanteAbril' => $util->RetirarPonto_PontoVirgula(trim($request->input("abr_d_".$j))),
                                                'CmpMontanteMaio' => $util->RetirarPonto_PontoVirgula(trim($request->input("mai_d_".$j))),
                                                'CmpMontanteJunho' => $util->RetirarPonto_PontoVirgula(trim($request->input("jun_d_".$j))),
                                                'CmpMontanteJulho' => $util->RetirarPonto_PontoVirgula(trim($request->input("jul_d_".$j))),
                                                'CmpMontanteAgosto' => $util->RetirarPonto_PontoVirgula(trim($request->input("ago_d_".$j))),
                                                'CmpMontanteSetembro' => $util->RetirarPonto_PontoVirgula(trim($request->input("set_d_".$j))),
                                                'CmpMontanteOutubro' => $util->RetirarPonto_PontoVirgula(trim($request->input("out_d_".$j))),
                                                'CmpMontanteNovembro' => $util->RetirarPonto_PontoVirgula(trim($request->input("nov_d_".$j))),
                                                'CmpMontanteDezembro' => $util->RetirarPonto_PontoVirgula(trim($request->input("dez_d_".$j))),
                                                'CmpValorOriginal' => $util->RetirarPonto_PontoVirgula(trim($request->input("total_d_".$j)))                                                 
                                            ));    
                    
                    
                    $variacao_total = $variacao_total + $util -> VariacaoPrevisaoOrcamentaria($request,$j);
                    
                    //echo " Variacao ". $j. " - ". $request->input("jan_d_".$j)."- ". $variacao_total . "<BR>";
                    $total = $util->RetirarPonto_PontoVirgula($request->input("total_d_".$j));
                    
                }else{ //PREVISÃO NÃO EXISTENTE. PARA INSERIR
                //
                    //echo $request->input("idrpo".$i) . " - ".$request->input("jan_r_".$i). " Inserção<br> ";
                    $previsaoOrcamentaria = new \App\PrevisaoOrcamentaria($request->all());            
                                  
                    $previsaoOrcamentaria -> CmpMontanteJaneiro = $request->input("jan_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteFevereiro = $request->input("fev_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteMarco = $request->input("mar_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteAbril = $request->input("abr_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteMaio = $request->input("mai_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteJunho = $request->input("jun_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteJulho = $request->input("jul_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteAgosto= $request->input("ago_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteSetembro = $request->input("set_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteOutubro = $request->input("out_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteNovembro = $request->input("nov_d_".$j);
                    $previsaoOrcamentaria -> CmpMontanteDezembro = $request->input("dez_d_".$j);
                    $previsaoOrcamentaria -> CmpValorOriginal = $request->input("total_d_".$j);
                   
                    $previsaoOrcamentaria -> condominio() -> associate(Auth::user()-> condominio_idcondominio);
                    $previsaoOrcamentaria -> planoContas() -> associate($seguranca -> decripto($request->input("cd".$j)));
                    $previsaoOrcamentaria -> planoSubContas() -> associate($seguranca -> decripto($request->input("csd".$j)));
                    $previsaoOrcamentaria -> resumoPrevisao() -> associate($idResumoPrevisaoOrcamentaria_decripto);

                    $previsaoOrcamentaria -> CmpDataInclusao = date('Y-m-d H:i:s');
                    $previsaoOrcamentaria -> CmpStatus = "ATV";
                    $previsaoOrcamentaria -> CmpAno = $request->input("ano_d_".$j);

                    $previsaoOrcamentaria -> save();
                    
                    $total = $request->input("total_d_".$j);
                }
                
               
                $total_acumulado = $total_acumulado + $total;
                
            } 
                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "OK", "BEM");                

                DB::commit();

                $data["msg"] = "SUC_EDI_PREORC";
                $data["total"] = $util->RetirarPonto_PontoVirgula(number_format($total_acumulado,2,",","."));
                $data["variacao"] = $variacao_total;
                
                return $data;

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
           // $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "NOK", "BEM");                
            
            //DB::commit();
            
            $data["msg"] = "ERR_EDI_PREORC"; //ERRO DE INSERCAO DE DOCUMENTO
            
            return $data;
        }   



    }
    
    public function ExcluirPrevisaoOrcamentaria($idResumoPrevisaoOrcamentaria){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idResumoPrevisaoOrcamentaria_decripto = $seguranca->decripto($idResumoPrevisaoOrcamentaria);
        $result = 0;
        
        //Inicio transacao
        DB::beginTransaction();
        try {                                 
                
                DB::table('resumo_previsao_orcamentarias')
                        ->where('idresumo_previsao_orcamentarias', $idResumoPrevisaoOrcamentaria_decripto)
                        ->update(array('CmpStatus' => 'DTV'));               

                DB::table('previsao_orcamentarias')
                        ->where('resumo_prevOrc_idprevOrc', $idResumoPrevisaoOrcamentaria_decripto)
                        ->update(array('CmpStatus' => 'DTV'));               

                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "OK", "");                

            DB::commit();

            return "EXC_SUC_PRE";

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), 
                                                    Auth::user()->idusuario, "EXC", "NOK", "BEM");                
            
            DB::commit();
            
            return "EXC_ERR_PRE"; //ERRO DE INSERCAO DE DOCUMENTO
        }   



    }
}
