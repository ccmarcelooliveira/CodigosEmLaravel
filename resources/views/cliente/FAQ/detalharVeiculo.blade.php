
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
                            @if(isset($imagem))
                                <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
                            @endif    
                            <?php echo $formulario; ?>   
                                                       
                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                            {{csrf_field()}}
                    </div>
                   
                </div>

                <div class='col-lg-12'>
                    <p align='right'>
                        
                        @if($botaoEntradaSaidaVeiculo == "SAI")
                            <a href='{{ route('master::entrarVeiculo',[ 'id' => $idObjeto ]) }}' class="btn btn-warning"> Entrada Condomínio</a>
                        @else
                            <a href="{{ route('master::sairVeiculo',[ 'id' => $idObjeto ]) }}" class="btn btn-success">Saída Condomínio</a>
                        @endif
                        
                        @if($botaoEditar == "S")
                          <a href='{{ route('master::editarVeiculo',[ 'id' => $idObjeto, 'id2' => $rotulo]) }}' class="btn btn-warning"> Editar</a>
                        @endif
                        @if($botaoExcluir == "S")
                          <a href='{{ route('master::excluirVeiculo',[ 'id' => $idObjeto ]) }}' class="btn btn-warning"> Excluir</a>
                        @endif
                        
                        <!--<a href='{{ route('master::editarVeiculo',[ 'id' => $idObjeto, 'id2' => $rotulo]) }}' class="btn btn-warning"> Arquivar</a>-->
                        @if($botaoCriar == "S")
                            <a href="{{ route('master::ConsultarDocumento',[ 'id' =>$idObjeto, 'id2' => $TipoDonoDocumento, 'id3' => $banner]) }}" class="btn btn-success">Documentos</a> 
                        @endif        
                      
                         
                        
                        <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a> 
                    </p>

                </div>
        

           
@endsection