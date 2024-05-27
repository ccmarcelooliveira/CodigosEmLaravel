@extends('master.layout2')

@section('conteudo')

<?php echo $pageHeader ?>            
       
<?php

$util = new \App\Util\Util();
$dispositivo = $util ->Gadget();

?>        
  
<section class="content">
     <div class="wrapper">
      <div class="container-fluid">
                 
          
           <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#pesquisa" data-toggle="tab">PESQUISA</a></li>
                                    
                  <li class="nav-item"><a class="nav-link" href="#peca" data-toggle="tab">R$ Peças</a></li>
                  <li class="nav-item"><a class="nav-link" href="#mao" data-toggle="tab">R$ Mão de Obra</a></li>
                </ul>
              </div><!-- /.card-header -->
             
              <div class="card-body">
                <div class="tab-content">
                    
                    
                    <div class="active tab-pane" id="pesquisa">                     
                        <div class="row">


                            <div class="card">
              
                                <!-- /.card-header -->
                                  <div class="card card-primary">  
                                      <div class="card-header">
                                        <h3 class="card-title">Parâmetros da Pesquisa </h3>
                                      </div>
                                      <div class="card-body">
                                          <form method="post" id="registration-form" name="form" id="form"  data-toggle="validator" enctype="multipart/form-data">

                                              <p align='right'> 
                                                  <?php echo $cabecalho; ?> <br>  
                                                  {{csrf_field()}}
                                              </p>

                                          </form>    
                                      </div> 
                                  </div>
                                </div> 
                            
                            

                        </div>
                    </div>
                    
                    <div class="tab-pane" id="peca">                     
                        <div class="row">

                            <div class="col-lg-12">
                                
                                <div class="card card-success">
                                            <div class="card-header">

                                              <div class="panel-heading">          
                                                  COMISSÕES SOBRE PEÇAS
                                              </div>
                                            </div>
                                            <!-- /.card-header -->

                                            <div class="card-body">

                                                  <table id="example1" class="table table-bordered table-striped">
                                                              <thead>
                                                                  <tr>
                                                                      <th>OS</th>
                                                                      <th>Peça</th>                                        
                                                                      <?php if($dispositivo != "mobile") {?><th>Venda (R$)</th><?php } ?>
                                                                      <th>Comissão(R$)</th>

                                                                  </tr>
                                                              </thead>
                                                              <tbody>

                                                              @if(isset($listaComissao))
                                                                  @foreach($listaComissao as $item2)

                                                                      @if($item2->tipo == 1)
                                                                          <tr class='odd gradeX'>
                                                                              <tr class='odd gradeX'>
                                                                                  <td width='30' align='center'>{{ $item2->CmpCodigoUnico }}</td>                                                           
                                                                                  <td width='150' align='center'>{{ $item2->CmpDescricao }}</td>

                                                                                  <?php if($dispositivo != "mobile") {?><td width='80' align='center'>{{ $item2->venda }}</td><?php } ?>
                                                                                  <td width='40' align='center'>{{ $item2->venda*($item2->comissao/100) }}</td>
                                                                              </tr>
                                                                          </tr>


                                                                      @endif
                                                                 @endforeach
                                                              @endif 
                                                      </tbody>
                                                  </table>
                                                  <div class="col-12" align="right">
                                                      <div class="row">
                                                        <?php echo $total_peca; ?>
                                                      </div>   
                                                  </div>
                                              </div>
                                            <!-- /.card-body -->
                                          </div>
                                
                            </div>

                        </div>
                    </div>
                    
                    <!-- /.post -->
                   <div class="tab-pane" id="mao">                     
                        <div class="row">

                            <div class="col-lg-12">
                               
                                <div class="card card-yellow">
                                <div class="card-header">

                                  <div class="panel-heading">          
                                      COMISSÕES SOBRE MÃO DE OBRA
                                  </div>
                                </div>
                                <!-- /.card-header -->


                                      <div class="card-body">


                                               <table id="example2" class="table table-bordered table-hover">
                                                  <thead>
                                                              <tr>
                                                                  <th>OS</th>
                                                                  <th>Serviço</th>
                                                                  <?php if($dispositivo != "mobile") {?><th>Venda (R$)</th><?php } ?>
                                                                  <th> Comissão(R$)</th>

                                                              </tr>
                                                          </thead>
                                                          <tbody>

                                                          @if(isset($listaComissao))
                                                              @foreach($listaComissao as $item)
                                                                  @if($item->tipo == 2)
                                                                      <tr class='odd gradeX'>
                                                                          <td width='50' align='center'>{{ $item->CmpCodigoUnico }}</td>                                                           
                                                                          <td width='300' align='center'>{{ $item->CmpDescricao }}</td>

                                                                          <?php if($dispositivo != "mobile") {?><td width='80' align='center'>{{ $item2->venda }}</td><?php } ?>
                                                                          <td width='80' align='center'>{{ $item->venda*($item->comissao/100) }}</td>


                                                                      </tr>
                                                                  @endif    
                                                              @endforeach
                                                          @endif 
                                                  </tbody>
                                              </table>

                                              <div class="col-12" align="right">
                                                  <div class="row">
                                                    <?php echo $total_mao; ?>
                                                  </div>   
                                              </div>
                                          </div>
                                  </div>
                                
                            </div>

                        </div>
                    </div>
                    
                    
                    
                   
                     
                    
               </div> 
         
      
                </div>
             
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


   

   

 </div>        

@endsection    