
@extends('master.layout2')

@section('conteudo')

<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        
            
        <div class='col-lg-12'>
        <div class='panel panel-primary'>
                <div class='panel-heading'>
                    Cadastro de novo Equipamento
                </div>
                <div class='panel-body'>
                    <form method="post" id="registration-form" name="form" id="form"  data-toggle="validator" enctype="multipart/form-data">
                        
                        <div class='col-lg-12'>
                            <p align='right'>      

                                <?php echo $formulario; ?> <br>       

                            </p>

                        </div>                            

                    </form>  
                </div>           
             </div>                                                
        </div>
@endsection