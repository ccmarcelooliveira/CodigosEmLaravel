   
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
                                                    <a href='{{ route('master::cadlic') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Nova Licença
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
                                                                   
                                                                <th>Nome</th>
                                                                <th>Início</th>
                                                                <th>Fim </th>
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
                                                                        <td>{{ $item->CmpNome }}</td>
                                                                        <td width='50'>{{ $item->CmpDataInicio }}</td>
                                                                        <td width='50'>{{ $item->CmpDataFim }}</td>
                                                                        
                                                                        @if($botaoDetalhar == "S")
                                                                           <td align='center' width='100'><a href='{{ route('master::detlic',[ 'id' =>$item ->idocorrencias, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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


