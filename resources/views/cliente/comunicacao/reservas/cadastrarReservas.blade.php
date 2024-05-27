
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
                   alert(result);
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
<script type="text/javascript">

/**
 * VISA RECUPERAR O TERMO DE USO DE CADA ÁREA COMUM
 */
    function verificar_data_disponivel(){

            var idAreaComum = $("#selAreaComum").val();  
            var idBloco = $("#selBloco").val(); 
            var idDataReserva = $("#dataReserva").val(); 
            
            var get_token = $('input[name="_token"]').val();   
            
            var strData = idDataReserva;
            var partesData = strData.split("/");
            var data = new Date(partesData[2], partesData[1] - 1, partesData[0]);
            
            if(data > new Date()){
             
                //if()
                //PESQUISA DE DATA DISPONÍVEL
                if(idAreaComum != '' && idBloco != '' && idDataReserva != ''){  

                        $.ajax({
                            headers: {
                                'X-CSRF-Token': get_token
                            },
                            url: "{{ URL::to('/ajax/pesquisaReserva') }}",
                            type: "POST",
                            dataType: 'html',
                            data: {
                                "id": idDataReserva,
                                "id2": idBloco,
                                "id3": idAreaComum

                            },
                            beforeSend: function () {
                                //mostrando/883/ um gif de enviando
                                //document.getElementById("enviando").style.display = "block";
                            },
                            success: function(result) {
                               //alert(result);

                               if(result > 0){ 
                                    alert("Data para reserva indisponível!"); 
                                    document.getElementById("dataReserva").value = '';

                               }else{ 
                                   alert("Data para reserva disponível!"); 
                               }

                            },
                            error: function () {

                            }


                        });

                }  
            }else{
                alert("ATENÇÃO: Redefina a data para a reserva. Data anteior a atual! ")
            }        

    }
</script> 
       
        <?php echo $barra_funcionalidade ?>
              

                <div class='col-lg-12'>	

                    <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">
                        
                            <div class='panel panel-primary'>
                                <div class='panel-heading'>
                                    Reserva de Área Comum
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
                            
                            <div class='panel panel-red'>
                                <div class='panel-heading'>
                                    Termo de Responsabilidade
                                </div>
                                <div class='panel-body'>
          
                                    <div class="col-lg-12">

                                        <P><P>
                                        <?php echo $formulario2; ?>  

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