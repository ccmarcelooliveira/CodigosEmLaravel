
@extends('administracaoDagoba.layout2')

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

<script type="text/javascript">

       
    function verificar_data_saida_condominio(val){
        
        if(val == 'NAO'){
            alert('Morador com data de Saída em aberto!')
            return false;
        }
          
    }
</script> 
 

  <!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Detalhar Fornecedor
        </h1>
        {!! $resp or '' !!}
        
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
         
        <!-- /.row -->
                 
                <div class='col-lg-12'>
                        <div class='panel panel-primary'>
                            <div class='panel-heading'>
                                Detalhamento da Peça Automotiva
                            </div>
                            <div class='panel-body'>

                               <div class='col-lg-12'>
                                <center>
                                    @if(isset($imagem))
                                        <img id="thumb" src="{{asset($imagem)}}" height="200" alt=""><p><P>
                                    @endif
                                </center>    
                            </div>
                                
                            <div class='col-lg-12'>
                                <?php echo $formulario ?>
                            </div>                              
                            
                          
                        <div class="row">                     
                        
                            <?php   
                                 $variavel = new \App\Classes\VariavelModel();                                   
                                 $caminho  = $variavel-> rotaView(); ?>
                        
                                <div class='col-lg-6'>
                                        <p align='left'>
                                            @if($botaoCriar == "S")
                                                <button type="button" class="btn btn-primary"  onclick="popup('<?php echo $caminho; ?>docs/{{$idObjeto}}/{{$TipoDonoDocumento}}/0',1200,800)">
                                                    Documentos
                                                </button>
                                            @endif 

                                            @if($botaoCadastrar == "S")
                                                <a href='{{ route('master::subMor',[ 'id' =>$idObjeto, 'id2' => $banner, 'id3' => 0]) }}' id="excluir" name="excluir" class="btn btn-warning btn-mini" onclick="return verificar_data_saida_condominio('<?php echo $temDataSaida; ?>')" onclick="if(!confirm('Deseja Substituir o proprietário?')){return false;};" class="btn btn-primary">Arquivar Morador</a>
                                                <!---->
                                            @endif 

                                            <button type="button" class="btn btn-success"  onclick="popup('<?php echo $caminho; ?>conDep/{{$idObjeto}}/0/0',1200,800)">
                                                Dependentes
                                            </button>

                                        </p> 
                                </div>    
                                <div class='col-lg-6'>
                                        <p align='right'>
                                            @if($botaoEditar == "S")
                                              <a href='{{ route('master::editarMorador',[ 'id' => $idObjeto, 'id2' => 0]) }}' class="btn btn-success"> Editar</a>
                                            @endif


                                            <?php echo $botaoVoltar; ?>

                                            <input type='hidden' name='val' id='val' value='<?php echo $idObjeto; ?>' >

                                        </p>

                                    </div>  

                        </div>

                             </div>                                                
                        </div>
                </div>

  
    </div>

</div>                       
       
@endsection