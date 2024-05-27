@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
            Controle Usuário Ativo <small>Consultar</small>
        </h1>
        {!! $resp or '' !!}

            <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                            <a href='{{ route('admin::cadastrarUsuario') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Nova Turma' border=0></a> Novo Usuario
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Perfil</th>  
                                            <!--<th>Editar</th>
                                            <th>Excluir</th>-->
                                            <th>Condomínio</th>
                                            <th>Status</th>
                                            <th>Detalhar</th>
                                        </tr>    
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaUsuario))
                                        @foreach($listaUsuario as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='40'>{{ $item->usuario }}</td>
                                                    <td>{{ $item->CmpSigla }}</td>
                                                    <td>{{ $item->CmpRazaoSocial }}</td>
                                                    <td>{{ $item->CmpStatus }}</td>
                                                    
                                                    <td align='center' width='80'><a href='{{ route('admin::detalharUsuario',[ 'id' =>$item->idusuario]) }}' ><img src={{ asset('img/visualizar.png') }}></a></td>
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
