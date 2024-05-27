
@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
   
    $("#datamnt").datepicker({
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
                        Cadastrar Manutenção
                    </div>
                    <div class='panel-body'>

                            <div class="row">
                                <form method="post" id="registration-form" id="form" name="form" data-toggle="validator" enctype="multipart/form-data">
                                   <div class="col-lg-4">
                                       <P><P>
                                        
                                        <P><P>
                                            <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
                                        
                                               <?php echo $formulario; ?>  
                                        
                                   </div>
                                   <div class="col-lg-8">
                                       <P><P>
                                           
                                           <?php echo $passo_a_passo; ?>
                                           <?php echo $formulario2; ?>  

                                           <!--
                                               faz a validacao para erro crsf. tokenizacao
                                           -->
                                           {{csrf_field()}}

                                   </div>
                               </form>

                           </div>

                     </div>                                                
                </div>
        </div>               
                
        
@endsection