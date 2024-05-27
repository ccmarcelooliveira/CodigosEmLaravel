 
@extends('master.layout2')

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
function ajaxprod(){
  $.ajax({
    'processing': true, 
    'serverSide': false,
      type: "GET",
      data: {item_categoria: $("#item_categoria").val()},
      url: "/produtos/ajaxprod",
      success: function(s) {
        var s = $(s);
        var table = $('#tableitem').DataTable();
        table.clear();
          for(var i = 0; i < s.length; i++) {
               table.row.add([
                s[i]['id'],
                s[i]['nome'],
                s[i]['quantidade'],
                s[i]['valor'],
                s[i]['tamanho'],
                s[i]['descricao'],
                s[i]['categoria_id'],
            ]);
          }
        table.draw();
      }
  });
}
</script>

<script type="text/javascript">

    function recupera_dados_apresentacao_grafico(){

            var utilizado = 0;
            var disponibilizado = 0;
            var idVencto = $("#vencto").val();
          //alert(idVencto);
            var idConta = $("#conta").val();
            //alert(idConta);
            var idSubConta = $("#subconta").val();
            //alert(idSubConta);
            //alert(idSubConta);
            var get_token = $('input[name="_token"]').val();
            
            if(idVencto != "" && idSubConta != ""){
                
                //alert("entrou");
                
                $.ajax({
                    headers: {
                        'X-CSRF-Token': get_token
                    },
                    url: "{{ URL::to('ajax/pesquisaPagamentoGrafico') }}",
                    type: "POST",
                    dataType: 'html',
                    data: {
                        "id": idConta,
                        "id2": idSubConta,
                        "id3": idVencto
                    },
                    beforeSend: function () {
                        //mostrando/883/ um gif de enviando
                        //document.getElementById("enviando").style.display = "block";
                    },
                    success: function(result) {
                        
                        //alert('Utilizado ' + result);
                       
                        //alert(utilizado);
                        if(result == 'NOK'){
                            utilizado = 0;
                            disponibilizado = 0;
                        }else{
                            utilizado = parseInt(result);
                            disponibilizado = parseInt(100-result);
                        }  
                        //alert(utilizado);
                         //alert('Disponibilizado ' + disponibilizado);
                        document.getElementById("piechart").style.display = "block";
                        //drawChart(ss[1],ss[0]);
                        drawChart(disponibilizado,utilizado);
                    },
                    error: function () {

                    }


                });
            }    

    }
</script> 

<script type="text/javascript">

    function pesquisa_sub_conta(){

            var idConta = $("#conta").val();
            var idSubConta = $("#subconta").val();                
            var get_token = $('input[name="_token"]').val();

            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaSubConta') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idConta,
                    "id2": idSubConta
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                      $("#subconta").html('');
                      $("#subconta").append(result);
                },
                error: function () {

                }


            });

    }
</script> 


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart(disponivel,utilizado) {
      //alert('tedte ' + disponivel + ' ' + utilizado);
      
      var data = google.visualization.arrayToDataTable([
        ['Conta', 'Percentual de utilização'],
        ['Disponível',     disponivel],
        ['Consumido',      utilizado]
      ]);
    
      var options = {
        title: 'Evolução da Conta'
      };
    
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
   
      chart.draw(data, options);
    }
</script> 
<script type="text/javascript">

function moeda(z){
    v = z.value;
    v=v.replace(/\D/g,"") // permite digitar apenas numero
    v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
    v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
    v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
    v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
    v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
    z.value = v;
}
</script>

        <!-- Page Heading/Breadcrumbs -->
       <?php echo $barra_funcionalidade ?>
      
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Edição de Pagamento
                    </div>
                    <div class='panel-body'>

                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                               
                                <div class='col-lg-4'>
                                    <div class="panel-body">
                                         <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-pie-chart"></div>
                                        </div>
                                        <center><div id="piechart" style="width: 400px; height: 300px; display:none;" ></div></center>
                                    </div>
                                </div>
                                <div class='col-lg-8'>
                                    <P><P>
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