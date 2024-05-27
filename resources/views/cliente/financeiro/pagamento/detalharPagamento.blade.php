
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

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        DETALHAMENTO DA <?php echo strtoupper($categoria_objeto); ?>
                    </div>
                    <div class='panel-body'>

                                <div class='col-lg-4'>
                                    <div class="panel-body">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-pie-chart"></div>
                                        </div>
                                        <table border="0" width="100%">
                                            <tr>
                                                <td><b>Referência:</b></td><td> <?php echo $RefMesAno; ?> </td>
                                            </tr>
                                            <tr>
                                                <td><b>Conta:</b> </td><td><?php echo $conta; ?> </td>
                                            </tr>
                                            <tr>
                                                <td><b>Disponível: </b></td><td>R$ <?php echo $disponivel; ?></td>
                                            </tr>    
                                            <tr>   
                                                <td><b>Utilizado: </b></td><td>R$ <?php echo $utilizado; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class='col-lg-8'>
                                    <P><P>
                                          
                                    <?php echo $formulario; ?>   
                                </div>
                                    <!--
                                        faz a validacao para erro crsf. tokenizacao
                                    -->
                                    {{csrf_field()}}
                                
                            <?php   $variavel = new \App\Classes\VariavelModel();                                   
                                    $caminho  = $variavel-> rotaView();
                                    ?>   
                                    
                            <div class='col-lg-4'>
                                <p align='left'>
                                    @if(strlen($dataPag) == 0)
                                        <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>baiPag/{{$idObjeto}}',500,400)">
                                            Baixar
                                        </button>
                                       <!-- <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>baiPag/{{$idObjeto}}',500,400)">
                                            Suspender
                                        </button>-->
                                    
                                        <a href='{{ route('master::susPag',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Suspender o Pagamento?')){return false;};" class="btn btn-success"> Suspender</a>
                                    @endif 
                                    @if($botaoCriar == "S")
                                        <button type="button" class="btn btn-primary"  onclick="popup('<?php echo $caminho; ?>docs/{{$idObjeto}}/{{$TipoDonoDocumento}}/0',1200,800)">
                                            Documentos
                                        </button>
                                    @endif 
                                </p>
                            </div>    
                            <div class='col-lg-4'>
                                <p align='right'>
                                    
                                    @if($botaoEditar == "S" && $status != "DTV" && $status != "BAI")
                                      <a href='{{ route('master::ediPag',[ 'id' => $idObjeto, 'id2' => $rotulo]) }}' class="btn btn-success"> Editar</a>
                                    @endif                                       
                                    <?php echo $botaoVoltar; ?>
                                    @if($botaoExcluir == "S" && $status != "DTV" )
                                      <a href='{{ route('master::excPag',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Pagamento?')){return false;};" class="btn btn-danger"> Excluir</a>
                                    @endif    

                                     
                                </p>

                            </div>
                     </div>                                                
                </div>
        </div>
@endsection