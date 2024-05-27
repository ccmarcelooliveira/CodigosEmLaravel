
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
                <h3 class="card-title">ESTATÍSTICAS DO VEÍCULO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 
                <strong><i class="fas fa-book mr-1"></i> Dados de Importantes do Veículo</strong>
                    <p class="text-muted">
                      Analise os dados para tomar decições.
                    </p>
                    <ul class='list-group list-group-unbordered mb-3'>
                      <li class='list-group-item'>
                        <b>Cliente desde</b> <a class='float-right'><?php echo $primeiraVisita ?></a>
                      </li>
                      <li class='list-group-item'>
                        <b>Anos de Relacionamento</b> <a class='float-right'><?php echo $totalAnos ?> </a>
                      </li>
                      <li class='list-group-item'>
                        <b>Número de Visitas até agora</b> <a class='float-right'><?php echo $totalVisita ?></a>
                      </li>
                       <li class='list-group-item'>
                        <b>Número de Visitas/Ano</b> <a class='float-right'><?php echo floatval($totalVisita/$totalAnos); ?></a>
                      </li>
                      <li class='list-group-item'>
                        <b>Número de Revisões Anuais</b> <a class='float-right'><?php echo $totalRevisao ?></a>
                      </li>
                      <li class='list-group-item'>
                        <b>Gasto Médio Peças por Visita</b> <a class='float-right'><?php echo "R$ " . number_format(floatval($totalGastoPeca/$totalVisita), 2, '.', '') ?></a>
                      </li>
                      <li class='list-group-item'>
                        <b>Gasto Médio Mão de Obra por Visita</b> <a class='float-right'><?php echo "R$ " . number_format(floatval($totalGastoMaoObra/$totalVisita), 2, '.', '') ?></a>
                      </li>
                      <li class='list-group-item'>
                        <b>Gasto Médio por Visita</b> <a class='float-right'><?php echo "R$ " . (number_format(floatval($totalGastoMaoObra/$totalVisita), 2, '.', '') + number_format(floatval($totalGastoPeca/$totalVisita), 2, '.', '')) ?></a>
                      </li>
                       <li class='list-group-item'>
                        <b>Permanência Média por Visita</b> <a class='float-right'>----</a>
                      </li>
                    </ul>
                  <P><P>
                

                
              

                <strong><i class="fas fa-map-marker-alt mr-1"></i> </strong>

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

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
             
              <div class="card-body">
                
                   
                        
                            <div class='col-lg-12'>
                                <center>
                                    @if(isset($imagem))
                                        <img id="thumb" src="{{asset($imagemVEI)}}" height="200" alt=""><p><P>
                                    @endif
                                </center>    
                            </div>
                                
                            <div class='col-lg-12'>
                                <?php echo $formulario ?>
                            </div>                              
                            
                          
                        <div class="row">                     
                        
                            <?php   
                                 $variavel = new \App\Classes\VariavelModel();                                   
                                 $caminho  = $variavel-> rotaView(); ?>
                        
                                 
                                <div class='col-lg-12'>
                                    <p align='center'>
                                        <a href='{{ route('master::cadOsv',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Ordem de Serviço</a>
                                        @if($botaoEditar == "S")
                                          <a href='{{ route('master::ediVei',[ 'id' => $idObjeto, 'id2' => $rotulo]) }}' class="btn btn-success"> Editar</a>
                                        @endif
                                         <?php echo $botaoVoltar; ?>
                                        @if($botaoExcluir == "S")
                                          <a href='{{ route('master::excVei',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Excluir o Veículo?')){return false;};" class="btn btn-danger"> Excluir</a>
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