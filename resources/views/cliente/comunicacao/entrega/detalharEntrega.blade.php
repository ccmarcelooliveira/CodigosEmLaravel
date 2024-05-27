
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
             
              <div class="card-body">
                        <div class="row">
                            <div class='col-lg-4'>
                                <P><P><P><P>
                                    @if(isset($imagem))
                                        <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
                                    @endif    
                            </div>
                            <div class='col-lg-8'>
                                    <?php echo $formulario; ?>   
                                    <!--
                                        faz a validacao para erro crsf. tokenizacao
                                    -->
                                    {{csrf_field()}}
                            </div>                           
                             <?php   $variavel = new \App\Classes\VariavelModel();                                   
                                     $caminho  = $variavel-> rotaView(); ?> 
                            <div class='col-lg-6'>
                                <p align='left'>
                                    <?php  if($baixa == ""){ ?> 
                                        <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>baiEnt/{{$idEntrega}}',500,400)">
                                           Baixar
                                        </button>
                                    <?php } ?>
                                    <?php  if($rastrear != ""){ ?> 
                                        <button type="button" class="btn btn-primary"  onclick="popup('<?php echo $caminho; ?>rasEnt/{{$codigoEntrega}}',1200,800)">
                                           Rastrear
                                        </button>
                                    <?php } ?>
                                </p>

                            </div>    
                            <div class='col-lg-6'>
                                <p align='right'>

                                    @if($botaoEditar == "S")
                                      <a href='{{ route('master::ediEnt',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                                    @endif
                                     <?php echo $botaoVoltar; ?>
                                    @if($botaoExcluir == "S")
                                      <a href='{{ route('master::excEnt',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar a Entrega?')){return false;};" class="btn btn-danger"> Excluir</a>
                                    @endif


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
