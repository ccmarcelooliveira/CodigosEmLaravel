
@extends('administracaoDagoba.layout2')

@section('conteudo')

<div id="page-wrapper">
 
    <div class="col-xs-12">       
       
        <h1 class="page-header">
           Detalhar Fornecedor
        </h1>
        {!! $resp or '' !!}
        
            <<script>
            $(function(){

                 $("#dataInclusao").datepicker({
                    dateFormat : 'dd/mm/yy'
                });

            });
            </script>


     
        <!-- /.row -->
         
        
        <div class='col-lg-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        Edição de Fornecedor
                    </div>
                    <div class='panel-body'>

                            <form method="post" id="registration-form" name="form" data-toggle="validator" enctype="multipart/form-data">

                                        <P><P>
                                            <?php echo $formulario; ?>                          

                                            {{csrf_field()}}

                                       
                             
                             </form>

                     </div>                                                
                </div>
        </div>
 </div>

</div> 
        
            
@endsection