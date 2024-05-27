
@extends('master.layoutAnexo')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>
<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        
 <div id="page-wrapper">
            
                             
            <div class="row">
                
                 <div class="col-lg-12">

                     <div class="panel panel-default">
                        <div class="panel-heading">
                            Informações do Documento
                        </div>
                        <div class="panel-body"> 
                            <div class="form-group">
                                <b>Data Documento:</b> {{ $dataInclusao }}
                                <BR>
                                <b>Sigilo:</b> {{ $sigilo }}
                                <BR>                                
                                <b>Categoria:</b> {{ $categoria_documento }}
                                <P>
                                <b>Descrição:</b>
                                <textarea rows="6" class="form-control" readonly  > {{$descricao}}</textarea>   
                                
                            </div>
                        </div>  
          
                </div>
                     @if($botaoEditar == "S")
                      <a href='{{ route('master::editarDocumento',[ 'id' => $iddocumento]) }}' class="btn btn-warning"> Editar</a>
                    @endif
                    @if($botaoExcluir == "S")
                        <a href='{{ route('master::excluirDocumento',[ 'id' => $iddocumento]) }}' id="excluir" name="excluir" class="btn btn-danger btn-mini" onclick="if(!confirm('Deseja Excluir o Documento e seus Anexos?')){return false;};"  class="btn btn-primary">Excluir</a>
                    @endif
                    
                    <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a> 
                <!-- /.col-lg-12 -->
                <P><P><P><P><P><P><P><P>
                    
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Anexos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Data</th> 
                                            <th>Anexo</th>  
                                            <th>Status</th>
                                            <th>Anexo</th>
                                            
                                            <th >Exclusão</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                           
                                       
                                    @if(isset($lista_anexos))
                                        @foreach($lista_anexos as $item)
                                                <tr class='odd gradeX'>
                                                    <td align='left' width='100'>{{ $item->CmpDataInclusao }}</td>
                                                    <td align='left' width='100'>{{ $item->CmpAnexo }}</td>
                                                    
                                                     <?php 
                                                            $data = array();
                                                            $imagem = "";

                                                            $data["id"] =  $item->idanexo;
                                                            $data["id2"] =  $iddocumento;
                                                            
                                                            $data1 = array();
                                                            $data1["id"] = $item->idanexo;
                                                          
                                                            
                                                            
                                                            //DEFININDO O TIPO DE ARQUIVO
                                                            if($item->CmpTipoDocumento == 1){
                                                                $imagem = "arquivo_1.jpg";
                                                            }else{
                                                                $imagem = "pdf.jpg";
                                                            }
                                                      ?>  
                                                    <td align='center' width='30'>{{ $item->CmpStatus }}</td>
                                                    <td align='center' width='30'><a href="{{ route('master::download',$data1) }}"><img src='{{ asset('img/'.$imagem) }}' width=25></a></td>
                                                    
                                                    <td align='center' width='30'><a href='{{ route('master::excluirAnexo',$data) }}' ><img src='{{ asset('img/excluir.jpg') }}' width=15></a></td>
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
                    
                <a href="{{ route('master::cadastrar2Anexo',[ 'id' =>$iddocumento]) }}" class="btn btn-success">Cadastrar Anexo</a> 
                <a href="{{ route('master::criarAnexo',[ 'id' =>$iddocumento, 'id2' =>$idcategoria_documento]) }}" class="btn btn-success">Criar Anexo</a> 
                <a href="{{ route('logar') }}" class="btn btn-primary" onClick="history.go(-1)">Voltar</a>  
     
            </div> 
               
                

  
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
      

        <hr>


    </div>
        
        
        
@endsection