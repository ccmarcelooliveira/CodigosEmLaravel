<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\Util;

use Auth;

/**
 * Description of Util
 *
 * @author Celia Regina
 */
class Util {
    /*
     * GERAÇÃO DE NÚMEROS ALETÓRIOS
     */

    //SAIDA: d7d1
    public function gerarNumeros() {

        // Esse if é somente para evitar entrar gerar numero sem3.
        // que seja preciso, ou seja, so quando houver o submit4.
        //if ($acao != 'enviar')  {	// A variável $vogais recebendo valor6.
        $vogais = 'aeiou';  // A variável $consoante recebendo valor8.
        $consoante = 'bcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz';

        // A variável $numeros recebendo valor10.
        $numeros = '123456789';

        // A variável $resultado vazia no momento12.
        $resultado = '';

        // strlen conta o nº de caracteres da variável $vogais15.
        $a = strlen($vogais) - 1;

        // strlen conta o nº de caracteres da variável $consoante17.
        $b = strlen($consoante) - 1;

        // strlen conta o nº de caracteres da variável $numeros19.
        $c = strlen($numeros) - 1;


        for ($x = 0; $x <= 1; $x++) {
            // A função rand() tem objetivo de gerar um valor aleatório
            $aux1 = rand(0, $a);
            $aux2 = rand(0, $b);
            $aux3 = rand(0, $c);

            // A função substr() tem objetivo de retornar parte da string
            // Caso queira números com mais digitos mude de 1 para 2 e teste

            $str1 = substr($consoante, $aux1, 1);
            $str2 = substr($vogais, $aux2, 1);
            $str3 = substr($numeros, $aux3, 1);
            $resultado .= $str1 . $str2 . $str3;

            // Trim remove os espaços a direita e esquerda
            $resultado = trim($resultado);
        } // fecha o for
        // Recebe o valor gerado podenso ser senha ou numero de verifição37.

        $valorgerado = $resultado;

        return $valorgerado;

        //}// fecha o if
    }

    public function geraNumeroAleatorio() {
        return str_replace(".", "", uniqid(rand(), true));
    }

    /*
     *
     * FIM DE GERAÇÃO DE NÚMEROS ALEATÓRIOS.
     */

    /**
     *
     * FORMATACAO DE IDENTIFICACAO DE APARTAMENTO
     */
    public function IntParaString($andar, $num_apartamento) {


        $numeros[0] = "0";
        $numeros[1] = "1";
        $numeros[2] = "2";
        $numeros[3] = "3";
        $numeros[4] = "4";
        $numeros[5] = "5";
        $numeros[6] = "6";
        $numeros[7] = "7";
        $numeros[8] = "8";
        $numeros[9] = "9";


        $num_andar_result = "";
        $num_apto_result = "";

        //ANDAR DE 0 A 9.
        if ($andar >= 0 and $andar <= 9) {
            $num_andar_result = $numeros[$andar];
        }

        //FORMATA DO ANDAR DE 9 A 100
        if ($andar > 9 and $andar < 100) {
            $primeiro_digito_andar = intval($andar / 10);

            $segundo_digito_andar = intval($andar % 10);

            $num_andar_result = $numeros[$primeiro_digito_andar] . $numeros[$segundo_digito_andar];
        }

//numero de apartamento

        if ($num_apartamento >= 0 and $num_apartamento <= 9) {
            $num_apto_result = "0" . $numeros[$num_apartamento];
        }

        if ($num_apartamento > 9 and $num_apartamento <= 100) {

            $primeiro_digito_apto = intval($num_apartamento / 10);

            $segundo_digito_apto = intval($num_apartamento % 10);

            $num_apto_result = $numeros[$primeiro_digito_apto] . $numeros[$segundo_digito_apto];
        }

        return $num_andar_result . $num_apto_result;
    }

    /*     * *
     *
     * FIM FORMATAÇÃO DE IDENTIFICAÇÃO DE APARTAMENTO
     */

    /**
     * FORMATAÇÃO RAMAL
     *
     */
    public function formacaoRamalApartamento($tipo, $apto, $bloco) {

        if (strpos($apto, 'cob') !== false) {
            
            //echo "segunda";
            return $apto;
            
        }else{
            
            //echo "primeia " . $apto ."- pos ".strpos($apto, 'cob');
            if ($tipo == 1) { //sem bloco e numero normal do apto
                return $apto;
            } else if ($tipo == 2) { //sem bloco e numero do apto reduzido de um zero.
                return $this->retirarZerosAptos($apto);
            } else if ($tipo == 3) { //com bloco + numero do apto normal.
                return $bloco . $apto;
            } else if ($tipo == 4) { //numero do apto normal + com bloco.
                return $apto . $bloco;
            } else if ($tipo == 5) { //com bloco + numero apto reduzido de um zero.
                return $bloco . $this->retirarZerosAptos($apto);
            } else if ($tipo == 6) { //numero apto reduzido de um zero + blocos.
                return $this->retirarZerosAptos($apto) . $bloco;
            } else if ($tipo == 7) { //sem forma de criacao.
                return "NOK";
            }
            
        }    
    }

    /*     * *
     * FIM FORMATAÇÃO RAMAL
     *
     */

    /**
     * MANIPULAÇÃO DE STRINGS
     */
    public function retirarZerosAptos($apto) {

        if (strripos($apto, "000") > 0) {
            return str_replace("000", "00", $apto);
        }

        if (strripos($apto, "00") > 0) {
            return str_replace("00", "0", $apto);
        }

        if (strripos($apto, "0") > 0) {
            return str_replace("0", "", $apto);
        }
    }

    /**
     * FIM MANIPULAÇÃO DE STRINGS
     */

    /**

     *
     * @param type $caminho
     * @param type $linha
     * @return string
     * MANIPULACAO DE ARQUIVO
     */
    public function criarArquivo($caminho, $linha) {


        //echo "<br>caminho : " . $caminho . "<BR>";
        //echo "Arquivo : " . $linha  . "<BR>";
        $msg = "";
        $quebra = ""; //chr(13).chr(10); // Inclui a quebra de linha.
        // echo $caminho;

        if ($arquivo = fopen($caminho, "w+")) { //mesmo nome que a pasta que contem as fotos do anuncio.
            $msg = "CLASSE UTIL - Arquivo criado com sucesso!" . $caminho . $quebra;

            //echo "antes de escrever na linha";
            if (fwrite($arquivo, $linha . $quebra)) {
                $msg = $msg . "CLASSE UTIL - Linha gravadao com sucesso!" . $linha . $quebra;
                //echo "escrever na linha";
            }

            if (fclose($arquivo)) { // Fechamento do arquivo
                $msg = $msg . "CLASSE UTIL - Arquivo Encerrado com sucesso!" . $arquivo . $quebra;
                //echo "fim";
            }
        }

        return $msg;
    }

    //MONTA O MENU PARA O CONDOMINIO, RECEBENDO INFORMAÇÕES DO SISTEMACONTROLLER
    public function monta_menu($parametro) { // se é modo avancado ou normal

        $bemestar = "";
        $relatorio = "";
        $comunicacao = "";
        $documentos = "";
        $organizacao = "";
        $financeiro = "";
        $manutencao = "";
        $apresentacao = "";
        $emergencia = "";
        $programacao = "";
        $cargadados = "";
        $campanhas = "";
        $condominio = "";
        $pets = "";

        $vigilancia = "";
        $rh = "";
        $aquisicao = "";
        $seguranca = "";
        $ecomerce = "";
        $parceiro = "";

        $menu = "";

        if (strlen($parametro->getParceirosApoio()) > 0) {

            $parceiro = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Parceiro/Apoio<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getParceirosApoio() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getEComerce()) > 0) {

            $ecomerce = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>E-Comerce<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getEComerce() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getSeguranca()) > 0) {

            $seguranca = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Segurança<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getSeguranca() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getAquisicao()) > 0) {

            $aquisicao = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Aquisição<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getAquisicao() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getRecursosHumanos()) > 0) {

            $rh = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>RH<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getRecursosHumanos() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getVigilancia()) > 0) {

            $vigilancia = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Vigilância<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getVigilancia() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getPets()) > 0) {

            $pets = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Pets<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getPets() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getBemEstar()) > 0) {

            $bemestar = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Bem Estar<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getBemEstar() . "
                                </ul>
                             </li>";
        }

       
        if (strlen($parametro->getCampanhas()) > 0) {

            $campanhas = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Campanhas<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getCampanhas() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getRelatorio()) > 0) {

            $relatorio = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Relatórios<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getRelatorio() . "
                                </ul>
                             </li>";
        }

        if (strlen($parametro->getDocumento()) > 0) {

            $documentos = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Documentos<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                        " . $parametro->getDocumento() . "

                                    </ul>
                                </li>";
        }

        if (strlen($parametro->getComunicacao()) > 0) { 

            $comunicacao = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Comunicação<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getComunicacao() . "

                                </ul>
                            </li>";
        }

        if (strlen($parametro->getCondominio()) > 0) {

            $condominio = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Condomínio<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                        " . $parametro->getCondominio() . "

                                    </ul>
                                </li>";
        }



        if (strlen($parametro->getFinanceiro()) > 0) {

            $financeiro = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Financeiro<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                        " . $parametro->getFinanceiro() . "

                                    </ul>
                                </li>";
        }

        if (strlen($parametro->getManutencao()) > 0) {

            $manutencao = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Manutenção<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                        " . $parametro->getManutencao() . "

                                    </ul>
                                </li>";
        }

        if (strlen($parametro->getApresentacao()) > 0) {

            $apresentacao = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Site<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                        " . $parametro->getApresentacao() . "

                                    </ul>
                                </li>";
        }

        if (strlen($parametro->getEmergencia()) > 0) {

            $emergencia = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Emergência<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getEmergencia() . "

                                </ul>
                            </li>";
        }

        if (strlen($parametro->getProgramacao()) > 0) {

            $programacao = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Programação<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                    " . $parametro->getProgramacao() . "

                                </ul>
                            </li>";
        }

        if (strlen($parametro->getCargaDados()) > 0) {

            $cargadados = " <li><a href='#'>
                                <i class='fa fa-bar-chart-o fa-fw'></i>Carga de Dados<span class='fa arrow'></span></a> 
                                <ul class='nav nav-second-level'>
                                        " . $parametro->getCargaDados() . "

                                    </ul>
                                </li>";
        }


        $apresentacao_menu = "<div class='navbar-default sidebar' role='navigation'>
                <div class='sidebar-nav navbar-collapse'>
                    <ul class='nav' id='side-menu'>
                        <li class='sidebar-search'>
                            <div class='input-group custom-search-form'>
                                <input type='text' class='form-control' placeholder='Pesquisa...'>
                                <span class='input-group-btn'>
                                <button class='btn btn-default' type='button'>
                                    <i class='fa fa-search'></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>";

        
        $apresentacao_menu = $apresentacao_menu . $condominio . $comunicacao . $aquisicao. $documentos. $bemestar . $campanhas . $cargadados . $ecomerce. $emergencia. $financeiro. $parceiro. $pets . $manutencao. $programacao. $relatorio . $rh . $seguranca .$vigilancia;
        
        $apresentacao_menu = $apresentacao_menu . "</ul></div>
                                                    <!-- /.sidebar-collapse -->
                                                  </div>";
        
        return $apresentacao_menu;
    }

    //MONTA MENU 2. 
    //FICA RESPONSAVEL DE MONTAR O MENU DIREITO SUPERIOR, COM OS MENUS PARA AVANCADO E AVANCADO 2.
    public function monta_menu2($temHome, $parametro, $idplano, $menuPronto, $menu2, $menu3) { // se é modo avancado ou normal
        
        //MENUS FIXOS
        $sair = "{{ route('master::sair') }}";
        $noticias = "{{ route('master::noticias') }}";
        $guiarapido = "{{ route('master::guiarapido') }}";

        $menuMedix = "NAO";
        $menuMaxxi = "NAO";

        if ($idplano == 2) {
            $menuMedix = "SIM";
        }
        if ($idplano == 3) {
            $menuMedix = "SIM";
            $menuMaxxi = "NAO";
        }

        $menu = "<!-- Navigation -->
                  <nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
                      <div class='container'>
                          <!-- Brand and toggle get grouped for better mobile display -->
                          <div class='navbar-header'>
                              <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                                  <span class='sr-only'>Toggle navigation</span>
                                  <span class='icon-bar'></span>
                                  <span class='icon-bar'></span>
                                  <span class='icon-bar'></span>
                              </button>
                              <a class='navbar-brand' href='" . $noticias . "'>" . $parametro->getNomeCondominio() . "</a>
                          </div>
                          <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                              <ul class='nav navbar-nav navbar-right'>
                                  ";
        if ($temHome == "S") {
            $menu = $menu . "  <li>
                                <a href='" . $noticias . "'>Home</a>
                            </li>
                            ";
        }

        $menu = $menu . $menuPronto;
        /*
        if ($menuMedix == "SIM" && $menu2 == "SIM") {
            $menu = $menu . "<li class='dropdown'>
                                                <a href='{{ route('master::menuavancado1') }}'> Mais...</a>
                                             </li>";
        }

        //echo "TAMANHO " . strlen($retornoMenu -> getMenu3());
        if ($menuMaxxi == "SIM" && $menu3 == "SIM") {
            $menu = $menu . "<li class='dropdown'>
                                <a href='{{ route('master::menuavancado2') }}'> Mais...</a>
                             </li>";
        }*/

        $menu = $menu . "                                       
                                  <li>
                                   <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                                          <i class='fa fa-user fa-fw'></i>  <i class='fa fa-caret-down'></i>
                                      </a>
                                      <ul class='dropdown-menu dropdown-user'>
                                      ";

         $menu = $menu ."  <li><a href='{{ route('master::usuPai') }}'><i class='fa fa-user fa-fw'></i> Usuário</a>
                            </li>
                            <li><a href='{{ route('master::painel') }}'><i class='fa fa-gear fa-fw'></i> Painel de Controle</a>
                            </li>
                            <li><a href='{{ route('master::faq') }}'><i class='fa fa-gear fa-fw'></i> FAQ</a>
                            </li>
                            <li><a href='{{ route('master::guia') }}'><i class='fa fa-gear fa-fw'></i> Guia Rápido</a>
                            </li>
                            <li class='divider'></li>";
         
        $menu = $menu . "<li><a href='" . $sair . "'><i class='fa fa-sign-out fa-fw'></i> Sair</a>
                                          </li>
                                      </ul>
                                      <!--   /.dropdown-user -->
                                  </li>
                              </ul>
                          </div>
                          <!-- /.navbar-collapse -->
                      </div>
                      <!-- /.container -->
                  </nav>";

        return $menu;
    }

    /**
     *
     * @param type $cabecalho
     * @return type
     */
    public function arquivoExtensao($cabecalho) {

        if (substr($cabecalho, strlen($cabecalho) - 4, 1) == ".") { //para o caso de extensao de 3 letras.
            $len = strlen($cabecalho) - 4;
        } else {
            $len = strlen($cabecalho) - 5;
        }

        $cabecalho_extensao = substr($cabecalho, $len, strlen($cabecalho));

        if ($cabecalho_extensao == ".jpeg") {
            $cabecalho_extensao = ".jpg";
        }

        return $cabecalho_extensao;
    }

    public function MontarTituloNoticia($cabecalho) {

        $cabecalho = str_replace('.', '', $cabecalho);

        $titulo = "";
        if ($cabecalho == "msword" ||
                $cabecalho == "DOC" ||
                $cabecalho == "doc" ||
                $cabecalho == "DOCX" ||
                $cabecalho == "docx" ||
                $cabecalho == "RTF" ||
                $cabecalho == "rtf" ||
                $cabecalho == "pdf" ||
                $cabecalho == "PDF") {
            $titulo = "Documento disponível";
        }


        if ($cabecalho == "xls" ||
                $cabecalho == "XLS" ||
                $cabecalho == "xlsx" ||
                $cabecalho == "XLSX") {
            $titulo = "Planilha disponível";
        }

        if ($cabecalho == "txt" ||
                $cabecalho == "TXT") {
            $titulo = "Arquivo Texto disponível";
        }

        if ($cabecalho == "jpg" ||
                $cabecalho == "jpeg" ||
                $cabecalho == "png" ||
                $cabecalho == "gif" ||
                $cabecalho == "JPG" ||
                $cabecalho == "JPEG" ||
                $cabecalho == "PNG" ||
                $cabecalho == "GIF") {
            $titulo = "Imagem disponível";
        }


        return $titulo;
    }

    public function MontarTextoNoticia($cabecalho) {

        $titulo = $this->MontarTituloNoticia($cabecalho); //$cabecalho =  str_replace('.', '', $cabecalho);      

        $titulo = "Um(a) " . $titulo . " foi disponibilizado(a) para conhecimento do condomínio. A consulta está liberada!";

        return $titulo;
    }
    
    

    /*     * **
     * UPLOAD DE FIGURAS
     *
     */

    function uploadAnexo($nome_arquivo, $caminho, $anexo_cod) {

        $situacao = "nao";
        $mensagem = "";
        $error = 5;
        $file_tmp_name = "";
        $file_size = "";
        $file_type = "";
        $extensao = "";


        if (!$_FILES) {
            echo 'Nenhum arquivo enviado!';
        } else {

            $file_name = $_FILES[$nome_arquivo]['name'];
            $file_type = $_FILES[$nome_arquivo]['type'];
            $file_size = $_FILES[$nome_arquivo]['size'];
            $file_tmp_name = $_FILES[$nome_arquivo]['tmp_name'];
            $error = $_FILES[$nome_arquivo]['error'];
        }

        switch ($error) {
            case 0:
                break;
            case 1:
                $mensagem = $mensagem . "O tamanho do arquivo é maior que o definido nas configurações do PHP!";
                break;
            case 2:
                $mensagem = $mensagem . "O tamanho do arquivo é maior do que o permitido!";
                break;
            case 3:
                $mensagem = $mensagem . "O upload não foi concluído!";
                break;
            case 4:
                $mensagem = $mensagem . "O upload não foi feito!";
                break;
        }

        //echo $caminho."/".$anexo_cod . $extensao;

        if ($error == 0) {

            if (!is_uploaded_file($file_tmp_name)) {

                $mensagem = $mensagem . "Erro ao processar arquivo!";
            } else {
                // $extensao = $this->arquivoExtensao($file_name);


                if (!move_uploaded_file($file_tmp_name, $caminho . "/" . $anexo_cod . $extensao)) {
                    $mensagem = $mensagem . "Não foi possível salvar o arquivo!";
                } else {
                    $mensagem = $mensagem . "Processo concluído com sucesso!<br>";
                    $mensagem = $mensagem . "Nome do arquivo: $file_name<br>";
                    $mensagem = $mensagem . "Tipo de arquivo: $file_type<br>";
                    $mensagem = $mensagem . "Tamanho em byte: $file_size<br>";

                    //pesquisa do produto inserido
                    //$figura_cod = $this -> geraNumeroAleatorio();
                }
            }
        }

        return $situacao;
    }

    //UPLOAD MAIS ESPECIFICO

    function uploadAnexo2($localizacao, $anexo_cod, $altura, $largura) {

        if (!empty($_FILES)) { // Se o array $_FILES não estiver vazio
            // Associamos a classe à variável $upload
            $upload = new \app\Util\UploadImagem();
            // Determinamos nossa largura máxima permitida para a imagem
            $upload->width = $altura;
            // Determinamos nossa altura máxima permitida para a imagem
            $upload->height = $largura;

            // Exibimos a mensagem com sucesso ou erro retornada pela função salvar.
            //Se for sucesso, a mensagem também é um link para a imagem enviada.
            echo $upload->salvar($localizacao, $_FILES['anexo1'], $anexo_cod);
        }
    }

    //FORMATAR DATA
    public function formatarDataMysqlParaExibicao($data) {

        if ($data != "") {
            $data1 = substr($data, 0, 10);
            $data2 = substr($data, 11, 8);
            list($anoI, $mesI, $diaI) = explode("-", $data1);

            return $diaI . "/" . $mesI . "/" . $anoI . " " . $data2;
        } else {
            return 0;
        }
    }
    
    public function formatarDataMysqlParaExibicao2($data) {

        if ($data != "") {
            $data1 = substr($data, 0, 10);
            $data2 = substr($data, 11, 8);
            list($anoI, $mesI, $diaI) = explode("-", $data1);

            return $diaI . "/" . $mesI . "/" . $anoI;
        } else {
            return 0;
        }
    }

    public function formatarDataMysqlParaExibicao3($data) {

        if ($data != "") {
            $data1 = substr($data, 0, 10);
            $data2 = substr($data, 11, 8);
            list($anoI, $mesI, $diaI) = explode("-", $data1);

            return $diaI . "-" . $mesI . "-" . $anoI;
        } else {
            return 0;
        }
    }
    
    //FORMATAR DATA RESULTSET
    public function formatarDataResultSet($result) {

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();


        foreach ($result as $item) {

            $item->CmpDataInclusao = $this->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
        }

        return $result;
    }
    
     //FORMATAR DATA RESULTSET
    public function formatarDataResultSet2($result) {

        $pasta_condominio = new \App\Classes\VariavelModel();
        //echo $anexo ->CmpDonoAnexo;
        $pasta = $pasta_condominio -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        
        //FAZ A CRIPTOGRAFIA DOS ELEMENTOS PASSADOS
        //echo "arquivo ". $arquivo = "/clientes/".$pasta."/documentos/".$figura;
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();

        foreach ($result as $item) {
            
            $item->CmpDataInclusao = $this->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
           echo $item->CmpAnexo = "/gs2i/public/clientes/".$pasta."/documentos/".$item->CmpAnexo;
        }

        return $result;
    }

    
    //FORMATAR DATA RESULTSET
    public function codificaResultSet($result) {

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        //$id_decripto = $seguranca -> decripto($id);

        foreach ($result as $item) {


            $item->objetoDonoDocumento = $seguranca->cripto($item->objetoDonoDocumento);
            $item->categoria_documento_idcategoria_documento = $seguranca->cripto($item->categoria_documento_idcategoria_documento);
            $item->iddocumento = $seguranca->cripto($item->iddocumento);
            $item->CmpDescricao = substr($item->CmpDescricao, 0, 140); 
        }

        return $result;
    }

    public function formatarDataMysql($data) {

        if (strlen($data) == 9) {

            if (substr($data, 2, 1) == "/") {
                $diaI = substr($data, 0, 2);
                $mesI = substr($data, 3, 1);   //12/12/2011
                $anoI = substr($data, 5, 4);
            } else {
                $diaI = substr($data, 0, 1);
                $mesI = substr($data, 2, 2);   //12/12/2011
                $anoI = substr($data, 5, 4);
            }
        } else if (strlen($data) == 8) {

            $diaI = substr($data, 0, 1);
            $mesI = substr($data, 2, 1);   //12/12/2011
            $anoI = substr($data, 4, 4);
        } else {

            $diaI = substr($data, 0, 2);
            $mesI = substr($data, 3, 2);   //12/12/2011
            $anoI = substr($data, 6, 4);
        }



        return $anoI . "-" . $mesI . "-" . $diaI;
    }

    //FORMATAR STRING

    function subString($msg, $inicio, $fim) {

        if (strlen($msg) > $fim) {

            return substr($msg, $inicio, $fim) . "...";
        } else {

            return $msg;
        }
    }

    function geracaoCodigoUnico($parteInicial) {
        return $codigo_unico = $parteInicial . date("y") . date("i") . date("s");
    }

    function nomeRedeSocial($siglaRedeSocial) {

        $redesocial = "";

        switch ($siglaRedeSocial) {

            case "fcb":
                $redesocial = "facebook";
                break;
            case "twi":
                $redesocial = "twitter";
                break;
            case "go+":
                $redesocial = "twitter";
                break;
            case 4:
                $mensagem = $mensagem . "O upload não foi feito!";
                break;
        }

        return $redesocial;
    }

    //BASE DE CRIPTOGRAFIA
    function encode($string) {

        return base64_encode($string);
    }

    function decode($string) {

        return base64_decode($string);
    }

    function devolveCategoriaNegocio($codigoCategNegocio) {

        if ($codigoCategNegocio == 1) {
            $str = "Venda";
        } else if ($codigoCategNegocio == 2) {
            $str = "Locação";
        } else if ($codigoCategNegocio == 3) {
            $str = "Troca";
        } else {
            $str = "Doação";
        }

        return $str;
    }

    //MONTAGEM DA BARRA DE INDICAÇÃO DA FUNCIONALIDADE
    function montagem_barra_funcionalidade($acao, $caminho, $funcionalidade) {

        $str = "";
        $util = new \App\Util\Util();
        
        $usuario = "";
        
        if(Auth::user()->morador_idmorador != "" && Auth::user()->morador_idmorador != null){
            $moradorModel = new \App\Classes\MoradorModel();        
            $nomeMorador = $moradorModel -> ConsultarMoradorId(Auth::user()->morador_idmorador);
            if($nomeMorador != null)  $usuario = $util->subString($nomeMorador -> CmpNome."/".$nomeMorador -> CmpNome, 0, 15);
        }else{
            $usuario = Auth::user() -> usuario;
        } 
        
        $str = "<div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>" . $acao . " " . $funcionalidade . " 
                            <align=right><small> </small></align>
                        </h1>
                    </div>
                </div>";
            

        return $str;
    }

    public function montar_Titulo_Noticia(Parametros $parametros) {

        $titulo_noticia = "";
        $categoriaDocumento = 0;

        //PARA O CASO DE DOCUMENTOS
        if ($parametros->getTipoObjeto() == "DOC") {

            $categoriaDocumento = $parametros->getCategoriaDocumento();

            $tipo = $this->recuperar_Categoria_Documento($categoriaDocumento);
            $titulo_noticia = " Novo(a) " . $tipo;
        }

        //PARA O CASO DE PROPOSTA ORCAMENTARIA
        /* if($objeto_noticia->get_objeto_noticia() == "por"){

          $titulo_noticia = "<center> Nova Proposta Orçamentária </center>";
          $texto_noticia = " Um(a) novo(a) ". $tipo . " foi inserido(a)! Vale a pena conferir e se informar sobre o assunto!";
          } */

        return $titulo_noticia;
    }

    public function montar_Texto_Noticia(Parametros $parametros) {

        //PARA O CASO DE DOCUMENTOS
        if ($parametros->getTipoObjeto() == "DOC") {

            $categoriaDocumento = $parametros->getCategoriaDocumento();

            $tipo = $this->recuperar_Categoria_Documento($categoriaDocumento);
            $texto_noticia = " Um(a) novo(a) " . $tipo . " foi inserido(a)! Vale a pena conferir e se informar sobre o assunto!";
        }
    }

    public function recuperar_Categoria_Documento($categoriaDocumento) {
        //PARA O CASO DE DOCUMENTOS

        $tipo = "";

        if ($categoriaDocumento == 2)
            $tipo = "Procedimentos";
        if ($categoriaDocumento == 3)
            $tipo = "ATA";
        if ($categoriaDocumento == 4)
            $tipo = "Regulamento";
        if ($categoriaDocumento == 5)
            $tipo = "Balancete";
        if ($categoriaDocumento == 6)
            $tipo = "Previsão Orçamentária";
        if ($categoriaDocumento == 7)
            $tipo = "Convenção";
        if ($categoriaDocumento == 9)
            $tipo = "Obra";
        if ($categoriaDocumento == 10)
            $tipo = "Edital";
        if ($categoriaDocumento == 11)
            $tipo = "Gastos do Mês";
        if ($categoriaDocumento == 12)
            $tipo = "Outros";

        return $tipo;
    }

    /*
     * 
     * Objetivo: Definir e apresentar o sistema de semáforo para o usuário.
     * o limite inferior e o superior deverão ser definidos no painel de controle do usuário.
     * ele deve espelhar a quantidade de trabalho que o condomínio tem.
     * 
     */

    public function grau_urgencia_dashboard($quantidade, $limite_inferior, $limite_superior) {

        //echo $quantidade . "--". $limite_inferior ."-". $limite_superior. "<BR>";
        /* cores principais
         * primary - azul - será a denotação de tudo bem e abaixo do limite inferior.
         * green - verde - não tem controle semafórico
         * red - vermelho - acima do limite superior
         * yellow - amarelo - acima do limite inferior e abaixo do superior
         * 
         * limite inferior - 2
         * limite superior - 4
         */
        if ($limite_inferior == 0 && $limite_superior == 0)
            return "green";

        if ($quantidade <= $limite_inferior)
            return "primary";

        if ($quantidade >= $limite_inferior && $quantidade <= $limite_superior)
            return "yellow";

        if ($quantidade >= $limite_superior)
            return "red";
    }

    // A PARTE PODE SER DIA, MES OU ANO, OU A DATA COMPLETA.
    function recupera_partes_data($data, $parte) {

        $partes = explode("/", $data);
        if ($parte == 'd')
            return $dia = $partes[0];
        if ($parte == 'm')
            return $mes = $partes[1];
        if ($parte == 'a')
            return $ano = $partes[2];
    }

    function status_lancamento_texto($status) {

        switch ($status) {
            case "EST":
                $status = "ESTORNO";
                break;
            case "TRA":
                $status = "TRANSFERIDO";
                break;
            case "COM":
                $status = "COMPLEMENTO";
                break;
            case "ATV":
                $status = "ATIVA";
                break;
        }
        return $status;
    }

    public function mes_ano_previsao($codigo_mes, $ano) {


        $mes = "";

        switch ($codigo_mes) {
            case 0:
                $mes = "01";
                break;
            case 1:
                $mes = "02";
                break;
            case 2:
                $mes = "03";
                break;
            case 3:
                $mes = "04";
                break;
            case 4:
                $mes = "05";
                break;
            case 5:
                $mes = "06";
                break;
            case 6:
                $mes = "07";
                break;
            case 7:
                $mes = "08";
                break;
            case 8:
                $mes = "09";
                break;
            case 9:
                $mes = "10";
                break;
            case 10:
                $mes = "11";
                break;
            case 11:
                $mes = "12";
                break;
        }

        return $mes . "_" . $ano;
    }

    public function mes_extenso_previsao($mes_ano) {

        $len = strlen($mes_ano);

        $mes = substr($mes_ano, 0, $len - 5);


        switch ($mes) {
            case 1:
                $mes = "Janeiro";
                break;
            case 2:
                $mes = "Fevereiro";
                break;
            case 3:
                $mes = "Março";
                break;
            case 4:
                $mes = "Abril";
                break;
            case 5:
                $mes = "Maio";
                break;
            case 6:
                $mes = "Junho";
                break;
            case 7:
                $mes = "Julho";
                break;
            case 8:
                $mes = "Agosto";
                break;
            case 9:
                $mes = "Setembro";
                break;
            case 10:
                $mes = "Outubro";
                break;
            case 11:
                $mes = "Novembro";
                break;
            case 12:
                $mes = "Dezembro";
                break;
        }
        return $mes;
    }

    //DEVOLVE PARTES DA DATA.
    public function devolve_partes_data($data, $parte) {
        //Parte : d -> dia, m -> mes, a -> ano

        $partes = explode("/", $data);
        $dia = $partes[0];
        $mes = $partes[1];
        $ano = $partes[2];

        if ($parte == "d")
            return $dia;
        if ($parte == "m")
            return $mes;
        if ($parte == "a")
            return $ano;
    }

    public function DevolveFuncionalidadeExtenso($atividade) {

        switch ($atividade) {
            case "det":
                return "Detalhar";
                break;
            case "cad":
                return "Cadastrar";
                break;

            case "edi":
                return "Editar";
                break;

            case "exc":
                return "Excluir";
                break;

            case "con":
                return "Consultar";
                break;

            case "sub":
                return "Substituir";
                break;
            
            case "reg":
                return "Registrar";
                break;
            
            case "apr":
                return "Aprovar";
                break;
            
            case "bai":
                return "Baixar";
                break;
            
            case "ras":
                return "Rastrear";
                break;
            
            case "rel":
                return "Relatório";
                break;
            
            
        }
    }
    
    /**
     * DEVOLVER CORES
     */
    
    public function DevolveCores($idCor){
        
        switch ($idCor) {
            case 1:
                return "AMARELO";
                break;
            case 2:
                return "AZUL";
                break;

            case 3:
                return "BEGE";
                break;

            case 4:
                return "BRANCA";
                break;

            case 5:
                return "CINZA";
                break;

            case 6:
                return "DOURADA";
                break;
            
            case 7:
                return "GRENÁ";
                break;
            
            case 8:
                return "LARANJA";
                break;
            
            case 9:
                return "MARRON";
                break;
            
            case 10 :
                return "PRATA";
                break;
            
            case 11:
                return "PRETA";
                break;
            
            case 12:
                return "ROSA";
                break;
            case 13:
                return "ROXA";
                break;
             case 14:
                return "VERDE";
                break;
             case 15:
                return "VERMELHA";
                break;
             case 16:
                return "FANTASIA";
                break;
        }
        
    }

    //TRATAMENTO DE ARQUIVOS. VERIFICA O TAMANHO DO ARQUIVO PARA PERMITIR O DOWNLOAD
    public function validarTamanhoArquivo($tamanhoArquivo) {
        //echo "TAM ". $tamanhoArquivo;
        $permissao = "nao";
        //SOMENTE ALGUNS FORMATOS SERÃO PERMITIDO NO DAGOBA.
        if ($tamanhoArquivo <= 2000000) { // TAMANHO DE DOIS MEGA BYTES
            $permissao = "sim";
        }

        return $permissao;
    }

    //FAZ A VERIFICACAO DO TIPO PERMITIDO DO ARQUIVO E DEVOLVE A PERMISSAO OU NAO DA EXECUÇÃO DO UPLOAD
    public function validarExtensaoArquivo($file) {

        $retorno = "nao";

        $extensaoPermitida = array("vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "vnd.openxmlformats-officedocument.wordprocessingml.document",
            "pdf",
            "msword",
            "sword",
            "txt",
            "DOC",
            "doc",
            "DOCX",
            "docx",
            "RTF",
            "rtf",
            "xls",
            "XLS",
            "xlsx",
            "XLSX",
            "plain",
            "jpg",
            "JPG",
            "jpeg",
            "JPEG",
            "png",
            "PNG",
            "gif",
            "GIF"
        );

        $extensao = $this->arquivoExtensao($file);
        $extensao = str_replace('.', '', $extensao);
        $extensao = str_replace('/', '', $extensao);

        if (in_array($extensao, $extensaoPermitida)) {
            $retorno = "sim";
        }

        return $retorno;
    }

    //Mensagem para grid de condominio
    function gridCondominioMsg($status) {
        switch ($status) {
            case 'ATV':
                $status = "ATIVADO";
                break;

            case 'DTV':
                $status = "DESATIVADO";
                break;

            case 'SUS':
                $status = "SUSPENSO";
                break;

            case 'AGU':
                $status = "AGUARDANDO";
                break;
        }

        return $status;
    }

    //
    function getMsgCondominio($id) {

        $ramal = "";

        switch ($id) {
            case 1:
                $ramal = "Numero apto normal";
                break;
            case 2:
                $ramal = "Sem bloco e numero do apto reduzido de um zero";
                break;
            case 3:
                $ramal = "Com bloco + numero do apto normal";
                break;
            case 4:
                $ramal = "Numero do apto normal + com bloco";
                break;
            case 5:
                $ramal = "Com bloco + numero apto reduzido de um zero";
                break;
            case 6:
                $ramal = "Numero apto reduzido de um zero + blocos";
                break;
            case 7:
                $ramal = "Nenhuma estrutura";
                break;
            default:
                $ramal = "";
        }

        return $ramal;
    }

    //CAMINHOS DO PROJETO
    public function RotaClientes() {
        return "C:/xampp/htdocs/dagoba/public/clientes/";
    }

    //APAGAR TODOS OS ARQUIVOS

    public function ApagarArquivos($caminho) {

        echo $pasta = $caminho;

        if (is_dir($pasta)) {

            $diretorio = dir($pasta);

            while ($arquivo = $diretorio->read()) {
                if (($arquivo != '.') && ($arquivo != '..')) {
                    unlink($pasta . $arquivo);
                    echo 'Arquivo ' . $arquivo . ' foi apagado com sucesso. <br />';
                }
            }

            $diretorio->close();
        } else {
            echo 'A pasta não existe.';
        }
    }

    public function DefineFuncionalidade($tipoDonoDocumento) {

        $retorno = "";

        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $tipoDonoDocumento_decripto = $seguranca -> decripto($tipoDonoDocumento);
        
        switch ($tipoDonoDocumento_decripto) {
            case "OBR":
                $retorno = "Obra/Serviço";
                break;
            case "APA":
                $retorno = "Apartamento";
                break;
            case "FUN":
                $retorno = "Funcionários";
                break;

            default:
                $retorno = "";
        }

        return $retorno;
    }

    public function DevolveEnquadramento($param) {

        $retorno = "";

        switch ($param) {
            case 1:
                $retorno = "Edificação";
                break;
            case 2:
                $retorno = "Máquinas e Equipamentos";
                break;
            case 3:
                $retorno = "Instalações";
                break;
            case 4:
                $retorno = "Móveis e Utensílios";
                break;
            case 5:
                $retorno = "Veículos";
                break;
            case 6:
                $retorno = " Computadores e Periféricos";
                break;

            default:
                $retorno = "";
        }

        return $retorno;
    }

    public function DevolveCategoria($param) {

        $retorno = "";

        switch ($param) {
            case 1:
                $retorno = "Permanente";
                break;
            case 2:
                $retorno = "Consumo";
                break;

            default:
                $retorno = "";
        }

        return $retorno;
    }

    public function DevolveObjetoExtenso($param) {

        $retorno = "";

        switch ($param) {
            case "MOR":
                $retorno = "MORADOR";
                break;
            case "DOC":
                $retorno = "DOCUMENTO";
                break;
            case "PRO":
                $retorno = "PROPRIETÁRIO";
                break;
            case "VAG":
                $retorno = "VAGA DE GARAGEM";
                break;
            case "VEI":
                $retorno = "VEÍCULO";
                break;
            case "BEM":
                $retorno = "BEM";
                break;

            case "APA":
                $retorno = "APARTAMENTO";
                break;

            default:
                $retorno = "";
        }

        return $retorno;
    }

    function MotivoSalaoFestas($param) {

        if ($param == 1)
            $param = "Aniversário";
        if ($param == 2)
            $param = "Batizado";
        if ($param == 3)
            $param = "Casamento";
        if ($param == 4)
            $param = "Confraternização";
        if ($param == 5)
            $param = "Chá de Bebê";
        if ($param == 6)
            $param = "Chá de Panela";

        return $param;
    }

    function SituacaoSolicitacaoSalaoFestas($param) {

        if ($param == "ANS")
            $param = "EM ANÁLISE";
        if ($param == "APR")
            $param = "APROVADO";
        if ($param == "RJT")
            $param = "REJEITADO";

        return $param;
    }

    function SituacaoClassificadoNegocio($param) {

        $negocio = "";
        if ($param == 1)
            $negocio = "Aluguel";
        if ($param == 2)
            $negocio = "Troca";
        if ($param == 3)
            $negocio = "Venda";
        if ($param == 4)
            $negocio = "Doação";

        return $negocio;
    }

    function SituacaoEstadoCivil($param) {

        if ($param == 1)
            $param = "Solteiro";
        if ($param == 2)
            $param = "Casado";
        if ($param == 3)
            $param = "Divorciado";
        if ($param == 4)
            $param = "Viúvo";


        return $param;
    }

    function naturalidade($param) {

        foreach($param as $item){
           return $item -> CmpDescricao;
        }
    }

    function nacionalidade($param) {

       foreach($param as $item){
           return $item -> CmpDescricao;
       }
    }

    function deficiente($param) {

        if ($param == "S")
            $param = "SIM";
        if ($param == "N")
            $param = "NÃO";

        return $param;
    }

    function escolaridade($param) {

        if ($param == 1)
            $param = "Fundamental";
        if ($param == 2)
            $param = "Ensino Médio";
        if ($param == 3)
            $param = "Ensino Superior";

        return $param;
    }

    public function ParametrosControleAcessoApresentacao($param1, $param2) {

        $parametros = array();

        $menu_link_secao = "";
        $atividade = "";
        $funcionalidade = "";
        $categoria_objeto = "";
        $menuAtivo = "";

        $retorno = "";

        switch ($param1) {
            case "CLA": //CLASSIFICADOS
                $menu_link_secao = "cla";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Classificados";
                $menuAtivo = "nor";
                break;
            case "SAL":
                $menu_link_secao = "salfes";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Reserva de Salão de Festas";
                $menuAtivo = "nor";
                break;
            case "REFAPA":
                $menu_link_secao = "refapa";
                $atividade = $param2;
                $funcionalidade = "Apartamento";
                $categoria_objeto = "Reforma de Apartamento";
                $menuAtivo = "nor";
                break;
            case "RAM":
                $menu_link_secao = "ram";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Ramal";
                $menuAtivo = "nor";
                break;
            case "ARE":
                $menu_link_secao = "acm";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Setor Condomínio";
                $menuAtivo = "nor";
                break;
            case "VEI":
                $menu_link_secao = "vei";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Veículos";
                $menuAtivo = "nor";
                break;
            case "VEIVIS":
                $menu_link_secao = "veivis";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Veículos Visitantes";
                $menuAtivo = "nor";
                break;
            
            case "PRO":
                $menu_link_secao = "pro";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Proprietário";
                $menuAtivo = "nor";
                break;
            case "MOR":
                $menu_link_secao = "mor";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Morador";
                $menuAtivo = "nor";
                break;
            case "DEP":
                $menu_link_secao = "dep";
                $atividade = $param2;
                $funcionalidade = "Morador";
                $categoria_objeto = "Dependente";
                $menuAtivo = "nor";
                break;
            case "EVE":
                $menu_link_secao = "eve";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Eventos";
                $menuAtivo = "nor";
                break;
            case "BEM":
                $menu_link_secao = "bem";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Equipamento";
                $menuAtivo = "nor";
                break;
            case "ENT":
                $menu_link_secao = "ent";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Entregas";
                $menuAtivo = "nor";
                break;
            case "AUT":
                $menu_link_secao = "aut";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Autorização";
                $menuAtivo = "nor";
                break;
            case "VIS":
                $menu_link_secao = "vis";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Visitantes";
                $menuAtivo = "nor";
                break;

            case "DOC":
                $menu_link_secao = "doc";
                $atividade = $param2;
                $funcionalidade = "Documentos";
                $categoria_objeto = "Documentos";
                $menuAtivo = "nor";
                break;

            case "PET":
                $menu_link_secao = "pet";
                $atividade = $param2;
                $funcionalidade = "Pets";
                $categoria_objeto = "Pets";
                $menuAtivo = "nor";
                break;

            case "MNTPRO":
                $menu_link_secao = "mntpro";
                $atividade = $param2;
                $funcionalidade = "Manutenção";
                $categoria_objeto = "Manutenção Programada";
                $menuAtivo = "nor";
                break;

            case "SOL":
                $menu_link_secao = "sol";
                $atividade = $param2;
                $funcionalidade = "Manutenção";
                $categoria_objeto = "Solicitação";
                $menuAtivo = "nor";
                break;

            case "APA":
                $menu_link_secao = "apa";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Apartamento";
                $menuAtivo = "nor";
                break;

            case "CAU":
                $menu_link_secao = "cautel";
                $atividade = $param2;
                $funcionalidade = "Manutenção";
                $categoria_objeto = "Cautela";
                $menuAtivo = "nor";
                break;

            case "OBR":
                $menu_link_secao = "obr";
                $atividade = $param2;
                $funcionalidade = "Manutenção";
                $categoria_objeto = "Obra/Serviço";
                $menuAtivo = "nor";
                break;

            case "FUNC":
                $menu_link_secao = "fun";
                $atividade = $param2;
                $funcionalidade = "RH";
                $categoria_objeto = "Funcionários";
                $menuAtivo = "av1";
                break;

            case "FUN":
                $menu_link_secao = "fca";
                $atividade = $param2;
                $funcionalidade = "RH";
                $categoria_objeto = "Função";
                $menuAtivo = "av1";
                break;

            case "ESC":
                $menu_link_secao = "escser";
                $atividade = $param2;
                $funcionalidade = "RH";
                $categoria_objeto = "Escala de Serviço";
                $menuAtivo = "av1";
                break;

            case "PON":
                $menu_link_secao = "pon";
                $atividade = $param2;
                $funcionalidade = "RH";
                $categoria_objeto = "Ponto";
                $menuAtivo = "av1";
                break;

            case "FOR":
                $menu_link_secao = "fornec";
                $atividade = $param2;
                $funcionalidade = "Aquisição";
                $categoria_objeto = "Fornecedor";
                $menuAtivo = "av1";
                break;

            case "EST":
                $menu_link_secao = "est";
                $atividade = $param2;
                $funcionalidade = "Aquisição";
                $categoria_objeto = "Estoque";
                $menuAtivo = "av1";
                break;

            case "INV":
                $menu_link_secao = "inv";
                $atividade = $param2;
                $funcionalidade = "Relatório";
                $categoria_objeto = "Inventário";
                $menuAtivo = "av1";
                break;

            case "PLCO":
                $menu_link_secao = "placon";
                $atividade = $param2;
                $funcionalidade = "Financeiro";
                $categoria_objeto = "Plano de Contas";
                $menuAtivo = "av1";
                break;

            case "PLSUCO":
                $menu_link_secao = "placon";
                $atividade = $param2;
                $funcionalidade = "Financeiro";
                $categoria_objeto = " SubContas";
                $menuAtivo = "av1";
                break;

            case "PAG":
                $menu_link_secao = "pag";
                $atividade = $param2;
                $funcionalidade = "Financeiro";
                $categoria_objeto = "Programação Financeira";
                $menuAtivo = "av1";
                break;

            case "PREORC":
                $menu_link_secao = "preorc";
                $atividade = $param2;
                $funcionalidade = "Financeiro";
                $categoria_objeto = "Previsão Orçamentária";
                $menuAtivo = "av1";
                break;

            case "REC":
                $menu_link_secao = "rec";
                $atividade = $param2;
                $funcionalidade = "Financeiro";
                $categoria_objeto = "Recebimento";
                $menuAtivo = "av1";
                break;

            case "VAG":
                $menu_link_secao = "vag";
                $atividade = $param2;
                $funcionalidade = "Condomínio";
                $categoria_objeto = "Estacionamento";
                $menuAtivo = "nor";
                break;

            case "RES":
                $menu_link_secao = "res";
                $atividade = $param2;
                $funcionalidade = "Comunicação";
                $categoria_objeto = "Reserva";
                $menuAtivo = "nor";
                break;
            
            case "USP": //USUÁRIO PAINEL
                $menu_link_secao = "";
                $atividade = $param2;
                $funcionalidade = "Painel de Controle";
                $categoria_objeto = "Usuário";
                $menuAtivo = "nor";
                break;
            
            case "FAQ": //USUÁRIO PAINEL
                $menu_link_secao = "";
                $atividade = $param2;
                $funcionalidade = "";
                $categoria_objeto = "FAQ";
                $menuAtivo = "nor";
                break;
            
            case "OCO": //USUÁRIO PAINEL
                $menu_link_secao = "oco";
                $atividade = $param2;
                $funcionalidade = "Ocorrências";
                $categoria_objeto = "Ocorrências";
                $menuAtivo = "nor";
                break;
            
            case "FOL": //USUÁRIO PAINEL
                $menu_link_secao = "oco";
                $atividade = $param2;
                $funcionalidade = "Folga";
                $categoria_objeto = "Folga";
                $menuAtivo = "nor";
                break;
            
            case "FER": //USUÁRIO PAINEL
                $menu_link_secao = "oco";
                $atividade = $param2;
                $funcionalidade = "Férias";
                $categoria_objeto = "Férias";
                $menuAtivo = "nor";
                break;
            
            case "FAL": //USUÁRIO PAINEL
                $menu_link_secao = "oco";
                $atividade = $param2;
                $funcionalidade = "Falta";
                $categoria_objeto = "Falta";
                $menuAtivo = "nor";
                break;
            
            case "LIC": //USUÁRIO PAINEL
                $menu_link_secao = "oco";
                $atividade = $param2;
                $funcionalidade = "Licença";
                $categoria_objeto = "Licença";
                $menuAtivo = "nor";
                break;
            
            case "PAI": //USUÁRIO PAINEL
                $menu_link_secao = "pai";
                $atividade = $param2;
                $funcionalidade = "Painel de Controle";
                $categoria_objeto = "Painel de Controle";
                $menuAtivo = "nor";
                break;
            
             case "TUR": //USUÁRIO PAINEL
                $menu_link_secao = "tratur";
                $atividade = $param2;
                $funcionalidade = "RH";
                $categoria_objeto = "Período de Trabalho";
                $menuAtivo = "nor";
                break;
            
            case "CTOPAG": //USUÁRIO PAINEL
                $menu_link_secao = "ctopag";
                $atividade = $param2;
                $funcionalidade = "Financeiro";
                $categoria_objeto = "Contas a Pagar";
                $menuAtivo = "nor";
                break;
            
            case "PEDSER": //PEDIDO DE SERVICO
                $menu_link_secao = "pedSer";
                $atividade = $param2;
                $funcionalidade = "Manutenção";
                $categoria_objeto = "Pedido de Serviço";
                $menuAtivo = "nor";
                break;
            
            case "PEDMAT": //PEDIDO DE SERVICO
                $menu_link_secao = "pedMat";
                $atividade = $param2;
                $funcionalidade = "Manutenção";
                $categoria_objeto = "Pedido de Material";
                $menuAtivo = "nor";
                break;
            
            case "SOLU": //PEDIDO DE SERVICO
                $menu_link_secao = "";
                $atividade = $param2;
                $funcionalidade = "Tratamento da Solicitação";
                $categoria_objeto = "";
                $menuAtivo = "nor";
                break;
            
            case "REL": //PEDIDO DE SERVICO
                $menu_link_secao = "";
                $atividade = $param2;
                $funcionalidade = "Relatórios";
                $categoria_objeto = "Balanço de Contas";
                $menuAtivo = "nor";
                break;
            
            case "PLAMNT": //PEDIDO DE SERVICO
                $menu_link_secao = "";
                $atividade = $param2;
                $funcionalidade = "Manutenção";
                $categoria_objeto = "Plano de Manutenção";
                $menuAtivo = "nor";
                break;
            
            default:
                $retorno = "";
        }

        $parametros["menu_link_secao"] = $menu_link_secao;
        //echo "<BR>";
        $parametros["atividade"] = $atividade;
        //echo "<BR>";
        $parametros["funcionalidade"] = $funcionalidade;
        // "<BR>";
        $parametros["categoria_objeto"] = $categoria_objeto;
        //echo "<BR>";
        $parametros["menuAtivo"] = $menuAtivo;

        return $parametros;
    }

    public function DevolvePasta($param) {

        switch ($param) {
            case "CLA": //CLASSIFICADOS
                $pasta = "classificado";
                break;
            case "DOC":
                $pasta = "documento";
                break;
            case "PRO":
                $pasta = "proprietario";
                break;
            case "VAG":
                $pasta = "vagagaragem";
                break;
            case "VEI":
                $pasta = "veiculos";
                break;
            case "BEM":
                $pasta = "bem";
                break;

            case "APA":
                $pasta = "apartamento";
                break;

            case "ARE":
                $pasta = "areacomum";
                break;
            
            case "VEI":
                $pasta = "veiculos";
                break;

            case "MOR":
                $pasta = "morador";
                break;

            case "ENT":
                $pasta = "entregas";
                break;

            case "SOL":
                $pasta = "solicitacao";
                break;

            case "FUN":
                $pasta = "colaborador";
                break;

            case "CON": //CONDOMÍNIO
                $pasta = "site";
                break;

            case "NOT": //CONDOMÍNIO
                $pasta = "noticia";
                break;

            case "EVE": //EVENTOS
                $pasta = "eventos";
                break;
            
            case "VIS": //EVENTOS
                $pasta = "visitantes";
                break;
            
            case "AUT": //EVENTOS
                $pasta = "visitantes";
                break;
            
            case "USU": //EVENTOS
                $pasta = "usuario";
                break;
            
            case "DEP": //DEPENDENTES
                $pasta = "dependente";
                break;
            
            case "QRC": //QRCODE
                $pasta = "qrcode";
                break;

            default:
                $pasta = "";
        }

        return $pasta;
    }

    public function ParametrosBaseDados($param1) {

        $parametros = array();

        //echo $param1;
        $tabela = "";
        $id = "";
        $id2 = "";
        $retorno = "";

        switch ($param1) {
            case "CLA": //CLASSIFICADOS
                $tabela = "classificados";
                $id = "idclassificados";
                break;
            case "SAL":
                $tabela = "salao_festas";
                $id = "idsalao_festas";
                break;
            case "RAP":
                $tabela = "reforma_apartamentos";
                $id = "idreforma_apartamento";
                break;
            case "NOT":
                $tabela = "noticias";
                $id = "idnoticias";                
                break;
            case "VAG":
                $retorno = "VAGA DE GARAGEM";
                break;
            case "VEI":
                $retorno = "VEÍCULO";
                break;
            case "BEM":
                $retorno = "BEM";
                break;

            case "APA":
                $retorno = "APARTAMENTO";
                break;

            case "CAU":
                $tabela = "cautelas";
                $id = "idcautela";
                break;
            
            case "RES":
                $tabela = "reservas";
                $id = "idreserva";
                break;
            
            
            default:
                $retorno = "";
        }

        $parametros["tabela"] = $tabela;
        $parametros["id"] = $id;
        $parametros["id2"] = $id2;

        return $parametros;
    }

    function DefinirCampoPrevisao($mes) {

        switch ($mes) {
            case "01":
                $status = "CmpMontanteJaneiro";
                break;
            case "02":
                $status = "CmpMontanteFevereiro";
                break;
            case "03":
                $status = "CmpMontanteMarco";
                break;
            case "04":
                $status = "CmpMontanteAbril";
                break;
            case "05":
                $status = "CmpMontanteMaio";
                break;
            case "06":
                $status = "CmpMontanteJunho";
                break;
            case "07":
                $status = "CmpMontanteJulho";
                break;
            case "08":
                $status = "CmpMontanteAgosto";
                break;
            case "09":
                $status = "CmpMontanteSetembro";
                break;
            case "10":
                $status = "CmpMontanteOutubro";
                break;
            case "11":
                $status = "CmpMontanteNovembro";
                break;
            case "12":
                $status = "CmpMontanteDezembro";
                break;
        }
        return $status;
    }

    function NumeracaoAptoMultiplica($num_aptos_andar, $numeroAptoInicioAndar, $intervalo) {

        //($num_aptos_andar+(($numeroAptoInicioAndar-1))*$intervalo_bloco_multiplicado + $numeroAptoInicioAndar*$intervalo_bloco_multiplicado) + $intervalo_bloco_somado
        $retorno = 0;

        if ($numeroAptoInicioAndar == 0) {
            $retorno = $intervalo * ($num_aptos_andar - 1);
        } else {
            $retorno = $intervalo * $num_aptos_andar;
        }

        return $retorno;
    }

    function EstadoCivil($idEstadoCivil) {

        $status = "";
        switch ($idEstadoCivil) {
            case 1:
                $status = "MARIDO";
                break;
            case 2:
                $status = "ESPOSA";
                break;
            case 3:
                $status = "MÃE";
                break;
            case 4:
                $status = "PAI";
                break;
            case 5:
                $status = "FILHO/FILHA";
                break;
            case 6:
                $status = "AVÔ/AVÓ";
                break;
            case 7:
                $status = "TIO/TIA";
                break;
            case 8:
                $status = "NETO/NETA";
                break;
            case 9:
                $status = "OUTROS";
                break;
        }
        return $status;
    }

    function RetornoDonoDocumento($idObjeto) {

        $status = "";
        switch ($idObjeto) {
            case "PRO":
                $funcionalidade = "master::detalharProprietario";
                $label = " Proprietário";
                break;
            case "MOR":
                $funcionalidade = "master::detalharMorador";
                $label = " Morador";
                break;
            case 3:
                $status = "MÃE";
                break;
            case 4:
                $status = "PAI";
                break;
            case 5:
                $status = "FILHO";
                break;
            case 6:
                $status = "AVÔ/AVÓ";
                break;
            case 7:
                $status = "TIO/TIA";
                break;
            case 8:
                $status = "NETO/NETA";
                break;
        }
        return $status;
    }

    public function DevolveIdade($dtNascimento) {
        
        //RETIRADA DE ESPAÇOS EM BRANCO
        $dtNascimento = trim(ltrim(rtrim($dtNascimento)));
        
        //echo $dtNascimento. "<BR>";
        // Declara a data! :P
        //$data = '29/08/2008';
        //echo "TESTE " . $dtNascimento;
        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $dtNascimento);

        //echo $dia . "<BR>";
        // Descobre que dia é hoje e retorna a unix timestamp
         $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        //echo "<BR>";
        //echo $dia. "<BR>". $mes . "<BR>".$ano ."<BR>"; 
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

        // Depois apenas fazemos o cálculo já citado :)
        return floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    }

    /**
     * 
     * @param type $funcionalidade = {res - reserva, etc}
     * @param type $contador = {sequencial identificador}
     * @return type
     */
    public function GeracaoCodigoUnicoControle($funcionalidade, $contador) {

        $prefixo = "";
        switch ($funcionalidade) {
            case "RES":
                $prefixo = date("Y") . "RES";
                break;
            case "MOR":
                $prefixo = date("Y") . "RES";
                $label = " Morador";
                break;
        }

        return $prefixo . $contador;
    }

    /**
     * 
     * @param type $param
     */
    public function LabelReserva($param) {

        $label = "";
        switch ($param) {
            case "ANS":
                $label = "EM ANÁLISE";
                break;
            case "ACT":
                $label = "APROVADO";
                break;
            case "RJT":
                $label = "REJEITADO";
                break;
            case "ATV":
                $label = "ATIVO";
                break;

            case "DTV":
                $label = "CANCELADO PELO USUÁRIO";
                break;
            case "DTS":
                $label = "CANCELADO PELO SÍNDICO";
                break;
            case "PEN":
                $label = "PAGAMENTO PENDENTE";
                break;
            case "PAG":
                $label = "PAGAMENTO REALIZADO";
                break;
        }

        return $label;
    }

    public function MotivoReserva($param) {

        $label = "";
        switch ($param) {
            case 1:
                $label = "ANIVERSÁRIO";
                break;
            case 2:
                $label = "BATIZADO";
                break;
            case 3:
                $label = "CASAMENTO";
                break;
            case 4:
                $label = "CONFRATERNIZAÇÃO";
                break;
            case 5:
                $label = "CHÁ DE BEBÊ";
                break;
            case 6:
                $label = "CHÁ DE PANELA";
                break;
            default:
                $label = "OUTROS";
                break;
        }

        return $label;
    }

    public function imagemNoticia($tipoObjeto) {

        if ($tipoObjeto == "msword" ||
                $tipoObjeto == "DOC" ||
                $tipoObjeto == "DOCX" ||
                $tipoObjeto == "RTF" ||
                $tipoObjeto == "doc" ||
                $tipoObjeto == "docx" ||
                $tipoObjeto == "rtf") {
            $tipoObjeto = "doc.jpg";
        }

        if ($tipoObjeto == "pdf" ||
                $tipoObjeto == "PDF") {
            $tipoObjeto = "pdf.jpg";
        }

        if ($tipoObjeto == "xls" ||
                $tipoObjeto == "XLS" ||
                $tipoObjeto == "xlsx" ||
                $tipoObjeto == "XLSX") {
            $tipoObjeto = "excel.png";
        }

        if ($tipoObjeto == "txt") {
            $tipoObjeto = "txt.png";
        }

        if ($tipoObjeto == "jpg" ||
                $tipoObjeto == "jpeg" ||
                $tipoObjeto == "png" ||
                $tipoObjeto == "gif" ||
                $tipoObjeto == "JPG" ||
                $tipoObjeto == "JPEG" ||
                $tipoObjeto == "PNG" ||
                $tipoObjeto == "GIF") {
            $tipoObjeto = "imagem.jpg";
        }
        return $tipoObjeto;
    }

    //DIFERENÇA ENTRE DATAS

    function diff($inicio, $fim, $tipo) {
        if (!$fim || $fim < $inicio) {
            return "A data final deve ser maior que a inicial.";
        } elseif ($inicio < "1970-01-01") {
            return "A data final deve ser maior que 01/01/1970.";
        } else {
            if (strlen($inicio) > 10) {
                $time_inicio = mktime(substr($inicio, -8, 2), substr($inicio, -5, 2), substr($inicio, -2), substr($inicio, 5, 2), substr($inicio, 8, 2), substr($inicio, 0, 4));
            } else {
                $time_inicio = mktime(0, 0, 0, substr($inicio, 5, 2), substr($inicio, -2), substr($inicio, 0, 4));
            }
            if (strlen($fim) > 10) {
                $time_fim = mktime(substr($fim, -8, 2), substr($fim, -5, 2), substr($fim, -2), substr($fim, 5, 2), substr($fim, 8, 2), substr($fim, 0, 4));
            } else {
                $time_fim = mktime(0, 0, 0, substr($fim, 5, 2), substr($fim, -2), substr($fim, 0, 4));
            }
            $diferenca = ($time_fim - $time_inicio);
            switch ($tipo) {
                case "i": return round($diferenca / 60);
                    break;
                case "H": return round($diferenca / 3600);
                    break;
                case "d": return round($diferenca / 86400);
                    break;
            }
        }
    }

    public function MostrarDiasContasPagar($data1,$data2,$tipo) {
        //echo $data1. "," . $data2. "<BR>";
         if($data1 > $data2){ // CONTAS A VENCER
                //echo "VENCER";
                 echo $this->diff($data2, $data1, $tipo);
             }else{
                 //echo "VENCIDO";
                 echo $this->diff($data1, $data2, $tipo);
             }
    }
    
    public function MostrarSituacaoContasPagar($data1,$data2,$tipo) {
        //echo $data1. "," . $data2. "<BR>";
         if($data1 > $data2){ // CONTAS A VENCER
                echo "<font cor='blue'>VENCER</font>";
                 
             }else{
                 //echo "VENCIDO";
                 echo "<font cor='red'>VENCIDO</font>";
             }
    }
    
    //DEVOLVE A FIGURA PEQUENA 
    function Gliphycon($tipoCampo) {
        $retorno = "";
        
        switch ($tipoCampo) {
            case "tel": $retorno = "fa fa-phone";
                break;
            case "cel": $retorno = "fa fa-phone";
                break;
            case "car": $retorno = "fa fa-automobile";
                break;
            case "imagem": $retorno = "fa fa-file-picture-o";
                break;
            case "email": $retorno = "glyphicon glyphicon-envelope";
                break;
            case "user": $retorno = "fa fa-user";
                break;
            case "formacao": $retorno = "glyphicon glyphicon-education";
                break;
            case "trabalho": $retorno = "fa fa-cogs";
                break;
            case "codigo": $retorno = "fa fa-cogs";
                break;
            case "generico": $retorno = "fa fa-cogs";
                break;
            case "bandeira": $retorno = "fa fa-flag-o";
                break;
            case "comentario": $retorno = "fa fa-pencil";
                break;
            case "deficiente": $retorno = "fa fa-wheelchair";
                break;
            case "homem": $retorno = "fa fa-male";
                break;
            case "mulher": $retorno = "fa fa-female";
                break;
            case "casa": $retorno = "fa fa-home";
                break;
            case "doc": $retorno = "fa fa-folder-o";
                break;
            case "calendar": $retorno = "fa fa-calendar";
                break;
            case "calendar2": $retorno = "fa fa-calendar";
                break;
            case "money": $retorno = "fa fa-money";
                break;
            case "bem": $retorno = "fa fa-truck";
                break;
            
            
        }
        
        return $retorno;
    }
    
    /**
     * 
     * @param type $SiglaObjeto
     * @return string 
     * 
     * Definição de Categoria de Objeto e Categoria de Documento.
     */
    public function Categoria($SiglaObjeto) {
        
        $data = array();
        $catDoc = "";
        $catObj = "";
        //echo "sigla ". $SiglaObjeto;
        
        $posicao = strpos($SiglaObjeto,"-"); //a insercao não partiu de documentoController
        if($posicao > 0){
            //echo "teste1";
            list($catObj, $catDoc) = explode("-", $SiglaObjeto);            
            $catDoc = substr($catDoc, 0, 4);
            
        }else{
            
            if($SiglaObjeto != "DOC" && $SiglaObjeto != "DOCS"){ //PARA O CASO DE UPLOAD DOCUMENTO ISOLADOS OU LIGADOS A ALGUMA ENTIDADE.
                $catDoc = "IMG";
                $catObj = $SiglaObjeto;
                
            }else{ //PARA UPLOAD DOS DEMAIS CASOS
                //echo "teste 2";
                if($SiglaObjeto == "DOCS"){
                    $catObj = "DOCS";
                }else{
                    $catObj = "DOC";
                }
                //echo $catObj;
                $catDoc = substr($SiglaObjeto, 0, 4);
            }    
        }  
        
       $data["catDoc"] = $catDoc;
       
       $data["catObj"] = $catObj; 
        
        return $data;
    }
    
    function AprovacaoStatus($status) {
        
        if($status == "ANS") $status = "EM ANÁLISE";
        if($status == "ACT") $status = "ACEITO";
        if($status == "RJT") $status = "REJEITADO";
        
        return $status;
    }
    
    
    /*
CREATE TABLE IF NOT EXISTS `depreciacao` (
  `id` int(11) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  `bem` varchar(200) NOT NULL,
  `vida_util` varchar(2) NOT NULL,
  `taxa_anual` varchar(5) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `depreciacao`
--

INSERT INTO `depreciacao` (`id`, `referencia`, `bem`, `vida_util`, `taxa_anual`, `data`) VALUES
(1, 'teste', 'Edifícios', '25', '4%', '0000-00-00 00:00:00'),
(2, 'teste', 'Máquinas e Equipamentos ', '10', '10%', '0000-00-00 00:00:00'),
(3, 'teste', 'Instalações', '10', '10%', '0000-00-00 00:00:00'),
(4, 'teste', 'Móveis e Utensílios ', '10', '10%', '0000-00-00 00:00:00'),
(5, 'teste', 'Veículos', '10', '20%', '0000-00-00 00:00:00'),
(6, 'teste', 'Computadores e Periféricos', '5', '20%', '0000-00-00 00:00:00');
     * 
     *      */
    
    function calculaTempo($hora_inicial, $hora_final) {
        //echo $hora_inicial . " - " . $hora_final;
        $i = 1;
        $tempo_total;

        $tempos = array($hora_final, $hora_inicial);

        foreach($tempos as $tempo) {
         $segundos = 0;

         list($h, $m, $s) = explode(':', $tempo);

         $segundos += $h * 3600;
         $segundos += $m * 60;
         $segundos += $s;

         $tempo_total[$i] = $segundos;

         $i++;
        }
        $segundos = $tempo_total[1] - $tempo_total[2];

        $horas = floor($segundos / 3600);
        $segundos -= $horas * 3600;
        $minutos = str_pad((floor($segundos / 60)), 2, '0', STR_PAD_LEFT);
        $segundos -= $minutos * 60;
        $segundos = str_pad($segundos, 2, '0', STR_PAD_LEFT);

        return "$horas:$minutos:$segundos";
    }


    

    //RETORNA UNIDADE FEDERACAO
    
    /*
1 	AC 	Acre 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	2 	AL 	Alagoas 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	3 	AM 	Amazonas 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	4 	AP 	Amapa 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	5 	BA 	Bahia 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	6 	CE 	Ceara 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	7 	DF 	Distrito Federal 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	8 	ES 	Espirito Santo 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	9 	GO 	Goias 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	10 	MA 	Maranhao 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	11 	MG 	Minas Gerais 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	12 	MS 	Mato Grosso do Sul 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	13 	MT 	Mato Grosso 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	14 	PA 	Para 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	15 	PB 	Paraiba 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	16 	PE 	Pernambuco 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	17 	PI 	Piaui 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	18 	PR 	Parana 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	19 	RJ 	Rio de Janeiro 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	20 	RN 	Rio Grande do Norte 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	21 	RO 	Rondonia 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	22 	RR 	Roraima 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	23 	RS 	Rio Grande do Sul 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	24 	SC 	Santa Catarina 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	25 	SE 	Sergipe 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	26 	SP 	Sao Paulo 	ATV
	Edita Edita 	Copiar Copiar 	Apagar Apagar 	27 	TO 	Tocantins 	ATV     */
    
    public function UnidadeFederacao($idUF){
 
        $uf = "";
        
        switch ($idUF) {
            case 1:
                $uf = "Alagoas";
                break;
            case 2:
                $uf = "Amazonas";
                break;
            case 3:
                $uf = "Amapá";
                break;
            case 4:
                $uf = "Bahia";
                break;
            case 5:
                $uf = "Ceará";
                break;
            case 6:
                $uf = "Distrito Federal";
                break;
            case 7:
                $uf = "Espírito Santo";
                break;
            case 8:
                $uf = "Goiás";
                break;
            case 9:
                $uf = "Maranhão";
                break;
            case 10:
                $uf = "Minas Gerais";
                break;
            case 11:
                $uf = "Mato Grosso do Sul ";
                break;
            case 12:
                $uf = "Mato Grosso";
                break;
            case 13:
                $uf = "Pará";
                break;
            case 14:
                $uf = "Paraíba";
                break;
            case 15:
                $uf = "Pernambuco";
                break;
            case 16:
                $uf = "Piauí";
                break;
            case 17:
                $uf = "Paraná";
                break;
            case 18:
                $uf = "Rio de Janeiro";
                break;
            case 19:
                $uf = "Rio Grande do Norte";
                break;
            case 20:
                $uf = "Rondônia";
                break;
            case 22:
                $uf = "Roraima";
                break;
            case 23:
                $uf = "Rio Grande do Sul";
                break;
            case 24:
                $uf = "Santa Catarina";
                break;
            case 25:
                $uf = "Sergipe";
                break;
            case 26:
                $uf = "São Paulo";
                break;
            case 27:
                $uf = "Tocantins";
                break;           
        }
        
        return $uf;   
    }
    
    public function MesesAno($mes){
 
        $result = "";
        
        switch ($mes) {
            case 1:
                $result = 31;
                break;
            case 2:
                $result = 28;
                break;
            case 3:
                $result = 31;
                break;
            case 4:
                $result = 30;
                break;
            case 5:
                $result = 31;
                break;
            case 6:
                $result = 30;
                break;
            case 7:
                $result = 31;
                break;
            case 8:
                $result = 30;
                break;
            case 9:
                $result = 31;
                break;
            case 10:
                $result = 31;
                break;
            case 11:
                $result = 30;
                break;
            case 12:
                $result = 31;
                break;
                     
        }
        
        return $result;   
    }
    
    public function MontarGradeFeriasFalta($listaEventos,$idFuncionario1,$data1, $nome) {
        
       /*$util -> MontarGradeFeriasFalta($listaEventos,$item -> idfuncionarios, $dt, $item->CmpNome); 
       $listaFeriasFalta = $util -> MontarGradeFeriasFalta($item -> idfuncionarios, $item2 -> funcionario_idfuncionario, $item2 -> CmpTipoOcorrencia, $dt, $item2 -> CmpDataInicio, $item->CmpNome);                             
                        }   */
        $util = new \App\Util\Util(); 
            
        foreach($listaEventos as $item2){
                          
                    
            if($idFuncionario1 == $item2 -> funcionario_idfuncionario){
                //
                if($item2 -> CmpTipoOcorrencia == 1 && ($util -> BetweenData($data1, $item2 -> CmpDataInicio, $item2 -> CmpDataFim)) != "NOK"){                    
                    return "{ title:'".$nome ."- Férias',start:'".$data1."'},";
                }

                if($item2 -> CmpTipoOcorrencia == 2){
                
                    if($item2 -> CmpDataFim != "" && ($util -> BetweenData($data1, $item2 -> CmpDataInicio, $item2 -> CmpDataFim)) != "NOK"){                        
                        return "{ title:'".$nome ."- Falta',start:'".$data1."'},";
                    }else{
                        if($data1 == $item2 -> CmpDataInicio){                            
                            return "{ title:'".$nome ."- Falta',start:'".$data1."'},";
                        }
                    }                
                }
                
                if($item2 -> CmpTipoOcorrencia == 3){ //FOLGA
                
                    if($item2 -> CmpDataFim != "" && ($util -> BetweenData($data1, $item2 -> CmpDataInicio, $item2 -> CmpDataFim)) != "NOK"){                        
                        return "{ title:'".$nome ."- Folga',start:'".$data1."'},";
                    }else{
                        if($data1 == $item2 -> CmpDataInicio){                            
                            return "{ title:'".$nome ."- Folga',start:'".$data1."'},";
                        }
                    }                
                }
                
                if($item2 -> CmpTipoOcorrencia == 4){ //FOLGA
                
                    if($item2 -> CmpDataFim != "" && ($util -> BetweenData($data1, $item2 -> CmpDataInicio, $item2 -> CmpDataFim)) != "NOK"){                        
                        return "{ title:'".$nome ."- Licença',start:'".$data1."'},";
                    }else{
                        if($data1 == $item2 -> CmpDataInicio){                            
                            return "{ title:'".$nome ."- Licença',start:'".$data1."'},";
                        }
                    }                
                }

            }
        }    
    }
    
    public function BetweenData($data1,$dataInicioIntervalo,$dataFimIntervalo) {
        
        //$data1 = '2013-05-21';
        //$data2 = '2013-05-22';
        //echo $data1 . "_ ". $dataInicioIntervalo . "_ ". $dataFimIntervalo . " -- ";
        // Comparando as Datas
        if(strtotime($data1) >= strtotime($dataInicioIntervalo))
        {
            if(strtotime($data1) <= strtotime($dataFimIntervalo))
            {
                return  "OK";
            }else{
                return "NOK";
            }
        }else{
            return "NOK";
        }
        
    }
    
    public function MontarCalendarioDetalhar($data, $mes, $sigla, $listaFolgaCadastrada) {
        
        $util = new \app\Util\Util(); 
        
        $desc = "";
        if($sigla == "jan") $desc = "JANEIRO";
        if($sigla == "fev") $desc = "FEVEREIRO";
        if($sigla == "mar") $desc = "MARÇO";
        if($sigla == "abr") $desc = "ABRIL";
        if($sigla == "mai") $desc = "MAIO";
        if($sigla == "jun") $desc = "JUNHO";
        if($sigla == "jul") $desc = "JULHO";
        if($sigla == "ago") $desc = "AGOSTO";
        if($sigla == "set") $desc = "SETEMBRO";
        if($sigla == "out") $desc = "OUTUBRO";
        if($sigla == "nov") $desc = "NOVEMBRO";
        if($sigla == "dez") $desc = "DEZEMBRO";
        
        $titulo = $desc;
        $semana = " <tr>
                       <td><b>Dom</b></td>
                       <td><b>Seg</b></td>
                       <td><b>Ter</b></td>
                       <td><b>Qua</b></td>
                       <td><b>Qui</b></td>
                       <td><b>Sex</b></td>
                       <td><b>Sáb</b></td>
                   </tr>";
        $i = 1;
        $indice = 1;
        $temp = "";  
        $temp2 = "";
        $bloqueio = "N";
                
        $diasMes = $util -> MesesAno($mes);
        
        while($i <= $diasMes){
            
            if($i < 10){
               $indice = "0".$i;               
            }else{
                //ECHO "MAIOR";
                $indice = $i;
            }
            
            if(date('w', strtotime($data.$indice)) == 0){
                
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<tr><td width='70' ><input type='checkbox' ".$temp2." disabled  name='dia".$sigla.$indice."' value='".$data.$indice."'> ".$indice." </td>";
                $temp2 = "";
                $bloqueio = "S";
                
            }else{
                if($bloqueio == "N") $temp = $temp . "<tr><td><input type='checkbox' disabled name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 1){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2." disabled  name='dia".$sigla.$indice."' value='".$data.$indice."'> ".$indice." </td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            } 
            
            if(date('w', strtotime($data.$indice)) == 2){ //TERCA
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$indice ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2." disabled  name='dia".$sigla.$indice."' value='".$data.$indice."'> ".$indice." </td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                 if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 3){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2." disabled  name='dia".$sigla.$indice."' value='".$data.$indice."'> ".$indice."</td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 4){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2." disabled  name='dia".$sigla.$indice."' value='".$data.$indice."'> ".$indice." </td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 5){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2." disabled  name='dia".$sigla.$indice."' value='".$data.$indice."'> ".$indice." </td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 6){ //SABADO
                
                foreach($listaFolgaCadastrada as $item){
                    //echo "banco " . $item->CmpDataInicio . "_ montada ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice){  $temp2 = "checked='checked'"; }
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2." disabled  name='dia".$sigla.$indice."' value='".$data.$indice."'> ".$indice."</td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$indice."' value='".$data.$indice."'></td></tr>";
            } 
            
            $i++;
        }
        return "<table border=0 class='form-group'>".$temp."</table>";
        
         /*return "    <div class='col-lg-12'>
                        <div style='height: 300px;'>
                                <div class='panel panel-primary'>
                                
                                        <div class='panel-heading'>
                                            ".$titulo."
                                        </div>

                                        <div class='panel-body'><table border=0 >".$semana.$temp."</table></div>
                                </div>      
                        </div> 
                    </div>";*/
    }
    
     public function MontarCalendarioEditar($data, $mes, $sigla, $listaFolgaCadastrada) {
       // $util -> MontarCalendarioEditar($janeiro, 1,"jan",$lista)
        $util = new \app\Util\Util(); 
        
        $desc = "";
        if($sigla == "jan") $desc = "JANEIRO";
        if($sigla == "fev") $desc = "FEVEREIRO";
        if($sigla == "mar") $desc = "MARÇO";
        if($sigla == "abr") $desc = "ABRIL";
        if($sigla == "mai") $desc = "MAIO";
        if($sigla == "jun") $desc = "JUNHO";
        if($sigla == "jul") $desc = "JULHO";
        if($sigla == "ago") $desc = "AGOSTO";
        if($sigla == "set") $desc = "SETEMBRO";
        if($sigla == "out") $desc = "OUTUBRO";
        if($sigla == "nov") $desc = "NOVEMBRO";
        if($sigla == "dez") $desc = "DEZEMBRO";
        
        $titulo = " <tr>
                       <td><b>Dom</b></td>
                       <td><b>Seg</b></td>
                       <td><b>Ter</b></td>
                       <td><b>Qua</b></td>
                       <td><b>Qui</b></td>
                       <td><b>Sex</b></td>
                       <td><b>Sáb</b></td>
                   </tr>";
        $i = 1;
        $indice = 1;
        $temp = "";  
        $temp2 = "";
        $bloqueio = "N";
                
        $diasMes = $util -> MesesAno($mes);
        
        while($i <= $diasMes){
            
            if($i < 10){
               $indice = "0".$i;               
            }else{
                //ECHO "MAIOR";
                $indice = $i;
            }
            
            if(date('w', strtotime($data.$indice)) == 0){
                
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$indice ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<tr><td width='70' ><input type='checkbox' ".$temp2."  name='dia".$sigla.$indice."' value='".$data.$indice."'> <b>".$indice."</b> </td>";
                $temp2 = "";
                $bloqueio = "S";
                
            }else{
                if($bloqueio == "N") $temp = $temp . "<tr><td><input type='checkbox'  name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 1){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2."   name='dia".$sigla.$indice."' value='".$data.$indice."'> <b>".$indice."</b> </td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox'  name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            } 
            
            if(date('w', strtotime($data.$indice)) == 2){ //TERCA
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$indice ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2."   name='dia".$sigla.$indice."' value='".$data.$indice."'> <b>".$indice." </b></td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                 if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox'  name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 3){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2."   name='dia".$sigla.$indice."' value='".$data.$indice."'> <b>".$indice."</b></td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox'  name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 4){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2."   name='dia".$sigla.$indice."' value='".$data.$indice."'> <b>".$indice." </b></td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox'  name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 5){
                foreach($listaFolgaCadastrada as $item){
                    //echo $item->CmpDataInicio . "_ ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice) $temp2 = "checked='checked'";
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2."   name='dia".$sigla.$indice."' value='".$data.$indice."'> <b>".$indice." </b></td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox'  name='dia".$sigla.$indice."' value='".$data.$indice."'></td>";
            }
            
            if(date('w', strtotime($data.$indice)) == 6){ //SABADO
                
                foreach($listaFolgaCadastrada as $item){
                    //echo "banco " . $item->CmpDataInicio . "_ montada ". $data.$i ."<BR>";
                    if($item->CmpDataInicio == $data.$indice){  $temp2 = "checked='checked'"; }
                }
                
                $temp = $temp . "<td width='70'><input type='checkbox' ".$temp2."   name='dia".$sigla.$indice."' value='".$data.$indice."'> <b>".$indice."</b></td>";
                $temp2 = "";
                $bloqueio = "S";
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox'  name='dia".$sigla.$indice."' value='".$data.$indice."'></td></tr>";
            } 
            
            $i++;
        }
        return "<table border=0 class='form-group'>".$titulo.$temp."</table>";
    }
    
    public function MontarCalendario($data, $mes,$sigla) {
        
        $util = new \app\Util\Util(); 
        
        $desc = "";
        if($sigla == "jan") $desc = "JANEIRO";
        if($sigla == "fev") $desc = "FEVEREIRO";
        if($sigla == "mar") $desc = "MARÇO";
        if($sigla == "abr") $desc = "ABRIL";
        if($sigla == "mai") $desc = "MAIO";
        if($sigla == "jun") $desc = "JUNHO";
        if($sigla == "jul") $desc = "JULHO";
        if($sigla == "ago") $desc = "AGOSTO";
        if($sigla == "set") $desc = "SETEMBRO";
        if($sigla == "out") $desc = "OUTUBRO";
        if($sigla == "nov") $desc = "NOVEMBRO";
        if($sigla == "dez") $desc = "DEZEMBRO";
        
        $titulo = "<B>".$desc. "</b>";     
        $semana = "<tr>
                                   <td><b>Dom</b></td>
                                   <td><b>Seg</b></td>
                                   <td><b>Ter</b></td>
                                   <td><b>Qua</b></td>
                                   <td><b>Qui</b></td>
                                   <td><b>Sex</b></td>
                                   <td><b>Sáb</b></td>
                               </tr>";
        $i = 1;
        $indice = 1;
        $temp = "";  
        $temp2 = "";
        $bloqueio = "N";
        
        //DIAS DA SEMANA
        $segunda_feira = 0;
        $terca_feira = 0;
        $quarta_feira = 0;
        $quinta_feira = 0;
        $sexta_feira = 0;
        $sabado_feira = 0;
        $domingo_feira = 0;
        
        $linha_adicional = ""; 
        
        $diasMes = $util -> MesesAno($mes);
        
        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            
            if(date('w', strtotime($data.$i)) == 0){
                               
                $temp = $temp . "<tr><td width='55'><input type='checkbox'  name='dia".$sigla.$i."' value='".$data.$i."'> ".$indice."</td>";                
                $bloqueio = "S";
               
                
            }else{
                if($bloqueio == "N") $temp = $temp . "<tr><td><input type='checkbox' disabled name='dia".$sigla.$i."' value='".$data.$i."'></td>";               
            }
            
            if(date('w', strtotime($data.$i)) == 1){                
                
                $temp = $temp . "<td width='55'><input type='checkbox'   name='dia".$sigla.$i."' value='".$data.$i."'> ".$indice."</td>";                
                $bloqueio = "S";               
                
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$i."' value='".$data.$i."'></td>";                 
            } 
            
            if(date('w', strtotime($data.$i)) == 2){
                
                $temp = $temp . "<td width='55'><input type='checkbox'  name='dia".$sigla.$i."' value='".$data.$i."'> ".$indice."</td>";               
                $bloqueio = "S";                
                
            }else{
                 if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$i."' value='".$data.$i."'></td>";                
            }
            
            if(date('w', strtotime($data.$i)) == 3){
                               
                $temp = $temp . "<td width='55'><input type='checkbox'  name='dia".$sigla.$i."' value='".$data.$i."'> ".$indice."</td>";                
                $bloqueio = "S";                
                
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$i."' value='".$data.$i."'></td>";               
            }
            
            if(date('w', strtotime($data.$i)) == 4){
                
                
                $temp = $temp . "<td width='55'><input type='checkbox'   name='dia".$sigla.$i."' value='".$data.$i."'> ".$indice."</td>";
                $temp2 = "";
                $bloqueio = "S";                
                
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$i."' value='".$data.$i."'></td>";                
            }
            
            if(date('w', strtotime($data.$i)) == 5){
                
                
                $temp = $temp . "<td width='55'><input type='checkbox'   name='dia".$sigla.$i."' value='".$data.$i."'> ".$indice."</td>";
                $temp2 = "";
                $bloqueio = "S";
                               
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$i."' value='".$data.$i."'></td>";               
            }
            
            
            if(date('w', strtotime($data.$i)) == 6){
                               
                $temp = $temp . "<td width='55'><input type='checkbox'   name='dia".$sigla.$i."' value='".$data.$i."'> ".$indice."</td>";                
                $bloqueio = "S";                
                
            }else{
                if($bloqueio == "N") $temp = $temp . "<td><input type='checkbox' disabled name='dia".$sigla.$i."' value='".$data.$i."'></td></tr>";                
            } 
            
            $i++;
        }
        
        
        //RETORNA CALENDARIO MONTADO
        return "    <div class='col-lg-12'>
                        <div style='height: 300px;'>
                                <div class='panel panel-primary'>
                                
                                        <div class='panel-heading'>
                                            ".$titulo."
                                        </div>

                                        <div class='panel-body'><table border=0 >".$semana.$temp."</table></div>
                                </div>      
                        </div> 
                    </div>";
    }
    
        
   
    
    //FUNÇÃO DE TESTE DE VARIAVEL
    public function TestaVariavel($param1,$param2){
        //echo "<BR>----" . $param1 . "-".$param2 . "<BR>";
        $retorno = "SIM"; 
        
        if(trim($param1) == trim($param2)){
            $retorno = "NAO";           
        }
        
        return $retorno;
        
    }
    
    
    /**
     * RETORNA PARTES DA DATA
     * @param type $data, $tipo = ano ou mes
     */
    public function RetornaParteData($data, $tipo) {
        
        $retorno = "";
        
        $tam = strlen(trim($data));
        if($tipo == "ano") $retorno = substr(trim($data), $tam-4, $tam);            
        if($tipo == "mes") $retorno = substr(trim($data), $tam-7, 2);
        
        return $retorno;
        
    }
    
    public function TestaVariavelRequest($param) {
        $variavel = null;        
        if($param != ""){
            $variavel = $param;
        }
        
        return $variavel;
    }
    
     //FORMATAR DATA
    public function DashboardContas($mesAno) {

        if ($mesAno != "") {
            
            list($mes, $ano) = explode("_", $mesAno);

            if($mes == "01") $mes = "JAN";
            if($mes == "02") $mes = "FEV";
            if($mes == "03") $mes = "MAR";
            if($mes == "04") $mes = "ABR";
            if($mes == "05") $mes = "MAI";
            if($mes == "06") $mes = "JUN";
            if($mes == "07") $mes = "JUL";
            if($mes == "08") $mes = "AGO";
            if($mes == "09") $mes = "SET";
            if($mes == "10") $mes = "OUT";
            if($mes == "11") $mes = "NOV";
            if($mes == "12") $mes = "DEZ";
            
            return $mes . "/" . $ano;
        } 
    }
    
    /**
     * 
     * @param type $mes
     * @return int
     */
    public function AcaoTomada($id){
 
        $result = "";
        
        switch ($id) {
            case 1:
                $result = "CAN";
                break;
            case 2:
                $result = "CON";
                break;
            case 3:
                $result = "ORC";
                break;
            case 4:
                $result = "PSE";
                break;
            case 5:
                $result = "PMA";
                break;
            case 6:
                $result = "ATD";
                break;
            case 7:
                $result = "SUS";
                break;
                     
        }
        
        return $result;   
    }
    
    /*FUNÇÃO PARA RETIRAR PONTOS E VÍRGULAS*/
    public function RetirarPonto_PontoVirgula($numero){
        /*echo "ORiginal " . $numero . "<BR>";
        echo " Convertido ". str_replace(",",".",str_replace(".","",$numero));*/
        if($numero != "")  return str_replace(",",".",str_replace(".","",$numero));
    }
    
    public function FormatNumber($numero){ 
        //echo "teste " . $numero . "<BR>";
        if($numero != "" && $numero != null && $numero > 0){
            //echo $numero." - form ". number_format($numero, 2, ",",".") . "<BR>";
            return number_format($numero, 2, ",",".");
        }else{
            //echo $numero." - naoform<BR>";
            return $numero;
        }
    }
    
    /**
     * 
     * @param type $request
     * @param type $j
     * @return type number. Retorna o valor de variação de cada conta e mês da previsão orçamentária
     */
    /*public function VariacaoPrevisaoOrcamentaria($request,$j){
 
        $resultado = 0;
        //echo $this ->RetirarPonto_PontoVirgula($request->input("jan_d_".$j)). " - ". $request->input("jan_d_hidden_".$j) . "<BR>";
        if($this ->RetirarPonto_PontoVirgula($request->input("jan_d_".$j)) != $request->input("jan_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("jan_d_".$j)) - $request->input("jan_d_hidden_".$j));
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("fev_d_".$j)) != $request->input("fev_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("fev_d_".$j)) - $request->input("fev_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("mar_d_".$j)) != $request->input("mar_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("mar_d_".$j)) - $request->input("mar_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("abr_d_".$j)) != $request->input("abr_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("abr_d_".$j)) - $request->input("abr_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("mai_d_".$j)) != $request->input("mai_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("mai_d_".$j)) - $request->input("mai_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("jun_d_".$j)) != $request->input("jun_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("jun_d_".$j)) - $request->input("jun_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("jul_d_".$j)) != $request->input("jul_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("jul_d_".$j)) - $request->input("jul_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("ago_d_".$j)) != $request->input("ago_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("ago_d_".$j)) - $request->input("ago_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("set_d_".$j)) != $request->input("set_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("set_d_".$j)) - $request->input("set_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("out_d_".$j)) != $request->input("out_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("out_d_".$j)) - $request->input("out_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("nov_d_".$j)) != $request->input("nov_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("nov_d_".$j)) - $request->input("nov_d_hidden_".$j));       
        }
        
        if($this ->RetirarPonto_PontoVirgula($request->input("dez_d_".$j)) != $request->input("dez_d_hidden_".$j)){
            $resultado = $resultado + ($this ->RetirarPonto_PontoVirgula($request->input("dez_d_".$j)) - $request->input("dez_d_hidden_".$j));       
        }            
        
        
        return $resultado;   
    }
    */
    function limpaCampos($campo){

            $checagem = 0;
            $campo = ltrim($campo); //Retira o espaco a esquerda do campo.
            $campo = rtrim($campo); // Retira o espaco a direita do campo
            $campo = strtolower($campo);
            
            if(strpos($campo,"'") > 0) $checagem++;
            if(strpos($campo,"select") > 0) $checagem++;
            if(strpos($campo,"from") > 0) $checagem++;
            if(strpos($campo,"insert") > 0) $checagem++;
            if(strpos($campo,"into") > 0) $checagem++;
            if(strpos($campo,"count") > 0) $checagem++;
            
            if(strpos($campo,"max") > 0) $checagem++;
            if(strpos($campo,"delete") > 0) $checagem++;
            if(strpos($campo,"drop") > 0) $checagem++;
            if(strpos($campo,"*") > 0) $checagem++;
            if(strpos($campo,"`") > 0) $checagem++;
            if(strpos($campo,":") > 0) $checagem++;
            if(strpos($campo,"~") > 0) $checagem++;
            if(strpos($campo,"^") > 0) $checagem++;
          
            return $checagem;

    }


    public function MontagemSQLFolga($request) {
        
        $util = new \App\Util\Util();
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $i = 1;
        $indice = "";
        $listaSQL_JAN = "";
        $listaSQL_FEV = "";
        $listaSQL_MAR = "";
        $listaSQL_ABR = "";
        $listaSQL_MAI = "";
        $listaSQL_JUN = "";
        $listaSQL_JUL = "";
        $listaSQL_AGO = "";
        $listaSQL_SET = "";
        $listaSQL_OUT = "";
        $listaSQL_NOV = "";
        $listaSQL_DEZ = "";
        $listaSQL = "";
        
        
        $diasMes = $util -> MesesAno(1);
        //echo "<BR>";
        $ano = $seguranca -> decripto($request->input("val2"));
        $funcionario = $request->input("funcionario");
        
        
        while($i <= $diasMes){
            
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            //echo "teste ". $request->input("diajan".$indice);
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diajan".$indice) != ""){
                $listaSQL_JAN =  $listaSQL_JAN . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diajan".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_JAN = substr($listaSQL_JAN,0,strlen($listaSQL_JAN)-1);

        $i = 1;
        $diasMes = $util -> MesesAno(2);

        while($i <= $diasMes){
            
             if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diafev".$indice) != ""){
                $listaSQL_FEV =  $listaSQL_FEV . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diafev".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_FEV = substr($listaSQL_FEV,0,strlen($listaSQL_FEV)-1);

        $i = 1;
        $diasMes = $util -> MesesAno(3);

        while($i <= $diasMes){
            
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diamar".$indice) != ""){
                $listaSQL_MAR =  $listaSQL_MAR . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diamar".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_MAR = substr($listaSQL_MAR,0,strlen($listaSQL_MAR)-1); 

        //ABRIL
        $i = 1;
        $diasMes = $util -> MesesAno(4);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diaabr".$indice) != ""){
                $listaSQL_ABR =  $listaSQL_ABR . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diaabr".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_ABR = substr($listaSQL_ABR,0,strlen($listaSQL_ABR)-1); 

        //MAIO
        $i = 1;
        $diasMes = $util -> MesesAno(5);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diamai".$indice) != ""){
                $listaSQL_MAI =  $listaSQL_MAI . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diamai".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_MAI = substr($listaSQL_MAI,0,strlen($listaSQL_MAI)-1);

        //JUNHO
        $i = 1;
        $diasMes = $util -> MesesAno(6);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diajun".$indice) != ""){
                $listaSQL_JUN =  $listaSQL_JUN . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diajun".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_JUN = substr($listaSQL_JUN,0,strlen($listaSQL_JUN)-1);

        //JULHO
        $i = 1;
        $diasMes = $util -> MesesAno(7);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diajun".$indice) != ""){
                $listaSQL_JUL =  $listaSQL_JUL . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diajun".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_JUL = substr($listaSQL_JUL,0,strlen($listaSQL_JUL)-1);

        //AOGSTO
        $i = 1;
        $diasMes = $util -> MesesAno(8);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diaago".$indice) != ""){
                $listaSQL_AGO =  $listaSQL_AGO . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diaago".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_AGO = substr($listaSQL_AGO,0,strlen($listaSQL_AGO)-1);

        //SETEMBRO
        $i = 1;
        $diasMes = $util -> MesesAno(9);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diaset".$indice) != ""){
                $listaSQL_SET =  $listaSQL_SET . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diaset".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_SET = substr($listaSQL_SET,0,strlen($listaSQL_SET)-1);

        //OUTUBRO
        $i = 1;
        $diasMes = $util -> MesesAno(10);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diaout".$indice) != ""){
                $listaSQL_OUT =  $listaSQL_OUT . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diaout".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_OUT = substr($listaSQL_OUT,0,strlen($listaSQL_OUT)-1);

        //NOVEMBRO
        $i = 1;
        $diasMes = $util -> MesesAno(11);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("dianov".$indice) != ""){
                $listaSQL_NOV =  $listaSQL_NOV . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("dianov".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        $listaSQL_NOV = substr($listaSQL_NOV,0,strlen($listaSQL_NOV)-1);

        //DEZEMBRO
        $i = 1;
        $diasMes = $util -> MesesAno(12);

        while($i <= $diasMes){
            if($i < 10){
                $indice = "0".$i;
            }else{
                $indice = $i;
            }
            /**
             * INSERT INTO `ocorrencias`(`idocorrencias`, `CmpTipoOcorrencia`, `CmpStatus`, `CmpDataInclusao`, `CmpDataInicio`, 
             * `CmpDataFim`, `CmpObs`, `condominio_idcondominio`, `funcionario_idfuncionario`) 
             * VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
             * */
            if($request->input("diadez".$indice) != ""){
                $listaSQL_DEZ =  $listaSQL_DEZ . "(3,'".$ano."','ATV','".date("Y-m-d")."','".$request->input("diadez".$indice)."',null,null,".Auth::user()->condominio_idcondominio.",".$funcionario."),";
            }

            $i++;
        }
        
        $listaSQL_DEZ = substr($listaSQL_DEZ,0,strlen($listaSQL_DEZ)-1);

        //echo "ECHO " . count($listaSQL_FEV) ."<BR>";
        if($listaSQL_JAN != ""){
            $listaSQL = $listaSQL_JAN.",";
        }
        if($listaSQL_FEV != ""){
            $listaSQL = $listaSQL . $listaSQL_FEV.",";
        }
        if($listaSQL_MAR != ""){
            $listaSQL = $listaSQL . $listaSQL_MAR.",";
        }
        if($listaSQL_ABR != ""){
            $listaSQL = $listaSQL . $listaSQL_ABR.",";
        }
        if($listaSQL_MAI != ""){
            $listaSQL = $listaSQL . $listaSQL_MAI.",";
        }
        if($listaSQL_JUN != ""){
            $listaSQL = $listaSQL . $listaSQL_JUN.",";
        }
        if($listaSQL_JUL != ""){
            $listaSQL = $listaSQL . $listaSQL_JUL.",";
        }
        if($listaSQL_AGO != ""){
            $listaSQL = $listaSQL . $listaSQL_AGO.",";
        }
        if($listaSQL_SET != ""){
            $listaSQL = $listaSQL . $listaSQL_SET.",";
        }
        if($listaSQL_OUT != ""){
            $listaSQL = $listaSQL . $listaSQL_OUT.",";
        }
        if($listaSQL_NOV != ""){
            $listaSQL = $listaSQL . $listaSQL_NOV.",";
        }
        if($listaSQL_DEZ != ""){
            $listaSQL = $listaSQL . $listaSQL_DEZ.",";
        }

        //echo "teste " .$listaSQL;
        //CONSOLIDAÇÃO DOS MESES
        return $listaSQL = substr($listaSQL,0,strlen($listaSQL)-1);
    }

    /**
     * MONTAGEM DA TELA DE CADASTRO DE PREVISÃO ORÇAMENTÁRIA.
     * @param type $request
     */
    public function TelaPrevisaoOrcamentaria($listaPlanoContasDES) {
        $i = 1;
        $listaAba = "";
        $listaItem = "";
        $cabeclahoAba = "<ul id='myTab' class='nav nav-tabs nav-justified'>";
        $cabecalhoItem = "<div id='myTabContent' class='tab-content'>";
        
        foreach($listaPlanoContasDES as $item){
        
            $listaAba = $listaAba . "<li class=''><a href='#service-".$i."' data-toggle='tab'><i class='fa fa-tree'></i>".$item->CmpNomeConta."</a>  </li>";
            $listaItem = $listaItem . "<div class='tab-pane fade active in' id='service-1'>".$item->CmpNomeConta."</div>";
            $i++;    
        } 
       

        $cabeclahoAba = $cabeclahoAba . $lista . "</ul>";
        $cabecalhoItem = $cabecalhoItem . $listaItem . "</div>"; 
        
        return $cabeclahoAba . $cabecalhoItem;
    }
	
     /**
     * MONTAGEM DA TELA DE CADASTRO DE PREVISÃO ORÇAMENTÁRIA.
     * @param type $request
     */
    public function GridRelatorioEntrega($lista){
        
        $retorno = "";
    
        $retorno = "<table class='table table-striped table-bordered table-hover'>
            <thead>
                <tr>
                     <th>Código </th>
                    <th>Emissão</th>

                    <th>Baixa </th>
                    <th>Apto/Bloco </th>

                    <th>Assinatura </th>
                    <th>Data </th>


                </tr>
            </thead>
            <tbody>";


            foreach($lista as $item){
                        $retorno = $retorno . "<tr class='odd gradeX'>

                            <td width='10'>". $item->CmpCodigoUnico. "</td>
                            <td width='10'>". $item->CmpDataInclusao ."</td>

                            <td width='10'>". $item->CmpDataBaixa ."</td>
                            <td width='10'>". $item->CmpApto."-".$item->CmpBloco ."</td>
                            <td width='300'></td>
                            <td width='100'></td>


                        </tr>";

            }

            $retorno = $retorno ."</tbody>
        </table>";
            
            return $retorno;
    }
      
    
    public function MaxTamanhoCampo($tipoCampo) {
        
        $tamanho = "";
        
        switch ($tipoCampo) {
            case "user":
                $tamanho = 100;
                break;
            case "email":
                $tamanho = 100;
                break;
            case "tel":
                $tamanho = 15;
                break;
            case "trabalho":
                $tamanho = 100;
                break;
            case "doc":
                $tamanho = 20;
                break;
            case "calendar":
                $tamanho = 10;
                break;
            case "generico":
                $tamanho = 100;
                break;  
            case "car":
                $tamanho = 30;
                break;  
            case "valor":
                $tamanho = 20;
                break;
            case "money":
                $tamanho = 20;
                break;
            case "codigo":
                $tamanho = 30;
                break;
            case "casa":
                $tamanho = 200;
                break;
                     
        }
        
        return $tamanho;
    }
    
    public function MontarCombo($anoAtual,$anoParametro) {
        $item = "";
        if($anoAtual == $anoParametro){            
            $item = "<option value='".$anoParametro."' selected>".$anoParametro."</option>";
        }else{            
            $item = "<option value='".$anoParametro."' >".$anoParametro."</option>";
        }
        return $item;
    }
    
    public function MontarMesAno($data) {
        $tam = strlen(trim($data));
        $ano = substr(trim($data), $tam-4, $tam);
        $mes = substr(trim($data), 3, 2);
        return $mes."_".$ano;
    }
    
    /**
     * Enquadramento do bem
     */
    public function Enquadramento($id){
        
        $retorno = "";
        switch ($id) {
            case 1:
                $retorno = "Edificação";
                break;
            case 2:
                $retorno = "Máquinas e Equipamentos";
                break;
            case 3:
                $retorno = "Instalações";
                break;
            case 4:
                $retorno = "Móveis e Utensílios";
                break;
            case 5:
                $retorno = "Veículos";
                break;
            case 6:
                $retorno = "Computadores e Periféricos";
                break;
        }
    return $retorno;
    } 
    
    
    /**
     * 
     * @param type $param
     * Objetivo: separar elementos das datas.
     */
    public function SplitDate($param) {
        
        //echo " DATA " . $param . "<BR>";
        $data = array();
        
        //echo $nomeConta;
        $tam = strlen(trim($param));
        //echo "<br>";
        $data["ano"] = substr($param, $tam-4, $tam);
        //echo "<BR>";
        $data["mes"] = substr($param, 3, 2);
        
        return $data;
        
    }
    
    /**
     * MODELO DE MSG PARA ENVIO DE EMAIL
     */
    
    //MODELOS DE MENSAGEM PARA INSTRUÇÕES DE ATIVAÇÃO DE USUÁRIO
    public function ModeloEmailInstrucoes(){
        
        return $corpus = "<table border=0>"
                        .   "<tr>"
                . "             <td><center><img src='https://www.gs2i.com.br/gs2i-homologacao/public/img/boasVindas2.gif'></center></td>"
                . "          </tr>"
                        .   "<tr>"
                . "             <td>&nbsp;</td>"
                . "         </tr>"
                        .   "<tr>"
                . "             <td><font size='5'>Para ter acesso ao sistema, acesso o endereço www.gs2i.com.br e clique no link ATIVAR USUÁRIO, como na figura abaixo.</font></td>"
                . "         </tr>"
                        .   "<tr>"
                . "             <td><center><img src='https://www.gs2i.com.br/gs2i-homologacao/public/img/instrucao_1.gif'></center></td>"
                . "          </tr>"
                        .   "<tr>"
                . "             <td>&nbsp;</td>"
                . "         </tr>"
                .   "<tr>"
                . "             <td><font size='5'>Em sequida, surgirá um formulário para preenchimento com o email de cadastro e um código de controle, como na figura abaixo.</font></td>"
                . "         </tr>"
                        .   "<tr>"
                . "             <td><center><img src='https://www.gs2i.com.br/gs2i-homologacao/public/img/instrucao_2.gif'></center></td>"
                . "          </tr>"
                        .   "<tr>"
                . "             <td>&nbsp;</td>"
                . "         </tr>"
                .   "<tr>"
                . "             <td><font size='5'>Pronto! Seu usuário está ativado! Um email contendo seu usuário e senha foi enviado para sua caixa de correio eletrônico.</td>"
                . "         </tr>"
                        .   "<tr>"
                . "             <td><center><img src='https://www.gs2i.com.br/gs2i-homologacao/public/img/rodape.jpg'></td></CENTER>"
                . "         </tr>"
                        . "</table>";
    }
    
    /**
     * BANDEIRA DE FUNDO PARA O PAINEL
     */
    public function BandeiraPainelControle($tipo){
    
       if($tipo == "DOC"){
           return "primary";
       } 
       if($tipo == "AVI"){
           return "yellow";
       }
       if($tipo == "EVE"){
           return "primary";
       }
       if($tipo == "CLA"){
           return "success";
       }
       if($tipo == "BVD"){
           return "red";
       }
    }
    
    
    public function StatusPagamento($sigla) {
        
        $status = "";
       
        switch ($sigla) {
            case "BAI":
                $status = "BAIXA";
                break;
            case "SUS":
                $status = "SUSPENSO";
                break;
            case "DTV":
                $status = "CANCELADO";
                break;
            case "PEN":
                $status = "PENDENTE";
                break;
            case "VEN":
                $status = "VENCIDO";
                break;
            case "AVE":
                $status = "A VENCER";
                break;
                     
        }
        
        return $status;
    }
    
    /**
     * PERIODO PARA MANUTENÇÃO DE EQUIPAMENTOS EM GERAL
     */
    
    public function Periodo($periodo) {
        
        $status = "";
       
        switch ($periodo) {
            case 1:
                $status = "DIÁRIO";
                break;
            case 2:
                $status = "SEMANAL";
                break;
            case 3:
                $status = "QUINZENAL";
                break;
            case 4:
                $status = "MENSAL";
                break;
            case 5:
                $status = "TRIMESTRAL";
                break;
            case 6:
                $status = "SEMESTRAL";
                break;
            case 7:
                $status = "ANUAL";
                break;
                     
        }
        
        return $status;
    }
    
    
    /***
     * VERIFICAÇÃO DO DISPOSITIVO EM USO
     */
    function ChecarDispositivo() {
        
            $dispositivo = "";

            $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
            $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
            $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
            $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
            $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
            $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
            $symbian = strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
            $windowsphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");

            if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) {
               $dispositivo = "mobile";
             }

            else { $dispositivo = "computador";} 

            return $dispositivo;
    }
    
    /***
     * FORMATAR DATA 
     */
   
    public function DataManutencaoFinal($idPeriodoMnt,$dataInicioMnt) {
        
        $tempo = "";
        
        switch ($idPeriodoMnt) {
            case 1:
                $tempo = "+1 days";
                break;
            case 2:
                $tempo = "+7 days";
                break;
            case 3:
                $tempo = "+15 days";
                break;
            case 4:
                $tempo = "+30 days";
                break;
            case 5:
                $tempo = "+90 days";
                break;
            case 6:
                $tempo = "+180 days";
                break;
            case 7:
                $tempo = "+365 days";
                break;
                     
        }
        
        return date('d/m/Y', strtotime($tempo, strtotime($dataInicioMnt)));

    }
    
    
    public function IntervaloPreManutencao($idPeriodoMnt) {
     
        $tempo = 0;
        
        switch ($idPeriodoMnt) {
            case 1:
                $tempo = 0;
                break;
            case 2:
                $tempo = 3;
                break;
            case 3:
                $tempo = 5;
                break;
            case 4:
                $tempo = 15;
                break;
            case 5:
                $tempo = 30;
                break;
            case 6:
                $tempo = 30;
                break;
            case 7:
                $tempo = 60;
                break;
          
        }
        
        return $tempo;
    }
    
    public function ChecarManutencaoEquipamento($periodo,$dataMnt) {

        $teste = "";
        $inicio = date('Y-m-d'); 
        
        //echo $periodo . " - " . $dataMnt;
        $fim = $this -> formatarDataMysql($this -> DataManutencaoFinal($periodo,$this->formatarDataMysql($dataMnt)));
        $tipo = "d";
        $tempoRestante = $this -> diff($inicio, $fim, $tipo);
        //echo "<BR>";

        $intervaloPreManutencao = $this -> IntervaloPreManutencao($periodo);

        $teste = "";
        if($tempoRestante <= $intervaloPreManutencao){
            $teste = "NOK";
        }else{
            $teste = "OK";
        }
        
        return $teste;
    } 
    
    
    /**
     * FAZ O TRATAMENTO DOS CODIGOS DE BARRAS
     */
    
    public function CodigoBarras($codigoBarras) {
        
        return substr($codigoBarras, 9, 3);
        
    }
}
