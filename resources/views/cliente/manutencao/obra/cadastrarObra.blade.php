
@extends('master.layout')

@section('conteudo')
<script>
$(function(){
    
    $("#dtInicio").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    $("#dtFim").datepicker({
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

<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        
    <div id="page-wrapper">
        
         <div class="row">
             <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                <div class="col-lg-12">
                            
                <div class="tab-pane fade active in" id="service-one">
                    <P><P>
                    <center>
                                            <img id="thumb" src="{{asset("img/carro_imagem.jpg")}}" height="250" alt=""><p>
                                                
                                            <input type='file' name="anexo1" onchange="readURL(this);" />

                                                <script>
                                                function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();

                                                                reader.onload = function (e) {
                                                                    $('#thumb')
                                                                        .attr('src', e.target.result)
                                                                        .width(280)
                                                                        .height(250);
                                                                };

                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                            </script>
                    </center>  
                    <P><P>
                        <?php echo $formulario; ?>  
                         

                        <a href="{{ route('logar') }}" class="btn btn-primary">Voltar</a>  

                        <!--
                            faz a validacao para erro crsf. tokenizacao
                        -->
                        {{csrf_field()}}
                </div>
                
              
            </div>
        </div>
        
           
              
            </form>                        
                           
         
                   
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
        


    </div>
        
        
        
@endsection