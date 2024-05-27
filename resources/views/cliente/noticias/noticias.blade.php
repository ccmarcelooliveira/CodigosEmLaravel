@extends('cliente.layoutAnexo2')

@section('conteudo')
            
<!-- Content Header (Page header) -->
   <?php echo $pageHeader; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">


            <?php echo $cardMorador ?>
             
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dicas Praxos!</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Dicas Úteis</strong>

                <p class="text-muted">
                  Dicas Úteis
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> </strong>

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

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link <?php echo $not; ?>" href="#noticia" data-toggle="tab">Notícias</a></li>
                  
                  <li class="nav-item"><a class="nav-link <?php echo $aut; ?>" href="#autorizacao" data-toggle="tab">Autorizações</a></li>
                  <li class="nav-item"><a class="nav-link" href="#classificado" data-toggle="tab">Classificados</a></li>
                  <li class="nav-item"><a class="nav-link" href="#reserva" data-toggle="tab">Reservas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#solicitacao" data-toggle="tab">Solicitações</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="<?php echo $not; ?> tab-pane" id="noticia">                     
                  
                                          <div class="row">
                                    @if(isset($listaNoticias))                

                                        @foreach($listaNoticias as $item)                        


                                                    <?php 
                                                        $util = new \app\Util\Util();
                                                        $imagem = $util -> imagemNoticia($item -> CmpTipoObjeto);

                                                        $link = "https://www.gs2i.com.br/gs2i-homologacao/public/master/";
                                                        $link2 = "";
                                                        $figura = "";
                                                        $tamanho = 0;
                                                        $frame = 0;
                                                        $figura = "";

                                                        if(trim($item->CmpTipoObjeto) == "EVE"){
                                                            $link2 = $link . "detEve/<?php echo $item->CmpCodigoObjeto ?>/0";                                        
                                                           // $figura = "cifrao.jpg"; 
                                                            $tamanho = 30;
                                                            $frame = 4;
                                                            $figura = "envelope";
                                                        }

                                                        if($item->CmpTipoObjeto == "DOC"){
                                                            $link2 = $link . "detalharDocumento/<?php echo $item->CmpCodigoObjeto ?>/<?php echo $item->CmpCodigoObjeto ?>/<?php echo $item->categoria_idcategoria ?>/0";
                                                            //$figura = "imagens_documentos/".$imagem;
                                                            $tamanho = 100;
                                                            $frame = 4;
                                                            $figura = "copy";
                                                        }

                                                        if($item->CmpTipoObjeto == "CLA"){
                                                            $link2 = $link . "detClaNot/<?php echo $item->CmpCodigoObjeto ?>";
                                                            //$figura = "cifrao.jpg";
                                                            $tamanho = 30;
                                                            $frame = 4;
                                                            $figura = "star";
                                                        }

                                                        if($item->CmpTipoObjeto == "AVI"){                                        
                                                            //$figura = "cifrao.jpg";
                                                            $tamanho = 30;
                                                            $frame = 4;
                                                            $figura = "envelope";
                                                        }

                                                         if($item->CmpTipoObjeto == "BVD"){                                        
                                                            //$figura = "boasVindas.png";
                                                            $tamanho = 40;
                                                            $frame = 12;
                                                            $figura = "star";
                                                        }

                                                    ?>


                                                    
                                        <div class="col-md-<?php echo $frame ?> col-sm-6 col-12">
                                            <div class="info-box">
                                              <span class="info-box-icon bg-<?php echo $util -> BandeiraPainelControle($item -> CmpTipoObjeto) ?>"><i class="far fa-<?php echo $figura;?>"></i></span>

                                              <div class="info-box-content">
                                                    <span class="info-box-text"><b><?php echo $item -> CmpRedator ?> - <?php echo  $item->CmpDataInclusao ?></b></span><p>                                                    
                                                    <span class="info-box-number"><font size="4"><p align="justify"><?php echo $item -> CmpTexto ?></p></font></span>
                                              </div>
                                              <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>

                                        @endforeach
                                    @endif    
                                   </div>      
                        
                        
                        
                            

                        </div>
                    
                    
                 
                  
                    <div class="<?php echo $aut; ?> tab-pane" id="autorizacao">

                       <?php echo $telaConsulta; ?>                            
                              
                    </div>

                    <div class="tab-pane" id="classificado">

                        
                                 cla

                    </div>
         
                  
                  <!-- /.tab-pane -->
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


    
    

