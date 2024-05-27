
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

                <div class="tab-pane fade active in" id="service-one">
                    <P><P>
                        <?php echo $formulario; ?>                          

                        {{csrf_field()}}
                </div>
                        
                <div class='col-lg-12'>
                    <p align='right'>
                              
                       
                        @if($botaoEditar == "S")
                          <a href='{{ route('master::editur',[ 'id' => $idObjeto, 'id2' => $idObjeto2]) }}' class="btn btn-success"> Editar</a>
                        @endif
                         <?php echo $botaoVoltar; ?> 
                        @if($botaoExcluir == "S")
                          <a href='{{ route('master::exctur',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Período de Trabalho?')){return false;};" class="btn btn-danger"> Excluir</a>
                        @endif
                                                
                        
                       
                    </p>

                </div>
                    
                     
        
@endsection