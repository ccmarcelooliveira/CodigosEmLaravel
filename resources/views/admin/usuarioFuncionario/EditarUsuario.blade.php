@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-8">

            <div class="panel-heading">
                <h3> Editar USUÁRIO </h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        Usuário:
                        <input type="text" name="usuario" class="form-control" readonly="readonly" value="{{ $usuario}}">
                        <input type="hidden" name="val" value="{{ $id}}">
                    </div>

                    <div class="form-group">
                        Senha:
                        <input type="password" name="password" readonly="readonly" class="form-control" value="{{ $senha}}">
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
                   

                    <input type="submit" value="Alterar" class="btn btn-primary"> 
                    <a href="javascript:history.go(-1)" class="btn btn-primary">Voltar</a>  
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
        
    </div>            
</div>
  
@endsection