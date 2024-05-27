
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
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
<script type="text/javascript">
    function capturarImagem() {
        preview_snapshot();
        save_photo();
    }
</script>

        <?php echo $barra_funcionalidade ?>
        
               
             
             
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Cadastro de Visitantes
                    </div>
                    <div class='panel-body'>

                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">
                                <div class="col-lg-12">

                                    <div class="col-lg-4">

                                            <?php echo $formulario; ?>                        

                                            {{csrf_field()}}

                                    </div>
                                    <div class='col-lg-8'>
                                        <p align='right'>      

                                            <?php echo $formulario2; ?> <br>       

                                        </p>
                                    </div>
                                    
                                </div>
                            </form>

                     </div>                                                
                </div>
        </div>
           
@endsection
