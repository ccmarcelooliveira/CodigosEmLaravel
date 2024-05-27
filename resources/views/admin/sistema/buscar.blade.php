@extends('admin.layout')

@section('conteudo')
<script>
$(function(){
    $("#dtinicio").datepicker({
        dateFormat : 'dd/mm/yy',
        onSelect : function(dataSelecionada){
            $("#dtfim").datepicker('option', 'minDate', dataSelecionada);
        }
    });
    $("#dtfim").datepicker({
        dateFormat : 'dd/mm/yy'
    });
});
</script>
<h4 class="page-header">BUSCAR FOLHA DE PONTO</h4>
{!! $resp or '' !!}

<form method="post">
    {{ csrf_field() }}
    <div class="form-group">
        Data Inicio: 
        <input type="text" name="dtinicio" id="dtinicio">
        Data Fim: 
        <input type="text" name="dtfim" id="dtfim">
    </div>
    <input type="submit" value="BUSCAR" class="btn btn-info">
</form>
<hr>
@if(isset($lista) && count($lista) > 0)
<table class="table table-bordered">
    <tr>
        <th>DATA DO PONTO</th>
        <th>TIPO</th>
        <th>FUNCIONÁRIO</th>
        <th>OBSERVÇÃO</th>
    </tr>
    @foreach($lista as $p)
    <tr>
        <td>{{ \Carbon\Carbon::parse($p->dataponto)->format('d/m/Y H:i') }}</td>
        <td>{{ $p->tipo }}</td>
        <td>{{ $p->funcionario->nome }}</td>
        <td>{{ $p->observacao }}</td>
        <td>
            <a href="{{ route('admin::teste', [ 'id' => 30])}}" class="btn">VER</a>
        </td>
    </tr>
    @endforeach
</table>
@endif
@endsection