
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
 

  <!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                    
                    
                 
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

      

@endsection