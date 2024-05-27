@extends('administracaoDagoba.layout2')

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

<div id="page-wrapper">
 
    <div class="col-xs-12"> 
        
        <!-- /.row -->
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Detalhamento da Conta
                    </div>
                    <div class='panel-body'>                       
                            
                            <P><P>

                            <?php echo $formulario; ?>   

                            {{csrf_field()}}
                                
                            <?php  
                                    $variavel = new \App\Classes\VariavelModel();                                   
                                    $caminho  = $variavel-> rotaView();                                     
                            ?>
                            
                            <!--<div class='col-lg-6'>
                                <p align='left'>
                                   
                                    <button type="button" class="btn btn-primary"  onclick="popup('<?php echo $caminho; ?>conPlanSubCon/<?php echo $idObjeto; ?>/0',800,600)">
                                        Relação de SubContas
                                    </button>
                                    
                                </p>    
                            </div>    -->
                            <div class='col-lg-12'>
                                <p align='right'>                                    
                                                                        
                                     <a href='{{ route('master::ediPlaCon',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                                   
                                    <?php echo $botaoVoltar ?>
                                   
                                     <a href='{{ route('master::excPlaCon',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar a Conta do Plano de Contas?')){return false;};" class="btn btn-danger"> Excluir</a>
                                    
                                </p>
                            </div> 

                     </div>                                                
                </div>
        </div>
    </div>
</div>    
@endsection