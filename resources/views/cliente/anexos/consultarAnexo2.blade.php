
@extends('master.layoutAnexo')

@section('conteudo')
<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Anexo 
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li>Home
                    </li>
                    <li class="active"> Documentos</li>
                    <li class="active"> Consultar Documento</li>
                    <li class="active"> Consultar Anexo</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div id="page-wrapper">
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href='{{ route('master::cadastrarAnexo') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Cadastrar Ramal' border=0></a> Novos Anexos
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
                                                   
                                                    <td align='center' width='50'><a href='{{ route('master::detalharFornecedor',[ 'id' => $item->idfornecedores]) }}' > <img src={{ asset('img/visualizar.png') }}></a></td>
                                                    
                                                    <!--<td align='center' width='50'><a href='{{ route('master::editarFornecedor',[ 'id' => $item->idfornecedores]) }}' > <img src={{ asset('img/editar.gif') }}></a></td>
                                                    <td align='center' width='50'><a href='{{ route('master::excluirFornecedor',[ 'id' => $item->idfornecedores]) }}' ><img src={{ asset('img/excluir.gif') }}></a></td>-->
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
            <!-- /.row -->
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            	<div id="pesquisa">

                <?php

                                //echo $dte->exibe_noticias($util,$condominio_id,"");



                ?>
				</div>
            </div>

           
        </div>
        <!-- /.row -->

        <hr>


    </div>
@endsection