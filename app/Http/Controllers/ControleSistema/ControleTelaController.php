<?php

namespace App\Http\Controllers\ControleSistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;

class ControleTelaController extends Controller
{
     /*
     * $tipoElemForm = o tipo de formulario a ser criado(input, select, etc)    
     */
    public function __construct() {
       
    }
    
    public function CampoSelectGliphycon($label,$valorCampo,$tipoCampo,$valorSelect,$requerido,$tamanhoColuna){
        $gliph = "";
        $required = "";
        
        $util = new \app\Util\Util(); 
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        if($requerido == "SIM"){
            $required = "required";
        }

        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>                   
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <select name='".$valorCampo."' id='".$valorCampo."' class='form-control' "
                                    . "placeholder='Por favor, informe a(o) ".$label." correta.' data-error='' ".$required.">
                                    ".$valorSelect."  
                        </select>
                         <div class='help-block with-errors'></div>
                    </div>
                </div>    ";
    }
    
    /* */
    public function CampoSelectGliphyconV2($label,$valorCampo,$valorSelect,$requerido,$tamanhoColuna){
        
        $required = "";
        
        $util = new \app\Util\Util(); 
              
        if($requerido == "SIM"){
            $required = "required";
        }

        return "<div class='col-lg-".$tamanhoColuna."' style='visibility:hidden'> 
                    <div class='form-group'>                  
                         
                        <select name='".$valorCampo."' id='".$valorCampo."' class='form-control' "
                                    . "placeholder='Por favor, informe a(o) ".$label." correta.' data-error='' ".$required.">
                                    ".$valorSelect."  
                        </select>
                         <div class='help-block with-errors'></div>
                    </div>
                </div>    ";
    }
    
    public function CampoSelectFunctionGliphycon($label,$valorCampo,$tipoCampo,$valorSelect,$requerido,$function,$tamanhoColuna){
        $gliph = "";
        $required = "";
        
        $util = new \App\Util\Util(); 
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        if($requerido == "SIM"){
            $required = "required";
        }

        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>                   
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <select name='".$valorCampo."' id='".$valorCampo."' class='form-control' "
                                    . "placeholder='Por favor, informe a(o) ".$label." correta.' data-error='' ".$required." ".$function.">
                                    ".$valorSelect."  
                        </select>
                         <div class='help-block with-errors'></div>
                    </div>
                </div>    ";
        
       
    }
    
    public function CampoSelectReadonlyGliphycon($label,$valorCampo,$tipoCampo,$valorSelect,$requerido,$tamanhoColuna){
        $gliph = "";
        $required = "";
        
        $util = new \app\Util\Util(); 
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        if($requerido == "SIM"){
            $required = "required";
        }

        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>                   
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <select name='".$valorCampo."' readonly id='".$valorCampo."' class='form-control' "
                                    . "placeholder='Por favor, informe a(o) ".$label." correta.' data-error='' ".$required.">
                                    ".$valorSelect."  
                        </select>
                         <div class='help-block with-errors'></div>
                    </div>
                </div>    ";
    }
      
    
    public function CampoTextAreaGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo,$tamanhoColuna){
        
        $gliph = "";
        $util = new \app\Util\Util(); 
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        return "<div class='col-lg-".$tamanhoColuna."'> <div class='form-group'>
                    ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                    <textarea name='".$nomeCampo."' id='".$nomeCampo."' rows='10' class='form-control' placeholder='or favor, informe a(o) ".$label." correta.' onKeyPress = javascript:seguranca('".$nomeCampo."') type='text'
                      data-error=''>".$valorCampo." </textarea>
                    <div class='help-block with-errors'></div>
                </div></div>";
       
    }
    
    public function montarFormulario($label,$nomeCampo,$placeHolder,$msgError,$valorCampo,$valorSelect,$tipoElemForm,$tamanhoColuna){
       
        
        //CHAMADA CONTROLE DE CONSTRUCAO DE COMPONENTES
        
        //INPUT COM VALIDACAO
        if($tipoElemForm == "input"){
            
            return "<div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$placeHolder."' type='text' 
                          data-error='".$msgError."' required value='".$valorCampo."'>
                        <div class='help-block with-errors'></div>
                    </div>";
        } 
        
        //INPUT SEM VALIDACAO. PARA O DETALHAR.
        if($tipoElemForm == "input1"){ 
         
            return "<div class='form-group'>
                       <label for='inputEmail' class='control-label'>".$label."</label>
                        <input type='text' name='".$nomeCampo."' id='".$nomeCampo."' readonly class='form-control' value='".$valorCampo."'>
                    </div>";
        }
                
        if($tipoElemForm == "select1"){
            
            return "<div class='col-lg-".$tamanhoColuna."'> 
                        <div class='form-group'>                   
                            <label for='inputEmail' class='control-label'>".$label."</label>
                            <select name='".$nomeCampo."' id='".$nomeCampo."' class='form-control' "
                                        . "placeholder='".$placeHolder."' data-error='".$msgError."' required>
                                        ".$valorSelect."  
                            </select>
                             <div class='help-block with-errors'></div>
                        </div>
                    </div>    ";
        }
        
        
        if($tipoElemForm == "textarea"){
         
            return "<div class='col-lg-".$tamanhoColuna."'> <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <textarea name='".$nomeCampo."' id='".$nomeCampo."' rows='10' class='form-control' placeholder='".$placeHolder."' type='text'
                          data-error='".$msgError."'>".$valorCampo." </textarea>
                        <div class='help-block with-errors'></div>
                    </div></div>";
        }    
        
        //SEM VALIDACAO. 
        if($tipoElemForm == "textarea1"){
         
            return " <div class='form-group'>
                       <label for='inputEmail' class='control-label'>".$label."</label>:
                        <textarea name='descricao' rows='10' readonly class='form-control'>".$valorCampo."</textarea>
                    </div>";
       }
       
       if($tipoElemForm == "textarea2"){
           return "<div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>:
                        <div id='summernote' ><p>".$valorCampo."</p></div>
                             <script>
                                    $(document).ready(function() {
                                     $('#summernote').summernote({
                                      height: 300,                 // set editor height
                                      minHeight: null,             // set minimum height of editor
                                      maxHeight: null,             // set maximum height of editor
                                      focus: true                  // set focus to editable area after initializing summernote
                                    });
                                  });
                              </script>
                                              </div>    ";
                    }
                    
        if($tipoElemForm == "textarea3"){
            return " <div class='form-group' id='termoUsoTex' style='display:none;'>
                       <label for='inputEmail' class='control-label'>".$label."</label>:
                        <textarea name='termo' id='termo' rows='10' readonly class='form-control'>".$valorCampo."</textarea>
                    </div>";
        }            
       
       //SEM VALIDACAO. 
        if($tipoElemForm == "hidden"){
            
            return  "<div class='form-group'>                        
                <input type='hidden' name='".$nomeCampo."' id='".$nomeCampo."' value='".$valorCampo."'>
            </div>";
        }
        
        if($tipoElemForm == "header"){
            
            return "<div class='row'>
                        <div class='col-lg-12'>
                            <h1 class='page-header'>".$label."
                                <small></small>
                            </h1>                           
                        </div>
                    </div>";
        }
        
        if($tipoElemForm == "file"){            
           
             return "<div class='col-lg-".$tamanhoColuna."'> <div class='form-group'>
                       <b>".$label."</b>:
                         <input type='file' name='".$nomeCampo."' id='".$nomeCampo."'  class='form-control' required>"
                     . "</div>";            
        }
        
        //FILE PARA IMAGEM. CADASTRAR E EDITAR
        if($tipoElemForm == "fileImg"){
            return "<div class='form-group'>
                                <center>
                                    <label for='inputEmail' class='control-label'>".$label."</label>:<p>

                                    <img id='thumb' src='' width='450' alt='' /><p><P><P>
                                    <input type='file' name='".$nomeCampo."' onchange='readURL(this);' >

                                    <script>
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                            $('#thumb')
                                                                    .attr('src', e.target.result)
                                                                    .width(450)
                                                                    .height(400);
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>
                                </center>		
                            </div>";
        }
        //FILE PARA IMAGEM. DETALHAR
        if($tipoElemForm == "fileImg2"){
             return "<img src='".$valorCampo."' width='450'>"; 
        }
        
        if($tipoElemForm == "submit"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success'>"
                    . "  <a href='javascript:history.go(-1);' class='btn btn-primary'>Voltar</a> </p>"
                    . "</div>";
            
        }
        
        if($tipoElemForm == "submit2"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success'>  "
                    . $this -> MontaBotaoFechar()
                    . "</div>";
            
        }
        
        //UTILIZA CAPTURA DE IMAGEM
        if($tipoElemForm == "submit3"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success' onClick='capturarImagem()'>"
                    . "  <a href='javascript:history.go(-1);' class='btn btn-primary'>Voltar</a> </p>"
                    . "</div>";
            
        }
        
        //UTILIZA CAPTURA DE IMAGEM
        if($tipoElemForm == "submit3.1"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success' onClick='capturarImagem()'>"
                    . "  " . $this -> MontaBotaoVoltar(). "  "
                    . $this -> MontaBotaoFechar()
                    . "</div>";
            
        }
        
        if($tipoElemForm == "submit4"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success'>  "
                    . $this -> MontaBotaoVoltar(). "  "
                    . $this -> MontaBotaoFechar()
                    . "</div>";
            
        }
        if($tipoElemForm == "submit5"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<label for='inputEmail' class='control-label'>&nbsp;</label>"
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success'>  "
                    . $this -> MontaBotaoVoltar()
                    . "</div>";
            
        }
        
        if($tipoElemForm == "submit6"){
            
            return   "<input type='submit' name='enviar' value='".$label."' class='btn btn-success'>"
                    . "  <a href='javascript:history.go(-1);' class='btn btn-primary'>Voltar</a>";
            
        }
        
         if($tipoElemForm == "voltar"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<a href='javascript:history.go(-1);' class='btn btn-primary'>".$label."</a>"
                    . "</div> ";
            
        }
        
        
        //RESPOSTA DA SOLICITAÃ‡ÃƒO
        if($tipoElemForm == "resposta"){
            
            return  "<div class='media'>
                    <a class='pull-left' href='#'>
                        <img class='media-object' src='{{asset(}}' alt=''>
                    </a>
                    <div class='media-body'>
                        <h4 class='media-heading'>Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        ".$valorCampo."
                    </div>
                    </div>";
        }
    }
    
    
    
    
    
    
    /**
     * Objetivo: Melhorar o Controle e a Classe para criar, automaticamente, os elementos da tela.
     * 
     * Nova Proposta: Cada elemento deve ter seu construtor individual.
     *  
     * 
     */
    
    public function CampoFonte($label,$tamanhoColuna){
        
         return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>                       
                      <input type='text' readonly class='form-control' value='".$label."'>
                    </div>
                </div>    ";
    }
    
    public function CampoInputReadonly($label,$valorCampo,$tamanhoColuna){
        
         return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input type='text' readonly class='form-control' value='".$valorCampo."'>
                    </div>
                </div>    ";
    }
    
    public function CampoLabel($label,$tamanhoColuna){
        
         return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>                       
                    </div>
                </div>    ";
         /*return "<div class='form-group row'>
                        <label for='inputName' class='col-sm-2 col-form-label'>".$label."</label>
                        <div class='col-sm-10'>
                          <input type='email' class='form-control' id='".$label."' name='".$label."' value='".$valorCampo."' placeholder='Name'>
                        </div>
                      </div>";*/
    }
    
     public function CampoLabelV2($label,$tamanhoColuna){
        
         return "<div class='col-lg-".$tamanhoColuna."'> 
                    
                    <P>&nbsp;<P>
                    
                        <p align='left'><label for='inputEmail' class='control-label'>".$label."</label>  </p>                     
                    
                </div>    ";
         /*return "<div class='form-group row'>
                        <label for='inputName' class='col-sm-2 col-form-label'>".$label."</label>
                        <div class='col-sm-10'>
                          <input type='email' class='form-control' id='".$label."' name='".$label."' value='".$valorCampo."' placeholder='Name'>
                        </div>
                      </div>";*/
    }
    
    
    public function CampoVazio($tamanhoColuna){
        
         return "<div class='col-lg-".$tamanhoColuna."'>                     
                        <div class='form-group'>
                            
                        </div>                        
                </div>    ";
    }
    
    public function CampoInputReadonlyGliphycon($label,$valorCampo,$tipoCampo,$tamanhoColuna){
        $gliph = "";
        $util = new \App\Util\Util(); 
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <input type='text' readonly class='form-control' value='".$valorCampo."'>
                    </div>
                </div>    ";
    }
    
    public function CampoInputReadonlyGliphyconV2($label,$valorCampo,$nomeCampo,$tipoCampo,$tamanhoColuna){
        $gliph = "";
        $util = new \App\Util\Util(); 
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <input type='text' id='".$nomeCampo."' name='".$nomeCampo."' readonly class='form-control' value='".$valorCampo."'>
                    </div>
                </div>    ";
    }
    
    public function CampoImageReadonly($imagem,$tamanhoColuna,$tamanhoIMG){
        
         return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group' align='center'>  
                        
                        <img id='thumb' src='".asset($imagem)."' height='".$tamanhoIMG."' alt=''>                                
                            
                    </div>
                </div>";
    }
    
    
    public function CampoInputValidacao($label,$nomeCampo,$valorCampo){         
            
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        return "<div class='form-group'>
                    <label for='inputEmail' class='control-label'>".$label."</label>
                    <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                      data-error='".$msgPadrao."' required value='".$valorCampo."' onKeyPress = javascript:seguranca('".$nomeCampo."')>
                    <div class='help-block with-errors'></div>
                </div>";
        
    }
     
    public function CampoInputValidacaoTamanho($label,$nomeCampo,$valorCampo,$tamanhoCampo){         
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        $fixo = "";
        $celular = "";
        if($nomeCampo == "cel"){
             $celular = "onkeydown='celular( this )' onkeyup='celular( this )'";
        }
        if($nomeCampo == "tel"){
            $fixo = "onkeydown='fixo( this )' onkeyup='fixo( this )'";
        }
        
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' required value='".$valorCampo."' ".$celular." ".$fixo." onKeyPress = javascript:seguranca('".$nomeCampo."') onblur = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputValidacaoFunctionTamanho($label,$nomeCampo,$valorCampo,$function,$tamanhoCampo){         
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        $fixo = "";
        $celular = "";
        if($nomeCampo == "cel"){
             $celular = "onkeydown='celular( this )' onkeyup='celular( this )'";
        }
        if($nomeCampo == "tel"){
            $fixo = "onkeydown='fixo( this )' onkeyup='fixo( this )'";
        }
        
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' required value='".$valorCampo."' ".$celular." ".$fixo." ".$function." onKeyPress = javascript:seguranca('".$nomeCampo."') onblur = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputValidacaoFunctionTamanhoV2($label,$nomeCampo,$valorCampo,$function,$tamanhoCampo){         
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
                
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' required value='".$valorCampo."' ".$function.">
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function  CampoInputValidacaoTamanhoGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo,$tamanhoCampo){         
        
        $util = new \app\Util\Util(); 
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        $fixo = "";
        $celular = "";
        $email = "";
        $gliph = "";
        $funcao = "";
        $mascara = "";
        
        //echo $nomeCampo . "<BR>";
        if($tipoCampo == "cel"){
            $celular = "onkeydown='celular( this )' onkeyup='celular( this )'";
        }
        
        if($tipoCampo == "tel"){
            $fixo = "onkeydown='fixo( this )' onkeyup='fixo( this )'";
        }
          
        if($tipoCampo == "data"){
             $fixo = "maxlength='10' onkeypress='mascaraData(this,'".$nomeCampo."')'";
        } 
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        if($tipoCampo == "calendar"){
           // $funcao = " Onblur=DiffData('".date("d/m/Y")."',this.value,'".$nomeCampo."') "; 
            $mascara = " onChange=mascaraData() ";
        }
        
        if($nomeCampo == "emailSIM"){
            $email = "onblur='ChecarEmail();'";
            $nomeCampo = str_replace("SIM", "", $nomeCampo);
            $nomeCampo = str_replace("NAO", "", $nomeCampo);
        }
        
        $maxlenth = $util -> MaxTamanhoCampo($tipoCampo);
        
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>                            
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' required value='".$valorCampo."' ".$celular." ".$fixo." ".$email. $mascara .$funcao."   maxlength=".$maxlenth.">
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    /***
     * CAMPO PASSWORD PARA LOGIN
     */
    public function  CampoInputPasswordValidacaoTamanhoGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo,$tamanhoCampo){         
        
        $util = new \app\Util\Util(); 
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        $fixo = "";
        $celular = "";
        $email = "";
        $gliph = "";
        $funcao = "";
        $mascara = "";        
        
        if($tipoCampo == "cel"){
            $celular = "onkeydown='celular( this )' onkeyup='celular( this )'";
        }
        
        if($tipoCampo == "tel"){
            $fixo = "onkeydown='fixo( this )' onkeyup='fixo( this )'";
        }
          
        if($tipoCampo == "data"){
             $fixo = "maxlength='10' onkeypress='mascaraData(this,'".$nomeCampo."')'";
        } 
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        if($tipoCampo == "calendar"){           
            $mascara = " onChange=mascaraData() ";
        }
        
        if($nomeCampo == "emailSIM"){
            $email = "onblur='ChecarEmail();'";
            $nomeCampo = str_replace("SIM", "", $nomeCampo);
            $nomeCampo = str_replace("NAO", "", $nomeCampo);
        }
        
        $maxlenth = $util -> MaxTamanhoCampo($tipoCampo);
        
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>                            
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='password' 
                          data-error='".$msgPadrao."' required value='".$valorCampo."' ".$celular." ".$fixo." ".$email. $mascara .$funcao."   maxlength=".$maxlenth.">
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoCheckBoxValidacaoTamanho($label,$nomeCampo,$valorCampo,$tamanhoCampo){         
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        return "<div class='col-lg-".$tamanhoCampo."' id='checkbox' > 
                    <div class='form-group'>                                           
                        ".strtoupper($valorCampo)."<input type='checkbox' value='' required id='".$nomeCampo."' name='".$nomeCampo."' class='form-control'>                                                
                        <div class='help-block with-errors'></div>
                        <label for='inputEmail' class='control-label'>".$label."</label>     
                    </div>
                </div>";
        
    }
    
    public function CampoCheckBoxTamanho($label,$nomeCampo,$valorCampo,$tamanhoCampo){         
        
        $checked = "";
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);          
            
        if($valorCampo == "S") $checked = "checked";
        
        return "<div class='col-lg-".$tamanhoCampo."' id='checkbox' > 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>                        
                        <input type='checkbox' ".$checked." value='S' id='".$nomeCampo."' name='".$nomeCampo."' class='form-control'>                                                
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoCheckBoxV2Tamanho($label,$nomeCampo,$check,$valor,$tamanhoCampo){         
        
        $checked = "";
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);          
            
        if($check == "S") $checked = "checked";
        
        return "<div class='col-lg-".$tamanhoCampo."' id='checkbox' > 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>                        
                        <input type='checkbox' ".$checked." value='".$valor."' id='".$nomeCampo."' name='".$nomeCampo."' class='form-control'>                                                
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoCheckBoxV3TamanhoReadOnly($label,$check,$tamanhoCampo){         
        
        $checked = "";
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);          
            
        if($check == "S") $checked = "checked";
        
        return "<div class='col-lg-".$tamanhoCampo."' id='checkbox' > 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>                        
                        <input type='checkbox' ".$checked." value='' disabled='disabled'  id='' name='' class='form-control'>                                                
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoRadioTamanho($label,$nomeCampo,$valorCampo,$tamanhoCampo){         
        
        $checked = "";
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);          
            
        if($valorCampo == "S") $checked = "checked";
        
        return "<div class='col-lg-".$tamanhoCampo."' id='checkbox' > 
                    <div class='form-group'>                         
                        <input type='radio' ".$checked." name='".$nomeCampo."' id='".$nomeCampo."' value='".$valorCampo."' onclick=testeAparecer('".$valorCampo."');>
                            <label for='inputEmail' class='control-label'>".$label."</label>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
   
    public function CampoInputTamanho($label,$nomeCampo,$valorCampo,$tamanhoCampo){         
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        $fixo = "";
        $celular = "";
        if($nomeCampo == "cel"){
             $celular = "onkeydown='celular( this )' onkeyup='celular( this )'";
        }
        if($nomeCampo == "tel"){
            $fixo = "onkeydown='fixo( this )' onkeyup='fixo( this )'";
        }
        
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' ".$celular." ".$fixo." onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";       
        
        
    }
    
     public function CampoInputTamanhoGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo, $tamanhoCampo){         
        
        $gliph = ""; 
         
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $util = new \app\Util\Util(); 
        
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        $fixo = "";
        $celular = "";
        $email = "";
        $funcao = "";
        $mascara = "";
        $maxlenth = 0;
        
        if($nomeCampo == "cel"){
             $celular = "onkeydown='celular( this )' onkeyup='celular( this )'";
        }
        if($nomeCampo == "tel"){
            $fixo = "onkeydown='fixo( this )' onkeyup='fixo( this )'";
        }
        
        if($nomeCampo == "email"){
            $email = "onblur='ChecarEmail();'";
        }
        
        if($tipoCampo == "calendar"){
            //$funcao = "   onblur=VerificaData(this.value,'".$nomeCampo."') "; 
            $mascara = " OnKeyUp=mascaraData(this,'".$nomeCampo."') ";
        }
        
        /**
         * classe especial para atender ao cadastro de dependente no candidato
         */
        if($tipoCampo == "dependente"){
            //$funcao = "   onblur=VerificaData(this.value,'".$nomeCampo."') "; 
            $mascara = " OnBlur=teste(this) ";
        }
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        $maxlenth = $util -> MaxTamanhoCampo($tipoCampo);
        
                
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' ".$celular." ".$fixo." ".$email. $mascara .$funcao." onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."') maxlength=".$maxlenth.">
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
        
        
    }
    
    
    public function CampoInputTamanhoGliphycon_V2($label,$nomeCampo,$valorCampo,$tipoCampo, $tamanhoCampo){         
        
        $gliph = ""; 
         
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $util = new \app\Util\Util(); 
        
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        $fixo = "";
        $celular = "";
        $email = "";
        $funcao = "";
        $mascara = "";
        $maxlenth = 0;
        
        if($nomeCampo == "cel"){
             $celular = "onkeydown='celular( this )' onkeyup='celular( this )'";
        }
        if($nomeCampo == "tel"){
            $fixo = "onkeydown='fixo( this )' onkeyup='fixo( this )'";
        }
        
        if($nomeCampo == "email"){
            $email = "onblur='ChecarEmail();'";
        }
        
        if($tipoCampo == "calendar"){
            //$funcao = "   onblur=VerificaData(this.value,'".$nomeCampo."') "; 
            $mascara = " OnKeyUp=mascaraData(this,'".$nomeCampo."') ";
        }
        
        /**
         * classe especial para atender ao cadastro de dependente no candidato
         */
        if($tipoCampo == "dependente"){
            //$funcao = "   onblur=VerificaData(this.value,'".$nomeCampo."') "; 
            $mascara = " OnBlur=teste(this) ";
        }
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
        
        $maxlenth = $util -> MaxTamanhoCampo($tipoCampo);
        
                
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' readonly class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' ".$celular." ".$fixo." ".$email. $mascara .$funcao." onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."') maxlength=".$maxlenth.">
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
        
        
    }
    
    
    public function CampoInicioPainel($label,$tamanhoCampo){
    
        return "<div class='col-lg-".$tamanhoCampo."'>
                    <div style='height: 150px;'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>
                                ".strtoupper($label)."
                            </div>
                                <div class='panel-body'>";
    }
    
    public function CampoInicioPainel2($label,$tamanhoCampo,$tipo){
    
        return "<div class='col-lg-".$tamanhoCampo."'>
                                        <div class='panel panel-".$tipo."'>
                                            <div class='panel-heading'>
                                                ".strtoupper($label)."
                                            </div>
                                                <div class='panel-body'>";
    }
    
    public function CampoFimPainel(){
    
            return  "</div>                                
                        </div>
                            </div>
                                </div>    ";
    }
    
    public function CampoInicioPainelTipo($label,$tamanhoCampo,$aparencia){
    
        return "<div class='col-lg-".$tamanhoCampo."'>
                                        <div class='panel panel-".$aparencia."'>
                                            <div class='panel-heading'>
                                                ".strtoupper($label)."
                                            </div>
                                                <div class='panel-body'>";
    }
    
    public function CampoFimPainelTipo(){
    
            return  "</div>
                                
                            </div>
                    </div>    ";
    }
    
    public function CampoInicioDIV($tamanhoCampo){
    
        return "<div class='col-lg-".$tamanhoCampo."'>";                                        
                                            
    }
    
    public function CampoFimDIV(){
    
        return  "</div>";
    }
    
    
    public function CampoInputCapctha($tamanhoCampo){        
               
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <div id='captcha'></div>
                        <input type='text' placeholder='Captcha' id='cpatchaTextBox'/>
                    </div>
                </div>";
        
    }
    
    
    /**
     * CAMPO DE DATA FORMATADA
     */
     public function CampoInputDataTamanhoGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo, $tamanhoCampo){         
        
        return  "<div class='form-group'>
                  <label>Date:</label>
                    <div class='input-group date' id='reservationdate' data-target-input='nearest'>
                        <input type='text' class='form-control datetimepicker-input' data-target='#reservationdate'/>
                        <div class='input-group-append' data-target='#reservationdate' data-toggle='datetimepicker'>
                            <div class='input-group-text'><i class='fa fa-calendar'></i></div>
                        </div>
                    </div>
                </div>";
            
     }    
    //MONTAGEM DA GRID DE PREVISÃO ORÇAMENTÁRIA
    public function MontarTelaInicioPAINELFAQ($FAQName){
        return "<div class='panel-group' id='".$FAQName."'>";
    } 
    
    public function MontarTelaCorpoPAINELFAQ($conta,$listaSubContas,$aparencia,$posicao){
        
        return "<div class='panel panel-".$aparencia."'>
                <div class='panel-heading accordion-toggle question-toggle collapsed' data-toggle='collapse' data-parent='#faqAccordion' data-target='#tabela".$posicao."'>
                     <h4 class='panel-title'>
                        <b>".$conta."</b>
                  </h4>

                </div>
                <div id='tabela".$posicao."' class='panel-collapse collapse' style='height: 0px;'>
                    <div class='panel-body'>
                         ".$listaSubContas."
                    </div>
                </div>
            </div>";
    }
    
    public function MontarTelaFimPAINELFAQ(){
        return "</div>";
    }
    
                        
    //CAMPO PARA CAPTURAR IMAGEM
     public function CampoCapturaImagem($label, $tamanhoCampo){         
               
        return "<div class='col-lg-4' id='capturar' style='display:none'> 
                            <div class='form-group'>
                                <div id='results' ></div>
                            </div>
                        </div>"
         . "<div class='col-lg-".$tamanhoCampo."' id='camera' style='display:display'> 
                    <div class='form-group'>
                    
                        <label for='inputEmail' class='control-label'></label>
                        <div id='my_photo_booth'>
                            <div id='my_camera'></div>


                            <!-- Configure a few settings and attach camera -->
                            <script language='JavaScript'>
                                    Webcam.set({
                                            // live preview size
                                            width: 300,
                                            height: 300,

                                            // device capture size
                                            dest_width: 320,
                                            dest_height: 240,

                                            // final cropped size
                                            crop_width: 320,
                                            crop_height: 240,

                                            // format and quality
                                            image_format: 'jpeg',
                                            jpeg_quality: 90,

                                            // flip horizontal (mirror mode)
                                            flip_horiz: true
                                    });
                                    Webcam.attach( '#my_camera' );
                            </script>

                            <!-- A button for taking snaps -->
                            
                                    <div id='pre_take_buttons'>
                                            <!-- This button is shown before the user takes a snapshot 
                                            <input type=button value='Tirar Foto' class='btn btn-primary' onClick='preview_snapshot()'>-->
                                    </div>
                                    <div id='post_take_buttons' style='display:none'>
                                            <!-- These buttons are shown after a snapshot is taken -->
                                            <input type=button value='&lt; Tirar Outra Foto' class='btn btn-primary' onClick='cancel_preview()'>
                                            <input type=button value='Save Photo &gt;' class='btn btn-primary' onClick='save_photo()' style='font-weight:bold;'>
                                    </div>
                                                  
                            
                        </div>
                    </div>
                </div>
                <input type='hidden' name='imagem_canvas' id='imagem_canvas' value='' onClick='CapturarImagem()'>";
        
    }
    
    public function CapturarImagemMobile(){
        
        return "<div class='area'>
		<video autoplay='true' id='webCamera'>
		</video>
		
                <input type='hidden' name='imagem_canvas' id='imagem_canvas' value=''>
		
		<img id='magemConvertida'/>
		<p id='caminhoImagem' class='caminho-imagem'><a href='' target='_blank'></a></p>
		<!--Scripts-->
		<script>
			function loadCamera() {
				//Captura elemento de vídeo
				var video = document.querySelector('#webCamera');
					//As opções abaixo são necessárias para o funcionamento correto no iOS
					video.setAttribute('autoplay', '');
					video.setAttribute('muted', '');
					video.setAttribute('playsinline', '');
					//--

				//Verifica se o navegador pode capturar mídia
				if (navigator.mediaDevices.getUserMedia) {
					navigator.mediaDevices.getUserMedia({audio: false, video: {
						//facingMode: { facingMode: 'user' }, // camera frontal (webcam)
						facingMode: { exact: 'environment' }, // camera traseira
						height: { ideal: 720 }
					}})
					.then( function(stream) {
						//Definir o elemento víde a carregar o capturado pela webcam
						video.srcObject = stream;
					})
					.catch(function(error) {
						alert('Oooopps... Falhou :(');
						console.log(error);
					});
				}
			}

			
			


			
		</script>
	</div>";
    }
    
    public function CampoSelecionaImagem()
    {
    
        return "<script>
                          function readURL(input) {
                              
                              if (input.files && input.files[0]) {
                                  var reader = new FileReader();
                                   
                                  reader.onload = function (e) {
                                       $('#thumb3')
                                          .attr('src', e.target.result)
                                          .width(280)
                                          .height(250);                                  
                                  };
                                  
                                  reader.readAsDataURL(input.files[0]);
                              }
                          }
                      </script>
                      
                      <input type='file' name='anexo1' onchange='readURL(this);' />" ;
                      
    }
    
    public function CampoSelecionaImagemV2($file,$imagem)
    {
    
        return "<img id='".$file."' src=".asset($imagem)." height='150' alt=''><p>
                    <script>
                          function readURL".$file."(input) {
                              
                              if (input.files && input.files[0]) {
                                  var reader = new FileReader();
                                   
                                  reader.onload = function (e) {
                                       $('#". $file ."')
                                          .attr('src', e.target.result)
                                          .width(250)
                                          .height(220);                                  
                                  };
                                  
                                  reader.readAsDataURL(input.files[0]);
                              }
                          }
                    </script>

                    <input type='file' name='anexo".$file."' onchange='readURL".$file."(this);' />" ;

    }

           
    
    public function CampoInputMoedaR($label,$nomeCampo,$ordem,$valorCampo,$tamanhoCampo){         
        
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
        
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);' onchange=somarValoresR(".$ordem."); onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputMoedaD($label,$nomeCampo,$ordem,$valorCampo,$tamanhoCampo){         
        
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);' onchange=somarValoresD(".$ordem."); onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputMoedaGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo,$tamanhoCampo){         
        
        $util = new \App\Util\Util(); 
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);'  onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    //CAMPOS REQUERIDOS
     public function CampoInputMoedaValidationGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo,$tamanhoCampo){         
        
        $util = new \App\Util\Util(); 
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
        
        if($tipoCampo != ""){
            $gliph = "<i class='".$util->Gliphycon($tipoCampo)."'></i>";
        }
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' required value='".$valorCampo."' onkeyup='moeda(this);'  onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputMoeda($label,$nomeCampo,$ordem,$valorCampo,$tamanhoCampo){         
        
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
        
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);' onchange='somarValores(".$ordem.");' onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputTotal($label,$nomeCampo,$ordem,$valorCampo,$tamanhoCampo){         
        
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
       // echo "nome " . substr($nomeCampo, 0, 8)."<BR>";
        if(substr($nomeCampo, 0, 8) == "valor_d_" || substr($nomeCampo, 0, 9) == "ajuste_d_") $tipo = "d";
        else $tipo = "r";
       
       // echo "TIPO " . $tipo . " Nome teste " . $nomeCampo . "<BR>";
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);' onchange=somarValorTotal(".$ordem.",'".$tipo."'); onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputAjuste($label,$nomeCampo,$ordem,$valorCampo,$tamanhoCampo){         
        
       
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
        
        if(substr($nomeCampo, 0, 9) == "ajuste_d_") $tipo = "d";
        else $tipo = "r";
       
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onchange=somarValorTotal(".$ordem.",'".$tipo."'); onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    
    public function CampoInputReadonlyTamanho($label,$nomeCampo,$valorCampo,$tamanhoCampo){         
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
    
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' readonly>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
     public function CampoOu($tamanhoCampo){         
        
          
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        
                       <center><b> OU</b></center>
                    </div>
                </div>";
        
    }
    
    public function CampoSelect($label,$nomeCampo,$placeHolder,$msgError,$valorCampo,$valorSelect,$tipoElemForm,$tamanhoColuna){
            
        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>                   
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <select name='".$nomeCampo."' id='".$nomeCampo."' class='form-control' "
                                    . "placeholder='".$placeHolder."' data-error='".$msgError."' >
                                    ".$valorSelect."  
                        </select>
                         <div class='help-block with-errors'></div>
                    </div>
                </div>    ";
        
    }
    
    public function CampoSelectFunction($label,$nomeCampo,$placeHolder,$msgError,$valorCampo,$valorSelect,$tipoElemForm,$function,$tamanhoColuna){
            
        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>                   
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <select name='".$nomeCampo."' id='".$nomeCampo."' class='form-control' "
                                    . "placeholder='".$placeHolder."' data-error='".$msgError."' ".$function." >
                                    ".$valorSelect."  
                        </select>
                         <div class='help-block with-errors'></div>
                    </div>
                </div>    ";
        
    }
    
     public function CampoSelectValidacaoFunction($label,$nomeCampo,$placeHolder,$msgError,$valorCampo,$valorSelect,$tipoElemForm,$function,$tamanhoColuna){
            
        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>                   
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <select name='".$nomeCampo."' id='".$nomeCampo."' class='form-control' "
                                    . "placeholder='".$placeHolder."' required data-error='".$msgError."' ".$function." >
                                    ".$valorSelect."  
                        </select>
                         <div class='help-block with-errors'></div>
                    </div>
                </div>    ";
        
    }
    
    public function CampoTextarea($label,$nomeCampo,$valorCampo,$tamanhoColuna){         
   
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
         
        return "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <textarea name='".$nomeCampo."' id='".$nomeCampo."' rows='10' class='form-control' placeholder='".$msgPadrao."' type='text'
                          data-error='".$msgPadrao."'>".$valorCampo." </textarea>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
    } 
    
    public function CampoTextareaReadonly($label,$valorCampo,$tamanhoColuna){         
   
        return      "<div class='col-lg-".$tamanhoColuna."'> 
                        <div class='form-group'>
                            <label for='inputEmail' class='control-label'>".$label."</label>:
                            <textarea rows='10' readonly class='form-control'>".$valorCampo."</textarea>
                        </div>
                    </div>    ";
    }
    
    public function CampoTextareaReadonlyGliphycon($label,$valorCampo,$tipoCampo,$tamanhoColuna){
        $gliph = "";
        $util = new \app\Util\Util(); 
        if($tipoCampo != ""){
            $gliph = "<i class='fa ".$util->Gliphycon($tipoCampo)."'></i>";
        }
        return      "<div class='col-lg-".$tamanhoColuna."'> 
                        <div class='form-group'>
                            ".$gliph." <label for='inputEmail' class='control-label'>".$label."</label>:
                            <textarea rows='10' readonly class='form-control' wrap='hard'>".$valorCampo."</textarea>
                        </div>
                    </div>    ";
    }
    
    
   
    
    public function CampoTextareaStyle($label,$nomeCampo,$valorCampo){ 
             
        return "<div class='form-group'>
                     <label for='inputEmail' class='control-label'>".$label."</label>:
                     <div id='summernote' ><p>".$valorCampo."</p></div>
                          <script>
                                $(document).ready(function() {
                                 $('#summernote').summernote({
                                  height: 300,                 // set editor height
                                  minHeight: null,             // set minimum height of editor
                                  maxHeight: null,             // set maximum height of editor
                                  focus: true                  // set focus to editable area after initializing summernote
                                });
                              });
                          </script>
                    </div>    ";
    }
    
    
    public function CampoHidden($nomeCampo,$valorCampo){ 
            
        return  "<div class='form-group'>                        
                    <input type='hidden' name='".$nomeCampo."' id='".$nomeCampo."' value='".$valorCampo."'>
                </div>";
    }
    
    public function CampoHeader($label){ 
    
        return "<div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>".$label."
                            <small></small>
                        </h1>                           
                    </div>
                </div>";
    }
    
    public function CampoHeaderDash($label){ 
    
        return "<div class='row'>
                    <div class='col-lg-12'>
                        <h3 class='page-header'>".$label."
                            <small></small>
                        </h3>                           
                    </div>
                </div>";
    }
    
    public function CampoLinha(){ 
    
        return "<div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>
                            <small></small>
                        </h1>                           
                    </div>
                </div>";
    }
    
    //DIVISOR DE LINHAS: INICIO
    public function CampoInicioDivisor(){ 
    
        return "<div class='row'>";
    }
    
    //DIVISOR DE LINHAS: FIM
    public function CampoFimDivisor(){ 
    
        return "</div>";
    }
    
    //
    public function CampoFileValidacao($label,$nomeCampo){ 

         return "<div class='form-group'>
                    ".$label.":
                     <input type='file' name='".$nomeCampo."' id='".$nomeCampo."'  class='form-control' required>
                 </div>";
    }
    

    public function CampoFileExibeImagem($label,$nomeCampo){ 
        
            return "<div class='form-group'>
                                <center>
                                    <label for='inputEmail' class='control-label'>".$label."</label>:<p>

                                    <img id='thumb' src='' width='450' alt='' /><p><P><P>
                                    <input type='file' name='".$nomeCampo."' onchange='readURL(this);' >

                                    <script>
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                            $('#thumb')
                                                                    .attr('src', e.target.result)
                                                                    .width(450)
                                                                    .height(400);
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>
                                </center>		
                            </div>";
    }
    
    public function CampoSelectValidacao($label,$nomeCampo,$opcoesSelect,$tamanhoCampo){
        
         //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadrao($label);
        
        return "<div class='col-lg-".$tamanhoCampo."'>
                    <div class='form-group'>                       
                    <label for='inputEmail' class='control-label'>".$label."</label>
                    <select name='".$nomeCampo."' id='".$nomeCampo."' class='form-control' "
                                . "placeholder='".$msgPadrao."' data-error='".$msgPadrao."' required>
                                ".$opcoesSelect."  
                    </select>
                     <div class='help-block with-errors'></div>
                    </div>
                </div>";
         
    }
    
    
    
    public function BotaoSubmit($label,$aparencia){ 
            
        return "<input type='submit' value='".$label."' class='btn btn-".$aparencia."'> ";
        
    }
    
    public function BotaoSubmitFuncao($label,$tamanhoColuna,$funcao){ 
                 
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success' ".$funcao.">"
                    . "  <a href='javascript:history.go(-1);' class='btn btn-primary'>Voltar</a> </p>"
                    . "</div>";
            
    }
    
    
    
    public function BotaoFuncao($label,$tamanhoColuna,$funcao){ 
                      
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<button type='button' class='btn btn-primary'  onclick=".$funcao.">".$label."</button>"
                    . "</div>";
            
    }
    
    public function BarraFuncionalidade($acao,$caminho,$funcionalidade){
        
         return "<div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>".$acao." ".$funcionalidade." 
                            <small></small>
                        </h1>
                        <ol class='breadcrumb'>
                            <li>Home
                            </li>";
                            if($caminho != ""){
                                $str = $str . "<li class='active'>".$caminho." </li>";
                            }    
                            $str = $str . "<li class='active'> ".$funcionalidade."</li>
                            <li class='active'> ".$acao." ".$funcionalidade."</li>
                        </ol>
                    </div>
                </div>";
                    
    } 
    
    /*
     * 
     * 
     * CADASTRAR
     * 
     * 
     * 
     * 
     */
        
    
    public function MontarTelaNegociosCadastrar(){
              
        $data = array();                
          
        $caminho = new \App\Models\CaminhoFisico();// ORIGEM DE TODOS OS CAMINHOS   
        $controleTela = $caminho ->getCaminhoFisico("TELA");       
                
        $data["formulario"] =  $this ->CampoInputValidacaoTamanhoGliphycon("Negócio","negocio","","generico",8)
                            . $this ->CampoInputValidacaoFunctionTamanho("CNPJ", "cnpj", "", 'onblur="pesquisarCNPJ()"', 4)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("Endereço","endereco","","generico",8)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("Tel.Fixo","telfixo","","generico",4)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("Tel.Celular","telcelular","","generico",4)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("E-mail","email","","generico",8)
                            . $this -> CampoTextAreaGliphycon("Observação", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        return $data;
    }
    
    public function MontarTelaFAQCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $vagaGaragem = new \App\Classes\VagaGaragemModel();
        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FAQ","cad"));
                        
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Título","titulo","",2)
                                                        /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            . $this -> montarFormulario("Texto", "texto", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        /*
        $data["anexo"] =     $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",2)
                             . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
         */                
        
        
        return $data;
    }
    
    //VEICULO VISITANTE
     public function MontarTelaFAQ(){
              
        $data = array();
        $util = new \App\Util\Util();        
       
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        //$seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FAQ",""));
              
        
        
        return $data;
    }
    
    
    /****
     * 
     * 
     * CONSULTAR
     * 
     * 
     * 
     */
    
    public function MontarTelaNegociosConsultar($id){
             <div class="panel-heading">
                            <a href='{{route("addOf")}}'><img src='{{ asset('img/praxos/salvar.jpg') }}' width='20' title='Nova Oficina' border=0></a> Novo Negócio
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Conversão</th>
                                            <th>Negócio</th>
                                            <th>CNPJ</th>
                                            <th>Status</th>
                                            <!--<th>Excluir</th>-->
                                            <th>Detalhar</th>
                                        </tr>    
                                    </thead>
                                    <tbody>
                                       
                                    @if(isset($listaOficina))
                                        @foreach($listaOficina as $item)
                                                <tr class='odd gradeX'>
                                                    <td width='50'>{{ $item->CmpDataInclusao }}</td>
                                                    <td width='380'>{{ $item->CmpOficina }}</td> 
                                                    <td width='200'>{{ $item->CmpCnpj }}</td>
                                                    <td width='80'>{{ $item->CmpStatus }}</td> 
                                                    
                                                    <td align='center' width='50'><a href='{{route("detNeg",$item->idoficina)}}' ><img src='{{ asset('img/praxos/visualizar.png') }}'  width=15></a></td>
                                                </tr> 
                                       @endforeach
                                    @endif 
                                    </tbody>
                                </table>
                                 
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
    
    }
    /**
     * DETALHAR
     * @return string
     * 
     * 
     */
    
    public function MontarTelaNegociosDetalhar($id){
     
        $data = array();                
               
        $caminho = new \App\Models\CaminhoFisico();// ORIGEM DE TODOS OS CAMINHOS   
        $controleTela = $caminho ->getCaminhoFisico("TELA");   
        $negocio = $caminho ->getCaminhoFisico("OFIMODEL");       
       
       echo  $listaNegocios = $negocio ->ConsultarNegocio($id);
        
        foreach($listaAvisoMudanca as $item){
            
            if($item->CmpTipo == "E"){
                $item->CmpTipo = "Entrada";
            }else{
                $item->CmpTipo = "SAída";
            }
            
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idClassificados_decripto, "CLA"); 
            $imagem = $anexoModel -> recuperaAnexo($item->idmorador, "MOR");
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            
            $lista = $lista . $this -> CampoInicioDIV(4)
                                . "<center>"
                                .$this -> CampoHeader($item -> CmpTipo ."<br>Apto ".$item->CmpApto.", bl. ".$item-> CmpBloco)

                                . $this -> CampoImageReadonly($data["imagem"], 12)
                                . "</center>"

                                . $this -> CampoInputReadonlyGliphycon("Novo Morador",strtoupper($item -> CmpNome),"data",12)  
                                . $this -> CampoInputReadonlyGliphycon("Mudança",$util->formatarDataMysqlParaExibicao($item->CmpDataMudanca),"dependente",6)                            
                                . $this -> CampoFimDIV();       
        
        }    
       
        
        return $data;
    }
    
    
    /***
     * 
     * EDITAR
     * 
     * 
     */
    
    
    public function MontaBotaoVoltar(){
        return "<button class='btn btn-primary' value='Voltar' onClick='history.go(-1)'>Voltar</button>"; 
    }
    
    public function MontaBotaoFechar(){
        return "<button class='btn btn-primary' value='Voltar' onClick='window.close();'><font color='white'>Fechar</font></button>"; 
    }
    
    
} 
