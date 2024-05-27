 
@extends('administracaoDagoba.layout2')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>

<div id="page-wrapper">
 
    <div class="col-xs-12"> 
        
            <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Edição de Conta
                    </div>
                    <div class='panel-body'>                       

                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >

                                <?php echo $formulario; ?>  

                                {{csrf_field()}}
                                
                            </form> 

                     </div>                                                
                </div>
            </div>    
    </div>
</div>    
@endsection