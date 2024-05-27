<?php

namespace App\Http\Controllers\Admin\Negocio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Hash;
use Auth;

class NegocioController extends Controller
{
    public function ConsultarInfNegocio() {

        $caminho = new \App\Models\CaminhoFisico();// ORIGEM DE TODOS OS CAMINHOS
        $labels = new \App\Models\Labels();
        
        $data = array();
        $util = $caminho ->getCaminhoFisico("UTIL");        
        $listaOficina = $caminho ->getCaminhoFisico("OFILIST"); 
        
        
        obS: Montar uma tela para consultar
        //formatacao da lista
        foreach($listaOficina as $item){
           $status = $item -> CmpStatus;
          // $item -> CmpStatus = $util->gridCondominioMsg($status); 
           $item -> CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item ->CmpDataInclusao);
        }
        
        $data["listaOficina"] = $listaOficina;
        
        //LABEL'S DA PAGINA
        $data["CONSULTOFI"] = $labels ->getLabels("CONSULTOFI");
              
        //RETORNA PARA A VISÃO.
        return view('consultar', $data);
    }
    
    public function DetalharInfNegocio($id) {
        
        $data = array();
        $caminho = new \App\Models\CaminhoFisico();// ORIGEM DE TODOS OS CAMINHOS
        $labels = new \App\Models\Labels();
        
        $controleTela = $caminho ->getCaminhoFisico("TELA");       
              
        $data = $controleTela -> MontarTelaNegociosDetalhar($id);
         
        //RETORNA PARA A VISÃO.
        return view('administracaoDagoba.condominio.DetalharCondominio', $data);
    }
    
    public function EditarInfNegocio(Request $request, $idNegocio) {
        
        /*
         * ideia. cupom de desconto. o Usuário oara reservar e obter o desconto, paga um valor simbólico para o site.
         * 
         * 
         */
        $data = array();
        $util = new \App\Util\Util();
        
        $condominio = new \App\Classes\CondominioModel(); 
        $anexoController = new \App\Http\Controllers\Anexo\AnexoController();
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $data = $condominio -> EditarCondominio($request, $idCondominio);  
       
        //REALIZA O ACOMPANHAMENTO DO HISTORICO DE OPERAÇÃO
        $historico = new \App\Classes\HistoricoOperacaoModel();
        
        
        if ($request->isMethod("post")) {
                      
            
        }
        
        //Edição        
        return view('admin.negocio.EditarNegocio', $data);
    }
    
    //insere um novo condominio
    public function CadastrarInfNegocio(Request $request){
        
        //ARRAY
        $data = array();
        $caminho = new \App\Models\CaminhoFisico();// ORIGEM DE TODOS OS CAMINHOS
        $labels = new \App\Models\Labels();
        
        $controleTela = $caminho ->getCaminhoFisico("TELA");
        $data = $controleTela -> MontarTelaNegociosCadastrar();        
        $util = $caminho ->getCaminhoFisico("UTIL");
        $negocio = $caminho ->getCaminhoFisico("OFIMODEL");
        
        //LABEL'S DA PAGINA
        $data["CADOFI"] = $labels ->getLabels("CADOFI");
        
        if ($request->isMethod("post")) {
            if($negocio ->InserirNegocio($request) != "NOK"){
               return redirect()->back()->with('success', 'Negócio Inserido com sucesso'); 
            }else{
                return redirect()->back()->with('danger', 'Negócio não inserido com sucesso!');
            }
        }
        
        return view('admin.negocio.CadastrarNegocio', $data);
        
       
    }
    
   
   
}