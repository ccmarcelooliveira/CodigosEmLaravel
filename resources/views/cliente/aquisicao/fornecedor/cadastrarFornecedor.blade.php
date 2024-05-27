
@extends('administracaoDagoba.layout2')

@section('conteudo')



<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Editar Fornecedor
        </h1>
        {!! $resp or '' !!}

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

                     
                           
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Cadastro de Fornecedor
                    </div>
                    <div class='panel-body'>

                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">

                                    <P><P>
                                        <?php echo $formulario; ?>                          

                                        {{csrf_field()}}

                                   
                            </form>

                     </div>                                                
                </div>
        </div>

  </div>

</div>
@endsection