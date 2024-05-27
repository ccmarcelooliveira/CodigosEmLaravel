
@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
    
     $("#dataReserva").datepicker({
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
<script type="text/javascript">

/**
 * VISA RECUPERAR O TERMO DE USO DE CADA ÁREA COMUM
 */
    function recuperar_termo_uso(){

            var idAreaComum = $("#selAreaComum").val();              
            var get_token = $('input[name="_token"]').val();   
            
            alert(idAreaComum);
                        
            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('/ajax/pesquisaTermoUso') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idAreaComum
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                   
                    if(result != ''){
                        
                        document.getElementById("termo").value = result;  
                        document.getElementById("termoUsoTex").style.display = 'block';
                        //document.getElementById("checkbox").style.display = 'block';
                       
                    }else{
                        
                        document.getElementById("termo").value = '';
                        document.getElementById("termoUsoTex").style.display = 'none';
                        //document.getElementById("checkbox").style.display = 'none';
                        
                    } 

                },
                error: function () {

                }


            });
              

    }
</script> 
       
<?php echo $barra_funcionalidade ?>
                

<div class='col-lg-12'>
    <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">
	<div class='panel panel-primary'>
	    <div class='panel-heading'>
		Aprovação de Reservas
	    </div>
            
	    <div class='panel-body'>

                    
                        <div class="col-lg-12">

                            <P><P>
                            <?php echo $formulario; ?>  

                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                            {{csrf_field()}}

                        </div>

	    </div>   
            
    	</div>
        
    </form>
</div>           
@endsection