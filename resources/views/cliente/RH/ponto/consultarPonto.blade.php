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
        
            <div class="col-lg-12"> 

                <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                    <div class="col-lg-12">
                    
                    <div id="myTabContent" class="tab-content">

                        <div class="tab-pane fade active in" id="service-one">
                            <div class="col-lg-6">
                                <div id='calendar'></div> 
                                <!--
                                    faz a validacao para erro crsf. tokenizacao
                                -->
                                {{csrf_field()}}
                            </div>
                            <div class="col-lg-6">
                            
                                <?php echo $formulario; ?>
                            </div>    
                        </div>
                        
                            <div class="tab-pane fade" id="service-two">                                
                                    
                                <div class="col-lg-12">
                                    <div class="panel panel-primary">                       

                                        @if($botaoCadastrar == "S")
                                            <div class="panel-heading">
                                                <a href='{{ route('master::cadEscSer') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Nova Escala de Serviço
                                            </div>
                                        @endif

                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Data </th>
                                                            <th>Funcionário</th>
                                                            <th>Turno</th> 

                                                            @if($botaoDetalhar == "S")
                                                              <th>Detalhar</th>
                                                            @endif

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    @if(isset($lista_escala_servico))
                                                        @foreach($lista_escala_servico as $item)
                                                                <tr class='odd gradeX'>
                                                                    <td width='10'>{{ $item->CmpDataEscala }}</td>
                                                                    <td>{{ $item->CmpNome }}</td>
                                                                    <td>{{ $item->CmpTurno }}</td>

                                                                      @if($botaoDetalhar == "S")
                                                                         <td align='center' width='100'><a href='{{ route('master::detEscSer',[ 'id' =>$item->idescala_servico, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
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
                    </div>

                </div>
                    
                     {{csrf_field()}}
              </form>
               
                <!--
                    faz a validacao para erro crsf. tokenizacao
                -->
                       
            </div> 
        

           
@endsection
