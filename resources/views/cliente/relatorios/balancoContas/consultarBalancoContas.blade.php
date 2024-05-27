
@extends('master.layout2')

@section('conteudo')


        <?php echo $barra_funcionalidade ?>
        <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">
                       
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                       
                        <div class="panel-heading">                       
                            Parâmetros da Consulta 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div class="col-lg-12">
                                     <?php echo $consulta; ?>
                                </div>    
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                 </div>
            {{csrf_field()}}
        </form>

        <?php if($listaR != "" && $listaD != ""){ ?>
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                       
                        <div class="panel-heading">                       
                            Relação de Contas                     
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div class="col-lg-12">                                    
                                     <?php echo $listaR ?>
                                </div>    
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                 </div> 
                 <div class="col-lg-6">
                    <div class="panel panel-primary">
                       
                        <div class="panel-heading">                       
                            Relação de Contas                     
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div class="col-lg-12">
                                     <?php echo $listaD ?>
                                </div>    
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                 </div>

                 <div class="col-lg-12">
                    <div class="panel panel-primary">
                       
                        <div class="panel-heading">                       
                            Relação de Contas                     
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div class="col-lg-12">
                                     <?php echo $listaR ?>
                                </div>    
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                 </div>

        <?php } ?>      
@endsection