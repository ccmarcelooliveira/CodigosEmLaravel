@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-8">

            <div class="panel-heading">
                <h3> NOVO USUÁRIO </h3>
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
                        Perfil--:
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
                            @if(isset($listaOficina))
                                @foreach($listaOficina as $oficina)
                                <option value="{{ $oficina->idcondominio }}">
                                    {{ $oficina->CmpRazaoSocial . " - " . $oficina->CmpCnpj }}
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
                                    {{ $apartamento->CmpApto ."bl".$apartamento->CmpBloco }}
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
                          
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
        <a href="{{ route('logar') }}" class="btn btn-link">Voltar</a>  
    </div>            
</div>
  
@endsection