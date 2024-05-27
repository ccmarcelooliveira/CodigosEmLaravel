
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
              
              <div class="card-body">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-4">
                                @if(isset($imagem))
                                <P><P>
                                    <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
                                @endif    
                            </div>
                            <div class="col-lg-8">
                                <P><P>
                                <?php echo $formulario; ?>   
                            </div>    
                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                            {{csrf_field()}}
                            
                        </div>
                    </div> 
                    <!--
                        faz a validacao para erro crsf. tokenizacao
                    -->
                    {{csrf_field()}}

                    <?php   $variavel = new \App\Classes\VariavelModel();                                   
                            $caminho  = $variavel-> rotaView(); ?>
                    <div class="row">
                        <?php   $variavel = new \App\Classes\VariavelModel();                                   
                                    $caminho  = $variavel-> rotaView(); ?>
                            <div class='col-lg-12'>
                                <p align='right'>


                                    @if($botaoEditar == "S")
                                      <a href='{{ route('master::ediSol',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                                    @endif
                                    @if($botaoExcluir == "S")
                                      <a href='{{ route('master::excSol',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Solicitação?')){return false;};" class="btn btn-danger"> Excluir</a>
                                    @endif


                                    @if($botaoSolucionar == "S" && $status != "CAN" && $status != "ATD")
                                        <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>caddes/{{$idObjeto}}/{{$idSiglaObjeto}}',1200,800)">
                                            Tratamento/Solução
                                        </button>
                                    @endif

                                   <?php echo $botaoVoltar; ?>
                                </p>

                            </div>
                    </div>
                    
                  
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