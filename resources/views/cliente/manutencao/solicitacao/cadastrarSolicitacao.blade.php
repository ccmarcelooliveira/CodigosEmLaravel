
@extends('master.layoutAnexo')

@section('conteudo')

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

 <script language="JavaScript">
        
            function testeAparecer(objeto) {                 
                if(objeto == 'are'){
                    document.getElementById('area').style.visibility = 'visible';
                    document.getElementById('bloco').style.visibility = 'hidden';
                    document.getElementById('andar').style.visibility = 'hidden';
                } 
                if(objeto == 'blo'){
                    document.getElementById('area').style.visibility = 'hidden';
                    document.getElementById('bloco').style.visibility = 'visible';
                    document.getElementById('andar').style.visibility = 'visible';
                } 
                if(objeto == 'apto'){
                    document.getElementById('area').style.visibility = 'hidden';
                    document.getElementById('bloco').style.visibility = 'hidden';
                    document.getElementById('andar').style.visibility = 'hidden';
                } 
            }  
              
   //
   // document.getElementById('divaqui').style.visibility = 'visible';                       

</script>
<style>
		body{
			font-family: sans-serif;
			margin: 0;
		}

		.area{
			margin: 10px auto;
			box-shadow: 0 10px 100px #ccc;
			padding: 20px;
			box-sizing: border-box;
			max-width: 500px;
		}

		.area video{
			width: 100%;
			height: auto;
			background-color: whitesmoke;
		}

		.area textarea{
			width: 100%;
			margin-top: 10px;
			height: 80px;
			box-sizing: border-box;
		}

		.area button{
			-webkit-appearance: none;
			width: 100%;
			box-sizing: border-box;
			padding: 10px;
			text-align: center;
			background-color: #068c84;
			color: white;
			text-transform: uppercase;
			border: 1px solid white;
			box-shadow: 0 1px 5px #666;
		}

		.area button:focus{
			outline: none;
			background-color: #0989b0;
		}

		.area img{
			max-width: 100%;
			height: auto;
		}

		.area .caminho-imagem{
			padding: 5px 10px;
			border-radius: 3px;
			background-color: #068c84;
			text-align: center;
		}

		.area .caminho-imagem a{
			color: white;
			text-decoration: none;
		}

		.area .caminho-imagem a:hover{
			color: yellow;
		}
	</style>   

<script type="text/javascript">
    function capturarImagem() {
       
        <?php
            $util = new \app\Util\Util();        
                if($util->ChecarDispositivo() == "computador"){
                    
        ?>
            //alert('comp');
            preview_snapshot();
            save_photo();
        <?php
                }else{
        ?>        
            //alert('celular');
            takeSnapShot();
        <?php
                }
        ?>        
    }
</script>

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
                      
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Cadastro de Solicitação
                    </div>
                    <div class='panel-body'>

                            <div class="row">
                                <form method="post" id="registration-form" id="form" name="form" data-toggle="validator" enctype="multipart/form-data">
                                   <div class="col-lg-4">


                                       <P><P>
                                       <center>
                                               <?php echo $formulario; ?>  
                                       </center> 
                                   </div>
                                   <div class="col-lg-8">
                                       <P><P>
                                           <?php echo $formulario2; ?>  


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
                           
         
       
        <script type="text/javascript">
            loadCamera();
        </script>
        
        
@endsection