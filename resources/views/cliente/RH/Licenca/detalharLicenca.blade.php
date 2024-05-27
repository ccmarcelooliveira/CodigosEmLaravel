
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
                    
                <div class='col-lg-12'>
                        <div class='panel panel-primary'>
                            <div class='panel-heading'>
                                Detalhmanento da Licença
                            </div>
                            <div class='panel-body'>

                                    
                                <div class="col-lg-4">                                    
                                    <center>
                                        @if(isset($imagem))
                                            <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                                        @endif   
                                    </center> 
                                </div>
                     
                                
                                <div class="col-lg-8">                                    
                                    <?php echo $formulario; ?><P>
                                </div>
                           

                                    <div class='col-lg-12'>
                                        <p align='right'>


                                            @if($botaoEditar == "S")
                                              <a href='{{ route('master::edilic',[ 'id' => $idObjeto, 'id2' => 0 ]) }}' class="btn btn-success"> Editar</a>
                                            @endif
                                            <?php echo $botaoVoltar; ?>
                                            @if($botaoExcluir == "S")
                                              <a href='{{ route('master::exclic',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja apagar registro de Licença?')){return false;};" class="btn btn-danger"> Excluir</a>
                                            @endif

                                        </p>

                                    </div>

                             </div>                                                
                        </div>
                </div>   
        
@endsection