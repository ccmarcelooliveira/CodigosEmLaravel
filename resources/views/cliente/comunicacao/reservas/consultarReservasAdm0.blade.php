<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Arquivos oriundos da pasta: dagoba/congig/application.ini  - Anders -->
        <title>{{(Config::get('application.web.html.titulo'))}}</title>
        <meta name='keywords' content="{{(Config::get('application.web.html.keywords'))}}" lang="pt" />
        <meta name="description" content="{{(Config::get('application.web.html.description'))}}" lang="pt" />
        <meta name='url' content="{{(Config::get('application.web.html.url'))}}" />
        <meta name='author' content="{{(Config::get('application.web.html.author'))}}" />
        <meta name='distribution' content='web' />
        <meta name='copyright' content="{{(Config::get('application.web.html.copyright'))}}" />
        <meta name='robots' content='ALL' />
        <meta name='reply-to' content="{{(Config::get('application.web.html.reply_to'))}}" />
        <meta name='company' content="{{(Config::get('application.web.html.company'))}}" />
        <!-- Fim -->

        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }} ">
        <!-- Custom CSS -->
        <link href="{{ asset('layout_business/css/modern-business.css') }}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{ asset('layout_business/font-awesome/css/font-awesome.min.css') }}"  rel="stylesheet" type="text/css">        
        <!-- MetisMenu CSS -->
        <link href="{{ asset('bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="{{ asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="{{ asset('bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="{{ asset('bower_components/morrisjs/morris.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('jquery-ui/jquery-ui.min.css') }}">    
        <link href="{{ asset('dist/css/dashboard.css') }}" rel="stylesheet">
        
        <!-- USER INTERFACE : para o calendario por exemplo -->
        <link rel="stylesheet" type="text/css"  href="{{ asset('jquery-ui/jquery-ui.min.css') }}">
        <script src="{{ asset('jquery-ui/external/jquery/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"   type="text/javascript"></script>
        
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

          
    
        <script type="text/javascript">

                function teste(){
                    VAR agree=CONFIRM("Are you sure you want to delete this file?");
                }         

        </script>
        
        <link href="{{ asset('js/popup/goNotification.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/popup/ga.js') }}" async="" type="text/javascript"></script>        
        <script src="{{ asset('js/popup/goNotification.js') }}"></script>
        <style>
        li { cursor:pointer}
        </style>
        
        <link href="{{ asset('calendar/fullcalendar.min.css')}}" rel='stylesheet' />
        <script src="{{ asset('calendar/lib/moment.min.js')}}"></script>
        <script src="{{ asset('calendar/fullcalendar.min.js')}}"></script>
        <script src="{{ asset('calendar/locale/pt-br.js')}}"></script>
        
        <script>

          $(document).ready(function() {

            $('#calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'listDay,listWeek,month'
              },

              // customize the button names,
              // otherwise they'd all just say "list"
              views: {
                listDay: { buttonText: 'Lista Dia' },
                listWeek: { buttonText: 'Lista Semana' },
                month: { buttonText: 'Mês' }
              },

              defaultView: 'month',
              defaultDate: '2018-03-12',
              navLinks: true, // can click day/week names to navigate views
              editable: true,
              eventLimit: true, // allow "more" link when too many events
              events: [
                <?php echo $listaEventos; ?>
              ]
            });

          });

        </script>
        <script language="JavaScript">
        function abrir(URL) {

         
        }
        </script>
        <style>

          body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
          }

          #calendar {
            max-width: 900px;
            margin: 0 auto;
          }

        </style>

    </head>

    <body>

        <!-- Navigation -->

        @extends($linha)

              
        
        
<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Reservar Salão de Festas
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li>Home
                    </li>
                    <li class="active"> Condomínio</li>
                    <li class="active"> Salao de Festas </li>
                    <li class="active"> Reservar Data </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        
    <div id="page-wrapper">
        <div class="col-lg-12"> 

                <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                    <div class="col-lg-12">
                    
                        <ul id="myTab" class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i>Consultar Reservar</a>
                            </li>

                            <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> Minhas Reservas</a>
                            </li>

                        </ul>
                    
                    <div id="myTabContent" class="tab-content">

                        <div class="tab-pane fade active in" id="service-one">
                            <P><P>
                                <div id='calendar'></div> 
                                <!--
                                    faz a validacao para erro crsf. tokenizacao
                                -->
                                {{csrf_field()}}
                        </div>
                        
                            <div class="tab-pane fade" id="service-two">
                                
                                    <div id="page-wrapper">
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">                       
                        
                            <div class="panel-heading">
                                
                                <a href='{{ route('master::cadSalFes') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Reservar
                               
                            </div>
                        
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data</th>
                                            <th>Motivo</th>
                                            <th>Apto/Bloco</th>
                                            <th>Status</th>
                                            
                                            @if($botaoDetalhar == "S")
                                              <th>Detalhar</th>
                                            @endif
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaReservaSalaoFestas))
                                        @foreach($listaReservaSalaoFestas as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='10'>{{ $item->CmpDataFesta }}</td>
                                                    <td>{{ $item->CmpMotivoSalaoFestas }}</td>
                                                    <td>{{ $item->CmpApto."/".$item->CmpBloco }}</td>
                                                    <td>{{ $item->CmpStatus }}</td>
                                                      @if($botaoDetalhar == "S")
                                                         <td align='center' width='100'><a href='{{ route('master::aprSalFes',[ 'id' =>$item->idsalao_festas]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                      @endif                                                           
                                                </tr> 
                                       @endforeach
                                    @endif 
                                    </tbody>
                                    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
       
        <hr>


    </div>
                                
                            </div>    
                    </div>

                </div>
                    
                     {{csrf_field()}}
              </form>
               
                <!--
                    faz a validacao para erro crsf. tokenizacao
                -->
                       
            </div> 
        
       
        <div class='form-group'>
            <center> <img id="enviando" src="{{asset("img/enviando.gif")}}"  style="display:none" alt=""></center>
          
               <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
         

        <hr>
        
    </div>
        
        
       
        
        
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>{{(Config::get('application.web.html.rodape'))}}</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

      
    <!--VALIDADOR DE FORMULÁRIO -->
    <script src="{{ asset('bootstrap-validator-master/dist/validator.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-validator-master/dist/validator.min.js') }}" type="text/javascript"></script>   
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>     	    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>
    
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -- EXIBE O MODELO DE TABELA -->
    <script>
        $(document).ready(function () {
          $('#dataTables-example').DataTable({
            responsive: true
          });
        });
    </script>
   
    <!-- VALIDACAO DE FORMULARIOS -->

    <script src="{{ asset('validacao/form/assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('validacao/form/script.js') }}"></script>
    
    <script>
        addEventListener('load', prettyPrint, false);
        $(document).ready(function () {
          $('pre').addClass('prettyprint linenums');
        });
    </script>
    
    <?php 
        //TESTE PARA ENVIO DE MENSAGEM
        if(isset($msg)){  
            if($msg != ""){
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
</body>

</html>
