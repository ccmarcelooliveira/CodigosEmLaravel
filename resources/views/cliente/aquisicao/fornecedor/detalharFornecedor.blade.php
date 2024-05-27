
@extends('administracaoDagoba.layout2')

@section('conteudo')

        

<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Detalhar Fornecedor
        </h1>
        {!! $resp or '' !!}
        
            <script>
            $(function(){

                $("#dataInclusao").datepicker({
                    dateFormat : 'dd/mm/yy'
                });

                $("#excluir").click()({
                    alert('teste')
                });

            });


            </script>




        <!-- Page Heading/Breadcrumbs -->
         
        <!-- /.row -->
                 
                <div class='col-lg-12'>
                        <div class='panel panel-primary'>
                            <div class='panel-heading'>
                                Detalhamento da Fornecedor
                            </div>
                            <div class='panel-body'>

                                <div class='panel-body'>
                                    <?php echo $formulario; ?> 
                                    <div class='col-lg-12'>
                                        <p align='right'>


                                                <a href='{{ route('master::ediFor', ['id' => $idFornecedor]) }}' class="btn btn-success"> Editar</a>



                                            <?php echo $botaoVoltar; ?>  


                                                <a href='{{ route('master::excFor', ['id' => $idFornecedor ]) }}' onclick="if(!confirm('Deseja Apagar o Fornecedor?')){return false;};"  class="btn btn-danger">Excluir</a>

                                             <!--
                                                 faz a validacao para erro crsf. tokenizacao
                                             -->
                                             {{csrf_field()}}

                                        </p>
                                    </div> 

                                 </div>

                             </div>                                                
                        </div>
                </div>

  
    </div>

</div>                       
            
@endsection