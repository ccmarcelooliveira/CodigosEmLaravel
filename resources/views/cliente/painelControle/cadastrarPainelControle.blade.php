
@extends('master.layout2')

@section('conteudo')

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
       
               <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                <div class="col-lg-12">
                            
                <div class="tab-pane fade active in" id="service-one">                        
                             
                            <P><P>
                            <?php echo $formulario; ?>     

                            <!--
                                faz a validacao para erro crsf. tokenizacao
                            -->
                          
                        {{csrf_field()}}
                </div>
                <div class='col-lg-12'>
                    <p align='right'>                            

                        <input type='submit' value='Enviar' class='btn btn-success' >

                        <?php echo $botaoVoltar; ?>
                    </p>

                </div>    
                              
            </div>
        
        
           
              
            </form>
               
@endsection