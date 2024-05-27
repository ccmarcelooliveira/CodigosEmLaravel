 
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
         <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">
                    
                    <div class="tab-pane fade active in" id="service-one">
                        <P><P>
                            <?php echo $formulario; ?>                          

                            {{csrf_field()}}
                    </div>
                                                              
                  
         </form>
        
        
        
        
@endsection