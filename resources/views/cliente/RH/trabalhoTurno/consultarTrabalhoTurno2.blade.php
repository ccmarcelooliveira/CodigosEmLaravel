
@extends('master.layoutAnexo')

@section('conteudo')



        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
       
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        
                            
                                <a href='{{ route('master::cadtur',[ 'id' => $idObjeto]) }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Novo Período de Trabalho
                        
                         </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Função</th>
                                            <th>Início Período </th>                                           
                                            <th>Fim Período </th>
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_turno))
                                        @foreach($lista_turno as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='350' >{{ $item->CmpDescricao }}</td>
                                                     <td align="center">{{ $item->CmpInicioPrimeiroTurno }}</td>
                                                    <td align="center">{{ $item->CmpFimPrimeiroTurno }}</td>
                                                    
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::dettur',[ 'id' => $idObjeto,'id2' =>$item->idturno, 'id3' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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
                      <div class='col-lg-12'>
                        <p align='right'>
                           
                            <?php echo $botaoFechar; ?>  
                        </p>

                    </div>   
        
      
 
@endsection