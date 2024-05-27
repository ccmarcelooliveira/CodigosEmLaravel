
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
		Detalhamento do Classificado
	    </div>
                    <div class='panel-body'>
                
                
                        <div class="col-lg-12">                    
                            <div class="col-lg-4">
                                @if(isset($imagem))
                                    <center> <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p></center>
                                @endif    
                                <P><P>
                            </div>
                            <div class="col-lg-8">
                                <?php echo $formulario; ?>     

                                <!--
                                    faz a validacao para erro crsf. tokenizacao
                                -->
                                {{csrf_field()}}

                            </div>
                            <div class='col-lg-12'>
                                <p align='right'>                                  
                                    @if($botaoEditar == "S" && $status != "RJT" && $status != "RJT")
                                      <a href='{{ route('master::ediCla',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                                    @endif
                                    <?php echo $botaoVoltar; ?>
                                    @if($botaoExcluir == "S" && $status != "RJT" && $status != "RJT")
                                      <a href='{{ route('master::excCla',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar a Classificação?')){return false;};" class="btn btn-danger"> Excluir</a>
                                    @endif

                                    
                                </p>

                            </div>
                        </div>
                        
                        
                   

                    </div>
                    
                     {{csrf_field()}}
              

	     </div>  
         
    	</div>

           
@endsection