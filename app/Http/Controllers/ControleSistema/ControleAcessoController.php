<?php

namespace App\Http\Controllers\ControleSistema;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Hash;
use Auth;

class ControleAcessoController extends Controller
{
    public function consultarControleAcesso($idMenulink, $idFuncionalidadeOrigem)
    { 
                
        return $results = DB::table('controle_acessos')
                        ->select('controle_acessos.*')                        
                        ->where('controle_acessos.perfil_idperfil', '=', Auth::user() -> perfil_idperfil)
                        ->where('controle_acessos.menu_link_idmenu_link', '=', $idMenulink)
                        ->where('controle_acessos.funcionalidadeOrigem', '=', $idFuncionalidadeOrigem)
                        ->get();
        
       
    }
    
    
    public function consultarControleAcessoNovo($idMenulinkSecao, $idFuncionalidadeOrigem)
    {              
       
       return $results = DB::table('controle_acessos')
                        ->join('menu_links', 'controle_acessos.CmpPage', '=', 'menu_links.CmpPage') 
                        ->select('menu_links.*','controle_acessos.*')         
                        ->where('controle_acessos.perfil_idperfil', '=', Auth::user() -> perfil_idperfil)
                        ->where('controle_acessos.CmpStatus', '=', 'ATV')
                        ->where('menu_links.CmpStatus', '=', 'ATV')
                        ->where('menu_links.CmpPage', '=', $idMenulinkSecao)
                        ->where('controle_acessos.funcionalidadeOrigem', '=', $idFuncionalidadeOrigem)
                        ->get();
               
    }
    
    public function montarControleAcesso($idMenulink,$idFuncionalidadeOrigem)
    {
        $data = array();
        
        $data["botaoCadastrar"] = "N";
        $data["botaoDetalhar"] = "N";
        $data["botaoEditar"] = "N"; 
        $data["botaoExcluir"] = "N";
        $data["botaoCriar"] = "N";
        $data["botaoAprovar"] = "N";        
        $data["botaoDetalharAnexo"] = "N";
        
        $resultados = $this ->consultarControleAcesso($idMenulink, $idFuncionalidadeOrigem);
        
        foreach($resultados as $item){
            
            if($item -> funcionalidadeDestino == "cad" && $item -> CmpVisibilidade == "S"){
                $data["botaoCadastrar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "det" && $item -> CmpVisibilidade == "S"){
                $data["botaoDetalhar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "cri" && $item -> CmpVisibilidade == "S"){
                $data["botaoCriar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "edi" && $item -> CmpVisibilidade == "S"){
                $data["botaoEditar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "exc" && $item -> CmpVisibilidade == "S"){
                $data["botaoExcluir"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "dan" && $item -> CmpVisibilidade == "S"){
                $data["botaoDetalharAnexo"] = "S";                
            } 
            
            if($item -> funcionalidadeDestino == "apr" && $item -> CmpVisibilidade == "S"){
                $data["botaoAprovar"] = "S";                
            }
            
        }
        
        return $data;
    }
    
    
    //PARTE NOVA
     public function montarControleAcessoNovo($idMenulinkSecao,$idFuncionalidadeOrigem)
    {
                 
        $data = array();
        
        $data["botaoCadastrar"] = "N";
        $data["botaoDetalhar"] = "N";
        $data["botaoEditar"] = "N"; 
        $data["botaoExcluir"] = "N";
        $data["botaoCriar"] = "N";
        $data["botaoAprovar"] = "N";        
        $data["botaoDetalharAnexo"] = "N";
        $data["botaoSolucionar"] = "N";
        $data["botaoConfirmar"] = "N";
        
        $resultados = $this -> consultarControleAcessoNovo($idMenulinkSecao, $idFuncionalidadeOrigem);
        
        foreach($resultados as $item){
            
            if($item -> funcionalidadeDestino == "cad" && $item -> CmpVisibilidade == "S"){
                $data["botaoCadastrar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "det" && $item -> CmpVisibilidade == "S"){
                $data["botaoDetalhar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "cnf" && $item -> CmpVisibilidade == "S"){
                $data["botaoConfirmar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "cri" && $item -> CmpVisibilidade == "S"){
                $data["botaoCriar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "edi" && $item -> CmpVisibilidade == "S"){
                 $data["botaoEditar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "exc" && $item -> CmpVisibilidade == "S"){
                $data["botaoExcluir"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "dan" && $item -> CmpVisibilidade == "S"){
                $data["botaoDetalharAnexo"] = "S";                
            } 
            
            if($item -> funcionalidadeDestino == "apr" && $item -> CmpVisibilidade == "S"){
                $data["botaoAprovar"] = "S";                
            }
            
            if($item -> funcionalidadeDestino == "sol" && $item -> CmpVisibilidade == "S"){
                $data["botaoSolucionar"] = "S";                
            }
            
            
        }
            
        //echo " -  " . $data["botaoCadastrar"] ." - " . $data["botaoDetalhar"]." -  " . $data["botaoConfirmar"]." -  " . $data["botaoCriar"]." -  " . $data["botaoEditar"]." -  " . $data["botaoExcluir"];
        return $data;
    }
    
}
