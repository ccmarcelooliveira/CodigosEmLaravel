
@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
    
    $("#vencto").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#baixa").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
     $("#emissao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
    
    
    function realod(){
            window.opener.location.reload(); 
            window.close();
    }
    
    function imprimir(){
         window.print();
    }
</script> 

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        
            <?php if($op == "N"){ ?>
            <div class='col-lg-12'>                
                <form method="post" name="form"  id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Selecione a data desejada
                        </div>
                        <div class='panel-body'>

                            <div class="col-lg-12">

                                <?php echo $formulario; ?>   

                                {{csrf_field()}}

                            </div>

                         </div>                                                
                    </div>    <!-- /.table-responsive -->
                </form>             
            </div>
            <?php } ?>
        
            @if(isset($lista) && count($lista) > 0)
            <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Entregas Registradas
                    </div>
                    <div class="panel-body">

                        <?php  $util = new \App\Util\Util(); 
                                echo $util -> GridRelatorioEntrega($lista); 
                        ?>
                        
                        <?php   $variavel = new \App\Classes\VariavelModel();                                   
                                 $caminho  = $variavel-> rotaView(); ?> 
                        <p align="right">
                            <button type="button" class="btn btn-success" onclick="imprimir()">
                                Imprimir
                            </button>
                            <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>relEnt',900,700)">
                               Novo Relatório
                            </button>
                        </p>    
                    </div>
                    <div class="panel-body">
                        <div class='alert alert-success'>Rio de Janeiro, <?php echo date("d/m/Y") ?> </div>
                    </div> 
                </div>    
                @else
                    @if(isset($lista) && count($lista) == 0)
                        <div class="panel-body">
                           <div class='alert alert-success'>Não há entregas para o período!</div>
                        </div>
                    @endif
                   
            </div>    
            @endif 
@endsection