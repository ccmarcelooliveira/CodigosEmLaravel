   
@extends('master.layout2')

@section('conteudo')


<script>
$(function(){
    
     $("#dtServico").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>
       
        <?php echo $barra_funcionalidade ?>
        
                    
                        <div class='panel-body'>

                                <div class="col-lg-12"> 

                                    <div class="panel panel-primary">
                                            <div class="panel-heading">
                                            @if($botaoCadastrar == "S")                            
                                                    <a href='{{ route('master::cadfol',['id' => $idObjeto]) }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Nova Folga
                                            @else
                                                Lista de Funcionários
                                            @endif
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Ano </th>   
                                                                <th>Nome</th>
                                                                <th>CPF</th>
                                                                @if($botaoDetalhar == "S")
                                                                  <th>Detalhar</th>
                                                                @endif

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                         $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                                                        ?> 
                                                        @if(isset($lista_ocorrencias))
                                                            @foreach($lista_ocorrencias as $item)
                                                                    <tr class='odd gradeX'>

                                                                        <td width='80' align="center">{{ $item->CmpAno }}</td>
                                                                        <td>{{ strtoupper($item->CmpNome) }}</td>
                                                                        <td>{{ $item->CmpCPF }}</td>
                                                                        
                                                                          @if($botaoDetalhar == "S")
                                                                             <td align='center' width='100'><a href='{{ route('master::detfol',[ 'id' =>$seguranca->cripto($item->funcionario_idfuncionario), 'id2' => $seguranca->cripto($item->CmpAno), 'id3' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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

                                </div>

                         </div>  
                
                            <div class='col-lg-12'>
                                <p align='right'>                                    
                                    
                                    <?php echo $botaoVoltar; ?>
                                   
                                </p>

                            </div>
                    
           

           
@endsection


