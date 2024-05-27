
@extends('master.layout2')

@section('conteudo')
<script>
$(function(){
    
    $("#dtNasc").datepicker({
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
     
   
<!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


            <?php echo $cardMorador ?>
             
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dicas Praxos!</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Cadastro de Funcionários</strong>

                <p class="text-muted">
                  Deixe sempre atualizado os dados de cadastro dos Funcionários.
                  
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
              
              <div class="card-body">
                    <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">  
                            <div class="tab-content">


                                    <div class='row'>
                                        <div class="col-lg-4">
                                                <center>
                                                        <img id="thumb3" src="{{asset("img/silhueta.png")}}" height="200" alt=""><p>

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
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Função e Comissões</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                    <div class="col-lg-8">    
                        <?php echo $formulario2; ?> 
                    </div>   
                    <div class="col-lg-8"> 
                        <?php echo $botoes; ?> 
                    </div>     
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

               
@endsection