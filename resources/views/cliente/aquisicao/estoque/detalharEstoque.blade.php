
@extends('master.layout2')

@section('conteudo')
<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        
        <!-- /.row -->
       <div id="page-wrapper">

            <?php echo $formulario; ?> 
           
            <div class='col-lg-12'>
                    <p align='right'>
                        @if($botaoEditar == "S")
                            <a href='{{ route('master::ediFor', ['id' => 0]) }}' class="btn btn-danger"> Ocorrências</a>
                        @endif
                        @if($botaoEditar == "S")
                            <a href='{{ route('master::ediFor', ['id' => 0]) }}' class="btn btn-primary"> Editar</a>
                        @endif
                        @if($botaoExcluir == "S")
                            <a href='{{ route('master::excFor', ['id' => 0 ]) }}' onclick="if(!confirm('Deseja Apagar o Fornecedor?')){return false;};"  class="btn btn-primary">Excluir</a>
                        @endif
                        <a href="{{ route('logar') }}" class="btn btn-primary">Voltar</a>  
                         <!--
                             faz a validacao para erro crsf. tokenizacao
                         -->
                         {{csrf_field()}}
                                  
                    </p>
            </div>                   
        <!--
            permite que o codigo html seja impresso sem os comandos de html. so o conteudo.
        -->
        {!! isset($resp)?$resp:"" !!}
        


    </div>
            <!-- /.row -->
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            	<div id="pesquisa">

                <?php

                                //echo $dte->exibe_noticias($util,$condominio_id,"");



                ?>
				</div>
            </div>

           
        </div>
        <!-- /.row -->

        <hr>


    </div>
@endsection