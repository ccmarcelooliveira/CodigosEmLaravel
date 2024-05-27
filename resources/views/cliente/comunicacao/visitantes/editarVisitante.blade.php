 
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
                        Edição de Visitante
                    </div>
                    <div class='panel-body'>

                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                               <P><P>
                                <div class='col-lg-4'>
                                     <center>

                                             @if(isset($imagem))
                                                 <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                                             @endif            


                                     </center>  
                                </div>
                                <div class='col-lg-8'>
                                    <p align='right'>      

                                        <?php echo $formulario; ?> <br>       
                                        {{csrf_field()}}
                                    </p>
                                </div>
                                


                            </form>

                     </div>                                                
                </div>
        </div>
           
@endsection