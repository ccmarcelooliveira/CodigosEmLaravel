
@extends('administracaoDagoba.layout2')

@section('conteudo')

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
                        alert(result);
                      $("#modelo"+num).html('');
                      $("#modelo"+num).append(result);
                },
                error: function () {

                }


            });

    }
</script>
       
<script type="text/javascript">

    function pesquisa_peca_carro(num){

            var idMontadora2 = $("#montadora"+num).val();
            var idModelo = $("#modelo"+num).val();    
            var get_token = $('input[name="_token"]').val();


            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/pesquisaPecaAuto') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": idMontadora2,
                    "id2": idModelo
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                    
                      $("#peca"+num).html('');
                      $("#peca"+num).append(result);
                },
                error: function () {
                    alert('erro');
                }


            });

    }
</script>

 
<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
            Consulta de Peças Automotivas 
        </h1>
        {!! $resp or '' !!}

        <!-- Page Heading/Breadcrumbs -->
        
        <!-- /.row -->
            <div class="col-lg-6">
                <div class="panel panel-primary">
                
                        <div class="panel-heading">
                             PESQUISA DE PEÇAS AUTOMOTIVAS                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                    <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >

                                        <div class='col-lg-12'>
                                            <?php echo $pesquisa; ?>
                                            {{csrf_field()}}
                                        </div>                              

                                    </form>
                            </div>
                        </div>    
                </div>
            </div> 
        <div class="col-lg-6">
                <div class="panel panel-primary">
                
                        <div class="panel-heading">
                             MÃO DE OBRA                
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                    <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >

                                        <div class='col-lg-12'>
                                            <?php echo $pesquisaM; ?>
                                            {{csrf_field()}}
                                        </div>                              

                                    </form>
                            </div>
                        </div>    
                </div>
            </div> 
                
        

        
</div>
@endsection