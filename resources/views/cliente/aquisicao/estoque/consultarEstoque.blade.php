
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
                        
                    <a href='{{ route('master::cadEst') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Cadastrar Estoque' border=0></a> Novo Estoque
                        
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div class="dataTable_wrapper">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>

                                    <th>Data Inclusão</th>                                     
                                    <th>Peça Automotiva</th>
                                    <th>Preço Compra</th>
                                    <th>Preço Venda</th>
                                    <th>Quantidade</th> 
                                    <th>Categoria Peçao</th>
                                    <th>Marca</th> 
                                    <th></th>
                                   

                                </tr>
                            </thead>
                            <tbody>

                            @if(isset($lista_estoque))
                                @foreach($lista_estoque as $item)
                                        <tr class='odd gradeX'>

                                            <td align='left' width='50'>{{ $item->CmpDataInclusao }}</td>
                                            <td align='left' width='550'>{{ $item->CmpDescricao }}</td>
                                            <td align='left' width='50'>R$ {{ $item->CmpPrecoCompra }}</td>
                                            <td align='left' width='50'>R$ {{ $item->CmpPrecoVenda }}</td>
                                            <td align='left' width='50'>{{ $item->CmpQuantidade }}</td>
                                            <td align='left' width='50'>{{ $item->CmpDescricao }}</td>
                                            <td align='left' width='50'>{{ $item->marca }}</td>
                                            
                                            
                                            <td align='center' width='100'>
                                                <a href='{{ route('master::ediEst',[ 'id' =>$item->idestoque, 'id2' =>0]) }}' class="btn btn-success" >Editar</a>
                                                <a href='{{ route('master::excEst',[ 'id' =>$item->idestoque]) }}' onclick="if(!confirm('Deseja Excluir o item de Estoque?')){return false;};"  class="btn btn-danger" >Excluir</a>
                                            </td> 
                                        </tr>


                               @endforeach
                            @endif 
                            </tbody>
                        </table>
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