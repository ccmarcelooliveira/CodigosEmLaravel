
@extends('precadastro.layout2')

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

            function pesquisa_naturalidade(){

                    var idNacionalidade = $("#nacionalidade").val();
                    //alert(idNacionalidade);
                    //var idSubConta = $("#subconta").val();                
                    var get_token = $('input[name="_token"]').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-Token': get_token
                        },
                        url: "{{ URL::to('ajax/pesquisaSubNaturalidade') }}",
                        type: "POST",
                        dataType: 'html',
                        data: {
                            "id": idNacionalidade
                        },
                        beforeSend: function () {
                            //mostrando/883/ um gif de enviando
                            //document.getElementById("enviando").style.display = "block";
                        },
                        success: function(result) {
                            //alert(result);
                              $("#naturalidade").html('');
                              $("#naturalidade").append(result);
                        },
                        error: function () {

                        }


                    });

            }
               
            /* Carrega os blocos dos apartamento */
            function carrega_blocos(){

                    var apto = $("#apto").val();
                    var id = $("#id").val();
                    //alert(apto);
                    //var idSubConta = $("#subconta").val();                
                    var get_token = $('input[name="_token"]').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-Token': get_token
                        },
                        url: "{{ URL::to('ajax/pesquisaSubBlocos') }}",
                        type: "POST",
                        dataType: 'html',
                        data: {
                            "id": id,
                            "id2": apto
                        },
                        beforeSend: function () {
                            //mostrando/883/ um gif de enviando
                            //document.getElementById("enviando").style.display = "block";
                        },
                        success: function(result) {
                            //alert(result);
                              $("#bloco").html('');
                              $("#bloco").append(result);
                        },
                        error: function () {

                        }


                    });

            }   
           
    
            function alerta(){
                
               alert("Por favor, preencha o Nome e a Data de Nascimento do dependente!")
            }    
                
        </script>

        <script type="text/javascript">

            function pesquisa_modelo_carro(ordem){

                    var idMarca = $("#marca"+ordem).val();
                  
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

                              $("#modelo"+ordem).html('');
                              $("#modelo"+ordem).append(result);
                        },
                        error: function () {

                        }


                    });

            }
        </script>

  
    
    <div class="container">
       
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">CADASTRO DE NOVO MORADOR
                        <small></small>
                    </h1>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                   
              
                        <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                               <div class="col-lg-12">    
                                   
                                <div class='col-lg-4'>
                                    <center>

                                             <P><P>
                                        <center>
                                                <img id="thumb3" src="{{asset("img/carro_imagem.jpg")}}" height="200" alt=""><p>

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
                                        <P><P>



                                    </center>        

                                </div>
                                <div class='col-lg-8'>
                                    <P><P><P><P>
                                    <?php echo $formulario; ?>   
                                    {{csrf_field()}}  
                                </div>


                                <p><P><P></P>
                                <?php echo $dependentes; ?>                         



                                <p><P><P></P>
                                <?php echo $veiculos; ?>                         

                                   
                                </div>
                                <div class="col-lg-12">
                                    <?php echo $botoes; ?>           
                                </div>    
                        </form>
                </div>

            </div>
        
        
          
        
<!-- Footer -->
    </div>
   @endsection