
@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
    
    $("#vencto").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#pagto").datepicker({
        dateFormat : 'dd/mm/yy'
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
    
    
    function realod(){
            window.opener.location.reload(); 
            window.close();
    }
</script> 


        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        
        <div class='col-lg-12'>
            <form method="post" name="form"  id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Baixar Pagamento
                    </div>
                    <div class='panel-body'>
                            
                        <div class="col-lg-12">

                            <?php echo $formulario; ?>   


                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                            {{csrf_field()}}

                        </div>

                     </div>                                                
                </div>
            
                <div class='col-lg-12'>
                    <p align='right'> 
                        <input type='submit' value='Enviar' class='btn btn-success' >                        
                              
                        <button class='btn btn-primary' value='Voltar' onClick='realod();'>Fechar</button>
                    </p>
                </div>
            </form>
        </div>
@endsection