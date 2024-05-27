
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
            
            <div class="col-lg-12"> 

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
                        
                     
                        
                        @if($botaoEditar == "S")
                          <a href='{{ route('master::ediObra',[ 'id' => $idObjeto]) }}' class="btn btn-warning"> Editar</a>
                        @endif
                        @if($botaoExcluir == "S")
                          <a href='{{ route('master::excObra',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar a Obra/Serviço?')){return false;};" class="btn btn-warning"> Excluir</a>
                        @endif
                        
                        <!--<a href='{{ route('master::editarVeiculo',[ 'id' => $idObjeto, 'id2' => $rotulo]) }}' class="btn btn-warning"> Arquivar</a>-->
                        @if($botaoCriar == "S")
                            <a href="{{ route('master::ConsultarDocumento',[ 'id' =>$idObjeto, 'id2' => $TipoDonoDocumento, 'id3' => 0]) }}" class="btn btn-success">Documentos</a> 
                        @endif        
                      
                         
                        
                        <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a> 
                    </p>

                </div>
                    
                <!--
                    faz a validacao para erro crsf. tokenizacao
                -->
                    
                    
                    {{csrf_field()}}
                       
            </div>                   
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
        


    </div>
        
        
        
@endsection