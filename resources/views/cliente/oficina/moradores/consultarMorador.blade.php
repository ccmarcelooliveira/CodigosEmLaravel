
@extends('master.layout2')

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
                            <a href='{{ route('master::cadMor') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Novo Proprietário
                        @else
                           <h3 class="card-title">Lista de Moradores</h3>
                        @endif
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th>Nome</th>                               
                                <th>Entrada</th>
                                <th>Nascimento</th>                                                                
                                <th>Tel. Fixo</th>
                                <th>Celular</th>                                
                                <th>Proprietário?</th>                              
                                <th>Apto</th>
                                
                                @if($botaoDetalhar == "S")
                                  <th>Detalhar</th>
                                @endif                                                                                      
                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($listaMorador))
                            @foreach($listaMorador as $item)
                            
                                    <tr class='odd gradeX'>
                                        <?php 
                                            if($item->CmpNome == "")
                                            {   $cor = 'danger';
                                                $item->CmpNome = "Morador não cadastrado";
                                            }
                                            else
                                            { $cor = 'success';} ?>
                                            
                                        <td width='300'><span class="right badge badge-<?php echo $cor ?>"><font size=3>{{ strtoupper($item->CmpNome) }}</font> </span></td>
            
                                        
                                        <td><font size=3>{{ $item->CmpEntradaCondominio }}</font></td>
                                        <td><font size=3>{{ $item->CmpDataNasc }}</font></td>
                                        <?php 
                                            if($item->CmpNome == "")
                                            {   $cor = 'danger';
                                                $item->CmpNome = "Morador não cadastrado";
                                            }
                                            else
                                            { $cor = 'success';} ?>
                                            
                                        <td><span class="right badge badge-<?php echo $cor ?>"><font size=3>{{ strtoupper($item->CmpTel) }}</font> </span></td>
                                        <td>{{ $item->CmpCel }}</td>
                                        <?php 
                                            if($item->CmpEhProprietario == "N")
                                            { $cor = 'danger';
                                              $item->CmpEhProprietario = "NÃO";
                                            }
                                            else
                                            { $cor = 'success';
                                              $item->CmpEhProprietario = "SIM";  
                                            } ?>
                                        <td><span class="right badge badge-<?php echo $cor ?>"><font size=3>{{ $item->CmpEhProprietario }}</font> </span></td>
                                        
                                        <?php
                                            if($item->CmpNome == "")
                                            {   $cor = 'danger';}
                                            else
                                            { $cor = 'success';} ?>
                                        <td><span class="right badge badge-<?php echo $cor ?>"><font size=3>{{ $item->CmpApto }} </font></span></td>
                                          @if($botaoDetalhar == "S")
                                             <td align='center' width='100'><a href='{{ route('master::detMor',[ 'id' =>$item->idmorador, 'id2' =>0]) }}' ><img src={{ asset('img/visualizar.png') }} ></td>
                                          @endif
                                    </tr>

                           @endforeach
                        @endif 
                        </tbody>
                    </table>
                </div>
              <!-- /.card-body -->
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