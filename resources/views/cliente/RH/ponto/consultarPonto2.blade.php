
@extends('master.layout2')

@section('conteudo')


        <?php echo $barra_funcionalidade ?>
       
        <div class="panel panel-primary">
                       
                        @if($botaoCadastrar == "S")
                            <div class="panel-heading">
                                <a href='{{ route('master::cadPon') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Novo Ponto
                            </div>
                        @endif
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Funcionário</th>
                                            <th>Entrada</th>
                                            <th>Saída</th>
                                            <th>Período de trabalho</th>
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $util = new \app\Util\Util(); ?>
                                    @if(isset($lista_ponto))
                                        @foreach($lista_ponto as $item)
                                                <tr class='odd gradeX'>
                                                    
                                                    <td width='250'>{{ $item->CmpNome }}</td>
                                                    <td width='10'>{{ $item->CmpDataEntrada }}</td>
                                                    <td width='10'>{{ $item->CmpDataSaida }}</td>
                                                    <td width='10'>
                                                            <?php    
                                                                if(isset($item->CmpDataSaida))
                                                                {
                                                                  echo $util -> calculaTempo(substr($item->CmpDataEntrada,strlen($item->CmpDataEntrada)-8,8), substr($item->CmpDataSaida,strlen($item->CmpDataSaida)-8,8)); 
                                                                }     
                                                            ?>
                                                    </td>
                                                    
                                                    
                                                    @if($botaoDetalhar == "S")
                                                         <td align='center' width='10'><a href='{{ route('master::detPon',[ 'id' =>$item->idponto,'id2' =>0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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
                
            
        <hr>

         
@endsection