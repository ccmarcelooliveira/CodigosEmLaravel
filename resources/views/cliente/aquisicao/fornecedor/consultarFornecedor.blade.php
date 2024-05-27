
@extends('administracaoDagoba.layout2')

@section('conteudo')

 
<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
            Consulta de Fornecedor(Fabricante) 
        </h1>
        {!! $resp or '' !!}

        <!-- Page Heading/Breadcrumbs -->
        
        <!-- /.row -->
       
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                       
                        <div class="panel-heading">
                            <a href='{{ route('master::cadFor') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Cadastrar Fornecedor' border=0></a> Novos Fornecedores
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Razão Social</th>   
                                            <th>Email</th>
                                            <th>Telefone Fixo</th>
                                            <th>Detalhar</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_fornecedor))
                                        @foreach($lista_fornecedor as $item)
                                                <tr class='odd gradeX'>
                                                    
                                                    <td align='left' width='280'>{{ $item->CmpRazaoSocial }}</td>
                                                     <td align='left' width='50'>{{ $item->CmpEmail }}</td>
                                                    <td align='left' width='50'>{{ $item->CmpTelFixo }}</td>
                                                   
                                                        <td align='center' width='50'><a href='{{ route('master::detFor',[ 'id' => $item->idfornecedores, 'id2' => 0]) }}' > <img src={{ asset('img/visualizar.png') }}></a></td>
                                                   
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