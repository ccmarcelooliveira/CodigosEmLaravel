@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Plano <small>Consultar</small>
        </h1>
        {!! $resp or '' !!}

            <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                            <a href='{{ route('admin::cadastrarPlano') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Nova Turma' border=0></a> Novo Plano
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>PLANO</th>
                                            <th>Custo por Apto (R$)</th>
                                            <th>Desconto Custo Apto(%)</th>
                                            <th>Máx. Usuarios</th>
                                            <th>Status</th>
                                            <th>Detalhar</th>
                                            <th>Excluir</th>

                                        </tr>    
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaPlanos))
                                        @foreach($listaPlanos as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='10'>{{ $item->CmpDescricao }}</td>
                                                    <td width='10'>{{ $item->CmpCustoPorApto }}</td>
                                                    <td width='10'>{{ $item->CmpDescontoCustoApto }}</td>
                                                    <td width='10'>{{ $item->CmpMaxUsuarios }}</td>
                                                    <td width='10'>{{ $item->CmpStatus }}</td>
                                                    
                                                    
                                                    <td align='center' width='50'><a href='{{ route('admin::editarPlano',[ 'id' =>$item->idplano]) }}' ><img src={{ asset('img/visualizar.png') }}  width=15></a></td>
                                                    <td align='center' width='50'><a href='{{ route('admin::excluirPlano',[ 'id' =>$item->idplano]) }}' ><img src={{ asset('img/excluir.jpg') }}  width=15></a></td>
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
        <hr>

    </div>

</div>        
@endsection
