<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
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
        <link rel="stylesheet" type="text/css"
              href="{{ asset('bootstrap/css/bootstrap.min.css') }} ">
    </head>
    <body>
        <div class="container">
            <div class="col-xs-offset-3 col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3> NOVO LOGIN </h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                Usuário:
                                <input type="text" name="usuario" class="form-control">
                            </div>

                            <div class="form-group">
                                Senha:
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                Perfil:
                                <select name="perfil" class="form-control">
                                    @if(isset($listaperfil))
                                    @foreach($listaperfil as $perfil)
                                    <option value="{{ $perfil->idperfil }}">
                                        {{ $perfil->CmpDescricao }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                            <div class="form-group">
                                Condominio:
                                <select name="condominio" class="form-control">
                                    <option value=''></option>
                                    @if(isset($listacondominio))
                                    @foreach($listacondominio as $condominio)
                                    <option value="{{ $condominio->idcondominio }}">
                                        {{ $condominio->CmpRazaoSocial }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>
                            <div class="form-group">
                                Apartamento:
                                <select name="apartamento" class="form-control">
                                    <option value=''></option>
                                    @if(isset($listaApartamento))
                                    @foreach($listaApartamento as $apartamento)
                                    <option value="{{ $apartamento->idapartamento }}">
                                        {{ $apartamento->CmpApto."bl".$apartamento->CmpBloco }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>

                            </div>

                            <input type="submit" value="NOVO" class="btn btn-primary">
                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
                <!--
                    permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
                -->
                {!! isset($resp)?$resp:"" !!}
                <a href="{{ route('logar') }}" class="btn btn-link">Voltar</a>
            </div>
        </div>
    </body>
</html>
