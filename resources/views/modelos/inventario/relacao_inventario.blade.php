<!DOCTYPE html>
<?php

    //GRADE DE SEGURANCA
    $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
    
      
    $factory = new \App\DesignPattern\FactoryMethod();
    $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
    $pastaCON = $factory ->GetClassVariavel() ->Path($pasta, "CON", "PARCIAL");
   
    
    //BUSCAR IMAGEM DO VEICULO
    $anexoModel = new \App\Classes\AnexoModel();
    if($anexoModel ->recuperaAnexo(Auth::user()->condominio_idcondominio, "COND") != ""){
        $data["imagem"] = $pastaCON.$anexoModel ->recuperaAnexo(Auth::user()->condominio_idcondominio, "COND");   
    }else{
        $data["imagem"] = "img/condominio.png";
    }       
    
    $nome = "";
    $endereco = "";
    $tel = "";
    $email = "";
    //RECUPERAR INFORMAÇÕES DO CONDOMINIO
    $condominio = \App\Condominio::find(Auth::user()->condominio_idcondominio);
    if($condominio != ""){
        $nome = $condominio -> CmpRazaoSocial;
        $endereco = $condominio -> CmpLogradouro;
        $tel = $condominio -> CmpTelFixo;
        $email = $condominio -> CmpEmail;
    }
    
    //CONSULTAR BENS DO CONDOMINIO
    $bemModel = new \App\Classes\BemModel();
    $lista = $bemModel -> ConsultaBem($seguranca->cripto(0));
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3><?php echo $nome  ?></h3>
                <pre>
				<?php echo $endereco ?>
				<br /><br />
				Date: 2018-01-01
				Identifier: #uniquehash
				Status: Paid
				</pre>


            </td>
            <td align="center">
                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>GS2I - </h3>
                <pre>
                    http://www.gs2i.com.br

                    
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Inventário do Condomínio</h3>
    <table width="100%">
        <thead>
       <tr><td align="center"><b>Aquisição</b></td>
                <td align="center"><b>Bem</b></td>
                <td align="center"><b>Localização</b></td>
                <td align="center"><b>Categoria</b></td>
                <td align="center"><b>Atual</b></td></tr>
        </thead>
        <tbody>
         
         
            <tr><td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td></tr>
            <?php 

                foreach($lista as $item){

                    //BUSCAR IMAGEM
                    $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);

            ?>
                   <tr><td align="center"><?php echo $item->CmpDataInclusao ?></td>
                       <td align="center"><?php echo $item->CmpNome ?></td>
                       <td align="center"></td>
                       <td align="center"></td>
                       <td align="center">R$ <?php echo $item->CmpValorAquisicao ?></td></tr>
            <?php 

                }

            ?>     
        </tbody>

        <tfoot>
        <tr><td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td></tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                <img src="{{asset("img/modelo_gs2i-7.png")}}" height="20"> - Gestão Social Integrada e Inteligente
            </td>
        </tr>

    </table>
</div>
</body>
</html>
