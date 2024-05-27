
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
                          <a href='{{ route('master::ediAreCom',[ 'id' => $idObjeto]) }}' class="btn btn-warning"> Editar</a>
                        @endif
                        @if($botaoExcluir == "S")
                          <a href='{{ route('master::excAreCom',[ 'id' => $idObjeto ]) }}' class="btn btn-warning"> Excluir</a>
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