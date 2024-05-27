 
@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>

       
        <?php echo $barra_funcionalidade ?>
        
       
        <div class='col-lg-12'>
	<div class='panel panel-primary'>
	    <div class='panel-heading'>
		Edição das informações da Entrega
	    </div>
	    <div class='panel-body'>
                   
                <div class='col-lg-12'>
                        <?php echo $formulario; ?>   

                        <!--
                            faz a validacao para erro crsf. tokenizacao
                        -->
                        {{csrf_field()}}
                </div>
                

	    </div>
            <P><P>
           
    	</div>
            
             <div class='col-lg-12'>
                <p align='right'>
                    <?php echo $botaoFechar; ?>
                </p>

            </div>
</div>

           
@endsection
