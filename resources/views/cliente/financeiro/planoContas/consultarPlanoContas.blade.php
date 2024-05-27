
@extends('administracaoDagoba.layout2')

@section('conteudo')
 
<div id="page-wrapper">
 
    <div class="col-xs-12">  
        
            <div class='col-lg-12'>
                <div class='panel panel-primary'>
                   
                        <div class="panel-heading">
                            <a href='{{ route('master::cadPlaCon') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Nova Conta
                        </div>
                   
                    
                        <div class="panel-body">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data </th>
                                            <th>Descrição</th>                                         
                                            <th>Categoria</th>

                                           
                                              <th>Detalhar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if(isset($lista_plano_contas))
                                        @foreach($lista_plano_contas as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='10'>{{ $item->CmpDataInclusao }}</td>
                                                    <td>{{ $item->CmpConta }}</td>                                                  
                                                    <td width='100'>{{ $item->CmpCategoriaConta }}</td>

                                                      
                                                         <td align='center' width='100'><a href='{{ route('master::detplacon',[ 'id' =>$item->idplano_contas]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                      
                                                </tr>

                                       @endforeach
                                    @endif 
                                    </tbody>
                                </table>

                        </div>

                    </div>

            </div> 
            <div class='col-lg-12'>
                <p align='right'>                            

                    <?php echo $botaoVoltar; ?> 
                </p>
            </div>
      </div>
  </div> 
@endsection