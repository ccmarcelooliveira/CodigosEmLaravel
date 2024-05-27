<!DOCTYPE html>
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
              href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('jquery-ui/jquery-ui.min.css') }}">
        <script src="{{ asset('jquery-ui/external/jquery/jquery.js') }}"
        type="text/javascript"></script>
        <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"
        type="text/javascript"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"
        type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route("admin::home")}}">HOME</a></li>
                    <li><a href="{{ route("admin::novousuario")}}">USUARIO</a></li>
                    <li><a href="{{ route("admin::novocondominio")}}">CONDOMINIO</a></li>                   
                    <li><a href="{{ route("admin::relacaoTabela")}}">TABELAS</a></li>
                    <li><a href="{{ route("admin::menuLink")}}">MENU LINK</a></li>
                    <li><a href="{{ route("admin::menuCondominioPadrao")}}">MENU PADRÃO</a></li>
                    <li><a href="{{ route("admin::controleAcesso")}}">CONTROLE ACESSO</a></li>
                    <li><a href="{{ route("admin::sair")}}">SAIR</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="col-xs-12">
                <p class="text-right">
                    Seja bem vindo, {{ Auth::user()->nome }}
                    @if( Auth::user()->nome == 'Jose')
                    JOSE LOGADO
                    @endif
                </p>
            </div>
            <div class="col-xs-12">
                @yield("conteudo")
            </div>
        </div>
    </body>
</html>
