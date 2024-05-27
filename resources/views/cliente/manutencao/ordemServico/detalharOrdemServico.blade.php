
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

<script type="text/javascript">

       
    function verificar_data_saida_condominio(val){
        
        if(val == 'NAO'){
            alert('Morador com data de Saída em aberto!')
            return false;
        }
          
    }
</script> 
 
<script type="text/javascript">

    function AtualizaOS(status,id){

            //var idMontadora = $("#montadora"+num).val();       
            var get_token = $('input[name="_token"]').val();

            
            //alert(id);
            $.ajax({
                headers: {
                    'X-CSRF-Token': get_token
                },
                url: "{{ URL::to('ajax/atualizaStatus') }}",
                type: "POST",
                dataType: 'html',
                data: {
                    "id": status,
                    "id2": id
                },
                beforeSend: function () {
                    //mostrando/883/ um gif de enviando
                    //document.getElementById("enviando").style.display = "block";
                },
                success: function(result) {
                        alert("Ordem de Serviço cancelada com sucesso!");
                      /*$("#modelo"+num).html('');
                      $("#modelo"+num).append(result);*/
                        window.location.reload();
                },
                error: function () {

                }


            });

    }
</script>

<?php

$util = new \App\Util\Util();
$dispositivo = $util ->Gadget();

?>
  <!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
       <?php if($dispositivo == "computador"){ ?>
          
        <div class="row">
          <div class="col-md-3">
              
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dicas Praxos!</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Dados de cadastro do morador</strong>

                <p class="text-muted">
                  Deixe sempre atualizado os dados de cadastro dos moradores, junto à administração do condomínio.
                  Isso ajuda no controle e no aumento da segurança para os moradores.
                </p>

                <hr>

                <!--<strong><i class="fas fa-map-marker-alt mr-1"></i> </strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
             
              <div class="card-body">
                    <div class="row"> 
                            <div class='col-lg-12'>                               
                                <div class="card card-primary">  
                                    <div class="card-header">
                                      <h3 class="card-title">ORDEM DE SERVIÇO </h3>
                                    </div>
                                    <div class="card-body">

                                        <div class='col-lg-12'>
                                            <?php echo $cabecalho; ?>
                                        </div>                       
                                    </div> 
                                </div>
                            </div>                              
                            <div class="col-lg-7">

                                    <div class="card card-success">  
                                        <div class="card-header">
                                          <h3 class="card-title">PEÇAS/PRODUTOS </h3>
                                        </div>
                                        <div class="card-body">

                                            <div class='col-lg-12'>
                                                <?php echo $listaPeca; ?>
                                            </div>                                 

                                                {{csrf_field()}}
                                        </div> 
                                    </div>

                                    </div>    
                                    <div class="col-lg-5">
                                        <div class="card card-yellow">  
                                            <div class="card-header">
                                              <h3 class="card-title">MÃO DE OBRA </h3>
                                            </div>
                                            <div class="card-body">

                                                    <div class='col-lg-12'>
                                                        <?php echo $listaMao; ?>

                                                        {{csrf_field()}}
                                                    </div>                             

                                            </div> 
                                        </div>
                                    </div>
                          
                                            
                        
                            <?php   
                                 $variavel = new \App\Classes\VariavelModel();                                   
                                 $caminho  = $variavel-> rotaView(); ?>
                        
                                <div class='col-lg-6'>
                                        <p align='left'>
                                             
                                            <?php if($status != "CAN" && $status != "ARQ"){ ?>
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('CAN','<?php echo $idObjeto; ?>')">
                                                    CANCELAR OS
                                                </button>
                                            <?php } ?>
                                            
                                            <!-- O status AND e CON soa feitos pelo mecanico -->
                                            <?php if($status == "CON"){ ?> 
                                            
                                                <button type="button" class="btn btn-primary"  onclick="AtualizaOS('AND','<?php echo $idObjeto; ?>')">
                                                    REABRIR OS
                                                </button>
                                                <button type="button" class="btn btn-success"  onclick="AtualizaOS('AND','<?php echo $idObjeto; ?>')">
                                                    ENVIAR EMAIL OS
                                                </button>
                                            
                                            <?php } ?>
                                           
                                            
                                            <?php if($status == "CON"){ ?> 
                                            
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('PAG','<?php echo $idObjeto; ?>')">
                                                    PAGAR OS
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            <?php if($status == "CON"){ ?> 
                                            
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('FEC','<?php echo $idObjeto; ?>')">
                                                    FECHAR OS
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            <?php if($status == "FEC"){ ?> 
                                            
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('ARQ','<?php echo $idObjeto; ?>')">
                                                    ARQUIVAR OS
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            
                                            @if($botaoEditar == "S")
                                              <a href='{{ route('master::editarMorador',[ 'id' => $idObjeto, 'id2' => 0]) }}' class="btn btn-success"> Editar</a>
                                            @endif


                                            <?php echo $botaoVoltar; ?>

                                            <input type='hidden' name='val' id='val' value='<?php echo $idObjeto; ?>' >

                                        </p> 
                                </div>    
                                

                        </div>
                    
                    
                 
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <?php }else{ ?>   
              
             <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#veiculo" data-toggle="tab">Veículo</a></li>                                    
                  <li class="nav-item"><a class="nav-link" href="#peca" data-toggle="tab">Peças</a></li>
                  <li class="nav-item"><a class="nav-link" href="#mao" data-toggle="tab">Mão de Obra</a></li>
                </ul>
              </div><!-- /.card-header -->
              
              <div class="card-body">
                <div class="tab-content">
                    
                    
                    <div class="active tab-pane" id="veiculo">                     
                        <div class="row">

                            <div class="card card-primary">  
                                <div class="card-header">
                                  <h3 class="card-title">INFORMAÇÕES DO AUTOMÓVEL </h3>
                                </div>
                                @if(isset($imagem))
                                <div class='col-lg-12'><P><P>
                                        <center> <img id="thumb" src="{{asset($imagem)}}" height="150" alt=""><p></center>
                                    </div>     
                                @endif 
                                <div class="card-body">
                                        <div class='col-lg-12'>

                                            <?php echo $cabecalho; ?>
                                            {{csrf_field()}}
                                        </div>  
                                </div> 
                            </div>
                        </div>
                        
                        
                        <div class="card card-danger">  
                            <div class="card-header">
                              <h3 class="card-title">O QUE DEVE SER VERIFICADO! </h3>
                            </div>
                            <div class="card-body">

                                    <div class='col-lg-12'>
                                        <?php echo $formulario; ?>
                                        {{csrf_field()}}
                                    </div>                              
                            </div> 
                        </div>

                       
                        
                    </div>
                    
                    <div class="tab-pane" id="peca">                     
                        <div class="row">

                            <div class="col-lg-12">                                
                                                                           
                                <?php echo $listaPecaCelular; ?>
                                
                            </div>

                        </div>
                    </div>
                    
                    <!-- /.post -->
                   <div class="tab-pane" id="mao">                     
                        <div class="row">

                            <div class="col-lg-12">
                                 
                                 <?php   echo $listaMaoCelular; ?>
                                        
                            </div>

                        </div>
                    </div>
                    <?php   
                                 $variavel = new \App\Classes\VariavelModel();                                   
                                 $caminho  = $variavel-> rotaView(); ?>
                        
                                <div class='col-lg-6'>
                                        <p align='left'>
                                             
                                            <?php if($status != "CAN"){ ?>
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('CAN','<?php echo $idObjeto; ?>')">
                                                    CANCELAR OS
                                                </button>
                                            <?php } ?>
                                            
                                            <!-- O status AND e CON soa feitos pelo mecanico -->
                                            <?php if($status == "CON" || $status == "TES"){ ?> 
                                            
                                                <button type="button" class="btn btn-primary"  onclick="AtualizaOS('AND','<?php echo $idObjeto; ?>')">
                                                    REABRIR OS
                                                </button>
                                                <button type="button" class="btn btn-success"  onclick="AtualizaOS('AND','<?php echo $idObjeto; ?>')">
                                                    ENVIAR EMAIL OS
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            <?php if($status == "CON"){ ?> 
                                            
                                                <button type="button" class="btn btn-primary"  onclick="AtualizaOS('TES','<?php echo $idObjeto; ?>')">
                                                    TESTE/VERIFICAÇÃO
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            <?php if($status == "TES"){ ?> 
                                            
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('PAG','<?php echo $idObjeto; ?>')">
                                                    PAGAR OS
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            <?php if($status == "PAG"){ ?> 
                                            
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('FEC','<?php echo $idObjeto; ?>')">
                                                    FECHAR OS
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            <?php if($status == "FEC"){ ?> 
                                            
                                                <button type="button" class="btn btn-danger"  onclick="AtualizaOS('ARQ','<?php echo $idObjeto; ?>')">
                                                    ARQUIVAR OS
                                                </button>
                                            
                                            <?php } ?>
                                            
                                            
                                           @if($botaoEditar == "S")
                                              <a href='{{ route('master::editarMorador',[ 'id' => $idObjeto, 'id2' => 0]) }}' class="btn btn-success"> Editar</a>
                                            @endif


                                            <?php echo $botaoVoltar; ?>

                                            <input type='hidden' name='val' id='val' value='<?php echo $idObjeto; ?>' >

                                        </p> 
                                </div>    
                               
                    
                    
                   
                     
                    
               </div> 
         
      
                </div>
             
             
        <?php } ?>   
          
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

      

@endsection