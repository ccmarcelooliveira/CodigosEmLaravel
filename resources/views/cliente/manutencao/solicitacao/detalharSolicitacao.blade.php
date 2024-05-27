
@extends('master.layoutAnexo')

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
        <!-- /.row -->
        
                               
              
                    <div class='col-lg-12'>
                            <div class='panel panel-primary'>
                                <div class='panel-heading'>
                                    Detalhamento da Solicitação
                                </div>
                                <div class='panel-body'>
        
                                            <div class="row">
                                                 <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                                                    <div class="col-lg-12">

                                                  

                                                    <div id="myTabContent" class="tab-content">

                                                        <div class="tab-pane fade active in" id="service-1">
                                                            <div class="col-lg-4">
                                                                @if(isset($imagem))
                                                                <P><P>
                                                                    <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
                                                                @endif    
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <P><P>
                                                                <?php echo $formulario; ?>   
                                                            </div>    
                                                            <!--
                                                                faz a validacao para erro crsf. tokenizacao
                                                            -->
                                                            {{csrf_field()}}
                                                            <?php   $variavel = new \App\Classes\VariavelModel();                                   
                                                                    $caminho  = $variavel-> rotaView(); ?>
                                                            <div class='col-lg-12'>
                                                                <p align='right'>


                                                                    @if($botaoEditar == "S")
                                                                      <a href='{{ route('master::ediSol',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                                                                    @endif
                                                                    @if($botaoExcluir == "S")
                                                                      <a href='{{ route('master::excSol',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Solicitação?')){return false;};" class="btn btn-danger"> Excluir</a>
                                                                    @endif
                                                                    
                                                                    
                                                                    @if($botaoSolucionar == "S" && $status != "CAN" && $status != "ATD")
                                                                        <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>caddes/{{$idObjeto}}/{{$idSiglaObjeto}}',1200,800)">
                                                                            Tratamento/Solução
                                                                        </button>
                                                                    @endif
                                                                    <?php echo $botaoFechar ?>        
                                                                    <?php echo $botaoVoltar ?>

                                                                    
                                                                </p>

                                                            </div>
                                                        </div>
                                                      

                                                    </div>

                                                </div>
                                            </div>

                                        </form> 

                                 </div>                                                
                            </div>
                    </div> 
        
        
@endsection