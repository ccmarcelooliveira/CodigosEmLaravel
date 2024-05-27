
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dtEntrada").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#dtSaida").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
   
});
</script>
<script type="text/javascript">
$(document).ready(function(){

$('.demo1').on('click', function(){
$.goNotification('jQueryScript.net');
});

});


});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->        
    
                               
                      
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        CALENDÁRIO DE FOLGAS PARA O ANO DE <?php echo $ano_titulo ?>
                    </div>
                    <div class='panel-body'>
                        
                       
                                <div class="col-lg-4">                                    
                                    <center>
                                        @if(isset($imagem))
                                            <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                                        @endif   
                                    </center> 
                                </div>
                     
                                
                                <div class="col-lg-8">                                    
                                    <?php echo $formulario; ?><P>
                                </div>
                        
                                <div class="col-lg-12">                                    
                                    <?php echo ""; ?><P>
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
                                
                                
                                <div class='col-lg-12'>
                                    <p align='right'>                                    

                                        
                                        @if($botaoEditar == "S")
                                            <a href='{{ route('master::edifol',[ 'id' => $idObjeto, 'id2' => $ano, 'id3' => 0 ]) }}' class="btn btn-success"> Editar</a>
                                        @endif
                                        <?php echo $botaoVoltar; ?>
                                        @if($botaoExcluir == "S")
                                            <a href='{{ route('master::excfol',[ 'id' => $idObjeto, 'id2' => $idObjeto2 ]) }}' onclick="if(!confirm('Deseja apagar registro de folgas?')){return false;};" class="btn btn-danger"> Excluir</a>
                                        @endif
                                        
                                    </p>
                                </div>  

                    </div> 
                    
                    
                </div>
            
                
            
        </div>
   
        
        
@endsection