
@extends('master.layout')

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


<div class="container">

        <!-- Page Heading/Breadcrumbs -->
         <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
    <div id="page-wrapper">
        
        <div class="row">
                <div class="col-lg-12">
                    <!-- /.table-responsive -->
                   <div class="panel panel-default">
                        <div class="panel-heading">
                            Documento pertencente ao:
                        </div>
                        <div class="panel-body">                 
                            <div class='col-lg-2'> 
                                <div class='form-group'>
                                   <label for='inputEmail' class='control-label'>Data</label>
                                    <input type='text' readonly class='form-control' value='20'>
                                </div>
                            </div> 
                            <div class='col-lg-2'> 
                                <div class='form-group'>
                                   <label for='inputEmail' class='control-label'>Apartamento</label>
                                    <input type='text' readonly class='form-control' value=''>
                                </div>
                            </div> 
                            <div class='col-lg-2'> 
                                <div class='form-group'>
                                    <label for='inputEmail' class='control-label'>Data</label>
                                    <input type='text' readonly class='form-control' value='20'>
                                </div>
                            </div>
                            <div class='col-lg-2'> 
                                <div class='form-group'>
                                    <label for='inputEmail' class='control-label'>&nbsp;</label><P>
                                    <a href='{{ route('master::detalharApartamento',[ 'id' => $idObjeto, 'id2' => "con", 'id3' => 0, 'id4' => 0]) }}' class="btn btn-primary" >APTO </a>
                               </div>
                            </div>                            
                        </div>    
                   </div>
                 </div>    
            </div>
            <div class="row">
                <div class="col-lg-12"> 

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="service-one">
                            <P><P>
                              <?php echo $formulario; ?>                         

                               <div class='col-lg-8'> 
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <div class='panel panel-default'>
                                                    <div class='panel-heading'>
                                                        Lista de Doumentos
                                                    </div>
                                                <!-- /.panel-heading -->
                                                <div class='panel-body'>
                                                    <div class='dataTable_wrapper'>
                                                                            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Data</th>
                                                                                            <th>Descrição</th> 
                                                                                            <th>Status</th> 
                                                                                            <th>Anexo</th>
                                                                                            <th>Excluir</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>                                                        

                                                                                    @if(isset($listaAnexos))
                                                                                        @foreach($listaAnexos as $item)
                                                                                                <tr class='odd gradeX'>
                                                                                                    <td width='10'> {{ $item -> CmpDataInclusao }} </td>
                                                                                                    <td>{{ $item -> CmpCategoriaObjeto }}</td>
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
                                                                                                    <td align='center' width='30'><a href="{{ route('master::excluirAnexos',[ 'id' =>$seguranca ->cripto($item->idanexo), 'id2' => $idObjeto, 'id3' => $iddocumento]) }}"><img src='{{ asset('img/excluir.jpg') }}' width=20></a></td>

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


                        <div class='col-lg-12'>
                            <p align='right'>                            

                                @if($tipoDonoDocumentoDecripto == "APA")
                                <a href='{{ route('master::detalharApartamento',[ 'id' => $idObjeto,'id2' => 0]) }}' class="btn btn-warning">Apto Bloco 1 </a>
                                @endif

                                @if($tipoDonoDocumentoDecripto == "VEI")
                                <a href='{{ route('master::detalharVeiculo',[ 'id' =>$idObjeto, 'id2' => 0]) }}' class="btn btn-warning">Veículo</a>
                                @endif

                                @if($botaoEditar == "S")
                                  <a href='{{ route('master::editarDocumentos',[ 'id' => $idObjeto, 'id2' =>$iddocumento]) }}' class="btn btn-warning"> Editar</a>
                                @endif
                                @if($botaoCadastrar == "S")
                                    <a href="{{ route('master::cadastrar2Anexos',[ 'id' => $idObjeto , 'id2' => $iddocumento, 'id3' => 0]) }}" class="btn btn-success">Cadastrar Anexo</a> 
                                @endif
                                @if($botaoCriar == "S")
                                    <a href="{{ route('master::criarAnexo',[ 'id' =>$iddocumento, 'id2' =>$idcategoria_documento]) }}" class="btn btn-success">Criar Anexo</a> 
                                @endif        
                                @if($botaoExcluir == "S")
                                    <a href='{{ route('master::excluirDocumento',[ 'id' => $iddocumento,'id2' => $tipoDonoDocumentoDecripto]) }}' id="excluir" name="excluir" class="btn btn-danger btn-mini" onclick="if(!confirm('Deseja Apagar o Documento?')){return false;};"  class="btn btn-primary">Excluir</a>
                                @endif

                                <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a> 
                            </p>

                        </div>
                    <!--
                        faz a validacao para erro crsf. tokenizacao
                    -->


                        {{csrf_field()}}

                </div> 
            </div>    
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
        


    </div>
        
        
        
@endsection