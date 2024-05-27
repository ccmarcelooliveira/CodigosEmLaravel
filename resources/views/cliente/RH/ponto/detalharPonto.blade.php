
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
        <!-- /.row -->
   
            
            <div class="col-lg-12"> 

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="service-one">
                        <div class="col-lg-4">
                            <P><P>
                            @if(isset($imagem))
                                <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
                            @endif    
                        </div>
                        <div class="col-lg-8">
                            <?php echo $formulario; ?>  
                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                            {{csrf_field()}}
                        </div> 
                    </div>
                   
                </div>    

                <div class='col-lg-12'>
                    <p align='right'>
                       
                        @if($botaoEditar == "S")
                          <a href='{{ route('master::ediPon',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                        @endif
                        @if($botaoExcluir == "S")
                          <a href='{{ route('master::excPon',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Ponto?')){return false;};" class="btn btn-danger"> Excluir</a>
                        @endif
                                                
                       <?php echo $botaoVoltar ?> 
                    </p>

                </div>
                    
                <!--
                    faz a validacao para erro crsf. tokenizacao
                -->
                    
                    
                    {{csrf_field()}}
                       
            </div>                   
       
        
@endsection