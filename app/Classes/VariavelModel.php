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
 * Description of VariavelModel
 *
 * @author Celia Regina
 */
class VariavelModel {
    
    public function VariavelModel(){

    }
       
    public function insereVariavel($idCondominio,$idUsuario,$nome_variavel,$valor){ 
        
        $variavel = new \App\Variavel();
        $variavel -> CmpVariavel = $nome_variavel;
        $variavel -> CmpValor = $valor;
        $variavel -> CmpStatus = 'AGU';
        $variavel -> CmpDataInclusao = date('Y-m-d H:i:s');
        
        $variavel -> condominio() -> associate($idCondominio);
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \App\Util\Util();

        /*****************************FIM HISTORICO DE OPERACOES**************************************************/
        $result = $variavel->save();
        
        $historico = new \App\Classes\HistoricoOperacaoModel();
        //$historico ->inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "VEICULO");
        $historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, "INS", "OK", "VARIAVEL");
        
        return $variavel->idvariavel;
    }
    
    /**
     * Objetivo: Existem varias variaveis, por exemplo, 
     *              pasta(o tipo que guarda onde a variavel do condominio esta)
     * @param type $idcondominio
     * @param type $tipo
     * @return type
     */
    public function ConsultaVariavel($idcondominio,$tipo) {
       // echo $tipo . " - " . $idcondominio;
        $variavel = "";
        $variavel = DB::table('variavels')
                ->where('condominio_idcondominio', $idcondominio)
                ->where('CmpVariavel', $tipo)
                ->first();
        
       /* foreach ($variavel as $item){
            
        }*/
        return $variavel->CmpValor;
    }
    
    public function ConsultaPasta() {
              
        $variavel = "";
        $variavel = DB::table('variavels')
                ->where('condominio_idcondominio', Auth::user()->condominio_idcondominio)
                ->where('CmpVariavel', "pasta")
                ->first();
        
        return $variavel->CmpValor;
    }
    
    
    
    public function Path($folderObjeto,$sigla,$tipo) {
        
        //CLASSE DE FUNCIONALIDADES UTEIS PARA O PROJETO
        $util = new \app\Util\Util();
        $entidade = $util -> DevolvePasta($sigla);
        
        $parte1 = $this ->rotaPrincipal(); //"C:/xampp/htdocs/dagoba/public/clientes/";
        
        
        if($tipo == "COMPLETO"){            
            return $parte1.$folderObjeto."/".$entidade."/";
        }else{
            return "clientes/".$folderObjeto."/".$entidade."/";
        }
        
    } 
     
    //VARIAVEIS IMPORTANTES PARA O PROJETO
    
    public function rotaPrincipal() {
        return "/home/gs2i/www/gs2i-homologacao/public/clientes/";
    }
	
	public function rotaView() {
        return "/gs2i-homologacao/public/master/";
    }
    
    public function rotaMaster() {
         return "/home/gs2i/www/gs2i-homologacao/resources/views/master/clientes/";
    }
    
    
    
}
