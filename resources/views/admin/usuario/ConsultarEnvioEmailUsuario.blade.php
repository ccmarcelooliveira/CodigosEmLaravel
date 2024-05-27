@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           ENVIO DE EMAIL - Usuário <small>Consultar</small>
        </h1>
        {!! $resp or '' !!}

            <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                           ENVIAR EMAILS PARA USUÁRIOS NOVOS
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Usuario</th>
                                            <th>Perfil</th>  
                                            <th>Email MOR</th>
                                            <th>Email PRO</th>
                                            <th>EhMorador?</th>
                                            <th>Condomínio</th>
                                            <th>Status</th>
                                            
                                        </tr>    
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaEmailUsuario))
                                        @foreach($listaEmailUsuario as $item)
                                              @if($item -> CmpStatus == "AGU")
                                                <tr class='odd gradeX'>
                                                    
                                                    <td width='120'>{{ $item->usuario }}</td>
                                                    <td>{{ $item->CmpSigla }}</td>
                                                    <td>{{ $item->emailMOR }}</td>
                                                    <td>{{ $item->emailPRO }}</td>
                                                    <td>{{ $item->CmpEhMorador }}</td>
                                                    <td>{{ $item->CmpRazaoSocial }}</td>
                                                    <td>{{ $item->CmpStatus }}</td>                                                    
                                                    
                                                </tr>
                                             @endif     
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
                    <a href="{{ route('admin::enviarEmailUsuario') }}" class="btn btn-primary" onclick="">Enviar Email</a> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <hr>

    </div>

</div>        
@endsection
