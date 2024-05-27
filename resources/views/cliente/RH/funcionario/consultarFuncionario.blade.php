
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
                                <a href='{{ route('master::cadFun') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Novo Funcionário
                        @else
                            Lista de Funcionários
                        @endif
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th>Contratação</th>                                
                                <th>Nome</th>
                                <th>Função</th>
                                <th></th> 
                                <th>Data de Nascimento</th>
                                <th>Telefone Fixo</th>
                                <th>Celular</th>
                                <th>E-mail</th>
                                <th>Naturalidade</th>
                                <th>Nacionalidade</th>
                                <th>Comissão Por Peça</th>
                                <th>Comissão Por Serviço</th>
                                
                                <th></th>
                               
                            </tr>
                        </thead>
                        <tbody>

            
                                             
                            @if(isset($lista_funcionarios))
                                @foreach($lista_funcionarios as $item)
                                        <tr class='odd gradeX'>                                                    
                                            
                                            <td width='100' align="center">{{ $item->CmpDataContratacao }}</td>
                                            <td width='600'>{{ $item->CmpNome }}</td>
                                            <td width='100'>{{ $item->CmpDescricao }}</td>
                                            <td><img id="thumb" src="{{ asset($item->anexo) }}" height="" alt=""></td>
                                            <td width='100' align="center">{{ $item->CmpDataNasc }}</td>
                                            <td width='100'>{{ $item->CmpTel }}</td>
                                            <td width='100'>{{ $item->CmpCel }}</td>
                                            <td width='100'>{{ $item->CmpEmail }}</td>
                                            <td width='100'>{{ $item->CmpNaturalidade }}</td>
                                            <td width='100'>{{ $item->CmpEscolaridade }}</td>
                                            <td width='100'>{{ $item->CmpComissaoPeca }}</td>
                                            <td width='100'>{{ $item->CmpComissaoMaoObra }}</td>
                                            
                                            <td align='center' width='100'>
                                                <a href='{{ route('master::ediFun',[ 'id' =>$item->idfuncionarios, 'id2' =>0]) }}' class="btn btn-success" >Editar</a>
                                                <a href='{{ route('master::excFun',[ 'id' =>$item->idfuncionarios]) }}' onclick="if(!confirm('Deseja Excluir o Funcionário?')){return false;};"  class="btn btn-danger" >Excluir</a>
                                            </td>                                                      

                                        </tr>

                               @endforeach
                            @endif 
                     
                        </tbody>
                    </table>
                </div>
               <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p align="right">
                                <?php echo $botaoVoltar; ?>
                            </p>    
                        </div>    
                    </div> 
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