
@extends('master.layout2')

@section('conteudo')

       
        <?php echo $barra_funcionalidade ?>
        
            <div class="panel panel-primary">
            <div class="panel-heading">           
            @if($botaoCadastrar == "S")
                
                    <a href='{{ route('master::cadCla') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Novo Classificado
            @else    
                Lista de Classificados
            @endif
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Emissão </th>   
                                <th>Assunto</th>
                                <th>Categoria</th>

                                @if($botaoDetalhar == "S")
                                  <th>Detalhar</th>
                                @endif                                            
                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($lista_classificados))
                            @foreach($lista_classificados as $item)
                                @if($usuSessao == $item -> usuario_idusuario || Auth::user()-> perfil_idperfil == 2 || Auth::user()-> perfil_idperfil == 3) 

                                        <tr class='odd gradeX'>
                                            <td width='100'>{{ $item->CmpDataInclusao }}</td>
                                            <td>{{ $item->CmpAssunto }}</td>
                                            <td width='100'>{{ $item->CmpCategoriaNegocio }}</td>                                                   

                                              @if($botaoDetalhar == "S")
                                                    @if($perfil == 1)
                                                        @if($item->usuario_idusuario == $usuSessao )
                                                            <td align='center' width='100'><a href='{{ route('master::detCla',[ 'id' =>$item->idclassificados, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                        @else
                                                            <td align='center' width='100'><a href='{{ route('master::detClaNot',[ 'id' =>$item->idclassificados]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                        @endif
                                                    @else
                                                        <td align='center' width='100'><a href='{{ route('master::detCla',[ 'id' =>$item->idclassificados, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                    @endif
                                              @endif
                                        </tr>
                                @else
                                    @if($item -> CmpStatus == "ACT")

                                        <tr class='odd gradeX'>
                                            <td width='10'>{{ $item->CmpDataInclusao }}</td>
                                            <td>{{ $item->CmpAssunto }}</td>
                                            <td>{{ $item->CmpCategoriaNegocio }}</td>                                                   

                                              @if($botaoDetalhar == "S")
                                                    @if($perfil == 1)
                                                        @if($item->usuario_idusuario == $usuSessao )
                                                            <td align='center' width='100'><a href='{{ route('master::detCla',[ 'id' =>$item->idclassificados, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                        @else
                                                            <td align='center' width='100'><a href='{{ route('master::detClaNot',[ 'id' =>$item->idclassificados]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                        @endif
                                                    @else
                                                        <td align='center' width='100'><a href='{{ route('master::detCla',[ 'id' =>$item->idclassificados, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                    @endif
                                              @endif
                                        </tr>
                                    @endif    
                                @endif            
                           @endforeach
                        @endif 
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        

           
@endsection


