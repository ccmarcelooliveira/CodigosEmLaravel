
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

       
        <?php echo $barra_funcionalidade ?>
                
       
        <div class='col-lg-12'>
            
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    Detalhamento de Ramal
                </div>
                <div class='panel-body'>

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
                              <a href='{{ route('master::ediRam',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                            @endif
                            @if($botaoExcluir == "S" && $auto == 2) 
                              <a href='{{ route('master::excRam',[ 'id' => $idObjeto ]) }}' class="btn btn-danger"> Excluir</a>
                            @endif

                            <?php echo $botaoVoltar; ?>
                        </p>

                    </div>


                </div>                                                
            </div>
        </div>
           
@endsection