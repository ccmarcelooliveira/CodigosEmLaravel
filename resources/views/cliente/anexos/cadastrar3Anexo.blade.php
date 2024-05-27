
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

<form method="post" enctype="multipart/form-data" >

        <div class="form-group">
            Anexar Documento:
            <input type="file" name="anexo1" class="form-control">
        </div>

        <input type="hidden" value="" name="val" class="btn btn-primary">   
        <input type="submit" value="NOVO" class="btn btn-primary"> 

        {{csrf_field()}}

</form> 
        
           
@endsection