@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>
        <?php echo $barra_funcionalidade;
        
        ?>
        
       
        <div class='col-lg-12'>
	<div class='panel panel-primary'>
	    <div class='panel-heading'>
		Cadastrar novo Anexo
	    </div>
		<div class='panel-body'>
                    
                    <form method="post" enctype="multipart/form-data" id="formAnexo">

                        <div class="form-group">
                            <b>Título Anexo:</b><br>
                            <input type="text" value="" name="titulo" class="form-control">
                        </div>     
                        <div class="form-group">
                            <b>Anexar Documento:</b>
                            <input type="file" name="anexo1" class="form-control">
                        </div>

                        <input type="hidden" value="" name="val" class="btn btn-primary">  


                        {{csrf_field()}}
                        <div class='col-lg-12'>
                            <p align='right'>                            

                                <input type='submit' value='Enviar' class='btn btn-success'>

                                <a href="{{ route('logar') }}" class="btn btn-primary" onClick="fechar()">Fechar</a> 
                            </p>

                        </div>
                    </form>
		

                </div>                                                
            </div>
        </div>
           
@endsection