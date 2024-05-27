
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
                                       
                  
                        <div class='row'>
                            <div class='col-lg-4'>
                                <center><img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p></center>
                            </div>
                            <div class='col-lg-8'>
                                <div class='row'>
                                    <?php echo $formulario ?>
                                </div>     
                            </div>                              
                        </div>  
                        <div class="row">                     
                        
                            <div class='col-lg-12'>
                                <p align='right'>

                                    <a href='{{ route('master::troUsu',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Trocar Senha</a>

                                    @if($botaoCriar == "S")
                                        <a href="{{ route('master::ConsultarDocumento',[ 'id' =>$idObjeto, 'id2' => $TipoDonoDocumento, 'id3' => $banner]) }}" class="btn btn-success">Documentos</a> 
                                    @endif 

                                    @if($botaoExcluir == "S")
                                      <a href='{{ route('master::excBem',[ 'id' => $idObjeto ]) }}' class="btn btn-danger"> Excluir</a>
                                    @endif

                                    <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a> 
                                </p>

                            </div>    
                        
                        </div>
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