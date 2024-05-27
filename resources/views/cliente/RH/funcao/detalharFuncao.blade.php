
@extends('administracaoDagoba.layout2')

@section('conteudo')

<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Detalhar Função
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
                                Detalhamento da Função
                            </div>
                            <div class='panel-body'>

                                <div class="col-lg-12"> 
                    
                                    <P><P>
                                        <?php echo $formulario; ?>                          

                                        {{csrf_field()}}
                                        
                                        
                                    <?php   $variavel = new \App\Classes\VariavelModel();                                   
                                        $caminho  = $variavel-> rotaView(); ?>
                                        
                                   
                                    
                                    <div class='col-lg-12'>
                                        <p align='right'>
                                            
                                            
                                              <a href='{{ route('master::ediFca',[ 'id' => $idObjeto]) }}' class="btn btn-success"> Editar</a>
                                            
                                            <?php echo $botaoVoltar; ?>
                                            
                                              <a href='{{ route('master::excFca',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Função?')){return false;};" class="btn btn-danger"> Excluir</a>
                                           
                                           
                                        </p>

                                    </div>
                                </div>

                             </div>                                                
                        </div>
                </div>

  
    </div>

</div>                       
        
@endsection