
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
                        
                            <div class="panel-heading">
                                Consultar Reservas
                            </div>
                        
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Código Único</th>
                                <th>Apto/Bloco</th>
                                <th>Motivo</th>

                                <th>Status</th>

                                @if($botaoDetalhar == "S")
                                  <th>Detalhar</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>

                             
                                                   
                        @if(isset($listaReserva))
                                @foreach($listaReserva as $item)
                                    <tr class='odd gradeX'>
                                        <td width='10'>{{ $item->CmpDataReserva }}</td>
                                        <td>{{ $item->CmpCodigoUnico }}</td>
                                        <td>{{ $item->CmpApto."/".$item->CmpBloco }}</td>
                                        <?php 
                                            if($item->CmpMotivo == "")
                                            {   $cor = 'danger';
                                                $item->CmpMotivo = "Código não cadastrado";
                                            }
                                            else
                                            { $cor = 'success';} ?>
                                            
                                        <td><span class="right badge badge-<?php echo $cor ?>">{{ strtoupper($item->CmpMotivo) }} </span></td>
                                        <td>{{ $item->CmpStatus }}</td>
                                                                              
                                         @if($botaoDetalhar == "S")
                                            <td align='center' width='100'><a href='{{ route('master::detResAdm',[ 'id' =>$item->idreserva, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                         @endif


                                    </tr>

                           @endforeach
                        @endif 
                        
                        
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