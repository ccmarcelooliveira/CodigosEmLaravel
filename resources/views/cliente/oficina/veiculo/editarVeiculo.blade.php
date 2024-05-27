 
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
       
        
        <?php echo $pageHeader; ?>
       
        
       <section class="content">
            <div class="container-fluid">
                     
            
                    <div class='col-lg-12'>
                                                
                            <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Edição de Veículo</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start --> 
                                <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                                    <div class="card-body"> 
                                        <div class="row">
                                             <div class='col-lg-4'> 
                                                <center>

                                                      @if(isset($imagem))
                                                          <img id="thumb3" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                                                      @endif           

                                                      <?php echo $formulario2; ?>

                                                </center>
                                            </div>
                                            <div class='col-lg-8'>     
                                              <P><P>

                                              <?php echo $formulario; ?>                      

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