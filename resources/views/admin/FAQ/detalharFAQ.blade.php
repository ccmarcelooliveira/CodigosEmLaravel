
@extends('administracaoDagoba.layout2')

@section('conteudo')
<div id="page-wrapper">
 
    <div class="col-xs-8">

        <h4 class="page-header">Detalhar FAQ</h4>
        {!! $resp or '' !!}

        <input type="text" readonly value="{{$titulo}}" class="form-control">
        <BR>
        <textarea class="form-control" readonly>{{$texto}}</textarea>

        <hr>
        <a href='{{ route('admin::edifaq',[ 'id' => $idfaq]) }}' class="btn btn-primary"> Editar</a>
         <a href='{{ route('admin::excfaq',[ 'id' => $idfaq]) }}' class="btn btn-danger"> Excluir</a>
    </div>

</div> 

           
@endsection