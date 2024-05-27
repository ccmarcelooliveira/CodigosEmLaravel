
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
                                <a href='{{ route('master::cadPon') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Novo Extintor
                            </div>
                        @endif
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data Inclusão</th>
                                            <th>Descrição</th>                                           
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_extintor))
                                        @foreach($lista_extintor as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='10'>{{ $item->CmpDataInclusao }}</td>
                                                    
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::detExt',[ 'id' =>$item->idextintor]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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