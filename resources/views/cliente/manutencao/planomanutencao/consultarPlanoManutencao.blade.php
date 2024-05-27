
@extends('master.layoutAnexo')

@section('conteudo')

<?php echo $pageHeader ?>
        
<div class="wrapper">  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card">
              <div class="card-header">
                
                <div class="panel-heading">          
                    @if($botaoCadastrar == "S")

                        <a href='{{ route('master::cadAut') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir autorização de entrada' border=0></a> Nova Autorização

                    @else
                        Histórico de Manutenções do Equipamento
                    @endif
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Início </th>   
                                <th>Fim </th>   
                                <th>Nome </th>
                                <th>Apto/Bloco </th>
                                <th>Ordem </th>
                                <th>Chegou? </th>
                                <th>Chegada </th>

                                @if($botaoDetalhar == "S")
                                  <th>Detalhar</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>

                         @if(isset($lista_mnt))
                                @foreach($lista_mnt as $item)
                                    <tr class='odd gradeX'>
                                        <td width='10'>{{ $item->CmpDataManutencao }}</td>                                       
                                       
                                        <?php 
                                            if($item->CmpStatus == "")
                                            {   $cor = 'danger';
                                                $item->CmpStatus = "Morador não cadastrado";
                                            }
                                            else
                                            { $cor = 'success';} ?>
                                            
                                        <td><span class="right badge badge-<?php echo $cor ?>">{{ strtoupper($item->CmpStatus) }} </span></td>
                                        <td>{{ $item->CmpStatus }}</td>
                                        
                                       
                                          @if($botaoDetalhar == "S")
                                             <td align='center' width='100'><a href='{{ route('master::detAut',[ 'id' =>$item->idplanomanutencao, 'id2' => 0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                          @endif


                                    </tr>

                           @endforeach
                        @endif 
                        </tbody>
                    </table>
                </div>
               
              <!-- /.card-body -->
            </div>
               <div class='col-lg-12'>
                    <p align='right'>

                        <?php echo $botaoFechar; ?>


                    </p>

                </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

 </div>        
@endsection