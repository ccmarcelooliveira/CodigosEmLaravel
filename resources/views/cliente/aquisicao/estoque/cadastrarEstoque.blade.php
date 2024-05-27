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
     

<script type="text/javascript">

    function pesquisa_modelo_carro(num){

            var idFabricante = $("#fabricante").val(); 
            //var idMarca = $("#marca").val();
            var get_token = $('input[name="_token"]').val();


            
            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaModeloV2') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idFabricante
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                       
                      $("#modelo").html('');
                      $("#modelo").append(result);
                },
                error: function () {

                }


            });

    }
</script>
 
<script type="text/javascript">

    function BuscaFornecedor(num){

            var idCategoria = $("#categoria").val();
            //var idModelo = $("#modelo"+num).val();    
            var get_token = $('input[name="_token"]').val();

            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaFornecedor') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idCategoria
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                   //alert(result);
                      $("#marca").html('');
                      $("#marca").append(result);
                },
                error: function () {
                    alert('erro');
                }


            });

    }
    
    
    function BuscaCodigoProduto(){

            var idCategoria = $("#categoria").val();
            var idMarca = $("#marca").val();
            var idFabricante = $("#fabricante").val();
            var idModelo = $("#modelo").val();
            
            
            
            alert(idCategoria + " - "+idMarca + " - "+ idFabricante + " - "+ idModelo);
            var get_token = $('input[name="_token"]').val();
           

            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaCodigoProduto') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idCategoria,
                    "id2": idMarca,
                    "id3": idFabricante,
                    "id4": idModelo
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {  
                    alert(result);
                      $("#codigo").html('');
                      $("#codigo").append(result);
                },
                error: function () {
                    alert('erro');
                }


            });

    }
    
    
    function BuscaCodigoProduto2(num){


            var idCategoria = $("#categoria").val();
            var idMarca = $("#marca").val();
            var idModelo = $("#modelo").val();
            var idFabricante = $("#fabricante").val();
            
            alert(idModelo);
            alert(idFabricante);
            var get_token = $('input[name="_token"]').val();
           

            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaCodigoProduto') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idCategoria,
                    "id2": idMarca
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                   
                      $("#codigo").html('');
                      $("#codigo").append(result);
                },
                error: function () {
                    alert('erro');
                }


            });

    }
    
    
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
              
              <div class="card-body">
                 <div class='panel-heading'>
                Cadastro de Produto
                </div>
                <div class='panel-body'>
                    <form method="post" id="registration-form" name="form" id="form"  data-toggle="validator" enctype="multipart/form-data">

                            <p align='right'>      

                                <?php echo $formulario; ?> <br>  
                                {{csrf_field()}}

                            </p>

                    </form>  
                </div>           
 
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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