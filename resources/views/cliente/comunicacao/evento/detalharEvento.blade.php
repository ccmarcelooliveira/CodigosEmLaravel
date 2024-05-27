
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
		Detalhamento do Evento
	    </div>
	    <div class='panel-body'>
                <div class='col-lg-4'>
                    <P><P>
                        @if(isset($imagem))
                            <center> <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p></center>
                        @endif    


                        <!--
                            faz a validacao para erro crsf. tokenizacao
                        -->

                </div>             

                <div class='col-lg-8'>
                    
                    <?php echo $formulario; ?> 
                     {{csrf_field()}}

                </div>
                
                 <div class='col-lg-12'>
                    
                   
                    <p align='right'>
                        
                        @if($botaoEditar == "S")
                          <a href='{{ route('master::ediEve',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                        @endif
                        <?php echo $botaoVoltar; ?>
                        @if($botaoExcluir == "S")
                          <a href='{{ route('master::excEve',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Evento?')){return false;};" class="btn btn-danger"> Excluir</a>
                        @endif
                        
                        
                        
                    </p>

                </div>
        
                </div>                                                
    	</div>
</div>


           
@endsection