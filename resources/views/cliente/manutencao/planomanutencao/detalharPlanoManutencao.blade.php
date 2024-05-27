
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
                                    Detalhamento do Manutenção
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
                                                                    <center> <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p></center>
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
                                                                    <?php echo $botaoVoltar ?>
                                                                    <?php echo $botaoFechar ?> 
                                                                    
                                                                    <a href='{{ route('master::excplamnt',[ 'id' => $idObject, 'id2' => $idObject2 ]) }}' onclick="if(!confirm('Deseja Apagar o Manutenção do Equipamento?')){return false;};" class="btn btn-danger"> Excluir</a>
                                                                   
                                                                    
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