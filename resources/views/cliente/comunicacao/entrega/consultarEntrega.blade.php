
@extends('master.layout2')

@section('conteudo')

<?php echo $pageHeader ?>
        
<div class="wrapper">  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card">
              <div class="card-header">
                
                <div class="panel-heading">          
                        @if($botaoCadastrar == "S")
                            <div class="panel-heading">
                                <a href='{{ route('master::cadEnt') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Nova Entrega
                            </div>
                        @else
                            <div class="panel-heading">
                                Consulta de Entrega
                            </div>
                        @endif
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Emissão </th> 
                                <th>Baixa </th> 
                                <th>Cód. Único </th>
                                 <th>Cód. Correios </th>
                                <th>Apto/Bloco</th>
                                <th>Categoria Entrega</th>

                                @if($botaoDetalhar == "S")
                                  <th>Detalhar</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>

                             
                                                   
                        @if(isset($listaEntrega))
                                @foreach($listaEntrega as $item)
                                    <tr class='odd gradeX'>
                                        <td width='10'>{{ $item->CmpDataInclusao }}</td>
                                        <td>{{ $item->CmpDataBaixa }}</td>
                                        <td>{{ $item->CmpCodigoUnico }}</td>
                                        <?php 
                                            if($item->CmpCodigoCorreio == "")
                                            {   $cor = 'danger';
                                                $item->CmpCodigoCorreio = "Código não cadastrado";
                                            }
                                            else
                                            { $cor = 'success';} ?>
                                            
                                        <td><span class="right badge badge-<?php echo $cor ?>">{{ strtoupper($item->CmpCodigoCorreio) }} </span></td>
                                        <td>{{ $item->CmpApto . "/". $item->CmpBloco }}</td>
                                        <?php 
                                            if($item->CmpCategoriaEntrega == 2)
                                            { $cor = 'danger';}
                                            else
                                            { $cor = 'success';} ?>
                                        <td><span class="right badge badge-<?php echo $cor ?>">{{ $item->CmpCategoriaEntrega }} </span></td>
                                        
                                       
                                         @if($botaoDetalhar == "S")
                                            <td align='center' width='100'><a href='{{ route('master::detEnt',[ 'id' =>$item->identregas]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                         @endif


                                    </tr>

                           @endforeach
                        @endif 
                        
                          <?php   $variavel = new \App\Classes\VariavelModel();                                   
                         $caminho  = $variavel-> rotaView();
                         
                         if(Auth::user()->perfil_idperfil == 2 && Auth::user()->perfil_idperfil == 3){
                         ?> 
                            <div class='col-lg-6'>
                                <p align='left'>

                                    <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>relEnt',900,800)">
                                       Relatório Diário
                                    </button>



                                </p>

                            </div> 
                    <?php 
                         }
                    ?> 
                        </tbody>
                    </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

 </div>   
@endsection