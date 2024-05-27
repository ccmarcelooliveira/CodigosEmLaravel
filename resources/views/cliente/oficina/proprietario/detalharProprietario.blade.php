@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#excluir").click()({
        alert('teste')
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
                <h3 class="card-title">Avaliação do Cliente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 
                <strong><i class="fas fa-book mr-1"></i> Sem dados para avaliação</strong>

                
                <p class="text-muted">
                  ---
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
             
              <div class="card-body">
                
                     <div class="row">                       
                        
                                    <div class="col-lg-6">

                                                @if(isset($imagem))
                                                    <center><img id="thumb" src="{{asset($imagem)}}" height="150" alt=""></center><p><P>
                                                @endif            

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">  
                                            <?php echo $formulario; ?>   
                                        </div>    
                                        {{csrf_field()}}  
                                    </div>    
                                    
                                     <?php   $variavel = new \App\Classes\VariavelModel();                                   
                                            $caminho  = $variavel-> rotaView(); ?>
                                            
                                    <div class='col-lg-12'>
                                        <p align='right'>
                                            
                                            <a href='{{ route('master::pro') }}' class="btn btn-primary"> Voltar</a>
                                            
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
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

      
           
@endsection