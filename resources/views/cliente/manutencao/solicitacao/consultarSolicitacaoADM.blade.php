
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
                
                    @if($botaoCadastrar == "S")
                        <div class="panel-heading">
                            <a href='{{ route('master::cadSol') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Nova Solicitação
                        </div>
                    @else
                        <div class="panel-heading">
                            Consultar Solicitações
                        </div>
                    @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Data Inclusão</th>
                                <th>Descrição</th>
                                <th>Status</th>

                                @if($botaoDetalhar == "S")
                                  <th>Detalhar</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($lista_solicitacao))
                                    @foreach($lista_solicitacao as $item)
                                    <tr class='odd gradeX'>
                                        <td width='80'>{{ $item->CmpCodigoUnico }}</td>
                                        <td width='120'>{{ $item->dtsol }}</td>
                                        
                                     
                                     
                                       
                                        <td>{{ $item->CmpTexto }}</td>
                                        <td>{{ $item->solStatus }}</td>
                                       
                                        @if($botaoDetalhar == "S")
                                            <td align='center' width='100'><a href='{{ route('master::detSol',[ 'id' =>$item->idsolicitacao]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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