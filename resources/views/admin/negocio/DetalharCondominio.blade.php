@extends('administracaoDagoba.layout2')

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
            <form method="post" enctype="multipart/form-data" name="form">
                
                 <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Detalhar Condomínio</h2>
            </div>
            <div class="col-lg-12">

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> CONDOMÍNIO</a>
                    </li>
                    <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> BLOCOS</a>
                    </li>
                    <li class=""><a href="#service-three" data-toggle="tab"><i class="fa fa-support"></i> COBERTURAS</a>
                    </li>
                    <li class=""><a href="#service-four" data-toggle="tab"><i class="fa fa-database"></i> RAMAL</a>
                    </li>
                    <li class=""><a href="#service-five" data-toggle="tab"><i class="fa fa-database"></i>Nova Conta</a>
                    </li>
                    <li class=""><a href="#service-six" data-toggle="tab"><i class="fa fa-database"></i>PIX</a>
                    </li>
                    <li class=""><a href="#service-seven" data-toggle="tab"><i class="fa fa-database"></i>DATAS PAGTO</a>
                    </li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="service-one">
                            <h4 class="page-header">NOVO CONDOMÍNIO</h4>
                            
                        
                        <div class="form-group">
                            Nome:
                            <input type="text"  class="form-control" value="{{ $nome }}" readonly>
                        </div>

                        <div class="form-group">
                            Endereco:
                            <input type="text" class="form-control" value="{{ $logradouro }}" readonly>
                        </div>

                        <div class="form-group">
                            complemento:
                            <input type="text" name="complemento" class="form-control" value="{{ $complemento }}" readonly>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                CNPJ:
                                <input type="text" id="cnpj" class="form-control" value="{{ $cnpj }}" readonly>                         
                            </div>
                            <div class="form-group">
                                Município:
                                <input type="text" class="form-control" value="{{ $municipio }}" readonly> 
                            </div>

                            <div class="form-group">
                                Bairro:
                                <input type="text" class="form-control" value="{{ $bairro }}" readonly> 
                            </div>
                            <div class="form-group">
                                UF:
                                <input type="text" class="form-control" value="{{ $uf }}" readonly> 
                            </div>
                        </div>



                        <div class="col-lg-4">
                            <div class="form-group">
                                Telefone Fixo:
                                <input type="text"  class="form-control" value="{{ $fixo }}" readonly>
                            </div>
                            <div class="form-group">
                                Celular:
                                <input type="text"  class="form-control" value="{{ $celular }}" readonly>
                            </div>
                            <div class="form-group">
                                E-mail:
                                <input type="text" name="email" class="form-control" value="{{ $email }}" readonly>
                            </div>
                            <div class="form-group">
                                link:
                                <input type="text" name="link" class="form-control" value="{{ $link }}" readonly>
                            </div>
                        </div>    

                        <div class="col-lg-4">
                            <div class="form-group">
                                @if(isset($imagem))
                                    <center> <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p></center>
                                @endif
                                Logo:
                                <input type="file" name="anexo" class="form-control">
                            </div>
                        </div>
                    </div>     
                    
                    <div class="tab-pane fade" id="service-two">
                        <h4 class="page-header"> BLOCOS</h4>
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                                Andares:
                                <input type="text"  class="form-control" value="{{ $andares }}" readonly>
                            </div>
                            <div class="form-group">
                                Aptos por Andar:
                                <input type="text" class="form-control" value="{{ $numAptoAndar }}" readonly>
                            </div>
                            <div class="form-group">
                                Andar Início Apartamento:
                                <input type="text" class="form-control" value="{{ $aptoInicio }}" readonly>
                            </div>
                            <div class="form-group">
                                Número Blocos:
                                <input type="text" class="form-control" value="{{ $numBlocos }}" readonly>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                               Fator Intervalo:
                                <input type="text" class="form-control" value="{{ $intervaloApto }}" readonly>
                            </div>
                            <div class="form-group"> 
                                Intervalo entre Aptos:
                                <input type="text" class="form-control" value="{{ $fatorIntervalor }}" readonly>
                            </div>
                            <div class="form-group">
                                Predio Tem garagem?:
                                <input type="text" class="form-control" value="{{ $vagaGaragemEscriturada }}" readonly>
                            </div>

                            <div class="form-group">
                                 Vagas Disponíveis para Carros?
                                 <input type="text" class="form-control" value="{{ $maximoVagaGaragemCarro }}" readonly>
                            </div>
                        </div>        

                        <div class="col-lg-4">
                            <div class="form-group">
                                Número Vagas Carro permitida por morador:
                                <input type="text" class="form-control" value="{{ $maximoVagaGaragemCarroMorador }}" readonly>
                            </div>
                            
                            <div class="form-group">
                               Vagas Disponíveis para Motos?
                                 <input type="text"  class="form-control" value="{{ $maximoVagaGaragemMoto }}" readonly>
                            </div>
                            <div class="form-group">
                                Número Vagas Moto permitida por morador:
                                <input type="text"  class="form-control" value="{{ $maximoVagaGaragemMotoMorador }}" readonly>
                            </div>

                            <div class="form-group">
                               Vagas Disponíveis para bicicleta?
                                 <input type="text"  class="form-control" value="{{ $maximoVagaGaragemBicicleta }}" readonly>
                            </div>
                        </div>    
                            
                        <div class="form-group">
                            Número Vagas Bicicleta permitida por morador:
                            <input type="text"  class="form-control" value="{{ $maximoVagaGaragemBicicletaMorador }}" readonly>
                        </div>
                                
                        
                    </div>
                    <div class="tab-pane fade" id="service-three">
                    
                        <h4 class="page-header">COBERTURAS</h4>
                        <div class="col-lg-4">
                            <div class="form-group">
                            Número Coberturas por Edifício:

                             <input type="text"  class="form-control" value="{{ $coberturaPorPredio }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4"> 
                            
                            <div class="form-group">
                                Coberturas Tem direito a vaga?
                                 <input type="text"  class="form-control" value="{{ $coberturaTemVaga }}" readonly>
                            </div>
                        </div>        
                        
                    </div>
                    <div class="tab-pane fade" id="service-four">
                        <h4 class="page-header">RAMAL</h4>
                        <div class="form-group">
                           Estrutura dos RAMAIS:
                            <input type="text"  class="form-control" value="{{ $ramal }}" readonly>   

                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="service-five">
                        <h4 class="page-header">NOVA CONTA DO CONDOMINIO</h4>
                            <div class="form-group">
                                Plano:
                                <input type="text"  class="form-control" value="{{ $conta }}" readonly>     

                            </div>
                    </div>
                    
                    <div class="tab-pane fade" id="service-six">
                        <h4 class="page-header">PIX - Salão de Festas </h4>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    @if(isset($pixsalao))
                                        <center> <img id="thumb" src="{{asset($pixsalao)}}" height="400" alt=""><p></center>
                                    @endif
                                   
                                    
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="service-seven">
                        <h4 class="page-header">Datas de pagamento </h4>
                            <div class="col-lg-12">
                                <div class="form-group">
                                   
                                    <?php echo $formulario ?>
                                   
                                    
                                </div>
                            </div>
                    </div>
                </div>
                
                    

            </div>
        </div>
                    
                @if(isset($status))
                    @if($status == 'ATV')
                        <a href='{{ route('admin::editarCondominio',[ 'id' => $idCondominio]) }}' class="btn btn-primary"> Editar</a>
                        <a href="{{ route('admin::suspenderCondominio',[ 'id' => $idCondominio]) }}" class="btn btn-danger">Suspender</a>
                        <a href="{{ route('admin::ConsultarCartaoEstacionamento',[ 'id' => $idCondominio]) }}" class="btn btn-success">Cartão Estacionamento</a>
                        <a href="{{ route('admin::cadastrarBlocosCondominio',[ 'id' => $idCondominio]) }}" class="btn btn-success">Cadastro de Novos Blocos</a>
                        <a href="{{ route('admin::ativarNovosBlocosCondominio',[ 'id' => $idCondominio]) }}" class="btn btn-primary">Ativar Novos Blocos</a>
                        <a href="{{ route('logar') }}" class="btn btn-primary">Voltar</a>  
                        <!--
                            faz a validacao para erro crsf. tokenizacao
                        -->

                    @else
                       <a href="{{ route('admin::ativarCondominio',[ 'id' => $idCondominio]) }}" class="btn btn-primary">Ativar</a>
                    @endif
                @endif    
                    {{csrf_field()}}
                </form>                        
                                
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}

        </div>
@endsection

@section('post-script')
    <script type="text/javascript">
        
        $('cnpj').onkeypress(function () {
            var idEstado = $(this).val();
alert(idEstado);
            /*$.get('/cidades/' + idEstado, function (cidades) {
                $('select[name=cidade]').empty();
                $.each(cidades, function (key, value) {
                    $('select[name=cidade]').append('<option value=' + value.id + '>' + value.cidade + '</option>');
                });
            });*/
        });

    </script>
@endsection