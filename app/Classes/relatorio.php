<?php
/*

  DAO para representar os parametros do relatorio

 */

class relatorio
{
    private $titulo; //PARA DOCUMENTOS CRIADOS NO SISTEMA.
    private $cabecalho;
    private $conteudo;
    private $rodape;
    private $opcao_relatorio; //DIZ QUAL O TIPO DE RELATORIO.
    private $codigo_condominio;
    private $codigo_documento;

    public function relatorio()
    {

    }

    //titulo
    public function set_titulo($valor)
    {
        $this->titulo = $valor;
    }

    public function get_titulo()
    {
        return $this->titulo;
    }

    //cabecalho
    public function set_cabecalho($valor)
    {
        $this->cabecalho = $valor;
    }

    public function get_cabecalho()
    {
        return $this->cabecalho;
    }

    //conteudo
    public function set_conteudo($valor)
    {
        $this->conteudo = $valor;
    }

    public function get_conteudo()
    {
        return $this->conteudo;
    }

    //rodape
    public function set_rodape($valor)
    {
        $this->rodape = $valor;
    }

    public function get_rodape()
    {
        return $this->rodape;
    }

    //opcao_relatorio
    public function set_opcao_relatorio($valor)
    {
        $this->opcao_relatorio = $valor;
    }

    public function get_opcao_relatorio()
    {
        return $this->opcao_relatorio;
    }

    //codigo_condominio
    public function set_codigo_condominio($valor)
    {
        $this->codigo_condominio = $valor;
    }

    public function get_codigo_condominio()
    {
        return $this->codigo_condominio;
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

    //MONTAGEM DOS RELATORIOS

    public function monta_relatorios()
    {

        $ficha = '
					<html>
					<head>
					  <style>
						@conteudo { margin: 10px 150px; }
						@page { margin: 180px 50px; }
						#header { position: fixed; left: 0px; top: -140px; right: 0px; height: 150px; background-color: white; text-align: center; }
						#footer { position: fixed; left: 0px; bottom: -280px; right: 0px; height: 190px; background-color: white; }
						#footer .page:after { content: counter(page, upper-roman); }
					  </style>
					<body>
					  <div id="header">

						'.$this->get_cabecalho().'
					  </div>

					  <div id="footer">
						<p class="page">'.$this->get_rodape().'</p>
					  </div>

					  <div id="content">
					   <p class="conteudo" align="center">
					   						'.$this->get_titulo().'
						</p>
						<p class="conteudo">
						'.$this->get_conteudo().'
						</p>
					  </div>

					</body>
					</html>
		';

        return $ficha;
    }
}