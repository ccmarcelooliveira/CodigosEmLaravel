

@extends('master.layout2')

@section('conteudo')

<script>
$(function(){
    
     $("#dataInclusao").datepicker({
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




        <?php echo $barra_funcionalidade ?>
       
        
        
           
              <div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            Cadastro de Classificados
                        </div>
                        <div class='panel-body'>

                            <div class="row">
                                <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">
                                   <div class="col-lg-4">

                                       <P><P>
                                       <center>
                                               <img id="thumb3" src="{{asset("img/carro_imagem.jpg")}}" height="200" alt=""><p>

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
                                   </div>
                                    <div class="col-lg-8">
                                       <P><P>
                                           <?php echo $formulario; ?>  


                                           <!--
                                               faz a validacao para erro crsf. tokenizacao
                                           -->
                                           {{csrf_field()}}



                                   </div>

                                 
                               </form>
                           </div>

                         </div>                                                
                    </div>
            </div>
           

         
@endsection