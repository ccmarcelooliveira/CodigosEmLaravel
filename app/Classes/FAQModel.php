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
class FAQModel {
    
      //CONSULTAS
    public function ConsultaFAQ() {
         
         
        $results = DB::table('faqs')                                          
                    ->select('faqs.*')
                    ->where('faqs.CmpStatus', '=', 'ATV')  
                    ->get();
        

        return $results;
    }
    
     public function insereFAQ($request){
       
        $faq = new \App\faq();
        
         //Inicio transacao
        DB::beginTransaction();
        try {
            
            $faq -> CmpTitulo = $request->input("titulo");            
            $faq -> CmpTexto = $request->input("texto");            
            $faq -> CmpDataInclusao = date('Y-m-d H:i:s');           
          
            $util = new \App\Util\Util();

            //REALIZA O COMMIT DA OPERACAO
            $result = $faq -> save(); 
            
            //INSERINDO HISTÓRICO
            //$historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "BEM");            
              
            DB::commit();

            return "SUC_FAQ";

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            //$erros = new \App\Classes\ErroModel();
            //$erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            //$historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "NOK", "BEM");                
         
            DB::commit();
            return "ERR_FAQ"; //ERRO DE INSERCAO DE DOCUMENTO
        }      
    }
    
    public function UpdateBem($request, $idBem){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idBem_decripto = $seguranca->decripto($idBem);
        $result = 0;
        
        //Inicio transacao
        DB::beginTransaction();
        
        try {  
                if($request->input("forBem") != "")
                {
                
                    $result = DB::table('bens')
                                ->where('idbens', $idBem_decripto)
                                ->update(array('CmpNome' => $request->input("nomeBem"),
                                                'CmpDataAquisicao' => $util->formatarDataMysql($request->input("dataAquisição")),
                                                'CmpValorAquisicao' => $request->input("valorAquisição"),
                                                'CmpDescricao' => $request->input("desBem"),
                                                'CmpCategoria' => $request->input("catBem"),
                                                'CmpEnquadramento' => $request->input("catEnqBem"),
                                                'area_comum_idarea_comum' => $request->input("areCom"),
                                                'fornecedor_idfornecedor' => $request->input("forBem")

                                            ));     
                }else{
                    
                    $result = DB::table('bens')
                                ->where('idbens', $idBem_decripto)
                                ->update(array('CmpNome' => $request->input("nomeBem"),
                                                'CmpDataAquisicao' => $util->formatarDataMysql($request->input("dataAquisição")),
                                                'CmpValorAquisicao' => $request->input("valorAquisição"),
                                                'CmpDescricao' => $request->input("desBem"),
                                                'CmpCategoria' => $request->input("catBem"),
                                                'CmpEnquadramento' => $request->input("catEnqBem"),
                                                'area_comum_idarea_comum' => $request->input("areCom")
                    
                                            ));  
                    
                }    
                
                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "OK", "BEM");                

            DB::commit();

            return "SUC";

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EDI", "NOK", "BEM");                
            
            DB::commit();
            return "ERR"; //ERRO DE INSERCAO DE DOCUMENTO
        }   



    }
    
    public function ExcluirBem($idBem){ 
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idBem_decripto = $seguranca->decripto($idBem);
        $result = 0;
        
        //Inicio transacao
        DB::beginTransaction();
        try {                                 
                 //GRADE DE SEGURANCA
                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                DB::table('bens')->where('idbens', $idBem_decripto)->update(array('CmpStatus' => 'DTV'));               

                //INSERINDO HISTÓRICO
                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "OK", "BEM");                

            DB::commit();

            return "SUC";

        } catch (Exception $ex) {

            //DESFAZ OPERAÇÃO
            DB::rollback();

            //CLASSE DE ERROS DO PROJETO
            $erros = new \App\Classes\ErroModel();
            $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);

            $historico = new \App\Classes\HistoricoOperacaoModel();
            $historico ->inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "EXC", "NOK", "BEM");                
            
            DB::commit();
            return "ERR"; //ERRO DE INSERCAO DE DOCUMENTO
        }   



    }
}
