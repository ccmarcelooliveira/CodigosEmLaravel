<!DOCTYPE html>

<html>

<head>

	<title>Condominio Mirante do Rio - Relatorio de Intentario</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<?php

    $factory = new \App\DesignPattern\FactoryMethod();
    $pasta = $factory -> GetClassVariavel() -> ConsultaPasta("CON");
    
    //BUSCAR IMAGEM DO VEICULO
    $anexoModel = new \App\Classes\AnexoModel();
    if($anexoModel ->recuperaAnexo(Auth::user()->condominio_idcondominio, "COND") != ""){
        $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo(Auth::user()->condominio_idcondominio, "COND");   
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
    
?>
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
            <div class='col-lg-10'>
                    <h1 class='page-header'>Relatório de Inventário
                        <align="right"><small> </small></align>
                    </h1>
                </div>
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div>
                            <div>
                                <table border="0">
                                    <thead>
                                        <tr>
                                            <th align="center"><font size="2">Aquisição&nbsp;&nbsp;</font></th>                                            
                                            <th><font size="2">&nbsp;Localização&nbsp;</font></th>
                                            <th><font size="2">&nbsp;Bem</font></th>
                                            <th><font size="2">&nbsp;Categoria&nbsp;</font></th>
                                            <th><font size="2">&nbsp;$ Atual&nbsp;</font></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
echo $teste;
                                                        $linhas = explode('--FINAL--',$texto); 

                                                        for ($i = 0; $i < count($linhas); $i++)
                                                        {

                                                    ?>        
                                                            <tr > 
                                                                
                                                                <?php
                                                                    $bens = explode('\***/',$linhas[$i]); 

                                                                    for ($j = 0; $j < count($bens); $j++)
                                                                    {
                                                                        if($j == 0) $tamanho = 40;
                                                                        if($j == 1) $tamanho = 100;
                                                                        if($j == 2) $tamanho = 200;
                                                                        if($j == 3) $tamanho = 100;
                                                                        if($j == 4) $tamanho = 100;
                                                                        
                                                                ?>    
                                                                <td width='<?php echo $tamanho; ?>'> <font size="1"><?php echo $bens[$j]; ?></font></td>
                                                                <?php
                                                                    }

                                                                ?>
                                                            </tr>
                                                    <?php         

                                                        }   
                                                    ?>
                                        
                                       
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                     
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
           
            
        </div>  
    
        
    </body>
</html>
