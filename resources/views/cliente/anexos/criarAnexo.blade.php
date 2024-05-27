@extends('master.layoutAnexo')

@section('conteudo')

        
        <div class='col-lg-12'>
            <h1 class='page-header'>Criar Anexo  
                <align="right"><small> </small></align>
            </h1>
        </div>
        
        <div class='col-lg-12'>
	<div class='panel panel-primary'>
	    <div class='panel-heading'>
		Criação de novo documento
	    </div>
		<div class='panel-body'>

                        
                        <center> <img id="enviando" src="{{asset("img/enviando.gif")}}"  style="display:none" alt=""></center>
                        <div class='col-lg-12'>
                            <form method="post" name="form" id="register">

                                <div class='form-group'>
                                    <label for='inputEmail' class='control-label'>Título</label>
                                    <input id='titulo' name='titulo' class='form-control'  type='text' required value=''>
                                    <div class='help-block with-errors'></div>
                                </div>


                                <label for='inputEmail' class='control-label'>Texto</label>

                                <div id='summernote' name="summernote" ></div>
                                    <script>
                                        $(document).ready(function() {
                                         $('#summernote').summernote({
                                          height: 400, // set editor height
                                          minHeight: null,             // set minimum height of editor
                                          maxHeight: null,             // set maximum height of editor
                                          focus: true                  // set focus to editable area after initializing summernote
                                        });
                                      });
                                    </script>

                                <input type="hidden" value="<?php echo $iddocumento ?>" name="val" id="val" class="btn btn-primary">   

                                {{csrf_field()}}

                            </form> 
                             {{ Form::open(array('route' => 'test.update', 'role'=>'form', 'id' =>'form1','name' =>'form1' )) }}
                            <input type="hidden" id="id" name="id" value="<?php echo $iddocumento ?>" />

                            <input type="hidden" id="id2" name="id2" value="<?php echo $siglaDoc ?>" />            
                            <input type="hidden" id="id4" name="id4" value="<?php echo $idObjeto ?>" />
                            
                            <p align='right'>
                                <button type="button" id="btnEnviar" class="btn btn-success">Enviar</button>
                                <button type="button" id="btnEnviar" class="btn btn-primary" onclick="history.go(-1);">Voltar</button>
                                <button type="button" id="btnEnviar" class="btn btn-primary" onclick="fechar();">Fechar</button>
                            </p>    
                            
                            {{ Form::close() }}


                        </div>

                </div>                                                
        </div>
    </div>
        <script>
    
            $("#btnEnviar").on("click", function(){
                
                var iddocumento = $("#id").val();  
                var idObjeto = $("#id4").val();
                //alert(idObjeto);
                var siglaDoc = $("#id2").val(); 
                var titulo = $("#titulo").val();
                //var tipoDonoDocumento = $("#id3").val();  
                //alert(tipoDonoDocumento);
                var text = $('#summernote').summernote('code');
                
                //TESTE PARA TEXTO NULO
                if(text != "" && text != "<p></p>"){
                                      
                    var get_token = $('input[name="_token"]').val();
                    $.ajax({
                        headers: {
                            'X-CSRF-Token': get_token
                        },
                        url: "{{ URL::to('/test/update') }}",
                        type: "POST",
                        dataType: 'html',
                        data: {
                            "id": iddocumento,                            
                            "id2": siglaDoc,
                            "text": text,
                            "titulo": titulo
                        },
                        beforeSend: function () {
                            //mostrando um gif de enviando
                            document.getElementById("enviando").style.display = "block";
                        },
                        success: function(result) {
                            
                            document.getElementById("enviando").style.display = "none";                            
                            window.location.href = "http://localhost/dagoba/public/master/detDocs/"+idObjeto+"/"+iddocumento+"/ANECRISUC";
                                                        
                            //realod();
                            
                        },
                        error: function () {
                            //alert(" Can't do because: " + error);
                            window.location.href = "http://localhost/dagoba/public/master/criarAnexo/"+iddocumento+"/DOCS/NAOANECRI";
                            
                        }
                                              
                       
                    });
                    
                }else{
                    alert("ATENÇÃO: O Documento DEVE possuir conteúdo!");
                } 
        
                
            });
        </script>
          
        
           
@endsection
