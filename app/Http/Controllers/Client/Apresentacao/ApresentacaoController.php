<?php

namespace App\Http\Controllers\Client\Apresentacao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;

class ApresentacaoController extends Controller
{
     //EXIBIRÁ AS NOTÍCIAS OU O DASHBOARD
    public function ConsultarInfApresentacao($opcaoTela, $opcaoFuncao, $id, Request $request){         
        
        $resp = "";
        $caminho = "";
        $linha = "";
        $pagina = "";
        $criterio = "";
        $totalVeiculos = 0;
        $totalVagas = 0;
        $totalVagasAlugadas = 0;
        $titulo = "";
        
        $data = array();
        $menuItem = array();
        $data1 = array();
        
        //CLASSSES
        $util = new \App\Util\Util();
        $caminhoFisico = new \App\Models\CaminhoFisico();
        $seguranca = $caminhoFisico -> getCaminhoFisico("SEG");
        $controleTela = $caminhoFisico -> getCaminhoFisico("TELA");
        //$operacionalController = $caminhoFisico -> getCaminhoFisico("OPE");
        $noticiasController = $caminhoFisico -> getCaminhoFisico("NOT");
        
        
        $pagina = 'cliente.noticias.noticias';   
            
        
        $data["cardMorador"] = "";
        $data["pageHeader"] = "";
        $data["not"] = "";
        $data["aut"] = "";
        $data["telaConsulta"] = "";
        $data["projeto"] = "";
        $data["praxos_icone"] = "";
        $data["logo"] = "";
        
        //$data = $util->DataArray($data);
        
        //CHAMA O MÓDULO DE NOTICIAS
        return view($pagina, $data);
        
    }
}
