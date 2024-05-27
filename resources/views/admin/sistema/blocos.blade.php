@extends('admin.layout')

@section('conteudo')
<div class="container">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3> NOVO BLOCO </h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        Nome:
                        <input type="text" name="nome" class="form-control">
                    </div>

                    <div class="form-group">
                        CNPJ:
                        <input type="text" name="cnpj" class="form-control">
                    </div>
                     <div class="form-group">
                        Endereco:
                        <input type="text" name="cnpj" class="form-control">
                    </div>
                      <div class="form-group">
                        Telefone Fixo:
                        <input type="text" name="tel_fixo" class="form-control">
                    </div>
                      <div class="form-group">
                        Celular:
                        <input type="text" name="celular" class="form-control">
                    </div>
                    <div class="form-group">
                        E-mail:
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        Logo:
                        <input type="file" name="logofigura" class="form-control">
                    </div>
                    <div class="form-group">
                        Plano:
                        <select name="perfil" class="form-control">
                            @if(isset($listaplano))
                                @foreach($listaplano as $plano)
                                <option value="{{ $plano->idplano }}">
                                    {{ $plano->descricao }}
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
@endsection