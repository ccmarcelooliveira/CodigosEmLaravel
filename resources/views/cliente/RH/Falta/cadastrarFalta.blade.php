
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
                        Cadastro de Falta
                    </div>
                    <div class='panel-body'>

                        <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">                    

                                <div class="col-lg-12">                                
                                    <?php echo $formulario1; ?> 
                                    <!--
                                        faz a validacao para erro crsf. tokenizacao
                                    -->
                                    {{csrf_field()}}
                                </div>

                        </form> 

                    </div>                                                
                </div>
        </div>
   
        
        
@endsection