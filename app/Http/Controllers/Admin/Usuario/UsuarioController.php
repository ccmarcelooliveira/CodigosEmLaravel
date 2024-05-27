<?php

namespace App\Http\Controllers\AdministracaoDagoba\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;

class UsuarioController extends Controller
{
    public function ConsultarInfUsuario()
    {
        
        $data = array();
        //echo "usu";
        $usuario = new \App\Classes\UsuarioModel();
        $data["listaUsuario"] = $usuario ->ConsultarUsuario();   
        
        return view('administracaoDagoba.usuario.ConsultarUsuario', $data);
    }
    
    public function ConsultarInfUsuarioFuncionario()
    {
        
        $data = array();
        
        $usuario = new \App\Classes\UsuarioModel();
        $data["listaUsuario"] = $usuario -> ConsultarUsuarioFuncionario();        
        
        return view('administracaoDagoba.usuarioFuncionario.ConsultarUsuarioFuncionario', $data);
    }
    
    public function ConsultarInfUsuarioPorId($idUsuario){
    
        $usuarioModel = new \App\Classes\UsuarioModel();
        return $usuarioModel ->ConsultarUsuarioPorID($idUsuario);
    }
    
    public function ConsultarInfUsuarioEmailEnviado()
    {
        
        $data = array();
       
        $usuario = new \App\Classes\UsuarioModel();
        $data["listaUsuario"] = $usuario -> ConsultarUsuarioFuncionario();        
        
        return view('administracaoDagoba.usuarioFuncionario.ConsultarUsuarioFuncionario', $data);
    }
    
    
    public function DetalharInfUsuario($id){
        
        //echo "teste";
        $data = array();
        $teste = "";
        $msg = "";
        
        $usuarioModel = new \App\Classes\UsuarioModel();
        $usuario = $usuarioModel -> ConsultarUsuarioMorador($id);//\App\Usuario::find($id);
             
        $data["apartamento"] = "";
        $data["bloco"] = "";
        $data["usuarioStatus"] = "";
        $data["usuarioStatusExtenso"] = "";        
        $data["perfil"] = "";
        $data["apartamento"] = "";
        $data["bloco"] = "";        
        $data["idmorador"] = "";
        $data["morador"] = "";
        $data["usuario"] = "";
        $data["condominio"] = "";
        $data["id"] = "";
        $data["msg"] = "";
          
        if($usuario != ""){
            
            $data["usuario"] = $usuario -> usuario;
            if($usuario -> CmpStatus == 'SUS') $teste = 'SUSPENSO';
            if($usuario -> CmpStatus == 'ATV') $teste = 'ATIVO';
            if($usuario -> CmpStatus == 'DTV') $teste = 'EXCLUÍDO';
            if($usuario -> CmpStatus == 'AGU') $teste = 'AGUARDANDO';

            $data["usuarioStatus"] = $usuario -> CmpStatus;
            $data["usuarioStatusExtenso"] = $teste;        
            $data["perfil"] = $usuario -> CmpDescricao;
            $data["apartamento"] = $usuario -> CmpApto;
            $data["bloco"] = $usuario -> CmpBloco;        
            $data["idmorador"] = $usuario -> idmorador;
            $data["morador"] = $usuario -> CmpNome;
            $data["condominio"] = $usuario -> CmpRazaoSocial;
            $data["id"] = $id;
            $data["msg"] = "";
            
        }else{
            $data["msg"] = "<div class='alert alert-danger'><font size='5'>Usuário não ativado</font></div>";
        }
        
        /*if($usuario -> idperfil != 3 
                && $usuario -> idperfil != 4
                && $usuario -> idperfil != 5
                && $usuario -> idperfil != 6){        
        
        }    */
        
        
        
        return view('administracaoDagoba.usuario.DetalharUsuario', $data);
    }
    
    public function SuspenderInfUsuario($id){
        
        $usuario = new \App\Classes\UsuarioModel();        
        $usuario ->SuspenderUsuario($id);
        
        return $this->DetalharInfUsuario($id);        
        
    }
    
    public function ExcluirInfUsuario($id){
        
        $usuario = new \App\Classes\UsuarioModel();        
        $usuario ->ExcluirUsuario($id);
        
        return $this->DetalharInfUsuario($id);        
        
    }
    
    public function AtivarInfUsuario($id){
        //echo "teste";
        $usuario = new \App\Classes\UsuarioModel();        
        $usuario -> AtivarUsuario($id);
        
        return $this->DetalharInfUsuario($id);        
        
    }
    
    public function AtivarInfUsuario2($id){
        //echo "teste2";
        $usuario = new \App\Classes\UsuarioModel();        
        return $usuario -> AtivarUsuario($id);
        
        //return $this->DetalharInfUsuario($id);        
        
    }
    
    //ATIVAR E SUBSTITUIR LOGIN PADRÃO PELO EMAIL DO USUARIO.
    public function AtivarInfUsuario3($objeto,$categoria){
        //echo "<BR>teste2";
        $usuario = new \App\Classes\UsuarioModel();        
        return $usuario -> AtivarUsuarioLogin($objeto, $categoria);
        
        //return $this->DetalharInfUsuario($id);        
        
    }
    
  
    
     //insere um novo usuario
    public function CadastrarInfUsuario(Request $request){
        
        //echo "teste";
        $data = array();
        //Listar todos os cargos
                
        $listaperfil = \App\Perfil::all();
        $data["listaperfil"] = $listaperfil;
        
        $listacondominio = \App\Condominio::all();
        $data["listacondominio"] = $listacondominio;
        
        /*$listamorador = \App\Morador::all();
        $data["listamorador"] = $listamorador;*/
        
        $listaApartamento = \App\Apartamento::all();
        $data["listaApartamento"] = $listaApartamento; 
        
        $usuarioController = new \App\Classes\UsuarioModel();
        
        if($request->isMethod("post")){
            //Vamos gravar o funcionario
           // $funcionario = new \App\Funcionario($request->all());
                       
            $usuario = new \App\usuario($request->all());
            
            $usuario->usuario = $request->input("usuario");
            //echo "<BR>";
            //Pegar a senha e passar o Hash
            $usuario->password = Hash::make(str_replace(" ","",$request->input("password")));
            //echo "<BR>";
            
            //$usuario->password_extenso = "";//str_replace(" ","",$request->input("password"));
            
            $usuario->CmpStatus = "ATV";
            
            $usuario -> CmpDataInclusao = date('Y-m-d H:i:s');
            $usuario -> CmpTipoUsuario = "MAN"; //MANUAL
            $usuario -> apelido = $usuario -> usuario;
            $perfil = new \App\perfil();
            $perfil->idperfil = $request->input("perfil");     
            
            //Relacionar
            $usuario -> perfil()->associate($perfil);
            
            if(strlen($request->input("apartamento")) > 0 ){
                $usuario -> apartamento() -> associate($request->input("apartamento"));
            }
            if(strlen($request->input("condominio")) > 0){
                $usuario -> condominio() -> associate($request->input("condominio"));
            }
            
            if(strlen($request->input("funcinario")) > 0){
                $usuario -> condominio() -> associate($request->input("funcinario"));
            }
            
            //echo "retorno " . count($usuarioController ->ConsultarUsuarioLogin($request->input("usuario"), $usuario->password));
            //TESTE PARA VERIFICAÇÃO DE EXISTÊNCIA DE LOGIN IGUAL
            if(count($usuarioController ->ConsultarUsuarioLogin($request->input("usuario"), $usuario->password)) == 0)
            {             
                //gravar no banco
                $usuario->save();
                $data["resp"] = "<div class='alert alert-success'>Usuário cadastrado</div>"; 
                
            }else{
                $data["resp"] = "<div class='alert alert-success'>Usuário já existente!</div>";
            }    
            
        }
        
        return view('administracaoDagoba.usuario.CadastrarUsuario', $data);
    }
    
    //insere um novo usuario
    public function CadastrarInfUsuarioFuncionario(Request $request){
       
        $data = array();
        //Listar todos os cargos
                
        $listaperfil = \App\Perfil::all();
        $data["listaperfil"] = $listaperfil;
        
        $listaOficina = \App\Oficina::all();
        $data["listaOficina"] = $listaOficina;
        
        /*$listamorador = \App\Morador::all();
        $data["listamorador"] = $listamorador;*/
        
        $listaFuncionario = \App\Funcionario::all();
        $data["listaFuncionario"] = $listaFuncionario; 
        
        $usuarioController = new \App\Classes\UsuarioModel();
        
        if($request->isMethod("post")){
            //Vamos gravar o funcionario
           // $funcionario = new \App\Funcionario($request->all());
                       
            $usuario = new \App\usuario($request->all());
            
            $usuario->usuario = $request->input("usuario");
            //echo "<BR>";
            //Pegar a senha e passar o Hash
            $usuario->password = Hash::make(str_replace(" ","",$request->input("password")));
            //echo "<BR>";
            
            //$usuario->password_extenso = str_replace(" ","",$request->input("password"));
            $usuario -> apelido = $usuario -> usuario;
            $usuario->CmpStatus = "ATV";
            
            $usuario -> CmpDataInclusao = date('Y-m-d H:i:s');
            $usuario -> CmpTipoUsuario = "MAN"; //MANUAL

            $perfil = new \App\Perfil();
            $perfil->idperfil = $request->input("perfil");     
            
            $usuario -> oficina() -> associate($request->input("oficina"));
            //Relacionar
            $usuario -> perfil()->associate($perfil);
            
            if($request->input("funcionario") != ""){
                $usuario -> funcionario() -> associate($request->input("funcionario"));
            }
            /*if(strlen($request->input("funcionario")) > 0 ){
                $usuario -> funcionario() -> associate($request->input("funcionario"));
            }
            if(strlen($request->input("condominio")) > 0){
                $usuario -> condominio() -> associate($request->input("condominio"));
            }*/
            
            //echo "retorno " . count($usuarioController ->ConsultarUsuarioLogin($request->input("usuario"), $usuario->password));
            //TESTE PARA VERIFICAÇÃO DE EXISTÊNCIA DE LOGIN IGUAL
            if(count($usuarioController ->ConsultarUsuarioLogin($request->input("usuario"), $usuario->password)) == 0)
            {             
                //gravar no banco
                $usuario->save();
                $data["resp"] = "<div class='alert alert-success'>Usuário cadastrado</div>"; 
                
            }else{
                $data["resp"] = "<div class='alert alert-success'>Usuário já existente!</div>";
            }    
            
        }
        
        return view('administracaoDagoba.usuarioFuncionario.CadastrarUsuarioFuncionario', $data);
    }
    
    public function EditarInfUsuario(Request $request,$id){
        
        $data = array();
        //Listar todos os cargos
        
        $usuario = \App\Usuario::find($id);
                
        $data["usuario"] = $usuario -> usuario; 
        $data["senha"] = $usuario -> password; 
        $data["id"] = $id;                      //ID DO USUARIO    
        
        $condominio = \App\Condominio::find($usuario->condominio_idcondominio);
        $data["condominio"] = $condominio -> CmpRazaoSocial;
         
        $listaperfil = \App\Perfil::all();
        $data["listaperfil"] = $listaperfil;
                
        $usuario = new \App\Classes\UsuarioModel();
        
        if($request->isMethod("post")){
            
            //TESTE DE EXISTÊNCIA DE USUARIO SENHA IGUAL                       
            if(count($usuario -> ConsultarUsuarioSenha($request->input("password_novo"))) == 0){
                $usuario -> EditarUsuario($request);
                $data["resp"] = "<div class='alert alert-success'>Usuário Alterado com Sucesso!</div>";
            }else{
                $data["resp"] = "<div class='alert alert-success'>Usuário existente!</div>";
            }
                       
        }
        
        return view('administracaoDagoba.usuario.EditarUsuario', $data);
    }
    
    public function TrocarSenhaInfUsuario(Request $request,$id){
        
        $data = array();
        //Listar todos os cargos
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idcripto = $seguranca -> cripto($id);
       
        $usuario = \App\Usuario::find($id);
                
        $data["usuario"] = $usuario -> usuario; 
        $data["senha"] = $usuario -> password; 
        $data["id"] = $idcripto;        
        
        $listaperfil = \App\Perfil::all();
        $data["listaperfil"] = $listaperfil;
        
        $listacondominio = \App\Condominio::all();
        $data["listacondominio"] = $listacondominio;
        
        /*$listamorador = \App\Morador::all();
        $data["listamorador"] = $listamorador;*/
        
        //$listaApartamento = \App\Apartamento::all();
        //$data["listaApartamento"] = $listaApartamento; 
        
        $usuario = new \App\Classes\UsuarioModel();
        
        if($request->isMethod("post")){
            
            //TESTE DE EXISTÊNCIA DE USUARIO SENHA IGUAL                       
            if(count($usuario -> ConsultarUsuarioSenha($request->input("password_novo"))) == 0){
                $usuario -> EditarUsuario($request);
                $data["resp"] = "<div class='alert alert-success'>Usuário Alterado com Sucesso!</div>";
            }else{
                $data["resp"] = "<div class='alert alert-success'>Usuário existente!</div>";
            }
                       
        }
        
        return view('administracaoDagoba.usuario.EditarUsuario', $data);
    }
   
    
    /**
     * ENVIO DE EMAIL PARA USUARIOS NOVOS
     * @param type $param
     */
    public function ConsultarInfEnvioEmailUsuario() {
        
        /*
         * 1. VERIFICAR OS EMAIL NOVOS PARA SEREM ENVIADOS.USAR CRITÉRIO DE EMAIL NÃO NULO E STATUS DE USUARIO "AGU"
         * 2. APRESENTAR NA TELA DE CONTROLE, OS EMAIL DE ACORDO COM OS CONDOMÍNIOS. 
         * 3. CRIAR ROTINA DE ENVIO CONTROLADA PARA ENVIO EM SEQUÊNCIA.
         */
        
        $usuario = new \App\Classes\UsuarioModel();
        $registroEmail = new \App\Classes\RegistroEnvioEmail();
        
        $listaEmails_a_Enviar = $usuario -> ConsultarUsuarioEnvioEmail(); 
        $listaEmailEnviados = $registroEmail -> ConsultarEnvioEmail();
               
        foreach($listaEmails_a_Enviar as $aEnviar){
          
            foreach($listaEmailEnviados as $enviados){
             
                //TIRANDO O PROPRIEDADE NÃO PRONTO
                if($aEnviar -> idproprietario == $enviados -> proprietario_idproprietario){
                    $aEnviar -> CmpStatus = "DTV";
                }
                
                //TIRANDO O MORADOR NÃO PRONTO
                if($aEnviar -> idmorador == $enviados -> morador_idmorador){
                    $aEnviar -> CmpStatus = "DTV";
                }
                
            }
            
        }
        
        $data["listaEmailUsuario"] = $listaEmails_a_Enviar;
         
        return view('administracaoDagoba.usuario.ConsultarEnvioEmailUsuario', $data);
        
    }
    
    /**
     * (RE)ENVIO DE EMAIL PARA USUARIOS NOVOS
     * @param type $param
     */
    public function ConsultarInfReEnvioEmailUsuario() {
        
        /*
         * 1. VERIFICAR OS EMAIL NOVOS PARA SEREM ENVIADOS.USAR CRITÉRIO DE EMAIL NÃO NULO E STATUS DE USUARIO "AGU"
         * 2. APRESENTAR NA TELA DE CONTROLE, OS EMAIL DE ACORDO COM OS CONDOMÍNIOS. 
         * 3. CRIAR ROTINA DE ENVIO CONTROLADA PARA ENVIO EM SEQUÊNCIA.
         */
        
        $usuario = new \App\Classes\UsuarioModel();
        $data["listaEmailUsuario"] = $usuario -> ConsultarUsuarioEnvioEmail(); 
        
        return view('administracaoDagoba.usuario.ConsultarREEnvioEmailUsuario', $data);
        
    }
    
    /*public function EnviarInfEmailUsuario() {
        
        $msg = "";
        
        $util = new \App\Util\Util();
        
        /*
         * 1. VERIFICAR OS EMAIL NOVOS PARA SEREM ENVIADOS.USAR CRITÉRIO DE EMAIL NÃO NULO E STATUS DE USUARIO "AGU"
         * 2. APRESENTAR NA TELA DE CONTROLE, OS EMAIL DE ACORDO COM OS CONDOMÍNIOS. 
         * 3. CRIAR ROTINA DE ENVIO CONTROLADA PARA ENVIO EM SEQUÊNCIA.
        
        
        $email = "";
        $nome = "";
        
        $usuario = new \App\Classes\UsuarioModel();
        $registro = new \App\Classes\RegistroEnvioEmail();    
        
        $lista = $usuario -> ConsultarUsuarioEnvioEmail();
        
        $email_conteudo = $util-> ModeloEmailInstrucoes(); //MODELO DE MSG PARA ENVIO DE EMAIL
        
        foreach($lista as $item){
            
            if($item -> CmpEhMorador == "S"){
                $email = $item -> emailPRO;
                $nome = $item -> nomePRO;
            }else{
                $email = $item -> emailMOR;
                $nome = $item -> nomeMOR;
            }
            
            if($item -> CmpStatus == "AGU"){
                
                $msg = $msg + $registro -> EmailInstrucoesNovoUsuarioV2($email_conteudo,$email,$nome);
                //$registro -> insereRegistroEnvioEmail($email,"ATV");                
                
            }    
        }
        
        echo $msg;
        
        
        return $this -> ConsultarInfEnvioEmailUsuario();
        
    }*/
    
     public function EnviarInfEmailUsuario() {
        
        /*
         * 1. VERIFICAR OS EMAIL NOVOS PARA SEREM ENVIADOS.USAR CRITÉRIO DE EMAIL NÃO NULO E STATUS DE USUARIO "AGU"
         * 2. APRESENTAR NA TELA DE CONTROLE, OS EMAIL DE ACORDO COM OS CONDOMÍNIOS. 
         * 3. CRIAR ROTINA DE ENVIO CONTROLADA PARA ENVIO EM SEQUÊNCIA.
         */
        
        $email = "";
        $id = 0;
        
        $usuario = new \App\Classes\UsuarioModel();
        $registro = new \App\Classes\RegistroEnvioEmail();    
        
        echo $lista = $usuario -> ConsultarUsuarioEnvioEmail();
        
        foreach($lista as $item){
                     
            if($item -> CmpEhMorador == "S"){
                $email = $item -> emailPRO;
                $id = $item -> idproprietario;
            }else{
                $email = $item -> emailMOR;
                $id = $item -> idmorador;
            }
            
            if($item -> CmpStatus == "AGU"){
                if($registro -> EmailInstrucoesNovoUsuario($item -> CmpEmailParaEnvio, 
                                        $email,
                                        $item -> CmpRazaoSocial) == "OK"){

                    ECHO $email . "-". $item->idusuario." TESTE ok<BR>";
                    $registro -> insereRegistroEnvioEmail($id,
                                                            $item -> nomeMOR,
                                                            $item -> nomePRO,
                                                            $item -> CmpEhMorador,
                                                            $item -> idcondominio,
                                                            "ATV");
                    //($idResidente,$idUsuario,$nomeMOR,$nomePRO,$EhMorador,$idCondominio,$status)
                    $data["msgOK"] = "Parabéns! Sua conta foi ativada com sucesso! Agora, siga o passo 3.";
               } 
            }    
        }
        
        
        
        return $this -> ConsultarInfEnvioEmailUsuario();
        
    }
    
    
     public function ConsultarInfInativarUsuario() {
        echo "inativo";
        /*
         * 1. VERIFICAR OS EMAIL NOVOS PARA SEREM ENVIADOS.USAR CRITÉRIO DE EMAIL NÃO NULO E STATUS DE USUARIO "AGU"
         * 2. APRESENTAR NA TELA DE CONTROLE, OS EMAIL DE ACORDO COM OS CONDOMÍNIOS. 
         * 3. CRIAR ROTINA DE ENVIO CONTROLADA PARA ENVIO EM SEQUÊNCIA.
         */
        
        $usuario = new \App\Classes\UsuarioModel();
        
        $lista = $usuario -> ConsultarUsuarioEnvioEmail(); 
        
        
        /*foreach($lista as $item){
            if($item -> CmpStatus == 
        }*/
        
        $data["listaEmailUsuario"] = $lista; 
        
        
        
        return view('administracaoDagoba.usuario.ConsultarInativarUsuario', $data);
        
    }
    
    public function InativarInfEmailUsuario($id,$id2) {
        
        /*
         * 1. VERIFICAR OS EMAIL NOVOS PARA SEREM ENVIADOS.USAR CRITÉRIO DE EMAIL NÃO NULO E STATUS DE USUARIO "AGU"
         * 2. APRESENTAR NA TELA DE CONTROLE, OS EMAIL DE ACORDO COM OS CONDOMÍNIOS. 
         * 3. CRIAR ROTINA DE ENVIO CONTROLADA PARA ENVIO EM SEQUÊNCIA.
         */
        
        $email = "";
        
        $usuario = new \App\Classes\UsuarioModel();
        $registro = new \App\Classes\RegistroEnvioEmail();    
        
        //echo "teste";
        $usuario -> SuspenderUsuario2($id,$id2);
       
        return $this ->ConsultarInfInativarUsuario();
        
    }
    
}
