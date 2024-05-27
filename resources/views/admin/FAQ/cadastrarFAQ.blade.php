
@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-8">
        <h4 class="page-header">CADASTRO DE MENU CONDOMINIO </h4>
        {!! $resp or '' !!}

        <form method="post">
            

            
            <div class="form-group">
                    
                <div class="form-group">
                    Título:
                    <input type="text" name="titulo" class="form-control">    
                </div>
                <div class="form-group">
                    Texto:
                    <textarea type="text" name="texto" class="form-control"></textarea>    
                </div>
                {{ csrf_field() }}   
            </div>
            <input type="submit" value="INCLUIR" class="btn btn-primary">
        </form>

        <hr>

        
 
    </div>

</div>  

           
@endsection