@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-10">
        <h4 class="page-header">EDITAR MENU CONDOMINIO PADRÃO</h4>
        {!! $resp or '' !!}

        <form method="post">
            {{ csrf_field() }}   

            <div class="form-group">
                PLANO:
                <input type="text" name="plano" class="form-control" value="{{ $plano }}">    
            </div>
            
            <div class="form-group">
                Custo por APTO(R$):
                <input type="text" name="custo" class="form-control" value="{{ $custo }}">    
            </div>
            
            <div class="form-group">
                Desconto Custo por APTO(%):
                <input type="text" name="desconto" class="form-control" value="{{ $desconto }}">    
            </div>
            
            <div class="form-group">
                Máximo de usuários adicionais:
                <input type="text" name="adicionais" class="form-control" value="{{ $adicional }}">    
            </div>

            <input type="submit" value="Editar" class="btn btn-primary">
            <input type="hidden" value="{{$idplano}}"  name="var">
        </form>

        <hr>

        
 
    </div>

</div>        
@endsection