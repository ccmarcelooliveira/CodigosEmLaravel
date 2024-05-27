
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

    function pesquisa_modelo_carro(num){

            var idMontadora = $("#montadora"+num).val();       
            var get_token = $('input[name="_token"]').val();

            
            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaModelo') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idMontadora
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                        
                      $("#modelo"+num).html('');
                      $("#modelo"+num).append(result);
                },
                error: function () {

                }


            });

    }
</script>
 
<script type="text/javascript">

    function BuscaFornecedor(num){

            var idCategoria = $("#categoria"+num).val();
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
                   
                      $("#marca"+num).html('');
                      $("#marca"+num).append(result);
                },
                error: function () {
                    alert('erro');
                }


            });

    }
    
    
     function BuscaCodigoProduto(num){


            var idCategoria = $("#categoria"+num).val();
            var idMarca = $("#marca"+num).val();
            var idPesAutMod = $("#pesAutMod").val();
            var idPesAutFab = $("#pesAutFab").val();
            
            /*alert(idPesAutMod);
            alert(idPesAutFab);
            alert(num);*/
            
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
                    "id3": idPesAutFab,
                    "id4": idPesAutMod
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                   //alert(result);
                      $("#codigo"+num).html('');
                      $("#codigo"+num).append(result);
                },
                error: function () {
                    alert('erro');
                }


            });

    }
    
</script>

<script type="text/javascript">
    
    function teste(){
       
        var MaoObra = $("#maoobra").val();        
        var nameList = MaoObra.split('-');
        
        var testeval = $("#tesval").val(); 
        
        if(tesval == 0){
            testeval = 1;
        }else{
            testeval += 1;
        }
        document.getElementById('tesval').value = testeval;
        //alert('Total ' + document.getElementById('tesval').value);
        
            //alert(testeval.length);
        $("#listaMaoObra").append("<div class='form-group'><input type='input' size='50' id='"+nameList[0]+"' readonly value='"+nameList[1]+"'><input type='hidden' id='"+testeval.length+"h' value='"+nameList[0]+"'></div>");
        $("#listaMaoObraBotao").append("<div class='form-group'><button type='button' id='"+nameList[0]+"b' class='btn btn-primary'  onclick='javascript:remover("+nameList[0]+")'>Excluir</button></div>");
       
      
       
    }
    
    
    function remover(num) {       
        var elem = document.getElementById(num);       
        elem.parentNode.removeChild(elem); 
        document.getElementById(num+'b').style.display = 'none';
        return false;
    }
</script>
<script type="text/javascript">

    function AtualizarOS(status,id){

            //var idMontadora = $("#montadora"+num).val();       
            var get_token = $('input[name="_token"]').val();

            if (window.confirm("Deseja Concluir a Ordem de Serviço(OS)?")) {
               
                $.ajax({
                    headers: {
                        'X-CSRF-Token': get_token
                    },
                    url: "{{ URL::to('ajax/atualizaStatus') }}",
                    type: "POST",
                    dataType: 'html',
                    data: {
                        "id": status,
                        "id2": id
                    },
                    beforeSend: function () {
                        //mostrando/883/ um gif de enviando
                        //document.getElementById("enviando").style.display = "block";
                    },
                    success: function(result) {
                            //alert('');
                          /*$("#modelo"+num).html('');
                          $("#modelo"+num).append(result);*/
                          window.location.href = 'https://www.praxos.com.br/praxosAuto/public/master/osv';
                    },
                    error: function () {

                    }


                });
            }
            

    }
</script>
<?php

$util = new \app\Util\Util();

$dispositivo = $util ->Gadget();

?>
        
<!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
                            
            <?php echo $dispositivo;
             
                if($dispositivo == "computador"){ ?>  
                    <div class="card">

                      <div class="card-header">
                        <h3 class="card-title"></h3>
                      </div>
                      <div class="card-body">

                                <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                                        <div class="row">
                                            <div class="col-lg-12">

                                                    <div class="card card-primary">  
                                                        <div class="card-header">
                                                          <h3 class="card-title">INFORMAÇÕES DO AUTOMÓVEL >>C<< </h3>
                                                        </div>
                                                        <div class="card-body">
                                                                <div class='col-lg-12'>

                                                                    <?php echo $cabecalho; ?>
                                                                    {{csrf_field()}}
                                                                </div>  


                                                             <?php echo $pesAutMod; ?>
                                                             <?php echo $pesAutFab; ?>
                                                        </div> 
                                                    </div>

                                            </div> 
                                             <div class="col-lg-12">

                                                    <div class="card card-danger">  
                                                        <div class="card-header">
                                                          <h3 class="card-title">O QUE DEVE SER VERIFICADO! </h3>
                                                        </div>
                                                        <div class="card-body">

                                                                <div class='col-lg-12'>
                                                                    <?php echo $formulario; ?>
                                                                    {{csrf_field()}}
                                                                </div>                              
                                                        </div> 
                                                    </div>

                                            </div>
                                            <div class="col-lg-8">

                                                    <div class="card card-success">  
                                                        <div class="card-header">
                                                          <h3 class="card-title">LISTA DE PEÇAS >>C<<</h3>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class='col-lg-12'>
                                                                <?php echo $pesquisaP; ?>
                                                                {{csrf_field()}}
                                                            </div>                                 

                                                        </div> 
                                                    </div>

                                            </div>    
                                            <div class="col-lg-4">
                                                    <div class="card card-yellow">  
                                                            <div class="card-header">
                                                              <h3 class="card-title">MÃO DE OBRA >>C<<</h3>
                                                            </div>
                                                            <div class="card-body">

                                                                    <div class='col-lg-12'>
                                                                        <?php echo $pesquisaMO; ?>

                                                                        {{csrf_field()}}
                                                                    </div>                             

                                                            </div> 
                                                        </div>
                                            </div>



                                        </div> 
                                        <div class="row">
                                            <div class="col-lg-6">
                                                        <div class="card-body">

                                                            <button type="button" class="btn btn-danger"  onclick="AtualizarOS('CON','<?php echo $idObjeto; ?>')">
                                                                CONCLUIR OS
                                                            </button>
                                                        </div> 
                                            </div>
                                            <div class="col-lg-6">

                                                        <div class="card-body">

                                                                <div class='col-lg-12'>
                                                                    <?php echo $botao; ?>

                                                                </div>                              

                                                        </div> 


                                            </div>
                                         </div>     
                                </form>

                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->

                    <!-- /.card -->
                  </div>
              
            <?php }else{ 
                echo "mob"; ?>   
              
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#veiculo" data-toggle="tab">Veículo</a></li>
                                    
                  <li class="nav-item"><a class="nav-link" href="#peca" data-toggle="tab">Peças</a></li>
                  <li class="nav-item"><a class="nav-link" href="#mao" data-toggle="tab">Mão de Obra</a></li>
                </ul>
              </div><!-- /.card-header -->
              <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
              <div class="card-body">
                <div class="tab-content">
                    
                    
                    <div class="active tab-pane" id="veiculo">                     
                        <div class="row">


                            <div class="card card-primary">  
                                <div class="card-header">
                                  <h3 class="card-title">INFORMAÇÕES DO AUTOMÓVEL </h3>
                                </div>
                                @if(isset($imagem))
                                    <center> <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p></center>
                                @endif 
                                <div class="card-body">
                                        <div class='col-lg-12'>

                                            <?php echo $cabecalho; ?>
                                            {{csrf_field()}}
                                        </div>  


                                     <?php echo $pesAutMod; ?>
                                     <?php echo $pesAutFab; ?>
                                </div> 
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="card card-danger">  
                                     <div class="card-header">
                                       <h3 class="card-title">O QUE DEVE SER VERIFICADO! </h3>
                                     </div>
                                     <div class="card-body">

                                             <div class='col-lg-12'>
                                                 <?php echo $formulario; ?>
                                                 
                                             </div>                              
                                     </div> 
                                </div>
                            </div>    
                            

                        </div>
                    </div>
                    
                    <div class="tab-pane" id="peca">                     
                        <div class="row">

                            <div class="col-lg-12">
                                
                                <div class="card card-primary">  
                                    <div class="card-header">
                                      <h3 class="card-title">PEÇAS >>M<<</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class='col-lg-12'>                                           
                                                 <?php echo $listapCelular; ?>
                                                {{csrf_field()}}
                                            
                                        </div>                                       
                                    </div> 
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    
                    <!-- /.post -->
                   <div class="tab-pane" id="mao">                     
                        <div class="row">

                            <div class="col-lg-12">
                               
                                <div class="card card-primary">  
                                    <div class="card-header">
                                      <h3 class="card-title">MÃO DE OBRA >>M<<</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class='col-lg-12'>
                                              
                                              <?php   echo $listamCelular; ?>
                                                {{csrf_field()}}
                                            
                                        </div>                                       
                                    </div> 
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    
                    
                    
                   
                     <div class="row">
                        <div class="col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <button type="button" class="btn btn-danger"  onclick="AtualizarOS('CON','<?php echo $idObjeto; ?>')">
                                                    CONCLUIR OS
                                                </button>
                                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
                                                <?php echo $botao; ?>
                                            </div>    
                                        </div> 
                                    </div>    
                        </div>
                        
                     </div>
                    
               </div> 
         
      
                </div>
              </form>
            <?php } ?>  
          <!-- /.col -->
          </div>
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
        
        
@endsection