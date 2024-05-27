@extends('administracaoDagoba.layout2')

@section('conteudo')

 <div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
            Condomínio <small>FAQ</small>
        </h1>
        {!! $resp or '' !!}

            <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-primary">
                        
                        <div class="panel-heading">
                             <a href='{{ route('admin::cadfaq') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Nova Turma' border=0></a> Nova FAQ
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            
                                            <th>Detalhar</th>
                                        </tr>    
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaFAQ))
                                        @foreach($listaFAQ as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='10'>{{ $item->CmpTitulo }}</td>
                                                     
                                                    
                                                    <td align='center' width='50'><a href='{{ route('admin::detfaq',[ 'id' =>$item->idfaq]) }}' ><img src={{ asset('img/visualizar.png') }}  width=15></a></td>
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