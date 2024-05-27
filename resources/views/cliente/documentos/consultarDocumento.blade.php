
@extends('master.layout2')

@section('conteudo')

        <?php echo $barra_funcionalidade ?>
        
       <div class="panel panel-primary">
           
            <div class="panel-heading">
            @if($botaoCadastrar == "S")
                
                    <a href='{{ route('master::cadastrarDocumento') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Novo Documento
            @else
                Lista de Documentos
            @endif            
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Descrição</th>  

                                @if($botaoDetalhar == "S")
                                 <th>Detalhar</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($lista_documento))
                            @foreach($lista_documento as $item)
                                    <tr class='odd gradeX'>
                                        <td width='150'>{{ $item->CmpDataInclusao }}</td>
                                        <td>{{ $item->DocDescricao }}</td>

                                          @if($botaoDetalhar == "S")
                                           <td align='center' width='50'><a href='{{ route('master::detDoc',[ 'id' => $item-> iddocumento, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }}></a></td>
                                          @endif                                                            
                                    </tr>

                           @endforeach
                        @endif 
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
        
           
@endsection