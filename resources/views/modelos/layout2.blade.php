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
       

        <script>

          $(document).ready(function() {

            $('#calendar').fullCalendar({
              header: {
                left: 'prev,next, today',
                center: 'title'
                //right: 'listDay,listWeek,month'
              },

              // customize the button names,
              // otherwise they'd all just say "list"
              views: {
                //listDay: { buttonText: 'Lista Dia' },
                listWeek: { buttonText: 'Lista Semana' },
                //month: { buttonText: 'Mês' }
              },

              defaultView: 'listWeek',
              defaultDate: '<?php if(isset($diaInicio)) echo $diaInicio; ?>',
              navLinks: true, // can click day/week names to navigate views
              editable: true,
              eventLimit: true, // allow "more" link when too many events
              events: [
                <?php if(isset($listaEventos)) echo $listaEventos; ?>
              ]
            });

          });

        </script>
        
        <style>

          body {
            margin: 0px 0px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
          }

          #calendar {
            max-width: 1200px;
            margin: 0 auto;
          }

        </style>
        
        <script language="JavaScript">
		// preload shutter audio clip
		var shutter = new Audio();
		shutter.autoplay = false;
		shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
		
		function preview_snapshot() {
			// play sound effect
                        //alert("preview sn");
			try { shutter.currentTime = 0; } catch(e) {;} // fails in IE
			shutter.play();
			
			// freeze camera so user can preview current frame
			Webcam.freeze();
			
			// swap button sets
			document.getElementById('pre_take_buttons').style.display = 'none';
			document.getElementById('post_take_buttons').style.display = '';
		}
		
		function cancel_preview() {
			// cancel preview freeze and return to live camera view
			Webcam.unfreeze();
			
			// swap buttons back to first set
			document.getElementById('pre_take_buttons').style.display = '';
			document.getElementById('post_take_buttons').style.display = 'none';
		}
		
		function save_photo() {
                   
			// actually snap photo (from preview freeze) and display it
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/><br/>';
				
                                document.getElementById('imagem_canvas').value = data_uri;
                                //alert(data_uri);
				// shut down camera, stop capturing
				Webcam.reset();
				
				// show results, hide photo booth
				document.getElementById('capturar').style.display = '';
                                document.getElementById('camera').style.display = 'none';
				document.getElementById('my_photo_booth').style.display = 'none';
			} );
		}
                
                
                 function popup(pagina,width, height) {                
              
                    window.open(pagina,"teste","menubar=no,resizable=yes,width="+width+",height="+height);
                
                /**
                 * 
                 * @type type
                 * 1. registrar informações
                 * 2. atualizar página de fundo
                 * 3. 
                 */
                }
	</script>
        
         <script language="JavaScript">
           
            function fechar() {  
                window.close();
            }
            function realod() {                
                window.opener.location.reload();   
            }                          
           
	</script>
         
        <script language="JavaScript">
            $(document).ready(function(){
                    $("#pritur1").inputmask("h:s",{ "placeholder": "hh/mm" });
                    $("#pritur2").inputmask("h:s",{ "placeholder": "hh/mm" });
                });
        </script>        
        
  
</head>

<body <?php if(isset($tes)){ if($tes=="SALVO"){?> onload="realod();" <?php }} ?>>

     <script type="text/javascript">

            function ChecarEmail(){                
                   
                var email = $("#email").val();
                
                var get_token = $('input[name="_token"]').val();
                
                $.ajax({
                    headers: {
                        'X-CSRF-Token': get_token
                    },
                    url: "{{ URL::to('/test/ChecarEmail') }}",
                    type: "POST",
                    dataType: 'html',
                    data: {
                        "id": email
                    },
                    beforeSend: function () {
                        //mostrando um gif de enviando
                       // document.getElementById("enviando").style.display = "block";
                    },
                    success: function(result) {
                            
                        if(result == "NOK"){
                            alert('E-mail já cadastrado!');
                            document.getElementById("email").value= "";
                        }                       

                    },
                    error: function () {
                        //alert(" Can't do because: " + error);                       

                    }

                });
               
            }         

            function mascaraData(campoData, campo){
                  var data = campoData.value;

                  if (data.length == 2){
                        data = data + '/';
                        //document.forms[0].data.value = data;
                        document.getElementById(campo).value = data;
                        return true;              
                  }
                  if (data.length == 5){
                        data = data + '/';
                        document.getElementById(campo).value = data;
                        //document.forms[0].data.value = data;
                        return true;
                  }
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
    <div id="wrapper">

        <!-- Navigation -->
        
        
        
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route("master::noticias")}}">
                            <table> <tr><td valign="top"><img src="{{ asset('img/entrega.png') }}" height="60"></td><td valign="top"><font size="5">{{ $condominio }}</font></td></tr></table>
                        </a>
                    </div>
                    <!-- /.navbar-header -->

                    <ul class="nav navbar-top-links navbar-right">
                        <!--<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>John Smith</strong>
                                            <span class="pull-right text-muted">
                                                <em>Yesterday</em>
                                            </span>
                                        </div>
                                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#">
                                        <strong>Read All Messages</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-tasks">


                            </ul>

                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">

                            </ul>

                        </li>-->

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <a href='{{ route('master::usuPai') }}'>
                                            <img id="thumb" src="{{asset($usuarioIMG)}}" height="40" alt=""></i> {{ $usuario }}</a>
                                    </li>
                                    <!--<li><a href='{{ route('master::painel') }}'><i class='fa fa-gear fa-fw'></i> Painel de Controle</a>
                                    </li>-->
                                    <li><a href='{{ route('master::faq') }}'><i class='fa fa-gear fa-fw'></i> FAQ</a>
                                    </li>
                                    <!--<li><a href='{{ route('master::guia') }}'><i class='fa fa-gear fa-fw'></i> Guia Rápido</a>
                                    </li>-->

                                <li class="divider"></li>
                                <li><a href="{{ route("admin::sair")}}"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                                </li>
                            </ul>

                        </li>

                    </ul>

                    
                    
                    <!-- TESTE DE EXISTÊNCIA DE MENU -->
                    <?php if(isset($apa)){ ?>

                            <div class="navbar-default sidebar" role="navigation">
                                <div class="sidebar-nav navbar-collapse">
                                <div class='col-lg-12'>
                                    &nbsp;<P><P>&nbsp;<P><P>&nbsp;<p><P>
                                </div>        
                                <div class='col-lg-12'>
                                    <div class='panel panel-primary'>
                                        <div class='panel-heading'>
                                            Menu
                                        </div>
                                        <div class='panel-body'>
                               
                                    <ul class="nav" id="side-menu">
                                       

                                       <li>
                                            <?php 
                                                $função = "Painel de Controle";
                                                if(Auth::user()-> perfil_idperfil == 1){
                                                    $função = "Condomínio Informa";     
                                                }
                                            ?>    
                                                <a href="{{ route("master::dash")}}">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $função?> <span class="fa arrow"></span></a>

                                            <!-- /.nav-second-level -->
                                            </li>

                                        <?php 

                                        
                                                $util = new \App\Util\Util();
                                                $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();

                                                $idmorador_cripto = $seguranca -> cripto(Auth::user()->morador_idmorador);
                                                //echo "teste " . Auth::user()->apartamento_idapartamento;
                                                //echo "<BR>";
                                                $idapartamento_cripto = $seguranca -> cripto(Auth::user()->apartamento_idapartamento);
                                        ?>
                                        <?php

                                            if($fornec == "S" || 
                                                $est == "S"){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart fa-fw"></i> Aquisição<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <?php 
                                                            if($est == "S"){ 
                                                        ?>
                                                            <!--<li>
                                                                <a href="{{ route("master::est")}}">Estoque</a>
                                                            </li>-->
                                                        <?php } 
                                                         if($fornec == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::fornec")}}">Fornecedor</a>
                                                            </li>
                                                        <?php                                                    
                                                            }
                                                        ?>

                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                        <?php }

                                            /* if($acade == "S" || 
                                                $hidro == "S" ||                                        
                                                $natac == "S" || 
                                                $lutas == "S" ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> Bem Estar<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <?php if($acade == "S"){ ?>
                                                            <li>
                                                                <a href="{{ route("master::acade")}}">Academia</a>
                                                            </li>
                                                        <?php } 
                                                         if($hidro == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::hidro")}}">Hidroginástica</a>
                                                            </li>
                                                        <?php } 
                                                        if($natac == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::natac")}}">Natação</a>
                                                            </li>
                                                        <?php }
                                                        if($lutas == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::lutas")}}">Artes Marciais</a>
                                                            </li>
                                                        <?php } ?>


                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>

                                            <?php }

                                            if($coljor == "S" || 
                                                $collat == "S" ||                                        
                                                $colole == "S"  ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> Campanhas<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <?php if($coljor == "S"){ ?>
                                                            <li>
                                                                <a href="{{ route("master::coljor")}}">Coleta de Jornal</a>
                                                            </li>
                                                        <?php } 
                                                         if($collat == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::collat")}}">Coleta de Latinhas</a>
                                                            </li>
                                                        <?php } 
                                                        if($colole == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::colole")}}">Coleta de Óleo</a>
                                                            </li>
                                                        <?php 
                                                            }
                                                        ?>

                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                        <?php }*/


                                                if($apa == "S" || 
                                                $acm == "S" || 
                                                $bem == "S" || 
                                                $inv == "S" || 
                                                $mor == "S" || 
                                                $pro == "S" || 
                                                $vag == "S" || 
                                                $vei == "S" || 
                                                $veivis == "S"){ ?>

                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-building-o fa-fw"></i> Condomínio<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php if($apa == "S"){ 
                                                            if(Auth::user()->perfil_idperfil <> 1){

                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::apa")}}">Apartamento</a>
                                                            </li>
                                                        <?php 
                                                            }else{
                                                        ?>    
                                                            <li>
                                                                <a href="{{ route('master::detalharApartamento',[ 'id' =>$idapartamento_cripto, 'id2' =>0]) }}">Apartamento</a>
                                                            </li>


                                                        <?php }
                                                            }
                                                         if($acm == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::acm")}}">Área Comum</a>
                                                            </li>
                                                        <?php } 
                                                        if($bem == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::bem")}}">Bem</a>
                                                            </li>
                                                        <?php }                                                
                                                        if($mor == "S"){
                                                            if(Auth::user()->perfil_idperfil <> 1){

                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::mor")}}">Morador</a>
                                                            </li>
                                                        <?php 
                                                            }else{
                                                        ?>

                                                            <li>
                                                                <a href="{{ route('master::detMor',[ 'id' =>$idmorador_cripto, 'id2' => 0]) }}">Morador</a>
                                                            </li>                                                

                                                        <?php
                                                            }
                                                        } 
                                                        if($pro == "S"){
                                                            if(Auth::user()->perfil_idperfil <> 1){

                                                        ?>  
                                                            <li><a href="{{ route("master::pro")}}">Proprietário</a></li>

                                                        <?php 
                                                            }else{
                                                        ?>
                                                            <li><a href="{{ route('master::detProp',[ 'id' =>$idapartamento_cripto]) }}">Proprietário</a></li>

                                                        <?php } 
                                                            }
                                                        if($vag == "S"){
                                                            if(Auth::user()->perfil_idperfil <> 1){   
                                                        ?>
                                                            <li><a href="{{ route("master::vag")}}">Estacionamento</a></li>

                                                        <?php 
                                                            }else{
                                                        ?>        
                                                            <li><a href="{{ route('master::detVag',[ 'id' =>$idapartamento_cripto, 'id2' => 0]) }}">Estacionamento</a></li>

                                                        <?php }
                                                            }
                                                        if($vei == "S"){
                                                             if(Auth::user()->perfil_idperfil <> 1){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::vei")}}">Veículos </a>
                                                            </li>
                                                         <?php 
                                                            }else{
                                                        ?>

                                                            <li>
                                                                <a href="{{ route('master::conVei2') }}">Veículos</a>
                                                            </li>                                                

                                                        <?php
                                                            }
                                                        } 
                                                         ?>

                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                        <?php }

                                                if($cla == "S" || 
                                                $aut == "S" ||                                        
                                                $eve == "S" || 
                                                $ent == "S" || 
                                                $ram == "S" || 
                                                $vis == "S"|| 
                                                $res == "S" ||
                                                $msg == "S"        ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-phone fa-fw"></i> Comunicação<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <?php if($aut == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::aut")}}">Autorização</a>
                                                            </li>
                                                        <?php } 
                                                         if($cla == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::cla")}}">Classificados</a>
                                                            </li>
                                                        <?php } 
                                                        if($ent == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::ent")}}">Entregas</a>
                                                            </li>
                                                        <?php }
                                                        if($eve == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::eve")}}">Evento</a>
                                                            </li>
                                                        <?php }
                                                        if($msg == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::msg")}}">Mensagem ao morador</a>
                                                            </li>-->
                                                        <?php } 
                                                        if($ram == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::ram")}}">Ramal</a>
                                                            </li>
                                                        <?php } 
                                                        if($res == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::res")}}">Reserva</a>
                                                            </li>
                                                        <?php } 
                                                            if($vis == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::vis")}}">Visitantes</a>
                                                            </li>
                                                        <?php } ?>

                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                        <?php } 

                                            if($eva == "S"){

                                        ?>    
                                            <!--<li>
                                                <a href="{{ route("master::eva")}}"><i class="fa fa-table fa-fw"></i> Evacuação</a>
                                            </li>-->

                                        <?php }

                                        if($doc == "S"){
                                        
                                                if(Auth::user()->perfil_idperfil == 1){

                                            ?>  
                                                <li>
                                                    <a href="{{ route("master::docm")}}"><i class="fa fa-file-text-o fa-fw"></i> Documentos</a>
                                                </li>                                            

                                            <?php 
                                                }else{
                                            ?>
                                                <li><a href="{{ route('master::doc') }}"><i class="fa fa-file-text-o fa-fw"></i> Documentos</a></li>

                                            <?php } 
                                                }

                                        
                                            $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                                            if($escser == "S" || 
                                                  $fca == "S" ||                                        
                                                  $fun == "S" || 
                                                  $pon == "S" ||
                                                  $tratur == "S"  ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users fa-fw"></i> RH <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">

                                                        <?php
                                                         if($escser == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::escser")}}">Escala de Serviço</a>
                                                            </li>
                                                        <?php } 
                                                            if($fal == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::fal",[ 'id' => $seguranca->cripto(0), 'id2' => 0])}}">Faltas</a>
                                                            </li>
                                                        <?php } 
                                                            if($fer == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::fer",[ 'id' => $seguranca->cripto(0), 'id2' => 0])}}">Férias</a>
                                                            </li>
                                                        
                                                         <?php } 
                                                            if($fol == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::fol",[ 'id' => $seguranca->cripto(0), 'id2' => 0])}}">Folgas</a>
                                                            </li>
                                                         
                                                        <?php } 
                                                            if($fca == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::fca")}}">Função</a>
                                                            </li>
                                                        <?php } 
                                                            if($fun == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::fun")}}">Funcionários</a>
                                                            </li>
                                                        <?php 
                                                            }
                                                            if($lic == "S"){ 
                                                             
                                                           
                                                             
                                                             ?>

                                                            <li>
                                                                <a href="{{ route("master::lic",[ 'id' => $seguranca->cripto(0), 'id2' => 0])}}">Licença</a>
                                                            </li>
                                                        
                                                         
                                                        <?php }
                                                        if($pon == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::pon",[ 'id' =>0])}}">Ponto</a>
                                                            </li>-->
                                                        <?php } 
                                                          if($tratur == "S"){ 
                                                            $idObjeto = $seguranca -> cripto(0);
                                                        ?>

                                                            <li>
                                                                <a href="{{ route("master::tratur",[ 'id' => $idObjeto])}}">Período de Trabalho</a>
                                                            </li>

                                                        <?php } 
                                                              ?>
                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                        <?php 

                                            } 


                                            //echo $contur;
                                            if($placon == "S" || 
                                                  $pag == "S" ||                                        
                                                  $ctopag == "S" || 
                                                  $ctorec == "S" || 
                                                  $preorc == "S" || 
                                                  $contra == "S"  ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-money fa-fw"></i> Financeiro <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php 
                                                         if($placon == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::placon")}}">Plano de Contas</a>
                                                            </li>
                                                        <?php } 
                                                         if($pag == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::pag")}}">Pagamento</a>
                                                            </li>
                                                        <?php } 
                                                        if($ctopag == "S"){
                                                        ?>
                                                            <!--<li>
                                                                <a href="{{ route("master::ctopag")}}">Contas a Pagar</a>
                                                            </li>-->
                                                        <?php }
                                                        if($ctorec == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::ctorec")}}">Contas a Receber</a>
                                                            </li>-->
                                                        <?php } 

                                                              if($preorc == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::preorc")}}">Previsão Orçamentária</a>
                                                            </li>
                                                        <?php } 

                                                              if($contra == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::contra")}}">Contrato</a>
                                                            </li>-->
                                                        <?php } 


                                                          if($ind == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::ind")}}">Inadimplência</a>
                                                            </li>-->
                                                        <?php } 

                                                              ?>
                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                            <?php 

                                            }
                                            //echo $contur;
                                            if($mntpro == "S" || 
                                                  $sol == "S" ||                                        

                                                  $cautel == "S"  || 
                                                  $obr == "S"   ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-cogs fa-fw"></i> Manutenção <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php 
                                                         if($mntpro == "S"){ ?>

                                                            <!--<li>
                                                                <a href="{{ route("master::mntpro")}}">Programada</a>
                                                            </li>-->
                                                        <?php } 
                                                         if($sol == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::sol")}}">Solicitação</a>
                                                            </li>
                                                        <?php } 

                                                        if($cautel == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::cautel")}}">Cautela</a>
                                                            </li>-->
                                                        <?php } 

                                                             if($obr == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::obr")}}">Obras</a>
                                                            </li>-->
                                                        <?php } 
                                                           if($pedMat == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::pedSer")}}">Pedido de Material</a>
                                                            </li>-->
                                                        <?php } 
                                                          if($pedSer == "S"){
                                                        ?>                                                    
                                                            <!--<li>
                                                                <a href="{{ route("master::pedSer")}}">Pedido de Serviço</a>
                                                            </li>-->
                                                        <?php } 


                                                              ?>

                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>

                                            <?php 

                                            } 

                                        //echo $contur;
                                            /*if($pet == "S"   ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> Pet <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php 
                                                         if($pet == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::pet")}}">Pets</a>
                                                            </li>
                                                        <?php } 

                                                              ?>
                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>

                                        <?php 

                                            } */

                                        //echo $contur;
                                            /*if($relbal == "S" || 
                                                  $relInv == "S" ||                                        
                                                  $relUsu == "S" || 
                                                  $relPag == "S"  ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> Relatórios <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php 
                                                         if($relbal == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::relbal")}}">Balanço de Contas</a>
                                                            </li>
                                                        <?php } 
                                                         if($relInv == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::relInv")}}">Inventário</a>
                                                            </li>
                                                        <?php } 
                                                        if($relPag == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::relPag")}}">Pagamentos</a>
                                                            </li>
                                                        <?php }
                                                        if($relUsu == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::relUsu")}}">Usuarios</a>
                                                            </li>
                                                        <?php } 

                                                              ?>
                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                            <?php 
                                            
                                            } 
*/
                                            /*if($redgas == "S" || 
                                                  $tominc == "S" ||                                        
                                                  $redinc == "S" || 
                                                  $maninc == "S" || 
                                                  $curinc == "S" || 
                                                  $repseg == "S" || 
                                                  $porfog == "S" || 
                                                  $extint == "S"  ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> Segurança do Condomínio <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php 
                                                         if($redgas == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::redgas")}}">Rede de Gás</a>
                                                            </li>
                                                        <?php } 
                                                         if($tominc == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::tominc")}}">Tomadas de Incêndio</a>
                                                            </li>
                                                        <?php } 
                                                        if($redinc == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::redinc")}}">Rede de Incêndio</a>
                                                            </li>
                                                        <?php }
                                                        if($maninc == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::maninc")}}">Mangueiras de Incêndio</a>
                                                            </li>
                                                        <?php } 

                                                              if($curinc == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::curinc")}}">Curso de Combate a Incêndio</a>
                                                            </li>
                                                        <?php } 

                                                              if($repseg == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::repseg")}}">Responsável pela Segurança</a>
                                                            </li>
                                                        <?php } 

                                                             if($porfog == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::porfog")}}">Porta Corta Fogo</a>
                                                            </li>
                                                        <?php } 

                                                               if($extint == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::extint")}}">Extintores</a>
                                                            </li>
                                                        <?php } 

                                                              ?>
                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>

                                        <?php 

                                            } 

                                            if($cister == "S" || 
                                                  $sensi == "S" ||                                        
                                                  $caixa == "S" || 
                                                  $ener == "S" || 
                                                  $entvei == "S" ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> Sensores <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php 
                                                         if($caixa == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::caixa")}}">Caixa de Água</a>
                                                            </li>
                                                        <?php } 
                                                         if($cister == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::cister")}}">Cisterna </a>
                                                            </li>
                                                        <?php } 
                                                         if($ener == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::ener")}}">Energia </a>
                                                            </li>
                                                        <?php } 
                                                        if($entvei == "S"){
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::entvei")}}">Entrada de Veículos</a>
                                                            </li>
                                                        <?php }
                                                        if($sensi == "S"){
                                                        ?>                                                    
                                                            <li>
                                                                <a href="{{ route("master::sensi")}}">Área Sensível</a>
                                                            </li>
                                                        <?php } 

                                                              ?>
                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                        <?php 

                                            } 

                                            if($entsai == "S" || 
                                                  $cam == "S"  ){ ?>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i> Vigilância <span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">


                                                        <?php 
                                                         if($entsai == "S"){ ?>

                                                            <li>
                                                                <a href="{{ route("master::entsai")}}">Entrada e Saída</a>
                                                            </li>
                                                        <?php } 
                                                         if($cam == "S"){ 
                                                        ?>
                                                            <li>
                                                                <a href="{{ route("master::cam")}}">Câmeras </a>
                                                            </li>
                                                        <?php } 
                                                             ?>
                                                    </ul>
                                            <!-- /.nav-second-level -->
                                            </li>
                                        <?php 

                                            } */

                                        ?>

                                    </ul>
                                    </div>                                                
                                </div>
                            </div>       
                                </div>
                                <!-- /.sidebar-collapse -->
                            </div>

                        <?php } ?> 
                 
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
        
        
        
        <?php if(isset($ocorrencias)){ ?>
            <script language="JavaScript">
                $(function() {

                        var data = [<?php echo $ocorrencias; ?>];

                        var plotObj = $.plot($("#flot-pie-chart"), data, {
                                series: {
                                        pie: {
                                                show: true
                                        }
                                },
                                grid: {
                                        hoverable: true
                                },
                                tooltip: true,
                                tooltipOpts: {
                                        content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                                        shifts: {
                                                x: 20,
                                                y: 0
                                        },
                                        defaultTheme: false
                                }
                        });

                });
                
                </script>
                
        <?php } ?>
        <?php if(isset($contasDefinidas)){ ?>
            <script language="JavaScript">
                Morris.Donut({
                        element: 'morris-donut-chart',
                        data: [{
                                label: "Contas Preenchidas",
                                value: <?php echo $contasDefinidas; ?>
                        }, {
                                label: "Contas a preencher",
                                value: <?php echo ($contasTotal - $contasDefinidas); ?>
                        }],
                        resize: true
                });
            </script>
        <?php } ?>
            
        <!-- PARA VEÍCULOS -->
            <?php if(isset($totalNaoVeiculos) and isset($totalVeiculos)){ ?>
                <script language="JavaScript">
                    Morris.Donut({
                            element: 'morris-donut-chart-veiculos',
                            data: [{
                                    label: "Não Registrados",
                                    value: <?php echo $totalNaoVeiculos ?>
                            }, {
                                    label: "Veiculos Registrados",
                                    value: <?php echo $totalVeiculos ?>
                            }],
                            resize: true
                    });
                </script>
            <?php } ?>
            <?php if(isset($totalVagasNaoAlugadas) and isset($totalVagasAlugadas)){ ?>
                <script language="JavaScript">
                    Morris.Donut({
                            element: 'morris-donut-chart-veiculos2',
                            data: [{
                                    label: "Não Alugadas",
                                    value: <?php echo $totalVagasNaoAlugadas ?>
                            }, {
                                    label: "Vagas Alugadas",
                                    value: <?php echo $totalVagasAlugadas ?>
                            }],
                            resize: true
                    });
                </script>
            <?php } ?>
      
            
    <!-- Custom Theme JavaScript -->
    
    <script src="{{ asset('bootstrapAdm/dist/js/sb-admin-2.js') }}"></script>
    
   
    
    <?php 
    
            //TESTE PARA ENVIO DE MENSAGEM
        if(isset($msg)){  
            if($msg != "" && strlen($msg) > 5){
                //echo $msg;
    ?>    
        <div class="jquery-script-ads">
            <script type="text/javascript">
                $(document).ready(function(){

                    $.goNotification('{{ $msg }}');

                });
            </script>
        </div> 
    <?php 
            }
        }            
    ?> 
    
   
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
