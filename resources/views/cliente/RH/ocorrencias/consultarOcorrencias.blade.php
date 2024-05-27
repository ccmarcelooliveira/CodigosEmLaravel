
@extends('master.layoutAnexo')

@section('conteudo')

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        @if($botaoCadastrar == "S")                           
                            <a href='{{ route('master::cadOco',[ 'id' => $idObjeto]) }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Nova Ocorrência
                        @else
                            Lista de Ocorrências
                        @endif
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Início </th>   
                                            <th>Fim</th>
                                            <th>Motivo</th>
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_ocorrencias))
                                        @foreach($lista_ocorrencias as $item)
                                                <tr class='odd gradeX'>
                                                    
                                                    <td width='10'>{{ $item->CmpDataInicio }}</td>
                                                    <td width='10'>{{ $item->CmpDataFim }}</td>
                                                    <td width='300'>{{ $item->CmpTipoOcorrencia }}</td>
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::detOco',[ 'id' =>$idObjeto, 'id2' =>$item->idocorrencias, 'id3' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                      @endif   
                                                </tr>
                                       @endforeach
                                    @endif 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            
        
@endsection