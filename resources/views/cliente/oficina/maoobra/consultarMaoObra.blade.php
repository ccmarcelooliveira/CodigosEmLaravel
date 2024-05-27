
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
                        
                        <a href='{{ route('master::cadMob') }}'><img src='{{ asset('img/salvar.jpg') }}' width='20' title='Anexar documento' border=0></a> Nova Mão de Obra
                        
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th>Descrição</th>                               
                                <th>Preço Unitário</th>
                               
                                <th></th>
                                                                                                                      
                            </tr>
                        </thead>
                        <tbody>

                        @if(isset($listaMaoObra))
                            @foreach($listaMaoObra as $item)
                            
                                    <tr class='odd gradeX'>
                                         
                                        <td width='300'><span class="right badge badge-success"><font size=3>{{ strtoupper($item->CmpDescricao) }}</font> </span></td>            
                                        <td><font size=3>R$ {{ $item->CmpPrecoUnitario }}</font></td> 
                                        
                                        <td align='center' width='100'>
                                            <a href='{{ route('master::ediMob',[ 'id' =>$item->idmaoobra, 'id2' =>0]) }}' class="btn btn-success" >Editar</a>
                                            <a href='{{ route('master::excMob',[ 'id' =>$item->idmaoobra]) }}' onclick="if(!confirm('Deseja Excluir a Mão de Obra?')){return false;};"  class="btn btn-danger" >Excluir</a>
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