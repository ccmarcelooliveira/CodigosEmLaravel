@extends('administracaoDagoba.layout2')

@section('conteudo')

        <script type="text/javascript">

            function pesquisarCNPJ(){

                $(document).ready(function(){
                    
                    var cnpj = $('#cnpj').val();                   
        
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
                <h2 class="page-header">EDITAR CONDOMÍNIO</h2>
            </div>
            <div class="col-lg-12">

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> CONDOMÍNIO</a>
                    </li>
                    
                    <li class=""><a href="#service-five" data-toggle="tab"><i class="fa fa-database"></i>Nova Conta</a>
                    </li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="service-one">
                        <h4 class="page-header">NOVO CONDOMÍNIO</h4>
                    <div class="form-group">
                        Nome:
                        <input type="text" name="nome" class="form-control" maxlength="30"  value="{{ $nome }}">
                    </div>

                    <div class="form-group">
                        CNPJ:
                        <input type="text" name="cnpj" id="cnpj" class="form-control" onblur="pesquisarCNPJ()" value="{{ $cnpj }}"> 
                        
                    </div>
                    <div class="form-group">
                        Endereco:
                        <input type="text" name="logradouro" class="form-control" value="{{ $logradouro }}">
                    </div>
                    
                    <div class="form-group">
                        Município:
                        <select name="municipio" class="form-control">
                            @if(isset($listaMunicipio))
                                @foreach($listaMunicipio as $municipio)
                                
                                    @if($idmunicipio == $municipio->idmunicipio)
                                        <option value="{{ $municipio->idmunicipio }}" selected>
                                            {{ $municipio->CmpMunicipio }}
                                        </option>                                    
                                    @else
                                        <option value="{{ $municipio->idmunicipio }}" >
                                            {{ $municipio->CmpMunicipio }}
                                        </option> 
                                    @endif
                               @endforeach
                            @endif   
                        </select>    

                    </div>
                    
                    <div class="form-group">
                        Bairro:
                        <select name="bairro" class="form-control">
                            @if(isset($listaBairro))
                                @foreach($listaBairro as $bairro)
                                    @if($idbairro == $bairro->idbairro)
                                        <option value="{{ $bairro->idbairro }}" selected>
                                            {{ $bairro->CmpBairro }}
                                        </option>                                    
                                    @else
                                        <option value="{{ $bairro->idbairro }}" >
                                            {{ $bairro->CmpBairro }}
                                        </option> 
                                    @endif    
                               @endforeach
                            @endif   
                        </select>    

                    </div>
                    <div class="form-group">
                        complemento:
                        <textarea  name="complemento" class="form-control">{{ $complemento }} </textarea>
                        
                    </div>
                   
                    <div class="form-group">
                        UF:
                        <select name="uf" class="form-control">
                            @if(isset($listaUF))
                                @foreach($listaUF as $uf)
                                
                                @if($iduf == $uf->idunidade_federacao)
                                    <option value="{{ $uf->idunidade_federacao }}" selected>
                                        {{ $uf->CmpDescricao }}
                                    </option>                                    
                                @else
                                    <option value="{{ $uf->idunidade_federacao }}" >
                                        {{ $uf->CmpDescricao }}
                                    </option> 
                                @endif 
                               @endforeach
                            @endif   
                        </select>    

                    </div>
                    <div class="form-group">
                        Telefone Fixo:
                        <input type="text" name="tel_fixo" class="form-control" value="{{ $fixo }}">
                    </div>
                    <div class="form-group">
                        Celular:
                        <input type="text" name="celular" class="form-control" value="{{ $celular }}">
                    </div>
                    <div class="form-group">
                        E-mail:
                        <input type="text" name="email" class="form-control" value="{{ $email }}">
                    </div>
                    <div class="form-group">
                        link:
                        <input type="text" name="link" class="form-control" value="{{ $link }}">
                    </div>
                    <div class="form-group">
                        Logo:
                        <input type="file" name="anexo1" class="form-control">
                    </div>
                    <div class="form-group">
                        PIX - Salão de Festas:
                        <input type="file" name="pixsal" class="form-control">
                        </div><!-- comment -->
                    </div>  
                    
                    <div class="tab-pane fade" id="service-five">
                        <h4 class="page-header">NOVA CONTA DO CONDOMINIO</h4>
                            <div class="form-group">
                                Plano:
                                <select name="plano" class="form-control">
                                    @if(isset($listaplano))
                                        @foreach($listaplano as $plano)                                        
                                            
                                            @if($idPlanoConta == $plano->idplano)                                                                 
                                                <option value="{{ $plano->idplano }}" selected>
                                                    {{ $plano->CmpDescricao }}
                                                </option>
                                            @else
                                                <option value="{{ $plano->idplano }}">
                                                    {{ $plano->CmpDescricao }}
                                                </option>
                                            @endif                                          
                                        
                                       @endforeach
                                    @endif   
                                </select>    
                                <input type="hidden" name="pnAnt" class="form-control" value="{{ $idPlanoConta }}">    
                            </div>
                        
                    </div>
                </div>
                
                    

            </div>
        </div>
                    
                    
                                       
                    
                    
                    
                    <input type="submit" value="Alterar" class="btn btn-primary">  
                    <a href="{{ route('logar') }}" class="btn btn-primary">Voltar</a>  
                    <!--
                        faz a validacao para erro crsf. tokenizacao
                    -->
                    
                    
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