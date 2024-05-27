 
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    $("#dtEntrada").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    $("#dtSaida").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>


        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->        

        <div class="col-lg-4">
            <P><P>
            @if(isset($imagem))
                <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
            @endif    
        </div>
        <div class="col-lg-8">
             <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data" >

                <?php echo $formulario; ?> 
                {{csrf_field()}}
            </form>
        </div> 
                              

        
@endsection