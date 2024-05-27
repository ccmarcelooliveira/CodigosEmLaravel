
@extends('master.layoutAnexo')

@section('conteudo')

        <?php
            $util = new \app\Util\Util();        
            $dispositivo = $util->ChecarDispositivo();
                    
        ?>
        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        
            
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">

                    @if($botaoCadastrar == "S")
                        <div class="panel-heading">
                            <a href='{{ route('master::cadSol') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Nova Solicitação
                        </div>
                    @else
                        <div class="panel-heading">
                            Consultar Solicitações
                        </div>
                    @endif

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <?php if($dispositivo == "computador"){ ?>
                                            <th>Data Inclusão</th>
                                            <th>Descrição</th>
                                        <?php } ?>
                                        <th>Status</th>

                                        @if($botaoDetalhar == "S")
                                          <th>Detalhar</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>

                                @if(isset($lista_solicitacao))
                                    @foreach($lista_solicitacao as $item)
                                            <tr class='odd gradeX'>
                                                <td width='80'>{{ $item->CmpCodigoUnico }}</td>
                                                <?php if($dispositivo == "computador"){ ?>
                                                    <td width='140'>{{ $item->dtsol }}</td>
                                                    <td>{{ $item->CmpTexto }}</td>
                                                <?php } ?>
                                                <td>{{ $item->solStatus }}</td>

                                                  @if($botaoDetalhar == "S")
                                                     <td align='center' width='100'><a href='{{ route('master::detSol',[ 'id' =>$item->idsolicitacao]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                                  @endif


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
                <p align="right">
                   <?php echo $botaoFechar; ?>
                </p>    
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        
@endsection