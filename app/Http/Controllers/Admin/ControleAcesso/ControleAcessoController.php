<?php

namespace App\Http\Controllers\AdministracaoDagoba\ControleAcesso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControleAcessoController extends Controller
{
    public function ConsultarInfControleAcesso(){
        
        $data = array();
        
        $controleAcesso = new \App\Classes\ControleAcessoModel();
        $data["listaControleAcesso"] = $controleAcesso ->ConsultarControleAcesso();
        
        
        return view('administracaoDagoba.controleAcesso.ConsultarControleAcesso', $data);
    }
    
    public function CadastrarInfControleAcesso(Request $request){
        
        $data = array();
        //MENU LINK
        $listaMenuLink = \App\Menu_link::all();
        $data["listaMenuLink"] =  $listaMenuLink;
        
        $listaplano = \App\plano::all();
        $data["listaplano"] = $listaplano;
        
        $listaPerfil = \App\Perfil::all();
        $data["listaPerfil"] = $listaPerfil;
        
        $listaFuncionalidades = \App\Funcionalidade::all();
        $data["listaFuncionalidades"] = $listaFuncionalidades;
        
        if($request->isMethod("POST")){

            $controleAcesso = new \App\ControleAcesso($request->all());
            
            $controleAcesso -> CmpVisibilidade = $request->input("visibilidade");
            $controleAcesso -> CmpStatus = "ATV";
            
            $menu_link = new \App\Menu_link();
            $menu_link->idmenu_link = $request->input("menu_link");
            //Relacionar
            $controleAcesso->menu_link()->associate($menu_link);
            
            /*$plano = new \App\plano();
            $plano->idplano = $request->input("plano");
            //Relacionar
            $controleAcesso->plano()->associate($plano);*/
            
            $perfil = new \App\perfil();
            $perfil->idperfil = $request->input("perfil");
            //Relacionar
            $controleAcesso->perfil()->associate($perfil);
            
            /*$funOrigem = new \App\Funcionalidade();
            $funOrigem->idfuncionalidades = $request->input("funOrigem");
            //Relacionar
            $controleAcesso->funcionalidade_origem()->associate($funOrigem);*/
            $controleAcesso -> funcionalidadeOrigem = $request->input("funOrigem");
            $controleAcesso -> funcionalidadeDestino = $request->input("funDestino");
            /*$funDestino = new \App\Funcionalidade();
            $funDestino->idfuncionalidades = $request->input("funDestino");
            //Relacionar
            $controleAcesso->funcionalidade_destino()->associate($funDestino);*/
            
            $controleAcesso->save();
        }
        
        return view('administracaoDagoba.controleAcesso.CadastrarControleAcesso', $data);
    }
    
    public function EditarInfControleAcesso(Request $request,$id){
        
        $data = array();
        
        //CLASSE UTIL
        $util = new \App\Util\Util();
        
        //CONTROLE DE TELA
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
       
        $controleAcesso = new \App\Classes\ControleAcessoModel();        
        $menuLista = $controleAcesso -> ConsultarControleAcessoPorId($id);
		        
        foreach($menuLista as $menu){
            
            $data["menuLink"] =  $menu -> CmpTitulo;

            //VISAO MORADOR
            $data["funOrigem"] = $menu -> funcionalidadeOrigem;
            
            //VISAO MORADOR
            $data["funDestino"] = $menu -> funcionalidadeDestino;
            
            $data["page"] = $menu -> CmpPage;
            
            $data["perfil"] = $menu -> CmpDescricao;
            
            //VISAO PORTARIA
            $data["visibilidade"] = $controleTela -> MontarCombosSIM_NAO($menu -> CmpVisibilidade);
            
            
        }    
        //ID DO MENU CONDOMINIO PADRÃO
        $data["id"] = $id;
        
     
        if($request->isMethod("POST")){
            //Adicionar os dados do form
            $controleAcesso = new \App\Classes\ControleAcessoModel();
              
            //echo $request->input("visibilidade");
            $controleAcesso -> UpdateControleAcesso($request, $id);
            
            return $this->ConsultarInfControleAcesso();
            
        }
        
        return view('administracaoDagoba.controleAcesso.EditarControleAcesso', $data);
    }
    
    public function ExcluirInfMenuCondominio($id){
        
        $menuCondominioLista = new \App\Classes\MenuCondominioModel();
        $menuCondominioLista ->ExcluirMenuCondominio2($id);
         
        return $this->ConsultarInfMenuCondominio();
    }
}