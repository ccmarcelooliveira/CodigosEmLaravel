@extends('admin.layout2')

@section('conteudo')

<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
            <?php echo $CONSULTOFI; ?>
        </h1>
        
            <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                            <a href='{{route("addOf")}}'><img src='{{ asset('img/praxos/salvar.jpg') }}' width='20' title='Nova Oficina' border=0></a> Novo Negócio
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Conversão</th>
                                            <th>Negócio</th>
                                            <th>CNPJ</th>
                                            <th>Status</th>
                                            <!--<th>Excluir</th>-->
                                            <th>Detalhar</th>
                                        </tr>    
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaOficina))
                                        @foreach($listaOficina as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='50'>{{ $item->CmpDataInclusao }}</td>
                                                    <td width='380'>{{ $item->CmpOficina }}</td> 
                                                    <td width='200'>{{ $item->CmpCnpj }}</td>
                                                    <td width='80'>{{ $item->CmpStatus }}</td> 
                                                    
                                                    <td align='center' width='50'><a href='{{route("detNeg",$item->idoficina)}}' ><img src='{{ asset('img/praxos/visualizar.png') }}'  width=15></a></td>
                                                </tr> 
                                       @endforeach
                                    @endif 
                                    </tbody>
                                </table>
                                 
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <hr>

    </div>

</div>        
@endsection
