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
 * Description of NoticiasModel
 *
 * @author Celia Regina
 */
class NoticiasModel {
  
    public function NoticiasModel(){

    }
    
    private $codigo_condominio;
    //private $codigo_usuario;
    private $apartamento_origem;
    private $apartamento_destino;
    
    private $codigo;
    private $titulo;
    private $texto;

    //partes especificas para os documentos gerados pelo sistema.
    private $perfil;  //qual perfil que o usuario tem no sistema.
    private $tipo_objeto; //tres letras que representam o tipo de documento que fez a noticia ser inserida.
    private $objeto_noticia;

    private $codigo_objeto;  //codigo do objeto que est� sendo noticiado.
    private $categoria;
    private $redator;  //AQUELE QUE REALIZA OS COMENTARIOS
    private $imagem;
    private $idnoticia;
    private $status;
    
    //ANEXO
    private $anexo;


    //codigo condominio
    public function set_codigo_condominio($valor){
            $this->codigo_condominio = $valor;
    }
    public function get_codigo_condominio(){
            return $this->codigo_condominio;
    }

    //Apartamento Origem
    public function set_apartamento_origem($valor){
            $this->apartamento_origem = $valor;
    }
    public function get_apartamento_origem(){
            return $this->apartamento_origem;
    } 
     //Apartamento Destino
    public function set_apartamento_destino($valor){
            $this->apartamento_destino = $valor;
    }
    public function get_apartamento_destino(){
            return $this->apartamento_destino;
    } 
    //codigo usuario
    /*public function set_codigo_usuario($valor){
            $this->codigo_usuario = $valor;
    }
    public function get_codigo_usuario(){
            return $this->codigo_usuario;
    }*/


    //codigo da noticia
    public function set_codigo($valor){
            $this->codigo = $valor;
    }
    public function get_codigo(){
            return $this->codigo;
    }

    //titulo da noticia
    public function set_titulo($valor){
            $this->titulo = $valor;
    }
    public function get_titulo(){
            return $this->titulo;
    }

    //texto da noticia
    public function set_texto($valor){
            $this->texto = $valor;
    }
    public function get_texto(){
            return $this->texto;
    }


    //parte especifica

    //perfil da noticia
    public function set_perfil($valor){
            $this->perfil = $valor;
    }
    public function get_perfil(){
            return $this->perfil;
    }

    //perfil da Tipo Objeto
    public function set_tipo_objeto($valor){
            $this->tipo_objeto = $valor;
    }
    public function get_tipo_objeto(){
            return $this->tipo_objeto;
    }



    //QUAL O TIPO DE OBJETO A SER GERADA A NOTICIA.

    public function set_objeto_noticia($valor){
            $this->objeto_noticia = $valor;
    }
    public function get_objeto_noticia(){
            return $this->objeto_noticia;
    }

    //NESSE CASO, PODE SER DOCUMENTO, PROPOSTA ORCAMENTARIA.
    //O IMPORTANTE � O C�DIGO PASSADO.

    public function set_codigo_objeto($valor){
            $this->codigo_objeto = $valor;
    }
    public function get_codigo_objeto(){
            return $this->codigo_objeto;
    }
    public function get_categoria(){
            return $this->categoria;
    }
    public function set_categoria($param){
            return $this->categoria = $param;
    }
    
    //
    public function get_categoria_noticia(){
            return $this->categoria_idcategoria;
    }
    public function set_categoria_noticia($param){
            return $this->categoria_idcategoria = $param;
    }
    
    //redator
    public function get_redator(){
            return $this->redator;
    }
    public function set_redator($param){
            return $this->redator = $param;
    }
    
    //imagem
    public function get_imagem(){
            return $this->imagem;
    }
    public function set_imagem($param){
            return $this->imagem = $param;
    }
    
     //codigo condominio
    public function setAnexo($valor){
            $this->anexo = $valor;
    }
    public function getAnexo(){
            return $this->anexo;
    }
    
    //codigo condominio
    public function set_idNoticia($valor){
            $this->idnoticia = $valor;
    }
    public function get_idNoticia(){
            return $this->idnoticia;
    }
    
    //codigo condominio
    public function setStatus($valor){
            $this->status = $valor;
    }
    public function getStatus(){
            return $this->status;
    }
    
    //MOSTRA DE NOTICIAS.
    public function exibe_noticias($util,$codigo_condominio,$search){

        $str = "";
        $complemento = "";

         $results = DB::table('noticias')
                        ->join('menu_links', 'menu_condominio_padraos.menu_link_idmenu_link', '=', 'menu_links.idmenu_link')                        
                        ->select('menu_condominio_padraos.*', 'menu_links.*')
                        ->where('menu_condominio_padraos.plano_idplano', '=', $idplano)                        
                        ->get();
         
        $link_condominio = $this->recupera_link_condominio($codigo_condominio);
        $pasta = $this->recuperaPastaCondominio($codigo_condominio);

        if($search != "") $complemento = " AND texto like '".$search."'";


        $query_texto4=@mysql_query("SELECT CmpTitulo, CmpTexto, perfil_id, CmpTipoObjeto, CmpCodigoObjeto, CmpDataInclusao, u.codigo_usuario
                                                                FROM noticias n, usuario u
                                                                WHERE n.codigo_usuario = u.codigo_usuario
                                                                AND u.codigo = '".$codigo_condominio."'
                                                                ".$complemento."
                                                                ORDER BY data DESC");

                while($dados = mysql_fetch_assoc($query_texto4)){

                        if($dados["tipo_objeto"] == "doc"){
                                $icone = "../../arte_visual/img/documentos.jpg";
                                $titulo = "Novo Documento";

                                $url = "index.php?page=".$util->seguranca_link_pagina('doc',$codigo_condominio)."&val=".$util->encode($dados["codigo_objeto"]);
                        }
                        if($dados["tipo_objeto"] == "por"){
                                $icone = "../../arte_visual/img/orcamento.jpg";
                                $titulo = "Novo Orçamento";
                                $url = "index.php?page=".$util->seguranca_link_pagina('depo',$codigo_condominio)."&val=".$util->encode($dados["codigo_objeto"])."&val2=".$util->encode("s");;

                        }

                        $nome_usuario = $this->recupera_usuario_nome($dados["codigo_usuario"],$codigo_condominio);


                        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');


                        $str = $str . "<h2>
                                                                        <a href='".$url."'>".$titulo."</a>
                                                                </h2>
                                                                <p class='lead'>
                                                                        por <a href='index.php'>".$nome_usuario."</a>
                                                                </p>
                                                                <p><i class='fa fa-clock-o'></i> Postado ".strftime('%A, %d de %B de %Y', strtotime('today'))."</p>
                                                                <hr>
                                                                <center><a href='blog-post.html'>
                                                                        <img class='img-responsive img-hover' src='".$icone."' alt=''>
                                                                </a></center>
                                                                <hr>
                                                                <p>".$dados["texto"].".</p>

                                                                <a class='btn btn-primary' href='#'>Leia mais <i class='fa fa-angle-right'></i></a>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span ><a href='#' title='Ver Comentários'>0 Commentários</a></span><br>
                                                                <hr> ";


                        }

                return $str;




    }
    
    //GERACAO DE INFORMAÇÃO DE NOTICIAS DO SITE.

	public function gera_noticias($objeto_noticia){

            $situacao = "OK";
            $titulo_noticia = "";
            $texto_noticia = "";

            //PARA O CASO DE DOCUMENTOS
            if($objeto_noticia->get_objeto_noticia() == "doc"){

                    $tipodocumento = $objeto_noticia -> get_tipo_documento();

                    if($tipodocumento == 2) $tipo = "Procedimentos";
                    if($tipodocumento == 3) $tipo = "ATA";
                    if($tipodocumento == 4) $tipo = "Regulamento";
                    if($tipodocumento == 5) $tipo = "Balancete";
                    if($tipodocumento == 6) $tipo = "Previsão Orçamentária";
                    if($tipodocumento == 7) $tipo = "Convenção";
                    if($tipodocumento == 9) $tipo = "Obra";
                    if($tipodocumento == 10) $tipo = "Edital";
                    if($tipodocumento == 11) $tipo = "Gastos do Mês";
                    if($tipodocumento == 12) $tipo = "Outros";


                    $titulo_noticia = " Novo(a) " . $tipo;
                    $texto_noticia = " Um(a) novo(a) ". $tipo . " foi inserido(a)! Vale a pena conferir e se informar sobre o assunto!";
            }

            //PARA O CASO DE PROPOSTA ORCAMENTARIA
            if($objeto_noticia->get_objeto_noticia() == "por"){

                    $titulo_noticia = "<center> Nova Proposta Orçamentária </center>";
                    $texto_noticia = " Um(a) novo(a) ". $tipo . " foi inserido(a)! Vale a pena conferir e se informar sobre o assunto!";

            }

            $query = "INSERT INTO noticias(codigo,codigo_usuario,titulo,texto,tipo_objeto,codigo_objeto,data,status) ";
            $query = $query ."VALUES('".$objeto_noticia->get_codigo()."','".$objeto_noticia->get_codigo_usuario()."','".$titulo_noticia."','".$texto_noticia."','".$objeto_noticia->get_objeto_noticia()."','".$objeto_noticia->get_codigo_objeto()."','".date("Y-m-d H:m:i")."','ATV')";



            if (@mysql_query($query)) {

                    //$conn->rollback();

                    //faz o registro das tentativas no historico

            }else{

                    $situacao = "NOK";

            }



            return $situacao;



	}
        
        //NOTÍCIAS 
        public function insereNoticias(){
        
            $util = new \App\Util\Util();
            $noticias = new \App\noticias();

            $noticias -> CmpTitulo = $this->get_titulo();
            $noticias -> CmpTexto = $this->get_texto();
            $noticias -> CmpTipoObjeto = $this->get_tipo_objeto();
            $noticias -> CmpCodigoObjeto = $this->get_codigo_objeto();
            
            if($noticias -> CmpTipoObjeto == "DOC")
                $noticias -> categoria_idcategoria = $this->get_categoria_noticia();
            
            $noticias -> CmpDataInclusao = date('Y-m-d H:i:s');
            
            if($this->getStatus() != "ATV" && $this->getStatus() != ""){
                $noticias -> CmpStatus = $this->getStatus();
            }else{
                $noticias -> CmpStatus = "ATV";
            }    
            $noticias -> CmpAnexo = $this ->getAnexo();
            $noticias -> CmpRedator = $this->get_redator();
            $noticias -> CmpImagem = $this ->get_imagem();
            //RELACIONAMENTO COM O CONDOMINIO
            $noticias -> condominio() -> associate($this->get_codigo_condominio()); 
            //$noticias -> apartamento_origem() -> associate($this->get_apartamento_origem()); 
            //$noticias -> apartamento_destino() -> associate($this->get_apartamento_destino()); 
            
                          

            //REALIZA O COMMIT DA OPERACAO
            $result = $noticias -> save(); 
           /* $historico = new HistoricoOperacaoModel();
            $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "FORNECEDOR");
            */
            return $noticias -> idnoticias;         
        }
        
        //NOTÍCIAS 
        public function insereNoticiasMorador(){
        
            $util = new \App\Util\Util();
            $noticias = new \App\noticias();
            
            $noticias -> CmpTitulo = $this->get_titulo();
            $noticias -> CmpTexto = $this->get_texto();
            $noticias -> CmpTipoObjeto = $this->get_tipo_objeto();            
            
            $noticias -> CmpDataInclusao = date('Y-m-d H:i:s');
            $noticias -> CmpStatus = "ATV";
            $noticias -> CmpRedator = $this -> get_redator();
            $noticias -> CmpImagem = $this -> get_imagem();
            $noticias -> idnoticiasrelacionado = $this ->get_idNoticia();
            $noticias -> CmpAnexo = $this ->getAnexo();
            
            //RELACIONAMENTO COM O CONDOMINIO
            $noticias -> condominio() -> associate($this->get_codigo_condominio()); 
            //$noticias -> apartamento_origem() -> associate($this->get_apartamento_origem()); 

            //REALIZA O COMMIT DA OPERACAO
            $result = $noticias -> save(); 
           /* $historico = new HistoricoOperacaoModel();
            $historico -> inserehistorico($util->geraNumeroAleatorio(), $idUsuario, $result, "FORNECEDOR");
            */
            return $noticias -> idnoticias;         
        }
        
    //EXCLUIR REFATORADO
    public function ExcluirAnexoNoticias($idDonoAnexo, $sigla){ //COM DOIS PARÂMETROS
    
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idDonoAnexo_decripto = $seguranca->decripto($idDonoAnexo);
        
        //INÍCIO DA TRANSAÇÃO DO BANCO
        DB::beginTransaction();
        try {
            
                DB::table('noticias')
                            ->where('CmpCodigoObjeto', $idDonoAnexo_decripto)
                            ->where('condominio_idcondominio', Auth::user()->condominio_idcondominio)
                            ->where('CmpTipoObjeto', $sigla)
                            ->update(array('CmpStatus' => 'CAN'));               

                
                $historico = new HistoricoOperacaoModel();
                //$historico -> inserehistoricoOperacao($util->geraNumeroAleatorio(), Auth::user()->idusuario, $result, "ANEXO");
                //inserehistoricoOperacao($registro_operacao,$usuario,$operacao,$resultado_operacao,$mensagem_padrao)
               
                DB::commit();
                    
                return "SUC_EXC_NOT";

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
            return "ERR_EXC_NOT"; //ERRO DE INSERCAO DE DOCUMENTO
        } 
    }    
}
