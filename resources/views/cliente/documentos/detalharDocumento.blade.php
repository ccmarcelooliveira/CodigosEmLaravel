
@extends('master.layout2')

@section('conteudo')

<script>
$(function(){
    
    $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
    
    $("#excluir").click()({
        alert('teste')
    });
   
});


</script>


        <?php echo $barra_funcionalidade ?>

        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="service-one">
                <P><P>
                    <div class='col-lg-4'> 
                        <?php echo $formulario; ?>                         
                    </div>    
                    <div class='col-lg-8'> 
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='panel panel-primary'>
                                        <div class='panel-heading'>
                                            LISTA DE ANEXOS
                                        </div>
                                    <!-- /.panel-heading -->
                                    <div class='panel-body'>
                                        <div class='dataTable_wrapper'>
                                            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                                <thead>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Título</th> 
                                                        <th>Status</th> 
                                                        <th>Anexo</th>

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
                                                                            $data["id2"] =  $iddocumento;

                                                                            $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                                                                            $data["id"] = $seguranca ->cripto($item->idanexo);

                                                                            //DEFININDO O TIPO DE ARQUIVO
                                                                            if($item->CmpTipoDocumento == 1){
                                                                                $thumb = "arquivo_1.jpg";
                                                                            }else{
                                                                                $thumb = "pdf.jpg";
                                                                            }

                                                                      ?>                                                                          
                                                                <td align='center' width='30'><a href="{{ route('master::download',$data) }}"><img src='{{ asset('img/'.$thumb) }}' width=25></a></td>

                                                            </tr>

                                                    @endforeach                                                            
                                                @endif
                                                </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- /.table-responsive -->

                                                        </div>
                                                        <!-- /.panel-body -->
                                                    </div>
                                                    <!-- /.panel -->
                                                </div>
                                                <!-- /.col-lg-12 -->
                                            </div>
                                        </div>
                    <!--
                        faz a validacao para erro crsf. tokenizacao
                    -->
                    {{csrf_field()}}
            </div>                   

        </div>
            <?php   $variavel = new \App\Classes\VariavelModel();                                   
                    $caminho  = $variavel-> rotaView(); ?>

            <div class='col-lg-4'>
                <p align='left'>
                     @if($botaoCadastrar == "S")
                        <button type="button" class="btn btn-primary"  onclick="popup('<?php echo $caminho?>cadastrarAnexos/{{$iddocumento}}/{{$iddocumento}}/DOC',700,700)">
                            Cadastrar Anexo
                        </button>                        
                    @endif
                </p>

            </div>   
            <div class='col-lg-4'>
                <p align='right'>
                    
                    @if($botaoEditar == "S")
                        <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho?>editarDocumento/{{$iddocumento}}/{{$banner_cripto}}',1200,700)">
                            Editar
                        </button> 
                    @endif
                    
                    
                    <!--@if($botaoCriar == "S")
                        <button type="button" class="btn btn-primary" onclick="popup('<?php echo $caminho ?>criarAnexo/{{$iddocumento}}/{{$iddocumento}}/DOC',900,700)">
                          Criar Anexo
                        </button>                        
                    @endif      -->
                    <?php echo $botaoVoltar; ?>
                    @if($botaoExcluir == "S")
                        <a href='{{ route('master::excDocs',[ 'id' => $iddocumento, 'id2' => $tipoDocumento,'id3' =>$idcategoria_documento]) }}' id="excluir" name="excluir" class="btn btn-danger btn-mini" onclick="if(!confirm('Deseja Apagar o Documento?')){return false;};"  class="btn btn-primary">Excluir</a>
                    @endif
                    
                     
                </p>

            </div>  
            
        <hr>

         
@endsection
