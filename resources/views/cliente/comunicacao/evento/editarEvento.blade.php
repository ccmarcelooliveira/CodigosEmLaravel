 
@extends('master.layout2')

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
		Edição de Evento
	    </div>
	    <div class='panel-body'>
       
            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
            
                <div class='col-lg-4'>
                   <P><P>
                    <center>
                        
                            @if(isset($imagem))
                                <img id="thumb3" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                            @endif            
                            <input type='file' name="anexo1" onchange="readURL(this);" />

                                <script>
                                function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#thumb3')
                                                        .attr('src', e.target.result)
                                                        .width(280)
                                                        .height(250);
                                                };

                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                            </script>
                    </center>  
                </div>
                <div class='col-lg-8'>
                    <P><P>
                    <?php echo $formulario; ?>                      
                
                    <!--
                        faz a validacao para erro crsf. tokenizacao
                    -->                    
                    
                    {{csrf_field()}}
                </div>    
                
            </form>

	     </div>                                                
    	</div>
</div>

           
@endsection