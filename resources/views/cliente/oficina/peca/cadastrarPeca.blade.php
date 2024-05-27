 
@extends('administracaoDagoba.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dtNasc").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    $("#dtEntrada").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    $("#dtSaida").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
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
                    
                      $("#modelo").html('');
                      $("#modelo").append(result);
                },
                error: function () {

                }


            });

    }
</script>
        


<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Cadastrar Peça Automotiva
        </h1>
        {!! $resp or '' !!}

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

                     
                           
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Cadastro de Peças Automotiva
                    </div>
                    <div class='panel-body'>

                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >

                            <div class='col-lg-12'>
                                <center>
                                    <img id="thumb3" src="{{asset($imagem)}}" height="200" alt=""><p><P>

                                    <input type='file' name="anexo1" onchange="readURL(this);" />

                                        <script>
                                        function readURL(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();

                                                        reader.onload = function (e) {
                                                            $('#thumb3')
                                                                .attr('src', e.target.result)
                                                                .width(280)
                                                                .height(250);
                                                        };

                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                    </script>
                                </center>   
                            </div>

                            <div class='col-lg-12'>
                                <?php echo $formulario ?>
                                {{csrf_field()}}
                            </div>                              

                        </form>

                     </div>                                                
                </div>
        </div>

  </div>

</div>    
@endsection