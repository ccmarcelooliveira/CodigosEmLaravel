 
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
        
        <!-- /.row -->
            
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Edição de Folga 
                    </div>
                    <div class='panel-body'>
                        
                       
                        <form method="post" id="registration-form">
                            
                            
                                <div class="col-lg-4">                                    
                                    <center>
                                        @if(isset($imagem))
                                            <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                                        @endif   
                                    </center> 
                                </div>
                     
                                
                                <div class="col-lg-8">                                    
                                    <?php echo $formulario1; ?><P>
                                </div>
                        
                            
                                <div class="col-lg-12">                                    
                                    <?php echo $formulario; ?>
                                </div>
                               
                                <div class="col-lg-4">
                                    
                                    <?php echo $janeiro ?> 
                                </div>
                                <div class="col-lg-4">
                                    
                                    <?php echo $fevereiro ?> 
                                </div>
                                <div class="col-lg-4">
                                    
                                    <?php echo $marco ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $abril ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $maio ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $junho ?> 
                                </div>
                                    <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $julho ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $agosto ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $setembro ?> 
                                </div>
                                    <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $outubro ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $novembro ?> 
                                </div>
                                <div class="col-lg-4">
                                    <p><p>
                                    <?php echo $dezembro ?> 
                                </div>
                                 {{csrf_field()}}
                                
                                <?php if($botao == "S"){ ?> 
                                    <div class="col-lg-12">
                                        <p align='right'>  
                                            <input type='submit' value='Enviar' class='btn btn-success'>
                                            <?php echo $botaoVoltar; ?>
                                        </p> 
                                    </div>    
                                <?php } ?>
                        </form>

                    </div>                                               
                </div>
        </div>

        
@endsection