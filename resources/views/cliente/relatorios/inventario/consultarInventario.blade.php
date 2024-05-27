
@extends('master.layout2')

@section('conteudo')



        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        
                      
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <form name="form1" method="post">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               Consultar Inventário
                            </div>             
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">

                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                            <thead>
                                                <tr>   
                                                        <th>Aquisição</th>
                                                        <th>Localização</th>
                                                        <th>Bem</th>                                                
                                                        <th>Categoria</th>
                                                        <th>R$ Atual</th>                                            

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    //GRADE DE SEGURANCA
                                                    $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();

                                                    $i = 0; 
                                                ?>

                                                @if(isset($lista_inventario))
                                                    @foreach($lista_inventario as $item)

                                                            <tr class='odd gradeX'> 
                                                                <td width="100">{{ $item->CmpDataInclusao }}</td>
                                                                <td>{{ $item->CmpAreaComum }}</td>
                                                                <td>{{ $item->CmpNome }}</td>
                                                                <td width="100">{{ $item->CmpCategoria }}</td>
                                                                <td width="100">{{ $item->CmpValorAquisicao }}</td>

                                                                <input type="hidden" value="{{$seguranca->cripto($item->CmpDataInclusao ."\***/".$item->CmpAreaComum ."\***/".$item->CmpNome."\***/".$item->CmpCategoria."\***/".$item->CmpValorAquisicao)}}" name="val_<?php echo $i; ?>">

                                                            </tr>

                                                    <?php $i++; ?>

                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>


                                </div>
                                <!-- /.table-responsive -->

                            </div>

                            <!-- /.panel-body -->
                        </div>
                        <div class='col-lg-12'>
                            <p align="right">
                                <input type="hidden" value="<?php echo $i; ?>" name="tot">
                                <input type='submit' value='Gerar Relatório' class='btn btn-primary'> 
                            </p>
                            {{csrf_field()}}
                        </div> 
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
           

     

    </div>
@endsection