
@extends('master.layoutAnexo')

@section('conteudo')

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        
            
        <div class="col-lg-12">
            <div class="panel panel-primary">

               
                <div class="panel-heading">
                    <a href='{{ route('master::caddes',[ 'id' => $idObjeto, 'id2' => $idSiglaObjeto]) }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='' border=0></a> Novo
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Data</th>                                
                                <th>Status</th>
                                <th>Detalhar</th>

                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($lista_despachos))
                            @foreach($lista_despachos as $item)
                                    <tr class='odd gradeX'>
                                        <td width='10'>{{ $item->CmpDataInclusao }}</td>                                       
                                        <td>{{ $item->CmpStatus  }}</td> 
                                        
                                             <td align='center' width='100'><a href='{{ route('master::detPag',[ 'id' =>$item->iddespacho,'id2' =>0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                     
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
        
@endsection