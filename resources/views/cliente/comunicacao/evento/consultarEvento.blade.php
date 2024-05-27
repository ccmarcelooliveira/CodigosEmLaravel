
@extends('master.layout2')

@section('conteudo')

       
        <?php echo $barra_funcionalidade ?>
        
       <div class="panel panel-primary">
                       
                        @if($botaoCadastrar == "S")
                            <div class="panel-heading">
                                <a href='{{ route('master::cadEve') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Novo Evento
                            </div>
                        @else
                            <div class="panel-heading">
                                Consulta de Evento
                            </div>
                        @endif
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data </th>   
                                            <th>Título</th>
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaEvento))
                                        @foreach($listaEvento as $item)
                                                <tr class='odd gradeX'>                                                   
                                                    
                                                    <td width='10'>{{ $item->CmpDataInclusao }}</td>
                                                    <td>{{ $item->CmpTitulo }}</td>
                                                         
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::detEve',[ 'id' =>$item->ideventos, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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
        

           
@endsection