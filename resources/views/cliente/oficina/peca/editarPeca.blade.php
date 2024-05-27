 
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

    function ChecarEmail(){


            var email = $("#email").val();  
            var val = $("#val2").val();   
                       
            var get_token = $('input[name="_token"]').val();

            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('test/ChecarEmail') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": email,
                    "id2": val
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                    if(result == "NOK"){
                        alert('Atenção: Este email já foi cadastrado!');
                        document.getElementById("email").value = "";
                    }    
                },
                error: function () {

                }


            });

    }
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
</script> 
        

<!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>


<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Detalhar Fornecedor
        </h1>
        {!! $resp or '' !!}
        
            <<script>
            $(function(){

                 $("#dataInclusao").datepicker({
                    dateFormat : 'dd/mm/yy'
                });

            });
            </script>


     
        <!-- /.row -->
         
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Edição de Peça Automotiva
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