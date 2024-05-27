
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
        <!-- Page Heading/Breadcrumbs -->
         <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
                   
                   
                   
                    <div class="col-lg-12">
                        <?php echo $formulario; ?>  

                        <!--
                            faz a validacao para erro crsf. tokenizacao
                        -->
                        {{csrf_field()}}
                    </div>    
                          
                        
                   
                    <div class='col-lg-12'>
                        <p align='right'>

                            <?php echo $botaoVoltar; ?>
                            
                            @if($botaoEditar == "S")
                              <a href='{{ route('master::ediOco',[ 'id' => $idObjeto, 'id2' => $idObjeto2 ]) }}' class="btn btn-success"> Editar</a>
                            @endif
                            
                            @if($botaoExcluir == "S")
                              <a href='{{ route('master::excOco',[ 'id' => $idObjeto, 'id2' => $idObjeto2 ]) }}' onclick="if(!confirm('Deseja Apagar o Funcionário?')){return false;};" class="btn btn-danger"> Excluir</a>
                            @endif
                            
                            <?php echo $botaoFechar; ?>
                        </p>

                    </div>
                    
        
@endsection