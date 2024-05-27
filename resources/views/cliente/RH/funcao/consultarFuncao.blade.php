
@extends('administracaoDagoba.layout2')

@section('conteudo')

<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
            Consulta de Funções 
        </h1>
        {!! $resp or '' !!}

        <!-- Page Heading/Breadcrumbs -->
        
        <!-- /.row -->
       
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                       
                        <div class="panel-heading">
                        
                            <a href='{{ route('master::cadFca') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Nova Função
                       
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data Inclusão</th>
                                            <th>Descrição</th>                                           
                                            
                                            
                                              <th>Detalhar</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_funcao))
                                        @foreach($lista_funcao as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='150' align="center">{{ $item->CmpDataInclusao }}</td>
                                                    <td>{{ $item->CmpDescricao }}</td>
                                                    
                                                      
                                                         <td align='center' width='100'><a href='{{ route('master::detFca',[ 'id' =>$item->idfuncao, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                     
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

</div>    
 
@endsection