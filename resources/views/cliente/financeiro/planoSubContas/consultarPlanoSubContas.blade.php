
@extends('master.layoutAnexo')

@section('conteudo')

     
        <!-- /.row -->
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    
                            <div class="panel-heading">
                                <a href='{{ route('master::cadPlaSubCon',[ 'id' =>$idObjeto]) }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Nova SubConta
                            </div>
                       
                    <div class='panel-body'>

                       
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data </th>
                                            <th> SubConta</th>                                           
                                            <th>Classificação</th>
                                            <th>Categoria</th>
                                             
                                            
                                              <th>Detalhar</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($lista_plano_sub_contas))
                                        @foreach($lista_plano_sub_contas as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='10'>{{ $item->CmpDataInclusao }}</td>
                                                    <td>{{ $item->CmpNomeSubConta }}</td>
                                                    <td width='150'>{{ $item->CmpClassificacao }}</td>
                                                    <td width='100'>{{ $item->CmpCategoriaConta }}</td>
                                                    <td align='center' width='100'><a href='{{ route('master::detPlanSubCon',[ 'id' =>$item->plano_contas_idplano_contas, 'id2' =>$item->idplano_sub_contas, 'id3' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                                                                         
                                                </tr> 
                                       @endforeach
                                    @endif 
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                       
                     </div> 
                         
                </div>
                <div class='col-lg-12'>
                    <p align='right'>                                   

                        <?php echo $botaoFechar ?>

                    </p>

                </div>
        </div>
@endsection