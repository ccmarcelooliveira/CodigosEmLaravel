 
@extends('master.layout')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>
<div class="container">

        <!-- Page Heading/Breadcrumbs -->
       <?php echo $barra_funcionalidade ?>
        
        <!-- /.row -->
    <div id="page-wrapper">
            
                <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data" >
                  
                    <?php echo $formulario; ?>                      
                
                    <a href="{{ route('logar') }}" class="btn btn-primary">Voltar</a>  
        
                    <!--
                        faz a validacao para erro crsf. tokenizacao
                    -->                    
                    
                    {{csrf_field()}}
                </form>                        
                                
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}

    </div>
        
        
        
@endsection