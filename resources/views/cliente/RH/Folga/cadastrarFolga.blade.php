@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dtEntrada").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#dtSaida").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
   
});
</script>
<script type="text/javascript">
$(document).ready(function(){

$('.demo1').on('click', function(){
$.goNotification('jQueryScript.net');
});

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

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->        
                      
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Registro de Folgas
                    </div>
                    <div class='panel-body'>
                        
                        <form method="post" id="registration-form">
                                <div class="col-lg-4">
                                    
                                    <?php echo $formulario1; ?><P><P>&nbsp;<input type='submit' value='Definir Ano' class='btn btn-success'>
                                    {{csrf_field()}}
                                </div>
                        </form>    
                        <form method="post" id="registration-form">
                                <?php if($botao == "S"){ ?>
                                    <div class="col-lg-8">                                    
                                        <?php echo $formulario2; ?>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-4">
                                    
                                    <?php echo $janeiro ?> 
                                </div>
                                <div class="col-lg-4">
                                    
                                    <?php echo $fevereiro ?> 
                                </div>
                                <div class="col-lg-4">
                                    
                                    <?php echo $marco ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $abril ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $maio ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $junho ?> 
                                </div>
                                    <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $julho ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $agosto ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $setembro ?> 
                                </div>
                                    <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $outubro ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $novembro ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $dezembro ?> 
                                </div>
                                 {{csrf_field()}}
                                
                                <?php if($botao == "S"){ ?> 
                                    <div class="col-lg-12">
                                        <p align='right'>  
                                            <input type='submit' value='Enviar' class='btn btn-success'>
                                        </p> 
                                    </div>    
                                <?php } ?>
                        </form>

                    </div> 
                    
                    
                </div>
        </div>
   
        
        
@endsection