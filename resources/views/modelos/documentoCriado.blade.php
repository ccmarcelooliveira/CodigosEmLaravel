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
<html>

<head>

	<title><?php echo $nome ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
  
        <div class="container">
            
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <table>
                            <tr><td><img id="thumb" src="{{asset($data["imagem"])}}" height="50" alt=""></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td valign="top"><font size="3"><?php echo $nome  ?></font><br>
                                    <font size="2"><?php echo $endereco ?></font>
                                    <br><font size="1">Tel.:<?php echo $tel ?> <br>
                                    <?php echo $email ?></font>
                                </td></tr>
                        </table>    
                    </div>

            </div>
               
            <?php
            
                $itens = explode('\***/',$texto); 
                
                $util = new \app\Util\Util();
                //$itens[1] = $util ->formatarDataMysqlParaExibicao($itens[1]);
            ?>
                            
                        
            <div class='col-lg-12'>
                <center>
                    <h3 class='page-header'>Inventário do Condomínio
                        <align="right"><small> </small></align>
                    </h3>
                </center>
                
                <div class="col-lg-12">                    
                        <!-- /.panel-heading -->
                        <table width="100%" border="0">
                            <tr><td align="center"><b>Aquisição</b></td>
                                <td align="center"><b>Bem</b></td>
                                <td align="center"><b>Localização</b></td>
                                <td align="center"><b>Categoria</b></td>
                                <td align="center"><b>Atual</b></td></tr>
                            <tr><td align="center">&nbsp;</td>
                                <td align="center">&nbsp;</td>
                                <td align="center">&nbsp;</td>
                                <td align="center">&nbsp;</td>
                                <td align="center">&nbsp;</td></tr>
                            <?php 
                            
                                foreach($lista as $item){
                                
                            ?>
                                   <tr><td align="center"><?php echo $item->CmpDataInclusao ?></td>
                                       <td align="center"><?php echo $item->CmpNome ?></td>
                                       <td align="center"></td>
                                       <td align="center"></td>
                                       <td align="center"><?php echo $item->CmpValorAquisicao ?></td></tr>
                            <?php 
                            
                                }
                                
                            ?>        
                        </table>    
                        <!-- /.panel-body --> 
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
           
            
        </div>  
    
        <center>
            <h5 class='page-header'>Documento gerado em: <?php echo date("d/m/Y") ?>
                <align="right"><small> </small></align>
            </h5>
        </center>
    </body>
</html>
