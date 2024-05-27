
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#excluir").click()({
        alert('teste')
    });
   
});


</script>


        <!-- Page Heading/Breadcrumbs -->
         <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
            
                            

        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Detalhamento da Manutenção Programada
                    </div>
                    <div class='panel-body'>

                                <div class="col-lg-12"> 

                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade active in" id="service-one">
                                        <P><P>

                                            <?php echo $formulario; ?>   

                                            <!--
                                                faz a validacao para erro crsf. tokenizacao
                                            -->
                                            {{csrf_field()}}
                                    </div>

                                </div>

                                <div class='col-lg-12'>
                                    <p align='right'>


                                        @if($botaoEditar == "S")
                                          <a href='{{ route('master::ediMntPro',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                                        @endif
                                        @if($botaoExcluir == "S")
                                          <a href='{{ route('master::excMntPro',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar a Manutenção Programada?')){return false;};" class="btn btn-primary"> Excluir</a>
                                        @endif

                                        <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a> 
                                    </p>

                                </div>

                                <!--
                                    faz a validacao para erro crsf. tokenizacao
                                -->


                                    {{csrf_field()}}

                            </div>   

                     </div>                                                
                </div>
        </div>
        
@endsection