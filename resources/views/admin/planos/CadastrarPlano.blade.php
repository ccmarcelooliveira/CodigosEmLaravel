@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-8">
        <h4 class="page-header">CADASTRO DE PLANO</h4>
        {!! $resp or '' !!}

        <form method="post">
            {{ csrf_field() }}   

            <div class="form-group">
                PLANO:
                <input type="text" name="plano" class="form-control">    
            </div>
            
            <div class="form-group">
                Custo por APTO(R$):
                <input type="text" name="custo" class="form-control">    
            </div>
            
            <div class="form-group">
                Desconto Custo por APTO(%):
                <input type="text" name="desconto" class="form-control">    
            </div>
            
            <div class="form-group">
                Máximo de usuários adicionais:
                <input type="text" name="adicionais" class="form-control">    
            </div>
            
            <input type="submit" value="INCLUIR" class="btn btn-primary">
        </form>

        <hr>

        
 
    </div>

</div>        
@endsection