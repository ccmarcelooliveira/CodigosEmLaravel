
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

                            <?php echo $botaoVoltar; ?>
                        </p>

                    </div>

	     </div>                                                
    	</div>
</div>

           
@endsection