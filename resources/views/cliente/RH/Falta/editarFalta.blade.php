 
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dtinicio").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#dtfim").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
   
});
</script>


        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Edição de Falta 
                    </div>
                    <div class='panel-body'>

                        <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >

                                 <div class='col-lg-4'>
                                            <center>
                                                @if(isset($imagem))
                                                    <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                                                @endif   
                                            </center>        

                                        </div>

                                         <div class="col-lg-8">
                                            <?php echo $formulario; ?>  

                                            <!--
                                                faz a validacao para erro crsf. tokenizacao
                                            -->
                                            {{csrf_field()}}
                                        </div>    


                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->                    

                            {{csrf_field()}}
                            
                        </form>
                    </div>                                                
                </div>
        </div>

        
@endsection