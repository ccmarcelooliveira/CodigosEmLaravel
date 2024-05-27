
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
                       
                        <div class="panel-heading">
                            Contas a Pagar
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Descrição</th>  
                                            @if($botaoDetalharAnexo == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            @if($botaoDetalhar == "S")
                                             <th>Detalhar</th>
                                            @endif
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_contrato))
                                        @foreach($lista_contrato as $item)
                                                <tr class='odd gradeX'>
                                                    
                                                    
                                                      @if($botaoDetalharAnexo == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::anexo',[ 'id' =>0 ]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                      @endif
                                                      @if($botaoDetalhar == "S")
                                                       <td align='center' width='50'><a href='{{ route('master::detCon',[ 'id' => 0]) }}' ><img src={{ asset('img/visualizar.png') }}></a></td>
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