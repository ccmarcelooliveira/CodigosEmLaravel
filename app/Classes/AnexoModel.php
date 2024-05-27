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
 * Description of ImagemModel
 *
 * @author Celia Regina
 */
class AnexoModel {
    
    public function insereAnexo($file,$SiglaObjeto,$titulo,$idDocumento,$novoNome){
        
        $data = array();
        $anexo = new \App\Anexo();        
        $util = new \app\Util\Util();
       
        $file_name = $file;
        $extensao = $util -> arquivoExtensao($file_name);
        $catObj = "";
        $catDoc = "";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $data = $util -> Categoria($SiglaObjeto);
                
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                $anexo -> CmpAnexo = strtolower($novoNome.$extensao);
                $anexo -> CmpTexto = $util -> MontarTituloNoticia($extensao);
                $anexo -> CmpCategoriaObjeto = $data["catObj"];
                $anexo -> CmpCategoriaDocumento = $data["catDoc"];
                $anexo -> CmpDonoAnexo = $idDocumento;
                $anexo -> CmpTitulo = $titulo;
                $anexo -> CmpStatus = "ATV"; 
                $anexo -> CmpDataInclusao = date('Y-m-d H:i:s');
                $anexo -> CmpTipoDocumento = "1";                   //DOCUMENTO ANEXADO
                
                //RELACIONAMENTO COM O CONDOMINIO
                $anexo -> condominio() -> associate(Auth::user()->condominio_idcondominio); 

                //REALIZA O COMMIT DA OPERACAO
                $result = $anexo -> save(); 
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return $anexo -> idanexo;

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
            return "err"; //ERRO DE INSERCAO DE DOCUMENTO
        }        
    }
    
    public function InsereAnexoCandidato($file,$SiglaObjeto,$titulo,$idDocumento,$novoNome,$idCondominio){
        
        $data = array();
        $anexo = new \App\Anexo();        
        $util = new \app\Util\Util();
       
        $file_name = $file;
        $extensao = $util -> arquivoExtensao($file_name);
        $catObj = "";
        $catDoc = "";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $data = $util -> Categoria($SiglaObjeto);
                
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                $anexo -> CmpAnexo = strtolower($novoNome.$extensao);
                $anexo -> CmpTexto = $util -> MontarTituloNoticia($extensao);
                $anexo -> CmpCategoriaObjeto = $data["catObj"];
                $anexo -> CmpCategoriaDocumento = $data["catDoc"];
                $anexo -> CmpDonoAnexo = $idDocumento;
                $anexo -> CmpTitulo = $titulo;
                $anexo -> CmpStatus = "ATV"; 
                $anexo -> CmpDataInclusao = date('Y-m-d H:i:s');
                $anexo -> CmpTipoDocumento = "1";                   //DOCUMENTO ANEXADO
                
                //RELACIONAMENTO COM O CONDOMINIO
                $anexo -> condominio() -> associate($idCondominio); 

                //REALIZA O COMMIT DA OPERACAO
                $result = $anexo -> save(); 
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return $anexo -> idanexo;

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
            return "err"; //ERRO DE INSERCAO DE DOCUMENTO
        }        
    }
    
    
    //INSERIR IMAGEM PARA A CAPTURA DE IMAGEM
    public function insere2Anexo($SiglaObjeto,$idDonoAnexo,$novoNome){
        
        $anexo = new \App\Anexo();        
        $util = new \App\Util\Util();
       
                
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                $anexo -> CmpAnexo = $novoNome.".jpg";
                $anexo -> CmpTexto = "vazio";
                $anexo -> CmpCategoriaObjeto = $SiglaObjeto;
                $anexo -> CmpDonoAnexo = $idDonoAnexo;
                $anexo -> CmpStatus = "ATV"; 
                $anexo -> CmpDataInclusao = date('Y-m-d H:i:s');
                $anexo -> CmpTipoDocumento = "1";                   //DOCUMENTO ANEXADO
                
                //RELACIONAMENTO COM O CONDOMINIO
                $anexo -> condominio() -> associate(Auth::user()->condominio_idcondominio); 

                //REALIZA O COMMIT DA OPERACAO
                $result = $anexo -> save(); 
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return $anexo -> idanexo;

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
            return "err"; //ERRO DE INSERCAO DE DOCUMENTO
        }        
    }
    
    /***
     * FUNÇÃO PARA O CONDOMÍNIO
     */
    
    //INSERIR IMAGEM PARA A CAPTURA DE IMAGEM
    public function insereAnexoCondominio($SiglaObjeto,$idDonoAnexo,$novoNome,$extensao){
        
        $anexo = new \App\Anexo();        
        $util = new \App\Util\Util();
       
                
         $data = $util ->Categoria($SiglaObjeto);        
      
         //echo $idDonoAnexo;
               
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                $anexo -> CmpAnexo = $novoNome.$extensao;
                $anexo -> CmpTexto = "vazio";
                $anexo -> CmpCategoriaObjeto = $data["catObj"];
                $anexo -> CmpCategoriaDocumento = $data["catDoc"];
                $anexo -> CmpDonoAnexo = $idDonoAnexo;
                $anexo -> CmpStatus = "ATV"; 
                $anexo -> CmpDataInclusao = date('Y-m-d H:i:s');
                $anexo -> CmpTipoDocumento = "1";                   //DOCUMENTO ANEXADO
                
                //RELACIONAMENTO COM O CONDOMINIO
                $anexo -> condominio() -> associate(Auth::user()->condominio_idcondominio); 

                //REALIZA O COMMIT DA OPERACAO
                $result = $anexo -> save(); 
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return $anexo -> idanexo;

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
            return "err"; //ERRO DE INSERCAO DE DOCUMENTO
        }        
    }
    
    //INSERIR IMAGEM PARA A CAPTURA DE IMAGEM
    public function insereAnexoCondominio_V2($SiglaObjeto,$idDonoAnexo,$novoNome,$extensao){
        
        $anexo = new \App\Anexo();        
        $util = new \App\Util\Util();
       
                
         $data = $util ->Categoria($SiglaObjeto);        
      
         //echo $idDonoAnexo;
               
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                $anexo -> CmpAnexo = $novoNome.$extensao;
                $anexo -> CmpTexto = "vazio";
                $anexo -> CmpCategoriaObjeto = $data["catObj"];
                $anexo -> CmpCategoriaDocumento = $data["catDoc"];
                $anexo -> CmpDonoAnexo = $idDonoAnexo;
                $anexo -> CmpStatus = "ATV"; 
                $anexo -> CmpDataInclusao = date('Y-m-d H:i:s');
                $anexo -> CmpTipoDocumento = "1";                   //DOCUMENTO ANEXADO
                
                //RELACIONAMENTO COM O CONDOMINIO
                $anexo -> condominio() -> associate($idDonoAnexo); 

                //REALIZA O COMMIT DA OPERACAO
                $result = $anexo -> save(); 
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return $anexo -> idanexo;

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
            return "err"; //ERRO DE INSERCAO DE DOCUMENTO
        }        
    }
    
    
    //CRIAR ANEXO
      public function criarAnexo($texto, $titulo, $idDocumento,$siglaDoc){
       
        $data = array();
        $variavel = new \App\Classes\VariavelModel();
        $pdf = new \App\Http\Controllers\PDF\PDFController();
        
        DB::beginTransaction();
        try {
                $anexos = new \App\Anexo();

                $util = new \App\Util\Util();
                $anexo_cod = $util -> geraNumeroAleatorio();     

                //LIMPEZA DO TEXTO
                $texto = str_replace("<p>","",$texto);
                $texto = str_replace("</p>","",$texto);
                $texto = str_replace("<br>","",$texto);

                $anexos -> CmpAnexo = $anexo_cod.".pdf";
                $anexos -> CmpTitulo = $titulo;
                $anexos -> CmpTexto = $texto;
                $anexos -> CmpCategoriaObjeto = $siglaDoc;
                $anexos -> CmpCategoriaDocumento = $siglaDoc;
                $anexos -> CmpDonoAnexo = $idDocumento;
                $anexos -> CmpStatus = "ATV"; 
                $anexos -> CmpDataInclusao = date('Y-m-d H:i:s');
                $anexos -> CmpTipoDocumento = "2";                   //DOCUMENTO CRIADO

                //RELACIONAMENTO COM O CONDOMINIO
                $anexos ->condominio()->associate(Auth::user()->condominio_idcondominio);
        
                $anexos ->save();
                
                //GUARDA NO HISTÓRICO
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistorico($util->geraNumeroAleatorio(),Auth::user()-> idusuario, $result, "ANEXO");
                
                DB::commit();
                
                //GERAÇÃO DO PDF
                $pasta = $variavel -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
                echo $caminho = 'clientes/'.$pasta.'/documentos/'.$anexo_cod.".pdf";
                $texto = $texto ."//////SEPARADOR\\\\\\".date('Y-m-d H:i:s');
                $pdf -> GerarPDF($texto,$caminho);
                
                

        } catch (Exception $ex) {

                DB::rollback();
            
                $erros = new \App\Classes\ErroModel();
                $erros -> insereErro($e->getMessage(), date('Y-m-d H:i:s'), Auth::user()->condominio_idcondominio);
        }  
    }
    
    //CONSULTAS
    public function consultaAnexo($idDocumento) {

        $linha = "";
        
        $util = new \app\Util\Util();
        
        $results = DB::table('documentos')
                    ->join('anexos', 'documentos.iddocumento', '=', 'anexos.CmpDonoAnexo')                        
                    ->select('documentos.*','anexos.*')
                    ->where('anexos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                    ->where('anexos.CmpStatus', '=', 'ATV')
                    ->where('documentos.CmpStatus', '=', 'ATV')
                    ->where('anexos.CmpCategoriaObjeto', '=', "DOC")
                    ->where('anexos.CmpDonoAnexo', '=', $idDocumento)
                    ->orderBy('anexos.CmpDataInclusao','desc')
                    ->get();

        $results = $util ->formatarDataResultSet2($results); 
        
        return $results;
    }
    
    //CONSULTAS
    public function consultaAnexo2($idDonoObjeto,$sigla) {
        
        $results = DB::table('anexos')                                            
                    ->select('anexos.CmpAnexo')
                    ->where('anexos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                    ->where('anexos.CmpStatus', '=', 'ATV')
                    ->where('anexos.CmpCategoriaObjeto', '=', "USU")
                    ->where('anexos.CmpDonoAnexo', '=', $idDonoObjeto)                   
                    ->first();
        
        return $results;
    }
    
    public function consultaTodosAnexos($idObjeto,$idDocumento,$modo) {

        $util = new \app\Util\Util();
         
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $idDocumento = $seguranca -> decripto($idDocumento);       
        $idObjeto = $seguranca -> decripto($idObjeto);        
        
        if($modo == "COM_DONO"){
             //echo "DONO";
            $results = DB::table('documentos')
                        ->join('anexos', 'documentos.iddocumento', '=', 'anexos.CmpDonoAnexo')                        
                        ->select('documentos.*','anexos.*')
                        ->where('anexos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                        ->where('anexos.CmpStatus', '=', 'ATV')
                        ->where('documentos.CmpStatus', '=', 'ATV')                        
                        ->where('anexos.CmpDonoAnexo', '=', $idDocumento)
                        ->where('anexos.CmpCategoriaObjeto', '=', "DOCS")
                        ->orderBy('anexos.CmpDataInclusao','desc')
                        ->where('documentos.objetoDonoDocumento', '=', $idObjeto)
                        ->get();
        }else{
            //echo "SEM";
            $results = DB::table('documentos')
                        ->join('anexos', 'documentos.iddocumento', '=', 'anexos.CmpDonoAnexo')                        
                        ->select('documentos.*','anexos.*')
                        ->where('anexos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                        ->where('anexos.CmpStatus', '=', 'ATV')
                        ->where('documentos.CmpStatus', '=', 'ATV')  
                        ->where('anexos.CmpCategoriaObjeto', '=', "DOC")
                        ->orderBy('anexos.CmpDataInclusao','desc')
                        ->where('anexos.CmpDonoAnexo', '=', $idDocumento)                        
                        ->get();
        }    
        $results = $util -> formatarDataResultSet2($results); 

        return $results;
    }
    
    //CONSULTAR TODOS OS DOCUMENTOS DE UM OBJETO(APARTAMENTO , MORADOR E ETC)
     public function consultaTodosAnexoDeUmObjeto($idObjeto,$CmpTipoDonoDocumento,$idDocumento) {

        $linha = "";
        
        $results = DB::table('documentos')
                    ->join('anexos', 'documentos.iddocumento', '=', 'anexos.CmpDonoAnexo')                        
                    ->select('documentos.*','anexos.*')
                    ->where('anexos.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('anexos.CmpStatus', '=', 'ATV')
                    ->where('documentos.CmpStatus', '=', 'ATV')
                    ->where('anexos.CmpDonoAnexo', '=', $idDocumento)
                    ->where('anexos.objetoDonoDocumento', '=', $idObjeto)
                    ->where('anexos.CmpTipoDonoDocumento', '=', $CmpTipoDonoDocumento)
                    ->get();


        return $results;
    }
  
    //CONSULTAS
    public function recuperaAnexo($idDonoAnexo,$siglaObjeto) {

        //echo $idDonoAnexo. " " . $siglaObjeto;
        $linha = ""; 
        $anexo = "";                
        
        $results = DB::table('anexos')
             ->select('anexos.CmpAnexo')
             ->where('anexos.CmpStatus', '=', 'ATV')
             ->where('anexos.CmpDonoAnexo', '=', $idDonoAnexo)
             ->where('anexos.CmpCategoriaObjeto', '=', $siglaObjeto)
             ->first();
        
        if(count($results) > 0){
            $anexo = $results->CmpAnexo;
        }else{
            $anexo = "";
        }
        return $anexo;
    }
    
    //CONSULTAS
    public function recuperaTodosAnexo($siglaObjeto,$status) {

        $linha = ""; 
        $anexo = "";
                
        $results = DB::table('anexos')
                    ->select('anexos.CmpAnexo','anexos.CmpDonoAnexo')
                    ->where('anexos.CmpStatus', '=', $status)                    
                    ->where('anexos.CmpCategoriaObjeto', '=', $siglaObjeto)
                    ->where('anexos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                    ->get();
       
        return $results;
    }
    
    public function recuperaAnexo2($idDonoAnexo,$siglaObjeto,$status) {

        $linha = ""; 
        $anexo = "";
                
        $results = DB::table('anexos')
                    ->select('anexos.CmpAnexo')
                    ->where('anexos.CmpStatus', '=', $status)
                    ->where('anexos.CmpDonoAnexo', '=', $idDonoAnexo)
                    ->where('anexos.CmpCategoriaObjeto', '=', $siglaObjeto)
                    ->first();
        
        if(count($results) > 0){
            $anexo = $results->CmpAnexo;
        }else{
            $anexo = "";
        }
        return $anexo;
    }
  
    //ATUALZA DOCUMENTO
    public function excluirAnexo($idAnexo){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAnexo_decripto = $seguranca->decripto($idAnexo);
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('anexos')
                            ->where('idanexo', $idAnexo_decripto)
                            ->where('condominio_idcondominio', Auth::user()->condominio_idcondominio)
                            ->update(array('CmpStatus' => 'DTV'));               

                
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_ANE";

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
            return "ERR_EXC_ANE"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }   
    
    /**
     * DEVE SOFRER REFATORAMENTO EM RAZÃO DO PARÂMETRO ÚNICO, POIS PODE HAVER UM OUTRO OBJETO COM O MESMO ID.
     * O MELHOR NESSE CASO É INCLUIR A SIGLA DO OBJETO.
     */
     //ATUALZA DOCUMENTO
    public function excluirAnexoPorDonoAnexo($idDonoAnexo){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idDonoAnexo_decripto = $seguranca->decripto($idDonoAnexo);
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('anexos')
                            ->where('CmpDonoAnexo', $idDonoAnexo_decripto)
                            ->where('condominio_idcondominio', Auth::user()->condominio_idcondominio)
                            ->update(array('CmpStatus' => 'DTV'));               

                
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_ANE";

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
            return "ERR_EXC_ANE"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }   

    //EXCLUIR REFATORADO
    public function ExcluirAnexoP2($idDonoAnexo, $sigla){ //COM DOIS PARÂMETROS
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idDonoAnexo_decripto = $seguranca->decripto($idDonoAnexo);
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('anexos')
                            ->where('CmpDonoAnexo', $idDonoAnexo_decripto)
                            ->where('condominio_idcondominio', Auth::user()->condominio_idcondominio)
                            ->where('CmpCategoriaObjeto', $sigla)
                            ->update(array('CmpStatus' => 'DTV'));               

                
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_ANE";

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
            return "ERR_EXC_ANE"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }
    
    //EXCLUIR TODOS OS ANEXOS DO DOCUMENTO
    ////ATUALZA DOCUMENTO
    public function ExcluirTodosAnexos($idDocumento,$tipoDonoDocumento){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idDocumento_decripto = $seguranca->decripto($idDocumento);
        
        $tipoDonoDocumento_decripto = $seguranca->decripto($tipoDonoDocumento);
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
           
                DB::table('documentos')
                    ->join('anexos', 'documentos.iddocumento', '=', 'anexos.CmpDonoAnexo')                        
                    ->where('anexos.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('documentos.iddocumento', '=', $idDocumento_decripto)
                    ->where('documentos.CmpTipoDonoDocumento', '=', $tipoDonoDocumento_decripto)
                    ->update(array('anexos.CmpStatus' => 'DTV'));
                                
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_ANE";

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
            return "ERR_EXC_ANE"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }    

     //UPLOAD DE IAMGENS
    public function uploadAnexo($file,$sessao,$descriaoObjeto, $siglaObjeto,$idObjeto,$localGravacao){ 
        
        $util = new \App\Util\Util();
        $anexo_recuperado = \App\Anexo::find($idObjeto);
        $util -> uploadAnexo($descriaoObjeto,$caminho,$anexo_recuperado->CmpAnexo);
        
        return $idAnexo;
        
    }
    
     
	
}
