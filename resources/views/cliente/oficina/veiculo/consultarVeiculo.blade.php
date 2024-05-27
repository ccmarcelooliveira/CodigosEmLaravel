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
                   
                    <a href='{{ route('master::cadVei') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Incluir Veículo' border=0></a> Novo Veículo
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="card card-yellow">  
                        <div class="card-header">
                          <h3 class="card-title">Parâmetros da Pesquisa </h3>
                        </div>
                        <div class="card-body">
                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data" >
                       
                                <div class='col-lg-12'>
                                    <div class="row">
                                        <?php echo $cabecalho; ?>
                                    </div>    
                                    {{csrf_field()}}
                                </div>                             
                            </form>    
                        </div> 
                    </div>
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Data </th>
                                <th> Placa</th>
                                <th>Proprietário</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Cor</th>
                                
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($listaVeiculo))
                            @foreach($listaVeiculo as $item)
                                    <tr class='odd gradeX'>
                                        <td width='10'>{{ $item->CmpDataInclusao }}</td>
                                        <td width='100'>{{ $item->CmpPlaca }}</td>
                                        <td width='200'>{{ str_replace("_"," ",$item->CmpNome) }}</td>
                                        <td>{{ $item->CmpMarca }}</td>
                                        <td>{{ $item->CmpModelo }}</td>                                       
                                            
                                        <td><span class="right badge badge-success">{{ strtoupper($item->CmpCor) }} </span></td>
                                                                                 
                                       
                                        
                                        <td align='center' width='100'>
                                            <a href='{{ route('master::detVei',[ 'id' => $item->idveiculo, 'id2' => 0]) }}' class="btn btn-success"> Detalhar</a>
                                            <a href='{{ route('master::ediVei',[ 'id' => $item->idveiculo, 'id2' => 0]) }}' class="btn btn-success"> Editar</a>
                                            <a href='{{ route('master::excVei',[ 'id' => $item->idveiculo ]) }}' onclick="if(!confirm('Deseja Excluir o Veículo?')){return false;};" class="btn btn-danger"> Excluir</a>
                                        </td>  
                                         
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