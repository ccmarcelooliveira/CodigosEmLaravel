<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\Util;

/**
 * Description of Parametros
 *
 * @author Celia Regina
 */
class Parametros {
    //put your code here
    
    //CARGA DO MENU
    //private $ativo;
    private $documento;   
    private $comunicacao;
    private $condominio;
    private $financeiro;
    private $relatorio;
    private $manutencao;
    private $apresentacao;
    private $emergencia;    
    private $programacao;
    private $carga_dados;
    private $seguranca;
    private $vigilancia;
    private $recursosHumanos;
    private $aquisicao;
    private $pets;
    private $ecomerce;
    private $bemestar;
    private $campanhas;
    private $parceiroApoiadores;
    private $sensores;
    private $analitico;
    private $vendas;
    private $dataMining;
    private $gamification;
    private $cargaDados;
    private $minhaConta;
    
    
    private $nome_condominio;
   
    //PARA A GERACAO DE NOTÍCIAS
    private $tipoDocumento; //a estratificação dos vários documentos.
    private $tipoObjeto;  //se é um DOC, CLA, FIN etc.
    private $titulo;
    private $texto;
    private $idObjeto;
    private $idusuario;
    private $idcondominio;
    private $categoria_documento;
    private $categoria_idcategoria;
    private $apartamento_origem;
    private $apartamento_destino;
    
    //PARA O LIMITE DASHBOARD.
    private $limiteInferior;
    private $limiteSuperior;
    
    //SOLICITACAO
    private $codigoUnico;
    private $descricao;
    private $categoriaSolicitacao;
    private $dataInclusao;
    private $idApartamento;
    
    private $nomeSubconta;   
    private $classificacao;
    
    private $idconta;    
    private $sigilo; 
    private $temFoto;
    private $anexo;
    private $status;
    
    //CONTROLE DE MENUS
    private $menu1;
    private $menu2;
    private $menu3;
    
    private $perfil;
    private $plano;
    private $link;    
    private $caminho;

    private $numVagaCarro;
    private $numVagaMoto;
    private $numVagaBicicleta;


    public function Parametros() {
        
    }
    
   /* //CADASTRO 
    public function getAtivo() {
        return $this->ativo;
    }
    
    public function setAtivo($param) {
        $this->ativo = $param;
    }*/

    //CONDOMINIO
    public function getDocumento() {
        return $this->documento;
    }
    
    public function setDocumento($param) {
        $this->documento = $param;
    }

    //RELATORIO
    public function getComunicacao() {
        return $this->comunicacao;
    }
    
    public function setComunicacao($param) {
        $this->comunicacao = $param;
    }

    //AVISO
    public function getCondominio() {
        return $this->condominio;
    }
    
    public function setCondominio($param) {
        $this->condominio = $param;
    }
    
       
    //ARQUIVO
    public function getFinanceiro() {
        return $this->financeiro;
    }
    
    public function setfinanceiro($param) {
        $this->financeiro = $param;
    }
    
    //FINANCEIRO
    public function getRelatorio() {
        return $this->relatorio;
    }
    
    public function setRelatorio($param) {
        $this->relatorio = $param;
    }
    
    //APRESENTACAO
    public function getApresentacao() {
        return $this->apresentacao;
    }
    
    public function setApresentacao($param) {
        $this->apresentacao = $param;
    }
    
    //PAGINA EXTERNA
    public function getEmergencia() {
        return $this->emergencia;
    }
    
    public function setEmergencia($param) {
        $this->emergencia = $param;
    }
   
    //MANUTENCAO
    public function getManutencao() {
        return $this->manutencao;
    }
    
    public function setManutencao($param) {
        $this->manutencao = $param;
    }
   
    //MANUTENCAO
    public function getProgramacao() {
        return $this->programacao;
    }
    
    public function setProgramacao($param) {
        $this->programacao = $param;
    }
  
     //CARGA DE DADOS
    public function getCargaDados() {
        return $this->carga_dados;
    }
    
    public function setCargaDados($param) {
        $this->carga_dados = $param;
    }
    
     //SEGURANCA
    public function getSeguranca() {
        return $this->seguranca;
    }
    
    public function setSeguranca($param) {
        $this->seguranca = $param;
    }
  
    //VIGILANCIA
    public function getVigilancia() {
        return $this->vigilancia;
    }
    
    public function setVigilancia($param) {
        $this->vigilancia = $param;
    }
   
    //RECURSOS HUMANOS
    public function getRecursosHumanos() {
        return $this->recursosHumanos;
    }
    
    public function setRecursosHumanos($param) {
        $this->recursosHumanos = $param;
    }
    
    
    //AQUISICAO
    public function getAquisicao() {
        return $this->aquisicao;
    }
    
    public function setAquisicao($param) {
        $this->aquisicao = $param;
    } 
    
    // PARCEIROS APOIO
    public function getParceirosApoio() {
        return $this->parceiroApoiadores;
    }
    
    public function setParceirosApoio($param) {
        $this->parceiroApoiadores = $param;
    } 
   
    //PETS
    public function getPets() {
        return $this->pets;
    }
    
    public function setPets($param) {
        $this->pets = $param;
    }
    
    //E-COMERCE
    public function getEComerce() {
        return $this->ecomerce;
    }
    
    public function setEComerce($param) {
        $this->ecomerce = $param;
    }
  
    //BEM ESTAR
    public function getBemEstar() {
        return $this->bemestar;
    }
    
    public function setBemEstar($param) {
        $this->bemestar = $param;
    }
    
    //CAMPANHAS
    public function getCampanhas() {
        return $this->campanhas;
    }
    
    public function setCampanhas($param) {
        $this->campanhas = $param;
    }
  
    //PARCEIROS E APOIADORES
    public function getParceirosApoiadores() {
        return $this->parceirosApoiadores;
    }
    
    public function setParceirosApoiadores($param) {
        $this->parceirosApoiadores = $param;
    }
    
    //SENSORES
    public function getSensores() {
        return $this->sensores;
    }
    
    public function setSensores($param) {
        $this->sensores = $param;
    }
  
    //ANALÍTICO
    public function getAnalitico() {
        return $this->analitico;
    }
    
    public function setAnalitico($param) {
        $this->analitico = $param;
    }
    
    //VENDAS
    public function getVendas() {
        return $this->vendas;
    }
    
    public function setVendas($param) {
        $this->vendas = $param;
    }
    
     //DATAMINIG
    public function getDataMining() {
        return $this->dataMining;
    }
    
    public function setDataMinig($param) {
        $this->dataMining = $param;
    }
    
    //GAMIFICATION
    public function getGamification() {
        return $this->gamification;
    }
    
    public function setGamification($param) {
        $this->gamification = $param;
    }
    
     //MINHA CONTA
    public function getMinhaConta() {
        return $this->minhaConta;
    }
    
    public function setMinhaConta($param) {
        $this->minhaConta = $param;
    }
    
    
    //NOME CONDOMINIO
    public function getNomeCondominio() {
        return $this->nome_condominio;
    }
    
    public function setNomeCondominio($param) {
        $this->nome_condominio = $param;
    }
    
    
    //GERAÇÃO DE NOTÍCIAS
    
    //TIPO DOCUMENTO
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }
    
    public function setTipoDocumento($param) {
        $this->tipoDocumento = $param;
    }
    
    //Tipo Objeto
    public function getTipoObjeto() {
        return $this->tipoObjeto;
    }
    
    public function setTipoObjeto2($extensao) {        
        $this->tipoObjeto = $extensao;
    }
        
    public function setTipoObjeto($param) {
        $extensao =  str_replace('.', '', $param);   
        $this->tipoObjeto = $extensao;
    }
     
    //TITULO
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function setTitulo($param) {
        $this->titulo = $param;
    }
        
    //TEXTO
    public function getTexto() {
        return $this->texto;
    }
    
    public function setTexto($param) {
        $this->texto = $param;
    }
    
    //ID DOCUMENTO
    public function getIdObjeto() {
        return $this->idObjeto;
    }
    
    public function setIdObjeto($param) {
        $this->idObjeto = $param;
    }

    //APARTAMENTO ORIGEM
    public function setApartamentoOrigem($param){
        $this->apartamento_origem = $param;
    }
    
    public function getApartamentoOrigem(){
        return $this->apartamento_origem;
    }
    
    //APARTAMENTO DESTINO
    public function setApartamentoDestino($param){
        $this->apartamento_destino = $param;
    }
    
    public function getApartamentoDestino(){
        return $this->apartamento_destino;
    }
    
    //ID Usuario
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    
    public function setIdUsuario($param) {
        $this->idUsuario = $param;
    }

    //ID Condominio
    public function getIdCondominio() {
        return $this->idCondominio;
    }
    
    public function setIdCondominio($param) {
        $this->idCondominio = $param;
    }
  
    //Categoria do Documento
    public function getCategoriaDocumento() {
        return $this->categoria_documento;
    }
    
    public function setCategoriaDocumento($param) {
        $this->categoria_documento = $param;
    }
    
    //Categoria do Documento
    public function getCategoriaNoticia() {
        return $this->categoria_idcategoria;
    }
    
    public function setCategoriaNoticia($param) {
        $this->categoria_idcategoria = $param;
    }

   
    //limite superior do dashboard
    public function getLimiteInferior() {
        return $this->limiteInferior;
    }
    
    public function setLimiteInferior($param) {
        $this->limiteInferior = $param;
    }
    
    //limite superior do dashboard
    public function getLimiteSuperior() {
        return $this->limiteSuperior;
    }
    
    public function setLimiteSuperior($param) {
        $this->limiteSuperior = $param;
    }
    
     //Codigo Único
    public function getCodigoUnico() {
        return $this->codigoUnico;
    }
    
    public function setCodigoUnico($param) {
        $this->codigoUnico = $param;
    }
    
    //Descricao
    public function getDescricao() {
        return $this->descricao;
    }
    
    public function setDescricao($param) {
        $this->descricao = $param;
    }
    
     //Data Inclusao
    public function getDataInclusao() {
        return $this->dataInclusao;
    }
    
    public function setDataInclusao($param) {
        $this->dataInclusao = $param;
    }
    
    //Categoria Solicitacao
    public function getCategoriaSolicitacao() {
        return $this->categoriaSolicitacao;
    }
    
    public function setCategoriaSolicitacao($param) {
        $this->categoriaSolicitacao = $param;
    }
    
    //Apartamento
    public function getIdApartamento() {
        return $this->idApartamento;
    }
    
    public function setIdApartamento($param) {
        $this->idApartamento = $param;
    }
    
    //NOME SUBCONTA
    public function getNomeSubConta() {
        return $this->nomeSubconta;
    }
    
    public function setNomeSubConta($param) {
        $this->nomeSubconta = $param;
    }
    
    //CLASSIFICACAO SUBCONTA
    public function getClassificacao() {
        return $this->classificacao;
    }
    
    public function setClassificacao($param) {
        $this->classificacao = $param;
    }
    
    //ID CONTA
    public function getIdConta() {
        return $this->idconta;
    }
    
    public function setIdConta($param) {
        $this->idconta = $param;
    }
    
    
    //SIGILO
    public function getSigilo() {
        return $this->sigilo;
    }
    
    public function setSigilo($param) {
        $this->sigilo = $param;
    }
    
     //SIGILO
    public function getTemFoto() {
        return $this->temFoto;
    }
    
    public function setTemFoto($param) {
        $this->temFoto = $param;
    }
        
    //SIGILO
    public function getAnexo() {
        return $this->anexo;
    }
    
    public function setAnexo($param) {
        $this->anexo = $param;
    }
    
     //SIGILO
    public function getStatus() {
        return $this->status;
    }
    
    public function setStatus($param) {
        $this->status = $param;
    }
    
    
    //CONTROLE DE MENUS
    //MENU 1
    public function getMenu1() {
        return $this->menu1;
    }
    
    public function setMenu1($param) {
        $this->menu1 = $param;
    }
    
    //MENU 2
    public function getMenu2() {
        return $this->menu2;
    }
    
    public function setMenu2($param) {
        $this->menu2 = $param;
    }
    
    //MENU 3
    public function getMenu3() {
        return $this->menu3;
    }
    
    public function setMenu3($param) {
        $this->menu3 = $param;
    }
    
    
    /*private $perfil;
    private $plano;
    private $link;
   
    private $caminho;*/
    
    public function getPerfil() {
        return $this->perfil;
    }
    
    public function setPerfil($param) {
        $this->perfil = $param;
    }
    
    public function getPlano() {
        return $this->plano;
    }
    
    public function setPlano($param) {
        $this->plano = $param;
    }
    
    public function getLink() {
        return $this->link;
    }
    
    public function setLink($param) {
        $this->link = $param;
    }
    
    public function getCaminho() {
        return $this->caminho;
    }
    
    public function setCaminho($param) {
        $this->caminho = $param;
    }
    
    /*
     *  private $numVagaCarro;
    private $numVagaMoto;
    private $numVagaBicicleta;
     */
    
    public function getNumVagaCarro() {
        return $this->numVagaCarro;
    }
    
    public function setNumVagaCarro($param) {
        $this->numVagaCarro = $param;
    }
    
    public function getNumVagaMoto() {
        return $this->numVagaMoto;
    }
    
    public function setNumVagaMoto($param) {
        $this->numVagaMoto = $param;
    }
    
    public function getNumVagaBicicleta() {
        return $this->numVagaBicicleta;
    }
    
    public function setNumVagaBicicleta($param) {
        $this->numVagaBicicleta = $param;
    }
}
