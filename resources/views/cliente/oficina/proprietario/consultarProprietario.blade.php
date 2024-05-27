
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
                       
                            <a href='{{ route('master::cadPro') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Novo Proprietário
                       
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
                               <th>Nome</th>                              
                                 <th> </th>
                                <th>Nascimento</th>                                                                
                                <th>Tel. Fixo</th>
                                <th>Celular</th>
                               
                                <th>E-mail</th>
                                <th></th>
                                                                                                                     
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
                                        <td><img id="thumb" src="{{ asset($item->anexo) }}" height="" alt=""></td>
                                        
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
                                       
                                        <td>{{ $item->CmpEmail }}</td>
                                        
                                        <td align='center' width='100'>
                                            <a href='{{ route('master::ediPro',[ 'id' =>$item->idproprietario, 'id2' =>0]) }}' class="btn btn-primary" >Veículos</a>
                                            <a href='{{ route('master::ediPro',[ 'id' =>$item->idproprietario, 'id2' =>0]) }}' class="btn btn-success" >Editar</a>
                                            <a href='{{ route('master::excPro',[ 'id' =>$item->idproprietario]) }}' onclick="if(!confirm('Deseja Excluir o Proprietário e seus Veículos?')){return false;};"  class="btn btn-danger" >Excluir</a>
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