
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
                                <a href='{{ route('master::cadPets') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Novo Pet
                            </div>
                        @endif
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nascimento</th>   
                                            <th>Entrada</th>
                                            <th>Saída</th>
                                            <th>Nome</th>
                                            <th>Raça</th>
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                                                                      
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaPets))
                                        @foreach($listaPets as $item)
                                                <tr class='odd gradeX'>
                                                    
                                                    
                                                    <td width='20'>{{ $item->CmpDataNasc }}</td>
                                                    <td width='20'>{{ $item->CmpDataEntrada }}</td>
                                                    <td width='50'>{{ $item->CmpDataSaida }}</td>
                                                    <td>{{ $item->CmpNome }}</td>
                                                    <td>{{ $item->CmpRaca }}</td>
                                                   
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::detPets',[ 'id' =>$item->idpets]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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