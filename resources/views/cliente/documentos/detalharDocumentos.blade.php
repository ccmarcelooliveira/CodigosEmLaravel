@extends('master.layoutAnexo')

@section('conteudo')

    <?php echo $barra_funcionalidade; ?>

    <div class='row'>
            <div class='col-lg-4'>
                <div class="card card-primary">

                  <div class="card-header">

                    <h3 class="card-title">Informações sobre o Documento</h3>
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">

                            <?php echo $formulario; ?> 

                  </div>
                  <!-- /.card-body -->
                </div>
            </div>  
            <div class='col-lg-8'>
                        <div class="card card-primary">

                            <div class="card-header">

                            <h3 class="card-title">Lista de Anexos</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                                  <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Título</th> 
                                                    <th>Status</th> 
                                                    <th>Anexo</th>
                                                    <th>Excluir</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                        

                                            @if(isset($listaAnexos))
                                                @foreach($listaAnexos as $item)
                                                        <tr class='odd gradeX'>
                                                            <td width='180'> {{ $item -> CmpDataInclusao }} </td>
                                                            <td>{{ substr($item -> CmpTitulo, 0, 30) }}</td>
                                                            <td align='center' width='30'>{{ $item->CmpStatus }}</td>
                                                                <?php 
                                                                        $data = array();

                                                                        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                                                                        $data["id"] = $seguranca ->cripto($item->idanexo);
                                                                        $data["idObjeto"] = $idObjeto;
                                                                        $data["id2"] =  $iddocumento;
                                                                        //$data["rotulo"] = $rotulo;                                                                                                            

                                                                        //DEFININDO O TIPO DE ARQUIVO
                                                                        if($item->CmpTipoDocumento == 1){
                                                                            $thumb = "arquivo_1.jpg";
                                                                        }else{
                                                                             $thumb = "pdf.jpg";
                                                                        }
                                                                  ?>  

                                                            <td align='center' width='30'><a href="{{ route('master::download',[ 'id' =>$seguranca ->cripto($item->idanexo)]) }}"><img src='{{ asset('img/'.$thumb) }}' width=25></a></td>
                                                            <td align='center' width='30'><a href="{{ route('master::excluirAnexos',[ 'id' =>$seguranca ->cripto($item->idanexo), 'id2' => $idObjeto, 'id3' => $iddocumento, 'id4' => 0]) }}"><img src='{{ asset('img/excluir.jpg') }}' onclick="if(!confirm('Deseja Apagar o Anexo?')){return false;};" width=20></a></td>

                                                        </tr>

                                                @endforeach                                                            
                                            @endif
                                            </tbody>
                                    </table>
                                                    

                        </div>
                        
                      


                    
                        </div>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <p align='left'>                            

                                    @if($botaoCadastrar == "S")
                                        <a href='{{ route('master::cadastrar2Anexos',[ 'id' => $idObjeto, 'id2' => $iddocumento, 'id3' =>'DOCS']) }}' class="btn btn-primary"> Cadastrar Anexo</a>
                                    @endif
                                </p>
                            </div>    
                            <div class='col-lg-6'>
                                <p align='right'>                            

                                    @if($botaoEditar == "S")
                                      <a href='{{ route('master::editarDocumentos',[ 'id' => $idObjeto, 'id2' =>$iddocumento, 'id3' => 0]) }}' class="btn btn-success"> Editar</a>
                                    @endif



                                    <!--@if($botaoCriar == "S")
                                        <a href='{{ route('master::criarAnexo',[ 'id' => $idObjeto,'id2' => $iddocumento, 'id3' =>'DOCS']) }}' class="btn btn-primary"> Criar Anexo</a>
                                    @endif -->    
                                    <?php echo $botaoFechar; ?>
                                    @if($botaoExcluir == "S")
                                        <a href='{{ route('master::excluirDocumento',[ 'id' => $idObjeto,'id2' => $iddocumento, 'id3' => $tipoDonoDocumentoDecripto]) }}' id="excluir" name="excluir" class="btn btn-danger btn-mini" onclick="if(!confirm('Deseja Apagar o Documento?')){return false;};"  class="btn btn-primary">Excluir</a>
                                    @endif

                                </p>

                            </div>
                        </div>
                </div>
    </div>
        

@endsection