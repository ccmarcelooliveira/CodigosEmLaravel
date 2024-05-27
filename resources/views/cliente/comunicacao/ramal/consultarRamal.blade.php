@extends('master.layout2')

@section('conteudo')
       
        <?php echo $barra_funcionalidade ?>
        
       <div class="panel panel-primary">
                       
                        <div class="panel-heading">
                        @if($botaoCadastrar == "S")                            
                                <a href='{{ route('master::cadRam') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Novo Ramal                            
                        @else
                            Consulta de Ramal
                        @endif
                        </div>
           
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ramal</th>
                                            <th>Apto/Área Comum</th>                                            
                                            <th>Morador/Responsável</th>
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaRamal))
                                        @foreach($listaRamal as $item)
                                        
                                            <?php 
                                                $nome = "";
                                                $teste = "";
                                                if($item->CmpAuto == 1){
                                                   $teste =  $item->CmpApto."/".$item->CmpBloco;
                                                    $nome = strtoupper($item -> CmpNome);
                                                }else{
                                                    $teste = $item -> CmpAreaComum;
                                                     $nome = "";
                                                }
                                                
                                                
                                            ?>
                                                <tr class='odd gradeX'>
                                                  
                                                    <td  width="100">{{ $item->CmpRamal }}</td>
                                                    <td width="200">{{ $teste }}</td>
                                                    
                                                    <td width="500">{{ $nome }}</td>
                                                    
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::detRam',[ 'id' =>$item->idramal]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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
                    <div class='col-lg-12'>
                        <p align='right'>                            

                            <?php echo $botaoVoltar; ?>
                        </p>

                    </div>
           
@endsection