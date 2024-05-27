 
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#datainicio").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    $("#datafim").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>


        <!-- Page Heading/Breadcrumbs -->
       <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
       

        <div class='col-lg-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    Edição de Manuntenção Programada
                </div>
                <div class='panel-body'>
                        <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data" >

                            <?php echo $formulario; ?>                      

                                                    <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->                    

                            {{csrf_field()}}
                        </form> 


                 </div>                                                
            </div>
        </div>
        
        
        
@endsection