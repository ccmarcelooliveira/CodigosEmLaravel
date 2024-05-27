
@extends('master.layoutAnexo')

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
        

        <!-- /.row -->
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Detalhamento de SubConta
                    </div>
                    <div class='panel-body'>
                               
                            <?php echo $formulario; ?>   
                                                       
                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                            {{csrf_field()}}
                   

                            <div class='col-lg-12'>
                                <p align='right'>

                                    
                                      <a href='{{ route('master::ediPlaSubCon',[ 'id' => $idObjeto, 'id2' => $idObjeto2]) }}' class="btn btn-success"> Editar</a>
                                   

                                    <?php echo $botaoVoltar ?>    
                                    <?php echo $botaoFechar ?> 
                                    
                                  
                                      <a href='{{ route('master::excPlaSubCon',[ 'id' => $idObjeto, 'id2' => $idObjeto2 ]) }}' onclick="if(!confirm('Deseja Apagar conta do Plano de SubContas?')){return false;};" class="btn btn-danger"> Excluir</a>
                                  
                                </p>

                            </div>

                     </div>                                                
                </div>
        </div>
        
        
@endsection