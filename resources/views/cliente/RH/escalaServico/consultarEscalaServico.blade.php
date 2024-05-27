   
@extends('master.layout2')

@section('conteudo')


<script>
$(function(){
    
     $("#dtServico").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>
       
        <?php echo $barra_funcionalidade ?>
        
            <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Consultar Escala de Serviço
                        </div>
                        <div class='panel-body'>

                                <div class="col-lg-12"> 

                                    <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                                        <div class="col-lg-12">
                                                <div class="col-lg-12">
                                                    <?php echo $formulario; ?>
                                                </div>                                              
                                        </div>

                                         {{csrf_field()}}
                                         
                                    </form>
                                    
                                   
                                </div>

                         </div>                                                
                    </div>
                
                    <?php 
                        if(isset($listaEventos)){
                            if($listaEventos != ""){
                     ?>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Consultar Escala de Serviço
                        </div>
                        <div class='panel-body'>

                                <div class="col-lg-12"> 

                                    <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                                        <div class="col-lg-12">
                                              
                                            <div class="col-lg-12">
                                                <div id='calendar'></div>                                                     
                                            </div>
                                                                                
                                        </div>

                                        
                                         
                                    </form>
                                    
                                   
                                </div>

                         </div>                                                
                    </div>
                    <?php
                            }
                        }
                    ?>    
                
            </div>

           
@endsection


