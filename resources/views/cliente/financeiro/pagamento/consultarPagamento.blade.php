
@extends('master.layout2')

@section('conteudo')

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>        
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    @if($botaoCadastrar == "S")
                        <div class="panel-heading">
                            <a href='{{ route('master::cadPag') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Novo Pagamento
                        </div>
                    @endif
                    <div class='panel-body'>                           

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th align="center">Vencimento </th>   
                                                <th align="center">Pagamento</th>                                                
                                                <th align="center">Conta</th>
                                                <th align="center">Status</th>    
                                                <th align="center">Valor</th>
                                                
                                                @if($botaoDetalhar == "S")
                                                  <th>Detalhar</th>
                                                @endif

                                            </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($lista_pagamento))
                                            @foreach($lista_pagamento as $item)
                                                    <tr class='odd gradeX'>                                                   

                                                        <td width='150' align="center">{{ $item->CmpDataVencimento }}</td>
                                                        <td width='150' align="center">{{ $item->CmpDataPagamento }}</td>
                                                        
                                                        <td width='300' align="center">{{ strtoupper($item->CmpConta) }}</td>
                                                        <td width='100' align="center"> {{ $item->CmpStatus }}</td>
                                                        <td width='100' align="center">R$ {{ $item->CmpValor }}</td>
                                                        
                                                        
                                                        @if($botaoDetalhar == "S")
                                                              <td align='center' width='100'><a href='{{ route('master::detPag',[ 'id' =>$item->idpagamento, 'id2' => 0 ]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                        @endif


                                                    </tr>

                                           @endforeach
                                        @endif 
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

                            </div>      

                     </div>                                                
                </div>
        </div>
@endsection