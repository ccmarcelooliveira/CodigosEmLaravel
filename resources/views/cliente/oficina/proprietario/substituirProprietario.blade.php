 
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
    $("#dtNasc").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    
});


</script>
<script language="JavaScript">
    stop = '';
    function fixo( campo ) {
        campo.value = campo.value.replace( /[^\d]/g, '' )
                                 .replace( /^(\d\d)(\d)/, '($1) $2' )
                                 .replace( /(\d{4})(\d)/, '$1-$2' );
        if ( campo.value.length > 14 ) campo.value = stop;
        else stop = campo.value;    
    }
    
    //stop = '';
    function celular( campo ) {
        campo.value = campo.value.replace( /[^\d]/g, '' )
                                 .replace( /^(\d\d)(\d)/, '($1) $2' )
                                 .replace( /(\d{4})(\d)/, '$1-$2' );
        if ( campo.value.length > 15 ) campo.value = stop;
        else stop = campo.value;    
    }
</script>

<script type="text/javascript">

    function pesquisa_naturalidade(){

            var idNacionalidade = $("#nacionalidade").val();
            //alert(idNacionalidade);
            //var idSubConta = $("#subconta").val();                
            var get_token = $('input[name="_token"]').val();

            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaSubNaturalidade') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idNacionalidade
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                    //alert(result);
                      $("#naturalidade").html('');
                      $("#naturalidade").append(result);
                },
                error: function () {

                }


            });

    }
</script> 
       
        <?php echo $barra_funcionalidade ?>
        
       
         

<div class='col-lg-12'>
	<div class='panel panel-primary'>
	    <div class='panel-heading'>
		Substituição de Proprietário
	    </div>
	    <div class='panel-body'>

                <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                    <div class='col-lg-4'>
                    <P><P>
                    <center>
                        <!--Mencionar que o morador do apto X está sendo substituído.-->
                            
                            <img id="thumb3" src="{{asset("img/silhueta.png")}}" height="250" alt=""><p>
                                       
                            <input type='file' name="anexo1" onchange="readURL(this);" />

                                <script>
                                function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#thumb3')
                                                        .attr('src', e.target.result)
                                                        .width(280)
                                                        .height(250);
                                                };

                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                            </script>
                    </center>  
                    <P><P>
                    </div>
                    <div class='col-lg-8'>
                        <?php echo $formulario; ?>                      
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