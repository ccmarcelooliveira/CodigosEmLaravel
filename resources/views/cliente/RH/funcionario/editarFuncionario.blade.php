 
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
    
    $("#dtNasc").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>

     
        
<!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
              
            <!-- About Me Box -->
            <div class="card card-yellow">
              <div class="card-header">
                <h3 class="card-title">Dicas Praxos!</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Cadastro de Funcionário</strong>

                <p class="text-muted">
                  A manutenção dos dados cadastrais atualizados dos funcionários é uma ótima idéia e permite uma rápida resolução de problemas.
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
                <h3 class="card-title">Editar Funcionários</h3>
              </div>
              <div class="card-body">
                
                        <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                           

                                    <div class="col-lg-4">
                                        <center><P><P>
                                            @if(isset($imagem))
                                                <center> <img id="thumb3" src="{{asset($imagem)}}" height="150" alt=""><p></center>
                                            @endif  
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
                                    <div class="col-lg-8">
                                        <?php echo $formulario; ?>  

                                        <!--
                                            faz a validacao para erro crsf. tokenizacao
                                        -->
                                        {{csrf_field()}}
                                    </div>    
                        </form>
                    
                    
                 
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