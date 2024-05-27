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
        
         <?php echo $barra_funcionalidade ?>
       
                
                
            
       <div class='col-lg-12'>
	<div class='panel panel-yellow'>
	    <div class='panel-heading'>
		Detalhamento do reforma do apartamento
	    </div>
		<div class='panel-body'>

                    <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                        <div class="col-lg-12">
                                @if(Auth::user()-> perfil_idperfil == 2)
                                <ul id="myTab" class="nav nav-tabs nav-justified">
                                    <li class="active"><a href="#service-one" data-toggle="tab">Solicitação Morador</a>
                                    </li>

                                    <li class=""><a href="#service-two" data-toggle="tab"> Aprovação Síndico</a>
                                    </li>

                                </ul>
                                @endif
                            <div id="myTabContent" class="tab-content">

                                <div class="tab-pane fade active in" id="service-one">
                                    <P><P>
                                        <?php echo $formulario; ?>     

                                        <!--
                                            faz a validacao para erro crsf. tokenizacao
                                        -->
                                        {{csrf_field()}}
                                </div>

                                @if(Auth::user()-> perfil_idperfil == 2)
                                <div class="tab-pane fade" id="service-two">

                                    <p><P><P></P>
                                    <?php echo $formulario2; ?>  

                                </div>
                                @endif  

                            </div>

                            <div class='col-lg-12'>
                                <p align='right'>       

                                        <input type='submit' value='Enviar' class='btn btn-success'>

                                        @if($botaoExcluir == "S" && $status != "RJT" && Auth::user()-> perfil_idperfil != 2)
                                            <a href='{{ route('master::excRes',[ 'id' => $idObjeto ]) }}' onclick="if(!confirm('Deseja excluir o Reserva?')){return false;};"  class="btn btn-danger"> Excluir</a>
                                        @endif    
                                        <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)"><font color="white">Voltar</font></a> 
                                </p>

                            </div>
                        </div>

                         {{csrf_field()}}
                    </form>

            </div>                                                
        </div>
    </div>

         
@endsection