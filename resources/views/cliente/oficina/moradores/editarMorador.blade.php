 
@extends('master.layout2')

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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
              
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dicas Praxos!</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Dados de cadastro do morador</strong>

                <p class="text-muted">
                  Deixe sempre atualizado os dados de cadastro dos moradores, junto à administração do condomínio.
                  Isso ajuda no controle e no aumento da segurança para os moradores.
                </p>

                <hr>

                <!--<strong><i class="fas fa-map-marker-alt mr-1"></i> </strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card card-primary">  
              <div class="card-header">
                <h3 class="card-title">Editar Morador</h3>
              </div>
              <div class="card-body">
                
                   
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
                  
                        <div class="row">                     
                        
                            <?php   
                                 $variavel = new \App\Classes\VariavelModel();                                   
                                 $caminho  = $variavel-> rotaView(); ?>
                        
                                
                                <div class='col-lg-6'>
                                        <p align='right'>
                                            
                                            

                                            <input type='hidden' name='val' id='val' value='<?php echo $idObjeto; ?>' >

                                        </p>

                                    </div>  

                        </div>
                    
                    
                 
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          </div>
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

      
@endsection