
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
                    Detalhamento de Visitante
                </div>
                <div class='panel-body'>

                    <div class='col-lg-4'>

                                <P><P>
                                    @if(isset($imagem))
                                        <center> <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p></center>
                                    @endif  

                            </div>

                            <div class='col-lg-8'>
                                <?php echo $formulario; ?>
                               
                            </div>

                    <div class='col-lg-12'>
                        <p align='right'>                        

                            @if($botaoEditar == "S")
                              <a href='{{ route('master::ediVis',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                            @endif
                            <?php echo $botaoVoltar ?>
                            @if($botaoExcluir == "S")
                              <a href='{{ route('master::excVis',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja excluir o registro do Visitante?')){return false;};"  class="btn btn-danger"> Excluir</a>
                            @endif

                            
                        </p>

                    </div>


                </div>                                                
            </div>
        </div>
           
@endsection