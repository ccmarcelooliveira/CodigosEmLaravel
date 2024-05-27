@extends('admin.layout2')

@section('conteudo')

        <script type="text/javascript">

            function pesquisarCNPJ(){

                $(document).ready(function(){

                    
                    var cnpj = $('#cnpj').val();
                    //alert(cnpj);
                    /*$.ajax({

                           url: "/cnpj/",
                           dataType: 'html',
                           data: {idcnpj:cnpj},
                           type: "POST",

                            beforeSend: function ()   {
                                //$('#carregando').show();
                                //alert('ok');
                            },
                            success: function(data){
                                //$('#carregando').hide();
                                //$("#resBusca").html( data + '<BR>' );
                                alert(data);


                                //recuperarInformacoesGraficos(conta,0);


                                $('#subconta').html(data);
                            },
                            error: function(data){
                                        //$('#carregando').html(data);
                                        //alert('NOK');
                            }
                   });*/
        
                    $.get('/cnpj/' + cnpj, function (data) {
                            
                            //alert(data);
                            document.getElementById("labelCNPJ").value = data;
                           
                            
                    });
                });

	}

        </script>

        <div id="page-wrapper">
            <form method="post" enctype="multipart/form-data" name="form" action="{{ route("cadofi")}}">
                
                 <div class="row">
           
                    <h1 class="page-header">
                        <?php echo $CADOFI; ?>
                    </h1>
                        @if(session('danger'))
                            <div class="alert alert-danger">
                              {{ session('danger') }}
                            </div>  
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                              {{ session('success') }}
                            </div>  
                        @endif
                            
                    <?php echo $formulario; ?>
                    
                    {{csrf_field()}}
                </form>                        
                                
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}

        </div>
@endsection

