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
 * Description of CondominioModel1
 *
 * @author Celia Regina
 */

class NegocioModel{
        
        public function InserirNegocio($request){ 

            $RESULTADO = "";
            
            DB::beginTransaction();

                try {
                    $oficina = new \App\Models\Negocio($request->all());
                    $oficina-> CmpOficina = $request->input("negocio");
                    $oficina-> CmpCnpj = $request->input("cnpj");
                    $oficina-> CmpEndereco = $request->input("endereco");
                    $oficina-> CmpTelFixo = $request->input("telfixo");
                    $oficina-> CmpCelular = $request->input("celular");
                    $oficina-> CmpEmail = $request->input("email");
                    $oficina-> CmpStatus = "ATV";
                    $oficina -> CmpDataInclusao = date('Y-m-d H:i:s'); 
                    $oficina -> CmpObs = $request->input("obs");
                    $oficina->save();
                    
                    $RESULTADO = $oficina->idoficina;            
                    
                } catch (Exception $e) {

                    DB::rollback();
                    
                    $RESULTADO = "NOK";
                }
                //FINAIZA A OPERAÇÃO
                DB::commit();
        }
        
        //CONSULTAR CONDOMINIO
        public function ConsultarNegocio($id){
            
            $results = DB::table('negocios')                                               
                        ->select('negocios.*')
                        ->where('negocios.CmpStatus', '=', 'ATV')
                        ->get();
                        
            return $results;
        } 
        
        //EDITAR 
        public function EditarCondominio($request, $id){
                
            $data = array();
            
           
            //PRIMEIRA RECUPERACAO DOS DADOS
            $data = $this ->ConsultarCondominio($id,'EDI');
             
           // $factory = new \App\DesignPattern\FactoryMethod();
            
            
            //CHAMADA DO UPDATE
            try {
                
                if($request->isMethod("post")){

                    $condominioObject = new \App\Classes\CondominioModel();
                    $condominioObject -> UpdateCondominio($request, $id);
                    
                    // $factory = new \App\DesignPattern\FactoryMethod();
                    /*$pasta = $factory ->GetClassVariavel() ->ConsultaVariavel($id, "pasta");
                    $caminho = $caminho . $pasta;
                    $anexo_cod = $factory ->GetClassUtil() ->geraNumeroAleatorio();
                    
                    
                    $factory ->GetClassUtil() ->uploadAnexo2($caminho, $anexo_cod, 50, 50);*/
                    
                    //ATUALZANDO OS DADOS DO FORMULARIO
                    $data = $this -> ConsultarCondominio($id,'EDI');
                    
                }
            
            } catch (Exception $e) {

                 echo "Erro de Atualzação";   
            }
            return $data;
        } 
        
        
        
        
        //UPDATE TABELA CONDOMINIO
        //RALIZAR O UPDATE DO CONDOMINIO
        public function UpdateCondominio(\Symfony\Component\HttpFoundation\Request $request, $idcondominio){            
            
            //begin
            DB::beginTransaction();

            try { 
                    DB::table('condominios')->where('idcondominio', $idcondominio)->update(array('CmpRazaoSocial' => $request->input("nome"),
                                                                                                  'CmpCnpj' => $request->input("cnpj"),                                                                                          
                                                                                                  'CmpTelFixo' => $request->input("tel_fixo"),
                                                                                                  'CmpComplemento' => $request->input("complemento"),    
                                                                                                  'CmpCelular' => $request->input("celular"),
                                                                                                  'CmpEmail' => $request->input("email"),
                                                                                                  'CmpLink' => $request->input("link"),
                                                                                                  'CmpLogradouro' => $request->input("logradouro"),
                                                                                                  'municipio_idmunicipio' => $request->input("municipio"),  
                                                                                                  'bairro_idbairro' => $request->input("bairro"),
                                                                                                  /*'CmpComplemento' => $request->input("complemento"),*/
                                                                                                  'unidade_federacao_idunidade_federacao' => $request->input("uf") ));
                    if($request->input("plano") != $request->input("pnAnt")){     
                        
                        //A ATUALIZAÇÃO DA CONTA DEVE TER REFLEXOS NO 
                        DB::table('controle_contas')
                                ->where('condominio_idcondominio', $idcondominio)
                                ->update(array('plano_idplano' => $request->input("plano")));
                        
                        //echo "antes";
                        $util = new \App\Util\Util(); 
                        
                        //1. ELIMINAR OS ARQUIVOS DE MENU
                        $factory = new \App\DesignPattern\FactoryMethod();
                        $pasta = $factory ->GetClassVariavel() ->ConsultaVariavel($idcondominio, "pasta");
                        
                        $caminho =  $factory -> GetClassVariavel() ->rotaMaster() .$pasta."/";
                        
                        //APAGAR TODOS OS ARQUIVOS
                        $util -> ApagarArquivos($caminho);  
                        

                        //DESMONTAR OS MENUS CRIADOS ANTES
                        //MENU DO CONDOMINIO
                        /*$menuCondominio = new \App\Classes\MenuCondominioModel();    
                        
                        //DELETAR O MENU EXISTENTE
                        $menuCondominio -> ExcluirMenuCondominio($idcondominio);
                        
                        //echo "PLANO " . $request->input("plano");
                        //INSERE UM NOVO MENU
                        $menuCondominio ->insere_menu_condominio($request->input("plano"), Auth::user()->idusuario, $idcondominio);
                                
                        //GERA O NOVO MENU
                        $menuCondominio->geracao_menu_condominio($request->input("plano"), Auth::user()->idusuario,  $caminho, $request->input("link"), $request->input("nome"),$idcondominio);
                        */
                    }    
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
        
        
                
}//fim classe
