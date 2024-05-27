@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-8">

            <div class="panel-heading">
                <h3> Detalhar USUÁRIO </h3>
            </div>
            <div class="panel-body">
                <form method="post">
                    
                    <div class="form-group">
                        <?php echo $msg ?>                        
                    </div>
                    
                    <div class="form-group">
                        Status:
                        <input type="text"  class="form-control" readonly="readonly" value="{{$usuarioStatusExtenso}}">
                    </div>
                    
                    <div class="form-group">
                        Usuário:
                        <input type="text" name="usuario" class="form-control" readonly="readonly" value="{{$usuario}}">
                    </div>                    

                    <div class="form-group">
                        Perfil:
                        <input type="text"  class="form-control" readonly="readonly" value="{{$perfil}}">
                    </div>
                    
                    <div class="form-group">
                        ID Morador:
                        <input type="text"  class="form-control" readonly="readonly" value="{{$idmorador}}">
                    </div>
                    
                     <div class="form-group">
                        Morador:
                        <input type="text"  class="form-control" readonly="readonly" value="{{$morador}}">
                    </div>
                    
                    <div class="form-group">
                        Condomínio:
                        <input type="text"  class="form-control" readonly="readonly" value="{{$condominio}}">
                    </div>
                    
                    <div class="form-group">
                        Apartamento:
                        <input type="text"  class="form-control" readonly="readonly" value="{{" APTO ".$apartamento ." - Bloco ".$bloco}}">
                    </div>
                        
                                        
                    <?php if($usuarioStatus == 'ATV'){ ?>
                        
                        <a href="{{ route('admin::suspenderUsuario',[ 'id' =>$id]) }}" class="btn btn-primary" onclick="">Suspender</a>  
                        <a href="{{ route('admin::editarUsuario',[ 'id' =>$id]) }}" class="btn btn-primary" onclick="">Editar</a>  
                        
                        <a href="{{ route('admin::excluirUsuario',[ 'id' =>$id]) }}" class="btn btn-danger" onclick="">Excluir</a>  
                        
                    <?php }else if($usuarioStatus == 'SUS'){ ?>
                        <a href="{{ route('admin::ativarUsuario',[ 'id' =>$id]) }}" class="btn btn-primary" onclick="">Ativar</a>  
                        <a href="{{ route('admin::excluirUsuario',[ 'id' =>$id]) }}" class="btn btn-primary" onclick="">Excluir</a>  
                    <?php } ?>
                    
                        
                    
                    
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