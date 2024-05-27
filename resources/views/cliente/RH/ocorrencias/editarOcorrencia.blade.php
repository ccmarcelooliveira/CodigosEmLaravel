 
@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>


        <!-- Page Heading/Breadcrumbs -->
       <?php echo $barra_funcionalidade ?>
        
        <!-- /.row -->
            <div class="col-lg-12">
            
                <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data" >
                                        
                            <?php echo $formulario; ?> 
                          
                    <!--
                        faz a validacao para erro crsf. tokenizacao
                    -->                    
                    
                    {{csrf_field()}}
                </form>                        
                                
            </div> 
        
@endsection