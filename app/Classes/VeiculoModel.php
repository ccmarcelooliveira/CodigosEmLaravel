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
class VeiculoModel {
    //put your code here
    
     public function VeiculoModel(){

     }
     
     public function insereVeiculo(\Illuminate\Http\Request $request){ 
         
            $veiculo = new \App\Veiculos();
         
            DB::beginTransaction();

            try { 
            
                $veiculo -> CmpTipoVeiculo = $request->input("catVeiculo");
                $veiculo -> fabricante_idfabricante = $request->input("marca");
                $veiculo -> modelo_idmodelo = $request->input("modelo");
                $veiculo -> CmpPlaca = $request->input("placa");
                $veiculo -> cor_idcor = $request->input("cor");

                $veiculo -> CmpStatus = "ATV";                              //Reservado


                $veiculo -> CmpDataInclusao = date('Y-m-d');
                $veiculo -> CmpDespacho = "..."; 
                $veiculo -> cartao_idcartao = $request->input("catCartaoEstacionamento");

                //$veiculo -> CmpModalidade = $modalidade;   

                //echo "teste " . $request->input("selApartamento") . " - " . $request->input("catVeiculo");
                //SELECIONAR A VAGA DE GARAGEM.
                $vagaGaragem = new \App\Classes\VagaGaragemModel();
                $idVagaGaragem = $vagaGaragem -> ConsultarVagaGaragemId($request->input("selApartamento"), $request->input("catVeiculo"));

                //PARA O CASO DE HAVER ALGUM ERRO 
                if($idVagaGaragem == NULL){
                    DB::rollback();
                    return "ERR_CAD_VEI";
                    
                }else{
                
                    $veiculo -> vaga_garagem_idvaga_garagem =  $idVagaGaragem;            
                    $veiculo -> apartamento_idapartamento = $request->input("selApartamento");
                    $veiculo -> condominio_idcondominio = Auth::user()->condominio_idcondominio;
                    
                    if($request->input("selApartamentoAlugado") != ""){
                        $veiculo -> alugado_idapartamento = $request->input("selApartamentoAlugado");
                    }

                    $result = $veiculo->save();

                    //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
                    $util = new \App\Util\Util();

                    $historico = new \App\Classes\HistoricoOperacaoModel();
                    //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "VEICULO");
                    $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "VEICULO");

                    DB::commit();
                    return $veiculo->idveiculo;
                }    
                
            //CRIACAO DOS VEICULOS
            } catch (Exception $ex) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "VEICULOS");

                DB::commit();
                
                return "ERR_CAD_VEI";
            }
            
    }
    
    
    public function InsereVeiculoCandidato($categoria,$marca,$modelo,$placa,$cor,$idApartamento,$usuario,$idCondominio){ 
         
            $veiculo = new \App\Veiculos();
         
            DB::beginTransaction();

            try { 
            
                $veiculo -> CmpTipoVeiculo = $categoria;
                $veiculo -> fabricante_idfabricante = $marca;
                $veiculo -> modelo_idmodelo = $modelo;
                $veiculo -> CmpPlaca = $placa;
                $veiculo -> cor_idcor = $cor;

                $veiculo -> CmpStatus = "ATV";                              //Reservado

                $veiculo -> CmpDataInclusao = date('Y-m-d');
                $veiculo -> CmpDespacho = "..."; 
                //$veiculo -> cartao_idcartao = $request->input("catCartaoEstacionamento");

                //$veiculo -> CmpModalidade = $modalidade;   

                //echo "teste " . $request->input("selApartamento") . " - " . $request->input("catVeiculo");
                //SELECIONAR A VAGA DE GARAGEM.
                $vagaGaragem = new \App\Classes\VagaGaragemModel();
                $idVagaGaragem = $vagaGaragem -> ConsultarVagaGaragemId($idApartamento, $categoria);

                //PARA O CASO DE HAVER ALGUM ERRO 
                if($idVagaGaragem == NULL){
                    DB::rollback();
                    return "ERR_CAD_VEI";
                    
                }else{
                
                    $veiculo -> vaga_garagem_idvaga_garagem =  $idVagaGaragem;            
                    $veiculo -> apartamento_idapartamento = $idApartamento;
                    $veiculo -> condominio_idcondominio = $idCondominio;
                    
                   /* if($request->input("selApartamentoAlugado") != ""){
                        $veiculo -> alugado_idapartamento = $idApartamento;
                    }*/

                    $result = $veiculo->save();

                    //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
                    $util = new \App\Util\Util();

                    $historico = new \App\Classes\HistoricoOperacaoModel();
                    //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "VEICULO");
                    $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), $usuario, "INS", "OK", "VEICULO");

                    DB::commit();
                    return $veiculo->idveiculo;
                }    
                
            //CRIACAO DOS VEICULOS
            } catch (Exception $ex) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "VEICULOS");

                DB::commit();
                
                return "ERR_CAD_VEI";
            }
            
    }
    
    public function AtivarVeiculos($idcondominio){            
            
        //begin
        DB::beginTransaction();

        try { 
                DB::table('veiculos')->where('condominio_idcondominio', $idcondominio)->update(array('CmpStatus' => 'ATV'));

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
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "VEICULOS");

                DB::commit();

        }
    } 
    
    //CONSULTAR APARTAMENTO COM ARGUMENTOS
    //31/12/2017
    public function consultarVeiculo($idVeiculo){
       
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVeiculo_decripto = $seguranca->decripto($idVeiculo);
         
        
        if($idVeiculo_decripto > 0){
           
            $results = DB::table('veiculos')                                          
                                ->join('vaga_garagems', 'vaga_garagems.idvaga_garagem', '=', 'veiculos.vaga_garagem_idvaga_garagem')  
                                ->leftjoin('fabricante_autos', 'fabricante_autos.idfabricante_auto', '=', 'veiculos.fabricante_idfabricante')  
                                ->leftjoin('modelo_carros', 'modelo_carros.idmodelo_carro', '=', 'veiculos.modelo_idmodelo')  
                                ->leftjoin('cartaos', 'cartaos.idcartao', '=', 'veiculos.cartao_idcartao') 
                                ->join('apartamentos', 'vaga_garagems.apartamento_idapartamento', '=', 'apartamentos.idapartamento') 
                                ->leftjoin('apartamentos as apto2', 'veiculos.alugado_idapartamento', '=', 'apto2.idapartamento') 
                                ->select('vaga_garagems.CmpTipoVeiculo',
                                        'veiculos.idveiculo',
                                        'veiculos.CmpDataInclusao',
                                        'fabricante_autos.CmpFabricante as CmpMarca',
                                        'modelo_carros.CmpModelo',
                                        'veiculos.CmpPlaca',
                                        'veiculos.cor_idcor as CmpCor',
                                        'veiculos.CmpDespacho',
                                        'veiculos.CmpTipoVeiculo',
                                        'veiculos.CmpStatus',
                                        'veiculos.cartao_idcartao',
                                        'veiculos.condominio_idcondominio',
                                        'veiculos.vaga_garagem_idvaga_garagem',
                                        'veiculos.apartamento_idapartamento',
                                        'veiculos.alugado_idapartamento',
                                        'cartaos.CmpDescricao as cartao',
                                        'apartamentos.CmpApto',
                                        'apartamentos.CmpBloco',
                                        'apto2.CmpApto as alugado_apto' ,
                                        'apartamentos.CmpBloco as alugado_bloco')
                                ->where('vaga_garagems.CmpStatus', '=', 'ATV')
                                ->where('veiculos.CmpStatus', '=', 'ATV')                                
                                ->where('veiculos.idveiculo', '=', $idVeiculo_decripto)     
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
            $results = DB::table('veiculos')                                          
                                ->join('vaga_garagems', 'vaga_garagems.idvaga_garagem', '=', 'veiculos.vaga_garagem_idvaga_garagem')  
                                ->leftjoin('fabricante_autos', 'fabricante_autos.idfabricante_auto', '=', 'veiculos.fabricante_idfabricante')  
                                ->leftjoin('modelo_carros', 'modelo_carros.idmodelo_carro', '=', 'veiculos.modelo_idmodelo')  
                                ->leftjoin('cartaos', 'cartaos.idcartao', '=', 'veiculos.cartao_idcartao') 
                                ->join('apartamentos', 'vaga_garagems.apartamento_idapartamento', '=', 'apartamentos.idapartamento') 
                                ->leftjoin('apartamentos as apto2', 'veiculos.alugado_idapartamento', '=', 'apto2.idapartamento') 
                                ->select('vaga_garagems.CmpTipoVeiculo',
                                        'veiculos.idveiculo',
                                        'veiculos.CmpDataInclusao',
                                        'fabricante_autos.CmpFabricante as CmpMarca',
                                        'modelo_carros.CmpModelo',
                                        'veiculos.CmpPlaca',
                                        'veiculos.cor_idcor as CmpCor',
                                        'veiculos.CmpDespacho',
                                        'veiculos.CmpTipoVeiculo',
                                        'cartaos.idcartao',
                                        'veiculos.cartao_idcartao',
                                        'veiculos.condominio_idcondominio',
                                        'veiculos.vaga_garagem_idvaga_garagem',
                                        'veiculos.apartamento_idapartamento',
                                        'veiculos.alugado_idapartamento',
                                        'veiculos.CmpStatus',
                                        'cartaos.CmpDescricao as cartao',
                                        'apartamentos.CmpApto',
                                        'apartamentos.CmpBloco',
                                        'apto2.CmpApto as alugado_apto' ,
                                        'apartamentos.CmpBloco as alugado_bloco')
                                ->where('vaga_garagems.CmpStatus', '=', 'ATV')
                                ->where('veiculos.CmpStatus', '=', 'ATV')
                                
                                ->get();
            
        }
                               
        return $results;                     


    }

    public function consultarMoradorPorId($idMorador){

        return $results = DB::table('veiculos')                                          
                                ->join('vaga_garagems', 'vaga_garagems.apartamento_idapartamento', '=', 'veiculos.vaga_garagem_idvaga_garagem')                        
                                ->select('vaga_garagems.*','veiculos.*')
                                ->where('vaga_garagems.CmpStatus', '=', 'ATV')
                                ->where('veiculos.CmpStatus', '=', 'ATV')                                     
                                ->where('veiculos.idveiculo', '=', $idMorador)
                                ->get();


    }
    
     public function ConsultarMoradorPorId2($idApartamento){

        return $results = DB::table('veiculos')                                          
                                ->join('apartamentos', 'veiculos.apartamento_idapartamento', '=', 'apartamentos.idapartamento')   
                                ->leftjoin('cartaos', 'cartaos.condominio_idcondominio', '=', 'apartamentos.condominio_idcondominio')   
                                ->select('apartamentos.*','veiculos.*','cartaos.CmpDescricao as cartao')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('veiculos.CmpStatus', '=', 'ATV')                                     
                                ->where('veiculos.apartamento_idapartamento', '=', $idApartamento)
                                ->get();


    }
    
    public function ConsultarVeiculoPorIdAPTO($idApartamento,$STATUS){

         //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idApartamento_decripto = $seguranca -> decripto($idApartamento);

        return $results = DB::table('veiculos')          
                                ->leftjoin('anexos', 'veiculos.idveiculo', '=', 'anexos.CmpDonoAnexo')
                                ->join('fabricante_autos', 'veiculos.fabricante_idfabricante', '=', 'fabricante_autos.idfabricante_auto')
                                ->join('modelo_carros', 'veiculos.modelo_idmodelo', '=', 'modelo_carros.idmodelo_carro')
                                ->select('veiculos.*','anexos.*','fabricante_autos.CmpFabricante as CmpMarca','modelo_carros.CmpModelo')
                                ->where('veiculos.CmpStatus', '=', $STATUS)
                                ->where('anexos.CmpStatus', '=', 'ATV')
                                ->where('anexos.CmpCategoriaObjeto', '=', 'VEI')                                
                                ->where('veiculos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                                ->where('veiculos.apartamento_idapartamento', '=', $idApartamento_decripto)
                                ->orderBy('veiculos.CmpTipoVeiculo', 'desc')
                                ->get();


    }
    
   
    
    //UPDATE TABELA CONDOMINIO
    //RALIZAR O UPDATE DO CONDOMINIO
    public function UpdateVeiculo(\Symfony\Component\HttpFoundation\Request $request, $idVeiculo){            
        
        $alugado = NULL;
        
        //begin
        DB::beginTransaction();

        
        try { 
            
                $vagaGaragem = new \App\Classes\VagaGaragemModel();
                $idVagaGaragem = $vagaGaragem -> ConsultarVagaGaragemId($request->input("selApartamento"), $request->input("catVeiculo"));

                //PARA O CASO DE HAVER ALGUM ERRO 
                if($idVagaGaragem == NULL){
                   
                    DB::rollback();
                    return "ERR_CAD_VEI";
                    
                }else{
                
                    
                    //GRADE DE SEGURANCA
                    $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                    $id_decripto = $seguranca->decripto($idVeiculo);

                    if($request->input("selApartamentoAlugado") != ""){
                        $alugado = $request->input("selApartamentoAlugado");
                    }
                    
                    DB::table('veiculos')
                            ->where('idveiculo', $id_decripto)
                            ->update(array('CmpTipoVeiculo' => $request->input("catVeiculo"),
                                                                                'fabricante_idfabricante' => $request->input("marca"),                                                                                          
                                                                                'modelo_idmodelo' => $request->input("modelo"),
                                                                                'CmpPlaca' => $request->input("placa"),    
                                                                                'cor_idcor' => $request->input("cor"),                                                                                              
                                                                                'CmpDespacho' => $request->input("descricao"),
                                                                                'apartamento_idapartamento' => $request->input("selApartamento"),
                                                                                'alugado_idapartamento' => $alugado,    
                                                                                'vaga_garagem_idvaga_garagem' => $idVagaGaragem,  
                                                                                'cartao_idcartao' => $request->input("catCartaoEstacionamento")
                                                                                 ));
                    DB::commit();
                    return "SUC_CAD_VEI";
                }
                
                

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

                return "ERR_CAD_VEI";
        }
    }
        
    //EXCLUIR TODOS OS ANEXOS DO DOCUMENTO
    ////ATUALZA DOCUMENTO
    public function ExcluirVeiculo($idVeiculo){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVeiculo_decripto = $seguranca->decripto($idVeiculo);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('veiculos')                          
                    ->where('veiculos.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('veiculos.idveiculo', '=', $idVeiculo_decripto)                    
                    ->update(array('veiculos.CmpStatus' => 'DTV', 'veiculos.CmpDataExclusao' => date('Y-m-d')));
                        
               
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
    
    public function ArquivarVeiculo($idVeiculo){
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVeiculo_decripto = $seguranca->decripto($idVeiculo);
       
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('veiculos')                          
                    ->where('veiculos.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                    ->where('veiculos.idveiculo', '=', $idVeiculo_decripto)                    
                    ->update(array('veiculos.CmpStatus' => 'ARQ','veiculos.CmpDataArquivado' => date('Y-m-d')));
                        
               
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_ARQ_VEI";

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
            return "ERR_ARQ_VEI"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }
    
    //ENTRADA DE VEÍCULOS NO CONDOMINIO
    public function MovimentoVeiculo($idVeiculo, $acao){ 
         
            $veiculo = new \App\EntradaSaidaVeiculos();
            //GRADE DE SEGURANCA
            $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
            $idVeiculo_decripto = $seguranca->decripto($idVeiculo);
            
            //CRIACAO DOS VEICULOS            
            // $veiculo -> condominio_idcondominio = Auth::user()->condominio_idcondominio;
            $veiculo -> CmpDataInclusao = date('Y-m-d H:i:s');
            $veiculo -> CmpHora = date('H:i:s');  
            $veiculo -> CmpAcao = $acao; 
            
            $veiculo -> veiculo() ->associate($idVeiculo_decripto);
            $veiculo -> condominio() -> associate(Auth::user()->condominio_idcondominio);
            
            $result = $veiculo->save();
            
            //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
            $util = new \App\Util\Util();
            
            $historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "VEICULO");
           // $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "VEICULO");
    
            return "OK";
    }
}
