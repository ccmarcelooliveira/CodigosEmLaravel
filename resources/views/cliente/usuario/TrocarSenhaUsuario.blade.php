 
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
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


            <?php echo $cardMorador ?>
             
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
              <div class="card-header p-2">
                  <font size=5>Dados do Usuário</font>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                  Launch Danger Modal
                </button>
                    <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data" >
                        <div class='row'>
                            <div class='col-lg-4'>                                
                                
                                    <center> 
                                        <img id="thumb3" src="{{asset($imagem)}}" height="200" alt=""><p><p><P>

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
                            <div class='col-lg-8'>
                                <div class='row'>
                                    <?php echo $formulario ?>
                                     {{csrf_field()}}
                                </div>     
                            </div>                              
                        </div>  
                        <div class="row">                     
                        
                            <div class='col-lg-12'>
                                <p align='right'>                            

                                    <input type='submit' value='Enviar' class='btn btn-success'>

                                    <?php echo $botaoVoltar; ?> 
                                </p>

                            </div> 
                        
                        </div>
                    </form>    
                    <!-- /.post -->
                                       
                                      
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

                      
@endsection