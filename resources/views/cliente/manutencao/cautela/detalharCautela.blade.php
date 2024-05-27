
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
            
        
        <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                    <div class="col-lg-12">
                    @if($botaoAprovar == "S")
                        <ul id="myTab" class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i>Solicitação Morador</a>
                            </li>

                                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> Aprovação Síndico</a>
                                </li>

                        </ul>
                    @endif
                    <div id="myTabContent" class="tab-content">

                        <div class="tab-pane fade active in" id="service-one">
                            @if(isset($imagem))
                                <center> <img id="thumb" src="{{asset($imagem)}}" height="250" alt=""><p></center>
                            @endif    
                            <P><P>
                                <?php echo $formulario; ?>     
                               
                                <!--
                                    faz a validacao para erro crsf. tokenizacao
                                -->
                                {{csrf_field()}}
                        </div>
                        @if($botaoAprovar == "S")
                            <div class="tab-pane fade" id="service-two">

                                <p><P><P></P>
                                <?php echo $formulario2; ?>                         

                            </div>
                        @endif
                    </div>

                </div>
                    
                     {{csrf_field()}}
              </form>

                        <div class='col-lg-12'>
                            <p align='right'>                                  
                                @if($botaoEditar == "S")
                                  <a href='{{ route('master::ediCau',[ 'id' => $idObjeto]) }}' class="btn btn-warning"> Editar</a>
                                @endif
                                @if($botaoExcluir == "S")
                                  <a href='{{ route('master::excCau',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja Apagar o Documento?')){return false;};" class="btn btn-warning"> Excluir</a>
                                @endif

                                <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a> 
                            </p>

                        </div>
                
                <!--
                    faz a validacao para erro crsf. tokenizacao
                -->
                    
                    
                   
                       
            </div> 
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
        


    </div>
        
        
        
@endsection