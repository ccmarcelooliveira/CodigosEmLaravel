
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
	    
	    <div class='panel-body'>

            <?php echo $aviso; ?>

	    </div>                                                
    	</div>
</div>
           
@endsection
