
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

    function pesquisa_modelo_carro(){

            var idMarca = $("#marca").val();                    
            var get_token = $('input[name="_token"]').val();

            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaModelo') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idMarca
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                    alert(result);
                      $("#modelo").html('');
                      $("#modelo").append(result);
                },
                error: function () {

                }


            });

    }
</script>
       
            
<?php echo $pageHeader; ?>
       
        
       <section class="content">
            <div class="container-fluid">
                     
            
                    <div class='col-lg-12'>
                                                
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Cadastrar Veículo</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start --> 
                                <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                                    <div class="card-body"> 
                                        <div class="row">
                                                <div class="col-lg-4">

                                                    <P><P>
                                                    <center><font color="red" size="5">Obs.: Foto do veículo</font>  
                                                            <img id="thumb3" src="{{asset("img/carro_imagem.jpg")}}" height="200" alt=""><p>
                                                            <?php echo $formulario2; ?>
                                                    </center>
                                                </div>
                                                <div class="col-lg-8">
                                                    <P><P>
                                                        <?php echo $formulario; ?>  


                                                        <!--
                                                            faz a validacao para erro crsf. tokenizacao
                                                        -->
                                                        {{csrf_field()}}
                                                </div>
                                        </div>
                                    </div>    
                                </form> 
                            
                          
                    </div>

                </div>
            </div>
       </section>  
@endsection