
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

        
       

<!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
              
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dicas Praxos!</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Dados de cadastro do morador</strong>

                <p class="text-muted">
                  Deixe sempre atualizado os dados de cadastro dos moradores, junto à administração do condomínio.
                  Isso ajuda no controle e no aumento da segurança para os moradores.
                </p>

                <hr>

                <!--<strong><i class="fas fa-map-marker-alt mr-1"></i> </strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card card-primary">  
              <div class="card-header">
                <h3 class="card-title">Cadastrar Entrega</h3>
              </div>
              <div class="card-body">
                
                   
                        <form method="post" id="registration-form" name="form" id="form"  data-toggle="validator" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4">


                                    <?php echo $formulario; ?>  

                                    {{csrf_field()}}

                                </div>
                                <div class='col-lg-8'>
                                    <p align='right'>      

                                        <?php echo $formulario2; ?> <br>       

                                    </p>

                                </div>                            
                            </div>
                        </form> 
                  
                 
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          </div>
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

        
<script type="text/javascript">
    loadCamera();
</script>           

@endsection