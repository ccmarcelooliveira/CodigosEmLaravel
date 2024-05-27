<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GS2I - Gestão Social Integrada e Inteligente</title>

   <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }} ">

        <!-- Custom CSS -->
        <link href="{{ asset('layout_business/css/modern-business.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('layout_business/font-awesome/css/font-awesome.min.css') }}"  rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
               
           
    
            function alerta(){
                
               alert("Por favor, preencha o Nome e a Data de Nascimento do dependente!")
            }    
                
        </script>
</script> 
</head>

<body>

    
     <nav class="navbar navbar-inverse " role="navigation">
         
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Alternar navegação</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('logar') }}"><img src="{{asset("img/inpi2.gif")}}" height="100"></a>
          </div>
          
          
        </div>
         
    </nav>
&nbsp;
<br>
&nbsp;
<br>
&nbsp;
<br>
&nbsp;
<br>
&nbsp;
<br>
    
    <div class="container">
       
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">CADASTRO DE NOVO MORADOR
                        <small></small>
                    </h1>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                   
                    Orientações em seu email
                        
                </div>

            </div>
        
        
           
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small></small>
                    </h1>

                </div>
            </div>
            <!-- Footer -->
            <div class="panel-footer panel-primary" >

              <!-- Footer Links -->
              <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <img src="{{asset("img/modelo_gs2i-7.png")}}" height="50">
                    <h5 class="text-uppercase"><b>Gestão Social Integrada e Inteligente</b></h5>
                    <p>Aproveite cada segundo da vida, deixano a gestão com o GS2I!</p>

                  </div>
                  <!-- Grid column -->

                  <hr class="clearfix w-100 d-md-none pb-3">

                  <!-- Grid column -->
                  <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Parceiros</h5>

                    <ul class="list-unstyled">
                      
                      <li>
                        <a href="#!">Universidade Federal Fluminense(UFF)</a>
                      </li>
                      <li>
                          <p>&nbsp;
                      </li>
                      <li>
                          <p>&nbsp;
                      </li>
                      <li>
                          <p>&nbsp;
                      </li>
                    </ul>

                  </div>
                  <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">Clientes</h5>

                    <ul class="list-unstyled">
                      <li>
                        <a href="#!">Condomínio Mirante do Rio</a>
                      </li>
                      <li>
                          <p>&nbsp;
                      </li>
                      
                    </ul>

                  </div>
                  <!-- Grid column -->
                  <!--<div class="col-md-3 mb-md-0 mb-3">

                   
                    <h5 class="text-uppercase">Fornecedores</h5>

                    <ul class="list-unstyled">
                      <li>
                        <a href="www.kinghost.net">KingHost</a>
                      </li>
                      <li>
                        <a href="www.registro.br">RegistroBR</a>
                      </li>
                      <li>
                          <p>&nbsp;
                      </li>
                      
                    </ul>

                  </div>
                  -->

                </div>
                <!-- Grid row -->

              </div>
              <!-- Footer Links -->

              <!-- Copyright -->
              <div class="footer-copyright text-center py-3">© <?php echo date("Y") ?> Copyright:
               
                <img src="{{asset("img/modelo_gs2i-7.png")}}" height="20"></a> - Gestão Social Integrada e Inteligente
              </div>
              <!-- Copyright -->

            </div> <!-- Final footer -->
        
<!-- Footer -->
    </div>
    <!-- /.container -->

    
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
          interval: 5000 //changes the speed
        })
    </script>

</body>

</html>
