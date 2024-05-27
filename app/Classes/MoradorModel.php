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
 * Description of MoradorModel
 *
 * @author Celia Regina
 */
class MoradorModel {
    
     public function MoradorModel(){

     }
     
     public function insereMorador($idApartamento,$idCondominio,$idUsuario,$numero_apartamento){ 
         
            //MORADOR
            $morador = new \App\Morador();
            $morador -> CmpStatus = "AGU";           
            
            $morador -> condominio_idcondominio = $idCondominio;
            $morador -> apartamento_idapartamento = $idApartamento;
            $result = $morador->save();
            
            //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
            $util = new \App\Util\Util();
            
            $historico = new \App\Classes\HistoricoOperacaoModel();
            //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "VEICULO");
            $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "MORADOR");
            
            return $morador->idmorador;
    }
    /**
     * 
     * @param type $idcondominio
     */
    
    public function ArquivarCadastrarMorador($request,$idApartamento,$idMorador){ 
         
        $util = new \App\Util\Util();
        
        $entrada = null;
        $saida = null;
        $nascimento = null;  
        $estCivil = null;
        $naturalidade = null;
        $nacionalidade = null;
         $escolaridade = null;
        //begin
        DB::beginTransaction();

        try {
            
            //ARQUIVAR MORADOR
            //CRIANDO CONTA 
            $morador = new \App\Morador();            
            
            //USUÁRIO
            $usuarioModel = new \App\Classes\UsuarioModel();
        
            DB::table('moradors')
                    ->where('idMorador', $idMorador)
                    ->update(array('CmpStatus' => "ARQ"));
 
            //ARQUIVAR IMAGEM
            DB::table('anexos')
                  ->where('anexos.condominio_idcondominio', '=',Auth::user()->condominio_idcondominio)
                  ->where('anexos.CmpDonoAnexo', '=', $idMorador)
                  ->where('anexos.CmpCategoriaObjeto', '=', "MOR")
                  ->where('anexos.CmpStatus', '=', "DTV")
                  ->update(array('anexos.CmpStatus' => 'ARQ'));  
        
            
                    if($request->input("dtEntrada") != "") $entrada = $util->formatarDataMysql($request->input("dtEntrada"));
                    if($request->input("dtSaida") != "") $saida = $util->formatarDataMysql($request->input("dtSaida"));
                    if($request->input("dtNasc") != "") $nascimento = $util->formatarDataMysql($request->input("dtNasc"));
            
                    if($request->input("estCivil") != ""){
                        $estCivil = $request->input("estCivil");
                    }
                    
                    if($request->input("naturalidade") != ""){
                        $naturalidade = $request->input("naturalidade");
                    }
                    
                    if($request->input("nacionalidade") != ""){
                        $nacionalidade = $request->input("nacionalidade");
                    }
                    
                    if($request->input("escolaridade") != ""){
                        $escolaridade = $request->input("escolaridade");
                    }
                    //CADASTRAR MORADOR
                    $morador = new \App\Morador();
                    $morador -> CmpNome = $request->input("nome");
                    $morador -> CmpStatus = "ATV";
                    $morador -> CmpCPF = $request->input("cpf");
                    $morador -> CmpTel = $request->input("tel");
                    $morador -> CmpCel = $request->input("cel");
                    $morador -> CmpEmail = $request->input("email");
                    $morador -> CmpDataNasc = $nascimento;
                    $morador -> CmpProfissao = $request->input("profissao");
                    $morador -> CmpEstCivil = $estCivil;
                    $morador -> CmpNaturalidade = $naturalidade;
                    $morador -> CmpNacionalidade = $nacionalidade;
                    $morador -> CmpEhDeficiente = $request->input("ehDeficiente");
                    $morador -> CmpConjuge = $request->input("conjuge");
                    $morador -> CmpEscolaridade = $escolaridade;
                    $morador -> CmpTituloEleitor = $request->input("tituloEleitoral");
                    $morador -> CmpDocIdent = $request->input("docIdentidade");
                    $morador -> CmpCarteiraMotorista = $request->input("cartMotorista");
                    $morador -> CmpEntradaCondominio = $entrada;
                    $morador -> CmpSaidaCondominio = $saida;
                    $morador -> CmpObs = $request->input("descricao");

                    $morador -> condominio_idcondominio = Auth::user()->condominio_idcondominio;
                    $morador -> apartamento_idapartamento = $idApartamento;

                    $result = $morador->save();

                    //SE HOUVER UMA FIGURA PARA FAZER UPLOAD
                    if(strlen($_FILES['anexo1']['name']) > 0){  //APENAS SE A FOTO EXISTIR              

                        $anexoController = new \App\Http\Controllers\Anexo\AnexoController();
                        $anexo_cod1 = $util->geraNumeroAleatorio();

                        $idAnexo1 = $anexoController->cadastrarAnexo($_FILES['anexo1']['name'], "MOR","", $morador -> idmorador, $anexo_cod1);
                        if ($idAnexo1 != "err") {
                            $anexoController -> loadAnexoImagem('anexo1', $anexo_cod1, "morador");                    
                        }
                    }    

                    
                    $usuario = $usuarioModel -> ConsultarUsuarioApto($idApartamento);
                    
                    foreach($usuario as $item){             
                        $usuarioModel -> InsereUsuario2($morador -> idmorador, 
                                                        $item->proprietario_idproprietario, 
                                                        $item->condominio_idcondominio,                                                          
                                                        $item->apartamento_idapartamento,
                                                        $item-> apelido,
                                                        $item->perfil_idperfil);
                    
                        //MARCA O USUARIO COMO AGUARDANDO NOVAMENTE
                        DB::table('usuarios')
                                ->where('idusuario', $item->idusuario)
                                ->update(array('CmpStatus' => "ARQ"));

                }

            
            
            DB::commit();
                   
            return $morador -> idmorador;

        } catch (Exception $e) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "MORADORES");

                DB::commit();
            
            return 0;
        }
    }
    
    public function AtivarMoradores($idcondominio){            
            
        //begin
        DB::beginTransaction();

        try { 
                DB::table('moradors')->where('condominio_idcondominio', $idcondominio)->update(array('CmpStatus' => 'ATV'));

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
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "SUS", "NOK", "MORADORES");

                DB::commit();

        }
    }
    
    //CONSULTAR APARTAMENTO COM ARGUMENTOS
    //31/12/2017
    /**
     * 
     * @param type $idMorador
     * @return type
     * MUDANÇA DE ESTRATÉGIA PARA O CONDOMINIO
     */
    public function consultarMorador($idMorador){

        $linha = "";
             
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca -> decripto($idMorador);
        
        if($idMorador_decripto > 0){
            
            $results = DB::table('moradors')                                          
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')
                                ->select('apartamentos.*',
                                        'moradors.idmorador',
                                        'moradors.CmpNome',                                        
                                        'moradors.CmpCel',
                                        'moradors.CmpTel',  
                                        'moradors.CmpDataNasc',
                                        'moradors.CmpEhDeficiente',
                                        'moradors.CmpEmail',
                                        'moradors.CmpEntradaCondominio',
                                        'moradors.CmpSaidaCondominio',
                                        'moradors.CmpEscolaridade',
                                        'moradors.CmpEstCivil',
                                        'moradors.CmpNacionalidade',
                                        'moradors.CmpNaturalidade',
                                        'moradors.CmpObs',                                        
                                        'moradors.CmpProfissao',
                                        'moradors.CmpStatus',
                                        'moradors.CmpEhProprietario'
                                       
                                        )
                                ->where('moradors.idmorador', '=', $idMorador_decripto)
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('moradors.CmpStatus', '=', 'ATV')
                                
                                ->get();
                               
        }else{        
         
            $results = DB::table('moradors')                                          
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')
                                ->select('apartamentos.*',
                                        'moradors.idmorador',
                                        'moradors.CmpNome',                                      
                                        'moradors.CmpCel',
                                        'moradors.CmpTel',
                                        'moradors.CmpDataNasc',
                                        'moradors.CmpEhDeficiente',
                                        'moradors.CmpEmail',
                                        'moradors.CmpEntradaCondominio',
                                        'moradors.CmpSaidaCondominio',
                                        'moradors.CmpEscolaridade',
                                        'moradors.CmpEstCivil',
                                        'moradors.CmpNacionalidade',
                                        'moradors.CmpNaturalidade',
                                        'moradors.CmpObs',
                                        'moradors.CmpProfissao',
                                        'moradors.CmpStatus',
                                        'moradors.CmpEhProprietario')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('moradors.CmpStatus', '=', 'ATV')                                
                                ->get();
        }  

        return $results;      


    }
    
    
    public function ConsultarMorador2($idApartamento){

        //echo $idApartamento;
        $linha = "";
        /*     
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        echo " teste " .$idApartamento_decripto = $seguranca -> decripto($idApartamento);*/
        
       
        $results = DB::table('moradors')                                          
                            ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento') 
                            ->join('proprietarios', 'proprietarios.apartamento_idapartamento', '=', 'moradors.apartamento_idapartamento')
                            ->select('apartamentos.*',
                                    'moradors.idmorador',
                                    'moradors.CmpNome as nomeMor',
                                    'moradors.CmpCarteiraMotorista as cartMor',
                                    'moradors.CmpCel as celMor',
                                    'moradors.CmpTel as telMor',                                    
                                    'moradors.CmpCPF as cpfMor',
                                    'moradors.CmpDataNasc as nascMor',
                                    'moradors.CmpDocIdent as identMor',
                                    'moradors.CmpEhDeficiente as defMor',
                                    'moradors.CmpEmail as emailMor',
                                    'moradors.CmpEntradaCondominio as entMor',
                                    'moradors.CmpSaidaCondominio as saiMor',
                                    'moradors.CmpEscolaridade as escMor',
                                    'moradors.CmpEstCivil as estMor',
                                    'moradors.CmpNacionalidade as nacMor',
                                    'moradors.CmpNaturalidade as natMor',
                                    'moradors.CmpObs as obsMor',
                                    'moradors.CmpObsDoc as obsDocMor',
                                    'moradors.CmpProfissao as profMor',
                                    'moradors.CmpStatus as staMor',
                                    'moradors.CmpTituloEleitor as titMor',
                                    'proprietarios.idproprietario',
                                    'proprietarios.CmpNome as nomeProp',
                                    'proprietarios.CmpCarteiraMotorista as cartProp',
                                    'proprietarios.CmpCel as celProp',
                                    'proprietarios.CmpTel as telProp',
                                    'proprietarios.CmpConjuge as conjProp',
                                    'proprietarios.CmpCPF as cpfProp',
                                    'proprietarios.CmpDataNasc as nascProp',
                                    'proprietarios.CmpDocIdent as identProp',
                                    'proprietarios.CmpEhDeficiente as defProp',
                                    'proprietarios.CmpEmail as emailProp',
                                    'proprietarios.CmpEntradaCondominio as entProp',
                                    'proprietarios.CmpSaidaCondominio as saiProp',
                                    'proprietarios.CmpEscolaridade as escProp',
                                    'proprietarios.CmpEstCivil as estProp',
                                    'proprietarios.CmpNacionalidade as nacProp',
                                    'proprietarios.CmpNaturalidade as natProp',
                                    'proprietarios.CmpObs as obsProp',
                                    'proprietarios.CmpObsDoc as obsDocProp',
                                    'proprietarios.CmpProfissao as profProp',
                                    'proprietarios.CmpStatus as statProp',
                                    'proprietarios.CmpTituloEleitor as titProp',                                          
                                    'proprietarios.CmpEhMorador')
                            ->where('moradors.apartamento_idapartamento', '=', $idApartamento)
                            ->where('apartamentos.CmpStatus', '=', 'ATV')
                            ->where('moradors.CmpStatus', '=', 'ATV')
                            ->where('proprietarios.CmpStatus', '=', 'ATV')
                                ->get();
                               
        

        return $results;      


    }

    public function consultarMoradorPorId($idMorador){
       echo " IDmorador " . $idMorador;
        return $results = DB::table('moradors')                                          
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')                        
                                ->select('apartamentos.*','moradors.*')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('moradors.CmpStatus', '=', 'ATV')                                    
                                ->where('moradors.idmorador', '=', $idMorador)
                                ->get();


    }
    
    public function ConsultarMoradorId($idMorador){
       
        return $results = DB::table('moradors')                                          
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')                        
                                ->select('apartamentos.*','moradors.*')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('moradors.CmpStatus', '=', 'ATV')                                    
                                ->where('moradors.idmorador', '=', $idMorador)
                                ->first();


    }
       
    public function ConsultarMoradorPorIdApartamento($idApartamento){
       
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idApartamento_decripto = $seguranca -> decripto($idApartamento);

        
        return $results = DB::table('moradors')                                          
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')                        
                                ->select('apartamentos.*','moradors.*')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('moradors.CmpStatus', '=', 'ATV')        
                                ->where('apartamentos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                                ->where('apartamentos.idapartamento', '=', $idApartamento_decripto)
                                ->first();


    }
    
    public function ConsultarMoradorPorIdApTO($idApartamento, $STATUS_MORADOR){
       
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idApartamento_decripto = $seguranca -> decripto($idApartamento);

        
        return $results = DB::table('moradors')                                          
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')                                 
                                ->select('apartamentos.*','moradors.*')
                                ->where('apartamentos.CmpStatus', '=', 'ATV')
                                ->where('moradors.CmpStatus', '=', $STATUS_MORADOR)
                                ->where('apartamentos.condominio_idcondominio', '=', Auth::user()->condominio_idcondominio)
                                ->where('apartamentos.idapartamento', '=', $idApartamento_decripto)
                                ->get();
        
         

    }
    
   
    
    /*
     * Consulta de Email para o login
     * ATENÇÃO: SÃO DUAS SITUAÇÕES. 
     * PRIMEIRA: O MORADOR JÁ ESTÁ CADASTRADO COM O EMAIL E PRECISA ALTERAR ALGUMA INFORMAÇÃO
     */
    public function ConsultarEmailMorador($email,$testeEmail,$idMorador){
        
        $retorno = "SIM";
        $teste = 0;
        $sql = "";               
       
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca -> decripto($idMorador);
               
        if($email != "") //Edicao. O morador ja tem email cadastrado.
        {            
            
            $sql = " SELECT count(*) num                   
                                       FROM moradors "
                                    . " WHERE moradors.CmpStatus = 'ATV' "
                                    . " AND moradors.CmpEmail = '".trim($email)."'";
                                        
                                    if($idMorador_decripto != 0) $sql = $sql . " AND moradors.idmorador <> ".$idMorador_decripto;
                                    
                                    /*$sql = $sql. " UNION SELECT count(*) num"
                                    . " FROM proprietarios "
                                    . " WHERE  proprietarios.CmpStatus = 'ATV' "
                                    . " AND proprietarios.CmpEmail = '".trim($email)."'";*/
                              
            $result =  DB::select($sql);  
      
            foreach($result as $item){ 
                $teste = intval($item -> num);
                if($teste > 0){
                    //echo "teste sghdfg";
                    $retorno = "NAO";     
                }
                //echo $item -> num;
            }    
            
        }
        
      
        return $retorno;

    }
    
    public function ConsultarEmail($email){
        
        //$retorno = "";        
        $results = DB::table('moradors')
                       ->select('moradors.*')                      
                       ->where('moradors.CmpStatus', '=', 'ATV') 
                       ->where('moradors.CmpEmail', '=', trim($email))  
                       ->get();

        return $results;

    }
    
        
    /*
     * Consulta de Email para o login
     */
    public function ConsultarEmailMoradorV2($email){
                    
        $results = DB::table('moradors')
                       ->select('moradors.*','usuarios.*')
                       ->join('usuarios', 'usuarios.morador_idmorador', '=', 'moradors.idmorador')
                       ->where('moradors.CmpStatus', '=', 'ATV') 
                       ->where('moradors.CmpEmail', '=', trim($email))  
                       ->get();
        
        return $results;

    }
    
    /*
     * Consulta de Email para o login
     */
    public function ConsultarEmailMoradorV3($email){
                    
        $results = DB::table('moradors')
                       ->join('condominios', 'condominios.idcondominio', '=', 'moradors.condominio_idcondominio') 
                       ->join('usuarios', 'usuarios.morador_idmorador', '=', 'moradors.idmorador')
                       ->select('moradors.*','usuarios.*',
                               'condominios.CmpEmailParaEnvio',
                               'condominios.CmpRazaoSocial')                       
                       ->where('moradors.CmpStatus', '=', 'ATV') 
                       ->where('moradors.CmpEmail', '=', trim($email))  
                       ->get();
        
        return $results;

    }
    
    
    public function VerificaMoradorContaNaoAtivada($email){
      
        echo " email  " . $email . "<BR>";
        return $results = DB::table('moradors')
                           ->select('moradors.CmpEmail as emailMor','moradors.idmorador','usuarios.idusuario')
                           ->join('usuarios', 'usuarios.morador_idmorador', '=', 'moradors.idmorador')
                           ->where('usuarios.CmpStatus', '=', 'AGU') 
                           ->where('moradors.CmpEmail', '=', trim($email))  
                           ->get();
       
    }
    
    //VERIFICA SE O EMAIL FOI ATIVADO
    public function VerificaContaUsuarioAtivada($email){

        
          $results = DB::table('moradors') 
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento') 
                                ->join('usuarios', 'usuarios.morador_idmorador', '=', 'moradors.idmorador') 
                                ->select('apartamentos.*','moradors.*','usuarios.*')                                
                                ->where('moradors.CmpStatus', '=', 'ATV')  
                                ->where('apartamentos.CmpStatus', '=', 'ATV')  
                                ->where('usuarios.CmpStatus', '=', 'ATV')
                                ->where('moradors.CmpEmail', '=', trim($email))
                                ->first();

        return $results;
    }
    
    //VERIFICA SE O EMAIL FOI ATIVADO
    public function VerificaContaUsuarioNaoAtivada($email){
        
          $results = DB::table('moradors') 
                                ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento') 
                                ->join('usuarios', 'usuarios.morador_idmorador', '=', 'moradors.idmorador') 
                                ->select('apartamentos.*','moradors.*','usuarios.*')                                
                                ->where('moradors.CmpStatus', '=', 'ATV')  
                                ->where('apartamentos.CmpStatus', '=', 'ATV')  
                                ->where('usuarios.CmpStatus', '=', 'AGU')
                                ->where('moradors.CmpEmail', '=', trim($email))
                                ->first();

        return $results;
    }
    
    //ATUALZA MORADOR
    public function atualizaMorador($request,$idMorador){ 

        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \app\Util\Util();   

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca->decripto($idMorador);

        $resultado = "";
        $entrada = null;
        $saida = null;
        $nascimento = null;
        $nacionalidade = null;
        $naturalidade = null;
        $escolaridade = null;
                
        DB::beginTransaction();

        try {                
                //$idMorador_decripto = str_replace("<BR>", "", $idMorador_decripto);
                //CRIANDO CONTA 
                $morador = new \App\Morador();            

                if($request->input("dtEntrada") != "") $entrada = $util->formatarDataMysql($request->input("dtEntrada"));
                if($request->input("dtSaida") != "") $saida = $util->formatarDataMysql($request->input("dtSaida"));
                if($request->input("dtNasc") != "") $nascimento = $util->formatarDataMysql($request->input("dtNasc"));
                
                if($request->input("nacionalidade") != "") $nacionalidade = $request->input("nacionalidade");
                if($request->input("naturalidade") != "") $naturalidade = $request->input("naturalidade");
                if($request->input("escolaridade") != "") $escolaridade = $request->input("escolaridade");
                
                DB::table('moradors')
                        ->where('idMorador', $idMorador_decripto)
                        ->update(array('CmpNome' => $request->input("nome"),
                                        'CmpEmail' => $request->input("email"),
                                        'CmpCel' => $request->input("cel"),
                                        'CmpTel' => $request->input("tel"),
                                        'CmpEmail' => $request->input("emailSIM"),
                                        'CmpProfissao' => $request->input("profissao"),
                                        'CmpEstCivil' => $request->input("estCivil"),
                                        'CmpNaturalidade' => $naturalidade,
                                        'CmpNacionalidade' => $nacionalidade,
                                        'CmpEhDeficiente' => $request->input("ehDeficiente"),               
                                        'CmpEhProprietario' => $request->input("ehMorador"),                                
                                        'CmpEscolaridade' => $escolaridade,
                                        //'CmpConjuge' => $request->input("conjuge"),
                                        'CmpObs' => $request->input("descricao"),
                                        //'CmpCpf' => $request->input("cpf"),
                                        //'CmpCarteiraMotorista' => $request->input("cartMotorista"),
                                        //'CmpTituloEleitor' => $request->input("tituloEleitoral"),
                                        //'CmpDocIdent' => $request->input("docIdentidade"),
                                        'CmpSaidaCondominio' => $saida,
                                        'CmpEntradaCondominio' => $entrada,
                                        //'CmpObsDoc' => $request->input("obsdoc"),
                                        'CmpDataNasc' => $nascimento));

                DB::commit();

                $resultado = "OK";
                
        } catch (Exception $e) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ALT", "NOK", "MORADORES");

                DB::commit();
                
                $resultado = "NOK";

        }


        return $resultado;

    }
    
    //ARQUIVAR O MORADOR
    //ATUALZA MORADOR
    public function ArquivarMorador($idMorador){ 


        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();   

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca->decripto($idMorador);

        $resultado = "";
        
        DB::beginTransaction();

        try {                

                //CRIANDO CONTA 
                $morador = new \App\Morador();            

                DB::table('moradors')
                        ->where('idMorador', $idMorador_decripto)
                        ->update(array('CmpStatus' => "ARQ"));

                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ARQ", "OK", "MORADOR");

                DB::commit();
                
                $resultado = "OK";
                
        } catch (Exception $e) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ARQ", "NOK", "MORADOR");

                DB::commit();
                
                $resultado = "NOK";

        }


        return $resultado;

    }
    
    /**
     * SUBSTITUIÇÃO DO MORADOR
     * 
     */
    public function SubstituirMorador($request, $idMorador){ 
        
        /**
         * 1. CONSULTAR O MORADOR
         * 2. ARQUIVAR O MORADOR 
         * 3. CADASTRAR NOVO MORADOR 
         */
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();   
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca->decripto($idMorador);

        //1. CONSULTAR O MORADOR
        $moradorModel = new \App\Classes\MoradorModel();
        $morador = $moradorModel -> consultarMoradorPorId($idMorador_decripto);
        
        foreach($morador as $item){           
            //$moradorModel2 = new \App\Classes\MoradorModel();
            $mensagem = new \App\Http\Controllers\Mensagem\MensagemController();
            return $moradorModel -> ArquivarCadastrarMorador($request, $item->apartamento_idapartamento, $idMorador_decripto);
           
        }
        
    }
    
    //ATIVAR MORADOR
    
     //ARQUIVAR O MORADOR
    //ATUALZA MORADOR
    public function AtivarMorador($idMorador){ 

        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();   

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca->decripto($idMorador);

        $resultado = "";
        
        DB::beginTransaction();

        try {                

                //echo "teste";
                //CRIANDO CONTA 
                $morador = new \App\Morador();            

                DB::table('moradors')
                        ->where('idMorador', $idMorador_decripto)
                        ->update(array('CmpStatus' => "ATV"));
                //echo "---teste2";
                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ARQ", "OK", "MORADOR");

                DB::commit();
                
                $resultado = "OK";
                
        } catch (Exception $e) {

                DB::rollback();
                // something went wrong
                $erros-> CmpOcorrencia = $e->getMessage();
                $erros-> data_ocorrencia = date('Y-m-d H:i:s');
                $erros-> CmpStatus = 'ATV';
                //$erros-> condominio_idcondominio = $condominio->idcondominio;
                $erros->save();   

                $historico = new \App\Classes\HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "ARQ", "NOK", "MORADOR");

                DB::commit();
                
                $resultado = "NOK";

        }


        return $resultado;

    }
    
    //SEÇÃO DE NOTÍCIAS
    
    public function consultarMoradorNoticias($idMorador){

        $linha = "";
             
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca -> decripto($idMorador);        
           
        $results = DB::table('moradors')                                          
                            ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')                            
                            ->select('apartamentos.CmpApto',
                                    'apartamentos.CmpBloco',
                                    'moradors.idmorador',
                                    'moradors.CmpNome as nomeMor')
                            ->where('moradors.idmorador', '=', $idMorador_decripto)
                            ->where('moradors.condominio_idcondominio', '=',  Auth::user()->condominio_idcondominio)
                            ->where('apartamentos.CmpStatus', '=', 'ATV')                            
                            ->first();
        
        return $results;      


    }
    
    public function consultarMoradorNoticiasV2($idMorador){

        $linha = "";
             
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca -> decripto($idMorador);
        
           
        $results = DB::table('moradors')                                          
                            ->join('apartamentos', 'apartamentos.idapartamento', '=', 'moradors.apartamento_idapartamento')
                            ->leftJoin('anexos', 'anexos.CmpDonoAnexo', '=', 'moradors.idmorador')
                            ->select('apartamentos.CmpApto',
                                    'apartamentos.CmpBloco',
                                    'moradors.idmorador',
                                    'moradors.CmpNome as nomeMor',
                                    'anexos.CmpAnexo')
                            ->where('moradors.idmorador', '=', $idMorador_decripto)
                            ->where('moradors.condominio_idcondominio', '=',  Auth::user()->condominio_idcondominio)
                            ->where('apartamentos.CmpStatus', '=', 'ATV')                            
                            ->first();
        
          

        return $results;      


    }
}
