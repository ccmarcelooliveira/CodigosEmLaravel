<?php

namespace App\Http\Controllers\AdministracaoDagoba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Hash;
use Auth;

class SistemaController extends Controller
{
    
     public function index(){
        $data = array();
        //echo " sistema";
        //$dashboard = new \App\Http\Controllers\AdministracaoDagoba\Dashboard\DashboardController();
        $data["condominiosAindaNaoAtivados"] = 0; //$dashboard ->ConsultarInfCondominios();
        
        //CONDOMINIO ATIVADO
        
        //REGISTROS DE FOLGA DELETADOS
        //$folga = new \App\Http\Controllers\Master\RH\Folga\FolgaController();
        $data["folgaDeletada"] = 0; //$folga -> ConsultarInfFolgaDashBoard();
        return view('administracaoDagoba.sistema.dashboard', $data);
    }
    
    //EXCLUSÔES
    public function ExcluirSupMenuLinkid($id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuLinkController();
        return $controller ->ExcluirInfMenuLinkid($id);
    }
    
    public function ExcluirSupRelacaoTabelas($id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\RelacaoTabelasController();
        return $controller ->ExcluirInfRelacaoTabelas($id);
    }

    ///CADASTROS 
    public function CadastrarSupRelacaoTabelas(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\RelacaoTabela\RelacaoTabela2Controller();
        return $controller ->CadastrarInfRelacaoTabelas($request);
    }
    
    ///PLANO 
    public function ConsultarSupPlano(){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Plano\PlanoController();
        return $controller -> ConsultarInfPlano();
    }
    
    public function CadastrarSupPlano(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Plano\PlanoController();
        return $controller -> CadastrarInfPlano($request);
    }

    //CADASTRAR MENU CONDOMINIO PADRAO
    public function EditarSupPlano(Request $request,$id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Plano\PlanoController();
        return $controller -> EditarInfPlano($request, $id);
    }
    
    public function ExcluirSupPlano($id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Plano\PlanoController();
        return $controller -> ExcluirInfPlano($id);
    }
 
    ///PLANO 
    public function ConsultarSupMenuLink(){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuLink\MenuLinkController();
        return $controller -> ConsultarInfMenuLink();
    }
    
    //MENU LINK
    public function CadastrarSupMenuLink(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuLink\MenuLinkController();
        return $controller -> CadastrarInfMenuLink($request); 
    }
    
    //CADASTRAR MENU CONDOMINIO PADRAO
    public function EditarSupMenuLink(Request $request,$id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuLink\MenuLinkController();
        return $controller -> EditarInfMenuLink($request, $id);
    }
    
    public function ExcluirSupMenuLink($id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuLink\MenuLinkController();
        return $controller -> ExcluirInfMenuLink($id); 
    }
    
    //CADASTRAR MENU CONDOMINIO PADRAO
    public function CadastrarSupMenuCondominioPadrao(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominioPadrao\MenuCondominioPadrao2Controller();
        return $controller -> CadastrarInfMenuCondominioPadrao($request);
    }
    
    //CADASTRAR MENU CONDOMINIO PADRAO
    public function ConsultarSupMenuCondominioPadrao(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominioPadrao\MenuCondominioPadrao2Controller();
        return $controller ->ConsultarInfMenuCondominioPadrao();
    }
    
    //CADASTRAR MENU CONDOMINIO PADRAO
    public function EditarSupMenuCondominioPadrao(Request $request,$id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominioPadrao\MenuCondominioPadrao2Controller();
        return $controller -> EditarInfMenuCondominioPadrao($request,$id);
    }
    
    public function ExcluirSupMenuCondominioPadrao($id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominioPadrao\MenuCondominioPadrao2Controller();
        return $controller -> ExcluirInfMenuCondominioPadrao($id);
    }
    
    public function CadastrarSupControleAcesso(Request $request){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\ControleAcesso\ControleAcessoController();
        return $controller ->CadastrarInfControleAcesso($request);
                    
    }
    
     public function ConsultarSupControleAcesso(Request $request){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\ControleAcesso\ControleAcessoController();
        return $controller -> ConsultarInfControleAcesso();                    
    }
    
    //CADASTRAR MENU CONDOMINIO PADRAO
    public function EditarSupControleAcesso(Request $request,$id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\ControleAcesso\ControleAcessoController();
        return $controller -> EditarInfControleAcesso($request, $id);
    }
     
    public function CadastrarSupMenuCondominio(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominio\MenuCondominioController();
        return $controller -> CadastrarInfMenuCondominio($request);
    }
    
    //CADASTRAR MENU CONDOMINIO 
    public function ConsultarSupMenuCondominio(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominio\MenuCondominioController();
        return $controller -> ConsultarInfMenuCondominio();
    }
    
    //CADASTRAR MENU CONDOMINIO PADRAO
    public function EditarSupMenuCondominio(Request $request,$id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominio\MenuCondominioController();
        return $controller -> EditarInfMenuCondominio($request,$id);
    }
    
    public function ExcluirSupMenuCondominio($id){
        $controller = new \App\Http\Controllers\Ad();ministracaoDagoba\MenuCondominio\MenuCondominioController();
        return $controller -> ExcluirInfMenuCondominio($id);
    }
    
    //saída do sistema
    public function sair(){
        Auth::logout();
        return redirect()->intended('/');
    }
    
    //insere um novo usuario
    public function ConsultarSupUsuario(Request $request){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller ->ConsultarInfUsuario();
   
    }
    
    //insere um novo usuario
    public function ConsultarSupUsuarioFuncionario(Request $request){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller ->ConsultarInfUsuarioFuncionario();
   
    }
    
    //insere um novo usuario
    public function CadastrarSupUsuario(Request $request){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller ->CadastrarInfUsuario($request);
   
    }
    
    //insere um novo usuario
    public function CadastrarSupUsuarioFuncionario(Request $request){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller ->CadastrarInfUsuarioFuncionario($request);
   
    }
    
    public function EditarSupUsuario(Request $request,$id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller ->EditarInfUsuario($request,$id);
   
    }
    
    public function DetalharSupUsuario(Request $request,$id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> DetalharInfUsuario($id);
   
    }
    
    public function SuspenderSupUsuario($id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> SuspenderInfUsuario($id);
   
    }
    
    public function AtivarSupUsuario($id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> AtivarInfUsuario($id);
   
    }
    
    public function ExcluirSupUsuario($id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> ExcluirInfUsuario($id);
   
    }
    
    public function ConsultarSupEnvioEmailUsuario(){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> ConsultarInfEnvioEmailUsuario();
   
    }
    
    public function EnviarSupEmailUsuario(){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> EnviarInfEmailUsuario();
   
    }
    
    public function ConsultarSupREEnvioEmailUsuario(){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller ->ConsultarInfReEnvioEmailUsuario();
   
    }
    
    public function ConsultarSupInativarUsuario(){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> ConsultarInfInativarUsuario();
   
    }
    
     public function InativarSupEmailUsuario($id,$id2){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Usuario\UsuarioController();
        return $controller -> InativarInfEmailUsuario($id,$id2);
   
    }
    
    //CADASTRAR CONDOMINIO
    public function CadastrarSupCondominio(Request $request){        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();
        return $controller -> CadastrarInfCondominio($request);
    }
    
    //CONSULTAR CONDOMINIO
    public function ConsultarSupCondominio(){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();
        return $controller -> ConsultarInfCondominio();
    }
    
    //DETALHAR CONDOMINIO
    public function DetalharSupCondominio($id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();
        return $controller -> DetalharInfCondominio($id);
    }
    
    //Editar CONDOMINIO
    public function EditarSupCondominio(Request $request,$id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();        
        return $controller -> EditarInfCondominio($request,$id);
    }
    
    //Suspender CONDOMINIO
    public function SuspenderSupCondominio($id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();
        return $controller -> SuspenderInfCondominio($id);
    }
    
     //Ativar CONDOMINIO
    public function AtivarSupCondominio($id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();
        return $controller -> AtivarInfCondominio($id);
    }
    
      //Ativar CONDOMINIO
    public function AtivarBlocosSupCondominio($id){        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();
        return $controller -> AtivarBlocosInfCondominio($id);
    }
    
     //Editar CONDOMINIO
    public function CadastrarBlocosSupCondominio(Request $request,$id){
        echo "teste";
        $controller = new \App\Http\Controllers\AdministracaoDagoba\Condominio\CondominioController();        
        return $controller -> CadastrarBlocosInfCondominio($request,$id);
    }
    
    //CARTÃO DE ESTACIONAMENTO
    public function ConsultarSupCartaoEstacionamento($id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\CartaoEstacionamento\CartaoEstacionamentoController();
        return $controller ->ConsultarInfCartaoEstacionamento($id);
    }
    
    public function CadastrarSupCartaoEstacionamento(Request $request,$id){
        
        $controller = new \App\Http\Controllers\AdministracaoDagoba\CartaoEstacionamento\CartaoEstacionamentoController();
        return $controller -> CadastrarInfCartaoEstacionamento($request,$id);
    }
    
    public function ConsultarSupFAQ(){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\FAQ\FAQController();
        return $controller -> ConsultarSupFAQ();
    }
    
    public function CadastrarSupFAQ(Request $request){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\FAQ\FAQController();
        return $controller ->CadastrarInfFAQ($request);
    }
    
    public function DetalharSupFAQ($id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\FAQ\FAQController();
        return $controller ->DetalharInfFAQ($id);
    }
    
    public function EditarSupFAQ(Request $request,$idFAQ){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\FAQ\FAQController();
        return $controller -> EditarInfFAQ($request, $idFAQ);
    }
    
    public function ExcluirSupFAQ($id){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\FAQ\FAQController();
        return $controller -> ExcluirInfFAQ($id);
    }
    
    
    //REALIZACAO DE AJUSTES NO BANCO DE DADOS
    public function AjusteSupBanco(){
        $controller = new \App\Http\Controllers\AdministracaoDagoba\AjusteBanco\AjusteBanco();
        return $controller ->AjustesNoBanco();
    }
    
    //REALIZACAO DE AJUSTES NO BANCO DE DADOS
    public function ApagarSupFolga(){
        $controller = new \App\Http\Controllers\Master\RH\Ocorrencia\OcorrenciaController();
        $controller -> ApagarInfOcorrencia(); 
        
        return $this -> AjusteSupBanco();
    }
}    