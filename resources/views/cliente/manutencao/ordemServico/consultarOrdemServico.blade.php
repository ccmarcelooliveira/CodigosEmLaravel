
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
                       
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <?php
                            if(Auth::user()->perfil_idperfil == 2 || Auth::user()->perfil_idperfil == 3){ 
                    ?> 
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
                    <?php
                            }
                    ?>        
                    <div class="card card-primary">  
                        <div class="card-header">
                          <h3 class="card-title">Resultados da consulta </h3>
                        </div>
                        <div class="card-body"> 
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Placa</th>
                                                <th>Veículo</th>
                                                <th>Proprietário</th>
                                                <th>Mecânico</th>
                                                <th>Aberta desde</th>
                                                <th>Situação</th>

                                                <th></th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($lista_ordemServico))
                                            @foreach($lista_ordemServico as $item)
                                                    <tr class='odd gradeX'>
                                                        <td width='80'>{{ $item->CmpCodigoUnico }}</td>
                                                        <td>{{ $item->CmpPlaca }}</td>
                                                        <td>{{ $item->CmpFabricante . " ". $item->CmpModelo}}</td>
                                                        <td width='380'>{{ $item->nomeProp}}</td>
                                                        <td>{{ $item->nomeFunc }}</td>
                                                        <td>{{ $item->inicio }}</td>
                                                        
                                                        <td><span class="right badge badge-success"><font size=3>{{ $item->situacao }}</font></span></td>


                                                        <?php


                                                                if(Auth::user()->perfil_idperfil == 2 || Auth::user()->perfil_idperfil == 3){ 
                                                        ?>            
                                                                    <td align='center' width='100'>
                                                                        <a href='{{ route('master::detOsv',[ 'id' =>$item->idordem_servicos]) }}' class="btn btn-success" >Detalhar</a>
                                                                    </td>    
                                                        <?php        }else{   ?>
                                                                    <td align='center' width='100'>
                                                                       <a href='{{ route('master::ediOsv',[ 'id' =>$item->idordem_servicos]) }}' class="btn btn-success" >Trabalhar
                                                                    </td>
                                                        <?php        }    

                                                        ?>


                                                    </tr>

                                           @endforeach
                                        @endif 
                                </tbody>
                            </table>
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