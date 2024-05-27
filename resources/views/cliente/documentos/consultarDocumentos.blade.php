@extends('master.layoutAnexo')

@section('conteudo')  
        
      <?php echo $pageHeader ?>
           
               
                
                <!-- /.panel-heading -->
                <section class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Lista de Documentos</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Descrição</th>  
                                        <th>Status</th> 
                                        @if($botaoDetalharAnexo == "S")
                                          <th>Detalhar</th>
                                        @endif                                                                                        
                                    </tr>
                                </thead>
                                <tbody>

                                @if(isset($lista_documento))
                                    @foreach($lista_documento as $item)
                                            <tr class='odd gradeX'>
                                                <td width='200'>{{ $item->CmpDataInclusao }}</td>
                                                <td>{{ $item->CmpDescricao }}</td>
                                                <td width='20'>{{ $item->CmpStatus }}</td>
                                                  @if($botaoDetalhar == "S")
                                                   <td align='center' width='100'><a href='{{ route('master::detDocs',[ 'id' => $item -> objetoDonoDocumento, 'id2' => $item -> iddocumento, 'id3' => 0]) }}' ><img src={{ asset('img/visualizar.png') }}></a></td>
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
                <!-- /.panel-body -->
            
    <div class='col-lg-12'>
        <p align='right'>
            <div class="panel-heading">
            @if($botaoCadastrar == "S")                   
                   <a href='{{ route('master::cadastrarDocumentos',[ 'id' => $idObjeto, 'id2' => $tipoDonoDocumento, 'id3' => 0]) }}' class="btn btn-success">Novo Documento</a> 
                    
            @endif
            <?php echo $botaoFechar; ?>
            </div>    
        </p>
    </div>    
        
           
@endsection