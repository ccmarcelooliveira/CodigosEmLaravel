
@extends('master.layout2')

@section('conteudo')

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                       
                        @if($botaoCadastrar == "S")
                            <div class="panel-heading">
                                <a href='{{ route('master::cadmntprog') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Agendar Manutenção Programada
                            </div>
                        @endif
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Início</th>
                                            <th>Fim</th>
                                            <th>Assunto</th>                                           
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_manutencao))
                                        @foreach($lista_manutencao as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='10'>{{ $item->CmpDataInicio }}</td>
                                                    <td width='10'>{{ $item->CmpDataFim }}</td>
                                                    <td>{{ $item->CmpAssunto }}</td>
                                                    
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::detMntProg',[ 'id' => $item->idmanutencao_programada, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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
            </div>
       
           
@endsection