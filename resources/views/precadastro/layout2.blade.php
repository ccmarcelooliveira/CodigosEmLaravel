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
    <link href="{{ asset('bootstrapAdm/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('bootstrapAdm/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('bootstrapAdm/dist/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('bootstrapAdm/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('bootstrapAdm/bower_components/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('bootstrapAdm/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

     <!-- jQuery -->
    <script src="{{ asset('bootstrapAdm/bower_components/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bootstrapAdm/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
   
    <link href="{{ asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-ui/jquery-ui.min.css') }}">    
    
    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">
        
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"   type="text/javascript"></script>
        
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  
   <link rel="icon" type="image/png" href="{{asset("img/gs2i-ico3.ico")}}" />
   
   
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
 
        
     
        <link href="{{ asset('js/popup/goNotification.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/popup/ga.js') }}" async="" type="text/javascript"></script>        
        <script src="{{ asset('js/popup/goNotification.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/webcam.min.js') }}"></script>
       
        <!--Calendario full-->
        <link href="{{ asset('calendar/fullcalendar.min.css')}}" rel='stylesheet' />
        <script src="{{ asset('calendar/lib/moment.min.js')}}"></script>
        <script src="{{ asset('calendar/fullcalendar.min.js')}}"></script>
        <script src="{{ asset('calendar/locale/pt-br.js')}}"></script>
        
        <!-- Morris Charts JavaScript -->
        <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('vendor/morrisjs/morris.min.js') }}"></script>
        
        
        <!--FORMATAR HORA -->
        <script type="text/javascript" src="{{ asset('js/FormatarHora/jquery.inputmask.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/FormatarHora/jquery.inputmask.extensions.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('js/FormatarHora/jquery.inputmask.date.extensions.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/safe/safety.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dt/datas.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/FormatarTelefone/telefone.js') }}"></script>
       
     
        <script type='text/javascript'>
        var code;
        function createCaptcha() {
          //clear the contents of captcha div first 
          document.getElementById('captcha').innerHTML = "";
          var charsArray =
          "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
          var lengthOtp = 6;
          var captcha = [];
          for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
              captcha.push(charsArray[index]);
            else i--;
          }
          var canv = document.createElement("canvas");
          canv.id = "captcha";
          canv.width = 200;
          canv.height = 50;
          var ctx = canv.getContext("2d");
          ctx.font = "25px Georgia";
          ctx.strokeText(captcha.join(""), 0, 30);
          //storing captcha so that can validate you can save it somewhere else according to your specific requirements
          code = captcha.join("");
          document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
        }
        
        function validateCaptcha() {
          event.preventDefault();
          debugger
          if (document.getElementById("cpatchaTextBox").value == code) {
            alert("Valid Captcha");
            document.getElementById("registration-form").submit(); 
          }else{
            alert("Preencha o campo código com ");
            createCaptcha();
          }
        }

</script>

<style>
input[type=text] {
    padding: 7px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
}
button{
  background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 30px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
canvas{
  /*prevent interaction with the canvas*/
  pointer-events:none;
}
</style>
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
               
            /* Carrega os blocos dos apartamento */
            function carrega_blocos(){

                    var apto = $("#apto").val();
                    var id = $("#id").val();
                    //alert(apto);
                    //var idSubConta = $("#subconta").val();                
                    var get_token = $('input[name="_token"]').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-Token': get_token
                        },
                        url: "{{ URL::to('ajax/pesquisaSubBlocos') }}",
                        type: "POST",
                        dataType: 'html',
                        data: {
                            "id": id,
                            "id2": apto
                        },
                        beforeSend: function () {
                            //mostrando/883/ um gif de enviando
                            //document.getElementById("enviando").style.display = "block";
                        },
                        success: function(result) {
                            //alert(result);
                              $("#bloco").html('');
                              $("#bloco").append(result);
                        },
                        error: function () {

                        }


                    });

            }   
           
    
            function alerta(){
                
               alert("Por favor, preencha o Nome e a Data de Nascimento do dependente!")
            }    
                
        </script>

        <script type="text/javascript">

            function pesquisa_modelo_carro(ordem){

                    var idMarca = $("#marca"+ordem).val();
                  
                    var get_token = $('input[name="_token"]').val();


                    $.ajax({
                        headers: {
                            'X-CSRF-Token': get_token
                        },
                        url: "{{ URL::to('ajax/pesquisaModelo') }}",
                        type: "POST",
                        dataType: 'html',
                        data: {
                            "id": idMarca
                        },
                        beforeSend: function () {
                            //mostrando/883/ um gif de enviando
                            //document.getElementById("enviando").style.display = "block";
                        },
                        success: function(result) {

                              $("#modelo"+ordem).html('');
                              $("#modelo"+ordem).append(result);
                        },
                        error: function () {

                        }


                    });

            }
        </script>
  
</head>


<body onload="createCaptcha()">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '402547174444794',
      cookie     : true,
      xfbml      : true,
      version    : 'v9.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
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
      <div id="wrapper">
         
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Alternar navegação</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           <img src="{{asset("img/inpi2.gif")}}" height="100">
          </div>
          
        </div>
         
            <!-- /.navbar-static-side -->
        
            <div class="col-xs-12">
                <div id="page-wrapper">
 
                    <div class="col-xs-12">  
                        @yield("conteudo")
                    
                    </div>

                </div>       
            </div>
            
           @yield('post-script')
        
    </div>
    <!-- /#wrapper -->
   
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('bootstrapAdm/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -- EXIBE O MODELO DE TABELA -->
    <script>
        $(document).ready(function () {
          $('#dataTables-example').DataTable({
            responsive: true
          });
        });
    </script>
    
    
    
       

        <!-- Flot Charts JavaScript -->
        <script src="{{ asset('vendor/flot/excanvas.min.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('vendor/flot-tooltip/jquery.flot.tooltip.min.js') }}"></script>
        
        
       
            
    <!-- Custom Theme JavaScript -->
    
    <script src="{{ asset('bootstrapAdm/dist/js/sb-admin-2.js') }}"></script>
    
   
    
    
   
    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© <?php echo date("Y"); ?> Copyright:
    <a href="https://www.gs2i.com.br"> <img src="{{ asset('img/inpi.jpg') }}" height="30"></a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>

</html>
