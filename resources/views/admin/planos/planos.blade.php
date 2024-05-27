@extends('administracaoDagoba.layout2')

@section('conteudo')


<div id="page-wrapper">
 
    <div class="col-xs-8">
        
        
            <h4 class="page-header">CADASTRO DE PLANOS</h4>
            {!! $resp or '' !!}

            <form method="post">
                {{ csrf_field() }}
                 <div class="form-group">
                        TABELA:
                        <input type="text" name="tabela" class="form-control">  

                    </div>

                <input type="submit" value="INCLUIR TABELA" class="btn btn-primary">
            </form>

            <hr>

            @if(isset($listaPlanos) && count($listaPlanos) > 0)
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>PLANO</th>
                    <th>Custo por Apto</th>
                    <th>Desconto Custo Apto</th>
                    <th>Máx. Usuarios</th>
                    <th>Status</th>

                </tr>
                @foreach($listaPlanos as $p)
                <tr>
                    <td WIDTH="40" ALIGN="CENTER">{{ $p->idplano }}</td>
                    <td>{{ $p->CmpDescricao }}</td>
                    <td>{{ $p->CmpCustoPorApto }}</td>
                    <td>{{ $p->CmpDescontoCustoApto }}</td>
                    <td>{{ $p->CmpMaxUsuarios }}</td>
                    <td WIDTH="40" ALIGN="CENTER">{{ $p->CmpStatus }}</td> 
                    <td WIDTH="40" ALIGN="CENTER"> <a href="{{ route('admin::excluirRelacaoTabela', [ 'id' =>  $p->idplano ])}}" class="btn"><img src="{{ asset('img/excluir.jpg') }}" width="15"></a></td> 

                </tr>
                @endforeach
            </table>
            @endif


    </div>

</div> 
@endsection