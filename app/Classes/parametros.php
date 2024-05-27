<?php
/*

  DAO para representar os parametros no sistema

 */

class parametros
{
    //PARTE COMUM
    private $codigo_condominio;
    private $parte_md5;
    private $funcao;  //Ex.: consultar, detalhar , inserir
    private $funcionalidade;  //Ex.: fornecedor, documento e etc.
    private $label_funcionalidade; // ex.: Fornecedor.
    private $sigla_funcionalidade; //qual acao a ser carregada . Ex.: for - fornecedor;
    private $sigla_retorno_delecao; //para o link de retorno de delecao.
    private $pagina_redirecionada; //pagina do layout escolhido
    private $sucesso_operacao; //suc, sud,err etc.
    //PARTE ESPECIFICA;
    private $codigo_fornecedor;
    private $codigo_despacho;
    private $codigo_documento;

    public function parametros()
    {

    }

    //codigo condominio
    public function set_funcao($valor)
    {
        $this->funcao = $valor;
    }

    public function get_funcao()
    {
        return $this->funcao;
    }

    //codigo condominio
    public function set_codigo_condominio($valor)
    {
        $this->codigo_condominio = $valor;
    }

    public function get_codigo_condominio()
    {
        return $this->codigo_condominio;
    }

    //codigo conta
    public function set_parte_md5($valor)
    {
        $this->parte_md5 = $valor;
    }

    public function get_parte_md5()
    {
        return $this->parte_md5;
    }

    //pagina_redirecionada
    public function set_pagina_redirecionada($valor)
    {
        $this->pagina_redirecionada = $valor;
    }

    public function get_pagina_redirecionada()
    {
        return $this->pagina_redirecionada;
    }

    //sigla_funcionalidade
    public function set_sigla_funcionalidade($valor)
    {
        $this->sigla_funcionalidade = $valor;
    }

    public function get_sigla_funcionalidade()
    {
        return $this->sigla_funcionalidade;
    }

    //codigo_fornecedor
    public function set_codigo_fornecedor($valor)
    {
        $this->codigo_fornecedor = $valor;
    }

    public function get_codigo_fornecedor()
    {
        return $this->codigo_fornecedor;
    }

    //codigo_despacho
    public function set_codigo_despacho($valor)
    {
        $this->codigo_despacho = $valor;
    }

    public function get_codigo_despacho()
    {
        return $this->codigo_despacho;
    }

    //codigo_documento
    public function set_codigo_documento($valor)
    {
        $this->codigo_documento = $valor;
    }

    public function get_codigo_documento()
    {
        return $this->codigo_documento;
    }

    //funcionalidade
    public function set_funcionalidade($valor)
    {
        $this->funcionalidade = $valor;
    }

    public function get_funcionalidade()
    {
        return $this->funcionalidade;
    }

    //label funcionalidade
    public function set_label_funcionalidade($valor)
    {
        $this->label_funcionalidade = $valor;
    }

    public function get_label_funcionalidade()
    {
        return $this->label_funcionalidade;
    }

    //sigla_retorno_delecao
    public function set_sigla_retorno_delecao($valor)
    {
        $this->sigla_retorno_delecao = $valor;
    }

    public function get_sigla_retorno_delecao()
    {
        return $this->sigla_retorno_delecao;
    }

    //sucesso_operacao
    public function set_sucesso_operacao($valor)
    {
        $this->sucesso_operacao = $valor;
    }

    public function get_sucesso_operacao()
    {
        return $this->sucesso_operacao;
    }
}