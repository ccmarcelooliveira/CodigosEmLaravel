
@extends('master.layout')

@section('conteudo')

<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        <div id="page-wrapper">
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        @if($botaoCadastrar == "S")
                            <div class="panel-heading">
                                <a href='{{ route('master::cadObra') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Nova Obra
                            </div>
                        @endif
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Título </th>   
                                            <th>Início</th>
                                            <th>Fim</th>
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_obra))
                                        @foreach($lista_obra as $item)
                                                <tr class='odd gradeX'>
                                                    
                                                    <td>{{ $item->CmpTitulo }}</td>
                                                    <td>{{ $item->CmpDataInicio }}</td>
                                                    <td>{{ $item->CmpDataFim }}</td>
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::detObra',[ 'id' =>$item->idobra]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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