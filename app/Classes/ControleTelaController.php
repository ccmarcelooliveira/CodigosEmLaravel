<?php

namespace App\Http\Controllers\Master\ControleSistema;

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
        
        if($tipoElemForm == "submit4"){
            
            return  "<div class='col-lg-".$tamanhoColuna."'> "
                    . "<p align=right><input type='submit' name='enviar' value='".$label."' class='btn btn-success'>  "
                    . $this -> MontaBotaoVoltar(). "  "
                    . $this -> MontaBotaoFechar()
                    . "</div>";
            
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
    
    
    
    
    /*
     * Objetivo: Montar as combos do sistema 
     * 
     */
    public function montarCombos($tipoCombo, $idObjeto){

        if($tipoCombo == "catProduto"){
            $select1 = "";
            $select2 = "";
            $select3 = "";
            
            if($idObjeto == 1) $select1 = "selected='selected'";
            if($idObjeto == 2) $select2 = "selected='selected'";
            if($idObjeto == 3) $select3 = "selected='selected'";
           
            
            return "<option value=''>                        
                    </option>
                    <option value='1' ".$select1.">
                       Produtos
                    </option>
                     <option value='2' ".$select2.">
                       ServiÃ§o
                    </option>
                    <option value='3' ".$select3.">
                       Produtos e ServiÃ§os
                    </option>";   

        }
        
        if($tipoCombo == "sigilo"){
            $select1 = "";
            $select2 = "";
            
            if($idObjeto == 1) $select1 = "selected='selected'";
            if($idObjeto == 2) $select2 = "selected='selected'";
              
            return   "<option value=''></option>
                      <option value='1' ".$select1.">Privado</option>
                      <option value='2' ".$select2.">Publico</option>"; 

        } 
        
        if($tipoCombo == "catDocumento"){
            
            $select1 = "";
            $select2 = "";
            $select3 = "";
            $select4 = "";
            $select5 = "";
            $select6 = "";
            $select7 = "";
            $select8 = "";
            $select9 = "";
            $select10 = "";
            
            if($idObjeto == 1) $select1 = "selected='selected'";
            if($idObjeto == 2) $select2 = "selected='selected'";
            if($idObjeto == 3) $select3 = "selected='selected'";
            if($idObjeto == 4) $select4 = "selected='selected'";
            if($idObjeto == 5) $select5 = "selected='selected'";
            if($idObjeto == 6) $select6 = "selected='selected'";
            if($idObjeto == 7) $select7 = "selected='selected'";
            if($idObjeto == 8) $select8 = "selected='selected'";
            if($idObjeto == 9) $select9 = "selected='selected'";
            if($idObjeto == 10) $select10 = "selected='selected'";
                   
            return "  <option value=''></option>
                      <option value='1' ".$select1.">Procedimentos</option>
                      <option value='2' ".$select2.">ATA</option>
                      <option value='3' ".$select3.">Regulamento</option>
                      <option value='4' ".$select4.">Balancete</option>
                      <option value='5' ".$select5.">Previsao Orcamentaria</option>
                      <option value='6' ".$select6.">ConvenÃ§Ã£o</option>
                      <option value='7' ".$select7.">Obra</option>
                      <option value='8' ".$select8.">Edital</option>
                      <option value='9' ".$select9.">ATA</option>
                      <option value='10' ".$select10.">Outros</option>";
                  
        }
        
        if($tipoCombo == "catNegocio"){
             return "<option value=''>                                   
                    </option>
                    <option value='1'>Venda                                   
                    </option>
                    <option value='2'>LocaÃ§Ã£o                                   
                    </option>
                    <option value='3'>Troca                                   
                    </option>
                    <option value='4'>DoaÃ§Ã£o                                   
                    </option>";
        }
        
        if($tipoCombo == "catSolicitacao"){
             return "<option value=''>                        
                    </option>
                    <option value='1'>
                       Conserto/Reparo
                    </option>
                    <option value='2'>
                       Troca/Subistituição
                    </option>
                    "; 
        }
        
        if($tipoCombo == "catVeiculo"){
             return "<option value=''>                        
                    </option>
                    <option value='1'>
                       Automóvel
                    </option>
                    <option value='2'>
                       Moto
                    </option>
                    <option value='3'>
                       Bicicleta
                    </option>
                    "; 
        }
        
        
        
    }
    
    public function MontarCombosSexo($idSexo){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
        switch ($idSexo) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Macho</option>";
            $tipo2 = "<option value='2' ".$select2.">Fêmea</option>";
            

        return $tipo0.$tipo1.$tipo2;    
    }
    
    
    
    
    public function MontarCombosTipoVeiculo($idTipoVeiculo){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
        switch ($idTipoVeiculo) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Automóvel</option>";
            $tipo2 = "<option value='2' ".$select2.">Moto</option>";
            $tipo3 = "<option value='3' ".$select3.">Bicicleta</option>";

        return $tipo0.$tipo1.$tipo2.$tipo3;    
    }
    
    public function MontarCombosEstadoCivil($idEstadoCivil){
 
        //echo "EST ".$idEstadoCivil ."<BR>";
        //echo $idEstadoCivil;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        
        switch ($idEstadoCivil) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">SOLTEIRO</option>";
            $tipo2 = "<option value='2' ".$select2.">CASADO</option>";
            $tipo3 = "<option value='3' ".$select3.">DIVORCIADO</option>";
            $tipo4 = "<option value='4' ".$select4.">VIÚVO</option>";
           

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4;    
    }
    
    //
    public function MontarCombosSituacaoJuridica($idSituacaoJuridica){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
        switch ($idSituacaoJuridica) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Normal</option>";
            $tipo2 = "<option value='2' ".$select2.">Leilão</option>";
            $tipo3 = "<option value='3' ".$select3.">Ação Judicial</option>";
            
           

        return $tipo0.$tipo1.$tipo2.$tipo3;    
    }
    
    public function MontarCombosPessoa($idPessoa){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
        switch ($idPessoa) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Física</option>";
            $tipo2 = "<option value='2' ".$select2.">Jurídica</option>";
            

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosSIM_NAO($id){
 
        if($id == "") $id = "N";
        
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
        switch ($id) {
            case "S":
                $select1 = "selected";
                break;
            case "N":
                $select2 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='S' ".$select1.">SIM</option>";
            $tipo2 = "<option value='N' ".$select2.">NÃO</option>";
           

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosHora($hora){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        $select7 = "";
        $select8 = "";
        $select9 = "";
        $select10 = "";
        $select11 = "";
        $select12 = "";
        $select13 = "";
        $select14 = "";
        $select15 = "";
        $select16 = "";
        $select17 = "";
        $select18 = "";
        $select19 = "";
        $select20 = "";
        $select21 = "";
        $select22 = "";
        $select23 = "";
        $select24 = "";
                
        switch ($hora) {
            
            case "01:00":
                $select1 = "selected";
                break;
            case "02:00":
                $select2 = "selected";
                break;
            case "03:00":
                $select3 = "selected";
                break;
            case "04:00":
                $select4 = "selected";
                break;
            case "05:00":
                $select5 = "selected";
                break;
            case "06:00":
                $select6 = "selected";
                break;            
            case "07:00":
                $select7 = "selected";
                break;            
            case "08:00":
                $select8 = "selected";
                break;
            case "09:00":
                $select9 = "selected";
                break;
            case "10:00":
                $select10 = "selected";
                break;
            case "11:00":
                $select11 = "selected";
                break;
            case "12:00":
                $select12 = "selected";
                break;
            case "13:00":
                $select13 = "selected";
                break;
            case "14:00":
                $select14 = "selected";
                break;
            case "15:00":
                $select15 = "selected";
                break;
            case "16:00":
                $select16 = "selected";
                break;
            case "17:00":
                $select17 = "selected";
                break;
            case "18:00":
                $select18 = "selected";
                break;
            case "19:00":
                $select19 = "selected";
                break;
            case "20:00":
                $select20 = "selected";
                break;
            case "21:00":
                $select21 = "selected";
                break;
            case "22:00":
                $select22 = "selected";
                break;
            case "23:00":
                $select23 = "selected";
                break;
            case "24:00":
                $select24 = "selected";
                break;
        }
            $tipo = "<option value=''></option>";
            
            $tipo1 = "<option value='01:00' ".$select1.">01:00</option>";
            $tipo2 = "<option value='02:00' ".$select2.">02:00</option>";
            $tipo3 = "<option value='03:00' ".$select3.">03:00</option>";
            $tipo4 = "<option value='04:00' ".$select4.">04:00</option>";
            $tipo5 = "<option value='05:00' ".$select5.">05:00</option>";
            $tipo6 = "<option value='06:00' ".$select6.">06:00</option>";
            $tipo7 = "<option value='07:00' ".$select7.">07:00</option>";
            $tipo8 = "<option value='08:00' ".$select8.">08:00</option>";
            $tipo9 = "<option value='09:00' ".$select9.">09:00</option>";
            $tipo10 = "<option value='10:00' ".$select10.">10:00</option>";
            $tipo11 = "<option value='11:00' ".$select11.">11:00</option>";
            $tipo12 = "<option value='12:00' ".$select12.">12:00</option>";
            $tipo13 = "<option value='13:00' ".$select13.">13:00</option>";
            $tipo14 = "<option value='14:00' ".$select14.">14:00</option>";
            $tipo15 = "<option value='15:00' ".$select15.">15:00</option>";
            $tipo16 = "<option value='16:00' ".$select16.">16:00</option>";
            $tipo17 = "<option value='17:00' ".$select17.">17:00</option>";
            $tipo18 = "<option value='18:00' ".$select18.">18:00</option>";
            $tipo19 = "<option value='19:00' ".$select19.">19:00</option>";
            $tipo20 = "<option value='20:00' ".$select20.">20:00</option>";
            $tipo21 = "<option value='21:00' ".$select21.">21:00</option>";
            $tipo22 = "<option value='22:00' ".$select22.">22:00</option>";
            $tipo23 = "<option value='23:00' ".$select23.">23:00</option>";
            $tipo24 = "<option value='24:00' ".$select24.">24:00</option>";
           

        return $tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9.$tipo10.$tipo11.$tipo12.$tipo13.$tipo14.$tipo15.$tipo16.$tipo17.$tipo18.$tipo19.$tipo20.$tipo21.$tipo22.$tipo23.$tipo24;    
    }
    
    
    public function MontarCombosNumeros($id){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        $select7 = "";
        $select8 = "";
        $select9 = "";
        $select10 = "";
        
        switch ($id) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
            case 8:
                $select8 = "selected";
                break;
            case 9:
                $select9 = "selected";
                break;
            case 10:
                $select10 = "selected";;
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">1</option>";
            $tipo2 = "<option value='2' ".$select2.">2</option>";
            $tipo3 = "<option value='3' ".$select3.">3</option>";
            $tipo4 = "<option value='4' ".$select4.">4</option>";
            $tipo5 = "<option value='5' ".$select5.">5</option>";
            $tipo6 = "<option value='6' ".$select6.">6</option>";
            $tipo7 = "<option value='7' ".$select7.">7</option>";
            $tipo8 = "<option value='8' ".$select8.">8</option>";
            $tipo9 = "<option value='9' ".$select9.">9</option>";
            $tipo10 = "<option value='10' ".$select10.">10</option>";
           

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9.$tipo10;    
    }
    
     public function MontarCombosEscolaridade($id){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
        switch ($id) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
             case 3:
                $select3 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">FUNDAMENTAL</option>";
            $tipo2 = "<option value='2' ".$select2.">MÉDIO</option>";
            $tipo3 = "<option value='3' ".$select3.">SUPERIOR</option>";
           

            /*
             * (1, '1º grau completo (ensino fundamental)', 'ATV'),
(2, '2º grau incompleto (ensino médio)', 'ATV'),
(3, 'Superior Incompleto', 'ATV'),
(4, 'Pós-Graduação/Especialização', 'ATV'),
(5, 'Mestrado', 'ATV'),
(6, 'Doutorado', 'ATV'),
(7, 'Pós-Doutorado', 'ATV'),
(8, '2º grau completo', 'ATV'),
(9, '1º grau incompleto', 'ATV');
             */
        return $tipo0.$tipo1.$tipo2.$tipo3;    
    }
    
    public function MontarCombosDepreciacao($idDepreciacao){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        
        switch ($idDepreciacao) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Edificação</option>";
            $tipo2 = "<option value='2' ".$select2.">Máquinas e Equipamentos</option>";
            $tipo3 = "<option value='3' ".$select3.">Instalações</option>";
            $tipo4 = "<option value='4' ".$select4.">Móveis e Utensílios</option>";
            $tipo5 = "<option value='5' ".$select5.">Veículos</option>";
            $tipo6 = "<option value='6' ".$select6.">Computadores e Periféricos</option>";
           

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6;  
       
    }
    
    public function MontarCombosParentesco($idParentesco){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        $select7 = "";
        $select8 = "";
        $select9 = "";
        
        switch ($idParentesco) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
            case 8:
                $select8 = "selected";
                break;
            case 9:
                $select9 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">MARIDO</option>";
            $tipo2 = "<option value='2' ".$select2.">ESPOSA</option>";
            $tipo3 = "<option value='3' ".$select3.">MÃE</option>";
            $tipo4 = "<option value='4' ".$select4.">PAI</option>";
            $tipo5 = "<option value='5' ".$select5.">FILHO/FILHA</option>";
            $tipo6 = "<option value='6' ".$select6.">AVÔ/AVÓ</option>";
            $tipo7 = "<option value='7' ".$select7.">TIO/TIA</option>";
            $tipo8 = "<option value='8' ".$select8.">NETO/NETA</option>";
            $tipo9 = "<option value='9' ".$select9.">OUTROS</option>";
            
           

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9;  
       
    }
    
    public function MontarCombosCategoriaBem($id){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        
        
        switch ($id) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">PERMANTENTE</option>";
            $tipo2 = "<option value='2' ".$select2.">CONSUMO</option>";
           
           

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosTipoNegocio($idClassificados){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        
        
        switch ($idClassificados) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select2 = "selected";
                break;
            case 4:
                $select2 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Aluguel</option>";
            $tipo2 = "<option value='2' ".$select2.">Troca</option>";
            $tipo3 = "<option value='3' ".$select2.">Venda</option>";
            $tipo4 = "<option value='4' ".$select2.">Doação</option>";
           
           

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4;    
    }
    
    public function MontarCombosSolicitacao($idSolicitacao){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        
        
        switch ($idSolicitacao) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select2 = "selected";
                break;
            case 4:
                $select2 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Reparo</option>";
            $tipo2 = "<option value='2' ".$select2.">Troca</option>";
            $tipo3 = "<option value='3' ".$select2.">Venda</option>";
            $tipo4 = "<option value='4' ".$select2.">Doação</option>";
           
           

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4;    
    }
    
    public function MontarCombosSolucao($idSolucao){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        $select7 = "";
        
        
        switch ($idSolucao) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;  
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
        }
            $tipo0 = "<option value=''></option>";
            
            $tipo1 = "<option value='1' ".$select1.">Cancelar</option>";
            $tipo6 = "<option value='6' ".$select6.">Atendimento Direto</option>";
            //$tipo2 = "<option value='2' ".$select2.">Contrato</option>";
            //$tipo3 = "<option value='3' ".$select3.">Orçamento</option>";
            $tipo4 = "<option value='4' ".$select4.">Pedido de Serviço</option>";            
            
            //$tipo7 = "<option value='7' ".$select7.">Orçamento</option>";
                      

        return $tipo0.$tipo6.$tipo1.$tipo4;    
    }
    
    public function MontarCombosCategoriaEntrega($idCategoriaEntrega){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5= "";
        
        switch ($idCategoriaEntrega) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break; 
            case 3:
                $select3 = "selected";
                break; 
            case 4:
                $select4 = "selected";
                break; 
            case 5:
                $select5 = "selected";
                break; 
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Correspondência(A.R.)</option>";
            $tipo2 = "<option value='2' ".$select2.">Pacote</option>";
            $tipo3 = "<option value='3' ".$select3.">Caixa</option>";
            $tipo4 = "<option value='4' ".$select4.">Envelope</option>";
            
                      

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4;    
    }
    
    public function MontarCombosCategoriaConta($idCategoriaConta){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        
        
        switch ($idCategoriaConta) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='R' ".$select1.">Receita</option>";
            $tipo2 = "<option value='D' ".$select2.">Despesa</option>";
                      

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosAno($idAno){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        
        
        switch ($idAno) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;            
        }
            $tipo0 = "<option value=''></option>";
            //$tipo1 = "<option value='2018' ".$select1.">2018</option>";
            //$tipo2 = "<option value='2019' ".$select2.">2019</option>";
            $tipo3 = "<option value='2020' ".$select2.">2020</option>";
            $tipo4 = "<option value='2021' ".$select2.">2021</option>";
                      

        return $tipo0.$tipo3.$tipo4;    
    }
    
    public function MontarCombosAno3($ano){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        
        //echo "ttt ". $ano;
        switch ($ano) {
            case 2019:
                //echo "dentro";
                $select1 = "selected";
                break;
            case "2020":
                $select2 = "selected";
                break;
            case "2021":
                $select3 = "selected";
                break;
            case "2022":
                $select4 = "selected";
                break;            
        }
            $tipo0 = "<option value=''></option>";
            //$tipo1 = "<option value='2018' ".$select1.">2018</option>";
            $tipo2 = "<option value='2019' ".$select1.">2019</option>";
            $tipo3 = "<option value='2020' ".$select2.">2020</option>";
            $tipo4 = "<option value='2021' ".$select3.">2021</option>";
                      

        return $tipo0.$tipo2.$tipo3.$tipo4;    
    }
    
    
     public function MontarCombosAno2(){
        
        $ano = new \App\Classes\AnoModel();
        $AnoAtual = $ano -> ConsultaAno();
       
        $tipo0 = "<option value=''></option>";
        //$tipo1 = "<option value='2018' ".$select1.">2018</option>";
        $tipo2 = "<option value='2019' >2019</option>";
        $tipo3 = "<option value='2020' >2020</option>";
        $tipo4 = "<option value='2021' >2021</option>";
        $tipo5 = "<option value='2022' >2022</option>";
        $tipo6 = "<option value='2023' >2023</option>";
        $tipo7 = "<option value='2024' >2024</option>";
        
        /*$tipo7 = "<option value='2024' >2021</option>";
        $tipo8 = "<option value='2025' >2021</option>";
        $tipo9 = "<option value='2026' >2021</option>";
        $tipo10 = "<option value='2027' >2021</option>";
        $tipo11 = "<option value='2028' >2021</option>";
        $tipo12 = "<option value='2029' >2021</option>";*/

        $lista = "";
        switch ($AnoAtual) {
            case 2019:
                $lista = $tipo0.$tipo3.$tipo4.$tipo5.$tipo6;
                break;
            case 2020:
                $lista = $tipo0.$tipo4.$tipo5.$tipo6;
                break;
            case 2021:
                $lista = $tipo0.$tipo5.$tipo6;
                break;
            case 2022:
                $lista = $tipo0.$tipo6;
                break;
            case 2023:
               $lista = $tipo0.$tipo7;
               break;
            default:
                $lista = $tipo0.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6;
                break;
                
           
           
        }
        return $lista;    
    }
    
    public function MontarCombosAno5(){
        
        $util = new \App\Util\Util();
        
        $ano = new \App\Classes\AnoModel();
        $AnoAtual = $ano -> ConsultaAno();
       
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        $select7 = "";
        
        $tipo0 = "<option value=''></option>";
        //$tipo1 = "<option value='2018' ".$select1.">2018</option>";
        
        $tipo2 = $util -> MontarCombo($AnoAtual,"2019");
        $tipo3 = $util -> MontarCombo($AnoAtual,"2020");
        $tipo4 = $util -> MontarCombo($AnoAtual,"2021");
        $tipo5 = $util -> MontarCombo($AnoAtual,"2022");
        $tipo6 = $util -> MontarCombo($AnoAtual,"2023");
        $tipo7 = $util -> MontarCombo($AnoAtual,"2024");
        

        $lista = "";
        switch ($AnoAtual) {
            case 2019:                
                $lista = $tipo0.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6;                
                break;
            case 2020:                
                $lista = $tipo0.$tipo3.$tipo4.$tipo5.$tipo6;
                break;
            case 2021:                
                $lista = $tipo0.$tipo4.$tipo5.$tipo6;                
                break;
            case 2022:                
                $lista = $tipo0.$tipo5.$tipo6;                
                break;
            case 2023:               
                $lista = $tipo0.$tipo6.$tipo7;
                break;
            default:
                $lista = $tipo0.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6;
                break;
                
           
           echo $lista;
        }
        return $lista;    
    }
    
    
    public function MontarCombosFormaPagto($idFormaPagto){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
                
        switch ($idFormaPagto) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select2 = "selected";
                break;            
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">À VISTA</option>";
        $tipo2 = "<option value='2' ".$select2.">À PRAZO</option>";
        $tipo2 = "<option value='3' ".$select2.">CHEQUE</option>";                      

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosConsumo($idConsumo){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
                
        switch ($idConsumo) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break; 
            case 4:
                $select3 = "selected";
                break; 
            case 5:
                $select3 = "selected";
                break; 
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">ÁGUA</option>";
        $tipo2 = "<option value='2' ".$select2.">Luz</option>";
        $tipo3 = "<option value='3' ".$select3.">GÁS</option>";     
        $tipo4 = "<option value='3' ".$select3.">TELEFONE</option>";     
        $tipo5 = "<option value='3' ".$select3.">DIVERSOS</option>";     

        return $tipo0.$tipo1.$tipo2.$tipo3;    
    }
    
    public function MontarCombosEnquadramento($idEnquadramento){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
                
        switch ($idFormaPagto) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;            
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">Edificação</option>";
        $tipo2 = "<option value='2' ".$select2.">Máquinas e Equipamentos</option>";
        $tipo3 = "<option value='3' ".$select3.">Instalações</option>";
        $tipo4 = "<option value='4' ".$select4.">Móveis e Utensílios</option>";
        $tipo5 = "<option value='5' ".$select5.">Veículos</option>";
        $tipo6 = "<option value='6' ".$select6.">Computadores e Periféricos</option>";
                      

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6;    
    }
    
    public function MontarCombosMotivoAluguelSalaoFestas($idMotivo){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
                
        switch ($idMotivo) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;            
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">Aniversário</option>";
        $tipo2 = "<option value='2' ".$select2.">Batizado</option>";
        $tipo3 = "<option value='3' ".$select3.">Casamento</option>";
        $tipo4 = "<option value='4' ".$select4.">Confraternização</option>";
        $tipo5 = "<option value='5' ".$select5.">Chá de Bebê</option>";
        $tipo6 = "<option value='6' ".$select6.">Chá de Panela</option>";
                      

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6;    
    }
    
    public function MontarCombosAprovacao($idAprovado){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        
        //echo $idAprovado;
        switch ($idAprovado) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
                      
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">SIM</option>";
        $tipo2 = "<option value='2' ".$select2.">NÃO</option>";
        
                      

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosTurno($idTurno){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        
       // echo $idAprovado;
        switch ($idTurno) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
                      
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">Manhã</option>";
        $tipo2 = "<option value='2' ".$select2.">Noite</option>";
        
                      

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosAutorizado($idAutorizado){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        
        switch ($idAutorizado) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
                      
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">Autorizado</option>";
        $tipo2 = "<option value='2' ".$select2.">Não Autorizado</option>";
        
                      

        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function MontarCombosTipoOcorrencia($idOcorrencia){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
         
        switch ($idOcorrencia) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            
                      
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">Falta</option>";
        $tipo2 = "<option value='2' ".$select2.">Férias</option>";        
        $tipo3 = "<option value='3' ".$select3.">Folga</option>";        
                
        

        return $tipo0.$tipo1.$tipo2.$tipo3;    
    }
    
    public function MontarCombosMotivoOcorrencia($idMotivo){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        $select7 = "";
        $select8 = "";
        $select9 = "";
        $select10 = "";
        $select11 = "";
        
         
        switch ($idMotivo) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
            case 8:
                $select8 = "selected";
                break;
            case 9:
                $select9 = "selected";
                break;
            case 10:
                $select10 = "selected";
                break;
            case 11:
                $select11 = "selected";
                break;
            
                      
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">".strtoupper("Acidente")."</option>";
        $tipo2 = "<option value='2' ".$select2.">".strtoupper("Doença")."</option>";        
        $tipo3 = "<option value='3' ".$select3.">".strtoupper("Casamento")."</option>"; 
        $tipo4 = "<option value='4' ".$select4.">".strtoupper("Falecimento de cônjuge ou outro familiar direto")."</option>";
        $tipo5 = "<option value='5' ".$select5.">".strtoupper("Prestação de prova em estabelecimento de ensino")."</option>";
        $tipo6 = "<option value='6' ".$select6.">".strtoupper("Assistência a filho")." </option>";
        $tipo7 = "<option value='7' ".$select7.">".strtoupper("Assistência a neto")."  </option>";
        $tipo8 = "<option value='8' ".$select8.">".strtoupper("Assistência a membro do agregado familiar")."  </option>";
        $tipo9 = "<option value='9' ".$select9.">".strtoupper("Representação coletiva de trabalhadores")."  </option>";
        $tipo10 = "<option value='10' ".$select10.">".strtoupper("Candidato a um cargo público")."  </option>";
        $tipo11 = "<option value='11' ".$select11.">".strtoupper("Definidas pelo empregador ")." </option>";
                
        

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9.$tipo10.$tipo11;    
    }
    
     public function RetornMotivoOcorrencia($idMotivo){
     
         
        switch ($idMotivo) {
            case 1:
                return "Acidente";
                break;
            case 2:
                return "Doença";
                break;
            case 3:
                return "Casamento";
                break;
            case 4:
                return "Falecimento de cônjuge ou outro familiar direto";
                break;
            case 5:
                return "Prestação de prova em estabelecimento de ensino";
                break;
            case 6:
                return "Assistência a filho";
                break;
            case 7:
                return "Assistência a neto";
                break;
            case 8:
                return "Assistência a membro do agregado familiar";
                break;
            case 9:
                return "Representação coletiva de trabalhadores";
                break;
            case 10:
                return "Candidato a um cargo público";
                break;
            case 11:
                return "Definidas pelo empregador";
                break;
            
                      
        }
          
    }
    
    public function MontarCombosTipoFalta($idtipo){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        
         
        switch ($idtipo) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">".strtoupper("Justificada")."</option>";
        $tipo2 = "<option value='2' ".$select2.">".strtoupper("Injustificada")."</option>";        
       
        return $tipo0.$tipo1.$tipo2;    
    }
    
    public function RetornaTipoFalta($idtipo){
 
            
         
        switch ($idtipo) {
            case 1:
                return "Justificada";
                break;
            case 2:
                return "Injustificada";
                break;
            
        }        
   
    }
    
    public function MontarCombosTipoLicenca($idtipo){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = "";
        $select5 = "";
        $select6 = "";
        $select7 = "";
        $select8 = "";
         
        switch ($idtipo) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select8 = "selected";
                break;
            
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">Licença Maternidade</option>";
        $tipo2 = "<option value='2' ".$select2.">Licença Paternidade</option>";
        $tipo3 = "<option value='3' ".$select3.">Licença Não Remunerada</option>";
        $tipo4 = "<option value='4' ".$select4.">Licença Médica</option>"; 
        $tipo5 = "<option value='5' ".$select5.">Casamento</option>"; 
        $tipo6 = "<option value='6' ".$select6.">Serviço Militar Obrigatório</option>"; 
        $tipo7 = "<option value='7' ".$select7.">Óbito</option>"; 
        $tipo8 = "<option value='8' ".$select8.">Outros</option>"; 
       
        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8;    
    }
    
    public function RetornaTipoLicenca($idtipo){
       
        switch ($idtipo) {
            case 1:
                return "Licença Maternidade";
                break;
            case 2:
                return "Licença Paternidade";
                break;
            case 3:
                return "Licença Não Remunerada";
                break;
            case 4:
                return "Casamento";
                break;            
            case 5:
                return "Óbito";
                break;
            case 6:
                return "Outros";
                break;
        }
       
    }
    
     public function MontarCombosMeses($idMes){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = ""; 
        $select5 = "";
        $select6 = "";
        $select7 = "";
        $select8 = "";
        $select9 = "";
        $select10 = "";
        $select11 = "";
        $select12 = "";
         
        switch ($idMes) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
            case 8:
                $select8 = "selected";
                break;
            case 9:
                $select9 = "selected";
                break;
            case 10:
                $select10 = "selected";
                break;
            case 11:
                $select11 = "selected";
                break;
            case 12:
                $select12 = "selected";
                break;
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='01' ".$select1.">Janeiro</option>";
        $tipo2 = "<option value='02' ".$select2.">Fevereiro</option>";        
        $tipo3 = "<option value='03' ".$select3.">Março</option>";
        $tipo4 = "<option value='04' ".$select4.">Abril</option>";
        $tipo5 = "<option value='05' ".$select5.">Maio</option>";
        $tipo6 = "<option value='06' ".$select6.">Junho</option>";
        $tipo7 = "<option value='07' ".$select7.">Julho</option>";
        $tipo8 = "<option value='08' ".$select8.">Agosto</option>";
        $tipo9 = "<option value='09' ".$select9.">Setembro</option>";
        $tipo10 = "<option value='10' ".$select10.">Outubro</option>";
        $tipo11 = "<option value='11' ".$select11.">Novembro</option>";
        $tipo12 = "<option value='12' ".$select12.">Dezembro</option>";
        

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9.$tipo10.$tipo11.$tipo12;    
    }
    
    
    public function MontarCombosParcelas($idParcelas){
 
        //echo $idTipoVeiculo;
        $select1 = "";
        $select2 = "";
        $select3 = "";
        $select4 = ""; 
        $select5 = "";
        $select6 = "";
        $select7 = "";
        $select8 = "";
        $select9 = "";
        $select10 = "";
        $select11 = "";
        $select12 = "";
         
        switch ($idParcelas) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
            case 8:
                $select8 = "selected";
                break;
            case 9:
                $select9 = "selected";
                break;
            case 10:
                $select10 = "selected";
                break;
            case 11:
                $select11 = "selected";
                break;
            case 12:
                $select12 = "selected";
                break;
        }
        
        $tipo0 = "<option value=''></option>";
        $tipo1 = "<option value='1' ".$select1.">1</option>";
        $tipo2 = "<option value='2' ".$select2.">2</option>";        
        $tipo3 = "<option value='3' ".$select3.">3</option>";
        $tipo4 = "<option value='4' ".$select4.">4</option>";
        $tipo5 = "<option value='5' ".$select5.">5</option>";
        $tipo6 = "<option value='6' ".$select6.">6</option>";
        $tipo7 = "<option value='7' ".$select7.">7</option>";
        $tipo8 = "<option value='8' ".$select8.">8</option>";
        $tipo9 = "<option value='9' ".$select9.">9</option>";
        $tipo10 = "<option value='10' ".$select10.">10</option>";
        $tipo11 = "<option value='11' ".$select11.">11</option>";
        $tipo12 = "<option value='12' ".$select12.">12</option>";
        

        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9.$tipo10.$tipo11.$tipo12;    
    }
    
    /*public function MontarCombosFornecedor($idFornecedor){
 
        $select = "";
        
        $vagaGaragem = new \App\Classes\VagaGaragemModel();
        $lista = $vagaGaragem ->consultarVagaGaragem();
        $listaRetorno = "";  
       
            foreach($lista as $item){
                if($item -> idvaga_garagem == $idVagaGaragem){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idvaga_garagem.">".
                       $item -> CmpApto . "-".$item -> CmpBloco
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    */
    public function MontarCombosVagaGaragem($idVagaGaragem){
 
        $select = "";
        
        $vagaGaragem = new \App\Classes\VagaGaragemModel();
        $lista = $vagaGaragem ->consultarVagaGaragem();
        $listaRetorno = "";  
       
            foreach($lista as $item){
                if($item -> idvaga_garagem == $idVagaGaragem){
                    $select = "selected";
                }
               
                $listaRetorno = $listaRetorno . " <option value=".$item->idvaga_garagem.">".
                       $item -> CmpApto . "-".$item -> CmpBloco 
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    
    /**
     * COMBO PARA CATEGORIA DE DOCUMENTO
     * DT: 21MAR2019
     */
    
    public function MontarCombosCategoriaDocumento(){
 
        $select = "";
        
        $categoriaDocumento = new \App\Classes\CategoriaDocumentoModel();
        $lista = $categoriaDocumento ->ConsultaCategoriaDocumento();
        $listaRetorno = "";  
       
        foreach($lista as $item){
            

            $listaRetorno = $listaRetorno . " <option value=".$item->idcategoria_documentos.">".
                   $item -> CmpDescricao
                . "</option>";

            $select = "";
        }

        return $listaRetorno; 
       
    }
    
    /* public function MontarCombosTipoReforma($idTipoReforma){
 
        $select = "";
        
        $tipoReforma = new \App\Classes\TipoReformaModel();
        $lista = $tipoReforma ->consultarTipoReformaPorId($idTipoReforma);
        $listaRetorno = "";  
       
            foreach($lista as $item){
                if($item -> idtipo_reforma_apartamento == $idTipoReforma){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idtipo_reforma_apartamento.">".
                       $item -> CmpDescricao
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }*/
    
    
     public function MontarCombosTipoReforma($idTipoReforma){
 
        $select = "";
        
        $tipoReforma = new \App\Classes\TipoReformaModel();
        $lista = $tipoReforma -> consultarTipoReforma();
        
        $listaRetorno = "";  
       
            foreach($lista as $item){
                if($item -> idtipo_reforma_apartamentos == $idTipoReforma){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idtipo_reforma_apartamentos.">".
                       $item -> CmpDescricao
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosFornecedor($idFornecedor){
 
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFornecedor_decripto = $seguranca -> decripto($idFornecedor);
        //echo $idFornecedor;
        $select = "";
        
        $fornecedor = new \App\Classes\FornecedorModel();
        $lista = $fornecedor ->ConsultaFornecedor($seguranca->cripto($idFornecedor));
        
        $listaRetorno = "";  
       
            $listaRetorno = $listaRetorno . " <option value=''></option>";
                
            foreach($lista as $item){
                
                if($item -> idfornecedores == $idFornecedor_decripto){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idfornecedores.">".
                       strtoupper($item -> CmpRazaoSocial)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosBem($idBem){
 
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idBem_decripto = $seguranca -> decripto($idBem);
        
        $select = "";
        
        $bem = new \App\Classes\BemModel();
        $lista = $bem ->ConsultaBem($seguranca->cripto(0));
        
        $listaRetorno = "";  
       
            $listaRetorno = $listaRetorno . " <option value=''></option>";
                
            foreach($lista as $item){
                
                if($item -> idbens == $idBem_decripto){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idbens.">".
                       $item -> CmpNome
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosContas($idPlanoContas,$idTipoConta){
 
        $select = "";
        
        $planoModel = new \App\Classes\PlanoContasModel();
        $lista = $planoModel -> ConsultaPlanoContasPorTipo($idTipoConta);
        
        $listaRetorno = "<option value=''></option>";  
       
            foreach($lista as $item){
                if($item -> idplano_contas == $idPlanoContas){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idplano_contas.">".
                       strtoupper($item -> CmpConta)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosFabricante($idFabricante){
 
        $select = "";
        
        $fabricanteModel = new \App\Classes\FabricanteCarroModel();
        $lista = $fabricanteModel -> ConsultaFabricanteCarro($idFabricante);
        
        $listaRetorno = "<option value=''></option>";  
       
            foreach($lista as $item){
                if($item -> idfabricante_auto == $idFabricante){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idfabricante_auto.">".
                       strtoupper($item -> CmpFabricante)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosSubContas($idPlanoContas,$idPlanoSubContas){
 
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                
        $select = "";
        
        $planoSubModel = new \App\Classes\PlanoSubContasModel();
        $lista = $planoSubModel -> ConsultaPlanoSubContas($seguranca -> cripto($idPlanoContas), $seguranca -> cripto($idPlanoSubContas));
        
        $listaRetorno = "";  
       
            foreach($lista as $item){
                if($item -> idplano_sub_contas == $idPlanoSubContas){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idplano_sub_contas." ".$select.">".
                       $item -> CmpNomeSubConta
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    
    
    public function MontarCombosAreaComum($idAreaComum,$disponibilidadeReserva){
 
        $select = "";
        
         //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAreaComum_decripto = $seguranca -> decripto($idAreaComum);
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $areaComum = new \App\Classes\AreaComumModel();        
        
        $lista = $areaComum -> ConsultaAreaComum($idAreaComum, $seguranca -> cripto($disponibilidadeReserva));
        
        $listaRetorno = "";  
       
            $listaRetorno = $listaRetorno . " <option value=''></option>";
                
            foreach($lista as $item){
                if($item -> idarea_comum == $idAreaComum_decripto){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idarea_comum.">".
                       strtoupper($item -> CmpAreaComum)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosInfraEstrutura(){
 
        $select = "";
        
         //GRADE DE SEGURANCA
       /* $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAreaComum_decripto = $seguranca -> decripto($idAreaComum);
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();*/
        
        $infra = new \App\Classes\InfraEstruturaModel();       
        
        $lista = $infra -> ConsultaInfraEstrutura();
        
        $listaRetorno = "";  
       
            $listaRetorno = $listaRetorno . " <option value=''></option>";
                
            foreach($lista as $item){
                
                for($i=1;$i<=$item->CmpNumAndares;$i++){
                    
                    /*if($item -> idarea_comum == $idAreaComum_decripto){
                        $select = "selected";
                    }*/

                    $listaRetorno = $listaRetorno . " <option ".$select." value=".$i.">".
                           $i
                        . "</option>";

                    $select = "";
                }    
            }

            return $listaRetorno; 
       
    }
    
    /* COMBO RAMAL*/
    public function MontarCombosPlanos($idPlano){
 
        $select = "";
        
        $planoModel = new \App\Classes\PlanoModel();                
        $lista = $planoModel -> ConsultaPlano();
        $listaRetorno = "";  
       
        foreach($lista as $item){
            
            if($item -> idplano == $idPlano){
                $select = "selected";
            }

            $listaRetorno = $listaRetorno . "<option value=".$item -> idplano." ".$select.">".
                   $item -> CmpDescricao 
                . "</option>";

            $select = "";
        }

        
        return $listaRetorno; 
       
    }
    
    /* COMBO RAMAL */
    public function MontarCombosRamal($idRamal){
 
        $select = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                
        $vagaGaragem = new \App\Classes\RamalModel();                
        $lista = $vagaGaragem -> consultaRamal($seguranca->cripto(0));
        $listaRetorno = "";  
       
        foreach($lista as $item){
            
            if($item -> idramal == $idRamal){
                $select = "selected";
            }

            $listaRetorno = $listaRetorno . " <option value=".$item -> idramal.">".
                   $item -> CmpRamal 
                . "</option>";

            $select = "";
        }

        return $listaRetorno; 
       
    }
    
    
    
    //COMBO APARTAMENTO
    public function MontarCombosApartamento($idApartamento){
 
        $select = ""; 
        $apartamento = new \App\Classes\ApartamentoModel();
        $lista = $apartamento ->consultarApartamento();
        
        $listaRetorno = "<option></option>";  
       
        foreach($lista as $item){
            
            //echo $item -> idapartamento . "-". $idApartamento;
            if($item -> idapartamento == $idApartamento){
                 $select = "selected";
            }

            $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idapartamento." >".
                   $item -> CmpApto . "-".$item -> CmpBloco
                . "</option>";

            $select = "";
        }

        return $listaRetorno; 
       
    }
    
     //COMBO APARTAMENTO
    public function MontarCombosBlocoApartamento($idBloco){
 
        $select = ""; 
        $apartamento = new \App\Classes\ApartamentoModel();
        $lista = $apartamento -> ConsultarBlocos();
        
        $listaRetorno = " <option value='' ></option>";  
       
        foreach($lista as $item){
           
            if($item -> CmpBloco == $idBloco){
                 $select = "selected";
            }

            $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->CmpBloco." >".
                  $item -> CmpBloco
                . "</option>";

            $select = "";
        }

        return $listaRetorno; 
       
    }
    
    public function MontarCombosCartaoEstacionamento($idCartao){
 
        $select = "";
        
        $vagaGaragem = new \App\Classes\VagaGaragemModel();
        $lista = $vagaGaragem ->consultarVagaGaragem();
        
        $cartao = new \App\Classes\CartaoEstacionamentoModel();
        $lista = $cartao ->ConsultaCartaoEstacionamento(Auth::user()->condominio_idcondominio);
 
              $listaRetorno = "";  
       // if($tipoCombo == "catVagaGaragem"){

            foreach($lista as $item){
                if($item->idcartao == $idCartao){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idcartao." ".$select.">".
                       $item -> CmpDescricao
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       // }
    }
    
    public function MontarCombosFuncionario($idFuncionario){
 
        $select = "";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        //echo $idFuncionario;
        $idFuncionario_decripto = $seguranca->decripto($idFuncionario);
        
        //echo "tetete ". $idFuncionario;
        $funcionario = new \App\Classes\FuncionarioModel();
        $lista = $funcionario -> ConsultaFuncionario($seguranca->cripto(0));
 
        $listaRetorno = " <option value=''</option>";  
       
        foreach($lista as $item){
            if($item->idfuncionarios == $idFuncionario_decripto){
                $select = "selected";
            }

            $listaRetorno = $listaRetorno . " <option value=".$item->idfuncionarios." ".$select.">".
                   strtoupper($item -> CmpNome)
                . "</option>";

            $select = "";
        }

            return $listaRetorno; 
       // }
    }
    
    
    public function MontarCombosNaturalidade($idNaturalidade, $idNacionalidade){
 
        $select = "";
        
        $naturalidade = new \App\Classes\Naturalidade();
        $lista = $naturalidade -> consultarNaturalidade("", $idNacionalidade);
        $listaRetorno = "";  
       
            foreach($lista as $item){
                if($item -> idnaturalidade == $idNaturalidade){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idnaturalidade.">".
                       strtoupper($item -> CmpDescricao . " - " . $item -> CmpSigla)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    
    public function MontarCombosFuncao($idFuncao){
 
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $select = "";
        $teste = $seguranca->decripto($idFuncao);
        
        $funcao = new \App\Classes\FuncaoModel();
        $lista = $funcao -> ConsultaFuncao($seguranca->cripto(0));
        
        $listaRetorno = "<option value=''></option>";  
       
            foreach($lista as $item){
                if($item -> idfuncao == $teste){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idfuncao." ".$select.">".
                       strtoupper($item -> CmpDescricao) 
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    //PARA O CASO DE CADASTRAR TRABALHO/TURNO. NÃO DEVE HAVER REPETIÇÃO
    public function MontarCombosFuncao2($idFuncao){
 
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $select = "";
        $teste = $seguranca->decripto($idFuncao);
        
        $funcao = new \App\Classes\FuncaoModel();
        $lista = $funcao -> ConsultaFuncao2();
        
        $listaRetorno = "<option value=''></option>";  
       
            foreach($lista as $item){
                if($item -> idfuncao_condominios == $teste){
                    $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idfuncao_condominios." ".$select.">".
                       strtoupper($item -> CmpDescricao) 
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosUnidadeFederal(){
 
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $select = "";
        
        $uf = new \App\Classes\UnidadeFederacaoModel();
        $lista = $uf ->GetListaUnidadeFederacao();
        $listaRetorno = "";  
       
            foreach($lista as $item){
                
                
                $listaRetorno = $listaRetorno . " <option value=".$item->idunidade_federacao.">".
                       $item -> CmpDescricao 
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    public function MontarCombosUnidadeFederacao($idUF){
 
        //echo "EST ".$idEstadoCivil ."<BR>";
        //echo $idEstadoCivil;
        $select1 = $select2 = $select3 = $select4 = $select5 = $select6 = $select7 = $select8 = $select9 = $select10 = $select11 = $select12 = $select13 = $select14 = $select15 = $select16 = $select17 = $select18 = $select19 = $select20 = $select21 = $select22 = $select23 = $select24 = $select25 = $select26 = "";
        
        switch ($idUF) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
            case 8:
                $select8 = "selected";
                break;
            case 9:
                $select9 = "selected";
                break;
            case 10:
                $select10 = "selected";
                break;
            case 11:
                $select11 = "selected";
                break;
            case 12:
                $select12 = "selected";
                break;
            case 13:
                $select13 = "selected";
                break;
            case 14:
                $select14 = "selected";
                break;
            case 15:
                $select15 = "selected";
                break;
            case 16:
                $select16 = "selected";
                break;
            case 17:
                $select17 = "selected";
                break;
            case 18:
                $select18 = "selected";
                break;
            case 19:
                $select19 = "selected";
                break;
            case 20:
                $select21 = "selected";
                break;
            case 22:
                $select22 = "selected";
                break;
            case 23:
                $select23 = "selected";
                break;
            case 24:
                $select24 = "selected";
                break;
            case 25:
                $select25 = "selected";
                break;
            case 26:
                $select26 = "selected";
                break;
            case 27:
                $select27 = "selected";
                break;
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">Alagoas</option>";
            $tipo2 = "<option value='2' ".$select2.">Amazonas</option>";
            $tipo3 = "<option value='3' ".$select3.">Amapá</option>";
            $tipo4 = "<option value='4' ".$select4.">Bahia</option>";
            
            $tipo5 = "<option value='5' ".$select5.">Ceará</option>";
            $tipo6 = "<option value='6' ".$select6.">Distrito Federal</option>";
            $tipo7 = "<option value='7' ".$select7.">Espírito Santo</option>";
            $tipo8 = "<option value='8' ".$select8.">Goiás</option>";
            $tipo9 = "<option value='9' ".$select9.">Maranhão</option>";
            $tipo10 = "<option value='10' ".$select10.">Minas Gerais </option>";
            $tipo11 = "<option value='11' ".$select11.">Mato Grosso do Sul </option>";
            $tipo12 = "<option value='12' ".$select12.">Mato Grosso </option>";
            $tipo13 = "<option value='13' ".$select13.">Pará </option>";  
            $tipo14 = "<option value='14' ".$select14.">Paraíba </option>";
            $tipo15 = "<option value='15' ".$select15.">Pernambuco </option>";
            $tipo16 = "<option value='16' ".$select16.">Piauí </option>";
            $tipo17 = "<option value='17' ".$select17.">Paraná </option>";
            $tipo18 = "<option value='18' ".$select18.">Rio de Janeiro </option>";
            $tipo19 = "<option value='19' ".$select19.">Rio Grande do Norte </option>";
            $tipo20 = "<option value='20' ".$select20.">Rondônia </option>";
            $tipo21 = "<option value='21' ".$select21.">Roraima </option>";
            $tipo22 = "<option value='22' ".$select22.">Rio Grande do Sul  </option>";
            $tipo23 = "<option value='23' ".$select23.">Santa Catarina </option>";
            $tipo24 = "<option value='24' ".$select24.">Sergipe </option>";
            $tipo25 = "<option value='25' ".$select25.">São Paulo </option>";
            $tipo26 = "<option value='26' ".$select26.">Tocantins </option>";
           
            
        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9.$tipo10.$tipo11.$tipo12.$tipo13.$tipo14.$tipo15.$tipo16.$tipo17.$tipo18.$tipo19.$tipo20.$tipo21.$tipo22.$tipo23.$tipo24.$tipo25.$tipo26;
    }
    
    /**
     * 
     * @param type $idNacionalidade
     * @return stringFUNÇÃO PARA DEVOLVER CORE CARRO
     */
  
     public function MontarCombosCoresCarro($idcor){
 
        //echo "EST ".$idEstadoCivil ."<BR>";
        //echo $idEstadoCivil;
        $select1 = $select2 = $select3 = $select4 = $select5 = $select6 = $select7 = $select8 = $select9 = $select10 = $select11 = $select12 = $select13 = $select14 = $select15 = $select16 = "";
        
        switch ($idcor) {
            case 1:
                $select1 = "selected";
                break;
            case 2:
                $select2 = "selected";
                break;
            case 3:
                $select3 = "selected";
                break;
            case 4:
                $select4 = "selected";
                break;
            case 5:
                $select5 = "selected";
                break;
            case 6:
                $select6 = "selected";
                break;
            case 7:
                $select7 = "selected";
                break;
            case 8:
                $select8 = "selected";
                break;
            case 9:
                $select9 = "selected";
                break;
            case 10:
                $select10 = "selected";
                break;
            case 11:
                $select11 = "selected";
                break;
            case 12:
                $select12 = "selected";
                break;
            case 13:
                $select13 = "selected";
                break;
            case 14:
                $select14 = "selected";
                break;
            case 15:
                $select15 = "selected";
                break;
            case 16:
                $select16 = "selected";
                break;
            
            
        }
            $tipo0 = "<option value=''></option>";
            $tipo1 = "<option value='1' ".$select1.">AMARELO</option>";
            $tipo2 = "<option value='2' ".$select2.">AZUL</option>";
            $tipo3 = "<option value='3' ".$select3.">BEGE</option>";
            $tipo4 = "<option value='4' ".$select4.">BRANCA</option>";
            
            $tipo5 = "<option value='5' ".$select5.">CINZA</option>";
            $tipo6 = "<option value='6' ".$select6.">DOURADA</option>";
            $tipo16 = "<option value='16' ".$select16.">FANTASIA </option>";
            $tipo7 = "<option value='7' ".$select7.">GRENÁ</option>";
            $tipo8 = "<option value='8' ".$select8.">LARANJA</option>";
            $tipo9 = "<option value='9' ".$select9.">MARRON</option>";
            $tipo10 = "<option value='10' ".$select10.">PRATA</option>";
            $tipo11 = "<option value='11' ".$select11.">PRETA</option>";
            $tipo12 = "<option value='12' ".$select12.">ROSA </option>";
            $tipo13 = "<option value='13' ".$select13.">ROXA </option>";  
            $tipo14 = "<option value='14' ".$select14.">VERDE </option>";
            $tipo15 = "<option value='15' ".$select15.">VERMELHA </option>";
            
            
            
        return $tipo0.$tipo1.$tipo2.$tipo3.$tipo4.$tipo5.$tipo6.$tipo7.$tipo8.$tipo9.$tipo10.$tipo11.$tipo12.$tipo13.$tipo14.$tipo15.$tipo16;
    }
    
    public function MontarCombosNacionalidade($idNacionalidade){
 
        //echo "naci " . $idNacionalidade;
        $select = "";
        
        $naturalidade = new \App\Classes\Nacionalidade();
        $lista = $naturalidade -> ConsultarNacionalidade(""); //busca todos os registros
        $listaRetorno = "<option value=''></option>";  
       
            foreach($lista as $item){
                if($item -> idnacionalidade == $idNacionalidade){
                   $select = "selected";
                }
                
                $listaRetorno = $listaRetorno . " <option ".$select." value=".$item->idnacionalidade.">".
                       strtoupper($item -> CmpDescricao)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    
    
    /***
     * 05/12/2020
     * COMBO PARA COPIAR TEXTO E ID NO MESMO VALOR.
     */
    public function MontarComboListarBloco($idCondominio){
 
        //echo "naci " . $idNacionalidade;
        $select = "";
        
        $apartamento = new \App\Classes\ApartamentoModel();
        $lista = $apartamento -> consultarBlocoApartamento($idCondominio);
        $listaRetorno = "<option value=''></option>";  
       
            foreach($lista as $item){
                               
                $listaRetorno = $listaRetorno . " <option  value=".trim($item->CmpBloco).">".
                       trim($item -> CmpBloco)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
    }
    
    /***
     * 05/12/2020
     * COMBO PARA COPIAR TEXTO E ID NO MESMO VALOR.
     */
    public function MontarComboListarApto($idCondominio){
 
        //echo "naci " . $idNacionalidade;
        $select = "";
        
        $apartamento = new \App\Classes\ApartamentoModel();
        $lista = $apartamento -> ListarApartamento($idCondominio);
        
        $listaRetorno = "<option value=''></option>";  
       
            foreach($lista as $item){
                               
                $listaRetorno = $listaRetorno . " <option  value=".trim($item->CmpApto).">".
                       trim($item -> CmpApto)
                    . "</option>";
                
                $select = "";
            }

            return $listaRetorno; 
       
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
                          data-error='".$msgPadrao."' required value='".$valorCampo."' ".$celular." ".$fixo." ".$function." onKeyPress = javascript:seguranca('".$nomeCampo."') onblur = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function  CampoInputValidacaoTamanhoGliphycon($label,$nomeCampo,$valorCampo,$tipoCampo,$tamanhoCampo){         
        
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
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);' onchange='somarValoresR(".$ordem.");' onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
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
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);' onchange='somarValoresD(".$ordem.");' onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
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
        
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onkeyup='moeda(this);' onchange='somarValorTotal(".$ordem.");' onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
                        <div class='help-block with-errors'></div>
                    </div>
                </div>";
        
    }
    
    public function CampoInputAjuste($label,$nomeCampo,$ordem,$valorCampo,$tamanhoCampo){         
        
        
        //CONTEM TODAS AS MENSAGENS DO SISTEMA.
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleMensagem();
        $msgPadrao = $controleTela -> MsgPadraoMoeda();
        
       
        return "<div class='col-lg-".$tamanhoCampo."'> 
                    <div class='form-group'>
                        <label for='inputEmail' class='control-label'>".$label."</label>
                        <input id='".$nomeCampo."' name='".$nomeCampo."' class='form-control' placeholder='".$msgPadrao."' type='text' 
                          data-error='".$msgPadrao."' value='".$valorCampo."' onchange='somarValorTotal(".$ordem.");' onBlur = javascript:seguranca('".$nomeCampo."') onKeyPress = javascript:seguranca('".$nomeCampo."')>
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
                            <textarea rows='10' readonly class='form-control'>".$valorCampo."</textarea>
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
    
    public function ListaAnexo($listaAnexos, $tamanhoColuna) {
        
        $lista = "<div class='col-lg-".$tamanhoColuna."'> 
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        Lista de Doumentos
                                    </div>
                                <!-- /.panel-heading -->
                                <div class='panel-body'>
                                    <div class='dataTable_wrapper'>
                                        <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Descrição</th>  
                                                    <th>Detalhar</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>";
                                            
                                                    if(isset($listaAnexos)){
                                                        foreach($listaAnexos as $item){
                                                                $lista = $lista . "<tr class='odd gradeX'>
                                                                    <td width='10'>". $item -> CmpDataInclusao ."</td>
                                                                    <td>". $item -> CmpCategoriaObjeto ."</td>
                                                                         <td align='center' width='100'><a href=''>Doc</a></td>
                                                                       
                                                                </tr>";

                                                        }
                                                    }    
                                                                
                                            $lista = $lista . "</tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>";
            
                return $lista;
        
    }
    
     //public function montarFormulario($label,$nomeCampo,$placeHolder,$msgError,$valorCampo,$valorSelect,$tipoElemForm){
   
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarBem(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("BEM","con"));
        
        $bem = new \App\Classes\BemModel();
        $listaBem = $bem->ConsultaBem($seguranca->cripto(0));

        foreach($listaBem as $item){
          $item->idbens = $seguranca->cripto($item->idbens);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          $item->CmpValorAquisicao = "R$ ". $util->FormatNumber($item->CmpValorAquisicao);  
          
            switch ($item->CmpEnquadramento) {
                case 1:
                    $retorno = "Edificação";
                    break;
                case 2:
                    $retorno = "Máquinas e Equipamentos";
                    break;
                case 3:
                    $retorno = "Instalações";
                    break;
                case 4:
                    $retorno = "Móveis e Utensílios";
                    break;
                case 5:
                    $retorno = "Veículos";
                    break;
                case 6:
                    $retorno = "Computadores e Periféricos";
                    break;
                                
            }
            
            $item->CmpEnquadramento = $util -> Enquadramento($item->CmpEnquadramento);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_bem"] = $listaBem; 
       
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaCadastrarPainelControle(){
     
        $data = array(); 
        $parametros = array(); 
        
        $util = new \App\Util\Util();      
     
        $data["formulario"] = "";
        $lista = "";        
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PAI",""));
        
        $limite = new \App\Classes\LimitesDashboardModel();
        $listaLimites = $limite -> consultarLimitesDashboard();

        foreach($listaLimites as $item){
           
                $parametros = $util -> ParametrosControleAcessoApresentacao($item->CmpTipoObjeto, "");
                
                $lista =  $lista . "<div class='col-lg-6'>
                                        <div class='panel panel-green'>
                                            <div class='panel-heading'>
                                                ".$this -> CampoHeaderDash($parametros["categoria_objeto"])."
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this -> CampoInputValidacaoTamanhoGliphycon("Limite Inferior","limInf".$item->CmpTipoObjeto,$item->CmpLimiteInferior,"",3)
                                                        . $this -> CampoInputValidacaoTamanhoGliphycon("Limite Superior","limSup".$item->CmpTipoObjeto, $item->CmpLimiteSuperior,"",3)
                                                        . $this -> CampoHidden("tipo", $item->CmpTipoObjeto)
                                                        . $this -> CampoHidden("id".$item->CmpTipoObjeto, $item->idlimite_dashboards)   

                                                    ."<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                </div>
                                                <div class='panel-footer'>
                                                    GS2I - Gestão Social Integrada e Inteligente
                                                </div>
                                            </div>
                                        </div>    ";
            
                            
        }
        
        $lista = $lista . $this -> CampoHeader("Turnos");
        
        $lista = $lista . $this -> CampoInputValidacaoTamanhoGliphycon("Turno","","","",3);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["formulario"] = $lista; 
       
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarVagaGaragem(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VAG","con"));
        
        $apartamento = new \App\Classes\ApartamentoModel();
        $listaVagaGaragem = $apartamento -> consultarApartamento();
       
        foreach($listaVagaGaragem as $item){
            
            $item->idapartamento= $seguranca->cripto($item->idapartamento);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
                       
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaVagaGaragem"] = $listaVagaGaragem;
       
        
        return $data;
    }
    
    /**
     * 
     * @return type
     */
    public function TelaConsultarApartamento(){
     
        $data = array();                
        $data1 = array();
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
                
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("APA","con"));
                        
        $apartamento = new \App\Classes\ApartamentoModel();
        $listaApartamento = $apartamento->consultarApartamento();

        foreach($listaApartamento as $item){
          $item->idapartamento = $seguranca->cripto($item->idapartamento);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_apartamento"] = $listaApartamento;
               
        return $data;
    }
    
    public function TelaUsuarioPainel(){
     
        $data = array();                
        $util = new \App\Util\Util();      
        $lista = "";
        $anexo = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("USP","con"));
        
        $data["imagem"] =  "";
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "USU","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        
        $usuarioModel = new \App\Classes\UsuarioModel();
        $listaUsuario = $usuarioModel -> ConsultarUsuarioPorID(Auth::user()->idusuario);

        foreach($listaUsuario as $item){
            
            $item->idusuario = $seguranca->cripto($item->idusuario);
                  
            $lista =    $this -> CampoHeader("Dados do Usuário")
                        . $this -> CampoInputReadonly("Apelido", $item -> apelido,4)
                        . $this -> CampoInputReadonly("Data Cadastro", $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao),4)                            
                        . $this -> CampoInputReadonly("Status", $item -> CmpStatus,4)
                        . $this -> CampoInputReadonly("Usuário", $item -> usuario,12);
          
            $anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel -> recuperaAnexo($seguranca -> decripto($item->idusuario), "USU");
            if($anexo != ""){
                $data["imagem"] = $pasta.$anexo;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            
            $data["idObjeto"] = $item->idusuario;
            
            if($item->CmpStatus == "ATV") $item->CmpStatus = "ATIVADO";
        }
        
        $data["formulario"] = $lista;
        
        
        return $data;
    }
    
    public function TelaTrocarUsuarioPainel(){
     
        $data = array();                
        $util = new \App\Util\Util();      
        $lista = "";
        $anexo = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("USP","tro"));
        
        $data["imagem"] =  "";
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "USU","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        
        $usuarioModel = new \App\Classes\UsuarioModel();
        $listaUsuario = $usuarioModel -> ConsultarUsuarioPorID(Auth::user()->idusuario);

        foreach($listaUsuario as $item){
            
            $item->idusuario = $seguranca->cripto($item->idusuario);
                  
            $lista =      $this -> CampoHeader("Dados do Usuário")
                        . $this -> CampoInputReadonly("Usuário", $item->usuario,12)                            
                        . $this -> CampoInputValidacaoTamanhoGliphycon("Apelido","apelido", $item->apelido,"user",3)                            
                        . $this -> CampoInputValidacaoTamanhoGliphycon("Senha Antiga","senhaAntiga", "","user",3)
                        . $this -> CampoInputValidacaoTamanhoGliphycon("Senha Nova", "senhaNova", "","user",3)
                        . $this -> CampoInputValidacaoTamanhoGliphycon("Repetir Senha Nova", "repetirSenha", "","user",3)
                        . $this -> CampoHidden("val", $item->idusuario);
          
            $anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel -> recuperaAnexo($seguranca -> decripto($item->idusuario), "USU");
            
            if($anexo != ""){
                $data["imagem"] = $pasta.$anexo;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            
            $data["idObjeto"] = $item->idusuario;
            
        }
        
        $data["formulario"] = $lista;
        
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarPlanoContas(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLCO","con"));
        
        $planoContas = new \App\Classes\PlanoContasModel();
        $listaPlanoContas = $planoContas -> ConsultaPlanoContas($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaPlanoContas as $item){
            
            $item->idplano_contas = $seguranca->cripto($item->idplano_contas);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);

            if($item->CmpCategoriaConta == "R") $item->CmpCategoriaConta = "Receita";
            if($item->CmpCategoriaConta == "D") $item->CmpCategoriaConta = "Despesa";
         
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_plano_contas"] = $listaPlanoContas;    
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarPagamentos(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PAG","con"));
        
        $pagamentoModel = new \App\Classes\PagamentoModel();
        $listaPagamento = $pagamentoModel -> ConsultaPagamento($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaPagamento as $item){
            
            $item->idpagamento = $seguranca->cripto($item->idpagamento);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $item->CmpDataVencimento = $util->formatarDataMysqlParaExibicao($item->CmpDataVencimento);
            $item->CmpValor = $util->FormatNumber($item->CmpValor);
            if($item->CmpDataPagamento != "")
            $item->CmpDataPagamento = $util->formatarDataMysqlParaExibicao($item->CmpDataPagamento);         
            
           
            $item -> CmpStatus = $util-> StatusPagamento($item -> CmpStatus);
         
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_pagamento"] = $listaPagamento;   
       
        
        return $data;
    }
   
     
    /**
     * FUNCAO TELABALANCO PAGAMENTO CONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type 
     * @return type
     */
   
    public function TelaConsultarBalancoContas($inadimplencia,$mes_ano){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $listaDespesa = "";
        $listaReceita = "";
        
        $balancoModel = new \App\Classes\BalancoContasModel();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE      
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REL","con"));
        
        $data["consulta"] = $this->CampoInputTamanho("% Inadimplência", "inad", "",4).
                            $this -> CampoSelectGliphycon("Meses", "mes", "", $this-> MontarCombosMeses(0), "NAO",4). 
                            $this -> CampoSelectGliphycon("Anos", "ano", "", $this-> MontarCombosAno(0), "NAO",4). $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        $data["lista"] = "";
        
        if($inadimplencia > 0 && $mes_ano != ""){     
            
            $lista = $balancoModel -> ConsultaBalancoContas($inadimplencia, $mes_ano);

            foreach($lista as $item){

                if($item -> CmpCategoriaConta == "D"){

                    $listaDespesa = $this -> CampoFonte($item->CmpConta,3) . $this -> CampoFonte($item->soma,3) ;
                }
            }
        }
       
        $data["lista"] = $listaDespesa;     
       
        
        return $data;
    }
   
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarContasPagar(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CTOPAG","con"));
        
        $pagamentoModel = new \App\Classes\PagamentoModel();
        $listaPagamento = $pagamentoModel -> ConsultaPagamento($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaPagamento as $item){
             /*echo $item->CmpDataVencimento . " - " .$util -> diff($item->CmpDataVencimento,date('Y-m-d'), "d");
             
             if($item->CmpDataVencimento > date('Y-m-d')){
                 echo "A vencer<BR>";
             }else{
                 echo "vencido<BR>";
             }*/
             
            $item->idpagamento = $seguranca->cripto($item->idpagamento);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            
            if($item->CmpDataPagamento != "")  $item->CmpDataPagamento = $util->formatarDataMysqlParaExibicao($item->CmpDataPagamento);

           
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_pagamento"] = $listaPagamento;   
       
        
        return $data;
    }
    
    
    public function MontarTelaPagamentoEditar($idPagamento){
     
        $data = array();                
        $util = new \app\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $pagamento = "";
        $dataPagamento = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
       
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Evento");
         //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PAG","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "EVE", "PARCIAL");
        //$arquivo = "clientes/".$pasta."/eventos/";
        $pagamentoModel = new \App\Classes\PagamentoModel(); 
         
        $saldoModel = new \App\Classes\SaldoAtualContaModel();
        $previsaoOrcamentaria = new \App\Classes\PrevisaoOrcamentariaModel();
         
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPagamento_decripto = $seguranca->decripto($idPagamento);
         
        //FAZ A BUSCA DO DOCUMENTO
        $pagamentoControle = new \App\Classes\PagamentoModel();
        $pagamento = $pagamentoControle -> ConsultaPagamento($idPagamento);
       
        foreach($pagamento as $item){               
                        
            $selectContas = $this -> MontarCombosContas($item -> planocontas_idplanocontas,"DES");
            
            $item -> CmpDataVencimento = $util -> formatarDataMysqlParaExibicao($item ->CmpDataVencimento);
            
            $CmpMesAno = $item -> CmpMesAno;
            
            if($item ->CmpDataPagamento != ""){
                $dataPagamento =  $util -> formatarDataMysqlParaExibicao($item ->CmpDataPagamento);
            }else{
                $dataPagamento = "";
            }
             
            $data["formulario"] = $this -> CampoInputValidacaoTamanho("Vencimento","vencto",$item ->CmpDataVencimento,2)
                                
                                . $this ->CampoInputReadonly("Baixa",$dataPagamento,2)
                                . $this -> CampoInputMoedaGliphycon("Valor","valor",$util->FormatNumber($item ->CmpValor),"money",3)    
                                //. $this -> montarFormulario("Forma de Pagamento", "formPagto", "Escolha a Forma de Pagamento", "Por favor, informe a Categoria da Conta correta.","", $selectFormaPagto, "select1",3)
                                . $this -> CampoSelectFunctionGliphycon("Conta", "conta","",$selectContas,"SIM","onchange='javascript:pesquisa_sub_conta()'",5)
                                //. $this -> CampoSelectFunctionGliphycon("SubConta", "subconta","",$selectSubContas,"SIM","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)
                      
                                //. $this -> CampoInicioPainel("Informações de Consumo",12)
                                //. $this -> CampoSelectGliphycon("Tipo Consumo", "tipoConsumo", "money", $selectConsumo, "NAO",4)
                                //. $this -> CampoInputTamanhoGliphycon("Consumo Kwh ou Metro Cúbico(M3)","consumo","","money",6)
                    
                                ///. $this -> montarFormulario("Tipo Consumo", "tipoConsumo", "Escolha a Forma de Pagamento", "Por favor, informe a Categoria da Conta correta.","", $selectConsumo, "select1",4)
                                //. $this -> CampoInputValidacaoTamanho("Consumo","consumo",$item ->CmpConsumo,4)
                                //. $this -> CampoFimPainel()
                    
                                //. $this -> montarFormulario("Observação", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                                . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$item->CmpDescricao,"comentario",12)
               
                                . $this -> CampoHidden("valve", $item ->CmpDataVencimento)
                                . $this -> CampoHidden("valv", $item -> CmpValor)
                                . $this -> CampoHidden("valc", $item -> planocontas_idplanocontas)
                                //. $this -> CampoHidden("valsb", $item -> planosubcontas_idplanosubcontas)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);

         
            $vetor = explode("_",$CmpMesAno);
            
            //echo intval($vetor[0]) . "<BR>" . intval($vetor[1]);
            //$consumido = $saldoModel -> consultaSaldoTotalConta($item ->planocontas_idplanocontas, $vetor[1],$vetor[0]);
            $consumido = $pagamentoModel -> ConsultaTotalPagamentoPorConta_V2($item -> planocontas_idplanocontas, $CmpMesAno);
            //echo "<br>";  
            //PREVISAO
            $disponivel = $previsaoOrcamentaria -> ConsultaPrevisaoOrcamentariaMensal($item ->planocontas_idplanocontas, $vetor[1],$vetor[0]);
                       
            $total = $disponivel - $consumido;            
            
            //ACERTO DE ACENTO
            if($total <= 0){ //SÓ TEM CONSUMIDO
                $total = 0;                
            }
            
        }
                
        //DADOS PARA O GRÁFICO
        $data["ocorrencias"] = '{
                            label: " Disponível",
                            data: '.$total.'}, {
                            label: " Consumido",
                            data: '.$consumido.'}';
                       
        $data["idObjeto"] = $idPagamento;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarPlanoSubContas($idPlanoContas){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLSUCO","con"));
        
        $planoSubContas = new \App\Classes\PlanoSubContasModel();
        $listaPlanoSubContas = $planoSubContas -> ConsultaPlanoSubContas($idPlanoContas,$seguranca->cripto(0));

        foreach($listaPlanoSubContas as $item){
            
          $item -> idplano_sub_contas = $seguranca->cripto($item->idplano_sub_contas);
          $item -> plano_contas_idplano_contas = $seguranca->cripto($item->plano_contas_idplano_contas);
          
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          $item->CmpNomeSubConta = strtoupper($item->CmpNomeSubConta);
          if($item->CmpCategoriaConta == 1) $item->CmpCategoriaConta = "Receita";
          if($item->CmpCategoriaConta == 2) $item->CmpCategoriaConta = "Despesa";
         
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_plano_sub_contas"] = $listaPlanoSubContas;       
        $data["idObjeto"] = $idPlanoContas;
        
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();

        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarEntrega(){
     
        $data = array();                
        $util = new \App\Util\Util();      
        $idEntrega = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ENT","con"));
                
        $entrega = new \App\Classes\EntregasModel();
        if(Auth::user()->perfil_idperfil == 1){ //MORADOR            
            $listaEntrega = $entrega -> consultarEntregaApto();
            
        }else{
                       
            $listaEntrega = $entrega -> consultarEntrega($seguranca->cripto(0));
        }
        
        
        foreach($listaEntrega as $item){
            
            $item->identregas = $seguranca->cripto($item->identregas);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            
            if($item->CmpDataBaixa != "0000-00-00" && $item->CmpDataBaixa != null && $item->CmpDataBaixa != ""){
                $item->CmpDataBaixa = $util->formatarDataMysqlParaExibicao($item->CmpDataBaixa);
            }else{
                $item->CmpDataBaixa = "";
            }
            
            if($item->CmpCategoriaEntrega == 1){
                $item->CmpCategoriaEntrega = "Correspôndencia";
            }else{
                $item->CmpCategoriaEntrega = "Pacote";
            }
                       
        }        
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaEntrega"] = $listaEntrega;       
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarRelatorioInventario(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("INV","con"));
                
        $inventario = new \App\Classes\InventarioModel();
        $listaInventario = $inventario-> ConsultaInventario();

        foreach($listaInventario as $item){
            
          $item->CmpNome = $item->CmpNome;
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          
          if($item->CmpCategoria == 1) $item->CmpCategoria = "Permanente";
          if($item->CmpCategoria == 2) $item->CmpCategoria = "Consumo";
          
          if($item->CmpAreaComum == "") $item->CmpAreaComum = "Sem Local";
          
          
        }        

        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_inventario"] = $listaInventario;        
                
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarSolicitacao(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("SOL","con"));
                
        $solicitacao = new \App\Classes\SolicitacaoModel();
        $listaSolicitacao = $solicitacao->consultarSolicitacao($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaSolicitacao as $item){
                        
            $item->idsolicitacao = $seguranca->cripto($item->idsolicitacao);
            $item->dtsol = $util->formatarDataMysqlParaExibicao($item->dtsol);
            $item->CmpDataConclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataConclusao);
          
            if($item -> apartamento_idapartamento != ""){
                $item -> temp = "Apto ".$item -> CmpApto . " e Bloco ". $item -> aptoBloco;
            }
            
            if($item -> CmpBloco != "" && $item -> CmpAndar != ""){
                $item -> temp = "Bloco ".$item -> CmpBloco . " e Andar ". $item -> CmpAndar;
            }
            
            if($item -> areacomum_idareacomum != ""){
                $item -> temp = $item -> CmpAreaComum;
            }
          
            
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_solicitacao"] = $listaSolicitacao;       
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarPedidoServico(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PEDSER","con"));
                
        $pedidoServico = new \App\Classes\PedidoServicoModel();
        $listaPedidoServico = $pedidoServico -> consultarPedidoServico($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaPedidoServico as $item){
          $item->idpedido_servicos = $seguranca->cripto($item->idpedido_servicos);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          $item->CmpDataConclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataConclusao);
          
         /* if($item->CmpCategoriaSolicitacao == 1) $item->CmpCategoriaSolicitacao = "Aluguel";
          if($item->CmpCategoriaSolicitacao == 2) $item->CmpCategoriaSolicitacao = "Troca";
          if($item->CmpCategoriaSolicitacao == 3) $item->CmpCategoriaSolicitacao = "Venda";
          if($item->CmpCategoriaSolicitacao == 4) $item->CmpCategoriaSolicitacao = "Doação";*/
          
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_pedidoServico"] = $listaPedidoServico;       
        
        return $data;
    }
    
    
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarDespacho($idObjeto,$idSiglaObjeto){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao($idSiglaObjeto,"con"));
                
        $despacho = new \App\Classes\DespachoModel();
        $listaDespacho = $despacho -> ConsultarDespacho($idObjeto,$idSiglaObjeto);//ConsultaBem($seguranca->cripto(0));

        foreach($listaDespacho as $item){
          $item->iddespacho = $seguranca->cripto($item->iddespacho);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          //$item->CmpDataConclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataConclusao);
          
          /*if($item->CmpCategoriaSolicitacao == 1) $item->CmpCategoriaSolicitacao = "Aluguel";
          if($item->CmpCategoriaSolicitacao == 2) $item->CmpCategoriaSolicitacao = "Troca";
          if($item->CmpCategoriaSolicitacao == 3) $item->CmpCategoriaSolicitacao = "Venda";
          if($item->CmpCategoriaSolicitacao == 4) $item->CmpCategoriaSolicitacao = "Doação";*/
          
        }
        
        $data["idObjeto"] = $idObjeto;
        $data["idSiglaObjeto"] = $idSiglaObjeto;
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_despachos"] = $listaDespacho;       
        
        return $data;
    }
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarManutencaoProgramada(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MNTPRO","con"));
                
        $manutencaoProgramada = new \App\Classes\ManutencaoProgramadaModel();
        $listaManutencaoProgramada = $manutencaoProgramada->ConsultaManutencaoProgramada($seguranca->cripto(0));

        foreach($listaManutencaoProgramada as $item){
          $item->idmanutencao_programada = $seguranca->cripto($item->idmanutencao_programada);
          $item->CmpDataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicio);
          $item->CmpDataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFim);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_manutencao"] = $listaManutencaoProgramada;  
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarVisitante(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VIS","con"));
                
        $visitante = new \App\Classes\VisitantesModel();
        $listaVisitante = $visitante -> consultarVisitante($seguranca->cripto(0));
        
        foreach($listaVisitante as $item){
            
            $item->idvisitantes = $seguranca->cripto($item->idvisitantes);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $item-> CmpNome = strtoupper($item-> CmpNome);      
        }        
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaVisitante"] = $listaVisitante;       
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarAutorizacao(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("AUT","con"));
                
        //VEICULOS
        $autorizacao = new \App\Classes\AutorizacaoModel();
        $listaAutorizacao = $autorizacao -> ConsultaAutorizacao($seguranca->cripto(0));
        
        foreach($listaAutorizacao as $item){  
            
            $item->idvisitantes = $seguranca->cripto($item->idvisitantes);
            $item->CmpDataInicioPrevisto = $util->formatarDataMysqlParaExibicao($item->CmpDataInicioPrevisto);
            $item->CmpDataFimPrevisto = $util->formatarDataMysqlParaExibicao($item->CmpDataFimPrevisto);
            
            if($item->CmpDataChegada != "" && $item->CmpDataChegada != null && $item->CmpDataChegada != "0000-00-00"){
                $item->CmpDataChegada = $util->formatarDataMysqlParaExibicao($item->CmpDataChegada);
            }else{
                $item->CmpDataChegada = "";
            }
            
            //$item->CmpNome = strtoupper($item->CmpNome);
            //$nomeVis = strtoupper($item -> nomeVis);
            if($item->CmpEhMorador == "S"){
                $item -> nomePro = strtoupper($item -> nomePro);
            }else{
                $item -> nomeMor = strtoupper($item -> nomeMor);
            }
                    
            if($item->	CmpAutorizacao == 1) $item->CmpAutorizacao = "AUTORIZAR ENTRADA";
            if($item->	CmpAutorizacao == 2) $item->CmpAutorizacao = "NÃO AUTORIZAR ENTRADA";
            
            if($item->CmpStatus == "CHE"){
                $item->CmpStatus = "SIM";
            }
            if($item->CmpStatus == "ATV"){
                $item->CmpStatus = "NÃO";
            }
        }        
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaAutorizacao"] = $listaAutorizacao;
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ENTREGA.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaDetalharAvisoMudanca(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $lista = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE       
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("AUT","con"));
          
          //PASTA DO CONDOMINIO
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "MOR", "PARCIAL");
        
        //VEICULOS
        $avisoMudanca = new \App\Classes\AvisoMudancaModel();
        $listaAvisoMudanca = $avisoMudanca -> ConsultaAvisoMudanca();
        
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
       
        $data["aviso"] = $lista;
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarClassificados(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CLA","con"));
        
        $classificados = new \App\Classes\ClassificadosModel();
        $listaClassificados = $classificados-> consultarClassificados($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaClassificados as $item){
            
          $item->idclassificados = $seguranca->cripto($item->idclassificados);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);          
          $item->CmpCategoriaNegocio = strtoupper($util-> SituacaoClassificadoNegocio($item->CmpCategoriaNegocio));
          $item->CmpAssunto = strtoupper($item->CmpAssunto);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_classificados"] = $listaClassificados;  
        $data["usuarioSessao"] = Auth::user()->usuario_idusuario;
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    /*public function TelaConsultarVagaGaragem(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VAG","con"));
        
       //VEICULOS
        $apartamento = new \App\Classes\ApartamentoModel();
        $listaVagaGaragem = $apartamento ->consultarApartamento();
       
        foreach($listaVagaGaragem as $item){
            
            $item->idapartamento= $seguranca->cripto($item->idapartamento);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
                       
        }
        
         //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaVagaGaragem"] = $listaVagaGaragem;
        
        return $data;
    }*/
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarFuncionarios(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUNC","con"));
        
        $funcionario = new \App\Classes\FuncionarioModel();
        $listaFuncionarios = $funcionario -> ConsultaFuncionario($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaFuncionarios as $item){
            
          $item->idfuncionarios = $seguranca->cripto($item->idfuncionarios);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);  
          if($item->CmpEntradaCondominio != "") $item->CmpEntradaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
          if($item->CmpSaidaCondominio != "") $item->CmpSaidaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
          
          $item -> CmpDescricao = strtoupper($item -> CmpDescricao);
          $item -> CmpNome = strtoupper($item -> CmpNome);
          
        }        
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_funcionarios"] = $listaFuncionarios;   
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarPrevisaoOrcamentaria(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PREORC","con"));
        
        $resumoPrevisaoOrcamentaria = new \App\Classes\ResumoPrevisaoOrcamentariaModel();
        $listaResumoPrevisaoOrcamentariaContas = $resumoPrevisaoOrcamentaria ->ConsultaResumoPrevisaoOrcamentaria($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaResumoPrevisaoOrcamentariaContas as $item){
            
            $item->idresumo_previsao_orcamentarias = $seguranca->cripto($item->idresumo_previsao_orcamentarias);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $item->CmpMontantePrevisto = number_format($item->CmpMontantePrevisto,2,",",".");
                    
        }        
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_previsao_orcamentaria"] = $listaResumoPrevisaoOrcamentariaContas;     
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarOcorrencia($idFuncionario){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("OCO","con"));
        
        $ocorrencia = new \App\Classes\OcorrenciaModel();
        $listaOcorrencia = $ocorrencia -> ConsultarOcorrencias($idFuncionario);

        foreach($listaOcorrencia as $item){
            
          $item->idocorrencias = $seguranca->cripto($item->idocorrencias);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          $item->CmpDataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicio);
          $item->CmpDataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFim);
          
          if($item->CmpTipoOcorrencia == 1) $item->CmpTipoOcorrencia = "Acidente";
          if($item->CmpTipoOcorrencia == 2) $item->CmpTipoOcorrencia = "Doenças";
          if($item->CmpTipoOcorrencia == 3) $item->CmpTipoOcorrencia = "Falta";          
          if($item->CmpTipoOcorrencia == 4) $item->CmpTipoOcorrencia = "Férias";   
          
        }        
                
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_ocorrencias"] = $listaOcorrencia;   
        $data["idObjeto"] = $idFuncionario;
        
        return $data;
    }
    
    /**
     * FUNCAO TELA TURNO: MONTA A TELA DE CONSULTA DE TURNO.
     * @param type $idDoc
     * @return type
     */
   
    public function TelaConsultarTrabalhoTurno($idFuncao, $msg){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("TUR","con"));
        
        $turno = new \App\Classes\TurnoModel();
        $listaTurno = $turno -> ConsultaTurno($idFuncao);

        foreach($listaTurno as $item){
            
          $item->idturno = $seguranca->cripto($item->idturno);
          $item-> CmpDescricao = strtoupper($item-> CmpDescricao);  
          
        }        
                
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_turno"] = $listaTurno;   
        $data["idObjeto"] = $idFuncao;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarEscalaServico(Request $request){
     
        $data = array();       
        
        $util = new \App\Util\Util();      
              
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ESC","con"));
              
                
        if ($request->isMethod("post")) { 
            
            $diasDoMes = $util -> MesesAno($request->input("mes"));
            
             //$escalaServico[$numEventosPrevisao] = new \App\Classes\Eventos();
            
            /**
             * PASSOS DA SOLUÇÃO
             * 1. RECUPERAR FUNCAO, MÊS, ANO E FUNCIONARIO
             * 2. RECUPERAR QUANTIDADE DIAS NO MÊS, REFERENTE ÀQUELA DATA. eX.: 01/05/2019 - quarta-feira
             * 3. VERIFICAR SE O FUNCIONARIO ESTÁ ESCALADO PARA AQUELE DIA DA SEMANA.
             * 4. MONTAR STRING PARA EXIBIÇÃO.
             */
            
            $funcionario = new \App\Classes\FuncionarioModel();
            $listaTrabalho = $funcionario -> ConsultaFuncionarioEscalaServico($request);
            $escalaServicoController = new \App\Http\Controllers\Master\RH\EscalaServico\EscalaServicoController();
           
            $oco = new \App\Classes\OcorrenciaModel();
            $listaEventos = $oco -> ConsultarOcorrenciasMes($request->input("mes"), $request->input("ano"));
            $data["listaEventos"] = $escalaServicoController -> MontarInfEscalaServico($request->input("mes"), $request->input("ano"), $listaTrabalho, $listaEventos);
                        
           
        }    
                
                
        //$data["listaEventos"] =  "";//$listaEventosDomingo . $listaEventosSegunda. $listaEventosTerca. $listaEventosQuarta.$listaEventosQuinta.$listaEventosSexta.$listaEventosSabado;
        
        if($request->input("ano") != ""  && $request->input("mes") != ""){
            $data["diaInicio"] =  $request->input("ano")."-".$request->input("mes")."-01"; 
        }else{
             $data["diaInicio"] = date("Y-m-d");
        }
        
        //TELA DE CADASTRO DE ESCALA
        //$selectFuncionario = $this ->MontarCombosFuncionario($seguranca->cripto(0));
        $selectTurno = $this ->MontarCombosTurno($seguranca->cripto(0));
        $selectFuncao = $this -> MontarCombosFuncao($seguranca->cripto(0));
        $selectMes = $this -> MontarCombosMeses(0);
        $selectAno = $this -> MontarCombosAno($seguranca -> cripto(0));
        
        
        $data["formulario"] = $this -> CampoSelectGliphycon("Função", "funcao", "", $selectFuncao,"NAO", 6) 
                            . $this -> CampoSelectGliphycon("Mês", "mes", "", $selectMes,"SIM", 3)
                            . $this -> CampoSelectGliphycon("Ano", "ano", "", $selectAno,"SIM", 3)
                            //. $this -> CampoSelectGliphycon("Funcionário", "catFun", "", $selectFuncionario,"NAO", 12)
                                                        
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                            //. $this ->CampoHeader("Operações");
        
        $data["idObjeto"] = $seguranca->cripto(0); 
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarFornecedor(){
     
        $data = array();                
        $util = new \App\Util\Util();      
        $listaEventos = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOR","con"));
        
        $fornecedor = new \App\Classes\FornecedorModel();
        $listaFornecedor = $fornecedor->consultaFornecedor($seguranca->cripto(0));

        foreach($listaFornecedor as $item){
          $item->idfornecedores = $seguranca->cripto($item->idfornecedores);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_fornecedor"] = $listaFornecedor;   
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarEstoque(){
     
        $data = array();                
        $util = new \App\Util\Util();      
        $listaEventos = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("EST","con"));
        
        $fornecedor = new \App\Classes\FornecedorModel();
        $listaFornecedor = $fornecedor->consultaFornecedor($seguranca->cripto(0));

        foreach($listaFornecedor as $item){
          $item->idfornecedores = $seguranca->cripto($item->idfornecedores);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_fornecedor"] = $listaFornecedor;       
        
        return $data;
    }
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarFuncao(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUN","con"));
        
        $funcao = new \App\Classes\FuncaoModel();
        $listaFuncao = $funcao -> ConsultaFuncao($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaFuncao as $item){
            
          $item->idfuncao = $seguranca->cripto($item->idfuncao);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          $item->CmpDescricao = strtoupper($item->CmpDescricao);      
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_funcao"] = $listaFuncao;    
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarPonto(){
     
        $data = array();                
        $util = new \App\Util\Util();     
        $listaEventos = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PON","con"));        
        
        //echo Auth::user() -> funcionario_idfuncionario;

        $pontoModel = new \App\Classes\PontoModel();
        
        if(Auth::user() -> perfil_idperfil == 1 
                || Auth::user() -> perfil_idperfil == 2 
                || Auth::user() -> perfil_idperfil == 3 
                || Auth::user() -> perfil_idperfil == 5){
            
            $listaPonto = $pontoModel -> ConsultaPonto($seguranca->cripto(0));
            
        }else{ //PORTARIA
            
            $listaPonto = $pontoModel -> ConsultaPontoPorFuncionario(Auth::user() -> funcionario_idfuncionario);
        } 
        
        foreach($listaPonto as $item){
            
            //echo $util -> calculaTempo(substr($item->CmpDataEntrada,strlen($item->CmpDataEntrada)-8,8), substr($item->CmpDataSaida,strlen($item->CmpDataSaida)-8,8));
          
            $listaEventos = $listaEventos . "{ title:'".$item->CmpNome."'".$util->formatarDataMysql($item->CmpDataEntrada)."',start:'".$util->formatarDataMysql($item->CmpDataEntrada)."'},";
         
            $item->idponto = $seguranca->cripto($item->idponto);
            $item->CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpDataEntrada);
            if($item->CmpDataSaida != "") $item->CmpDataSaida = $util->formatarDataMysqlParaExibicao($item->CmpDataSaida);
        }
                      
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_ponto"] = $listaPonto;         
        $data["listaEventos"] = $listaEventos;
          
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarCautela(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CAU","con"));
        
        $cautela = new \App\Classes\CautelaModel();
        $listaCautela = $cautela -> ConsultaCautela($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaCautela as $item){
            
          $item->idcautela = $seguranca->cripto($item->idcautela);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          //$item->CmpDataConclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataConclusao);
          
          /*if($item->CmpCategoriaSolicitacao == 1) $item->CmpCategoriaSolicitacao = "Aluguel";
          if($item->CmpCategoriaSolicitacao == 2) $item->CmpCategoriaSolicitacao = "Troca";
          if($item->CmpCategoriaSolicitacao == 3) $item->CmpCategoriaSolicitacao = "Venda";
          if($item->CmpCategoriaSolicitacao == 4) $item->CmpCategoriaSolicitacao = "Doação";*/
          
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_cautela"] = $listaCautela;    
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarObra(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("OBR","con"));
        
         $obra = new \App\Classes\ObraModel();
        $listaObra = $obra -> ConsultaObra($seguranca->cripto(0));//ConsultaBem($seguranca->cripto(0));

        foreach($listaObra as $item){
            
          $item->idobra = $seguranca->cripto($item->idobra);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          $item->CmpDataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicio);
          $item->CmpDataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFim);
          
          /*if($item->CmpCategoriaSolicitacao == 1) $item->CmpCategoriaSolicitacao = "Aluguel";
          if($item->CmpCategoriaSolicitacao == 2) $item->CmpCategoriaSolicitacao = "Troca";
          if($item->CmpCategoriaSolicitacao == 3) $item->CmpCategoriaSolicitacao = "Venda";
          if($item->CmpCategoriaSolicitacao == 4) $item->CmpCategoriaSolicitacao = "Doação";*/
          
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_obra"] = $listaObra;     
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarEventos(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("EVE","con"));
        
        //EVENTOS
        $evento = new \App\Classes\EventoModel();
        $listaEvento = $evento -> consultarEvento($seguranca->cripto(0)); 
        
        foreach($listaEvento as $item){
            
            $item->ideventos = $seguranca->cripto($item->ideventos);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
                       
        }        
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaEvento"] = $listaEvento;        
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarProprietario(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PRO","con"));
        
        $proprietario = new \App\Classes\ProprietarioModel();
        $listaProprietario = $proprietario -> consultarProprietario();
        
        foreach($listaProprietario as $item){
            $item->idproprietario = $seguranca->cripto($item->idproprietario);
            if($item->CmpDataNasc != "") $item->CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            if($item->CmpEntradaCondominio != "") $item->CmpEntradaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            if($item->CmpSaidaCondominio != "") $item->CmpSaidaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
            if($item->CmpDataInclusao != "") $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $item->CmpNome = strtoupper($item->CmpNome);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaProprietario"] = $listaProprietario;
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarMorador(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MOR","con"));
        
        $morador = new \App\Classes\MoradorModel();
        $listaMorador = $morador -> consultarMorador($seguranca->cripto(Auth::user()->morador_idmorador));
        
        foreach($listaMorador as $item){
          
            $item->idmorador = $seguranca->cripto($item->idmorador);
            
            /*if($item->CmpEhMorador == "S"){                
                if($item->nascProp != "") $item->nascProp = $util->formatarDataMysqlParaExibicao($item->nascProp);
                if($item->entProp != "") $item->entProp = $util->formatarDataMysqlParaExibicao($item->entProp);
            }else{*/
            
            /*echo $item->idmorador . " -- " . $item->CmpEntradaCondominio . " - " . $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            echo "<BR>";*/
                if($item->CmpDataNasc != "") $item->CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
                if($item->CmpEntradaCondominio != "") $item->CmpEntradaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
                if($item->CmpSaidaCondominio != "") $item->CmpSaidaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
           // }
            
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaMorador"] = $listaMorador;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
               
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarVeiculo(){
     
        $totalVeiculos = 0;
        $totalVagas = 0;
        $totalVagasAlugadas = 0;
         
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEI","con"));
        
        $veiculos = new \App\Classes\VeiculoModel();
        $listaVeiculo = $veiculos -> consultarVeiculo($seguranca->cripto(0));
        
        foreach($listaVeiculo as $item){
            
            $item->idveiculo = $seguranca->cripto($item->idveiculo);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
                       
            if($item -> CmpCor != ""){
                $item -> CmpCor = $util -> DevolveCores($item -> CmpCor);
            }
            $totalVeiculos++;
            if(!is_null($item->alugado_idapartamento)) $totalVagasAlugadas++;
        }
        
       // echo "total " . $totalVagasAlugadas . "<BR>";
        //CONSULTA QUANTIDADE DE CARTÕES 
        $cartaoModel = new \App\Classes\CartaoEstacionamentoModel();
        $cartao = $cartaoModel ->ConsultaCartaoEstacionamento(Auth::user()->condominio_idcondominio);
        $totalVagas = count($cartao);
                
                
        if($totalVagas > 0){        
            $data["totalVeiculos"] = $totalVeiculos;
            $data["totalNaoVeiculos"] =  $totalVagas - $totalVeiculos;                      
        }else{
            $data["totalVeiculos"] = $totalVeiculos;
            $data["totalNaoVeiculos"] =  0;             
        }
        
        if($totalVeiculos > 0){
           
            $data["totalVagasAlugadas"] = $totalVagasAlugadas;
            $data["totalVagasNaoAlugadas"] =  $totalVeiculos - $totalVagasAlugadas;  
        }else{
            
            $data["totalVagasAlugadas"] = 0;
            $data["totalVagasNaoAlugadas"] = $totalVagasAlugadas;  
        }
        
        //EXIBIÇÃO DE GRÁFICOS
        $data["graficos"] = $this -> CampoHeader("Veículos Registrados") 
                            . "<div id='morris-donut-chart-veiculos'></div>"
                            . $this -> CampoHeader("Vagas Alugadas")     
                            . "<div id='morris-donut-chart-veiculos2'></div>";
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaVeiculo"] = $listaVeiculo;
        
        return $data;
    }
    
    public function TelaConsultarVeiculo2(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     echo "teste";
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEI","con"));
        
        $veiculos = new \App\Classes\VeiculoModel();
        $listaVeiculo = $veiculos ->ConsultarMoradorPorId2(Auth::user()->apartamento_idapartamento);
        
        foreach($listaVeiculo as $item){
            
            $item->idveiculo = $seguranca->cripto($item->idveiculo);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
                       
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaVeiculo"] = $listaVeiculo;
        
        return $data;
    }
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarRamal(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RAM","con"));
        
        //VEICULOS
        $ramal = new \App\Classes\RamalModel();
        $listaRamal = $ramal -> consultaRamal($seguranca->cripto(0));
                       
        foreach($listaRamal as $item){
            
            $item->idramal = $seguranca->cripto($item->idramal);
           
            
           
                       
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaRamal"] = $listaRamal;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarSalaoFestas(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("SAL","con"));
        
        $listaEventos = "";
        
        //VEICULOS
        $salaoFestas = new \App\Classes\SalaoFestasModel();               
        $listaReservaSalaoFestas = $salaoFestas -> ConsultaSalaoFestas($seguranca->cripto(0),Auth::user()->perfil_idperfil);
               
        $dataAgenda = "";
        
        foreach($listaReservaSalaoFestas as $item){
            
            $item->idsalao_festas = $seguranca->cripto($item->idsalao_festas);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $dataAgenda = $item->CmpDataFesta;
            $item->CmpDataFesta = $util->formatarDataMysqlParaExibicao($item->CmpDataFesta);            
            $item->CmpMotivoSalaoFestas = $util ->MotivoSalaoFestas($item->CmpMotivoSalaoFestas);            
            $item->CmpStatus = $util ->SituacaoSolicitacaoSalaoFestas($item->CmpStatus);           
                        
            $listaEventos = $listaEventos . "{ title:'Reservado',start:'".$dataAgenda."'},";
            
        }
                
        //BARRA DE FUNCIONALIDADE
        $data["barra_funcionalidade"] = $util->montagem_barra_funcionalidade("Consultar", " Reserva de Salão de Festas ", "Reserva de Salão de Festas");
              
            
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaEventos"] = $listaEventos;
        $data["listaReservaSalaoFestas"] = $listaReservaSalaoFestas;
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        //$data["lista_classificados"] = $listaClassificados;        
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarReserva(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RES","con"));
        
        $listaEventos = "";
        //echo "abte";
        //VEICULOS
        $reservas = new \App\Classes\ReservaModel();              
        $listaReservaReservas = $reservas -> ConsultaReserva($seguranca->cripto(0),Auth::user()->perfil_idperfil);
        //echo "depois";       
        $dataAgenda = "";
        
        foreach($listaReservaReservas as $item){
            
            $item->idreserva = $seguranca->cripto($item->idreserva);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $dataAgenda = $item->CmpDataReserva;
            $item->CmpDataReserva = $util->formatarDataMysqlParaExibicao($item->CmpDataReserva);            
            $item->CmpMotivo = $util ->MotivoSalaoFestas($item->CmpMotivo);            
            
            if($item->CmpStatus != "ANS" && $item->CmpStatus != "RJT" && $item->CmpStatus != "DTV"){
                $listaEventos = $listaEventos . "{ title:'Reservado',start:'".$dataAgenda."'},";
            }
            
            $item->CmpStatus = $util -> LabelReserva($item->CmpStatus);           
                                  
            
        }
                
        //BARRA DE FUNCIONALIDADE
        //$data["barra_funcionalidade"] = $util->montagem_barra_funcionalidade("Consultar", " Reserva de Salão de Festas ", "Reserva de Salão de Festas");
             
            
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaEventos"] = $listaEventos;
        $data["listaReserva"] = $listaReservaReservas;
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        //$data["lista_classificados"] = $listaClassificados;        
        
        return $data;
    }
    
    public function TelaConsultarReformaApartamento($idApartamento){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REFAPA","con"));
        
        $reformaApartamento = new \App\Classes\ReformaApartamentoModel();
        $listaReformaApartamento = $reformaApartamento -> consultarReformaApartamento($seguranca -> cripto(0),$idApartamento);
        
        foreach($listaReformaApartamento as $item){
          $item->idreforma_apartamento = $seguranca->cripto($item->idreforma_apartamento);
          $item->apartamento_idapartamento = $seguranca->cripto($item->apartamento_idapartamento);
          $item->CmpInicioReforma = $util->formatarDataMysqlParaExibicao($item->CmpInicioReforma);
          $item->CmpFimReforma = $util->formatarDataMysqlParaExibicao($item->CmpFimReforma);
          
          /*if($item->CmpStatus == "ATV" || $item->CmpStatus == "ACT") $item->CmpStatus = "ACEITO";
          if($item->CmpStatus == "RJT") $item->CmpStatus = "REJEITADO";
          if($item->CmpStatus == "DTV") $item->CmpStatus = "CANCELADO";
          
          if($item->CmpStatus == "ANS" ) $item->CmpStatus = "EM ANÁLISE";*/
          
           $item->CmpStatus = $util -> LabelReserva($item->CmpStatus);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaReformaApartamento"] = $listaReformaApartamento;
        $data["idObjeto"] = $idApartamento;
        
        //DECISÃO DE APRESENTAR A TELA DE DECISÃO DO SINDICO
        if(Auth::user()->perfil_idperfil == 2){
            $data["autorizacao"] = "SIM";
        }else{
            $data["autorizacao"] = "SIM";
        }
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        //$data["rotulo2"] = "100 bloco 1";       
        
        return $data;
    }
    
    public function TelaConsultarReformaApartamentoDashboard(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REFAPA","con"));
        
        $reformaApartamento = new \App\Classes\ReformaApartamentoModel();
        $listaReformaApartamento = $reformaApartamento ->ConsultarReformas();
        
        foreach($listaReformaApartamento as $item){
          $item->idreforma_apartamento = $seguranca->cripto($item->idreforma_apartamento);
          $item->idapartamento = $seguranca->cripto($item->idapartamento);

          $item->CmpInicioReforma = $util->formatarDataMysqlParaExibicao($item->CmpInicioReforma);
          $item->CmpFimReforma = $util->formatarDataMysqlParaExibicao($item->CmpFimReforma);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaReformaApartamento"] = $listaReformaApartamento;
        //$data["idObjeto"] = $idApartamento;
        
        //$data["rotulo2"] = "100 bloco 1";       
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarDependente($idMorador,$banner){
     
        $data = array();                
        $util = new \app\Util\Util();      
     
        $data1 = "";
        $data2 = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Dependente","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DEP","con"));
        
        $dependente = new \App\Classes\DependentesModel();
        $listaDependente = $dependente->ConsultaDependente($idMorador,$seguranca->cripto(0));

        foreach($listaDependente as $item){
          
          $item->CmpIdade = $util -> DevolveIdade($util->formatarDataMysqlParaExibicao($item -> CmpDataNasc));
          $item->iddependente = $seguranca->cripto($item->iddependente);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          $item->CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);          
          
          $item->CmpParentesco = $util -> EstadoCivil($item->CmpParentesco);
        }
        
            
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_dependente"] = $listaDependente; 
        //$data["banner"] = $seguranca -> decripto($banner);
        $data["idMorador"] = $idMorador;
        $data["banner_cripto"] = $banner; 
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarVeiculoVisitante(){
     
        $data = array();                
        $util = new \app\Util\Util();      
     
        $data1 = "";
        $data2 = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "con","Condomínio","Dependente","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEIVIS","con"));
        
        //VEICULOS
        $veiculosVisitantes = new \App\Classes\VeiculoVisitantesModel();
        $listaVeiculoVisitante = $veiculosVisitantes -> consultarVeiculoVisitante("");

        foreach($listaVeiculoVisitante as $item){
            
            $item->idveiculo = $seguranca->cripto($item->idveiculo);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
                               
        }       
             
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaVeiculoVisitante"] = $listaVeiculoVisitante; 
        /*$data["banner"] = $seguranca -> decripto($banner);
        $data["idMorador"] = $idMorador;
        $data["banner_cripto"] = $banner; */       
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE DOCUMENTO.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarPets(){
        
        $data = array();                
        $util = new \App\Util\Util();      
     
        $categoriaExtenso = "";
        $idDonoDocumento = "";
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(75, "con","Condomínio","Documento","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PET","con"));        
        
        //VEICULOS
        $pets = new \App\Classes\PetsModel();
        $listaPets = $pets ->consultarPets($seguranca ->cripto(0));

        foreach($listaPets as $item){
            
            $item->idpets = $seguranca->cripto($item->idpets);
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $item->CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            $item->CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpDataEntrada);
            $item->CmpDataSaida = $util->formatarDataMysqlParaExibicao($item->CmpDataSaida);
            
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaPets"] = $listaPets;
        
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE DOCUMENTO.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarDocumento(){
        //echo "<BR> CATEGORIA " . $idCategoria;
        $data = array();                
        $util = new \App\Util\Util();      
     
        $categoriaExtenso = "";
        $idDonoDocumento = "";        
       
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","con"));        
        
        $documento = new \App\Classes\DocumentoModel();
        $listaDocumento = $documento -> ConsultaDocumento($seguranca->cripto(0),"LISTA");

        foreach($listaDocumento as $item){
         
            $item->iddocumento = $seguranca->cripto($item->iddocumento);
            $item->DocDescricao = strtoupper(substr($item->DocDescricao, 0, 100)); 
            //echo "<BR>";
            //$item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            //echo "cat " . $idCategoria = $item->categoria_documento_idcategoria_documento;// = $seguranca->cripto($item->categoria_documento_idcategoria_documento);
            $categoriaExtenso = $item-> CmpSigla;
            // $item -> objetoDonoDocumento;// = $seguranca->cripto($item -> objetoDonoDocumento);
            
            if($item -> objetoDonoDocumento == null){ 
                $idDonoDocumento = 0;
            }else{
                $idDonoDocumento = $item -> objetoDonoDocumento;
            }  
          
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_documento"] = $listaDocumento; 
        //$data["idcategoria_documento"] = $idCategoria;         
        $data["idDonoDocumento"] = $seguranca->cripto($idDonoDocumento);
        $data["banner"] = "";
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        
        return $data;
    }
    
    /**
     * 
     * @return typePARA USO SOMENTO DO MORADOR
     */
    public function TelaConsultarDocumento2(){
        //echo "<BR> CATEGORIA " . $idCategoria;
        $data = array();                
        $util = new \App\Util\Util();      
     
        $categoriaExtenso = "";
        $idDonoDocumento = "";        
       
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","con"));        
        
        $documento = new \App\Classes\DocumentoModel();
        $listaDocumento = $documento -> ConsultaDocumento($seguranca->cripto(0),"MORADOR");

        foreach($listaDocumento as $item){
         
            $item->iddocumento = $seguranca->cripto($item->iddocumento);
            $item->DocDescricao = strtoupper(substr($item->DocDescricao, 0, 100)); 
            //echo "<BR>";
            //$item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            //echo "cat " . $idCategoria = $item->categoria_documento_idcategoria_documento;// = $seguranca->cripto($item->categoria_documento_idcategoria_documento);
            $categoriaExtenso = $item-> CmpSigla;
            // $item -> objetoDonoDocumento;// = $seguranca->cripto($item -> objetoDonoDocumento);
            
            if($item -> objetoDonoDocumento == null){ 
                $idDonoDocumento = 0;
            }else{
                $idDonoDocumento = $item -> objetoDonoDocumento;
            }  
          
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_documento"] = $listaDocumento; 
        //$data["idcategoria_documento"] = $idCategoria;         
        $data["idDonoDocumento"] = $seguranca->cripto($idDonoDocumento);
        $data["banner"] = "";
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        
        return $data;
    }
    
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE DOCUMENTO.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarDocumentos($idObjeto,$tipoDonoDocumento,$msg){
        
        $data = array();                
        $util = new \App\Util\Util();      
     
        $categoriaExtenso = "";
        $idDonoDocumento = "";        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(75, "con","Condomínio","Documento","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","con"));
           
        //RECUPERA OBJETO DOCUMENTO
        $documento = new \App\Classes\DocumentoModel();
        $data["lista_documento"] = $util->codificaResultSet($documento -> consultaDocumentos($idObjeto, $tipoDonoDocumento));
        
        $data["idObjeto"] = $idObjeto;
        $data["tipoDonoDocumento"] = $tipoDonoDocumento;
                  
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        /**
         * FIM DA SEÇÃO DE MONTAGEM DO DETALHE
         */        
        $data["funcionalidade"] = $util -> DefineFuncionalidade($tipoDonoDocumento);
                      
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE BEM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarInventario(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("INV","con"));
        
        $inventario = new \App\Classes\InventarioModel();
        $listaInventario = $inventario-> ConsultaInventario();

        foreach($listaInventario as $item){
            
          $item -> idbens = $seguranca -> cripto($item -> idbens);
          $item->CmpNome = $item->CmpNome;
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          
          if($item->CmpCategoria == 1) $item->CmpCategoria = "Permanente";
          if($item->CmpCategoria == 2) $item->CmpCategoria = "Consumo";          
          if($item->CmpAreaComum == "") $item->CmpAreaComum = "Sem Local";
          
          if($item->CmpValorAquisicao != "") $item->CmpValorAquisicao = "R$ " . number_format($item->CmpValorAquisicao,2,",",".");
          
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_inventario"] = $listaInventario;        
       
        return $data;
    }
    
    
    /**
     * FUNCAO TELADOCUMENTOCONSULTAR: MONTA A TELA DE CONSULTA DE ÁREA COMUM.
     * @param type $idDocumento
     * @return type
     */
   
    public function TelaConsultarAreaComum(){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "con","Condomínio","Área Comum","nor");
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ARE","con"));
        
        $areaComum = new \App\Classes\AreaComumModel();
        $listaAreaComum = $areaComum->ConsultaAreaComum($seguranca -> cripto(0),$seguranca -> cripto("TODOS"));

        foreach($listaAreaComum as $item){
          $item->idarea_comum = $seguranca->cripto($item->idarea_comum);
          $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
          
          /*if($item->CmpDisponibilidadeReserva == "S"){ $item->CmpDisponibilidadeReserva = "SIM";}
          else{ $item->CmpDisponibilidadeReserva = "NÃO";}*/
              
          
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_area_comum"] = $listaAreaComum; 
              
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $idDocumento
     * @return type
     */
    
    public function TelaDocumentoEditar($idDocumento,$banner){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idDocDecripto = $seguranca -> decripto($idDocumento);
        
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        $documento = $documentoModel -> ConsultaDocumento($idDocumento,"UNIDOC");
        
        //COMBOS DA TELA
        foreach($documento as $item){
        
            $sigilo = $item->CmpSigilo; 
            $categoria = $item -> categoria_documento_idcategoria_documento;
            $categoriaDescricao = $item -> catDescricao;
            $dataInclusao = $item -> CmpDataInclusao;
            $documentoDescricao = $item -> DocDescricao;

            $selectSigilo = $this -> montarCombos("sigilo",$sigilo);
            $selectCategoriaDocumento = $this -> montarCombos("catDocumento", $categoria);
        
        }
                  
        //$data = $this -> PrepararArrayData(75, "edi","Documentos",$categoriaDescricao,"nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","edi"));

        $data["formulario"] =  $this ->CampoInputReadonly("Data", $dataInclusao, 4)
                        . $this -> montarFormulario("Sigilo", "sigilo", "Escolha o sigilo", "Por favor, informe o sigilo correto.","", $selectSigilo, "select1",4)
                        . $this -> montarFormulario("Categoria", "categoria", "Escolha o categoria", "Por favor, informe o categoria correto.","", $selectCategoriaDocumento, "select1",4)                        
                        //. $this -> CampoTextarea("Descrição", "descricao", $documentoDescricao, 12);
                        . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$documentoDescricao,"comentario",12)
                        . $this -> montarFormulario("Enviar", "", "", "","","","submit2",12);
        
        $data["iddocumento"] = $idDocumento;
        
        //CATEGORIA
        $data["idcategoria"] = $seguranca -> cripto($categoria);
        
        /*$data["banner"] = $seguranca -> decripto($banner);
        $data["banner_cripto"] = $banner;*/
        
        $data["botaoFechar"] = $this ->MontaBotaoFechar();
        
        return $data;
    }
    
    
    /**AX FFF2FFF2F2F2FDDDDDDR2DV   jh4r
     * FUNCAO
     */
    
    public function TelaDocumentoDetalhar($idDocumento){
                
        $data = array();         
        $util = new \App\Util\Util();
        
        $dataDocumento = "";
        $sigilo = "";
        $descricao = "";
        $categoria_documento = "";

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $documentoModel = new \App\Classes\DocumentoModel();
        $categoriaDocumento = new \App\Classes\CategoriaDocumentoModel();
        
        //echo "t ";// . $seguranca -> decripto($idDocumento);
        
        if($idDocumento != "" && $idDocumento > 0) $idDocumento_decripto = $seguranca -> decripto($idDocumento); 
        $documento = $documentoModel -> ConsultaDocumento($idDocumento, "UNIDOC");
        
        foreach ($documento as $item){
            
            $dataDocumento = $item->CmpDataInclusao;            
            $sigilo = $documentoModel -> get_sigilo_extenso($item->CmpSigilo);       
            $documentoDescricao = $item -> DocDescricao;       
            $categoriaDescricao = $item -> catDescricao;       
            $categoria_documento = $categoriaDocumento -> recuperaDescricaoCategoriaDocumento($item-> categoria_documento_idcategoria_documento);
            $idCategoria = $item-> categoria_documento_idcategoria_documento;
            
            //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
            //$data = $this -> PrepararArrayData(75, "det","Documento",$categoriaDescricao,"nor");
            $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","det"));

            $data["iddocumento"] = $idDocumento;
           // echo $seguranca->decripto($idDocumento)."<BR>";
            //$data["iddonodocumento"] = $idDonoObjeto;  
            $data["idcategoria_documento"] = $seguranca->cripto($idCategoria);
            //echo $idCategoria. "<BR>";
            $data["tipoDocumento"] = $seguranca->cripto("DOC");
            //echo "DOC". "<BR>";
            $data["tipoDonoDocumentoDecripto"] = 0;
            $data["banner_cripto"] = $seguranca -> cripto(0);        

            //Lista de Anexos
            $anexosControle = new \App\Http\Controllers\Anexo\AnexoController();
            $data["listaAnexos"] = $anexosControle -> CarregarListaAnexo($idDocumento);

            //DEFININDO O TIPO DE ARQUIVO        
            //MONTAGEM FORMULARIO
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInicioPainel("Detalhes do Documento", 12)
                                . $this -> CampoInputReadonly("Data ", $dataDocumento,12)
                                . $this -> CampoInputReadonly("Sigilo", strtoupper($sigilo),12)  
                                . $this -> CampoInputReadonly("Categoria", strtoupper($categoria_documento),12)   
                                . $this -> CampoTextareaReadonly("Descrição", strtoupper($documentoDescricao),12)
                                . $this -> CampoFimPainel();

        }            
        $data["msg"] = "";
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
     public function TelaDocumentosDetalhar($idObjeto,$iddocumento,$msg){
           
        $data = array();         
        $util = new \App\Util\Util();
    echo "teste";
        $documentoModel = new \App\Classes\DocumentoModel();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $anexosControle = new \App\Http\Controllers\Anexo\AnexoController();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
               
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","det"));
        
        $data["formulario"] = null;
        $data["listaAnexos"] = null;
        $data["idObjeto"] = $idObjeto; 
        $data["iddocumento"] = $iddocumento;
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
            
        //PESQUISA DE DOCUMENTOS POR ID.
        $documento = $documentoModel -> ConsultaDocumento($iddocumento, "UNIDOC");
        
        foreach($documento as $item){
            
            $dataDocumento = $item -> CmpDataInclusao;
            $sigilo = $documentoModel -> get_sigilo_extenso($item->CmpSigilo);
            $descricao = $item -> DocDescricao;
            $categoria_documento_extenso = $item -> catDescricao;
            $tipoDonoDocumento = $item -> CmpTipoDonoDocumento;
            $categoria = $item-> categoria_documento_idcategoria_documento;
        
            
            $data["tipoDonoDocumentoDecripto"] = $seguranca -> cripto($tipoDonoDocumento);
            $data["idcategoria_documento"] = $seguranca -> cripto($categoria);
        
        
            //LISTA DE ANEXOS
            $data["listaAnexos"] = $anexosControle -> CarregarListaTodosAnexo($idObjeto, $iddocumento, "COM_DONO");

            //DEFININDO O TIPO DE ARQUIVO        
            //MONTAGEM FORMULARIO
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data ", $dataDocumento,12)
                                . $this -> CampoInputReadonly("Sigilo", strtoupper($sigilo),12)  
                                . $this -> CampoInputReadonly("Categoria ", strtoupper($categoria_documento_extenso),12)   
                                . $this -> CampoTextareaReadonly("Descrição", strtoupper($descricao),12)
                                . $this -> CampoHidden("val",$idObjeto)
                                . $this -> CampoHidden("val2",$iddocumento)
                                . $this -> CampoHidden("val4","");
        } 
        return $data;
    }
    
    
    public function TelaApartamentoDetalhar($idapartamento){
               
        $data = array();         
        $util = new \App\Util\Util();    
        $anexoModel = new \App\Classes\AnexoModel();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        
        $placa = "";
        $marca = "";
        $modelo = "";
        $apto_bloco = "";
        $dt_registro = "";
        $ehMorador = "";
        $imagemPro = "";
          
        //echo "TEST " . Auth::user();
        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("APA","det"));
        
        $data["formularioProprietario"] = "";
        $data["formularioPropMorador"] = "";
        $data["formularioVeiculo"] = "";
        $data["formularioMorador"] = "";
        $data["formulario"] = "";
        $data["listaAnexos"] = "";
        $data["lista_documento"] = "";
        $data["listaProprietarioArq"] = "";
        $data["listaMoradorArq"] = ""; 
        $data["formularioProprietario2"] = "";
        $data["imagemPro"] = "";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idApartamento_decripto = $seguranca -> decripto($idapartamento);
        
        //id para a pagina
        $data["idObjeto"] = $idapartamento;
        $data["TipoDonoDocumento"] = $seguranca -> cripto("APA");
        
        $apartamentoModel = new \App\Classes\ApartamentoModel();
        $apartamento = $apartamentoModel -> consultarApartamentoPorId($idApartamento_decripto);
         
        $factory = new \App\DesignPattern\FactoryMethod();
        $anexoModel = new \App\Classes\AnexoModel();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta();
        $pastaPro = $factory -> GetClassVariavel() -> Path($pasta,"PRO","PARCIAL");
        $pastaMor = $factory -> GetClassVariavel() -> Path($pasta,"MOR","PARCIAL");
        $pastaVei = $factory -> GetClassVariavel() -> Path($pasta,"VEI","PARCIAL");
        
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($apartamento as $item){            
       
            $data["formulario"] =  $this -> CampoInputReadonly("Apto/Bloco", $item -> CmpApto."/".$item -> CmpBloco,3)
                            . $this -> CampoInputReadonly("Situação do Apartamento", $item -> CmpDescricao,4)
                            . $this -> CampoInputReadonly("Ramal", $item -> CmpRamal ,2)
                            . $this -> CampoTextareaReadonly("Descrição", $item ->CmpObs,12);
            
            $apto_bloco = $item -> CmpApto."/".$item -> CmpBloco;
            $dt_registro = "teste";
        }
        
         //Lista de Anexos
        $anexosControle = new \App\Http\Controllers\Anexo\AnexoController();
        $data["listaAnexos"] = $anexosControle -> CarregarListaTodosAnexo($seguranca -> cripto($idapartamento),$seguranca -> cripto("APA"),$seguranca -> cripto(0), $seguranca -> cripto("TOT"));
                        
        /**
         * CONSULTAR INFORMAÇÕES DO PROPRIETARIO
         */
        $proprietarioModel = new \App\Classes\ProprietarioModel();
        $proprietario = $proprietarioModel -> consultarProprietarioPorIdApartamento($idapartamento);
        $nome = "";
        $idProprietario = 0;
        foreach($proprietario as $item){
                
            $data["formularioProprietario"] = $this -> CampoInputReadonly("Proprietário", $item ->CmpNome,12);
            
            if(Auth::user()->perfil_idperfil == 3 || $item -> CmpEhMorador == "S"){ //PERFIL DO OPERADOR
                     /*$this -> CampoInputReadonly("CPF", $item -> CmpCPF,6)
                    . $this -> CampoInputReadonly("Est.Civil", $util->SituacaoEstadoCivil($item -> CmpEstCivil),6)*/
                    $data["formularioProprietario2"] = $this -> CampoInputReadonly("Tel.Fixo", $item -> CmpTel,4)
                    . $this -> CampoInputReadonly("Celular", $item -> CmpCel,4)
                    . $this -> CampoInputReadonly("É Deficiente?", $util->deficiente($item -> CmpEhDeficiente),4)
                    . $this -> CampoInputReadonly("Email", $item -> CmpEmail,12);
            }        
               
            $data["formularioProprietario"] = $data["formularioProprietario"] . $data["formularioProprietario2"];
            $data["formularioPropMorador"] =   $this -> CampoInputReadonly("Morador", $item ->CmpNome,12). $data["formularioProprietario2"];
            $idProprietario =  $seguranca -> cripto($item -> idproprietario);
             
            $imagem = $anexoModel ->recuperaAnexo($item->idproprietario, "PRO");
            if($imagem != ""){                
                $data["imagemPro"] = $pastaPro.$imagem;
            }else{
                $data["imagemPro"] = "img/silhueta.png";
            } 
            
            $ehMorador = $item -> CmpEhMorador;
        }        
        
                //echo "TESTE " .  $data["imagemPro"];
        /**
         * PROPRIETARIOS ARQUIVADOS
         * 
         */
        
        $listaProprietario = $proprietarioModel -> ConsultarProprietarioPorIdApTO($idapartamento, "ARQ");
        foreach($listaProprietario as $item){
            
             $item->idproprietario = $item->idproprietario;
            $item->CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            $item->CmpEntradaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            $item->CmpSaidaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
                       
        }
        //TODOS AS FOTOS ARQUIVADAS
        $listaImagem = $anexoModel -> recuperaTodosAnexo("PRO","ARQ");
        $data["idProp"] = $idProprietario;
        $data["listaIMGPROPArq"] = $listaImagem;
        $data["caminhoPRO"] = $pastaPro;
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaProprietarioArq"] = $listaProprietario;
        
        /**
         * MORADOR
         */        
        $moradorModel = new \App\Classes\MoradorModel();
        $morador = $moradorModel -> ConsultarMoradorPorIdApartamento($idapartamento);
        $idMorador = 0;
        
        if(isset($morador)){
        
            if($ehMorador == "N"){
                $data["formularioMorador"] =      $this -> CampoInputReadonly("Morador", $morador ->CmpNome,12)
                                                  /*. $this -> CampoInputReadonly("CPF", $morador -> CmpCPF,6)
                                                  . $this -> CampoInputReadonly("Est.Civil", $util->SituacaoEstadoCivil($morador -> CmpEstCivil),6)*/
                                                  . $this -> CampoInputReadonly("Tel.Fixo", $morador -> CmpTel,4)
                                                  . $this -> CampoInputReadonly("Celular", $morador -> CmpCel,4)
                                                  . $this -> CampoInputReadonly("É Deficiente?", $util->deficiente($morador -> CmpEhDeficiente),4)
                                                  . $this -> CampoInputReadonly("Email", $morador -> CmpEmail,12);

                $idMorador = $seguranca -> cripto($morador -> idmorador);

                $imagem = $anexoModel ->recuperaAnexo($morador->idmorador, "MOR");
                if($imagem != ""){                
                    $data["imagemMor"] = $pastaMor.$imagem;
                }else{
                    $data["imagemMor"] = "img/silhueta.png";
                }
            }else{
                $data["formularioMorador"] = $data["formularioPropMorador"];
                $data["imagemMor"] = $data["imagemPro"];
            }        
        }
        

        $data["idMor"] = $idMorador;
        
        //LISTA DE MORADORES ARQUIVADOS
        $listaMorador = $moradorModel -> ConsultarMoradorPorIdApTO($idapartamento, "ARQ");
        
        foreach($listaMorador as $item){

            $item->idmorador = $seguranca->cripto($item->idmorador);
            $item->CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            $item->CmpEntradaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            $item->CmpSaidaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
             
        }
        
        //TODOS AS FOTOS ARQUIVADAS
        $listaImagemMOR = $anexoModel -> recuperaTodosAnexo("MOR","ARQ");
        $data["idMor"] = $idMorador;
        $data["listaIMGMORPArq"] = $listaImagemMOR;
        $data["caminhoMOR"] = $pastaMor;
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaMoradorArq"] = $listaMorador;
        
        ////
        
        $listaProprietario = $proprietarioModel -> ConsultarProprietarioPorIdApTO($idapartamento, "ARQ");
        foreach($listaProprietario as $item){
            
             $item->idproprietario = $item->idproprietario;
            $item->CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            $item->CmpEntradaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            $item->CmpSaidaCondominio = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
                       
        }
        //TODOS AS FOTOS ARQUIVADAS
        $listaImagem = $anexoModel -> recuperaTodosAnexo("PRO","ARQ");
        $data["idProp"] = $idProprietario;
        $data["listaIMGPROPArq"] = $listaImagem;
        $data["caminhoPRO"] = $pastaPro;
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["listaProprietarioArq"] = $listaProprietario;
        
        
        /**
         * VEÍCULOS
         */
        
        $listaVEI = "";
        $veiculoModel = new \App\Classes\VeiculoModel();
        $listaVeiculo = $veiculoModel -> ConsultarVeiculoPorIdAPTO($idapartamento,"ATV"); 
        $idVeiculo = 0;
        $CmpCor = "";
        
        if(isset($listaVeiculo)){
            
            foreach($listaVeiculo as $item){  
                
                    //DEFINE AS CORES DOS CARROSGT  
                    if($item -> cor_idcor != ""){
                       $CmpCor = $util -> DevolveCores($item -> cor_idcor);
                    }
                
                    if($item -> CmpTipoVeiculo == 1)  $item -> CmpTipoVeiculo = "Automóvel";
                    if($item -> CmpTipoVeiculo == 2)  $item -> CmpTipoVeiculo = "Moto";
                    if($item -> CmpTipoVeiculo == 3)  $item -> CmpTipoVeiculo = "Bicicleta";
                
                    $listaVEI = $listaVEI       . $this -> CampoImageReadonly($pastaVei.$item ->CmpAnexo, 12)
                                                . $this -> CampoInputReadonly("Placa", $item ->CmpPlaca,4)
                                                . $this -> CampoInputReadonly("Cor", $CmpCor,4)
                                                . $this -> CampoInputReadonly("Categoria", $item -> CmpTipoVeiculo,4)
                                                . $this -> CampoInputReadonly("Marca", $item -> CmpMarca,6)
                                                . $this -> CampoInputReadonly("Modelo", $item -> CmpModelo,6)                                              
                                                
                                                . $this ->CampoHeader("");
                    
                    $idVeiculo = $seguranca->cripto($item -> idveiculo);
            }    
        }
        
        $data["formularioVeiculo"] = $listaVEI;
        
        $data["idVei"] = $idVeiculo;
        
        
         /**
         * HISTÓRICO DE VEÍCULOS 
         */
        
        $listaVEI = "";
        $veiculoModel = new \App\Classes\VeiculoModel();
        $listaHistoricoVeiculo = $veiculoModel -> ConsultarVeiculoPorIdAPTO($idapartamento,"ARQ"); 
        
        if(isset($listaHistoricoVeiculo)){
            
            foreach($listaHistoricoVeiculo as $item){    
                
                    if($item -> CmpTipoVeiculo == 1)  $item -> CmpTipoVeiculo = "Automóvel";
                    if($item -> CmpTipoVeiculo == 2)  $item -> CmpTipoVeiculo = "Moto";
                    if($item -> CmpTipoVeiculo == 3)  $item -> CmpTipoVeiculo = "Bicicleta";                    
                    
                    $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao2($item->CmpDataInclusao);
                    $item->CmpDataArquivado = $util->formatarDataMysqlParaExibicao2($item->CmpDataArquivado);
                
                   
            }    
        }
      
        $data["caminhoVEI"] = $pastaVei;
        $data["formularioHistoricoVeiculo"] = $listaHistoricoVeiculo;
        
        //RECUPERA OBJETO DOCUMENTO
        $documento = new \App\Classes\DocumentoModel();
        $data["lista_documento"] = $documento -> consultaDocumentos($idapartamento, $seguranca->cripto("APA"));
       
        $data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalhe($util->DevolveObjetoExtenso("APA"),$dt_registro,$apto_bloco));
                 
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        $data["ehMorador"] = $ehMorador;
        
        //echo "teste". $data["formularioProprietario"];
        return $data;
    }
   
    
    public function TelaMoradorDetalhar($idmorador){
        
        $data = array();         
        $util = new \App\Util\Util();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $moradorModel = new \App\Classes\MoradorModel();
        $factory = new \App\DesignPattern\FactoryMethod();
        $anexoModel = new \App\Classes\AnexoModel();
        $nacionalidadeModel = new \App\Classes\Nacionalidade();
        $naturalidadeModel = new \App\Classes\Naturalidade();
        
        $anexosControle = new \App\Http\Controllers\Anexo\AnexoController();        
         
        $imagem = "";  
        $data_nasc = "";
        $CmpNome = "";
        $CmpTel = "";
        $CmpCel = "";
        $apto = "";
        $bloco = "";
        $CmpObsDoc = "";
        $entrada = "";
        $saida = "";
        $conjuge = "";
        $CmpEmail = "";
        $ehDeficiente = "";
        $profissao = "";
        $estCivil = "";
        $naturalidade = "";
        $nacionalidade = "";
        $escolaridade = "";
        $CmpObs = "";
        $docIdent = "";
        $cpf = "";
        $titulo = "";
        $carteiraMotorista = "";
        $dataEntradaCondominio = "";
        $dataSaidaCondominio = "";
        $idRecuperaAnexo = "";
        $ehMorador = "";        
        
        $id_decripto = $seguranca -> decripto($idmorador);            
        $morador = $moradorModel -> consultarMorador($idmorador); //consultarApartamentoPorId($id_decripto); 
       
        //$arquivo = "clientes/".$pasta."/morador/";
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MOR","det"));
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($morador as $item){
                
                $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
                $pastaMor = $factory -> GetClassVariavel() ->Path($pasta, "MOR", "PARCIAL");
                
                $idRecuperaAnexo = $item -> idmorador;
                //$data_nasc = $util->formatarDataMysqlParaExibicao($item->nascProp);
                
                $CmpNome = $item -> CmpNome;
                $CmpTel = $item -> CmpTel;
                $CmpCel = $item -> CmpCel; 
                $apto = $item -> CmpApto;
                $bloco = $item -> CmpBloco;
                
                
                if($item ->CmpDataNasc != "") $data_nasc = $util->formatarDataMysqlParaExibicao($item ->CmpDataNasc);
                if($item ->CmpEntradaCondominio != "") $entrada = $util->formatarDataMysqlParaExibicao($item ->CmpEntradaCondominio);
                if($item ->CmpSaidaCondominio != "") $saida = $util->formatarDataMysqlParaExibicao($item ->CmpSaidaCondominio);
                
                
                /*$CmpNome = $item -> nomeMor;
                $CmpTel = $item -> telMor;
                $CmpCel = $item -> celMor; */
                $CmpEmail = $item -> CmpEmail;
                /*$apto = $item -> CmpApto;
                $bloco = $item -> CmpBloco;*/
                
                $estCivil = $util -> SituacaoEstadoCivil($item -> CmpEstCivil);
                $naturalidade = $util -> naturalidade($naturalidadeModel -> ConsultarNaturalidade($item -> CmpNaturalidade,$item -> CmpNacionalidade));
                $nacionalidade = $util -> nacionalidade($nacionalidadeModel -> ConsultarNacionalidade($item -> CmpNacionalidade));
                $ehDeficiente = $util -> deficiente($item -> CmpEhDeficiente);
                //$conjuge = $item -> CmpConjuge;
                $profissao = $item -> CmpProfissao;
                $escolaridade = $util -> escolaridade($item -> CmpEscolaridade);

                /*$docIdent = $item -> CmpDocIdent;
                $cpf = $item -> CmpCPF;
                $titulo = $item -> CmpTituloEleitor;
                $carteiraMotorista = $item -> CmpCarteiraMotorista;*/
                $CmpObs = $item -> CmpObs;
                //$CmpObsDoc = $item -> CmpObsDoc;
                //$conjuge = $item -> CmpConjuge;
                $ehMorador = "NÃO";                      
                //BUSCAR IMAGEM DO VEICULO
                /*$anexoModel = new \App\Classes\AnexoModel();            
                $data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($id_decripto, "PRO");            */

                //BUSCAR IMAGEM DO VEICULO
                $anexoModel = new \App\Classes\AnexoModel();
                $imagem = $anexoModel ->recuperaAnexo($idRecuperaAnexo, "MOR");
                if($imagem != ""){                
                    $data["imagem"] = $pastaMor.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }
                
              
            
           
            $data["formulario"] = $this -> CampoInputReadonly("Data Nascimento", $data_nasc,2)
                            . $this -> CampoInputReadonly("Apto", $apto,1)  
                            . $this -> CampoInputReadonly("Bloco", $bloco,1)
                            . $this -> CampoInputReadonly("Nome", $CmpNome,8)
                            . $this -> CampoTextareaReadonly("Descrição", "",12);
                        
            $data["formulario"] = $this -> CampoInputReadonlyGliphycon("Entrada Condomínio:", $entrada,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Saída Condomínio:", $saida,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Data Nascimento:", $data_nasc,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Nome:", $CmpNome,"user",12)
                            //. $this -> CampoInputReadonlyGliphycon("Cônjuge:", $conjuge,"user",12)
                            . $this -> CampoInputReadonlyGliphycon("Email:", $CmpEmail,"email",8)
                            . $this -> CampoInputReadonlyGliphycon("Apto:", $apto,"casa",2)  
                            . $this -> CampoInputReadonlyGliphycon("Bloco:", $bloco,"casa",2)
                            
                            . $this -> CampoInputReadonlyGliphycon("Celular:", $CmpCel,"tel",4)
                            . $this -> CampoInputReadonlyGliphycon("Tel.Fixo:", $CmpTel,"tel",4)
                            . $this -> CampoInputReadonlyGliphycon("É Deficiente?", $ehDeficiente,"deficiente",4)
                            . $this -> CampoInputReadonlyGliphycon("Profissão:", $profissao,"trabalho",10)
                            . $this -> CampoInputReadonlyGliphycon("Estado Civil:", strtoupper($estCivil),"user",4)
                            . $this -> CampoInputReadonlyGliphycon("Nacionalidade:", strtoupper($nacionalidade),"bandeira",4)  
                            . $this -> CampoInputReadonlyGliphycon("Naturalidade:", strtoupper($naturalidade),"bandeira",4)
                                                     
                            . $this -> CampoInputReadonlyGliphycon("Escolaridade:", strtoupper($escolaridade),"formacao",4)
                            . $this -> CampoInputReadonlyGliphycon("Proprietário é Morador?", $ehMorador,"",4)
                            
                            . $this -> CampoTextareaReadonlyGliphycon("Comentário:", $CmpObs,"comentario",12);
                            //. $this -> ListaAnexo($listaAnexos, 8);
            /*$data["documentos"] = $this -> CampoInputReadonlyGliphycon("Identidade:", $docIdent,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("CPF:", $cpf,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Título Eleitor:", $titulo,"doc",6)  
                            . $this -> CampoInputReadonlyGliphycon("Carteira Motorista:", $carteiraMotorista,"doc",6)
                            . $this -> CampoTextareaReadonlyGliphycon("Comentário:", $CmpObsDoc,"comentario",12);*/
            
            $data["ehMorador"] = $item -> CmpEhProprietario;
            
            if($saida == ""){
                $data["temDataSaida"] = "NAO";
            }else{
                $data["temDataSaida"] = "SIM";
            }
        }
           
        
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
       // $data = $this -> PrepararArrayData(60, "det","Morador","Morador ","nor");
        //$data["imagem"] = $imagem;
        
        //id para a pagina
        $data["idObjeto"] = $seguranca -> cripto($id_decripto);
        $data["TipoDonoDocumento"] = $seguranca -> cripto("MOR");
        
        $data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalhe($util->DevolveObjetoExtenso("MOR"),$data_nasc,$CmpNome));
        
        //Lista de Anexos        
        $data["listaAnexos"] = $anexosControle -> CarregarListaTodosAnexo($seguranca -> cripto($idmorador),$data["TipoDonoDocumento"],$seguranca -> cripto(0), $seguranca -> cripto("TOT"));
                
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    public function TelaProprietarioDetalhar($idObjeto,$status,$modal){ //$modal = se for for id do proprietario ou id do apartamento
        
        $data = array();         
        $util = new \App\Util\Util();       
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $proprietarioModel = new \App\Classes\ProprietarioModel();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $anexosControle = new \App\Http\Controllers\Anexo\AnexoController();
        $factory = new \App\DesignPattern\FactoryMethod();
        $anexoModel = new \App\Classes\AnexoModel();        
              
        $id_decripto = $seguranca -> decripto($idObjeto);
       
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PRO","det"));
           
        if($modal == "PROP"){  
            //echo "PROP";
            $proprietario = $proprietarioModel -> consultarProprietarioPorId($idObjeto,$status); //consultarApartamentoPorId($id_decripto);
        }else{          
            //echo "PROP2";
           $proprietario = $proprietarioModel -> consultarProprietarioPorIdApartamento($idObjeto); //consultarApartamentoPorId($id_decripto);            
        }
                          
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta("PRO");
        $pastaPro = $factory -> GetClassVariavel() -> Path($pasta, "PRO", "PARCIAL");
        
        $imagem = "";
        $data_nasc = "";
        $entrada = "";
        $saida = "";
        $CmpNome = "";
        $conjuge ="";
        $CmpEmail = "";
        $apto = "";
        $bloco = "";
        $CmpTel = "";
        $CmpCel = "";
        $ehDeficiente = "";
        $profissao = "";
        $estCivil = "";
        $naturalidade = "";
        $nacionalidade = "";
        $escolaridade = "";
        $CmpObs = "";
        $docIdent = "";
        $cpf = "";
        $titulo = "";
        $carteiraMotorista = "";
        $CmpObsDoc = "";
        $status = "ATV"; 
        $idproprietario = "";
        $ehMorador = "";
        
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($proprietario as $item){
            
           
            if($item ->CmpDataNasc != "") $data_nasc = $util->formatarDataMysqlParaExibicao($item ->CmpDataNasc);
            if($item ->CmpEntradaCondominio != "") $entrada = $util->formatarDataMysqlParaExibicao($item ->CmpEntradaCondominio);
            if($item ->CmpSaidaCondominio != "") $saida = $util->formatarDataMysqlParaExibicao($item ->CmpSaidaCondominio);
            
            $CmpNome = $item -> CmpNome;
            $CmpTel = $item -> CmpTel;
            $CmpCel = $item -> CmpCel; 
            $CmpEmail = $item -> CmpEmail;
            $apto = $item -> CmpApto;
            $bloco = $item -> CmpBloco;
            $estCivil = $util -> SituacaoEstadoCivil($item -> CmpEstCivil);
            $naturalidade = $item -> CmpNaturalidade;
            $nacionalidade = $item -> CmpNacionalidade;
            $ehDeficiente = $util -> deficiente($item -> CmpEhDeficiente);
            $conjuge = $item -> CmpConjuge;
            $profissao = $item -> CmpProfissao;
            $escolaridade = $util -> escolaridade($item -> CmpEscolaridade);
            
            $docIdent = $item -> CmpDocIdent;
            $cpf = $item -> CmpCPF;
            $titulo = $item -> CmpTituloEleitor;
            $carteiraMotorista = $item -> CmpCarteiraMotorista;
            
            //BUSCAR IMAGEM DO VEICULO
            /*$anexoModel = new \App\Classes\AnexoModel();            
            $data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($id_decripto, "PRO");            */
            
            //BUSCAR IMAGEM DO VEICULO
            
            $imagem = $anexoModel -> recuperaAnexo($id_decripto, "PRO");
            if($imagem != ""){                
                $data["imagem"] = $pastaPro.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            
            $CmpObs = $item -> CmpObs;
            $CmpObsDoc = $item -> CmpObsDoc;
            $status = $item -> CmpStatus;
            
            $idproprietario = $item -> idproprietario;
            $ehMorador = $item -> CmpEhMorador;
            
            if($ehMorador == 'S') $ehMorador = "SIM";
            if($ehMorador == 'N') $ehMorador = "NÃO";
            
            
            
        }
                      
        
        //id para a pagina
        $data["idObjeto"] = $idObjeto;
        $data["TipoDonoDocumento"] = $seguranca -> cripto("PRO");
        $data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalhe($util->DevolveObjetoExtenso("PRO"),$data_nasc,$CmpNome));
        $data["status"] = $status;
        $data["ehmorador"] = $seguranca -> cripto($ehMorador);
        //Lista de Anexos
       
        $data["listaAnexos"] = $anexosControle -> CarregarListaTodosAnexo($idObjeto,$seguranca -> cripto("PRO"),$seguranca -> cripto(0), $seguranca -> cripto("TOT"));
       
        $data["formulario"] = $this ->CampoHeader("Dados Pessoais")
                            . $this -> CampoInputReadonlyGliphycon("Entrada Condomínio:", $entrada,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Saída Condomínio:", $saida,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Data Nascimento:", $data_nasc,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Nome:", $CmpNome,"user",12)
                            . $this -> CampoInputReadonlyGliphycon("Cônjuge:", $conjuge,"user",12)
                            . $this -> CampoInputReadonlyGliphycon("Email:", $CmpEmail,"email",8)
                            . $this -> CampoInputReadonlyGliphycon("Apto:", $apto,"casa",2)  
                            . $this -> CampoInputReadonlyGliphycon("Bloco:", $bloco,"casa",2)
                            
                            . $this -> CampoInputReadonlyGliphycon("Celular:", $CmpCel,"tel",4)
                            . $this -> CampoInputReadonlyGliphycon("Tel.Fixo:", $CmpTel,"tel",4)
                            . $this -> CampoInputReadonlyGliphycon("É Deficiente?", $ehDeficiente,"deficiente",4)
                            . $this -> CampoInputReadonlyGliphycon("Profissão:", $profissao,"trabalho",10)
                            . $this -> CampoInputReadonlyGliphycon("Estado Civil:", strtoupper($estCivil),"user",4)
                            . $this -> CampoInputReadonlyGliphycon("Naturalidade:", strtoupper($naturalidade),"bandeira",4)
                            . $this -> CampoInputReadonlyGliphycon("Nacionalidade:", strtoupper($nacionalidade),"bandeira",4)                            
                            . $this -> CampoInputReadonlyGliphycon("Escolaridade:", strtoupper($escolaridade),"formacao",4)
                            . $this -> CampoInputReadonlyGliphycon("Proprietário é Morador?", $ehMorador,"",4)
                            
                            . $this -> CampoTextareaReadonlyGliphycon("Comentário:", $CmpObs,"comentario",12);
                            //. $this -> ListaAnexo($listaAnexos, 8);
            $data["documentos"] = $this ->CampoHeader("Dados Oficiais")
                            . $this -> CampoInputReadonlyGliphycon("Identidade:", $docIdent,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("CPF:", $cpf,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Título Eleitor:", $titulo,"doc",6)  
                            . $this -> CampoInputReadonlyGliphycon("Carteira Motorista:", $carteiraMotorista,"doc",6)
                            . $this -> CampoTextareaReadonlyGliphycon("Comentário:", $CmpObsDoc,"comentario",12);
        
        
        if($saida == ""){
            $data["temDataSaida"] = "NAO";
        }else{
            $data["temDataSaida"] = "SIM";
        }
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
         
        return $data;
    }
    
    //TELA VEICULO
    public function TelaVeiculoDetalhar($idVeiculo){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVeiculo_decripto = $seguranca -> decripto($idVeiculo);
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEI","det"));
        
        $CmpDataInclusao = "";  
        $CmpPlaca = "";
        $CmpMarca = "";
        $CmpModelo = "";
        $CmpCor = "";
        $CmpCartao = "";
        $CmpTipoVeiculo = "";
        $vaga_apto = "";
        $vaga_apto2 = "";
        $CmpDespacho = "";
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        $status = "";
       
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta();        
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "VEI", "PARCIAL");    
        //PESQUISA DE VEICULO POR ID
        $veiculoModel = new \App\Classes\VeiculoModel();
        $veiculo = $veiculoModel -> consultarVeiculo($idVeiculo); //consultarApartamentoPorId($id_decripto);
         
        $data["botaoEntradaSaidaVeiculo"] = "";
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($veiculo as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpMarca = $item -> CmpMarca;
            $CmpModelo = $item -> CmpModelo;            
            $CmpPlaca = $item -> CmpPlaca;
           // $CmpCor = $item -> CmpCor;
            $CmpDespacho = $item -> CmpDespacho;
            $CmpCartao = $item -> cartao;
           // $status = "";
            
            //DEFINE AS CORES DOS CARROSGT  
            if($item -> CmpCor != ""){
               $CmpCor = $util -> DevolveCores($item -> CmpCor);
            }
            
            $CmpTipoVeiculo = $item -> CmpTipoVeiculo;
            if($CmpTipoVeiculo == 1) $CmpTipoVeiculo = "Automóvel";
            if($CmpTipoVeiculo == 2) $CmpTipoVeiculo = "Moto";
            if($CmpTipoVeiculo == 3) $CmpTipoVeiculo = "Bicicleta";
            
            $vaga_apto = $item -> CmpApto. "-".$item -> CmpBloco;
            
            if($item -> alugado_idapartamento != ""){
                $vaga_apto2 = $item -> alugado_apto. "-".$item -> alugado_bloco;
            }    
             
            //id para a pagina
            $idObjeto = $data["idObjeto"] = $seguranca -> cripto($idVeiculo_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("VEI");
             
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idVeiculo_decripto, "VEI"); 
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/carro_imagem.jpg";
            }
             
            //echo  $data["imagem"];
            //BUSCAR INFORMAÇÃO DE SAIDA OU ENTRADA DE VEICULO
            $entradaSaidaModel = new \App\Classes\EntradaSaidaVeiculoModel();
            $data["botaoEntradaSaidaVeiculo"] = $entradaSaidaModel ->ConsultarUltimoMovimentoVeiculo($idVeiculo);
                 
            $data["status"] = $item -> CmpStatus;
        }
                    
        $data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalheCompleto($util->DevolveObjetoExtenso("VEI"),$CmpPlaca,$CmpMarca ." ".$CmpModelo ." ".$CmpCor,"Documentos pertencentes a","Placa","Veículo"));
                                                                        //($funcionalidade,$campoLabel1,$campoLabel2,$msg,$label1,$label2)
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,4)
                            . $this -> CampoInputReadonly("Categoria", strtoupper($CmpTipoVeiculo),4)
                            . $this -> CampoInputReadonly("Placa", $CmpPlaca,4)
                            . $this -> CampoInputReadonly("Marca", $CmpMarca,4)  
                            
                            . $this -> CampoInputReadonly("Modelo", $CmpModelo,4)
                            . $this -> CampoInputReadonly("Cor", $CmpCor,4)                            
                            . $this -> CampoInputReadonly("Cartão Estacionamento", $CmpCartao,4)
                           
                            . $this -> CampoInputReadonly("Pertence ao Apartamento", $vaga_apto,4)
                            . $this -> CampoInputReadonly("Alugada ao Apartamento", $vaga_apto2,4)
                            . $this -> CampoTextareaReadonly("Descrição", $CmpDespacho,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    //TELA VEICULO
    public function TelaVeiculoDetalhar2(){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        //$idVeiculo_decripto = $seguranca -> decripto($idVeiculo);
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEI","det"));
        
        $CmpDataInclusao = "";  
        $CmpPlaca = "";
        $CmpMarca = "";
        $CmpModelo = "";
        $CmpCor = "";
        $CmpCartao = "";
        $CmpTipoVeiculo = "";
        $vaga_apto = "";
        $CmpDespacho = "";
        $status = "";
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        
       
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta();        
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "VEI", "PARCIAL");    
        //PESQUISA DE VEICULO POR ID
        $veiculoModel = new \App\Classes\VeiculoModel();
        $veiculo = $veiculoModel ->ConsultarVeiculoPorIdAPTO(Auth::user()->apartamento_idpartamento,"ATV"); //consultarApartamentoPorId($id_decripto);
         
        $data["botaoEntradaSaidaVeiculo"] = "";
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($veiculo as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpMarca = $item -> CmpMarca;
            $CmpModelo = $item -> CmpModelo;            
            $CmpPlaca = $item -> CmpPlaca;
            //$CmpCor = $item -> CmpCor;
            $CmpDespacho = $item -> CmpDespacho;
            $CmpCartao = $item -> cartao;
            $status = $item -> CmpStatus;
                        
            $CmpTipoVeiculo = $item -> CmpTipoVeiculo;
            if($CmpTipoVeiculo == 1) $CmpTipoVeiculo = "Automóvel";
            if($CmpTipoVeiculo == 2) $CmpTipoVeiculo = "Moto";
            if($CmpTipoVeiculo == 3) $CmpTipoVeiculo = "Bicicleta";
            
            $vaga_apto = $item -> CmpApto. "-".$item -> CmpBloco;
             
            //id para a pagina
            $idObjeto = $data["idObjeto"] = $seguranca -> cripto($idVeiculo_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("VEI");
             
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idVeiculo_decripto, "VEI"); 
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/carro_imagem.jpg";
            }
             
            //BUSCAR INFORMAÇÃO DE SAIDA OU ENTRADA DE VEICULO
            $entradaSaidaModel = new \App\Classes\EntradaSaidaVeiculoModel();
            $data["botaoEntradaSaidaVeiculo"] = $entradaSaidaModel ->ConsultarUltimoMovimentoVeiculo($idVeiculo);
                 
            $data["status"] = $item -> CmpStatus;
        }
                    
        $data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalheCompleto($util->DevolveObjetoExtenso("VEI"),$CmpPlaca,$CmpMarca ." ".$CmpModelo ." ".$CmpCor,"Documentos pertencentes a","Placa","Veículo"));
                                                                        //($funcionalidade,$campoLabel1,$campoLabel2,$msg,$label1,$label2)
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,4)
                            . $this -> CampoInputReadonly("Categoria ", strotoupper($CmpTipoVeiculo),4)
                            . $this -> CampoInputReadonly("Placa", $CmpPlaca,4)
                            . $this -> CampoInputReadonly("Marca", $CmpMarca,4)  
                            
                            . $this -> CampoInputReadonly("Modelo", $CmpModelo,4)
                            //. $this -> CampoInputReadonly("Cor", $CmpCor,4)                            
                            . $this -> CampoInputReadonly("Cartão Estacionamento", $CmpCartao,4)
                           
                            . $this -> CampoInputReadonly("Apartamento", $vaga_apto,4)
                            . $this -> CampoTextareaReadonly("Descrição", $CmpDespacho,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        $data["status"] = $status;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    /**
     * TELA DETALHAR VAGA DE GARAGEM
     */
    
    //TELA VAGA GARAGEM
    public function TelaVagaGaragemDetalhar($idApartamento){
                
        $data = array();         
        $util = new \App\Util\Util();
        
        $ramal = new \App\Classes\RamalModel();
        $anexoModel = new \App\Classes\AnexoModel();
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idApartamento_decripto = $seguranca -> decripto($idApartamento);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Vaga de Garagem","Vaga de Garagem ", "nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VAG","det"));
        
        $CmpDataInclusao = "";  
        $CmpPlaca = "";
        $CmpMarca = "";
        $CmpModelo = "";
        $CmpCor = "";
        $CmpCartao = "";
        $CmpTipoVeiculo = "";
        $vaga_apto = "";
        $CmpDespacho = "";
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        $data["morador"] = "";
        
        $listaCarro = "";
        $listaMoto = "";
        $listaBicicleta = "";
        $apto = "";
        $nomeMorador = "";
        $carro = 0;
        $moto = 0;
        $bicicleta = 0;
                        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
       // $anexoModel = new \App\Classes\AnexoModel();
        
        /*$factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $arquivo = "clientes/".$pasta."/veiculos/";*/
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pastaVEI = $factory ->  GetClassVariavel() -> Path($pasta, "VEI","PARCIAL"); 
        $pastaMOR = $factory ->  GetClassVariavel() -> Path($pasta, "MOR","PARCIAL");
        $pastaPRO = $factory ->  GetClassVariavel() -> Path($pasta, "PRO","PARCIAL");
        //$pastaMOR = $factory ->  GetClassVariavel() -> Path($pasta, "MOR","PARCIAL");
       
        //PESQUISA DE VEICULO POR ID
        $vagaGaragemModel = new \App\Classes\VagaGaragemModel();
        $vagaGaragem = $vagaGaragemModel ->consultarVagaGaragemLista($idApartamento); //consultarApartamentoPorId($id_decripto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        //LISTA DE CARROS
        foreach($vagaGaragem as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpMarca = $item -> CmpFabricante;
            $CmpModelo = $item -> CmpModelo;            
            $CmpPlaca = $item -> CmpPlaca;
            //$CmpCor = $item -> CmpCor;
            $CmpDespacho = $item -> CmpDespacho;
            
            //DEFINE AS CORES DOS CARROSGT  
            if($item -> cor_idcor != ""){
               $CmpCor = $util -> DevolveCores($item -> cor_idcor);
            }
            
            
            //$moradorNome = $item -> CmpNome;
           // $idMorador = $item -> idmorador;
                        
            $CmpTipoVeiculo = $item -> CmpTipoVeiculo;            
            
            /*$apto = $item -> CmpApto. "-".$item -> CmpBloco;
            $nomeMorador = $item -> CmpNome; 
            $tel = $item -> CmpTel;
            $cel = $item -> CmpCel;*/
            
            $idApartamento = $item -> apartamento_idapartamento;
            
            //id para a pagina
            //$idObjeto = $data["idObjeto"] = $seguranca -> cripto($idVeiculo_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("VEI");
            $data["rotulo"] = $seguranca -> cripto(" Veículo " . strtoupper($CmpPlaca));

            //BUSCAR IMAGEM DO VEICULO
           
            $anexo = $anexoModel ->recuperaAnexo($item->idveiculo, "VEI");
            //foreach($anexo as $item){
            
            if($anexo != ""){                
                $data["imagem"] = $pastaVEI.$anexo;
            }else{
                $data["imagem"] = "img/carro_imagem.jpg";
            } 
           
            //echo $data["imagem"];
            //}               
            
            if($CmpTipoVeiculo == 1){
                
                $listaCarro = $listaCarro . $this->CampoInicioDivisor() 
                                . $this -> CampoInicioDIV(3)
                                . $this -> CampoImageReadonly( $data["imagem"], 3)
                                . $this ->CampoFimDIV()
                                . $this -> CampoInicioDIV(9)
                                . $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,4)
                                . $this -> CampoInputReadonly("Categoria ", strtoupper("Automóvel"),4)
                                . $this -> CampoInputReadonly("Placa", $CmpPlaca,4)
                                . $this -> CampoInputReadonly("Marca", $CmpMarca,4) 
                                . $this -> CampoInputReadonly("Cor", $CmpCor,4)
                                . $this -> CampoInputReadonly("Modelo", $CmpModelo,8)
                                                            
                                . $this -> CampoInputReadonly("Cartão Estacionamento", $CmpCartao,4)
                                                              
                                . $this -> CampoHidden("val",$data["idObjeto"]) 
                                . $this->CampoFimDivisor()
                                . $this ->CampoFimDIV()
                                . $this ->CampoLinha();
                $carro++;
            }
            if($CmpTipoVeiculo == 2){
                                
                $listaMoto = $listaMoto  . $this->CampoInicioDivisor() 
                                . $this -> CampoInicioDIV(3)
                                . $this -> CampoImageReadonly( $data["imagem"], 3)
                                . $this ->CampoFimDIV()
                                . $this -> CampoInicioDIV(9)
                                . $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,4)
                                . $this -> CampoInputReadonly("Categoria ", strtoupper("Moto"),4)
                                . $this -> CampoInputReadonly("Placa", $CmpPlaca,4)
                                . $this -> CampoInputReadonly("Marca", $CmpMarca,4) 
                                . $this -> CampoInputReadonly("Cor", $CmpCor,4)
                                . $this -> CampoInputReadonly("Modelo", $CmpModelo,8)                                                          
                                . $this -> CampoInputReadonly("Cartão Estacionamento", $CmpCartao,4)
                                                               
                                . $this -> CampoHidden("val",$data["idObjeto"])
                                . $this ->CampoFimDIV()
                                . $this->CampoFimDivisor()
                                . $this ->CampoLinha();
                 $moto++;
            }
           
            
            if($CmpTipoVeiculo == 3){
                               
                $listaBicicleta = $listaBicicleta  .$this->CampoInicioDivisor() 
                                . $this -> CampoInicioDIV(3)
                                . $this -> CampoImageReadonly( $data["imagem"], 3)
                                . $this ->CampoFimDIV()
                                . $this -> CampoInicioDIV(9)
                                . $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,4)
                                . $this -> CampoInputReadonly("Categoria ", strtoupper("Bicicleta"),4)  
                                . $this -> CampoInputReadonly("Placa", $CmpPlaca,4)
                                . $this -> CampoInputReadonly("Marca", $CmpMarca,4) 
                                . $this -> CampoInputReadonly("Cor", $CmpCor,4)
                                . $this -> CampoInputReadonly("Modelo", $CmpModelo,8)                                                            
                                . $this -> CampoInputReadonly("Cartão Estacionamento", $CmpCartao,4)
                                                              
                                . $this -> CampoHidden("val",$data["idObjeto"])
                                . $this ->CampoFimDIV()
                                . $this -> CampoFimDivisor()
                                . $this ->CampoLinha();
                $bicicleta++; 
            }
                    
            /*$ramalModel = $ramal -> ConsultaRamalApto($idApartamento);
            foreach($ramalModel as $item){
                $ramalNumero = $item -> CmpRamal;
            }*/
         
            $moradorModel = new \App\Classes\MoradorModel();
            
            $morador = $moradorModel -> ConsultarMorador2($idApartamento);
            foreach($morador as $item){
                
                if($item -> CmpEhMorador == "S"){
                    
                    $anexo = $anexoModel ->recuperaAnexo($item->idproprietario, "PRO");
                    if($anexo != ""){                
                        $data["imagem"] = $pastaPRO.$anexo;
                    }else{
                        $data["imagem"] = "img/silhueta.png";
                    } 
                    //echo $data["imagem"] . $item->idproprietario;
                    
                    $data["morador"] = $this -> CampoInicioDIV(3)
                                    . $this -> CampoImageReadonly( $data["imagem"], 3)
                                    . $this -> CampoFimDIV()
                                    . $this -> CampoInicioDIV(9)
                                    . $this -> CampoInputReadonly("Morador", $item -> nomeProp,12)
                                    . $this -> CampoInputReadonly("Apto - Bloco", $item->CmpApto ."-".$item->CmpBloco,2)
                                    . $this -> CampoInputReadonly("Tel", $item->telProp,3)
                                    . $this -> CampoInputReadonly("Cel", $item->celProp,3)
                                    //. $this -> CampoInputReadonly("Ramal",$ramalNumero ,3)
                                    . $this -> CampoFimDIV();    
                }else{
                    $anexo = $anexoModel ->recuperaAnexo($item->idmorador, "MOR");
                    if($anexo != ""){                
                        $data["imagem"] = $pastaMOR.$anexo;
                    }else{
                        $data["imagem"] = "img/silhueta.png";
                    } 
                    $data["morador"] = $this -> CampoInicioDIV(3)
                                    . $this -> CampoImageReadonly( $data["imagem"], 3)
                                    . $this -> CampoFimDIV()
                                    . $this -> CampoInicioDIV(9)
                                    . $this -> CampoInputReadonly("Morador", $item -> nomeMor,12)
                                    . $this -> CampoInputReadonly("Apto - Bloco", $item->CmpApto ."-".$item->CmpBloco,2)
                                    . $this -> CampoInputReadonly("Tel", $item->telMor,3)
                                    . $this -> CampoInputReadonly("Cel", $item->celMor,3)
                                    //. $this -> CampoInputReadonly("Ramal",$ramalNumero ,3)
                                    . $this -> CampoFimDIV();
                }
            
                
            }
            
        }
        
                
        //echo $data["morador"];
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["listaCarro"] = $listaCarro;
        $data["numCarro"] = $carro;
        $data["listaMoto"] = $listaMoto;
        $data["numMoto"] = $moto;
        $data["listaBicicleta"] = $listaBicicleta;
        $data["numBicicleta"] = $bicicleta;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
    //TELA VEICULO
    public function TelaEscalaServicoDetalhar($idEscalaServico){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idEscalaServico_decripto = $seguranca -> decripto($idEscalaServico);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(27, "det","Escala de Serviço","Escala de Serviço ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ESC","det"));
        
       
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        $turno = "";
        
       
        //PESQUISA DE VEICULO POR ID
        $escalaServicoModel = new \App\Classes\EscalaServicoModel();
        $escalaServico = $escalaServicoModel ->ConsultaEscalaServico($idEscalaServico); //consultarApartamentoPorId($id_decripto);
               
        // RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($escalaServico as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpDataEscala = $util->formatarDataMysqlParaExibicao($item->CmpDataEscala);
            $CmpNome = $item -> CmpNome; 
            $CmpObs = $item -> CmpObs;
           
            //$selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto($item ->funcionario_idfuncionario));            
            //$selectTurno = $this -> MontarCombosTurno($item -> CmpTurno);
                
            if($item -> CmpTurno == 1) $turno = "Manhã";
            if($item -> CmpTurno == 2) $turno = "Noite";
            //DEFININDO O TIPO DE ARQUIVO        
            //MONTAGEM FORMULARIO
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data Escala", $CmpDataEscala,2)
                                .  $this -> CampoInputReadonly("Turno", $turno,2)
                                . $this -> CampoInputReadonly("Nome", $CmpNome,12)
                                . $this ->CampoTextareaReadonly("Comentário", $CmpObs,12)
                                . $this -> CampoHidden("val",$data["idObjeto"]);
                                //. $this -> ListaAnexo($listaAnexos, 8);
            
        }
        return $data;
    }
    
    
    //TELA VEICULO
    public function TelaPontoDetalhar($idPonto){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPonto_decripto = $seguranca -> decripto($idPonto);
        $anexoModel = new \App\Classes\AnexoModel();
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pastaPro = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(27, "det","Escala de Serviço","Escala de Serviço ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PON","det"));
               
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        $turno = "";        
       
        //PESQUISA DE VEICULO POR ID
        $pontoModel = new \App\Classes\PontoModel();
        $ponto = $pontoModel -> ConsultaPonto($idPonto); //consultarApartamentoPorId($id_decripto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($ponto as $item){
        
            if($item->CmpDataEntrada != null){
                $CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpDataEntrada);
            }else{
                $CmpDataEntrada = "";
            }
            if($item->CmpDataSaida != null){
                $CmpDataSaida = $util->formatarDataMysqlParaExibicao($item->CmpDataSaida);
            }else{
                $CmpDataSaida = "";
            }    
            
            $CmpNome = $item -> CmpNome; 
            $CmpObs = $item -> CmpObs;
                 
            //MONTAGEM FORMULARIO
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Entrada", $CmpDataEntrada,4) 
                                . $this -> CampoInputReadonly("Saída", $CmpDataSaida,4) 
                                . $this -> CampoInputReadonly("Nome", $CmpNome,12)
                                . $this ->CampoTextareaReadonly("Comentário", $CmpObs,12)
                                . $this -> CampoHidden("val",$data["idObjeto"]);
                                //. $this -> ListaAnexo($listaAnexos, 8);
            
            //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idRecuperaAnexo, "MOR");  
            $imagem = $anexoModel ->recuperaAnexo($item ->idfuncionarios, "FUN");
            if($imagem != ""){                
                $data["imagem"] = $pastaPro.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
                
            $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
            
        }
        return $data;
    }
    
    //TELA VEICULO
    public function TelaFuncaoDetalhar($idFuncao){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $funcaoModel = new \App\Classes\FuncaoModel();
        $turnoModel = new \App\Classes\TurnoModel();
        $idFuncao_decripto = $seguranca -> decripto($idFuncao);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(31, "det","Função","Função ");
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUN","det"));
               
        $data["idObjeto"] = $idFuncao;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        
        $inicioPri = "";
        $fimPri = "";
        $obsPri = "";
        
        $inicioSeg = "";
        $fimSeg = "";
        $obsSeg = "";
        
        $i =0;   
        //PESQUISA DE VEICULO POR ID        
        $funcao = $funcaoModel ->ConsultaFuncao($idFuncao);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($funcao as $item){
        
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] =   $this -> CampoInputReadonlyGliphycon("Data ", $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao),"calendar",2)
                                . $this -> CampoInputReadonlyGliphycon("Função ", strtoupper($item -> CmpDescricao),"generico",10)
                                . $this -> CampoTextareaReadonlyGliphycon("Texto Ajuda", $item -> CmpTextoAjuda,"comentario",12)
                                . $this -> CampoTextareaReadonlyGliphycon("Comentário", $item -> CmpObs,"comentario",12)                          
                                . $this -> CampoHidden("val",$data["idObjeto"]);
                                //. $this -> ListaAnexo($listaAnexos, 8);
        }
        
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    //TELA VEICULO
    public function TelaFolgaDetalhar($idFuncionario,$ano){
        
        $data = array();         
        $util = new \App\Util\Util();        
       /* echo "<BR>";
        echo " FUNC ". $idFuncionario;
        echo "<BR>";
        echo " ANO ". $ano;
        echo "<BR>";*/
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $turnoModel = new \App\Classes\TurnoModel();
        $idFuncionario_decripto = $seguranca -> decripto($idFuncionario);
        //echo "<br>";
        //echo "teste ---------------------" . $ano;
        $idAno_Cripto = $ano;
        $ano = $seguranca -> decripto($ano);
        
        $anexoModel = new \App\Classes\AnexoModel();
        $factory = new \App\DesignPattern\FactoryMethod();       
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        //echo "<br>";
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOL","det"));
               
        $data["idObjeto"] = $idFuncionario;
        
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        
        $inicioPri = "";
        $fimPri = "";
        $obsPri = "";
        
        $inicioSeg = "";
        $fimSeg = "";
        $obsSeg = "";
        
        $i = 0;   
        
        $funcionarioModel = new \App\Classes\FuncionarioModel();
        $funcionario = $funcionarioModel -> ConsultaFuncionario($idFuncionario);//ConsultaBem($seguranca->cripto(0));

        $data["formulario1"] = "";
        
        foreach($funcionario as $item){
            $data["formulario"] = $this -> CampoInputReadonlyGliphycon("Funcionário", strtoupper($item->CmpNome),"user", 7)
                    . $this -> CampoInputReadonlyGliphycon("Função", $item->CmpDescricao,"user", 5);
        }
        
        //PESQUISA DE VEICULO POR ID        
        $lista = $ocorrenciaModel -> ConsultarOcorrenciasPorCategoria2($idFuncionario,$idAno_Cripto, 3);
               
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
                   
        $janeiro = $ano . "-01-";
        $fevereiro = $ano . "-02-";
        $marco = $ano . "-03-";
        $abril = $ano . "-04-";
        $maio = $ano . "-05-";
        $junho = $ano . "-06-";
        $julho = $ano . "-07-";
        $agosto = $ano . "-08-";
        $setembro = $ano . "-09-";
        $outubro = $ano . "-10-";
        $novembro = $ano . "-11-";
        $dezembro = $ano . "-12-";
        
         // echo $lista;
       
        $data["janeiro"] = $this->CampoInicioPainel("JANEIRO", 12) . $util -> MontarCalendarioDetalhar($janeiro, 1,"jan",$lista) . $this->CampoFimPainel();        
        $data["fevereiro"] = $this->CampoInicioPainel("FEREVEIRO", 12) .$util -> MontarCalendarioDetalhar($fevereiro, 2,"fev",$lista). $this->CampoFimPainel();
        $data["marco"] = $this->CampoInicioPainel("MARÇO", 12) .$util -> MontarCalendarioDetalhar($marco,3,"mar",$lista). $this->CampoFimPainel();
        $data["abril"] = $this->CampoInicioPainel("ABRIL", 12) .$util -> MontarCalendarioDetalhar($abril, 4,"abr",$lista). $this->CampoFimPainel();
        $data["maio"] = $this->CampoInicioPainel("MAIO", 12) .$util -> MontarCalendarioDetalhar($maio, 5,"mai",$lista). $this->CampoFimPainel();
        $data["junho"] = $this->CampoInicioPainel("JUNHO", 12) .$util -> MontarCalendarioDetalhar($junho, 6,"jun",$lista). $this->CampoFimPainel();
        $data["julho"] = $this->CampoInicioPainel("JULHO", 12) .$util -> MontarCalendarioDetalhar($julho, 7,"jul",$lista). $this->CampoFimPainel();
        $data["agosto"] = $this->CampoInicioPainel("AGOSTO", 12) .$util -> MontarCalendarioDetalhar($agosto, 8,"ago",$lista). $this->CampoFimPainel();
        $data["setembro"] = $this->CampoInicioPainel("SETEMBRO", 12) .$util -> MontarCalendarioDetalhar($setembro, 9,"set",$lista). $this->CampoFimPainel();
        $data["outubro"] = $this->CampoInicioPainel("OUTUBRO", 12) .$util -> MontarCalendarioDetalhar($outubro, 10, "out",$lista). $this->CampoFimPainel();
        $data["novembro"] = $this->CampoInicioPainel("NOVEMBRO", 12) .$util -> MontarCalendarioDetalhar($novembro, 11,"nov",$lista). $this->CampoFimPainel();
        $data["dezembro"] = $this->CampoInicioPainel("DEZEMBRO", 12) .$util -> MontarCalendarioDetalhar($dezembro, 12,"dez",$lista). $this->CampoFimPainel();

        $data["botao"] = "S"; 
        
        $data["ano"] = $idAno_Cripto;
        $data["ano_titulo"] = $ano;
        //$data["idOcorrencia"] = 
        
        $imagem = $anexoModel ->recuperaAnexo($idFuncionario_decripto, "FUN");
        if($imagem != ""){                
            $data["imagem"] = $pasta.$imagem;
        }else{
            $data["imagem"] = "img/silhueta.png";
        }
                    
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    public function TelaPlanoContasDetalhar($idPlanoContas){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPlanoContas_decripto = $seguranca -> decripto($idPlanoContas);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(23, "det","Financeiro","Plano de Contas ");
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLCO","det"));
        
       
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        
       
        //PESQUISA DE VEICULO POR ID
        $planoContasModel = new \App\Classes\PlanoContasModel();
        $planoContas = $planoContasModel -> ConsultaPlanoContas($idPlanoContas);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($planoContas as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            //$CmpDescricao = $item -> CmpDescricao;
            $CmpNomeConta = $item -> CmpConta;
            //$CmpClassificacao = $item -> CmpClassificacao;
            
            if($item -> CmpCategoriaConta == "D")  $CmpCategoriaConta = "Despesa";
            if($item -> CmpCategoriaConta == "R")  $CmpCategoriaConta = "Receita";          
                    
        echo $CmpCategoriaConta;
            
            //DEFININDO O TIPO DE ARQUIVO        
            //MONTAGEM FORMULARIO
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Descrição ", $CmpNomeConta,12)                                       
                                . $this -> CampoInputReadonly("Categoria", $CmpCategoriaConta,4)                                
                                . $this -> CampoHidden("val",$data["idObjeto"]);
                                //. $this -> ListaAnexo($listaAnexos, 8);
        }
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        
        return $data;
    }
    
    public function TelaPagamentoDetalhar($idPagamento){
        
        $data = array(); 
        $teste = array();         
        $util = new \App\Util\Util();        
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPagamento_decripto = $seguranca -> decripto($idPagamento);
        
        $saldoModel = new \App\Classes\SaldoAtualContaModel();
        $previsaoOrcamentaria = new \App\Classes\PrevisaoOrcamentariaModel();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(23, "det","Financeiro","Plano de Contas ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PAG","det"));
               
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;  
        $saldo = 0;
        $previsao = 0;
        $total = 0;
        $disponivel = 0;
        $utilizado = 0;
        $tipoConsumo = "";
        
        $CmpFornecedor = "";
        $CmpSubConta = "";
        $CmpClasseMovimento = "";
        $CmpDataPagamento = "";
        $CmpDataPagamento = "";
                
        //PESQUISA DE VEICULO POR ID
        $pagamentoModel = new \App\Classes\PagamentoModel();
        $pagamento = $pagamentoModel -> ConsultaPagamento($idPagamento);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($pagamento as $item){
        
            $CmpDataVencimento = $util-> formatarDataMysqlParaExibicao($item->CmpDataVencimento);
            if($item->CmpDataPagamento != "")  $CmpDataPagamento = $util->formatarDataMysqlParaExibicao($item->CmpDataPagamento);
            $CmpValor = $util->FormatNumber($item -> CmpValor);
            $CmpMesAno = $item -> CmpMesAno;
            $CmpDescricao = $item -> CmpDescricao;
            $CmpConta = $item -> CmpConta;  
            
            $status = $util-> StatusPagamento($item -> CmpStatus);
                               
            $data["status"] = $item -> CmpStatus;
            
            $data["formulario"] = $this ->CampoInputReadonly("Vencimento",$CmpDataVencimento,2)
                            . $this ->CampoInputReadonly("Baixa",$CmpDataPagamento,2)
                            . $this ->CampoInputReadonly("Valor","R$ ".$CmpValor,3)                          
                                 
                            . $this ->CampoInputReadonly("Situação",$status,3) 
                            . $this ->CampoInputReadonly("Conta",strtoupper($CmpConta),6)
                            . $this ->CampoTextareaReadonly("Comentário", $CmpDescricao,12);                  
                    
            $vetor = explode("_",$CmpMesAno);
            $data["RefMesAno"] = $util -> mes_extenso_previsao($CmpMesAno) ." de ". substr($CmpMesAno, 3, strlen($CmpMesAno));
            $data["RefMes"] = $util -> mes_extenso_previsao($CmpMesAno);
            $data["RefAno"] = substr($CmpMesAno, 3, strlen($CmpMesAno));
            $data["conta"] = $CmpConta;
            /**
             * 24/02/2021 - Alterado para recuperar dados da propria programação financeira.
             * echo $saldo = $saldoModel -> consultaSaldoTotalConta($item ->planocontas_idplanocontas, $vetor[1],$vetor[0]);
             */
            setlocale(LC_MONETARY, 'en_PT');
            $saldo = $pagamentoModel -> ConsultaTotalPagamentoPorConta_V2($item -> planocontas_idplanocontas, $CmpMesAno);
            $data["utilizado"] = number_format($saldo,2,",",".");
            //echo "<br>";  
  
            //PREVISAO
            echo $previsao = $previsaoOrcamentaria -> ConsultaPrevisaoOrcamentariaMensal($item ->planocontas_idplanocontas, $vetor[1],$vetor[0]);
            $data["disponivel"] = number_format($previsao,2,",",".");
            //echo "<BR>";
            
            if($saldo == 0 && $previsao == 0){ //SEM PREVISAO E UTILIZADO
               // echo "-1-";
                $disponivel = 0; 
                $utilizado = 0;
            }
            
            if($saldo > 0 && $previsao == 0){ // SEM PREVISAO E UTILIZADO 
                //echo "-2-";
                $disponivel = 0; 
                $utilizado = 100;
            }
            
            if($saldo == 0 && $previsao > 0){
                //echo "-3-";
                $disponivel = 100;
                $utilizado = 0;
            }
            
            if($saldo > 0 && $previsao > 0){                
                //echo "-4-";
                if($previsao > $saldo){
                    $disponivel = $previsao - $saldo; 
                    $utilizado = $saldo;    
                }else{
                    $disponivel = 0; 
                    $utilizado = 100;
                }                
            }
        
            
        }
                
        //echo $disponivel . " - " . $utilizado . "<BR>";
        //DADOS PARA O GRÁFICO
        $data["ocorrencias"] = '{
                            label: " Disponível",
                            data: '.$disponivel.'}, {
                            label: " Consumido",
                            data: '.$utilizado.'}';
        
        $data["idObjeto"] = $idPagamento;
        $data["id2"] = $CmpConta; // CONTA
        $data["id3"] = $CmpDataVencimento; // VENCIMENTO
       
        
        $data["TipoDonoDocumento"] = $seguranca -> cripto("PAG"); 
        $data["dataPag"] = $CmpDataPagamento;
        $teste = $util -> ParametrosControleAcessoApresentacao("PAG","");
        $data["categoria_objeto"] = $teste["categoria_objeto"];
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
     public function TelaRecebimentoDetalhar($idRecebimento){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idRecebimento_decripto = $seguranca -> decripto($idRecebimento);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(23, "det","Financeiro","Plano de Contas ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REC","det"));
               
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;  
        
        $CmpFornecedor = "";
        $CmpSubConta = "";
       
        //PESQUISA DE VEICULO POR ID
        $recebimentoModel = new \App\Classes\RecebimentoModel();
        $recebimento = $recebimentoModel ->ConsultaRecebimento($idRecebimento);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($recebimento as $item){
        
            $CmpRecebido = $util->formatarDataMysqlParaExibicao($item->CmpRecebido);
            //$CmpDataPagamento = $util->formatarDataMysqlParaExibicao($item->CmpDataPagamento);
            $CmpValor = $item -> CmpValor;
            $CmpMesAno = $item -> CmpMesAno;
            $CmpFormaPagamento = $item -> CmpClasseMovimento;
            $CmpDescricao = $item -> CmpDescricao;
            
            if($item -> CmpClasseMovimento == 2)  $CmpClasseMovimento = "Á Vista";
            if($item -> CmpClasseMovimento == 1)  $CmpClasseMovimento = "Cheque";
            
            /*if($item -> fornecedores_idfornecedores != ""){
                $fornecedor = \App\Fornecedores::find($item -> fornecedores_idfornecedores);
                $CmpFornecedor = $fornecedor -> CmpRazaoSocial;
            }*/
            
            $CmpConta = $item -> CmpNomeConta;
            
            //$subConta = \App\PlanoSubContas::find();
            //$CmpSubConta = $subConta -> CmpNomeSubConta;
            
            $data["formulario"] = $this ->CampoInputReadonly("Recebimento",$CmpRecebido,2)
                            
                            . $this ->CampoInputReadonly("Valor",$CmpValor,2)
                            . $this ->CampoInputReadonly("Forma Pagamento",$CmpClasseMovimento,2)
                            
                            . $this ->CampoInputReadonly("Conta",$CmpConta,2)
                            . $this ->CampoInputReadonly("SubConta",$CmpSubConta,2)
                           
                            . $this ->CampoTextareaReadonly("Observação", $CmpDescricao,12);
                  
                    
        }
                
        return $data;
    }
    
     public function TelaPlanoSubContasDetalhar($idPlanoContas,$idPlanoSubContas){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPlanoContas_decripto = $seguranca -> decripto($idPlanoContas);
        $idPlanoSubContas_decripto = $seguranca -> decripto($idPlanoSubContas);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(23, "det","Financeiro","Plano de Contas ");
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLSUCO","det"));
        
       
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        
       
        //PESQUISA DE VEICULO POR ID
        $planoSubContasModel = new \App\Classes\PlanoSubContasModel();
        $planoSubContas = $planoSubContasModel ->ConsultaPlanoSubContas($idPlanoContas, $idPlanoSubContas);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($planoSubContas as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpDescricao = $item -> CmpDescricao;
            $CmpNomeConta = $item -> CmpNomeSubConta;
            $CmpClassificacao = $item -> CmpClassificacao;
            
            if($item -> CmpCategoriaConta == 2)  $CmpCategoriaConta = "Despesa";
            if($item -> CmpCategoriaConta == 1)  $CmpCategoriaConta = "Receita";
            
            
          
                    
        }
            
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("SubConta ", $CmpNomeConta,12)
                            . $this -> CampoInputReadonly("Classificação", $CmpClassificacao,4)                          
                            . $this -> CampoInputReadonly("Categoria Conta", $CmpCategoriaConta,4)
                            . $this -> CampoTextareaReadonly("Descrição", $CmpDescricao,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();


        return $data;
    }
    
    //MODELO ANTIGO MOSTRANDO TODOS AS CONTAS. MUDANDO PARA A VERSAO 
    public function TelaPrevisaoOrcamentariaContasDetalhar($idResumoPrevisaoOrcamentaria){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idResumoPrevisaoOrcamentaria_decripto = $seguranca -> decripto($idResumoPrevisaoOrcamentaria);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(72, "det","Financeiro","Previsão Orçamentária ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PREORC","det"));
               
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
               
        $lista = "";
        
        
        //PESQUISA DE VEICULO POR ID
        $previsaoOrcamentariaModel = new \App\Classes\PrevisaoOrcamentariaModel();
        $previsaoOrcamentaria = $previsaoOrcamentariaModel -> ConsultaPrevisaoOrcamentariaPorTipoConta($idResumoPrevisaoOrcamentaria,"DESPESA");
        //echo "LISTA " . count($previsaoOrcamentaria);
        //echo "<BR>";
        $lista = $lista . $this -> CampoHeader("Contas de Despesa");
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($previsaoOrcamentaria as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            
            $lista = $lista . $this->CampoInicioPainel("Conta", 12)
                            . $this ->CampoInputReadonlyTamanho("Conta","conta",strtoupper($item->CmpNomeConta),6)
                            . $this ->CampoInputReadonlyTamanho("SubConta","subconta",strtoupper($item->CmpNomeSubConta),6)
                            . $this ->CampoInputReadonly("JAN"," R$ ".$item->CmpMontanteJaneiro,2)
                            . $this ->CampoInputReadonly("FEV",$item->CmpMontanteFevereiro,2)
                            . $this ->CampoInputReadonly("MAR",$item->CmpMontanteMarco,2)
                            . $this ->CampoInputReadonly("ABR",$item->CmpMontanteAbril,2)
                            . $this ->CampoInputReadonly("MAI",$item->CmpMontanteMaio,2)
                            . $this ->CampoInputReadonly("JUN",$item->CmpMontanteJunho,2)
                            . $this ->CampoInputReadonly("JUL",$item->CmpMontanteJulho,2)
                            . $this ->CampoInputReadonly("AGO",$item->CmpMontanteAgosto,2)
                            . $this ->CampoInputReadonly("SET",$item->CmpMontanteSetembro,2)
                            . $this ->CampoInputReadonly("OUT",$item->CmpMontanteOutubro,2)
                            . $this ->CampoInputReadonly("NOV",$item->CmpMontanteNovembro,2)
                            . $this ->CampoInputReadonly("DEZ",$item->CmpMontanteDezembro,2)
                            . $this ->CampoInputReadonly("Total",$item->CmpValorOriginal,2)
                            . $this ->CampoHidden("cr",$item->idplano_contas)
                            . $this ->CampoFimPainel();
            
          
                    
        }
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $lista;
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        return $data;
    }
    
    public function TelaPrevisaoOrcamentariaContasDetalharV3(Request $request,$idResumoPrevisaoOrcamentaria){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idResumoPrevisaoOrcamentaria_decripto = $seguranca -> decripto($idResumoPrevisaoOrcamentaria);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(72, "det","Financeiro","Previsão Orçamentária ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PREORC","det"));
               
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
               
        $lista = "";        
       
        //PESQUISA DE VEICULO POR ID
        $previsaoOrcamentariaModel = new \App\Classes\PrevisaoOrcamentariaModel();
        //$previsaoOrcamentaria = $previsaoOrcamentariaModel -> ConsultaPrevisaoOrcamentariaPorTipoConta($idResumoPrevisaoOrcamentaria,"DESPESA");
        
        $selectContas = $this -> MontarCombosContas($seguranca -> cripto(0),"DES");   
        //$selectSubContas = $this -> MontarCombosSubContas($idPlanoContas, $idPlanoSubContas);
        //echo "LISTA " . count($previsaoOrcamentaria);
        //echo "<BR>";
        
        if ($request->isMethod("post")) {
            
            $previsaoOrcamentaria = $previsaoOrcamentariaModel -> ConsultaPrevisaoOrcamentariaPorConta($seguranca->cripto($request->input("contas")),$idResumoPrevisaoOrcamentaria);
            
                    $lista = $lista . $this -> CampoHeader("Contas de Despesa");
                    //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
                    foreach($previsaoOrcamentaria as $item){

                        $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);

                        $lista = $lista . $this->CampoInicioPainel("Conta", 12)
                                        . $this ->CampoInputReadonlyTamanho("Conta","conta",strtoupper($item->CmpNomeConta),6)
                                        . $this ->CampoInputReadonlyTamanho("SubConta","subconta",strtoupper($item->CmpNomeSubConta),6)
                                        . $this ->CampoInputReadonly("JAN",$util ->FormatNumber($item->CmpMontanteJaneiro),2)
                                        . $this ->CampoInputReadonly("FEV",$util ->FormatNumber($item->CmpMontanteFevereiro),2)
                                        . $this ->CampoInputReadonly("MAR",$util ->FormatNumber($item->CmpMontanteMarco),2)
                                        . $this ->CampoInputReadonly("ABR",$util ->FormatNumber($item->CmpMontanteAbril),2)
                                        . $this ->CampoInputReadonly("MAI",$util ->FormatNumber($item->CmpMontanteMaio),2)
                                        . $this ->CampoInputReadonly("JUN",$util ->FormatNumber($item->CmpMontanteJunho),2)
                                        . $this ->CampoInputReadonly("JUL",$util ->FormatNumber($item->CmpMontanteJulho),2)
                                        . $this ->CampoInputReadonly("AGO",$util ->FormatNumber($item->CmpMontanteAgosto),2)
                                        . $this ->CampoInputReadonly("SET",$util ->FormatNumber($item->CmpMontanteSetembro),2)
                                        . $this ->CampoInputReadonly("OUT",$util ->FormatNumber($item->CmpMontanteOutubro),2)
                                        . $this ->CampoInputReadonly("NOV",$util ->FormatNumber($item->CmpMontanteNovembro),2)
                                        . $this ->CampoInputReadonly("DEZ",$util ->FormatNumber($item->CmpMontanteDezembro),2)
                                        . $this ->CampoInputReadonly("Total",$util ->FormatNumber($item->CmpValorOriginal),2)
                                        . $this ->CampoHidden("cr",$item->idplano_contas)
                                        . $this ->CampoFimPainel()
                                        . $this ->CampoLinha();

                    }

        }
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] =  $this -> CampoSelectGliphycon("Relação de Contas", "contas", "", $selectContas, "NAO",12);
                            
        $data["lista"] = $lista;
        //echo " - " . $request->input("contas") . " - ";
        $data["conta"] = $seguranca->cripto($request->input("contas"));
        
        return $data;
    }
    
    
    
    //VERSAO QUATRO DA FUNCIONALIDADE
    public function TelaPrevisaoOrcamentariaContasDetalharV4($idResumoPrevisaoOrcamentaria,$idConta){
        
        $data = array();         
        $util = new \App\Util\Util();
        //echo "teste " . $idResumoPrevisaoOrcamentaria . " - ".$idConta ."<BR>";
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idResumoPrevisaoOrcamentaria_decripto = $seguranca -> decripto($idResumoPrevisaoOrcamentaria);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(72, "det","Financeiro","Previsão Orçamentária ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PREORC","det"));
               
        $data["idObjeto"] = $idResumoPrevisaoOrcamentaria;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
               
        $lista = "";        
       
        //PESQUISA DE VEICULO POR ID
        $previsaoOrcamentariaModel = new \App\Classes\PrevisaoOrcamentariaModel();
        //$previsaoOrcamentaria = $previsaoOrcamentariaModel -> ConsultaPrevisaoOrcamentariaPorTipoConta($idResumoPrevisaoOrcamentaria,"DESPESA");
        
        $selectContas = $this -> MontarCombosContas($seguranca -> cripto(0),"DES"); 
            $previsaoOrcamentaria = $previsaoOrcamentariaModel -> ConsultaPrevisaoOrcamentariaPorConta($idConta,$idResumoPrevisaoOrcamentaria);
            
                    $lista = $lista . $this -> CampoHeader("Contas de Despesa");
                    //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
                    foreach($previsaoOrcamentaria as $item){

                        $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);

                        $lista = $lista . $this->CampoInicioPainel("Conta", 12)
                                        . $this ->CampoInputReadonlyTamanho("Conta","conta",strtoupper($item->CmpNomeConta),6)
                                        . $this ->CampoInputReadonlyTamanho("SubConta","subconta",strtoupper($item->CmpNomeSubConta),6)
                                        . $this ->CampoInputReadonly("JAN",$util ->FormatNumber($item->CmpMontanteJaneiro),2)
                                        . $this ->CampoInputReadonly("FEV",$util ->FormatNumber($item->CmpMontanteFevereiro),2)
                                        . $this ->CampoInputReadonly("MAR",$util ->FormatNumber($item->CmpMontanteMarco),2)
                                        . $this ->CampoInputReadonly("ABR",$util ->FormatNumber($item->CmpMontanteAbril),2)
                                        . $this ->CampoInputReadonly("MAI",$util ->FormatNumber($item->CmpMontanteMaio),2)
                                        . $this ->CampoInputReadonly("JUN",$util ->FormatNumber($item->CmpMontanteJunho),2)
                                        . $this ->CampoInputReadonly("JUL",$util ->FormatNumber($item->CmpMontanteJulho),2)
                                        . $this ->CampoInputReadonly("AGO",$util ->FormatNumber($item->CmpMontanteAgosto),2)
                                        . $this ->CampoInputReadonly("SET",$util ->FormatNumber($item->CmpMontanteSetembro),2)
                                        . $this ->CampoInputReadonly("OUT",$util ->FormatNumber($item->CmpMontanteOutubro),2)
                                        . $this ->CampoInputReadonly("NOV",$util ->FormatNumber($item->CmpMontanteNovembro),2)
                                        . $this ->CampoInputReadonly("DEZ",$util ->FormatNumber($item->CmpMontanteDezembro),2)
                                        . $this ->CampoInputReadonly("Total",$util ->FormatNumber($item->CmpValorOriginal),2)
                                        . $this ->CampoHidden("cr",$item->idplano_contas)
                                        . $this ->CampoFimPainel();



                    }

        //}
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] =  $this -> CampoSelectGliphycon("Contas", "contas", "", $selectContas, "NAO",12);
                            
        $data["lista"] = $lista;
        //echo " - " . $request->input("contas") . " - ";
        $data["conta"] = $idConta;
        
        return $data;
    }
    
   
    
    //MODELO ANTIGO MOSTRANDO TODOS AS CONTAS. MUDANDO PARA A VERSAO 
    public function TelaPrevisaoOrcamentariaContasDetalharV5($idResumoPrevisaoOrcamentaria){
        
        $contador = 0;
        $ano = "";
        $listaPainelTotal = "";
        
        $contasDefinidas = 0;
        $totalContas = 0;
        
        $data = array();         
        $util = new \App\Util\Util();
        $resumoPrevisaoOrcamentaria = new \App\Classes\ResumoPrevisaoOrcamentariaModel();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idResumoPrevisaoOrcamentaria_decripto = $seguranca -> decripto($idResumoPrevisaoOrcamentaria);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(72, "det","Financeiro","Previsão Orçamentária ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PREORC","det"));
               
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
               
        $lista = "";
        
        $planoContasModel = new \App\Classes\PlanoContasModel();
        $listaPlanoContas = $planoContasModel -> ConsultaPlanoContasPorTipo("DES");
        foreach($listaPlanoContas as $item){
            $contas[trim($item->CmpConta)] = "";
        }
         
        //$selectAno = $this -> MontarCombosAno2();     
        
        //PESQUISA DE VEICULO POR ID
        $previsaoOrcamentariaModel = new \App\Classes\PrevisaoOrcamentariaModel();
        $previsaoOrcamentaria = $previsaoOrcamentariaModel -> ConsultaPrevisaoOrcamentariaPorTipoConta($idResumoPrevisaoOrcamentaria,"DESPESA");
        //echo "LISTA " . count($previsaoOrcamentaria);
        //echo "<BR>";
        $lista = $lista . $this -> CampoHeader("Contas de Despesa");
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($previsaoOrcamentaria as $item){
        
            if($item ->CmpAno > 0) $ano = $item ->CmpAno;
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            
            //if($item->idprevisao_orcamentarias != null){
                
                $lista = $this ->CampoInputReadonly("JAN"," R$ ".$util->FormatNumber($item->CmpMontanteJaneiro),3)
                                . $this ->CampoInputReadonly("FEV"," R$ ".$util->FormatNumber($item->CmpMontanteFevereiro),3)
                                . $this ->CampoInputReadonly("MAR"," R$ ".$util->FormatNumber($item->CmpMontanteMarco),3)
                                . $this ->CampoInputReadonly("ABR"," R$ ".$util->FormatNumber($item->CmpMontanteAbril),3)
                                . $this ->CampoInputReadonly("MAI"," R$ ".$util->FormatNumber($item->CmpMontanteMaio),3)
                                . $this ->CampoInputReadonly("JUN"," R$ ".$util->FormatNumber($item->CmpMontanteJunho),3)
                                . $this ->CampoInputReadonly("JUL"," R$ ".$util->FormatNumber($item->CmpMontanteJulho),3)
                                . $this ->CampoInputReadonly("AGO"," R$ ".$util->FormatNumber($item->CmpMontanteAgosto),3)
                                . $this ->CampoInputReadonly("SET"," R$ ".$util->FormatNumber($item->CmpMontanteSetembro),3)
                                . $this ->CampoInputReadonly("OUT"," R$ ".$util->FormatNumber($item->CmpMontanteOutubro),3)
                                . $this ->CampoInputReadonly("NOV"," R$ ".$util->FormatNumber($item->CmpMontanteNovembro),3)
                                . $this ->CampoInputReadonly("DEZ"," R$ ".$util->FormatNumber($item->CmpMontanteDezembro),3)
                                . $this ->CampoVazio(9)
                                . $this ->CampoInputReadonly("Total"," R$ ".$util->FormatNumber($item->CmpValorOriginal),3);
                               

                                if($item->CmpValorOriginal > 0) $contasDefinidas++;
                $totalContas++;                
                $contas[trim($item->CmpConta)] = $contas[trim($item->CmpConta)] . $lista;
            //}        
        }
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        //$data["formulario"] = $lista;
               
        //FORMATAÇÃO DA LISTA DE CONTAS
        foreach($listaPlanoContas as $item){           
            $listaPainelTotal = $listaPainelTotal . $this->MontarTelaCorpoPAINELFAQ(strtoupper($item->CmpConta), $contas[trim($item->CmpConta)], "primary",$contador);
            $contador++;
        }
        
        //RESUMO PREVISAO ORCAMENTARIA, APRESENTAÇÃO DE VALORES FINANCEIROS.
        $resumo = $resumoPrevisaoOrcamentaria -> ConsultaResumoPrevisaoOrcamentaria($idResumoPrevisaoOrcamentaria);
        foreach($resumo as $item2){
            $montantePrevisto = $item2 -> CmpMontantePrevisto;
            $obs = $item2 -> CmpObs;
        }
     
        $listaPainelTotal = $this->CampoInicioDIV(4)  
                . $this -> CampoHeader("Ano Base") 
                . $this ->CampoInputReadonlyTamanho("", "", $ano, 12)
                . " <div class='col-lg-12'><div id='morris-donut-chart'></div></div>"
                . $this->CampoFimDIV()
                . $this->CampoInicioDIV(8)  
                . $this -> CampoHeader("Contas de Despesa")
                . $listaPainelTotal  
                . $this ->CampoTextareaReadonlyGliphycon("Comentário", $obs,"comentario",12)
                . $this->CampoFimDIV(); 
        /*$data["ListaContas"] = $this -> CampoHeader("Contas de Despesa") 
                . $this->  MontarTelaInicioPAINELFAQ() . $listaPainelTotal . $this->MontarTelaFimPAINELFAQ()
                . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12) . $lista; //segundo tipo de forumalrios*/
        
        $data["formulario"] = $listaPainelTotal;
        $data["contasDefinidas"] = $contasDefinidas;
        $data["contasTotal"] = $totalContas;
        
        $data["idObjeto"] = $idResumoPrevisaoOrcamentaria;
        //$data["conta"] =
        return $data;
    }
    
    //TELA VEICULO
    public function TelaFuncionarioDetalhar($idFuncionario){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $anexoModel = new \App\Classes\AnexoModel();
        $nacionalidade = new \App\Classes\Nacionalidade();
        $naturalidade = new \App\Classes\Naturalidade();
        
        $idFuncionario_decripto = $seguranca -> decripto($idFuncionario);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Funcionário","Funcionário ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUNC","det"));
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
                
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "FUN","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        //$arquivo = "clientes/".$pasta."/funcionario/";

        //PESQUISA DE VEICULO POR ID
        $funcionarioModel = new \App\Classes\FuncionarioModel();
        $funcionario = $funcionarioModel -> ConsultaFuncionario($idFuncionario);
             
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($funcionario as $item){
        
            //$CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            if($item->CmpDataNasc != ""){
                $CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            }else{
                $CmpDataNasc = "";
            } 
            //$CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            
            if($item->CmpEntradaCondominio != ""){
                $CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            }else{
                $CmpDataEntrada = "";
            } 
           
            if($item->CmpSaidaCondominio != ""){
                $CmpDataSaida = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
            }else{
                $CmpDataSaida = "";
            }    
            $CmpNome = $item -> CmpNome;
             
            $conjuge = $item -> CmpConjuge;
            $email = $item -> CmpEmail;
            $ehDeficiente = $item -> CmpEhDeficiente;
            $tel = $item -> CmpTel;
            $cel = $item -> CmpCel;
            $pai = $item -> CmpPai;
            $mae = $item -> CmpMae;
            
            //id para a pagina
            $idObjeto = $data["idObjeto"] = $seguranca -> cripto($idFuncionario_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("FUN");
            //$data["rotulo"] = $seguranca -> cripto(" Veículo " . strtoupper($CmpPlaca));
  
            //BUSCAR IMAGEM DO VEICULO
            $imagem = $anexoModel -> recuperaAnexo($idFuncionario_decripto, "FUN");
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }            
            
            
            $estCivil = $util -> SituacaoEstadoCivil($item ->CmpEstCivil);
            $natura = $naturalidade ->DescricaoNaturalidade($naturalidade -> ConsultarNaturalidade ($item -> CmpNaturalidade,$item -> CmpNacionalidade));
            $naciona = $nacionalidade -> DescricaoNacionalidade($nacionalidade -> ConsultarNacionalidade($item -> CmpNacionalidade));
            $ehDeficiente = $util -> deficiente($item -> CmpEhDeficiente);
            
            //$profissao = $item -> profProp;
            $escolaridade = $util -> escolaridade($item -> CmpEscolaridade);
            $funcao = $item -> CmpDescricao;
            
            $obs = $item -> CmpObs;
            $obsDoc = $item -> CmpObsDoc;           
            $endereco = $item -> CmpEndereco;
            
            $selectCatProduto = $this -> montarCombos("catProduto",0);        
            $selectCatVeiculo = $this -> montarCombos("catVeiculo",0);
            $selectVagaGaragem = $this -> MontarCombosVagaGaragem(0);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
            $selectCartao = $this -> MontarCombosCartaoEstacionamento(0);//montarCombos("catCartao",0);

            $selectNaturalidade = $this -> MontarCombosNaturalidade(0,$item -> CmpNacionalidade);
            $selectNacionalidade = $this -> MontarCombosNacionalidade(0);
            $selectEhDecifiente = $this -> MontarCombosSIM_NAO(0);
            
            $selectEscolaridade = $this -> MontarCombosEscolaridade(0);  
            $selectFuncao = $this -> MontarCombosFuncao($seguranca->cripto(0));            
            $selectUF = $util -> UnidadeFederacao($item -> uf_iduf);
                        
            //DOCUMENTOS OFICIAIS
            $CmpCPF = $item -> CmpCPF;
            $cartMot = $item -> CmpCarteiraMotorista;
            $titulo = $item -> CmpTituloEleitor;
            $docIdent = $item -> CmpDocIdent;
            $cerMilitar = $item -> CmpCertificadoMilitar;
            $pis = $item -> CmpPis;
            $carTrabalho = $item -> CmpCTPS;
            $carRuralTrabalho = $item -> CmpCTPSRural;
            $serieCPTS = $item -> CmpSerieCTPS;            
            $optante = $item -> CmpOptanteFgts;
            $dataOptante = $item -> CmpDataOptanteFgts;
                        
            if($item -> CmpFiliacaoSindicato == "S"){
                $filiacao = "SIM";
            }else{
                 $filiacao = "NÃO";
            }
            $nomeFiliacao = $item -> CmpNomeSindicato;
            
            //$obsDoc = $item -> CmpObsDoc;
        }    
         
        $falta = 0;
        $folga = 0;
        $licenca = 0;
        $ferias = 0;
        
        $retorno_dias = 0;
        
        //PESQUISAR OCORRENCIAS
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $lista = $ocorrenciaModel -> ConsultarOcorrencias($idFuncionario);
        foreach($lista as $item){
            
            if($item->CmpTipoOcorrencia == 1){                 
                $ferias  = $ferias + $util -> diff($item->CmpDataInicio, $item->CmpDataFim, "d");
            }
            if($item->CmpTipoOcorrencia == 2){                
                if($item->CmpDataFim == ""){
                    $falta++;
                }else{
                    $retorno_dias = $util -> diff($item->CmpDataInicio, $item->CmpDataFim, "d");                    
                    if($retorno_dias == 0){
                        $falta = $falta + 1; 
                    }else{
                        $falta = $falta + $retorno_dias;
                    }
                }    
               
            }
            if($item->CmpTipoOcorrencia == 3){
                if($item->CmpDataFim == ""){
                     $folga++;
                }else{                    
                    $retorno_dias = $util -> diff($item->CmpDataInicio, $item->CmpDataFim, "d");
                    if($retorno_dias == 0){
                        $folga = $folga + 1;
                    }else{
                        $folga = $folga + $retorno_dias;
                    }
                }    
            }
                     
            if($item->CmpTipoOcorrencia == 4){
                if($item->CmpDataFim == ""){
                    $licenca++;
                }else{       
                    $retorno_dias = $util -> diff($item->CmpDataInicio, $item->CmpDataFim, "d");
                    if($retorno_dias == 0){
                        $licenca = $licenca + 1; 
                    }else{
                        $licenca = $licenca + $retorno_dias;
                    }
                }    
            } 
        }
        
        
        //calculo do numero de dias de trabalho
       
        $data["ocorrencias"] = '{
                            label: "Licença",
                            data:'. $licenca.
                    '}, {
                            label: "Folga",
                            data: '.$folga.
                    '}, {
                            label: "Falta",
                            data:'. $falta.
                    '}, {
                            label: "Férias",
                            data:'. $ferias .
                    '}';
        
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputReadonlyGliphycon("Contratação", $CmpDataEntrada,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Dispensa", $CmpDataSaida,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Data Nascimento", $CmpDataNasc,"calendar",4)
                            . $this -> CampoInputReadonlyGliphycon("Nome", strtoupper($CmpNome),"user",12)
                            
                            . $this -> CampoInputReadonlyGliphycon("Função", strtoupper($funcao), "trabalho", 8)                            
                            //. $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
                            . $this -> CampoInputReadonlyGliphycon("Pai", strtoupper($pai),"user", 12)
                            . $this -> CampoInputReadonlyGliphycon("Mãe", strtoupper($mae),"user", 12)
                            . $this -> CampoInputReadonlyGliphycon("Cônjuge",strtoupper($conjuge),"user",12)
                            . $this -> CampoInputReadonlyGliphycon("Endereço", strtoupper($endereco),"bandeira", 12) 
                            . $this -> CampoInputReadonlyGliphycon("Unidade Federação", strtoupper($selectUF), "bandeira",4)
                            . $this -> CampoInputReadonlyGliphycon("E-mail",strtoupper($email),"email",9) 
                            . $this -> CampoInputReadonlyGliphycon("Celular",$tel,"tel",4)
                            . $this -> CampoInputReadonlyGliphycon("Tel.Fixo",$cel,"tel",4)
                            . $this -> CampoInputReadonlyGliphycon("É Deficiente?", $ehDeficiente,"deficiente", 4)
                            . $this -> CampoInputReadonlyGliphycon("Estado Civil", strtoupper($estCivil),"user", 4) 
                            . $this ->CampoInputReadonlyGliphycon("Naturalidade", strtoupper($natura),"bandeira", 4)  
                            . $this -> CampoInputReadonlyGliphycon("Nacionalidade",strtoupper($naciona),"bandeira",4) 
                            . $this -> CampoInputReadonlyGliphycon("Escolaridade",strtoupper($escolaridade) ,"bandeira",4)                                                        
                            
                            . $this ->CampoTextareaReadonlyGliphycon("Comentário",$obs, "comentario", 12); 
                
        $data["formulario2"] = $this -> CampoHeader("Dados Oficiais")
                            . $this -> CampoInputReadonlyGliphycon("CPF",$CmpCPF,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Cart. Motorista",$cartMot,"doc",6) 
                            . $this -> CampoInputReadonlyGliphycon("Título Eleitoral",$titulo,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Doc. Identidade",$docIdent,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Certificado Militar",$cerMilitar,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Pis",$pis,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Cateira de Trabalho (CPTS)",$carTrabalho,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Série Cateira de Trbalho (CPTS)",$serieCPTS,"doc",4)
                            . $this -> CampoInputReadonlyGliphycon("Cateira de Trabalho Rural (CPTS Rural)",$carRuralTrabalho,"doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Optante FGTS",$optante,"doc",4)
                            . $this -> CampoInputReadonlyGliphycon("Filiação Sindicato?",$filiacao,"doc",3)
                            . $this -> CampoInputReadonlyGliphycon("Nome Sindicato",$nomeFiliacao,"doc",4)
                            . $this -> CampoTextareaReadonlyGliphycon("Comentário", $obsDoc,"comentario",12);
        
        $data["formulario3"] = $this -> CampoHeader("Ocorrências")
                            . $this -> CampoInputReadonlyGliphycon("CPF","cpf","doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Cart. Motorista","cartMotorista","doc",6) 
                            . $this -> CampoInputReadonlyGliphycon("Título Eleitoral","tituloEleitoral","doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Doc. Identidade","docIdentidade","doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Certificado Militar","cerMilitar","doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Pis","pis","doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Cateira de Trabalho (CPTS)","carTrabalho","doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Série Cateira de Trbalho (CPTS)","serCarTrabalho","doc",4)
                            . $this -> CampoInputReadonlyGliphycon("Cateira de Trabalho Rural (CPTS Rural)","carTrabalhoRural","doc",6)
                            . $this -> CampoInputReadonlyGliphycon("Optante FGTS","opfgts","doc",4)
                            . $this -> CampoInputReadonlyGliphycon("Filiação Sindicato","filSin","doc",4)
                            . $this -> CampoInputReadonlyGliphycon("Nome Sindicato","nomSin","doc",4)
                            . $this -> CampoTextareaReadonlyGliphycon("Comentário", "obsdoc","comentario",12);
        
         $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        return $data;
    }
    
    //TELA VEICULO
    public function TelaObraDetalhar($idObra){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idObra_decripto = $seguranca -> decripto($idObra);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(45, "det","Obra","Obra ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("OBR","det"));
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() ->ConsultaPasta("OBR");
        //$arquivo = "clientes/".$pasta."/obra/";

        //PESQUISA DE VEICULO POR ID
        $obraModel = new \App\Classes\ObraModel();
        $obra = $obraModel ->ConsultaObra($idObra);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($obra as $item){
        
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFim);
            $CmpTitulo = $item -> CmpTitulo;
            $CmpObjetivo = $item -> CmpObjetivo;
            $CmpDescricao = $item -> CmpDescricao;            
             
             //id para a pagina
            $data["idObjeto"] = $seguranca -> cripto($idObra_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("OBR");
            //$data["rotulo"] = $seguranca -> cripto(" Veículo " . trtoupper($CmpPlaca));

            //BUSCAR IMAGEM DO VEICULO
            /*$anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel ->recuperaAnexo($idObra_decripto, "OBR");
            foreach($anexo as $item){
               $data["imagem"] = $arquivo.$item->CmpAnexo;
            }*/
             //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idObra_decripto, "OBR");            
        
               
                               
        }
               
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data Início", $CmpDataInicio,2)
                            . $this -> CampoInputReadonly("Data Fim", $CmpDataFim,2)
                            . $this -> CampoInputReadonly("Título", $CmpTitulo,2)  
                            . $this -> CampoInputReadonly("Objetivo", $CmpObjetivo,2)
                            
                            . $this -> CampoTextareaReadonly("Descrição", $CmpDescricao,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        return $data;
    }
    
    //TELA VEICULO
    public function TelaPetsDetalhar($idPets){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPets_decripto = $seguranca -> decripto($idPets);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(40, "det","Detalhar","Pets ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PET","det"));
        
              
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() ->ConsultaPasta("PET");
        //$arquivo = "clientes/".$pasta."/pets/";

        //PESQUISA DE VEICULO POR ID
        $petsModel = new \App\Classes\PetsModel();
        $pets = $petsModel -> consultarPets($idPets); //consultarApartamentoPorId($id_decripto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($pets as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            $CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpDataEntrada);
            $CmpDataSaida = $util->formatarDataMysqlParaExibicao($item->CmpDataSaida);
            $CmpNome = $item -> CmpNome;
            $CmpRaca = $item -> CmpRaca;            
            /*$CmpPlaca = $item -> CmpPlaca;
            $CmpCor = $item -> CmpCor;
            $CmpDespacho = $item -> CmpDespacho;
            $CmpCartao = $item -> CmpDescricao;
              */          
          /*  $CmpTipoVeiculo = $item -> CmpTipoVeiculo;
            if($CmpTipoVeiculo == 1) $CmpTipoVeiculo = "Automóvel";
            if($CmpTipoVeiculo == 2) $CmpTipoVeiculo = "Moto";
            if($CmpTipoVeiculo == 3) $CmpTipoVeiculo = "Bicicleta";
            
            $vaga_apto = $item -> CmpApto. "-".$item -> CmpBloco;
            */ 
            //id para a pagina
            $idObjeto = $data["idObjeto"] = $seguranca -> cripto($idPets_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("VEI");
            //$data["rotulo"] = $seguranca -> cripto(" Veículo " . strtoupper($CmpPlaca));

            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            echo $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idPets_decripto, "PET");      
            
                           
        }
            
              
        
        
        //Lista de Anexos
        /*$anexosControle = new \App\Http\Controllers\Anexo\AnexoController();
        $data["listaAnexos"] = $anexosControle -> CarregarListaTodosAnexo($seguranca -> cripto($idproprietario),$seguranca -> cripto("PRO"),$seguranca -> cripto(0), $seguranca -> cripto("TOT"));
        */
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data Nascimento", $CmpDataNasc,2)
                            . $this -> CampoInputReadonly("Data Entrada", $CmpDataEntrada,2)
                            . $this -> CampoInputReadonly("Data Saída", $CmpDataSaida,2)    
                            . $this -> CampoInputReadonly("Nome", $CmpNome,2)
                            . $this -> CampoInputReadonly("Raça", $CmpRaca,2)  
                            
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        return $data;
    }
    
    //TELA VEICULO
    public function TelaEventoDetalhar($idEvento){
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idEvento_decripto = $seguranca -> decripto($idEvento);
                     
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("EVE","det"));
        
        $CmpDataInclusao = "";
        $titulo = "";
        $tel = "";
        $email = "";
        $texto = "";
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "EVE", "PARCIAL");
        
        //PESQUISA DE VEICULO POR ID
        $eventoModel = new \App\Classes\EventoModel();
        $evento = $eventoModel -> consultarEvento($idEvento);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($evento as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $titulo = $item -> CmpTitulo;
            $tel = $item -> CmpTel;            
            $email = $item -> CmpEmail;
            $texto = $item -> CmpTexto;
            
            //BUSCAR IMAGEM DO VEICULO
            //$anexoModel = new \App\Classes\AnexoModel();
            //$data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idEvento_decripto, "EVE");      
                //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idEvento_decripto, "EVE");
            if($imagem != ""){
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/entrega.png"; 
            }                
        }
            
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,3)
                            . $this -> CampoInputReadonly("Título", $titulo,9)
                            . $this -> CampoInputReadonly("Telefone", $tel,3)  
                            . $this -> CampoInputReadonly("E-mail", $email,9)                            
                            . $this -> CampoTextareaReadonly("Descrição", $texto,12)
                            . $this -> CampoHidden("val",$idEvento);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        
        return $data;
    }
    
     //TELA RAMAL
    public function TelaRamalDetalhar($idRamal){
        
        $data = array();         
        $util = new \App\Util\Util();
        //$pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        
        //echo "TSTE " . $idRamal;
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idRamal_decripto = $seguranca -> decripto($idRamal);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RAM","det"));
        
        $CmpAuto = "";
        $formulario = "";   
       
        //PESQUISA DE VEICULO POR ID
        $ramalModel = new \App\Classes\RamalModel();
        $ramal = $ramalModel -> consultaRamal($idRamal);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($ramal as $item){
        
            $CmpRamal = $item -> CmpRamal;
            $CmpAuto = $item -> CmpAuto;
            //echo "<BR>";
            $ramal = $item -> CmpRamal;

            $apto = $item -> CmpApto;
            $bloco = $item -> CmpBloco;
            $comentario = $item -> CmpComentario;
            
            if($item -> CmpEhMorador == "S")
            {    
                $nome = $item -> nomePRO;
                
                /*$pasta = $factory -> GetClassVariavel() ->Path($pasta, "PRO", "PARCIAL");
                
                $imagem = $anexoModel ->recuperaAnexo($idRecuperaAnexo, "PRO");
                if($imagem != ""){                
                    $data["imagem"] = $pasta.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }*/
            }else{
                $nome = $item -> nomeMOR;
            }
      
        }
       
       
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $formulario =  $this -> CampoInputReadonly("Morador/Proprietario", $nome,10);
        $formulario = $formulario . $this -> CampoInputReadonly("Ramal", $ramal,2);
        
        if($CmpAuto == 1){
            $formulario = $formulario . $this -> CampoInputReadonly("Apartamento", $apto."/".$bloco,4);

        }else{
            $formulario = $formulario . $this -> CampoInputReadonly("Área Comum", $apto,6);
        }    

        $formulario = $formulario . $this -> CampoTextareaReadonly("Comentário", $comentario,12);
        $data["formulario"] = $formulario;
        $data["auto"] = $CmpAuto;
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
            
        return $data;
    }
    
     //TELA VEICULO
    public function TelaClassificadosDetalhar($idClassificados){
        
        $data = array();  
        $data1 = array();
        
        $util = new \App\Util\Util();
       
        //echo "DEtalhar " . $idClassificados ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idClassificados_decripto = $seguranca -> decripto($idClassificados);
        $vetor = array();
        
        $descricaoSindico = "";
        $situacao = "";
        $idSituacao = "";
        $comboAprovacao = "";
        $status = "";        
        $aprovacao = "";
        $autor = "";
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CLA","det"));
        
        $CmpDataInclusao = "";          
        $data["idObjeto"] = 0;       
        $data["imagem"] = 0;
        
        //PASTA DO CONDOMINIO
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "CLA", "PARCIAL");
        
        $CmpDataInclusao = "";
        $CmpAssunto = "";
        $CmpTexto = "";
        
        //PESQUISA DE VEICULO POR ID
        $classificadoModel = new \App\Classes\ClassificadosModel();
        $classificados = $classificadoModel -> consultarClassificados($idClassificados);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($classificados as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpAssunto = $item -> CmpAssunto;
            $CmpTexto = $item -> CmpTexto; 
            $item->CmpCategoriaNegocio = $util -> SituacaoClassificadoNegocio($item->CmpCategoriaNegocio);
            
            if($item -> CmpApto != ""){
                $autor = $item -> CmpApto."/".$item -> CmpBloco;                             
            }else{
                $autor = "Administração";
            }
            
            $categoriaNegocio = $item-> CmpCategoriaNegocio;
            
            $status = $util -> AprovacaoStatus($item->CmpStatus);
            
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idClassificados_decripto, "CLA"); 
            $imagem = $anexoModel -> recuperaAnexo($idClassificados_decripto, "CLA");
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data ", $CmpDataInclusao,3)
                                . $this -> CampoInputReadonly("Autor", $autor,4)
                                . $this -> CampoInputReadonly("Tipo de Negócio", strtoupper($categoriaNegocio),4)
                                . $this -> CampoInputReadonly("Assunto", strtoupper($CmpAssunto),12) 
                                . $this -> CampoTextareaReadonly("Descrição", $CmpTexto,12)
                                . $this -> CampoHidden("val",$data["idObjeto"]); 
            
            //$data1 = $this -> TelaAprovacao($idClassificados);
            $data["formulario"] = $data["formulario"];// . $data1["retorno"];
            $data["formulario2"] =  "";//$data1["form2"];
            $data["status"] = $item->CmpStatus;
            
            $data["botaoVoltar"] = $this ->MontaBotaoVoltar();

        }
        
        return $data;
    }
    
    public function TelaAprovacao($idObjeto){
        
        $data = array();
        $data["retorno"] = "";
        $data["form2"] = "";
        $retorno = "";
        
        $aprovacaoModel = new \App\Classes\AprovacaoModel(); 
        $aprovacao = $aprovacaoModel -> ConsultaAprovacao($idObjeto);            
        if(count($aprovacao) > 0){

            if($aprovacao->CmpAprovacao == 1) $situacao = "ACEITO";
            if($aprovacao->CmpAprovacao == 2) $situacao = "REJEITADO";

            $data["retorno"] = $this ->CampoHeader("Decisão Síndico")
                       . $this -> CampoInputReadonly("Situação", $situacao, 3)
                       . $this -> CampoTextareaReadonly("Comentarios Síndico",$aprovacao -> CmpComentario, 12);

        }
        
        $comboAprovacao = $this -> MontarCombosAprovacao(0);

        $data["form2"] =  $this -> montarFormulario("Aprovar?", "aprovar", "Aprovado ou rejeitado?", "Por favor, informe a aprovação ou rejeição.","", $comboAprovacao, "select1",4)
                                . $this -> CampoTextarea("Comentários do Síndico", "obsSindico", "", 12);
        
        return $data;
    }
    
     //TELA VEICULO
    public function TelaClassificadosDetalharNoticia($idClassificados){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idClassificados_decripto = $seguranca -> decripto($idClassificados);
        
        $vetor = array();
        
        $descricaoSindico = "";
        $situacao = "";
        $idSituacao = "";
        $comboAprovacao = "";
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CLA","det"));
        
        $CmpDataInclusao = "";          
        $data["idObjeto"] = 0;       
        $data["imagem"] = 0;
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "CLA", "PARCIAL");
        
        $CmpDataInclusao = "";
        $CmpAssunto = "";
        $CmpTexto = "";
        
        //PESQUISA DE VEICULO POR ID
        $classificadoModel = new \App\Classes\ClassificadosModel();
        $classificados = $classificadoModel -> consultarClassificados($idClassificados);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($classificados as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpAssunto = $item -> CmpAssunto;
            $CmpTexto = $item -> CmpTexto;            
            
            $item->CmpCategoriaNegocio = $util -> SituacaoClassificadoNegocio($item->CmpCategoriaNegocio);
            //$descricaoSindico = $item->obsSindico;
            
            /*if($item->CmpAprovacao == 1) $situacao = "Aprovado";
            if($item->CmpAprovacao == 2) $situacao = "Rejeitado";
            $idSituacao = $item->CmpAprovacao;*/
            
            if($item -> CmpApto != ""){
                $autor = $item -> CmpApto."/".$item -> CmpBloco;                             
            }else{
                $autor = "Administração";
            }
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idClassificados_decripto, "CLA");            
        
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data ", $CmpDataInclusao,3)
                                . $this -> CampoInputReadonly("Autor", $autor,4)
                                . $this -> CampoInputReadonly("Assunto", $CmpAssunto,12)                            
                                . $this -> CampoTextareaReadonly("Descrição", $CmpTexto,12)
                                . $this -> CampoHidden("val",$data["idObjeto"]);                           
           
            $data["botaoVoltar"] = $this -> MontaBotaoVoltar();

        }
        return $data;
    }
    
     //TELA VEICULO
    public function TelaCautelaDetalhar($idCautela){
        
        $data = array();         
        $util = new \App\Util\Util();
       
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idCautela_decripto = $seguranca -> decripto($idCautela);
        
        //$vetor = array();
        //echo "TESTE " . $idCautela;
        
        $descricaoSindico = "";
        $situacao = "";
        $idSituacao = "";
        $comboAprovacao = "";
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CAU","det"));
        
        $CmpDataInclusao = "";          
        $data["idObjeto"] = 0;       
        $data["imagem"] = 0;
        
        /*$factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta("CAU");*/
        
        $CmpDataInclusao = "";
        $CmpAssunto = "";
        $CmpTexto = "";
        
        //PESQUISA DE VEICULO POR ID
        $cautelaModel = new \App\Classes\CautelaModel();
        $cautela = $cautelaModel -> ConsultaCautela($idCautela);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($cautela as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);            
            $CmpDescricao = $item -> CmpDescricao;
            $descricaoSindico = $item->obsSindico;
            
            if($item->CmpAprovacao == 1) $situacao = "Aprovado";
            if($item->CmpAprovacao == 2) $situacao = "Rejeitado";
            $idSituacao = $item->CmpAprovacao;       
        
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data ", $CmpDataInclusao,2)
                                . $this -> CampoTextareaReadonly("Descrição", $CmpDescricao,12)
                                . $this -> CampoHidden("val",$data["idObjeto"])
                                . $this ->CampoHeader("Decisão Síndico")
                                . $this -> CampoInputReadonly("Situação", $situacao, 3)
                                . $this -> CampoTextareaReadonly("Comentarios Síndico",$descricaoSindico, 12)
                                . $this -> CampoHidden("val",$idCautela);
                                
            $comboAprovacao = $this -> MontarCombosAprovacao($idSituacao);

            $data["formulario2"] =  $this -> montarFormulario("Aprovar?", "aprovar", "Aprovado ou rejeitado?", "Por favor, informe a aprovação ou rejeição.","", $comboAprovacao, "select1",4)
                                    . $this ->CampoTextarea("Comentários do Síndico", "obsSindico", $descricaoSindico, 12)
                                    . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
        }
        
        return $data;
    }
    
     //TELA VEICULO
    public function TelaSolicitacaoDetalhar($idSolicitacao){
        
        $lista = "";
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idSolicitacao_decripto = $seguranca -> decripto($idSolicitacao);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Solicitação","Solicitação ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("SOL","det"));
        
        $CmpDataInclusao = "";          
        $data["idObjeto"] = 0;       
        $data["imagem"] = 0;
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "SOL","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        //$arquivo = "clientes/".$pasta."/solicitacao/";

        //PESQUISA DE VEICULO POR ID
        $solicitacaoModel = new \App\Classes\SolicitacaoModel();
        $solicitacao = $solicitacaoModel -> consultarSolicitacao($idSolicitacao);
        
        //lista de despachos
        $data["ListaDespachos"] = $solicitacaoModel -> ConsultarSolicitacaoDespachoAnexo($idSolicitacao_decripto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($solicitacao as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->dtsol);
            if($item->CmpDataConclusao != ""){
                $CmpDataConclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataConclusao);
            }else{
                $CmpDataConclusao = "";
            }    
            $CmpCodigoUnico = $item -> CmpCodigoUnico;
            $CmpTexto = $item -> CmpTexto;        
            
            if($item -> apartamento_idapartamento != ""){
                $item -> temp = "Apto ".$item -> CmpApto . " e Bloco ". $item -> aptoBloco;
            }
            
            if($item -> CmpBloco != "" && $item -> CmpAndar != ""){
                $item -> temp = "Bloco ".$item -> CmpBloco . " e Andar ". $item -> CmpAndar;
            }
            
            if($item -> areacomum_idareacomum != ""){
                $item -> temp = $item -> CmpAreaComum;
            }
            
            /*if($item->CmpCategoriaSolicitacao == 1) $item->CmpCategoriaSolicitacao = "Aluguel";
            if($item->CmpCategoriaSolicitacao == 2) $item->CmpCategoriaSolicitacao = "Troca";
            if($item->CmpCategoriaSolicitacao == 3) $item->CmpCategoriaSolicitacao = "Venda";
            if($item->CmpCategoriaSolicitacao == 4) $item->CmpCategoriaSolicitacao = "Doação";*/
          
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            //echo $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idSolicitacao_decripto, "SOL");            
        
            $imagem = $anexoModel ->recuperaAnexo($idSolicitacao_decripto, "SOL"); 
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
                   // echo $item -> 
        
            //DEFININDO O TIPO DE ARQUIVO        
            //MONTAGEM FORMULARIO
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $lista = $this -> CampoInputReadonly("Código Único ", $CmpCodigoUnico,4)
                                . $this -> CampoInputReadonly("Registro ", $CmpDataInclusao,4)
                                . $this -> CampoInputReadonly("Conclusão ", $CmpDataConclusao,4);
            
            //if($item->CmpBloco != "") $lista = $lista . $this -> CampoInputReadonly("Localização ", "Bloco: ".$item->CmpBloco.", Andar ".$item->CmpAndar,4);
            
             $lista = $lista . $this -> CampoInputReadonly("Localização ", $item -> temp,4);
                
                
                $lista = $lista . $this -> CampoTextareaReadonly("Descrição", $CmpTexto,12)
                                . $this -> CampoHidden("val",$data["idObjeto"]);
                                //. $this -> ListaAnexo($listaAnexos, 8);
            
            $data["formulario"] = $lista;
            $data["status"] = $item->solStatus;
        }    
        
        //INFORMAÇÕES PARA O DESPACHO
        $data["idObjeto"] = $idSolicitacao;
        $data["idSiglaObjeto"] = $seguranca->cripto("SOLU");       
        
        
        //LISTA DE DESPACHO
        $despacho = new \App\Classes\DespachoModel();
        $lista = $despacho -> ConsultarDespacho($idSolicitacao,$seguranca->cripto("SOLU"));//ConsultaBem($seguranca->cripto(0));
        
        foreach($lista as $item){
            $item->CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            if($item -> CmpStatus == "ATD") $item->CmpStatus = "Pedido Atendido";
            if($item -> CmpStatus == "PSE") $item->CmpStatus = "Pedido de Serviço: enviado para execução"; 
        }

        $data["listaDespachos"] = $lista;
        return $data;
    }
    
    /* visitante*/
     //TELA VEICULO
    public function TelaVeiculoVisitanteDetalhar($idVeiculo){
        
        //echo "teste ". $idVeiculo;
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVeiculo_decripto = $seguranca -> decripto($idVeiculo);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Veículo","Veículo Visitante","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEIVIS","det"));
        
        $CmpDataInclusao = "";  
        $CmpPlaca = "";
        $CmpMarca = "";
        $CmpModelo = "";
        $CmpCor = "";
        $CmpCartao = "";
        $CmpTipoVeiculo = "";
        $apto = "";
        $CmpDespacho = "";
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $arquivo = $factory ->  GetClassVariavel() -> Path($pasta, "VEI","PARCIAL"); //"clientes/".$pasta."/veiculos/";

        //PESQUISA DE VEICULO POR ID
        $veiculoModel = new \App\Classes\VeiculoVisitantesModel();
        $veiculo = $veiculoModel -> consultarVeiculoVisitante($idVeiculo_decripto); //consultarApartamentoPorId($id_decripto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($veiculo as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpMarca = $item -> CmpMarca;
            $CmpModelo = $item -> CmpModelo;            
            $CmpPlaca = $item -> CmpPlaca;
            $CmpCor = $item -> CmpCor;
            $CmpDespacho = $item -> CmpDespacho;
            $CmpCartao = $item -> CmpDespacho;
                        
            $CmpTipoVeiculo = $item -> CmpTipoVeiculo;
            if($CmpTipoVeiculo == 1) $CmpTipoVeiculo = "Automóvel";
            if($CmpTipoVeiculo == 2) $CmpTipoVeiculo = "Moto";
            if($CmpTipoVeiculo == 3) $CmpTipoVeiculo = "Bicicleta";
            
            $apto = $item -> CmpApto. "-".$item -> CmpBloco;
             
            //id para a pagina
            $idObjeto = $data["idObjeto"] = $seguranca -> cripto($idVeiculo_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("VEI");
            $data["rotulo"] = $seguranca -> cripto(" Veículo " . strtoupper($CmpPlaca));

            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel -> recuperaAnexo($idVeiculo_decripto, "VEIVIS");            
            $data["imagem"] = $arquivo.$anexo;
                         
            //BUSCAR INFORMAÇÃO DE SAIDA OU ENTRADA DE VEICULO
            $entradaSaidaModel = new \App\Classes\EntradaSaidaVeiculoModel();
            //$data["botaoEntradaSaidaVeiculo"] = $entradaSaidaModel ->ConsultarUltimoMovimentoVeiculo($idVeiculo);
                    
        }
           
        
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,2)
                            . $this -> CampoInputReadonly("Placa", $CmpPlaca,3) 
                            . $this -> CampoInputReadonly("Categoria Veículo", $CmpTipoVeiculo,3)                           
                            . $this -> CampoInputReadonly("Apto/Bloco", $apto,2) 
                            . $this -> CampoTextareaReadonly("Comentário", $CmpDespacho,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
    
    //TELA salão de festas 
    public function TelaSalaoFestasDetalhar($idSalaoFestas){        
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idSalaoFestas_decripto = $seguranca -> decripto($idSalaoFestas);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(54, "det","Reserva de Salão de Festas","Reserva de Salão de Festas","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("SAL","det"));
        
        //PESQUISA DE VEICULO POR ID
        $salaoFestasModel = new \App\Classes\SalaoFestasModel();
        $reservaSalaoFestas = $salaoFestasModel -> ConsultaSalaoFestasPorID($idSalaoFestas);
        $motivo = "";     
        $CmpDataInclusao = "";
        $apto_bloco = "";
        $descricaoMorador = "";
        $descricaoSindico = "";
        $situacao = "";
        $idSituacao = "";
        $comboAprovacao = "";
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($reservaSalaoFestas as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $apto_bloco = $item->CmpApto."/".$item->CmpBloco;      
            
            if($item->CmpMotivoSalaoFestas == 1) $motivo = "Aniversário";
            if($item->CmpMotivoSalaoFestas == 2) $motivo = "Batizado";
            if($item->CmpMotivoSalaoFestas == 3) $motivo = "Casamento";
            if($item->CmpMotivoSalaoFestas == 4) $motivo = "Confraternização"; 
            if($item->CmpMotivoSalaoFestas == 5) $motivo = "Chá de Bebê"; 
            if($item->CmpMotivoSalaoFestas == 6) $motivo = "Chá de Panela"; 
            $descricaoMorador = $item->obsMorador;
            $descricaoSindico = $item->obsSindico;
            
            if($item->CmpAprovacao == 1) $situacao = "Aprovado";
            if($item->CmpAprovacao == 2) $situacao = "Rejeitado";
            $idSituacao = $item->CmpAprovacao;
           
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data Reserva", $CmpDataInclusao,2)
                                 . $this -> CampoInputReadonly("Apto/Bloco", $apto_bloco,2)
                                 . $this -> CampoInputReadonly("Motivo", $motivo,6)
                                 . $this -> CampoTextareaReadonly("Comentário Morador", $descricaoMorador, 12)
                                 . $this ->CampoHeader("Decisão Síndico")

                                 . $this -> CampoInputReadonly("Situação", $situacao, 3)
                                 . $this -> CampoTextareaReadonly("Comentarios Síndico",$descricaoSindico, 12)
                                 . $this -> CampoHidden("val",$idSalaoFestas);
                                //. $this -> ListaAnexo($listaAnexos, 8);

            $comboAprovacao = $this -> MontarCombosAprovacao($idSituacao);

            $data["formulario2"] =  $this -> montarFormulario("Aprovar?", "aprovar", "Aprovado ou rejeitado?", "Por favor, informe a aprovação ou rejeição.","", $comboAprovacao, "select1",4)
                                    . $this ->CampoTextarea("Comentários do Síndico", "obsSindico", $descricaoSindico, 12)
                                    . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
        
        }
        return $data;
    }
    
    //TELA salão de festas 
    public function TelaAprovarReserva($idReserva){        
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idReserva_decripto = $seguranca -> decripto($idReserva);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(54, "det","Reserva de Salão de Festas","Reserva de Salão de Festas","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RES","apr"));
        
        //PESQUISA DE VEICULO POR ID
        $reservaModel = new \App\Classes\ReservaModel();
        //$reservaSalaoFestas = $reservaModel -> ConsultaSalaoFestasPorID($idSalaoFestas);
        $motivo = "";     
        $CmpDataInclusao = "";
        $apto_bloco = "";
        $descricaoMorador = "";
        $descricaoSindico = "";
        $situacao = "";
        $idSituacao = "";
        $comboAprovacao = "";        
        
        $comboAprovacao = $this -> MontarCombosAprovacao($idSituacao);

        $data["formulario"] =  $this -> montarFormulario("Aprovar?", "aprovar", "Aprovado ou rejeitado?", "Por favor, informe a aprovação ou rejeição.","", $comboAprovacao, "select1",4)
                                . $this -> CampoTextarea("Comentários do Síndico", "obsSindico", $descricaoSindico, 12)
                                . $this -> CampoHidden("val", $idReserva)
                                . $this -> CampoHidden("val1", "RES");
        
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
                
        return $data;
    }
    
    //TELA salão de festas 
    public function TelaReservaDetalhar($idReserva){        
       
        $motivo = "";     
        $CmpDataInclusao = "";
        $apto_bloco = "";
        $descricaoMorador = "";
        $descricaoSindico = "";
        $situacao = "";
        $idSituacao = "";
        $comboAprovacao = "";
        $indiceCombo = 0;
        $status = "";
        
        $data = array();         
        $util = new \App\Util\Util();
        
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idReserva_decripto = $seguranca -> decripto($idReserva);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(54, "det","Reserva de Salão de Festas","Reserva de Salão de Festas","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RES","det"));
        
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pastaCOND = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pastaMOR = $factory -> GetClassVariavel() -> Path($pastaCOND, "MOR","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        $pastaQRC = $factory ->  GetClassVariavel() -> Path($pastaCOND, "QRC","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        
        //PESQUISA DE VEICULO POR ID
        $reservaModel = new \App\Classes\ReservaModel();
        $reservas = $reservaModel -> ConsultaReservaPorID($idReserva);
        
        $anexoModel = new \App\Classes\AnexoModel();
        
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($reservas as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpDataReserva = $util->formatarDataMysqlParaExibicao($item->CmpDataReserva);
            $apto_bloco = $item->CmpApto."/".$item->CmpBloco;      
            
            $motivo = $util -> MotivoReserva($item->CmpMotivo);             
            $descricaoMorador = $item->CmpComentario;
            
            $aprovacaoModel = new \App\Classes\AprovacaoModel();
            $aprovacao = $aprovacaoModel -> ConsultaAprovacao($idReserva,"RES");
            
            foreach($aprovacao as $item2){
                
                $situacao = $util -> LabelReserva($item->CmpStatus);
                $descricaoSindico = $item2 -> CmpComentario;
                
                $indiceCombo = $item2->CmpAprovacao;
            }
            
            if($item->CmpStatus != ""){
                $status = $util -> LabelReserva($item->CmpStatus);
            }
            
            //IMAGEM DO MORADOR
            $imagem = $anexoModel ->recuperaAnexo($item->idmorador, "MOR"); 
            if($imagem != ""){                
                $data["imagem"] = $pastaMOR.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
           
            $imagemQRC = $anexoModel -> recuperaAnexo(Auth::user()->condominio_idcondominio, "QRC"); 
            
            $comboAprovacao = $this -> MontarCombosAprovacao($indiceCombo);
            
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $lista =  $this -> CampoInicioPainel2("Interessado",12,"info")
                     . $this -> CampoImageReadonly(asset($data["imagem"]), 4,140)   
                     . $this -> CampoInputReadonly("Morador", $item -> CmpNome,8)
                     . $this -> CampoInputReadonly("Apto/Bloco", $apto_bloco,4)
                     . $this -> CampoFimPainel()

                     . $this -> CampoInputReadonly("Código", $item->CmpCodigoUnico,3)
                     . $this -> CampoInputReadonly("Data Reserva", $CmpDataReserva,3)
                     . $this -> CampoInputReadonly("Ocasião", $motivo,6)
                     . $this -> CampoInputReadonly("Situação", $status,4) 
                     . $this -> CampoInputReadonly("Setor Condomínio", strtoupper($item->CmpAreaComum),8);

            $data["imgqrcode"] = $this -> CampoImageReadonly($pastaQRC.$imagemQRC, 6,300);
                     
                     /*. $this -> CampoTextareaReadonly("Comentário Morador", $descricaoMorador, 12);

                    // DECISÃO DO SÍNDICO
                    if(Auth::user()-> perfil_idperfil != 2 && $aprovacao != ""){   
                        $lista = $lista . $this ->CampoHeader("Decisão Síndico")                                    
                        . $this -> CampoTextareaReadonly("Comentarios Síndico",$descricaoSindico, 12);
                    }     */

                    $lista = $lista . $this -> CampoHidden("val",$idReserva);
                    //. $this -> ListaAnexo($listaAnexos, 8);

            $data["formulario"] = $lista;
            
            $data["status"] = $item->CmpStatus;
            //BUSCA DO DADOS DE APROVAÇÃO            

            /*$data["formulario2"] =  $this -> montarFormulario("Aprovar?", "aprovar", "Aprovado ou rejeitado?", "Por favor, informe a aprovação ou rejeição.","", $comboAprovacao, "select1",4)
                                    . $this -> CampoTextarea("Comentários do Síndico", "comentario", $descricaoSindico, 12);*/
            
            $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
            $data["botaoFechar"] = $this -> MontaBotaoFechar();            
           
            if($util -> diff(date('Y-m-d'),$item->CmpDataReserva, "d") > 0){
              
            }else{
               $data["botaoExcluir"] = "N";                
            }
            
            
        
        }
        return $data;
    }
    
    /* visitante*/
     //TELA VEICULO
    public function TelaEntregaDetalhar($idEntrega){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idEntrega_decripto = $seguranca -> decripto($idEntrega);
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Entrega","Entrega");
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ENT","det"));
               
        $CmpDataInclusao = "";  
        $CmpPlaca = "";
        $CmpMarca = "";
        $CmpModelo = "";
        $CmpCor = "";
        $CmpCartao = "";
        $CmpTipoVeiculo = "";
        $apto = "";
        $CmpDespacho = "";
        $rastreamento = "";
        $CmpDataBaixa = "";
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = "img/entrega.png"; 
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "ENT", "PARCIAL");        
        
        //PESQUISA DE VEICULO POR ID
        $entregaModel = new \App\Classes\EntregasModel();
        $entrega = $entregaModel -> consultarEntrega($idEntrega);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($entrega as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $codUnico = $item -> CmpCodigoUnico;
            $rastreamento = $item -> CmpCodigoCorreio;
            $obs = $item -> CmpObs;
        
            if($item->CmpDataBaixa != "0000-00-00" && $item->CmpDataBaixa != null && $item->CmpDataBaixa != ""){
                $CmpDataBaixa = $util->formatarDataMysqlParaExibicao($item->CmpDataBaixa);
            }else{
                $CmpDataBaixa = "";
            }
            //$folha = $item -> CmpFolha;
            
                                    
            $CmpCategoriaEntrega = $item -> CmpCategoriaEntrega;
            if($CmpCategoriaEntrega == 1) $CmpCategoriaEntrega = strtoupper("Correspondência");
            if($CmpCategoriaEntrega == 2) $CmpCategoriaEntrega = strtoupper("Pacote");
            
            $ratreamento = $item -> CmpCodigoCorreio;
            $apto = $item -> CmpApto. "-".$item -> CmpBloco;
            
            
             
            /*//BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel ->recuperaAnexo($idEntrega_decripto, "ENT");
            foreach($anexo as $item){
               $data["imagem"] = $pasta.$item->CmpAnexo;
            } */  
            
             //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idEntrega_decripto, "ENT");
            if($imagem != ""){
                $data["imagem"] = $pasta.$imagem; 
            }else{
                $data["imagem"] = "img/entrega.png"; 
            }
            //echo  $data["imagem"] ;
            
        }
    
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,3)
                            . $this -> CampoInputReadonly("Data Baixa", $CmpDataBaixa,3)
                             
                            . $this -> CampoInputReadonly("Rastreamento Correio", $ratreamento,5)
                            . $this -> CampoInputReadonly("Código Único", $codUnico,3)  
                            . $this -> CampoInputReadonly("Categoria", $CmpCategoriaEntrega,4)                           
                            . $this -> CampoInputReadonly("Apartamento", $apto,3) 
                            
                            /*. $this -> CampoInputReadonly("Livro", $livro,2)
                            . $this -> CampoInputReadonly("folha", $folha,2)*/
                            . $this -> CampoTextareaReadonly("Descrição", $obs,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        $data["rastrear"] = $ratreamento;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        $data["baixa"] = $CmpDataBaixa;
        $data["codigoEntrega"] = $rastreamento;     
        
        $data["idEntrega"] = $idEntrega;
        
        return $data;
    }
    
    /* AUTORIZACAO*/
     //TELA VEICULO
    public function TelaAutorizacaoDetalhar($idAutorizacao){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //echo "DEtalhar " . $idVeiculo ."<BR> ttt";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAutorizacao_decripto = $seguranca -> decripto($idAutorizacao);
        $anexoModel = new \App\Classes\AnexoModel();
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        //$pasta = $factory ->  GetClassVariavel() -> Path($pasta, "BEM","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        //
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Entrega","Entrega");
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("AUT","det"));
               
        $CmpDataInclusao = "";  
        $CmpPlaca = "";
        $CmpMarca = "";
        $CmpModelo = "";
        $CmpCor = "";
        $CmpCartao = "";
        $CmpTipoVeiculo = "";
        $apto = "";
        $status = "";
        $CmpDespacho = "";
        $nomeMorador = "";
        $imagem = "";
        $nomeVis = "";
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;
        $data["TipoDonoDocumento"] = 0;
        $data["imagem"] = 0;
        $data["dataLimite"] = "";
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();      
        
        //PESQUISA DE VEICULO POR ID
        $autorizacaoModel = new \App\Classes\AutorizacaoModel();
        $autorizacao = $autorizacaoModel -> ConsultaAutorizacao($idAutorizacao);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($autorizacao as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            //$codUnico = $item -> CmpCodigoUnico;
            $dataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicioPrevisto);
            $dataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFimPrevisto);
                
            $cnpj_cpf = $item -> CmpCNPJ_CPF;
            $obs = $item -> CmpObs;
                                    
            $autorizado = $item -> CmpAutorizacao;
            if($autorizado == 1) $autorizado = "AUTORIZAR ENTRADA";
            if($autorizado == 2) $autorizado = "ATENÇÃO: NÃO AUTORIZAR ENTRADA";
                        
            $apto = $item -> CmpApto. "/".$item -> CmpBloco;
            
            //CALCULO DE DIAS PARA EXPIRAR A AUTORIZAÇÃO
            $diasExpirar = $util -> diff(date("Y-m-d"), $item->CmpDataFimPrevisto, "d");
            
            //REGRA: PARA IMPEDIR A EDIÇÃO DA AUTORIZAÇÃO DEPOIS DA DATA DE INÍCIO.            
            if($diasExpirar > 0){
                $data["dataLimite"] = "SIM";                  
            }else{
                $data["dataLimite"] = "NAO";
            }    
            
            $data["status"] = $item -> CmpStatus;
           
            if($item -> CmpStatus == "CHE"){
                $status = "SIM";
            }else{
                $status = "NÃO";
            }
            
            
            $nomeVis = strtoupper($item -> nomeVis);
            if($item->CmpEhMorador == "S"){
                $nomeMorador = strtoupper($item -> nomePro);
            }else{
                $nomeMorador = strtoupper($item -> nomeMor);
            }
       
            if($item -> CmpEhMorador == "S"){
                $pasta1 = $factory ->  GetClassVariavel() -> Path($pasta, "PRO","PARCIAL"); //"clientes/".$pasta."/veiculos/"; 
                $imagem = $anexoModel ->recuperaAnexo($item -> idproprietario, "PRO"); 
            }else{
                $pasta1 = $factory ->  GetClassVariavel() -> Path($pasta, "MOR","PARCIAL"); //"clientes/".$pasta."/veiculos/"; 
                $imagem = $anexoModel ->recuperaAnexo($item -> idmorador, "MOR"); 
            }                
            
            if($imagem != ""){                
                $imagem = $pasta1.$imagem;
            }else{
                $imagem = "https://www.gs2i.com.br/gs2i/public/img/silhueta.png";
            }
            
            $data["imagem"] = $imagem;
            //IMAGEM DO AUTORIZADO
           
            $pastaAUT = $factory ->GetClassVariavel() ->Path($pasta, "AUT", "PARCIAL");
            $imagemAUT = $anexoModel -> recuperaAnexo($item->idvisitantes, "AUT"); 
            
            if($imagemAUT != ""){                
                $imagemAUT = $pastaAUT.$imagemAUT;
            }else{
                $imagemAUT = "https://www.gs2i.com.br/gs2i/public/img/silhueta.png";
            }
           
            $data["imagemAUT"] = $imagemAUT;
            /*echo $pastaAUT = $factory ->  GetClassVariavel() -> Path($pasta, "AUT","PARCIAL"); //"clientes/".$pasta."/veiculos/"; 
            $imagemAUT = $anexoModel ->recuperaAnexo($item->idvisitantes, "AUT"); 
             
            if($imagem != ""){                
                $imagemAUT = $pastaAUT.$imagemAUT;
            }else{
                $imagemAUT = "https://www.gs2i.com.br/gs2i/public/img/silhueta.png";
            }
            echo $imagemAUT;*/
            $pasta = "";
        }
    
       
        //echo $autorizado;
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formularioMOR"] =   $this -> CampoInputReadonly("Morador", $nomeMorador,12)
                            . $this -> CampoInputReadonly("Apto/Bloco", $apto,4)
                            . $this -> CampoInputReadonly("Ordem", $autorizado,5);                    
                               
        $data["formularioAUT"] =  $this -> CampoInputReadonly("Previsto entrada", $dataInicio,4)
                            . $this -> CampoInputReadonly("Previsto saída", $dataFim,4)
                            . $this -> CampoInputReadonly("Apresentou-se na portaria?", $status,4)
                            . $this -> CampoInputReadonly("Nome", $nomeVis,8) 
                            . $this -> CampoInputReadonly("CNPJ/CPF", $cnpj_cpf,4)
                             
                            . $this -> CampoTextareaReadonly("Descrição", $obs,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        return $data;
    }
    
    /* visitante*/
     //TELA AREA COMUM
    public function TelaAreaComumDetalhar($idAreaComum){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAreaComum_decripto = $seguranca -> decripto($idAreaComum);
       
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $areaComumModel = new \App\Classes\AreaComumModel();
        $areaComum = $areaComumModel -> ConsultaAreaComum($idAreaComum,$seguranca -> cripto("TODOS"));
              
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($areaComum as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpAreaComum = $item -> CmpAreaComum;
                     
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data Inclusão",$CmpDataInclusao ,4)                               
                                . $this -> CampoInputReadonly("Setor Condomínio", $CmpAreaComum,12);
                                
                             
        }
        $data["idObjeto"] = $idAreaComum;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
     /* visitante*/
    //BEM
    public function TelaBemDetalhar($idBem){
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $anexoModel = new \App\Classes\AnexoModel();
        //$idAreaComum_decripto = $seguranca -> decripto($idBem);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "det","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("BEM","det"));
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "BEM","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        //$arquivo = "clientes/".$pasta."/bem/";
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $bemModel = new \App\Classes\BemModel();
        $bem = $bemModel -> ConsultaBem($idBem);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($bem as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpNome = $item -> CmpNome;
            //$CmpQuantidade = $item -> CmpQuantidade;
            if($item -> CmpDataAquisicao != ""){
                $CmpDataAquisicao = $util->formatarDataMysqlParaExibicao($item -> CmpDataAquisicao);
            }else{
                $CmpDataAquisicao = "";
            }    
            $CmpValorAquisicao = "R$ " .$util->FormatNumber($item -> CmpValorAquisicao);
            $CmpEnquadramento = $util->DevolveEnquadramento($item -> CmpEnquadramento);
            $CmpDescricao = $item -> CmpDescricao;
            $CmpCategoria = $util -> DevolveCategoria($item -> CmpCategoria);
            $CmpAreaComum = $item -> CmpAreaComum;
            $CmpFornecedor = $item -> CmpRazaoSocial;
            
             //BUSCAR IMAGEM DO VEICULO
            /*$anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel ->recuperaAnexo($seguranca -> decripto($idBem), "BEM");
            foreach($anexo as $item){
               $data["imagem"] = $arquivo.$item->CmpAnexo;
            }*/
              //BUSCAR IMAGEM DO VEICULO
            /*$anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($seguranca -> decripto($idBem), "BEM"); */
            
            $imagem = $anexoModel ->recuperaAnexo($seguranca -> decripto($idBem), "BEM"); 
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/carro_imagem.jpg";
            }
                    
        }
        
              
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
         $lista =  $this -> CampoInputReadonlyGliphycon("Nome", strtoupper($CmpNome),"bem",8)                            
                            . $this -> CampoInputReadonlyGliphycon("Data Aquisição", $CmpDataAquisicao,"calendar",4);   
                             
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoInputReadonlyGliphycon("Valor Aquisição", $util->FormatNumber($CmpValorAquisicao),"money",3)
                            . $this -> CampoInputReadonlyGliphycon("Enquadramento (Depreciação)", $CmpEnquadramento,"",6)
                            . $this -> CampoInputReadonlyGliphycon("Categoria", strtoupper($CmpCategoria),"",3)  
                            . $this ->CampoFimDivisor();
        
        $lista = $lista . $this-> CampoInicioDivisor() 
                            . $this -> CampoInputReadonlyGliphycon("Área Comum", strtoupper($CmpAreaComum),"",12)
                            . $this -> CampoInputReadonlyGliphycon("Fornecedor", strtoupper($CmpFornecedor),"",12)                            
                            . $this -> CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoTextareaReadonlyGliphycon("Comentário",$CmpDescricao, "comentario", 12)  
                            
                            . $this ->CampoFimDivisor();
                            
        $data["formulario"] = $lista;
        
        $data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalheCompleto($util->DevolveObjetoExtenso("BEM"),$CmpDataAquisicao,$CmpNome,"Documentos pertencentes a","Data Aquisição","Bem"));
              
        $data["idObjeto"] = $idBem;
        $data["TipoDonoDocumento"] = $seguranca -> cripto("BEM");
        $data["rotulo"] = $seguranca -> cripto($CmpNome)."-". $seguranca -> cripto($CmpDataAquisicao);
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    //public function TelaOcorrenciaDetalhar($idFuncionario, $idOcorrencia){
     /* visitante*/
    //BEM
    public function TelaFeriasDetalhar($idOcorrencia,$idFuncionario,$msg){
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $anexoModel = new \App\Classes\AnexoModel();
        //$idAreaComum_decripto = $seguranca -> decripto($idBem);
        
        $factory = new \App\DesignPattern\FactoryMethod();       
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");

        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "det","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FER","det"));
                       
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $ocorrencia = $ocorrenciaModel -> ConsultarOcorrenciasPorCategoria3($idFuncionario,1);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($ocorrencia as $item){       
            
            $CmpNome = strtoupper($item -> CmpNome);            
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
                    
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data Início", $CmpDataInicio,4)
                                . $this -> CampoInputReadonly("Data Fim", $CmpDataFim,4)
                                
                                . $this -> CampoInputReadonly("Funcionário", $CmpNome,12)
                                . $this -> CampoTextareaReadonly("Comentário", $item -> CmpObs, 12);
                            
                //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idRecuperaAnexo, "MOR");  
                $imagem = $anexoModel ->recuperaAnexo($item -> idfuncionarios, "FUN");
                if($imagem != ""){                
                    $data["imagem"] = $pasta.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }
        }
     
        //$data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalheCompleto($util->DevolveObjetoExtenso("BEM"),$CmpDataAquisicao,$CmpNome,"Documentos pertencentes a","Data Aquisição","Bem"));
              
        $data["idObjeto"] = $idOcorrencia;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        //$data["TipoDonoDocumento"] = $seguranca -> cripto("BEM");
        //$data["rotulo"] = $seguranca -> cripto($CmpNome)."-". $seguranca -> cripto($CmpDataAquisicao);
                
        return $data;
    }
    
    public function TelaFaltaDetalhar($idOcorrencia,$idFuncionario,$msg){
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $anexoModel = new \App\Classes\AnexoModel();
        $factory = new \App\DesignPattern\FactoryMethod();
        //$idAreaComum_decripto = $seguranca -> decripto($idBem);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "det","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FAL","det"));
                       
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $ocorrencia = $ocorrenciaModel -> ConsultarOcorrenciasPorCategoria3($idFuncionario,2);
               
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
                 
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($ocorrencia as $item){       
            
            $CmpNome = $item -> CmpNome;            
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
            
            $tipoFalta = $this -> RetornaTipoFalta($item -> CmpTipoFalta);
            $motivoFalta = $this -> RetornMotivoOcorrencia($item -> CmpMotivoOcorrencia);
                    
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data Início", $CmpDataInicio,6) 
                                . $this -> CampoInputReadonly("Data Fim", $CmpDataFim,6)
                                . $this -> CampoInputReadonly("Funcionário", strtoupper($CmpNome),12)
                                . $this -> CampoInputReadonly("Categoria", strtoupper($tipoFalta),4)
                                . $this -> CampoInputReadonly("Motivo", strtoupper($motivoFalta),4)
                                
                                . $this -> CampoTextareaReadonly("Comentário", $item -> CmpObs, 12);
                            
            //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idRecuperaAnexo, "MOR");  
                $imagem = $anexoModel ->recuperaAnexo($item -> idfuncionarios, "FUN");
                if($imagem != ""){                
                    $data["imagem"] = $pasta.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }
                               
        }
         
        //$data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalheCompleto($util->DevolveObjetoExtenso("BEM"),$CmpDataAquisicao,$CmpNome,"Documentos pertencentes a","Data Aquisição","Bem"));
              
        $data["idObjeto"] = $idOcorrencia;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        //$data["TipoDonoDocumento"] = $seguranca -> cripto("BEM");
        //$data["rotulo"] = $seguranca -> cripto($CmpNome)."-". $seguranca -> cripto($CmpDataAquisicao);
                
        return $data;
    }
    
    public function TelaLicencaDetalhar($idOcorrencia,$msg){
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $anexoModel = new \App\Classes\AnexoModel();
        //echo "lecenca " . $seguranca -> decripto($idFuncionario);
        
        $factory = new \App\DesignPattern\FactoryMethod();       
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "det","Condomínio","Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("LIC","det"));
                       
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $ocorrencia = $ocorrenciaModel -> ConsultarOcorrenciasPorCategoria4($idOcorrencia,4);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($ocorrencia as $item){       
            
            $CmpNome = strtoupper($item -> CmpNome);            
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
                    
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data Início", $CmpDataInicio,4)
                                . $this -> CampoInputReadonly("Data Fim", $CmpDataFim,4)
                                . $this -> CampoInputReadonly("Categoria", $this->RetornaTipoLicenca($item->CmpTipoOcorrencia),4)
                                . $this -> CampoInputReadonly("Nome", $CmpNome,12)
                                . $this -> CampoTextareaReadonly("Comentário", $item -> CmpObs, 12);
                        
                        $imagem = $anexoModel ->recuperaAnexo($item->idfuncionarios, "FUN");
                        if($imagem != ""){                
                            $data["imagem"] = $pasta.$imagem;
                        }else{
                            $data["imagem"] = "img/silhueta.png";
                        }
        }
        
        //$data["banner"] = $seguranca -> cripto($controleTela -> PrepararDetalheCompleto($util->DevolveObjetoExtenso("BEM"),$CmpDataAquisicao,$CmpNome,"Documentos pertencentes a","Data Aquisição","Bem"));
              
        $data["idObjeto"] = $idOcorrencia;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        //$data["TipoDonoDocumento"] = $seguranca -> cripto("BEM");
        //$data["rotulo"] = $seguranca -> cripto($CmpNome)."-". $seguranca -> cripto($CmpDataAquisicao);
                
        return $data;
    }
    
    
    public function TelaTrabalhoTurnoDetalhar($idTurno){
       
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
                
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE       
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("TUR","det"));
                
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $turnoModel = new \App\Classes\TurnoModel();
        $turno = $turnoModel -> ConsultaTurno2($idTurno);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($turno as $item){
                   
            $selectFuncao = $this -> MontarCombosFuncao($seguranca -> cripto(0));
            $selectHora = $this -> MontarCombosHora("");
       
            /*if($item->CmpDomingo == "S") $item->CmpDomingo = "Escalado";
            if($item->CmpSegunda == "S") $item->CmpSegunda = "Escalado";
            if($item->CmpTerca == "S") $item->CmpTerca = "Escalado";
            if($item->CmpQuarta == "S") $item->CmpQuarta = "Escalado";
            if($item->CmpQuinta == "S") $item->CmpQuinta = "Escalado";
            if($item->CmpSexta == "S") $item->CmpSexta = "Escalado";
            if($item->CmpSabado == "S") $item->CmpSabado = "Escalado";*/
        
            $data["formulario"] = 
                                    "<div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Função
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this ->CampoInputReadonlyGliphycon("Função", strtoupper($item->CmpDescricao), "user", 12).                                                        
                                               "</div>                                                
                                            </div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Horas de Trabalho
                                            </div>
                                                <div class='panel-body'>
                                                      " 
                                                        . $this -> CampoInputReadonlyGliphycon("Início", $item->CmpInicioPrimeiroTurno, "calendar", 3)
                                                        . $this -> CampoInputReadonlyGliphycon("Fim", $item->CmpFimPrimeiroTurno, "calendar", 3)
                                                        .                                                        
                                               "</div>                                                
                                            </div>
                                    </div>    
                                       
                                    <div class='col-lg-12'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Dia de Trabalho 
                                            </div>
                                                <div class='panel-body'>"
                                                    . $this -> CampoCheckBoxV3TamanhoReadOnly("Domingo",$item->CmpDomingo ,  1) 
                                                    . $this -> CampoCheckBoxV3TamanhoReadOnly("Segunda",$item->CmpSegunda ,  1)
                                                    . $this -> CampoCheckBoxV3TamanhoReadOnly("Terça",$item->CmpTerca ,  1)
                                                    . $this -> CampoCheckBoxV3TamanhoReadOnly("Quarta",$item->CmpQuarta ,  1)
                                                    . $this -> CampoCheckBoxV3TamanhoReadOnly("Quinta",$item->CmpQuinta ,  1)
                                                    . $this -> CampoCheckBoxV3TamanhoReadOnly("Sexta",$item->CmpSexta ,  1)
                                                    . $this -> CampoCheckBoxV3TamanhoReadOnly("Sábado",$item->CmpSabado ,  1)
                                                        
                                                    . $this -> CampoTextareaReadonlyGliphycon("Comentário", $item->turnoObs, "comentario", 12)
                                                . "</div>
                                                
                                            </div>
                                    </div> ";
            
           
            $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
            $data["botaoFechar"] = $this -> MontaBotaoFechar();
            
        }
       
        return $data;
    }
    
    //DEPENDENTE
    public function TelaDependenteDetalhar($idMorador,$idDependente,$banner){
       
        $data = array();         
        $util = new \App\Util\Util();
        $anexoModel = new \App\Classes\AnexoModel();    
        
        //echo $idMorador . " - " .$idDependente ."<BR>";
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        //$idAreaComum_decripto = $seguranca -> decripto($idBem);   
        //echo $idDependente . "- <BR>" .$seguranca -> decripto($idDependente). "<BR>";
        
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "det","Morador","Dependente","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DEP","det"));
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $dependenteModel = new \App\Classes\DependentesModel();
        $dependente = $dependenteModel -> ConsultaDependente($idMorador, $idDependente);
             
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "DEP","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        //$arquivo = "clientes/".$pasta."/morador/";
        
        $CmpDataInclusao = "";
        $CmpNome = "";
        $CmpDataNasc = "";
        $CmpDataEntrada = "";
        $CmpDataSaida = "";
        $CmpParentesco = "";
        $CmpDescricao = "";    
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($dependente as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpNome = $item -> CmpNome;
            if($item -> CmpDataNasc != "") $CmpDataNasc = $util->formatarDataMysqlParaExibicao($item -> CmpDataNasc);
            if($item -> CmpDataEntrada != "") $CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item -> CmpDataEntrada);
            if($item -> CmpDataSaida != "") $CmpDataSaida = $util->formatarDataMysqlParaExibicao($item -> CmpDataSaida);
            $CmpParentesco = $util -> EstadoCivil($item -> CmpParentesco);//$util->DevolveEnquadramento($item -> CmpEnquadramento);
            $CmpDescricao = $item -> CmpDescricao;   
                       
            $idade = $util -> DevolveIdade($util->formatarDataMysqlParaExibicao($item -> CmpDataNasc)); //$util->diff($item->CmpDataNasc, date('Y-m-d'), "d");
            
            $selectParentesco = $this -> MontarCombosParentesco($item ->CmpParentesco);
            
           //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonlyGliphycon("Entrada", $CmpDataEntrada,"calendar",3)
                                . $this -> CampoInputReadonlyGliphycon("Saída", $CmpDataSaida,"calendar",3)
                                . $this -> CampoInputReadonlyGliphycon("Nascimento", $CmpDataNasc,"calendar",3) 
                                . $this -> CampoInputReadonlyGliphycon("Parentesco", $CmpParentesco,"user",3)
                                . $this -> CampoInputReadonlyGliphycon("Nome", $CmpNome,"user",9)  
                               
                                . $this -> CampoInputReadonly("Idade (Anos)",$idade ,3)
                                . $this -> CampoTextareaReadonlyGliphycon("Comentário", $CmpDescricao,"comentario",12);  
            
            $imagem = $anexoModel -> recuperaAnexo($seguranca->decripto($idDependente), "DEP"); 
            
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
                 
        }
           
        $data["idObjeto"] = $idMorador;
        $data["idObjeto2"] = $idDependente;
        //$data["banner"] = $seguranca -> decripto($banner);
        $data["banner_cripto"] = $banner;
        
        $data["TipoDonoDocumento"] = $seguranca -> cripto("DEP");
        //$data["rotulo"] = $seguranca -> cripto($CmpNome)."-". $seguranca -> cripto($CmpDataAquisicao);
         //echo "teste";
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
                
        return $data;
    }
     /* visitante*/
     //TELA AREA COMUM
    public function TelaManutencaoProgramadaDetalhar($idManutencao){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idManutencao_decripto = $seguranca -> decripto($idManutencao);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(52, "det","Manutenção","Manutenção Programada");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MNTPRO","det"));
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $manutencaoModel = new \App\Classes\ManutencaoProgramadaModel();
        $manutencao = $manutencaoModel ->ConsultaManutencaoProgramada($idManutencao);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($manutencao as $item){
        
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFim);
            $CmpAssunto = $item -> CmpAssunto;
            $CmpDescricao = $item -> CmpDescricao;
            
                    
        }
        
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Início",$CmpDataInicio ,2)
                            . $this -> CampoInputReadonly("Fim", $CmpDataFim,2)
                            . $this -> CampoInputReadonly("Assunto", $CmpAssunto,8)
                            . $this -> CampoTextareaReadonly("Descrição", $CmpDescricao,12);
                            
        
        $data["idObjeto"] = $idManutencao;
        
        return $data;
    }
    
    /* visitante*/
     //TELA AREA COMUM
    public function TelaFornecedorDetalhar($idFornecedor){
        
        $data = array();         
        $util = new \App\Util\Util();
        $lista = "";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFornecedor_decripto = $seguranca -> decripto($idFornecedor);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Fornecedor","Fornecedor","av1");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOR","det"));
        
        $data["idObjeto"] = 0;
        $data["rotulo"] = 0;        
        
        //PESQUISA DE VEICULO POR ID
        $fornecedorModel = new \App\Classes\FornecedorModel();
        $fornecedor = $fornecedorModel -> ConsultaFornecedor($idFornecedor);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($fornecedor as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $fornecedor = $item->CmpRazaoSocial;
                                
            $cel = $item->CmpCel;
            $telFixo = $item->CmpTelFixo;
            $CNPJ_CPF = $item->CmpCNPJ_CPF;
            $descricao = $item->CmpDescricao;
            $email = $item->CmpEmail;
            $endereco = $item->CmpEndereco;
            $site = $item->CmpSite;   
            
            if($item->CmpCategoriaPessoa == 1){
                $juridica_fisica = "Física";
            }else{
                $juridica_fisica = "Jurídica";
            }    
        }        
       
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $lista = $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao, 2)
                          . $this -> CampoInputReadonly("Categoria Pessoa", $juridica_fisica,2)
                          . $this -> CampoInputReadonly("CNPJ/CPF", $CNPJ_CPF,2)
                          . $this -> CampoInputReadonly("Celular", $cel, 2)
                          . $this -> CampoInputReadonly("Telefone Fixo", $telFixo, 2)
                          . $this -> CampoInputReadonly("Fornecedor", $fornecedor, 12);   
                             
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
        
              
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoInputReadonly("Endereço", $endereco, 12)
                            . $this -> CampoInputReadonly("Site", $site, 6)
                            . $this -> CampoInputReadonly("E-mail", $email, 6)
                            . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this ->CampoTextareaReadonly("Observação", $descricao, 12)                           
                            . $this ->CampoFimDivisor();
        
        $data["formulario"] = $lista;
        
        $data["idObjeto"] = $idFornecedor;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    /* REFORMA APARTAMENTO*/
    //TELA VEICULO
    public function TelaReformaApartamentoDetalhar($idReformaApartamento, $idApartamento){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        $titulo = "";
        $descricaoReforma = "";
        $responsavelReforma = "";
        $inicioReforma = "";
        $fimReforma = "";
        $responsavelReforma = "";
        $descricaoReforma = "";
        $materiaisUsados = ""; 
        $tipoReforma = "";
        $idSituacao = "";
        $descricaoSindico = "";
       // $idSituacao = "";
        $comboAprovacao = ""; 
        $situacao = "";
        $lista = "";
        $statusREF = "";
        $statusAPR = "";
       
        //GRADE DE SEGURANCA
        $aprovacaoModel = new \App\Classes\AprovacaoModel();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idReformaApartamento_decripto = $seguranca -> decripto($idReformaApartamento);       
        $idApartamento_decripto = $seguranca -> decripto($idApartamento);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REFAPA","det"));
      
        //PESQUISA DE VEICULO POR ID
        $reformaApartamentoModel = new \App\Classes\ReformaApartamentoModel();
        $reformaApartamento = $reformaApartamentoModel ->consultarReformaApartamento($idReformaApartamento,$idApartamento);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($reformaApartamento as $item){
        
           $titulo = $item -> CmpTitulo;
           $inicioReforma = $util->formatarDataMysqlParaExibicao($item ->CmpInicioReforma);
           $fimReforma = $util->formatarDataMysqlParaExibicao($item ->CmpFimReforma);
           $responsavelReforma = $item -> CmpResponsavelReforma;
           $descricaoReforma = $item -> CmpDescricaoReforma;
           $materiaisUsados = $item -> CmpMateriaisUsados; 
           $tipoReforma = $item -> CmpDescricao;
           $statusREF = $item -> CmpStatus;
           
           //BUSCA AS INFORMAÇÕES DE APROVAÇÃO
            
            $aprovacao = $aprovacaoModel -> ConsultaAprovacao($idReformaApartamento,"REFAPA");
            
            //if($aprovacao != ""){
            foreach($aprovacao as $item2){
                
                $situacao = $util -> LabelReserva($item2->CmpStatus);
                $descricaoSindico = $item2 -> CmpComentario;
                $statusAPR = $item2->CmpStatus;
                //$indiceCombo = $aprovacao->CmpAprovacao;
            }
              
            $situacao = $util -> LabelReserva($item->CmpStatus);
                    
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
             $lista = $this -> CampoInputReadonly("Título", $titulo,8)
                                . $this -> CampoInputReadonly("Início Reforma", $inicioReforma,2)
                                . $this -> CampoInputReadonly("Fim Reforma", $fimReforma,2)
                                . $this -> CampoInputReadonly("Responsável Reforma", $responsavelReforma,7)
                                . $this -> CampoInputReadonly("Tipo Reforma", $tipoReforma,5)
                                . $this -> CampoTextareaReadonly("Descrição", $descricaoReforma,12)
                                . $this -> CampoTextareaReadonly("Materiais Usados", $materiaisUsados,12);
                            
        
                            // DECISÃO DO SÍNDICO
                            if(Auth::user()-> perfil_idperfil != 2 && $aprovacao != ""){ 
                                $lista = $lista . $this ->CampoHeader("Decisão Síndico")
                                        . $this -> CampoInputReadonly("Situação", $situacao, 3)
                                        . $this -> CampoTextareaReadonly("Comentarios Síndico",$descricaoSindico, 12);
                            }
        
                
        
        }     
        
        //echo "dentro";
        $data["statusDescricao"] = $situacao;
        $data["statusREF"] = $statusREF;
        $data["statusAPR"] = $statusAPR;
        
        $data["formulario"] = $lista;
        
        $comboAprovacao = $this -> MontarCombosAprovacao(0);

        $data["formulario2"] =  $this -> montarFormulario("Aprovar?", "aprovar", "Aprovado ou rejeitado?", "Por favor, informe a aprovação ou rejeição.","", $comboAprovacao, "select1",4)
                                . $this -> CampoTextarea("Comentários do Síndico", "obsSindico", "", 12);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        $data["idObjeto"] = $idApartamento;
        $data["idObjeto2"] = $idReformaApartamento;        
        
        
        return $data;
    }
    
    /* REFORMA APARTAMENTO*/
    //TELA VEICULO
    public function TelaVisitantesDetalhar($idVisitantes){
        
        $data = array();         
        $util = new \App\Util\Util();
        
        $nomeVisitante = "";
        $cnpj_cpf = "";
        $apto_bloco = "";
        $obs = "";
               
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVisitantes_decripto = $seguranca -> decripto($idVisitantes);
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $this -> PrepararArrayData(56, "det","Visitantes","Visitantes");                
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VIS","det"));
      
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "VIS", "PARCIAL");
        //$arquivo = "clientes/".$pasta."/veiculos/";
        
        //PESQUISA DE VEICULO POR ID
        $visitantesModel = new \App\Classes\VisitantesModel();
        $visitantes = $visitantesModel -> consultarVisitante($idVisitantes_decripto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($visitantes as $item){
        
            $nomeVisitante = strtoupper($item -> CmpNome);
            $cnpj_cpf = $item -> CmpCNPJ_CPF;
            $apto_bloco = $item -> CmpApto. "- Bloco ".$item->CmpBloco;
            $obs = strtoupper($item -> CmpObs);   
            $dataInclusao = $util->formatarDataMysqlParaExibicao($item -> CmpDataInclusao);
                     
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idVisitantes_decripto, "VIS");
            if($imagem != ""){
                $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idVisitantes_decripto, "VIS"); 
            }else{
                $data["imagem"] = "img/silhueta.png";
            }    
            //echo "<BR>";
        }
        //echo $data["imagem"];
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoInputReadonly("Data", $dataInclusao,3)
                            . $this -> CampoInputReadonly("CNPJ/CPF", $cnpj_cpf,3)
                            . $this -> CampoInputReadonly("Destino", $apto_bloco,3)
                            . $this -> CampoInputReadonly("Nome Visitante", $nomeVisitante,12)
                            . $this -> CampoTextareaReadonly("Observação", $obs,12);                            
                           
        $data["idObjeto"] = $idVisitantes;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
       
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaVeiculoEditar($idVeiculo){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $idApartamento = 0;
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        $status = "";
        $obs = "";
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Veículo","nor");
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEI","edi"));
        
        /*$factory = new \App\DesignPattern\FactoryMethod();
        echo $pasta = $factory ->GetClassVariavel() ->ConsultaPasta("VEI");        */

        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $arquivo = $factory ->  GetClassVariavel() -> Path($pasta, "VEI","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        //
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVeiculo_decripto = $seguranca->decripto($idVeiculo);
        //MODELO
        //$documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $veiculoControle = new \App\Classes\VeiculoModel();
        $veiculo = $veiculoControle -> consultarVeiculo($idVeiculo);
        
        foreach($veiculo as $item){
            
            $marca = $item ->CmpMarca;
            $modelo = $item ->CmpModelo;
            //$cor = $item ->CmpCor;
            $placa = $item ->CmpPlaca;
            $despacho = $item ->CmpDespacho;
            $idCartao = $item -> cartao_idcartao;
            $idVagaGaragem = $item -> vaga_garagem_idvaga_garagem;
            $idApartamento = $item -> apartamento_idapartamento;
            $idApartamentoAlugado = $item -> alugado_idapartamento;
            $tipoVeiculo = $item -> CmpTipoVeiculo;
            $status = $item -> CmpStatus;
            $obs = $item -> CmpDespacho;
            
                       
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $IMAGEM = $anexoModel ->recuperaAnexo($idVeiculo_decripto, "VEI");
            if($IMAGEM != "")
            {
               $data["imagem"] = $arquivo.$anexoModel ->recuperaAnexo($idVeiculo_decripto, "VEI");     
            }else{
                $data["imagem"] = "img/carro_imagem.jpg";     
            }
            
        
        
               
        $selectCatVeiculo = $this ->MontarCombosTipoVeiculo($tipoVeiculo);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
                
        $selectApartamento = $this -> MontarCombosApartamento($idApartamento);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectApartamentoAlugado = $this -> MontarCombosApartamento($idApartamentoAlugado);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectCartao = $this -> MontarCombosCartaoEstacionamento($idCartao);//montarCombos("catCartao",0);
        $selectCores = $this -> MontarCombosCoresCarro($item -> CmpCor);
       // $selectCategoriaDocumento = $this -> montarCombos("catDocumento", $id);
                
        /*$data["formulario"] = $this ->CampoInputValidacaoTamanho("Placa","placa",$placa,4)
                            . $this ->CampoInputValidacaoTamanho("Marca","marca",$marca,4)
                            . $this ->CampoInputValidacaoTamanho("Modelo","modelo",$modelo,3)                            
                            . $this ->CampoInputValidacaoTamanho("Cor","cor",$cor,3)
                            
                            . $this -> CampoSelect("Cartão Estacionamento","catCartaoEstacionamento","Por favor, informe a categoria do vaga de garagem correta.","","",$selectCartao,"select1",3)
                            . $this -> montarFormulario("<br>Vaga Garagem", "catVagaGaragem", "Escolha a categoria do Vaga de Garagem", "Por favor, informe a categoria do vaga de garagem correta.","", $selectVagaGaragem, "select1",3)
                            . $this -> montarFormulario("<br>Categoria Veículo", "catVeiculo", "Escolha a categoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectTipoVeiculo, "select1",3)*/
                            
                            //. $this -> montarFormulario("Cartão Estacionamento", , "Escolha o Cartão de Estacionamento", ,"", $selectCartao, ,3)
                            
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            /*. $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "",$despacho,"", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);*/
        }       
        $selectFabricante = $this -> MontarCombosFabricante($seguranca->cripto(0));
   
        $data["formulario"] =  //$this -> CampoInputTamanhoGliphycon("Marca","marca","","car",4)
                             //$this -> CampoInputTamanhoGliphycon("Modelo","modelo", "","car",4)
                             $this -> CampoSelectValidacaoFunction("Marca", "marca", "Escolha a Marca do Carro", "Por favor, informe a Marca do Carro correta.","", $selectFabricante, "select1","onchange='javascript:pesquisa_modelo_carro()'",6)
                            . $this -> CampoSelectValidacaoFunction("Modelo", "modelo", "Escolha a Modelo do Carro", "Por favor, informe o Modelo do Carro correto.","", "", "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)

       
                            . $this -> CampoInputTamanhoGliphycon("Placa","placa", $placa,"car",4)
                            //. $this -> CampoInputTamanhoGliphycon("Cor","cor", $cor,"car",4)
                            . $this -> CampoSelectGliphycon("Cor ", "cor", "car", $selectCores,"SIM", 4)
                            
                            . $this -> CampoSelectGliphycon("Categoria ", "catVeiculo", "car", $selectCatVeiculo,"SIM", 4)
                            //. $this -> montarFormulario("Categoria Veículo", "catVeiculo", "Escolha acategoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectCatVeiculo, "select1",3)                            
                            //. $this -> CampoSelectGliphycon("Apartamento", "selApartamento", "casa", $selectApartamento,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Pertence ao Apartamento", "selApartamento", "casa", $selectApartamento,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Aluga Vaga do Apartamento", "selApartamentoAlugado", "casa", $selectApartamentoAlugado,"NAO", 4)
                           
                            //. $this -> montarFormulario("APTO", "selApartamento", "Escolha o Apartamento", "Por favor, informe o Apartamento correta.","", $selectApartamento, "select1",3)
                            . $this -> CampoSelectGliphycon("Cartão Estacionamento","catCartaoEstacionamento","",$selectCartao,"NAO",4)
                
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$obs,"comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        /*$data["formulario"] = $this -> CampoInputReadonly("Data Cadastro", $CmpDataInclusao,3)
                            . $this -> CampoInputReadonly("Placa", $CmpPlaca,3)
                            . $this -> CampoInputReadonly("Marca", $CmpMarca,3)  
                            . $this -> CampoInputReadonly("Modelo", $CmpModelo,3)
                            . $this -> CampoInputReadonly("Cor", $CmpCor,3)                            
                            . $this -> CampoInputReadonly("Cartão Estacionamento", $CmpCartao,3)
                            . $this -> CampoInputReadonly("Categoria Veículo", $CmpTipoVeiculo,3)
                            . $this -> CampoInputReadonly("Vaga Apto", $vaga_apto,2)
                            . $this -> CampoTextareaReadonly("Descrição", $CmpDespacho,12)
                            . $this -> CampoHidden("val",$data["idObjeto"]);*/
        
        $data["formulario2"] = $this ->CampoSelecionaImagem();        
        $data["idveiculo"] = $idVeiculo;
        $data["status"] = $status;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this ->MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaEventoEditar($idEvento){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Evento");
         //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("EVE","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() ->ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "EVE", "PARCIAL");
        //$arquivo = "clientes/".$pasta."/eventos/";

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idEvento_decripto = $seguranca->decripto($idEvento);
        //MODELO
        
        
        //FAZ A BUSCA DO DOCUMENTO
        $eventoControle = new \App\Classes\EventoModel();
        $evento = $eventoControle ->consultarEvento($idEvento);
        
        foreach($evento as $item){
            
            $titulo = $item ->CmpTitulo;
            $email = $item ->CmpEmail;
            $tel = $item ->CmpTel;
            $texto = $item ->CmpTexto;
            
            //BUSCAR IMAGEM DO VEICULO
            //$anexoModel = new \App\Classes\AnexoModel();
            //$data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idEvento_decripto, "EVE");
            
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idEvento_decripto, "EVE");
            if($imagem != ""){
                $data["imagem"] = $pasta.$imagem; 
            }else{
                $data["imagem"] = "img/entrega.png"; 
            }
            //BUSCAR IMAGEM DO VEICULO
            /*$anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel ->recuperaAnexo($idEvento_decripto, "EVE");
            foreach($anexo as $item){
               $data["imagem"] = $arquivo.$item->CmpAnexo;
            }*/
        
        }
               
                       
        /*$data["formulario"] = $this ->CampoInputValidacaoTamanho("Titulo","titulo",$titulo,9)
                            . $this ->CampoInputValidacaoTamanho("Telefone","tel",$tel,3)
                            . $this ->CampoInputValidacaoTamanho("E-mail","email",$email,9)                       
                            //. $this -> montarFormulario("Descrição", "obs", "Digite uma descrição necessária.", "",$texto,"", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs",$texto,"comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);*/
        
                 
        $data["formulario"] = $this -> CampoInputValidacaoTamanhoGliphycon("Título","titulo",$titulo,"generico",12)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Email","email",$email,"email",8)
                            //$this ->CampoInputValidacaoTamanho("Título","titulo","",12)                            
                            //. $this ->CampoInputValidacaoTamanho("Email","email","",8)
                            . $this ->CampoInputTamanhoGliphycon("Telefone","tel",$tel,"tel",4)
                            //. $this -> montarFormulario("Observações", "obs", "Faça um comentário", "","","", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs",$texto,"comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        
        $data["idObjeto"] = $idEvento;
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaBemEditar($idBem){
     
        $data = array();                
        $util = new \App\Util\Util();
        $anexoModel = new \App\Classes\AnexoModel();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Bem","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("BEM","edi"));        
       
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "BEM","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $idEvento_decripto = $seguranca->decripto($idEvento);
        //MODELO        
        
        //FAZ A BUSCA DO DOCUMENTO
        $bemModel = new \App\Classes\BemModel();
        $bem = $bemModel -> ConsultaBem($idBem);       
        
        foreach($bem as $item){
            
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpNome = $item -> CmpNome;
            //$CmpQuantidade = $item -> CmpQuantidade;
            if($item -> CmpDataAquisicao != ""){
                $CmpDataAquisicao = $util->formatarDataMysqlParaExibicao($item -> CmpDataAquisicao);
            }else{
                $CmpDataAquisicao = "";
            }
            
            
            $CmpValorAquisicao = $item -> CmpValorAquisicao;
            $CmpEnquadramento = $util->DevolveEnquadramento($item -> CmpEnquadramento);
            $CmpDescricao = $item -> CmpDescricao;
            $CmpCategoria = $util -> DevolveCategoria($item -> CmpCategoria);
            //$CmpAreaComum = $item -> CmpAreaComum;
            //$CmpFornecedor = $item -> CmpRazaoSocial;
        
            $fornecedor = $item -> fornecedor_idfornecedor;
            $areaComum = $item -> area_comum_idarea_comum;
            $enquadramento = $item -> CmpEnquadramento;
            $categoria = $item -> CmpCategoria;
                   
            $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto($fornecedor));
            $selectAreaComum = $this -> MontarCombosAreaComum($seguranca -> cripto($areaComum),"TODOS");
            $selectDepreciacao = $this -> MontarCombosDepreciacao($enquadramento);
            $selectCategoriaBem = $this -> MontarCombosCategoriaBem($categoria);
            
             //BUSCAR IMAGEM DO VEICULO
            
            //$anexo = $anexoModel ->recuperaAnexo($seguranca->decripto($idBem), "BEM");
            //foreach($anexo as $item){
              // $data["imagem"] = $pasta.$anexo;
            //}
               
            $imagem = $anexoModel ->recuperaAnexo($seguranca->decripto($idBem), "BEM");
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
        }
       
        
        $lista = $this -> CampoInputValidacaoTamanhoGliphycon("Nome ","nomeBem",$CmpNome,"bem",8)                            
                            . $this -> CampoInputTamanhoGliphycon("Data Aquisição", "dataAquisicao", $CmpDataAquisicao,"calendar",4); 
      
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
       
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoInputMoedaGliphycon("Valor Aquisição","valorAquisicao",$util->FormatNumber($CmpValorAquisicao),"money",4)
                            . $this -> CampoSelectGliphycon("Enquadramento (Depreciação)", "catEnqBem", "bem", $selectDepreciacao, "SIM",4)
                            . $this -> CampoSelectGliphycon("Categoria ", "catBem", "", $selectCategoriaBem, "SIM",4)  
                            . $this ->CampoFimDivisor();
       
        $lista = $lista . $this-> CampoInicioDivisor() 
                            . $this -> CampoSelectGliphycon("Área Comum", "areCom", "", $selectAreaComum, "NAO",12)
                            . $this -> CampoSelectGliphycon("Fornecedor", "forBem", "", $selectFornecedor, "NAO",12)                            
                            . $this -> CampoFimDivisor();
        
       
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoTextAreaGliphycon("Comentário", "desBem",$CmpDescricao,"comentario",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                            . $this ->CampoFimDivisor();
       
        
        $data["formulario"] = $lista;
        
        $data["idObjeto"] = $idBem;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaFeriasEditar($idFuncionario, $idOcorrencia){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;        
         
        $anexoModel = new \App\Classes\AnexoModel();
        $factory = new \App\DesignPattern\FactoryMethod();       
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FER","edi"));        
                      
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //FAZ A BUSCA DO DOCUMENTO
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $ocorrencia = $ocorrenciaModel -> ConsultarOcorrencia($idFuncionario,$idOcorrencia);       
        
        foreach($ocorrencia as $item){            
           
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
            
            if($item->CmpTipoOcorrencia == 1) $item->CmpTipoOcorrencia = "Acidente";
            if($item->CmpTipoOcorrencia == 2) $item->CmpTipoOcorrencia = "Doenças";
            if($item->CmpTipoOcorrencia == 3) $item->CmpTipoOcorrencia = "Falta";          
            if($item->CmpTipoOcorrencia == 4) $item->CmpTipoOcorrencia = "Férias";
            
            $CmpObs = $item -> CmpObs;   
            
            $selectTipoOcorrencia = $this -> MontarCombosTipoOcorrencia(0);
            $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto($item->funcionario_idfuncionario)); 
        
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this ->CampoInputTamanho("Início","dtinicio", $CmpDataInicio,4)
                                . $this -> CampoInputTamanho("Fim", "dtfim", $CmpDataFim,4)
                                . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "", $selectFuncionario,"SIM", 12)                               
                                . $this ->CampoTextAreaGliphycon("Observação","obs", $CmpObs,"comentario",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                 
                $imagem = $anexoModel ->recuperaAnexo($item -> funcionario_idfuncionario, "FUN");
                if($imagem != ""){                
                    $data["imagem"] = $pasta.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }
        }
                 /*
  
              
        $data["formulario1"] =  $this -> CampoInputValidacaoTamanhoGliphycon("Início","dtEntrada","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Término","dtSaida", "","calendar",4)   
                            . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "", $selectFuncionario,"SIM", 12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this ->CampoHidden("tipo", 1);                   */
        $data["idObjeto"] = $idFuncionario;
        
        return $data;
    }
    
    public function MontarTelaFaltaEditar($idFuncionario, $idOcorrencia){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;        
         
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FAL","edi"));        
                      
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $anexoModel = new \App\Classes\AnexoModel();
        $factory = new \App\DesignPattern\FactoryMethod();  
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        
        //FAZ A BUSCA DO DOCUMENTO
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $ocorrencia = $ocorrenciaModel -> ConsultarOcorrencia($idFuncionario,$idOcorrencia);       
        
        foreach($ocorrencia as $item){            
           
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
            $CmpObs = $item -> CmpObs;   
            
            $selectTipoOcorrencia = $this -> MontarCombosTipoOcorrencia(0);
            $selectTipoFalta = $this -> MontarCombosTipoFalta($item->CmpTipoOcorrencia);
            $selectMotivoFalta = $this -> MontarCombosMotivoOcorrencia($item->CmpMotivoOcorrencia);
            $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto($item->funcionario_idfuncionario));  
        
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputValidacaoTamanhoGliphycon("Início","dtinicio",$CmpDataInicio,"calendar",4)
                                . $this -> CampoInputValidacaoTamanhoGliphycon("Fim","dtfim",$CmpDataFim,"calendar",4)
                                . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "user", $selectFuncionario,"SIM", 12)
                                . $this -> CampoSelectGliphycon("Categoria ", "tipoFalta", "", $selectTipoFalta,"SIM", 4)
                                . $this -> CampoSelectGliphycon("Motivo ", "motivoFalta", "", $selectMotivoFalta,"SIM", 4)                                                       
                                . $this ->CampoTextAreaGliphycon("Observação","obs", $CmpObs,"comentario",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                    
                //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idRecuperaAnexo, "MOR");  
                $imagem = $anexoModel ->recuperaAnexo($item -> funcionario_idfuncionario, "FUN");
                if($imagem != ""){                
                    $data["imagem"] = $pasta.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }
           
        }
                 
        $data["idObjeto"] = $idFuncionario;
        
        return $data;
    }
    
    
    public function MontarTelaLicencaEditar($idOcorrencia){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;        
         
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("LIC","edi"));        
                      
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idOcorrencia_decripto = $seguranca->decripto($idOcorrencia);
        
        $anexoModel = new \App\Classes\AnexoModel();
        //echo "lecenca " . $seguranca -> decripto($idFuncionario);
        
        $factory = new \App\DesignPattern\FactoryMethod();       
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        
        //FAZ A BUSCA DO DOCUMENTO
        $ocorrenciaModel = new \App\Classes\OcorrenciaModel();
        $ocorrencia = $ocorrenciaModel ->  ConsultarOcorrenciasPorCategoria4($idOcorrencia,4);//ConsultarOcorrencia($idFuncionario,$idOcorrencia);       
        
        foreach($ocorrencia as $item){            
           
            $item -> CmpNome = strtoupper($item -> CmpNome);
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
            
            if($item->CmpTipoOcorrencia == 1) $item->CmpTipoOcorrencia = "Férias";
            if($item->CmpTipoOcorrencia == 2) $item->CmpTipoOcorrencia = "Falta";
            if($item->CmpTipoOcorrencia == 3) $item->CmpTipoOcorrencia = "Folga";          
            if($item->CmpTipoOcorrencia == 4) $item->CmpTipoOcorrencia = "Licença";
            
            $CmpObs = $item -> CmpObs;   
            //echo "fun ".$idFuncionario . " f ". $seguranca->decripto($idFuncionario);
            $selectTipoLicenca = $this ->MontarCombosTipoLicenca(0);
            $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto($item->idfuncionarios)); 
       
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            /*$data["formulario"] = $this ->CampoInputTamanho("Início","dtinicio", $CmpDataInicio,4)
                                . $this -> CampoInputTamanho("Fim", "dtfim", $CmpDataFim,4)
                                . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "", $selectFuncionario,"SIM", 12)
                                //. $this -> CampoSelectFunction("Tipo", "tipo", "Escolha o ", "Por favor, informe a Categoria da Conta correta.","", $selectTipoOcorrencia, "select1","",2)                                                       
                                . $this ->CampoTextAreaGliphycon("Observação","obs", $CmpObs,"comentario",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);*/
              
            $data["formulario"] =  $this -> CampoInputValidacaoTamanhoGliphycon("Início","dtEntrada",$CmpDataInicio,"calendar",3)
                            . $this -> CampoInputTamanhoGliphycon("Término","dtSaida", $CmpDataFim,"calendar",3) 
                            . $this -> CampoSelectGliphycon("Categoria Licença", "tipoLicenca", "generico", $selectTipoLicenca,"SIM", 4)
                            
                            . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "user", $selectFuncionario,"SIM", 12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs",$CmpObs,"comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                            . $this ->CampoHidden("tipo", 1); 
            
                            $imagem = $anexoModel ->recuperaAnexo($item->idfuncionarios, "FUN");
                            if($imagem != ""){                
                                $data["imagem"] = $pasta.$imagem;
                            }else{
                                $data["imagem"] = "img/silhueta.png";
                            }
        }
                 
        $data["idObjeto"] = $idOcorrencia;
        
        
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaTrabalhoTurnoEditar($idTurno){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Bem","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("TUR","edi"));        
                      
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $idEvento_decripto = $seguranca->decripto($idEvento);
        //MODELO        
        
        //FAZ A BUSCA DO DOCUMENTO
        $turnoModel = new \App\Classes\TurnoModel();
        $turno = $turnoModel -> ConsultaTurno2($idTurno);      
        
        foreach($turno as $item){            
           
            $selectFuncao = $this -> MontarCombosFuncao($seguranca->cripto($item->funcao_idfuncao));
            
            
            /*$selectHoraPriTur = $this -> MontarCombosHora($item->CmpInicioPrimeiroTurno);
            $selectHoraFimTur = $this -> MontarCombosHora($item->CmpFimPrimeiroTurno);
            $selectHoraSegTur = $this -> MontarCombosHora($item->CmpInicioSegundoTurno);
            $selectHoraFimTur = $this -> MontarCombosHora($item->CmpFimSegundoTurno);*/
            
            //$CmpObs = $item -> turnoObs;   
            
            //$selectTipoOcorrencia = $this -> MontarCombosTipoOcorrencia(0);
        
            $data["formulario"] = 
                                    "<div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Função
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this -> CampoSelectGliphycon("Função", "funcao", "user", $selectFuncao,"SIM", 12).                                                        
                                               "</div>                                                
                                            </div>
                                    </div>
                                       
                                     <div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Horas de Trabalho
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this -> CampoInputValidacaoTamanhoGliphycon("Início", "pritur1",$item->CmpInicioPrimeiroTurno, "calendar2", 3)    
                                                        . $this -> CampoInputValidacaoTamanhoGliphycon("Término", "pritur2",$item->CmpFimPrimeiroTurno, "calendar2", 3)  .                                                      
                                               " <font color='red'>OBS.: O Turno deve incluir o período de almoço!</font></div>                                                
                                            </div>
                                    </div> 
                                     
                                    <div class='col-lg-12'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Dia de Trabalho
                                            </div>
                                                <div class='panel-body'>"
                                                    . $this ->CampoCheckBoxTamanho("Domingo", "dom", $item->CmpDomingo, 1) 
                                                    . $this ->CampoCheckBoxTamanho("Segunda", "seg", $item->CmpSegunda, 1)
                                                    . $this ->CampoCheckBoxTamanho("Terça", "ter", $item->CmpTerca, 1)
                                                    . $this ->CampoCheckBoxTamanho("Quarta", "qua", $item->CmpQuarta, 1)
                                                    . $this ->CampoCheckBoxTamanho("Quinta", "qui", $item->CmpQuinta, 1)
                                                    . $this ->CampoCheckBoxTamanho("Sexta", "sex", $item->CmpSexta, 1)
                                                    . $this ->CampoCheckBoxTamanho("Sábado", "sab", $item->CmpSabado, 1)
                                                        
                                                    //. $this -> montarFormulario("Observação", "obs", "Digite uma descrição necessária.", "","","", "textarea",12)
                                                    . $this -> CampoTextAreaGliphycon("Comentário", "obs",$item -> turnoObs,"comentario",12)
                                                    . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                                                . "</div>
                                                
                                            </div>
                                    </div> ";
                    
        }
                 
        $data["idObjeto"] = $idTurno;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaPlanoContasEditar($idPlanoContas){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Bem","nor"); 
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLCO","edi"));        
       
        /*$factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta("");
        $arquivo = "clientes/".$pasta."/bem/";*/
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $idEvento_decripto = $seguranca->decripto($idEvento);
        //MODELO        
        
        //FAZ A BUSCA DO DOCUMENTO
        $planoContasModel = new \App\Classes\PlanoContasModel();
        $planoContas = $planoContasModel -> ConsultaPlanoContas($idPlanoContas);       
        
        foreach($planoContas as $item){
            
            //$CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpNomeConta = $item -> CmpConta;
            $CmpCategoriaConta = $item -> CmpCategoriaConta;          
                  
            $selectCategoriaConta = $this -> MontarCombosCategoriaConta($CmpCategoriaConta);
            
            $data["formulario"] = $this ->CampoInputValidacaoTamanho("Descrição","conta",$CmpNomeConta,12)
                                . $this -> montarFormulario("Categoria ", "categConta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectCategoriaConta, "select1",4)
                                
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit3",12);
        }
               
                      
        /*$lista = $this ->CampoInputValidacaoTamanho("Nome Bem","nomeBem",$CmpNome,8)
                            . $this -> CampoInputValidacaoTamanho("Quantidade do Bem", "quantidade", $CmpQuantidade,2)
                            . $this -> CampoInputValidacaoTamanho("Data Aquisição", "dataAquisição", $CmpDataAquisicao,2);   
                             
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoInputValidacaoTamanho("Valor Aquisição", "valorAquisição", $CmpValorAquisicao,2)
                            . $this -> montarFormulario("Enquadramento do Bem (Depreciação)", "catEnqBem", "Escolha o Enquadramento do Bem", "Por favor, informe a Enquadramento do bem correto.","", $selectDepreciacao, "select1",5)
                            . $this -> montarFormulario("Categoria Bem", "catBem", "Escolha o Categoria do Bem", "Por favor, informe a categoria do bem correta.","", $selectCategoriaBem, "select1",2)  
                            . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoSelect("Área Comum", "areCom", "Escolha a Área Comum do Bem", "Por favor, informe a Área Comum do Bem correto.","", $selectAreaComum, "select1",12)
                            . $this -> CampoSelect("Fornecedor do Bem", "forBem", "Escolha o Fornecedor do Bem", "Por favor, informe a Fornecedor do bem correto.","", $selectFornecedor, "select1",12)
                            . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this ->montarFormulario("Descrição do Bem", "desBem", "Informe a descrição do bem", "",$CmpDescricao,"", "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2)
                            . $this ->CampoFimDivisor();
        
        $data["formulario"] = $lista;*/
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        $data["idObjeto"] = $idPlanoContas;
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaPlanoSubContasEditar($idPlanoContas, $idPlanoSubContas){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Bem","nor"); 
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLSUCO","edi"));        
       
        /*$factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta("");
        $arquivo = "clientes/".$pasta."/bem/";*/
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $idEvento_decripto = $seguranca->decripto($idEvento);
        //MODELO        
        
        //FAZ A BUSCA DO DOCUMENTO
        $planoSubContasModel = new \App\Classes\PlanoSubContasModel();
        $planoSubContas = $planoSubContasModel -> ConsultaPlanoSubContas($idPlanoContas, $idPlanoSubContas);   
        
        foreach($planoSubContas as $item){
            
            //$CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpNomeSubConta = $item -> CmpNomeSubConta;
            $CmpClassificacao = $item -> CmpClassificacao;
            $CmpDescricao = $item -> CmpDescricao;
            $CmpCategoriaConta = $item -> CmpCategoriaConta;          
                  
            $selectCategoriaConta = $this -> MontarCombosCategoriaConta($CmpCategoriaConta);
            
            $data["formulario"] = $this ->CampoInputValidacaoTamanho("SubConta","conta",$CmpNomeSubConta,8)
                            . $this ->CampoInputValidacaoTamanho("Classificação","classificacao",$CmpClassificacao,2)                            
                            //. $this -> montarFormulario("Observação", "obs", "Digite uma descrição necessária.", "",$CmpDescricao,"", "textarea",12);
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        }
               
                      
        
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();

        $data["idObjeto"] = $idPlanoContas;
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaDependenteEditar($idMorador,$idDependente,$banner){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        $CmpDataEntrada = "";
        $CmpDataSaida = "";
        $CmpDataNasc = "";
        
        $anexoModel = new \App\Classes\AnexoModel();
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Dependente","nor");   
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DEP","edi"));
               
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "DEP","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        //$arquivo = "clientes/".$pasta."/morador/";     
        
        //FAZ A BUSCA DO DOCUMENTO
        $dependenteModel = new \App\Classes\DependentesModel();
        $dependente = $dependenteModel -> ConsultaDependente($idMorador, $idDependente);
        
        foreach($dependente as $item){
            
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpNome = $item -> CmpNome;
            if($item -> CmpDataNasc != "") $CmpDataNasc = $util->formatarDataMysqlParaExibicao($item -> CmpDataNasc);
            if($item -> CmpDataEntrada != "") $CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item -> CmpDataEntrada);
            if($item -> CmpDataSaida != "") $CmpDataSaida = $util->formatarDataMysqlParaExibicao($item -> CmpDataSaida);
                        
            $CmpDescricao = $item -> CmpDescricao;           
                   
            $selectParentesco = $this -> MontarCombosParentesco($item ->CmpParentesco);
            
            //BUSCAR IMAGEM DO VEICULO
            /*$anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idDependente, "DEP");*/
            
            $imagem = $anexoModel -> recuperaAnexo($seguranca->decripto($idDependente), "DEP");             
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            
        }
               
                      
       $lista =              $this -> CampoInputTamanho("Entranda", "dtEntrada", $CmpDataEntrada,3)
                            . $this -> CampoInputTamanho(" Saída", "dtSaida", $CmpDataSaida,3)
                            . $this -> CampoInputValidacaoTamanho(" Nascimento", "dtNasc", $CmpDataNasc,3)
                            . $this -> CampoSelect("Parentesco", "parentesco", "Escolha o Parentesco do Bem", "Por favor, informe a Parentesco do bem correto.","", $selectParentesco, "select1",3);
                             
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
               
        
        $lista = $lista . $this->CampoInicioDivisor() 
                            . $this ->CampoInputValidacaoTamanho("Nome","nomeDep",$CmpNome,12)                            
                            
                            
                            . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this ->montarFormulario("Comentário", "coment", "Informe a descrição do bem", "",$CmpDescricao,"", "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit4",12)
                            . $this -> CampoFimDivisor();
        
        $data["formulario"] = $lista;
        $data["banner"] = $banner;
        $data["idObjeto"] = $idMorador;
        $data["idObjeto2"] = $idDependente;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaRamalEditar($idRamal){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Ramal"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RAM","edi"));
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idRamal_decripto = $seguranca->decripto($idRamal);
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $ramalControle = new \App\Classes\RamalModel();
        $ramal = $ramalControle -> consultaRamal($idRamal);
        
         //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($ramal as $item){
        
            $CmpAuto = $item -> CmpAuto;           
            $ramal = $item -> CmpRamal;

            $apto = $item -> CmpApto;
            $bloco = $item -> CmpBloco;
      
            $comentario = $item -> CmpComentario;
            
            if($item -> CmpEhMorador == "S")
            {    
                $nome = $item -> nomePRO;
            }else{
                $nome = $item -> nomeMOR;
            }
            
            $selectApartamento = $this->MontarCombosApartamento(0);

             //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $formulario =  $this -> CampoInputReadonly("Morador/Proprietario", $nome,10);
            //$formulario = $formulario . $this -> CampoInputReadonly("Ramal", $ramal,2);
            
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $formulario = $formulario . $this -> CampoInputValidacaoTamanhoGliphycon("Ramal","ramal",$ramal,"generico",2);

                if($CmpAuto == 1){
                    $formulario = $formulario . $this -> CampoInputReadonly("Apartamento", $apto."/".$bloco, 4); //$this -> CampoInputReadonly("Apartamento", $apto,2) . $this -> CampoInputReadonly("Bloco", $bloco,2);
                                //. $this -> ListaAnexo($listaAnexos, 8);
                }else{
                    $formulario = $formulario . $this -> CampoInputReadonly("Área Comum", $apto,2);
                }  
                
                $formulario = $formulario . $this -> CampoTextAreaGliphycon("Comentário", "comentario","","comentario",12)
                         . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        }    
            
        
        
            
        $data["formulario"] = $formulario;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaCautelaEditar($idCautela){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $situacao = "";
        $descricaoSindico = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CAU","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta("CAU");        

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idCautela_decripto = $seguranca->decripto($idCautela);
              
        //PESQUISA DE VEICULO POR ID
        $cautelaModel = new \App\Classes\CautelaModel();
        echo $cautela = $cautelaModel -> ConsultaCautela($idCautela);
        
        foreach($cautela as $item){
            
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);            
            $CmpDescricao = $item -> CmpDescricao;
            $descricaoSindico = $item->obsSindico;
            
            if($item->CmpAprovacao == 1) $situacao = "Aprovado";
            if($item->CmpAprovacao == 2) $situacao = "Rejeitado";
            $idSituacao = $item->CmpAprovacao;
           
        
            //BUSCAR IMAGEM DO VEICULO
            //$anexoModel = new \App\Classes\AnexoModel();
            //$data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idClassificados_decripto, "CLA");
            $selectBem = $this -> MontarCombosBem($seguranca->cripto($item->bem_idbem));
            
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data ", $CmpDataInclusao,2)
                                . $this -> montarFormulario("Bem", "bem", "Escolha o bem para acautelar", "Por favor, informe o tipo de Categoria Correta.","", $selectBem, "select1",2)
                                . $this -> CampoTextarea("Descrição","descricao", $CmpDescricao,12)
                                . $this -> CampoHidden("val",$idCautela)
                                . $this -> CampoHeader("Decisão Síndico")
                                . $this -> CampoInputReadonly("Situação", $situacao, 3)
                                . $this -> CampoTextareaReadonly("Comentarios Síndico",$descricaoSindico, 12)
                                . $this -> CampoHidden("val",$idCautela)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);;
            
            /*$this -> montarFormulario("Bem", "bem", "Escolha o bem para acautelar", "Por favor, informe o tipo de Categoria Correta.","", $selectBem, "select1",2)
                            . $this -> montarFormulario("Observações", "descricao", "Faça um comentário", "","","", "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);*/
                    
        }
               
        /*$selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0);       
       
                
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Assunto","assunto",$assunto,8)                                                      
                            . $this -> montarFormulario("Tipo Negócio", "tipNeg", "Escolha o Tipo de Negócio", "Por favor, informe o tipo de Categoria Correta.","", $selectCategoriaNegocio, "select1",2)
                            . $this -> montarFormulario("Observações", "obs", "Faça um comentário", "",$texto,"", "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);*/
        
        $data["idObjeto"] = $idCautela;
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaClassificadosEditar($idClassificados){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CLA","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta();        
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "CLA", "PARCIAL");

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idClassificados_decripto = $seguranca->decripto($idClassificados);
              
        //FAZ A BUSCA DO DOCUMENTO
        $classificadosControle = new \App\Classes\ClassificadosModel();
        $classificado = $classificadosControle ->consultarClassificados($idClassificados);
        
        foreach($classificado as $item){
            
            $assunto = $item ->CmpAssunto;
            $texto = $item ->CmpTexto;
            $categoria = $item ->CmpCategoriaNegocio;
           
        
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            //$data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idClassificados_decripto, "CLA");
            $imagem = $anexoModel -> recuperaAnexo($idClassificados_decripto, "CLA");
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
                    
        }
               
        $selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0);       
       
                
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Assunto","assunto",$assunto,9)                                                      
                            . $this -> montarFormulario("Tipo Negócio", "tipNeg", "Escolha o Tipo de Negócio", "Por favor, informe o tipo de Categoria Correta.","", $selectCategoriaNegocio, "select1",3)
                            //. $this -> montarFormulario("Observações", "obs", "Faça um comentário", "",$texto,"", "textarea",12) 
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        $data["idObjeto"] = $idClassificados;
        
        return $data;
    }
    
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaFuncionarioEditar($idFuncionario){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        $data["formulario"] = "";
        $data["formulario"] = "";     
        
        $anexoModel = new \App\Classes\AnexoModel();
        $factory = new \App\DesignPattern\FactoryMethod();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUNC","edi"));
        
                
        $pasta = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "FUN","PARCIAL"); //"clientes/".$pasta."/veiculos/";     

        //GRADE DE SEGURANCA
        
        $idFuncionario_decripto = $seguranca->decripto($idFuncionario);
              
        //PESQUISA DE VEICULO POR ID
        $funcionarioModel = new \App\Classes\FuncionarioModel();
        /*$funcionario = $funcionarioModel -> ConsultaFuncionario($idFuncionario); //consultarApartamentoPorId($id_decripto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($funcionario as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpNome = $item -> CmpNome;
               
            $data["formulario"] = $this ->CampoInputValidacaoTamanho("Nome","nome",$CmpDataInclusao,12)
                            . $this ->CampoInputValidacaoTamanho("CPF","cpf",$CmpNome,2)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
            
            
       
        }*/
        
        $funcionario = $funcionarioModel -> ConsultaFuncionario($idFuncionario);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($funcionario as $item){
        
            
            if($item->CmpDataNasc != ""){
                $CmpDataNasc = $util->formatarDataMysqlParaExibicao($item->CmpDataNasc);
            }else{
                $CmpDataNasc = "";
            } 
            
            //$CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            if($item->CmpEntradaCondominio != ""){
                $CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpEntradaCondominio);
            }else{
                $CmpDataEntrada = "";
            } 
            if($item->CmpSaidaCondominio != ""){
                $CmpDataSaida = $util->formatarDataMysqlParaExibicao($item->CmpSaidaCondominio);
            }else{
                $CmpDataSaida = "";
            }    
            $CmpNome = $item -> CmpNome;
             
            $conjuge = $item -> CmpConjuge;
            $email = $item -> CmpEmail;
            $ehDeficiente = $item -> CmpEhDeficiente;
            $tel = $item -> CmpTel;
            $cel = $item -> CmpCel;
            $pai = $item -> CmpPai;
            $mae = $item -> CmpMae;
            //id para a pagina
            $idObjeto = $data["idObjeto"] = $seguranca -> cripto($idFuncionario_decripto);                 //idVeiculo codificado
            $data["TipoDonoDocumento"] = $seguranca -> cripto("FUN");            

            //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idFuncionario_decripto, "FUN");
            $imagem = $anexoModel -> recuperaAnexo($idFuncionario_decripto, "FUN");
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            
            //$estCivil = $util -> SituacaoEstadoCivil($item ->CmpEstCivil);
            $estCivil = $this -> MontarCombosEstadoCivil($item ->CmpEstCivil);
            /*$naturalidade = $util -> naturalidade($item -> CmpNaturalidade);
            $nacionalidade = $util -> nacionalidade($item -> CmpNacionalidade);*/
            $ehDeficiente = $util -> deficiente($item -> CmpEhDeficiente);            
           
            $escolaridade = $util -> escolaridade($item -> CmpEscolaridade);
            $funcao = $item -> CmpDescricao;            
            $obs = $item -> CmpObs;
            $obsDoc = $item -> CmpObsDoc;            
            $endereco = $item -> CmpEndereco;            
            $selectCatProduto = $this -> montarCombos("catProduto",0);        
            $selectCatVeiculo = $this -> montarCombos("catVeiculo",0);
            $selectVagaGaragem = $this -> MontarCombosVagaGaragem(0);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
            $selectCartao = $this -> MontarCombosCartaoEstacionamento(0);//montarCombos("catCartao",0);

            /*$selectNaturalidade = $this -> MontarCombosNaturalidade($item -> CmpNaturalidade);
            $selectNacionalidade = $this -> MontarCombosNacionalidade($item -> CmpNacionalidade);*/
            
            $selectNaturalidade = $this -> MontarCombosNaturalidade($item -> CmpNacionalidade,$item -> CmpNacionalidade);
            $selectNacionalidade = $this -> MontarCombosNacionalidade($item -> CmpNacionalidade);
          
            
            $selectEhDecifiente = $this -> MontarCombosSIM_NAO($item -> CmpEhDeficiente);            
            $selectEscolaridade = $this -> MontarCombosEscolaridade($item -> CmpEscolaridade);
            $selectFuncao = $this -> MontarCombosFuncao($seguranca->cripto($item ->funcao_idfuncao));
            //$selectUF = $util ->UnidadeFederacao($item -> uf_iduf);
            $selectUF = $this -> MontarCombosUnidadeFederacao($item -> uf_iduf); // MontarCombosUnidadeFederal();
            $selectFiliacaoSindicato = $this -> MontarCombosSIM_NAO($item -> CmpFiliacaoSindicato);
            
            //DOCUMENTOS OFICIAIS
            $CmpCPF = $item -> CmpCPF;
            $cartMot = $item -> CmpCarteiraMotorista;
            $titulo = $item -> CmpTituloEleitor;
            $docIdent = $item -> CmpDocIdent;
            $cerMilitar = $item -> CmpCertificadoMilitar;
            $pis = $item -> CmpPis;
            $carTrabalho = $item -> CmpCTPS;
            $carRuralTrabalho = $item -> CmpCTPSRural;
            $serieCPTS = $item -> CmpSerieCTPS;
            
            $optante = $item -> CmpOptanteFgts;
            $dataOptante = $item -> CmpDataOptanteFgts;
            
            //$filiacao = $item -> CmpFiliacaoSindicato;
            $nomeFiliacao = $item -> CmpNomeSindicato;
            
            //$obsDoc = $item -> CmpObsDoc;
            
        
            $selectFuncao = $this -> MontarCombosFuncao($seguranca->cripto($item->funcao_idfuncao));
           
            
        //DEFININDO O TIPO DE ARQUIVO        
        //MONTAGEM FORMULARIO
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Contratação","dtEntrada", $CmpDataEntrada,"calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Dispensa","dtSaida", $CmpDataSaida,"calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","dtNasc",  $CmpDataNasc,"calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome", "nome", $CmpNome,"user",12)
                           
                            . $this -> CampoSelectGliphycon("Função", "funcao", "trabalho", $selectFuncao,"SIM", 6)
                             /*$this -> CampoSelectValidacaoFunction("Marca", "marca", "Escolha a Marca do Carro", "Por favor, informe a Marca do Carro correta.","", $selectFabricante, "select1","onchange='javascript:pesquisa_modelo_carro()'",6)
                            . $this -> CampoSelectValidacaoFunction("Modelo", "modelo", "Escolha a Modelo do Carro", "Por favor, informe o Modelo do Carro correto.","", "", "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)
*/
                            //. $this -> CampoHidden("val",$data["idObjeto"]);
                            //. $this -> ListaAnexo($listaAnexos, 8);
                            . $this -> CampoInputTamanhoGliphycon("Pai","pai", $pai,"user", 12)
                            . $this -> CampoInputTamanhoGliphycon("Mãe","mae", $mae,"user", 12)
                            . $this -> CampoInputTamanhoGliphycon("Cônjuge","conjuge",$conjuge,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("Endereço","endereco", $endereco,"", 12)
                            . $this -> CampoSelectGliphycon("Unidade Federação", "uf", "bandeira", $selectUF,"SIM", 4)
                            . $this -> CampoInputTamanhoGliphycon("E-mail","emailSIM",$email,"email",9) 
                            . $this -> CampoInputTamanhoGliphycon("Celular","tel",$tel,"tel",4)
                            . $this -> CampoInputTamanhoGliphycon("Tel.Fixo","cel",$cel,"tel",4)
                            //. $this -> CampoInputTamanhoGliphycon("É Deficiente?","ehDeficiente", $ehDeficiente,"deficiente", 4)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "", $selectEhDecifiente,"SIM", 4)
                            
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $estCivil,"SIM", 4)
                            //. $this -> CampoInputTamanhoGliphycon("Naturalidade","naturalidade", $naturalidade,"bandeira", 4)  
                            //. $this -> CampoInputTamanhoGliphycon("Nacionalidade","nacionalidade", $nacionalidade,"bandeira",4) 
                            //. $this -> CampoInputTamanhoGliphycon("Escolaridade","escolaridade",$escolaridade ,"bandeira",4)                                                        
                            //. $this -> CampoInputTamanhoGliphycon("Unidade Federação","uf", $selectUF, "bandeira",4)
                
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade,"SIM", 4)
                
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "bandeira", $selectEscolaridade,"SIM", 4)
                            
                
                            . $this -> CampoTextAreaGliphycon("Comentário","obs",$obs, "comentario", 12); 
                
        $data["formulario2"] = $this -> CampoHeader("Dados Oficiais")
                            . $this -> CampoInputTamanhoGliphycon("CPF","cpf",$CmpCPF,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista",$cartMot,"doc",6) 
                            . $this -> CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral",$titulo,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade",$docIdent,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Certificado Militar","cerMilitar",$cerMilitar,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Pis","pis",$pis,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Carteira de Trabalho (CPTS)","carTrabalho",$carTrabalho,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Série Cateira de Trabalho (CPTS)","serCarTrabalho",$serieCPTS,"doc",4)
                            . $this -> CampoInputTamanhoGliphycon("Carteira de Trabalho Rural (CPTS Rural)","carTrabalhoRural",$carRuralTrabalho,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Optante FGTS","opfgts",$optante,"doc",4)
                            . $this -> CampoSelectGliphycon("Filiação Sindicato", "filSin", "bandeira", $selectFiliacaoSindicato,"NAO", 4)
                            . $this -> CampoInputTamanhoGliphycon("Nome Sindicato","nomSin",$nomeFiliacao,"doc",4)
                            . $this -> CampoTextAreaGliphycon("Comentário","obsdoc",$obsDoc,"comentario",12);
        
        $data["formulario3"] = $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        }
        
        $data["idObjeto"] = $idFuncionario;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaEscalaServicoEditar($idEscalaServico){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ESC","edi"));
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFuncionario_decripto = $seguranca -> decripto($idEscalaServico);
              
         //PESQUISA DE VEICULO POR ID
        $escalaServicoModel = new \App\Classes\EscalaServicoModel();
        $escalaServico = $escalaServicoModel -> ConsultaEscalaServico($idEscalaServico);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($escalaServico as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            $CmpDataEscala = $util->formatarDataMysqlParaExibicao($item->CmpDataEscala);
            $CmpNome = $item -> CmpNome; 
            $CmpObs = $item -> CmpObs;
           
            $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto($item ->funcionario_idfuncionario));            
            $selectTurno = $this -> MontarCombosTurno($item -> CmpTurno);

            $data["formulario"] = $this ->CampoInputTamanho("Data ","dtServico",$CmpDataEscala,2)
                                . $this -> montarFormulario("Turno", "turno", "Escolha o turno do Funcionário", "Por favor, informe o turno Funcionário correto.","", $selectTurno, "select1",2)
                                . $this -> montarFormulario("Funcionário", "catFun", "Escolha o Funcionário", "Por favor, informe o Funcionário correto.","", $selectFuncionario, "select1",12)
                                /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                                . $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "","",$CmpObs, "textarea",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
        }
        
        $data["idObjeto"] = $idEscalaServico;
          
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaPontoEditar($idPonto){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        $anexoModel = new \App\Classes\AnexoModel();
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pastaPro = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PON","edi"));
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPonto_decripto = $seguranca -> decripto($idPonto);
              
         //PESQUISA DE VEICULO POR ID
        $pontoModel = new \App\Classes\PontoModel();
        $ponto = $pontoModel -> ConsultaPonto($idPonto);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($ponto as $item){
        
            if($item->CmpDataEntrada != null){
                $CmpDataEntrada = $util->formatarDataMysqlParaExibicao($item->CmpDataEntrada);
            }else{
                $CmpDataEntrada = "";
            }
            if($item->CmpDataSaida != null){
                $CmpDataSaida = $util->formatarDataMysqlParaExibicao($item->CmpDataSaida);
            }else{
                $CmpDataSaida = "";
            }  
            
            $CmpNome = $item -> CmpNome; 
            $CmpObs = $item -> CmpObs;
           
            //$selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto($item ->funcionario_idfuncionario));            
            //$selectTurno = $this -> MontarCombosTurno($item -> CmpTurno);

            $data["formulario"] = $this ->CampoInputTamanho("Entrada ","dtEntrada",$CmpDataEntrada,4)
                                . $this ->CampoInputTamanho("Saída ","dtSaida",$CmpDataSaida,4)
                                . $this ->CampoInputReadonly("Funcionário ",$item->CmpNome,12)
                                //. $this -> montarFormulario("Funcionário", "catFun", "Escolha o Funcionário", "Por favor, informe o Funcionário correto.","", $selectFuncionario, "select1",12)
                                /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                                . $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "","",$CmpObs, "textarea",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
            
            $imagem = $anexoModel ->recuperaAnexo($item ->idfuncionarios, "FUN");
            if($imagem != ""){                
                $data["imagem"] = $pastaPro.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
            
            
        }
        
        $data["idObjeto"] = $idPonto;
          
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaFuncaoEditar($idFuncao){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $i = 0;
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUN","edi"));
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $turnoModel = new \App\Classes\TurnoModel();
        $funcaoModel = new \App\Classes\FuncaoModel();
        
        $idFuncao_decripto = $seguranca->decripto($idFuncao);
        $funcao = $funcaoModel ->ConsultaFuncao($idFuncao);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($funcao as $item){
        
            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] =   $this ->CampoInputValidacaoTamanhoGliphycon("Função ","descricao", strtoupper($item -> CmpDescricao),"generico",12)
                                . $this -> CampoTextAreaGliphycon("Texto Ajuda", "ajuda",$item->CmpTextoAjuda,"comentario",12)
                                . $this -> CampoTextAreaGliphycon("Comentário", "obs",$item->CmpObs,"comentario",12)
                    
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)                        
                                . $this -> CampoHidden("val",$idFuncao);
                                
            
            
       
            
        }
        
        //TURNOS
        /*$turno = $turnoModel -> ConsultaTurno($idFuncao);
               
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($turno as $item){
        
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);            

            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            if($i == 0){
                $inicioPri = $item -> CmpInicio;
                $fimPri = $item -> CmpFim;
                $idPri = $item -> idturno;
                
            }else{
                $inicioSeg = $item -> CmpInicio;
                $fimSeg = $item -> CmpFim;
                $idSeg = $item -> idturno;
            }
            
            $i++;
                               
        }
        
        $data["formulario2"] = 
                
                                    "<div class='col-lg-6'>
                                        <div class='panel panel-green'>
                                            <div class='panel-heading'>
                                                Primeiro Turno
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this ->CampoInputValidacaoTamanho("Início","pritur1",$inicioPri,6)
                                                        . $this ->CampoInputValidacaoTamanho("Término","pritur2",$fimPri,6)
                                                        . $this ->CampoHidden("val1", $idPri)
                                                        . $this -> montarFormulario("Observação", "obspritur", "Digite uma descrição necessária.", "","","", "textarea",12)
                                               ."</div>
                                                <div class='panel-footer'>
                                                    GS2I - Gestão Social Integrada e Inteligente
                                                </div>
                                            </div>
                                    </div>    
                                    <div class='col-lg-6'>
                                        <div class='panel panel-yellow'>
                                            <div class='panel-heading'>
                                                Segundo Turno
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this ->CampoInputValidacaoTamanho("Início","segtur1",$inicioSeg,6)
                                                        . $this ->CampoInputValidacaoTamanho("Término","segtur2",$fimSeg,6)
                                                        . $this ->CampoHidden("val2", $idSeg) 
                                                        . $this -> montarFormulario("Observação", "obssegtur", "Digite uma descrição necessária.", "","","", "textarea",12)
                                               ."</div>
                                                <div class='panel-footer'>
                                                    GS2I - Gestão Social Integrada e Inteligente
                                                </div>
                                            </div>
                                    </div>    ";*/
        $data["idObjeto"] = $idFuncao;
        
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaObraEditar($idObra){
     
        $data = array();                
        $util = new \app\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("OBR","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta("OBR");        

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idObra_decripto = $seguranca->decripto($idObra);
              
        //FAZ A BUSCA DO DOCUMENTO
        $obraControle = new \App\Classes\ObraModel();
        $obra = $obraControle -> ConsultaObra($idObra);
        
        foreach($obra as $item){
        
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idObra_decripto, "OBR");
            
            $data["formulario"] = $this ->CampoInputValidacaoTamanho("Título","titulo",$item ->CmpTitulo,2)
                          . $this ->CampoInputValidacaoTamanho("Objetivo","objetivo",$item ->CmpObjetivo,2)

                          . $this ->CampoInputValidacaoTamanho("Início","dtInicio",$util->formatarDataMysqlParaExibicao($item ->CmpDataInicio),2)
                          . $this ->CampoInputValidacaoTamanho("Fim","dtFim",$util->formatarDataMysqlParaExibicao($item ->CmpDataFim),2)
                          . $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "",$item ->CmpDescricao,"", "textarea",12)
                          . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
                    
        }
      
        
        $data["idObjeto"] = $idObra;
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaSolicitacaoEditar($idSolicitacao){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("SOL","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "SOL","PARCIAL"); //"clientes/".$pasta."/veiculos/";        

        $anexoController = new \App\Http\Controllers\Anexo\AnexoController();
        $anexoModel = new \App\Classes\AnexoModel();
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idSolicitacao_decripto = $seguranca->decripto($idSolicitacao);
              
        //FAZ A BUSCA DO DOCUMENTO
        $solicitacaoControle = new \App\Classes\SolicitacaoModel();
        $solicitacao = $solicitacaoControle ->consultarSolicitacao($idSolicitacao);
        
        foreach($solicitacao as $item){
            
            $codigoUnico = $item ->CmpCodigoUnico;
            $texto = $item ->CmpTexto;
            $dataInclusao = $util->formatarDataMysqlParaExibicao($item -> CmpDataInclusao);           
         
            $imagem = $anexoModel ->recuperaAnexo($idSolicitacao_decripto, "SOL"); 
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
              
        }        
               
        //MONTAR FORMULARIO
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
              
        $data["formulario"] =  $controleTela ->CampoInputReadonlyTamanho("Código Único", "",$codigoUnico, 6)                            
                            . $controleTela -> CampoTextAreaGliphycon("Comentário", "texto", $texto,"textarea",12)
                            . $controleTela -> montarFormulario("Enviar", "", "", "","","","submit",12);
            
        
        $data["idObjeto"] = $idSolicitacao;
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaPetsEditar($idPets){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idVagaGaragem = "";
        $tipoVeiculo = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Classificados","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PET","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta("PET");        

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idPets_decripto = $seguranca->decripto($idPets);
              
        //FAZ A BUSCA DO DOCUMENTO
        $petsControle = new \App\Classes\PetsModel();
        $pets = $petsControle ->consultarPets($idPets);
        
        foreach($pets as $item){
            
            $nome = $item ->CmpNome;
            $raca = $item ->CmpRaca;
            $sexo = $item ->CmpSexo; 
            $especie = $item ->CmpEspecie;
            $corpelo = $item ->CmpCorPelo;
            $dataNasc = $item -> CmpDataNasc;
            $dataEntrada = $item ->CmpDataEntrada;
            $dataSaida = $item ->CmpDataSaida;
            //$deficiente = $item ->CmpDeficiente;
            $obs = $item ->CmpObs;
        
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idPets_decripto, "PET");
               
            //$selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0); 
            $selectCatSexo = $this -> MontarCombosSexo($item ->CmpSexo);      
            $selectCatSIM_NAO = $this -> MontarCombosSIM_NAO($item ->CmpDeficiente);
            $selectApartamento = $this -> MontarCombosApartamento($item->apartamento_idapartamento);

            $data["formulario"] = $this ->CampoInputValidacaoTamanho("Nome","nome",$nome,2)
                                . $this ->CampoInputValidacaoTamanho("Raça","raca",$raca,2)                           
                                . $this -> montarFormulario("Sexo", "catSexo", "Escolha o sexo do Pet", "Por favor, informe o sexo correto do Pet.","", $selectCatSexo, "select1",2)
                                . $this -> montarFormulario("É Deficiente?", "ehDefic", "Escolha o sexo do Pet", "Por favor, informe o sexo correto do Pet.","", $selectCatSIM_NAO, "select1",2)
                                . $this -> montarFormulario("Apartamento", "apto", "Escolha o sexo do Pet", "Por favor, informe o sexo correto do Pet.","", $selectApartamento, "select1",2)
                                . $this ->CampoInputValidacaoTamanho("Espécie","especie",$especie,2)
                                . $this ->CampoInputValidacaoTamanho("Cor de Pelo","corPelo",$corpelo,2)
                                . $this ->CampoInputValidacaoTamanho("Data Nascimento","dataNasc",$dataNasc,2)
                                . $this ->CampoInputValidacaoTamanho("Data Entrada","dataEntrada",$dataEntrada,2)  
                                . $this ->CampoInputValidacaoTamanho("Data Saída","dataSaida",$dataSaida,2)    

                                . $this -> montarFormulario("Descrição", "obs", "Digite uma descrição necessária.", "","",$obs, "textarea",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
        }
        $data["idObjeto"] = $idPets;
        
        return $data;
    }
    
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
    
    
    public function MontarTelaMoradorEditar($idMorador){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        $nomeMorador = "";
        $cpf = "";
        $tel = "";
        $email = "";
        $cel = "";
        $docIdent = "";
        $profissao = "";
        $estCivil = "";
        $nacionalidade = "";
        $ehDeficiente = "";
        $conjuge = "";
        $escolaridade = "";
        $tituloEleitor = "";
        $carteiraMotorista = "";
        $entradaCondominio = "";
        $saida = "";
        $entrada = "";
        $obs = "";
        $apartamento_idapartamento = "";
        $imagem = "";  
        $data_nasc = "";
        
        $idEstCivil = 0;
        $idNaturalidade = 0;
        $idNacionalidade = 0;
        $idEhMorador = "";
        $idEhDecifiente = 0;
        $idEscolaridade = 0;
        $idRecuperaAnexo = "";
        $testeEmail = "";        
        
        //$data = $this -> PrepararArrayData(60, "edi","Editar"," Morador ","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MOR","edi"));

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca->decripto($idMorador);
        
        $anexoModel = new \App\Classes\AnexoModel();
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pastaMOR = $factory ->GetClassVariavel() ->Path($pasta, "MOR", "PARCIAL");
        $pastaPRO = $factory ->GetClassVariavel() ->Path($pasta, "PRO", "PARCIAL");
        //$arquivo = "clientes/".$pasta."/morador/";
        
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $moradorControle = new \App\Classes\MoradorModel();
        $morador = $moradorControle -> consultarMorador($idMorador);       
        
        foreach($morador as $item){                      
            
            //$data_nasc = $item ->CmpDataNasc;
            if($item -> CmpEhMorador == "S"){ //o morador é o mesmo do proprietário
                
                $data_nasc = $util->formatarDataMysqlParaExibicao($item->nascMor);
                
                $nome = $item -> nomeProp;
                $tel = $item -> telProp;
                $cel = $item -> celProp;              
                $apto = $item -> CmpApto;
                $bloco = $item -> CmpBloco;
                $idEhMorador = "SIM";
                
                if($item ->nascProp != "") $data_nasc = $util->formatarDataMysqlParaExibicao($item ->nascProp);
                if($item ->entProp != "") $entrada = $util->formatarDataMysqlParaExibicao($item ->entProp);
                if($item ->saiProp != "") $saida = $util->formatarDataMysqlParaExibicao($item ->saiProp);
                $CmpEmail = $item -> emailProp;
                
                $estCivil = $util -> SituacaoEstadoCivil($item -> estProp);
                $naturalidade = $util -> naturalidade($item -> natProp);
                $nacionalidade = $util -> nacionalidade($item -> nacProp);
                $ehDeficiente = $util -> deficiente($item -> defProp);
                $conjuge = $item -> conjProp;
                $profissao = $item -> profProp;
                $escolaridade = $util -> escolaridade($item -> escProp);

                $docIdent = $item -> identProp;
                $cpf = $item -> cpfProp;
                $titulo = $item -> titProp;
                $carteiraMotorista = $item -> cartProp;
                $CmpObs = $item -> obsProp;
                $CmpObsDoc = $item -> obsDocProp;                
                
                $idRecuperaAnexo = $item->idproprietario;
                
                //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idRecuperaAnexo, "MOR");  
                $imagem = $anexoModel ->recuperaAnexo($idRecuperaAnexo, "PRO");
                if($imagem != ""){                
                    $data["imagem"] = $pastaPRO.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }
                
                //echo "TESTE " .$data["imagem"]. "<BR>";
                
                $idEstCivil = $item -> estProp;
                $idNaturalidade = $item -> natProp;
                $idNacionalidade = $item -> nacProp;
                
                $idEhDecifiente = $item -> defProp;
                $idEscolaridade = $item -> escProp;
                
            }else{
                
                //
                if($item ->nascMor != "") $data_nasc = $util->formatarDataMysqlParaExibicao($item ->nascMor);
                if($item ->entMor != "") $entrada = $util->formatarDataMysqlParaExibicao($item ->entMor);
                if($item ->saiMor != "") $saida = $util->formatarDataMysqlParaExibicao($item ->saiMor);
                
                $nome = $item -> nomeMor;
                $tel = $item -> telMor;
                $cel = $item -> celMor; 
                $email = $item -> emailMor;
                $apto = $item -> CmpApto;
                $bloco = $item -> CmpBloco;
                $estCivil = $util -> SituacaoEstadoCivil($item -> estMor);
                $naturalidade = $util -> naturalidade($item -> natMor);
                $nacionalidade = $util -> nacionalidade($item -> nacMor);
                $ehDeficiente = $util -> deficiente($item -> defMor);
                $conjuge = $item -> conjMor;
                $profissao = $item -> profMor;
                $escolaridade = $util -> escolaridade($item -> escMor);

                $docIdent = $item -> identMor;
                $cpf = $item -> cpfMor;
                $titulo = $item -> titMor;
                $carteiraMotorista = $item -> cartMor;
                $obs = $item -> obsMor;
                $obsDoc = $item -> obsDocMor;
                
                $idRecuperaAnexo = $item->idmorador;
                
                //$data["imagem"] = $pasta.$anexoModel -> recuperaAnexo($idRecuperaAnexo, "MOR");  
                $imagem = $anexoModel ->recuperaAnexo($idRecuperaAnexo, "MOR");
                if($imagem != ""){                
                    $data["imagem"] = $pastaMOR.$imagem;
                }else{
                    $data["imagem"] = "img/silhueta.png";
                }
                //echo "TESTE " .$data["imagem"] . "<BR>";
                
                $idEstCivil = $item -> estMor;
                $idNaturalidade = $item -> natMor;
                $idNacionalidade = $item -> nacMor;
                $idEhMorador = "NÃO";
                $idEhDecifiente = $item -> defMor;
                $idEscolaridade = $item -> escMor;
                                
            }    

            //echo "TESTE " . $idRecuperaAnexo;
            $ehMorador = $item -> CmpEhMorador;
            
        }
               
        //echo " Nacionalidae ". $nacionalidade;
        $selectEstadoCivil = $this -> MontarCombosEstadoCivil($idEstCivil);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectNaturalidade = $this -> MontarCombosNaturalidade($idNaturalidade);
        $selectNacionalidade = $this -> MontarCombosNacionalidade($idNacionalidade);
        $selectEhDecifiente = $this -> MontarCombosSIM_NAO($idEhDecifiente);
        //$selectEhMorador =
        $selectEscolaridade = $this -> MontarCombosEscolaridade($idEscolaridade);
       
        if($email != "") $testeEmail = "SIM";
        
        $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Entrada Condomínio","dtEntrada",$entrada,"calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Saída Condomínio","dtSaida", $saida,"calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","dtNasc", $data_nasc,"calendar",4)        
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome","nome",$nome,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("Cônjuge","conjuge",$conjuge,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("E-mail","emailSIM",$email,"email",9) 
                            . $this ->CampoHidden("val", $testeEmail)
                            . $this ->CampoHidden("val2", $idMorador)
                            . $this -> CampoInputTamanhoGliphycon("Celular","cel",$cel,"tel",4)
                            . $this -> CampoInputTamanhoGliphycon("Tel.Fixo","tel",$tel,"tel",4)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "deficiente", $selectEhDecifiente,"SIM", 4)
                                
                            . $this -> CampoInputTamanhoGliphycon("Profissão","profissao",$profissao,"trabalho",10)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil,"SIM", 4) 
                            //. $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"NAO", 4)  
                            //. $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade,"NAO", 4) 
                
                            . $this -> CampoSelectValidacaoFunction("Nacionalidade", "nacionalidade", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectNacionalidade, "select1","onchange='javascript:pesquisa_naturalidade()'",4)
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", "","SIM", 4)  
                           
                
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade,"NAO", 4) 
                            . $this -> CampoInputReadonlyGliphycon("Proprietário é Morador?", $idEhMorador, "", 4)
                            
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$obs,"comentario",12) 
                
                            . $this -> CampoHeader("Documentos")
                            . $this -> CampoInputTamanhoGliphycon("CPF","cpf",$cpf,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista",$carteiraMotorista,"doc",6) 
                            . $this -> CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral",$titulo,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade",$docIdent,"doc",6)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obsdoc",$obsDoc,"comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                            
        $data["idObjeto"] = $idMorador;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    */
    
    public function MontarTelaMoradorEditar($idMorador){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        $nomeMorador = "";
        $cpf = "";
        $tel = "";
        $email = "";
        $cel = "";
        $docIdent = "";
        $profissao = "";
        $estCivil = "";
        $nacionalidade = "";
        $ehDeficiente = "";
        $conjuge = "";
        $escolaridade = "";
        $tituloEleitor = "";
        $carteiraMotorista = "";
        $entradaCondominio = "";
        $saida = "";
        $entrada = "";
        $obs = "";
        $apartamento_idapartamento = "";
        $imagem = "";  
        $data_nasc = "";
        
        $idEstCivil = 0;
        $idNaturalidade = 0;
        $idNacionalidade = 0;
        $idEhMorador = "N";
        $idEhDecifiente = 0;
        $idEscolaridade = 0;
        $idRecuperaAnexo = "";
        $testeEmail = "";        
        
        //$data = $this -> PrepararArrayData(60, "edi","Editar"," Morador ","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MOR","edi"));

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca->decripto($idMorador);
        
        $anexoModel = new \App\Classes\AnexoModel();
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pastaMOR = $factory ->GetClassVariavel() ->Path($pasta, "MOR", "PARCIAL");
        $pastaPRO = $factory ->GetClassVariavel() ->Path($pasta, "PRO", "PARCIAL");
        //$arquivo = "clientes/".$pasta."/morador/";
        
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $moradorControle = new \App\Classes\MoradorModel();
        $morador = $moradorControle -> consultarMorador($idMorador);       
        
        foreach($morador as $item){                      
                        
            if($item ->CmpDataNasc != "") $data_nasc = $util->formatarDataMysqlParaExibicao($item ->CmpDataNasc);
            if($item ->CmpEntradaCondominio != "") $entrada = $util->formatarDataMysqlParaExibicao($item ->CmpEntradaCondominio);
            if($item ->CmpSaidaCondominio != "") $saida = $util->formatarDataMysqlParaExibicao($item ->CmpSaidaCondominio);

            $nome = $item -> CmpNome;
            $tel = $item -> CmpTel;
            $cel = $item -> CmpCel; 
            $email = $item -> CmpEmail;
            $apto = $item -> CmpApto;
            $bloco = $item -> CmpBloco;
            $estCivil = $util -> SituacaoEstadoCivil($item -> CmpEstCivil);
            
            $ehDeficiente = $util -> deficiente($item -> CmpEhDeficiente);
            $conjuge = $item -> CmpConjuge;
            $profissao = $item -> CmpProfissao;
            $escolaridade = $util -> escolaridade($item -> CmpEscolaridade);

           /* $docIdent = $item -> CmpDocIdent;
            $cpf = $item -> CmpCPF;
            $titulo = $item -> CmpTituloEleitor;
            $carteiraMotorista = $item -> CmpCarteiraMotorista;*/
            $obs = $item -> CmpObs;
           // $obsDoc = $item -> CmpObsDoc;

            $idRecuperaAnexo = $item->idmorador;
           
            $imagem = $anexoModel ->recuperaAnexo($idRecuperaAnexo, "MOR");
            if($imagem != ""){                
                $data["imagem"] = $pastaMOR.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }
           
            $idEhMorador = $item -> CmpEhMorador;                  
            echo "<BR> NATU " .$item -> CmpNaturalidade . "- ". $item -> CmpNacionalidade . "<BR>";
            $selectEstadoCivil = $this -> MontarCombosEstadoCivil($item -> CmpEstCivil);
            $selectNaturalidade = $this -> MontarCombosNaturalidade($item -> CmpNaturalidade,$item -> CmpNacionalidade);
            $selectNacionalidade = $this -> MontarCombosNacionalidade($item -> CmpNacionalidade);
            $selectEhDecifiente = $this -> MontarCombosSIM_NAO($item -> CmpEhDeficiente);
            $selectEhMorador = $this -> MontarCombosSIM_NAO($item -> CmpEhMorador);

            $selectEscolaridade = $this -> MontarCombosEscolaridade($item -> CmpEscolaridade);

            if($email != "") $testeEmail = "SIM";
            
        }    
        
        $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Entrada Condomínio","dtEntrada",$entrada,"calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Saída Condomínio","dtSaida", $saida,"calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","dtNasc", $data_nasc,"calendar",4)        
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome","nome",$nome,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("Cônjuge","conjuge",$conjuge,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("E-mail","emailSIM",$email,"email",9) 
                            . $this ->CampoHidden("val", $testeEmail)
                            . $this ->CampoHidden("val2", $idMorador)
                            . $this -> CampoInputTamanhoGliphycon("Celular","cel",$cel,"tel",4)
                            . $this -> CampoInputTamanhoGliphycon("Tel.Fixo","tel",$tel,"tel",4)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "deficiente", $selectEhDecifiente,"SIM", 4)
                                
                            . $this -> CampoInputTamanhoGliphycon("Profissão","profissao",$profissao,"trabalho",10)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil,"SIM", 4) 
                            //. $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"NAO", 4)  
                            //. $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade,"NAO", 4) 
                
                            . $this -> CampoSelectValidacaoFunction("Nacionalidade", "nacionalidade", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectNacionalidade, "select1","onchange='javascript:pesquisa_naturalidade()'",4)
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"SIM", 4)  
                           
                
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade,"NAO", 4) 
                            //. $this -> CampoInputReadonlyGliphycon("Proprietário é Morador?", $idEhMorador, "", 4)
                            //. $this -> CampoInputTamanhoGliphycon("Morador é Proprietário?","profissao",$idEhMorador,"",4)
                            //. $this -> CampoInputTamanhoGliphycon("","ehMorador",$selectEhMorador,"",4)
                            . $this -> CampoSelectGliphycon("Morador é Proprietário?", "ehMorador", "", $selectEhMorador,"NAO", 4) 
                            
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$obs,"comentario",12) 
                
                            /*. $this -> CampoHeader("Documentos")
                            . $this -> CampoInputTamanhoGliphycon("CPF","cpf",$cpf,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista",$carteiraMotorista,"doc",6) 
                            . $this -> CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral",$titulo,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade",$docIdent,"doc",6)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obsdoc",$obsDoc,"comentario",12)*/
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                            
        $data["idObjeto"] = $idMorador;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    public function MontarTelaCandidatoEditar($idCandidato){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        $nomeMorador = "";
        $cpf = "";
        $tel = "";
        $email = "";
        $cel = "";
        $docIdent = "";
        $profissao = "";
        $estCivil = "";
        $nacionalidade = "";
        $ehDeficiente = "";
        $conjuge = "";
        $escolaridade = "";
        $tituloEleitor = "";
        $carteiraMotorista = "";
        $entradaCondominio = "";
        $saida = "";
        $entrada = "";
        $obs = "";
        $apartamento_idapartamento = "";
        $imagem = "";  
        $data_nasc = "";
        
        $idEstCivil = 0;
        $idNaturalidade = 0;
        $idNacionalidade = 0;
        $idEhMorador = "N";
        $idEhDecifiente = 0;
        $idEscolaridade = 0;
        $idRecuperaAnexo = "";
        $testeEmail = "";      
        
        $data["formulario"] = "";
        $data["dependentes"] = "";
        $data["botoes"] = "";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idCandidato_decripto = $seguranca->decripto($idCandidato);
        
        $anexoModel = new \App\Classes\AnexoModel();
        
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $CandidatoControle = new \App\Classes\CandidatoModel();   
        $candidato = $CandidatoControle -> ConsultarCandidato($idCandidato);      

        foreach($candidato as $item){                      
                                   
            $nome = $item -> CmpNome;            
            $email = $item -> CmpEmail;   
           
            $imagem = $anexoModel ->recuperaAnexo($idRecuperaAnexo, "MOR");
            if($imagem != ""){                
                $data["imagem"] = $pastaMOR.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }          
                       
            
            $selectEstadoCivil = $this -> MontarCombosEstadoCivil(0);
            $selectNaturalidade = $this -> MontarCombosNaturalidade(0,0);
            $selectNacionalidade = $this -> MontarCombosNacionalidade(0);
            $selectEhDecifiente = $this -> MontarCombosSIM_NAO(0);
            $selectEhMorador = $this -> MontarCombosSIM_NAO(0);

            $selectEscolaridade = $this -> MontarCombosEscolaridade(0);
            $selectParentesco = $this -> MontarCombosParentesco(0);
            $selectCatVeiculo = $this -> montarCombos("catVeiculo",0);       
          
            $selectTipoVeiculo = $this -> MontarCombosTipoVeiculo(0);
            $selectCores = $this -> MontarCombosCoresCarro(0);
            $selectFabricante = $this -> MontarCombosFabricante($seguranca->cripto(0));   
          
            $selectApto = $this -> MontarComboListarApto($item -> condominio_idcondominio);

            $data["formulario"] = $this -> CampoHeader("Digite o código de Controle")
                            . $this -> CampoInputCapctha(4)    
                            . $this -> CampoHeader("Dados do Morador")
                            . $this ->CampoInputValidacaoTamanhoGliphycon("Data da Mudança","dtEntrada",$entrada,"calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","dtNasc", "","calendar",4)   
                            
                            . $this -> CampoInputReadonlyGliphycon("Nome",$nome,"user",8)
                            . $this -> CampoHidden("nome",$seguranca->cripto($nome))
                            . $this -> CampoHidden("email",$seguranca->cripto($email))                           
                            . $this -> CampoSelectValidacaoFunction("Apto", "apto", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectApto, "select1","onchange='javascript:carrega_blocos()'",2)
                            . $this -> CampoSelectGliphycon("Bloco", "bloco", "", "","SIM", 2)
                            . $this -> CampoHidden("id", $item -> condominio_idcondominio)
                            . $this -> CampoInputTamanhoGliphycon("Profissão","profissao",$profissao,"trabalho",6)
                            . $this -> CampoInputReadonlyGliphycon("E-mail",$email,"email",6) 
                            
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Celular","cel",$cel,"tel",3)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Tel.Fixo","tel",$tel,"tel",3)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "deficiente", $selectEhDecifiente,"SIM", 3)
                            . $this -> CampoSelectGliphycon("É Proprietário?", "ehProp", "", $selectEhMorador,"SIM", 3)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil,"SIM", 3) 
                                    
                            . $this -> CampoSelectValidacaoFunction("Nacionalidade", "nacionalidade", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectNacionalidade, "select1","onchange='javascript:pesquisa_naturalidade()'",3)
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"SIM", 3)  
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade,"SIM", 3); 
                           
                    $data["dependentes"] = $this -> CampoHeader("Dependentes")                           
                            . $this -> CampoInicioDIV(4)
                            . "<center>"
                            . $this -> CampoSelecionaImagemV2("dep1","img/silhueta.png")
                            . "</center>"
                            . $this -> CampoSelectFunction("Parentesco", "pdep1", "Escolha o grau de Parentesco", "Por favor, informe o grau de Parentesco.","", $selectParentesco, "select1","onchange='javascript:alerta()'",6)
                            . $this -> CampoInputTamanhoGliphycon("Data Nascimento","dtdep1", "","data",6)  
                            . $this -> CampoInputTamanhoGliphycon("Dependente 1","dep1","","dependente",12)                            
                            . $this -> CampoFimDIV()
                            
                            . $this -> CampoInicioDIV(4)
                            . "<center>"
                            . $this -> CampoSelecionaImagemV2("dep2","img/silhueta.png")
                            . "</center>"
                            . $this -> CampoSelectFunction("Parentesco", "pdep2", "Escolha o grau de Parentesco", "Por favor, informe o grau de Parentesco.","", $selectParentesco, "select1","onchange='javascript:alerta()'",6)
                            . $this -> CampoInputTamanhoGliphycon("Data Nascimento","dtdep2", "","data",6)  
                            . $this -> CampoInputTamanhoGliphycon("Dependente 2","dep2","","dependente",12)
                            . $this -> CampoFimDIV()
                                                        
                            . $this -> CampoInicioDIV(4)
                            . "<center>"
                            . $this -> CampoSelecionaImagemV2("dep3","img/silhueta.png")
                            . "</center>"
                            . $this -> CampoSelectFunction("Parentesco", "pdep3", "Escolha o grau de Parentesco", "Por favor, informe o grau de Parentesco.","", $selectParentesco, "select1","onchange='javascript:alerta()'",6)
                            . $this -> CampoInputTamanhoGliphycon("Data Nascimento","dtdep3", "","data",6)  
                            . $this -> CampoInputTamanhoGliphycon("Dependente 3","dep3","","dependente",12)
                            . $this -> CampoFimDIV();
                    
                     $data["veiculos"] = $this -> CampoHeader("Veículos")
                            //. $this -> CampoSelectGliphycon("Parentesco", "pdep1", "bandeira", $selectParentesco,"NAO", 2)
                            . $this -> CampoInicioDIV(4)
                            . "<center>"
                            . $this -> CampoSelecionaImagemV2("vei1","img/carro_imagem.jpg")
                            . "</center>"
                            . $this -> CampoSelectFunction("Marca", "marca1", "Escolha a Marca do Carro", "Por favor, informe a Marca do Carro correta.","", $selectFabricante, "select1","onchange='javascript:pesquisa_modelo_carro(1)'",6)
                            . $this -> CampoSelectFunction("Modelo", "modelo1", "Escolha a Modelo do Carro", "Por favor, informe o Modelo do Carro correto.","", "", "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)
                            . $this -> CampoInputTamanhoGliphycon("Placa","placa1", "","car",6)
                            . $this -> CampoSelectGliphycon("Cor ", "cor1", "car", $selectCores,"NAO", 6)
                            . $this -> CampoSelectGliphycon("Categoria ", "catVeiculo1", "car", $selectCatVeiculo,"NAO", 6)  
                            . $this -> CampoFimDIV()
                            
                            . $this -> CampoInicioDIV(4)
                            . "<center>"
                            . $this -> CampoSelecionaImagemV2("vei2","img/carro_imagem.jpg")
                            . "</center>"
                            . $this -> CampoSelectFunction("Marca", "marca2", "Escolha a Marca do Carro", "Por favor, informe a Marca do Carro correta.","", $selectFabricante, "select1","onchange='javascript:pesquisa_modelo_carro(2)'",6)
                            . $this -> CampoSelectFunction("Modelo", "modelo2", "Escolha a Modelo do Carro", "Por favor, informe o Modelo do Carro correto.","", "", "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)
                            . $this -> CampoInputTamanhoGliphycon("Placa","placa2", "","car",6)
                            . $this -> CampoSelectGliphycon("Cor ", "cor2", "car", $selectCores,"NAO", 6)
                            . $this -> CampoSelectGliphycon("Categoria ", "catVeiculo2", "car", $selectCatVeiculo,"NAO", 6)
                            . $this -> CampoFimDIV()
                            
                            
                            . $this -> CampoInicioDIV(4)
                            . "<center>"
                            . $this -> CampoSelecionaImagemV2("vei3","img/carro_imagem.jpg")
                            . "</center>"
                            . $this -> CampoSelectFunction("Marca", "marca3", "Escolha a Marca do Carro", "Por favor, informe a Marca do Carro correta.","", $selectFabricante, "select1","onchange='javascript:pesquisa_modelo_carro(3)'",6)
                            . $this -> CampoSelectFunction("Modelo", "modelo3", "Escolha a Modelo do Carro", "Por favor, informe o Modelo do Carro correto.","", "", "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)
                            . $this -> CampoInputTamanhoGliphycon("Placa","placa2", "","car",6)
                            . $this -> CampoSelectGliphycon("Cor ", "cor3", "car", $selectCores,"NAO", 6)
                            . $this -> CampoSelectGliphycon("Categoria ", "catVeiculo3", "car", $selectCatVeiculo,"NAO", 6)  
                             
                            . $this -> CampoFimDIV();
                   
                          
                    $data["botoes"] =  $this ->BotaoSubmitFuncao("Enviar", 12,"onclick=validateCaptcha()");
                            
            //$data["idObjeto"] = $idMorador;
        
           /* $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
            $data["botaoFechar"] = $this -> MontaBotaoFechar();*/
        } 
        
        return $data;
    }
    
     /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaProprietarioEditar($idProprietario){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        $nomeMorador = "";
        $cpf = "";
        $tel = "";
        $email = "";
        $cel = "";
        $docIdent = "";
        $profissao = "";
        $estCivil = "";
        $nacionalidade = "";
        $naturalidade = "";
        $ehDeficiente = "";
        $conjuge = "";
        $escolaridade = "";
        $tituloEleitor = "";
        $carteiraMotorista = "";
        $entrada = "";
        $saida = "";
      
        $data_nasc = "";
        $obs = "";
        $obsDoc = "";
        $apartamento_idapartamento = "";
        $imagem = "";        
        $ehMorador = "";
        $nome = "";
        
        $testeEmail = "";
        
        
   
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idProprietario_decripto = $seguranca->decripto($idProprietario);
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() ->ConsultaPasta("PRO");
        $pastaPro = $factory -> GetClassVariavel() ->Path($pasta, "PRO", "PARCIAL");
        
         //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PRO","edi"));
        $data["imagem"] = "img/silhueta.png";
        //FAZ A BUSCA DO DOCUMENTO
        $proprietarioControle = new \App\Classes\ProprietarioModel();
        $proprietario = $proprietarioControle ->consultarProprietarioPorId($idProprietario,"ATV");       
        
        foreach($proprietario as $item){                      
            
            $nome = $item -> CmpNome;           
            $tel = $item -> CmpTel;
            $email = $item -> CmpEmail;
            $cel = $item -> CmpCel;            
            $profissao = $item -> CmpProfissao;
            $estCivil = $item -> CmpEstCivil;
            $naturalidade = $item -> CmpNaturalidade;
            $nacionalidade = $item -> CmpNacionalidade;
            $ehDeficiente = $item -> CmpEhDeficiente;
            $conjuge = $item -> CmpConjuge;
            $escolaridade = $item -> CmpEscolaridade;            
            $ehMorador = $item -> CmpEhMorador;            
            $tituloEleitor = $item -> CmpTituloEleitor;
            $cpf = $item -> CmpCPF;
            $carteiraMotorista = $item -> CmpCarteiraMotorista;
            $docIdent = $item -> CmpDocIdent;
            
            /*$entradaCondominio = $util->formatarDataMysqlParaExibicao($item -> CmpEntradaCondominio);
            $saidaCondominio = $util->formatarDataMysqlParaExibicao($item -> CmpSaidaCondominio);*/
            
            if($item ->CmpDataNasc != "") $data_nasc = $util->formatarDataMysqlParaExibicao($item ->CmpDataNasc);
            if($item ->CmpEntradaCondominio != "") $entrada = $util->formatarDataMysqlParaExibicao($item ->CmpEntradaCondominio);
            if($item ->CmpSaidaCondominio != "") $saida = $util->formatarDataMysqlParaExibicao($item ->CmpSaidaCondominio);
                        
            $obs = $item -> CmpObs;
            $obsDoc = $item -> CmpObsDoc;
            $apartamento_idapartamento = $item -> apartamento_idapartamento;
                        
            $apto = $item -> CmpApto;
            $bloco = $item -> CmpBloco;
            
            $complemento = " APTO " . $apto. " bloco". $bloco; 
           
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idProprietario_decripto, "PRO");
            if($imagem != ""){                
                $data["imagem"] = $pastaPro.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }             
        }
        
        //echo $data["imagem"];
        
        if($email != "") $testeEmail = "SIM";
        
        $selectEstadoCivil = $this -> MontarCombosEstadoCivil($estCivil);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectNaturalidade = $this -> MontarCombosNaturalidade($naturalidade);
        $selectNacionalidade = $this -> MontarCombosNacionalidade($nacionalidade);
        $selectEhMorador = $selectEhDecifiente = $this -> MontarCombosSIM_NAO($ehMorador);
        $selectEscolaridade = $this -> MontarCombosEscolaridade($escolaridade);
               
        $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Entrada Condomínio","entrada",$entrada,"calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Saída Condomínio","saida", $saida,"calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","data_nasc", $data_nasc,"calendar",4)        
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome","nome",$nome,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("Cônjuge","conjuge",$conjuge,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("E-mail","emailSIM",$email,"email",9)
                            . $this -> CampoHidden("val", $testeEmail) 
                            
                            . $this -> CampoInputTamanhoGliphycon("Celular","cel",$cel,"tel",4)
                            . $this -> CampoInputTamanhoGliphycon("Tel.Fixo","tel",$tel,"tel",4)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "deficiente", $selectEhDecifiente,"SIM", 4)
                                
                            . $this -> CampoInputTamanhoGliphycon("Profissão","profissao",$profissao,"trabalho",10)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil,"NAO", 4) 
                           // . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"NAO", 4)  
                            //. $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade,"NAO", 4) 
                
                            . $this -> CampoSelectFunction("Nacionalidade", "nacionalidade", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectNacionalidade, "select1","onchange='javascript:pesquisa_naturalidade()'",4)
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", "","NAO", 4)  
                            
                            
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade,"NAO", 4) 
                            . $this -> montarFormulario("Proprietário é Morador?", "ehmorador", "", "Por favor, informe se é morador correta.","", $selectEhMorador, "select1",4)
                            
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$obs,"comentario",12) 
                
                            . $this -> CampoHeader("Documentos")
                            . $this -> CampoInputTamanhoGliphycon("CPF","cpf",$cpf,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista",$carteiraMotorista,"doc",6) 
                            . $this -> CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral",$tituloEleitor,"doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade",$docIdent,"doc",6)
                            . $this -> CampoHidden("valap", $apartamento_idapartamento)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obsdoc",$obsDoc,"comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                            
        
        $data["idObjeto"] = $idProprietario;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaMoradorSubstituir($idMorador){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        $nomeMorador = "";
        $cpf = "";
        $tel = "";
        $email = "";
        $cel = "";
        $docIdent = "";
        $profissao = "";
        $estCivil = "";
        $nacionalidade = "";
        $ehDeficiente = "";
        $conjuge = "";
        $escolaridade = "";
        $tituloEleitor = "";
        $carteiraMotorista = "";
        $entradaCondominio = "";
        $saidaCondominio = "";
        $entradaCondominio = "";
        $obs = "";
        $apartamento_idapartamento = "";
        $imagem = "";                

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idMorador_decripto = $seguranca->decripto($idMorador);
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $arquivo = "clientes/".$pasta."/morador/";        
                
        //$data = $this -> PrepararArrayData(60, "sub","Substituir"," Morador ","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MOR","sub"));
        
        $data["imagem"] = $imagem;
        
        $selectEstadoCivil = $this -> MontarCombosEstadoCivil($idMorador_decripto);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectNaturalidade = $this -> MontarCombosNaturalidade(0);
        $selectNacionalidade = $this -> MontarCombosNacionalidade(0);
        $selectEhMorador = $selectEhDecifiente = $this -> MontarCombosSIM_NAO(0);
        $selectEscolaridade = $this -> MontarCombosEscolaridade(0);
        
                            
        $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Entrada Condomínio","dtEntrada","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Saída Condomínio","dtSaida", "","calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","dtNasc", "","calendar",4)        
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome","nome","","user",12)
                           // . $this -> CampoInputTamanhoGliphycon("Cônjuge","conjuge","","user",12)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("E-mail","emailSIM","","email",9)
                            . $this -> CampoInputTamanhoGliphycon("Celular","cel","","tel",4)
                            . $this -> CampoInputTamanhoGliphycon("Tel.Fixo","tel","","tel",4)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "deficiente", $selectEhDecifiente,"NAO", 4)
                                                            
                                //$label,$valorCampo,$tipoCampo,$valorSelect,$tamanhoColuna)
                           
                            . $this -> CampoInputTamanhoGliphycon("Profissão","profissao","","trabalho",10)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil,"NAO", 4) 
                            //. $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"NAO", 4)  
                            //. $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade,"NAO", 4) 
                            . $this -> CampoSelectValidacaoFunction("Nacionalidade", "nacionalidade", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectNacionalidade, "select1","onchange='javascript:pesquisa_naturalidade()'",4)
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", "","SIM", 4)  
                            
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade,"NAO", 4) 
                            . $this -> CampoSelectGliphycon("Proprietário é Morador?", "ehmorador", "", $selectEhMorador,"NAO", 4)
                            
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao","","comentario",12) 
                
                            /*. $this -> CampoHeader("Documentos")
                            . $this ->CampoInputTamanhoGliphycon("CPF","cpf","","doc",6)
                            . $this ->CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista","","doc",6) 
                            . $this ->CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral","","doc",6)
                            . $this ->CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade","","doc",6)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obsdoc","","comentario",12)*/
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        $data["idObjeto"] = $idMorador;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaProprietarioSubstituir($idProprietario){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        $nomeMorador = "";
        $cpf = "";
        $tel = "";
        $email = "";
        $cel = "";
        $docIdent = "";
        $profissao = "";
        $estCivil = "";
        $nacionalidade = "";
        $ehDeficiente = "";
        $conjuge = "";
        $escolaridade = "";
        $tituloEleitor = "";
        $carteiraMotorista = "";
        $entradaCondominio = "";
        $saidaCondominio = "";
        $entradaCondominio = "";
        $obs = "";
        $apartamento_idapartamento = "";
        $imagem = "";        
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idProprietario_decripto = $seguranca->decripto($idProprietario);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PRO","sub"));
      
        $selectEstadoCivil = $this -> MontarCombosEstadoCivil($idProprietario_decripto);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectNaturalidade = $this -> MontarCombosNaturalidade(0);
        $selectNacionalidade = $this -> MontarCombosNacionalidade(0);
        $selectEhDecifiente = $this -> MontarCombosSIM_NAO(0);
        $selectEscolaridade = $this -> MontarCombosEscolaridade(0);
        $selectEhMorador = $selectEhDecifiente = $this -> MontarCombosSIM_NAO(0);
        
        /*$data["formulario"] = $this ->CampoInputValidacaoTamanho("Entrada Condomínio","dtEntrada", "",2)
                            . $this -> CampoInputValidacaoTamanho("Saída Condomínio","dtSaida", "",2)
                            . $this -> CampoInputValidacaoTamanho("Data Nascimento","dtNasc", "",2)
                            . $this ->CampoInputValidacaoTamanho("Nome","nome","",8)
                            . $this ->CampoInputValidacaoTamanho("E-mail","email","",5)
                            . $this ->CampoInputValidacaoTamanho("Cel","cel","",2)
                            . $this ->CampoInputValidacaoTamanho("Tel","tel","",2)
                            . $this ->CampoInputValidacaoTamanho("Profissão","profissao","",6)
                            . $this -> montarFormulario("Estado Civil", "estCivil", "Escolha o Estado Civil", "Por favor, informe o Estado Civil correto.","", $selectEstadoCivil, "select1",2)
                            . $this -> montarFormulario("Naturalidade", "naturalidade", "Escolha a Naturalidade", "Por favor, informe a Naturalidade correta.","", $selectNaturalidade, "select1",3)
                            . $this -> montarFormulario("Nacionalidade", "nacionalidade", "Escolha a Nacionalidade", "Por favor, informe a Nacionalidade correta.","", $selectNacionalidade, "select1",3)
                            . $this -> montarFormulario("É Deficiente?", "ehDeficiente", "", "Por favor, informe a Nacionalidade correta.","", $selectEhDecifiente, "select1",2)
                            . $this -> montarFormulario("Escolaridade", "escolaridade", "", "Por favor, informe a Escolaridade correta.","", $selectEscolaridade, "select1",2)
                            . $this ->CampoInputValidacaoTamanho("Cônjuge","conjuge","",8)    
                            . $this ->CampoInputValidacaoTamanho("CPF","cpf","",3)
                            . $this ->CampoInputValidacaoTamanho("Cart. Motorista","cartMotorista","",3) 
                            . $this ->CampoInputValidacaoTamanho("Título Eleitoral","tituloEleitoral","",3)
                            . $this ->CampoInputValidacaoTamanho("Doc. Identidade","docIdentidade","",3)
                            . $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",1);*/
                            
        $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputTamanho("Entrada Condomínio","dtEntrada", "",4)
                            . $this -> CampoInputTamanho("Saída Condomínio","dtSaida", "",4)
                            . $this -> CampoInputTamanho("Data Nascimento","dtNasc", "",4)        
                            . $this -> CampoInputValidacaoTamanho("Nome","nome","",12)
                            . $this -> CampoInputTamanho("Cônjuge","conjuge","",12)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("E-mail","emailSIM","","email",9)
                            . $this -> CampoInputTamanho("Celular","cel","",4)
                            . $this -> CampoInputTamanho("Tel.Fixo","tel","",4)
                            . $this -> montarFormulario("É Deficiente?", "ehDeficiente", "", "Por favor, informe a Nacionalidade correta.","", $selectEhDecifiente, "select1",4)
                           
                            . $this -> CampoInputTamanho("Profissão","profissao","",10)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil,"NAO", 4) 
                            //. $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectNaturalidade,"NAO", 4)  
                            //. $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade,"NAO", 4) 
                            . $this -> CampoSelectValidacaoFunction("Nacionalidade", "nacionalidade", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectNacionalidade, "select1","onchange='javascript:pesquisa_naturalidade()'",4)
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", "","SIM", 4)  
                            
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade,"NAO", 4) 
                            . $this -> CampoSelectGliphycon("Proprietário é Morador?", "ehmorador", "", $selectEhMorador,"NAO", 4)
                                                        
                            
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao","","comentario",12) 
                
                            . $this -> CampoHeader("Documentos")
                            . $this ->CampoInputTamanhoGliphycon("CPF","cpf","","doc",6)
                            . $this ->CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista","","doc",6) 
                            . $this ->CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral","","doc",6)
                            . $this ->CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade","","doc",6)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obsdoc","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);                       
        
        $data["idObjeto"] = $idProprietario;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
                          
        
        return $data;
    }
    
    /**
     * FUNCAO TELADOCUMENTOEDITAR: MONTA A TELA DE EDIÇÃO DE DOCUMENTO.
     * @param type $id
     * @return type
     */
    
    public function MontarTelaApartamentoEditar($idApartamento){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        $nomeMorador = "";
        $cpf = "";
        $tel = "";
        $email = "";
        $cel = "";
        $docIdent = "";
        $profissao = "";
        $estCivil = "";
        $nacionalidade = "";
        $ehDeficiente = "";
        $conjuge = "";
        $escolaridade = "";
        $tituloEleitor = "";
        $carteiraMotorista = "";
        $entradaCondominio = "";
        $saidaCondominio = "";
        $entradaCondominio = "";
        $obs = "";
        $apartamento_idapartamento = "";
        $imagem = "";   
        
        $categoria_apartamento = "";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idApartamento_decripto = $seguranca->decripto($idApartamento);
        
        // $factory = new \App\DesignPattern\FactoryMethod();
        //$pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        //$arquivo = "clientes/".$pasta."/morador/";
        
        //MODELO
        //$documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $apartamentoControle = new \App\Classes\ApartamentoModel();
        $apartamento = $apartamentoControle -> consultarApartamentoPorId($idApartamento_decripto);     
        
        foreach($apartamento as $item){                      
            
            $apto = $item -> CmpApto;
            $bloco = $item -> CmpBloco;
            
            $dataInclusao = $util -> formatarDataMysqlParaExibicao($item -> CmpDataInclusao);
                        
            $obs = $item -> CmpObs;
            $categoria_apartamento = $item -> ca_idcategoria_apartamento;
            $ramal_idramal = $item ->ramal_idramal;
        }
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Apartamento ");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("APA","edi"));
        //PrepararArrayData($menu_link,$atividade,$funcionalidade,$categoria_objeto,$menuAtivo){
        
        $data["imagem"] = $imagem;
        
        $selectSituacaoJuridica = $this -> MontarCombosSituacaoJuridica($categoria_apartamento);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectRamal = $this -> MontarCombosRamal($seguranca->cripto($ramal_idramal));
        
        /*$selectNaturalidade = $this -> MontarCombosNaturalidade($naturalidade);
        $selectNacionalidade = $this -> MontarCombosNacionalidade($nacionalidade);
        $selectEhDecifiente = $this -> MontarCombosSIM_NAO($ehDeficiente);
        $selectEscolaridade = $this -> MontarCombosEscolaridade($escolaridade);*/
        
        $data["formulario"] = $this -> CampoInputReadonly("Data Inclusão", $dataInclusao,2)
                            . $this -> CampoInputReadonly("Apto", $apto,2)
                            . $this -> CampoInputReadonly("Bloco", $bloco,2)                            
                            . $this -> montarFormulario("Situação Jurídica", "sitJud", "Escolha A situação Jurídica", "Por favor, informe a Situação Jurídica Correta.","", $selectSituacaoJuridica, "select1",2)
                            . $this -> montarFormulario("Ramal", "idRamal", "Escolha o Ramal", "Por favor, informe o ramal correto.","", $selectRamal, "select1",2)
                            //. $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "",$obs,"", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                            /*. $this -> montarFormulario("Naturalidade", "naturalidade", "Escolha a Naturalidade", "Por favor, informe a Naturalidade correta.","", $selectNaturalidade, "select1",3)
                            . $this -> montarFormulario("Nacionalidade", "nacionalidade", "Escolha a Nacionalidade", "Por favor, informe a Nacionalidade correta.","", $selectNacionalidade, "select1",3)
                            . $this -> montarFormulario("É Deficiente?", "ehDeficiente", "", "Por favor, informe a Nacionalidade correta.","", $selectEhDecifiente, "select1",2)
                            . $this -> montarFormulario("Escolaridade", "escolaridade", "", "Por favor, informe a Escolaridade correta.","", $selectEscolaridade, "select1",2)
                            . $this ->CampoInputValidacaoTamanho("Cônjuge","conjuge",$conjuge,8)    
                            . $this ->CampoInputValidacaoTamanho("CPF","cpf",$cpf,3)
                            . $this ->CampoInputValidacaoTamanho("Cart. Motorista","cartMotorista",$carteiraMotorista,3) 
                            . $this ->CampoInputValidacaoTamanho("Título Eleitoral","tituloEleitoral",$tituloEleitor,3)
                            . $this ->CampoInputValidacaoTamanho("Doc. Identidade","docIdentidade",$docIdent,3)
                            . $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "",$obs,"", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",1);*/
                            
                            
       
        $data["idObjeto"] = $idApartamento;
        
        return $data;
    }
    
    public function MontarTelaAreaComumEditar($idAreaComum){
     
        $data = array();                
        $util = new \App\Util\Util();        
                
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Área Comum ","nor");
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ARE","edi"));       
         
        $areaComumDescricao = "";        
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAreaComum_decripto = $seguranca->decripto($idAreaComum);
         
        /*$factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory ->GetClassVariavel() -> Path($pasta, "ARE", "PARCIAL");     */ 
        
        //FAZ A BUSCA DO DOCUMENTO
        $areaComumControle = new \App\Classes\AreaComumModel();
        $areaComum = $areaComumControle -> ConsultaAreaComum($idAreaComum,$seguranca -> cripto("TODOS"));     
        
        $anexoModel = new \App\Classes\AnexoModel();
        
        foreach($areaComum as $item){                   
            
            $dataInclusao = $util->formatarDataMysqlParaExibicao($item -> CmpDataInclusao);                        
            $areaComumDescricao = $item -> CmpAreaComum;           
            /*
             *PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this -> CampoInputReadonly("Data Inclusão",$CmpDataInclusao ,2)
                                . $this -> CampoInputReadonly("Área Comum", $CmpAreaComum,12)
                                . $this -> CampoInputReadonly("Responsável", $item -> CmpResponsavel,12)
                                . $this -> CampoInputReadonly("Disponível para Reserva?", $item -> CmpDisponibilidadeReserva,4)
                                . $this -> CampoInputReadonly("Prazo para cancelamento da reserva(dias antes)", $item -> CmpPrazoMaximoCancelamento,4)
                                . $this -> CampoInputReadonly("Unidade Inadimplentes podem reservar?", $item -> CmpUnidadeInadimplentes,4)
                                . $this -> CampoTextareaReadonly("Termo de Uso", $item -> CmpTermoDeUso, 12); 
             * 
             * */
             
            
           /* $selectDisRes = $this -> MontarCombosSIM_NAO($item -> CmpDisponibilidadeReserva);
            $selectUniIna = $this -> MontarCombosSIM_NAO($item -> CmpUnidadeInadimplentes);
            $selectNumero = $this -> MontarCombosNumeros($item -> CmpPrazoMaximoCancelamento);*/
            
            //$data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idAreaComum_decripto, "ARE"); 
            
            /*$imagem = $anexoModel -> recuperaAnexo($idAreaComum_decripto, "ARE"); 
            if($imagem != ""){                
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png";
            }*/
        
            $data["formulario"] = $this ->CampoInputReadonly("Data Inclusão", $dataInclusao,4)      
                                //. $this ->CampoInputValidacaoTamanho("Responsável","responsavel",strtoupper($item -> CmpResponsavel),8)
                                . $this ->CampoInputValidacaoTamanho("Setor Condomínio","areaComum",strtoupper($areaComumDescricao),12) 
                                                              
                               // . $this -> CampoSelectGliphycon("<br>Disponível para Reserva?", "dispReserva", "", $selectDisRes,"SIM", 4)
                               // . $this -> CampoSelectGliphycon("<br>Cancelamento da reserva(dias)", "maxCanc", "", $selectNumero,"NAO", 4)
                                //. $this -> CampoSelectGliphycon("<BR>Inadimplentes podem reservar?", "uniInad", "", $selectUniIna,"NAO", 4)                              
                                //. $this ->CampoTextAreaGliphycon("Termo de Uso", "termouso",$item ->CmpTermoDeUso,"comentario",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);                             

        }
        
        $data["idObjeto"] = $idAreaComum;
        
      
        return $data;
    }
    
    
    //EDITAR A VISITAÇÃO
    public function MontarTelaVeiculoVisitanteEditar($idVeiculo){
     
        $data = array();                
        $util = new \app\Util\Util();
        $documentoModel = new \App\Classes\DocumentoModel();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $factory = new \App\DesignPattern\FactoryMethod();
        
        $marca = "";
        $idCartao = "";
        $idApartamento = "";
        $tipoVeiculo = "";
        $dataInclusao = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Veículo Visitante","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEIVIS","edi"));       
        
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $arquivo = $factory ->  GetClassVariavel() -> Path($pasta, "VEI","PARCIAL"); //"clientes/".$pasta."/veiculos/";

        //GRADE DE SEGURANCA        
        $idVeiculo_decripto = $seguranca->decripto($idVeiculo);
        
        //FAZ A BUSCA DO DOCUMENTO
        $veiculoControle = new \App\Classes\VeiculoVisitantesModel();
        $veiculo = $veiculoControle -> consultarVeiculoVisitante($idVeiculo_decripto);
        
        foreach($veiculo as $item){
            
            $placa = $item ->CmpPlaca;
            $despacho = $item ->CmpDespacho;
            $tipoVeiculo = $item -> CmpTipoVeiculo;
            $idApartamento = $item -> apartamento_idapartamento;
            $dataInclusao = $util->formatarDataMysqlParaExibicao($item -> CmpDataInclusao);
            
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $anexo = $anexoModel ->recuperaAnexo($idVeiculo_decripto, "VEIVIS");
            $data["imagem"] = $arquivo.$anexo;
                    
        }
               
        $selectTipoVeiculo = $this ->MontarCombosTipoVeiculo($tipoVeiculo);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectApartamento = $this ->MontarCombosApartamento($idApartamento);
                
        $data["formulario"] = $this ->CampoInputReadonly("Data Inclusão",$dataInclusao,2)                            
                            . $this -> CampoInputValidacaoTamanho("Placa","placa",$placa,3)                            
                            . $this -> montarFormulario("Categoria Veículo", "catVeiculo", "Escolha a categoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectTipoVeiculo, "select1",3)
                            . $this -> montarFormulario("APTO", "selApartamento", "Escolha o apartamento", "Por favor, informe o apartamento visitado.","", $selectApartamento, "select1",2)                            
                            . $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "",$despacho,"", "textarea",12);
                            
        
        
        
        $data["idveiculo"] = $idVeiculo;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
    //EDITAR A VISITAÇÃO
    public function MontarTelaEntregaEditar($idEntrega){
     
        $data = array();                
        $util = new \app\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idApartamento = "";
        $tipoVeiculo = "";
        $dataInclusao = "";
        $rastreamento = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Entrega"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ENT","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "ENT","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idEntrega_decripto = $seguranca->decripto($idEntrega);
        
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $entregaControle = new \App\Classes\EntregasModel();
        $entrega = $entregaControle ->consultarEntrega($idEntrega);
        
        foreach($entrega as $item){
            
            $idCategoriaEntrega = $item ->CmpCategoriaEntrega;
            $codigoUnico = $item ->CmpCodigoUnico;
            $rastreamento = $item ->CmpCodigoCorreio;
            /*$folha = $item -> CmpFolha;
            $livro = $item -> CmpLivro;*/
            $obs = $item -> CmpObs;
            $idApartamento = $item -> apartamento_idapartamento;
            $dataInclusao = $util->formatarDataMysqlParaExibicao($item -> CmpDataInclusao);
            
            //BUSCAR IMAGEM DO VEICULO           
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idEntrega_decripto, "ENT");
            if($imagem != ""){
                $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idEntrega_decripto, "ENT"); 
            }else{
                $data["imagem"] = "img/entrega.png"; 
            }
            $selectApartamento = $this -> MontarCombosApartamento(0);
            $selectCategoriaEntrega = $this -> MontarCombosCategoriaEntrega($idCategoriaEntrega);

            $data["formulario"] = $this ->CampoInputReadonlyTamanho("Data","dataInclusao",$dataInclusao,3)                            
                                . $this ->CampoInputReadonlyTamanho("Código Único","codUnico",$codigoUnico,3)  
                                . $this ->CampoInputTamanhoGliphycon("Rastreamento Correio","codCorreio",$rastreamento,"",3)  
                                /*. $this ->CampoInputValidacaoTamanho("Folha","folha",$folha,2)
                                . $this ->CampoInputValidacaoTamanho("Livro","livro",$livro,2) */                           
                                . $this -> montarFormulario("Categoria Entrega", "catEntrega", "Escolha a categoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectCategoriaEntrega, "select1",3)                            
                                . $this -> montarFormulario("Apartamento", "idApto", "Escolha o destino", "Por favor, informe o destino da Entrega.","", $selectApartamento, "select1",3)                            
                                //. $this -> montarFormulario("Descrição", "obs", "Digite uma descrição necessária.", "",$obs,"", "textarea",12)
                                . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);

            $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
            
            $data["idObjeto"] = $idEntrega;
            $data["codigoEntrega"] = $rastreamento;
        }
        return $data;
    }
    
     //EDITAR A VISITAÇÃO
    public function MontarTelaEntregaRastrear($codigoEncomenda){
     
        $data = array();                
        $util = new \app\Util\Util();
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Entrega"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ENT","ras"));
        
        $rastrear = new \App\Classes\RastreadorModel();
        $data["formulario"] = $rastrear -> RastrearEncomenda($codigoEncomenda); 
                
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    //EDITAR A VISITAÇÃO
    public function MontarTelaManutencaoProgramadaEditar($idManutencaoProgramada){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idApartamento = "";
        $tipoVeiculo = "";
        $dataInclusao = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Entrega"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MNTPRO","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory -> GetClassVariavel() -> ConsultaPasta("ENT");
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idManutencaoProgramada_decripto = $seguranca->decripto($idManutencaoProgramada);
     
        //FAZ A BUSCA DO DOCUMENTO
        $manutencaoProgramadaControle = new \App\Classes\ManutencaoProgramadaModel();
        $manutencaoProgramada = $manutencaoProgramadaControle -> ConsultaManutencaoProgramada($idManutencaoProgramada);
          
        foreach($manutencaoProgramada as $item){
                        
            $CmpDataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicio);
            $CmpDataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFim);
            $assunto = $item -> CmpAssunto;
            $areaComum = $item -> area_comum_idarea_comum;
            $descricao = $item -> CmpDescricao;
                     
            //BUSCAR IMAGEM DO VEICULO
            $anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idManutencaoProgramada_decripto, "MNTPRO");
            
            $selectAreaComum = $this -> MontarCombosAreaComum($seguranca->cripto($areaComum),"SIM");
           
            $data["formulario"] = $this -> CampoInputValidacaoTamanho("Início", "datainicio", $CmpDataInicio,3) 
                            . $this -> CampoInputValidacaoTamanho("Término", "datafim", $CmpDataFim,3) 
                            . $this -> CampoInputValidacaoTamanho("Assunto", "assunto", $assunto,12) 
                            . $this -> montarFormulario("Área Comum", "areCom", "Escolha a Área Comum do Bem", "Por favor, informe a Área Comum do Bem correto.","", $selectAreaComum, "select1",6)
                            . $this ->CampoTextAreaGliphycon("Descrição ", "descricao", $descricao, "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
            
        }
         
        $data["idObjeto"] = $idManutencaoProgramada;
        
        return $data;
    }
    
    /**
     * TELA EDITAR AUTORIZACAO
     */
    
     //EDITAR A VISITAÇÃO
    public function MontarTelaAutorizacaoEditar($idAutorizacao){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idApartamento = "";
        $tipoVeiculo = "";
        $dataInclusao = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Entrega"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("AUT","edi"));
        
        /*$factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta("AUT");*/
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() ->ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() -> Path($pasta, "AUT", "PARCIAL");
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idAutorizacao_decripto = $seguranca->decripto($idAutorizacao);
        
        //FAZ A BUSCA DO DOCUMENTO
        $autorizacaoControle = new \App\Classes\AutorizacaoModel();
        $autorizacao = $autorizacaoControle -> ConsultaAutorizacao($idAutorizacao);
        
        foreach($autorizacao as $item){
            
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
            //$codUnico = $item -> CmpCodigoUnico;
            $dataInicio = $util->formatarDataMysqlParaExibicao($item->CmpDataInicioPrevisto);
            $dataFim = $util->formatarDataMysqlParaExibicao($item->CmpDataFimPrevisto);
            $nome = $item -> CmpNome;
            $cnpj_cpf = $item -> CmpCNPJ_CPF;
            $obs = $item -> CmpObs;
                                    
            $autorizado = $item -> CmpAutorizacao;
            /*if($autorizado == 1) $autorizado = "Autorizado";
            if($autorizado == 2) $autorizado = "Não Autorizado";*/
                        
            $apto = $item -> CmpApto. "-".$item -> CmpBloco;
           
            //BUSCAR IMAGEM DO VEICULO
            /*$anexoModel = new \App\Classes\AnexoModel();
            $data["imagem"] = $pasta.$anexoModel ->recuperaAnexo($idEntrega_decripto, "ENT");*/
            
            $anexoModel = new \App\Classes\AnexoModel();
            $imagem = $anexoModel ->recuperaAnexo($idAutorizacao_decripto, "AUT");
            if($imagem != ""){
                $data["imagem"] = $pasta.$imagem; 
            }else{
                $data["imagem"] = "img/entrega.png"; 
            }
            
        }
               
        //$selectCategoriaEntrega = $this -> MontarCombosCategoriaEntrega($idCategoriaEntrega);
        $selectAutorizacao = $this ->MontarCombosAutorizado($autorizado);
                
        /*$data["formulario"] = $this ->CampoInputValidacaoTamanho("Início Previsto","dataInicio",$dataInicio,2)                            
                            . $this ->CampoInputValidacaoTamanho("Fim Previsto","dataFim",$dataFim,2)                            
                            . $this ->CampoInputValidacaoTamanho("Nome","nome",$nome,2)
                            . $this ->CampoInputValidacaoTamanho("CNPJ/CPF","cnpj_cpf",$cnpj_cpf,2)                            
                            . $this -> montarFormulario("Autorizado?", "autorizado", "Autorização ", "Por favor, informe a categoria do veículo correta.","", $selectAutorizacao, "select1",2)                            
                            . $this -> montarFormulario("Descrição", "obs", "Digite uma descrição necessária.", "",$obs,"", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);*/
        
        $data["formulario"] = $this ->CampoInputValidacaoTamanhoGliphycon("Data Início","data_inicio",$dataInicio,"calendar",3)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("Data Fim","data_fim",$dataFim,"calendar",3)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("CPF/CNPJ","cpf_cnpj",$cnpj_cpf,"",3)
                            . $this -> CampoSelectGliphycon("Autorizado?", "idAuto", "", $selectAutorizacao,"SIM", 3)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("Autorizado","nome",$nome,"user",12)
                            
                                                        
                            //. $this -> CampoSelectGliphycon("Apartamento", "idApto", "casa", $selectApartamento,"SIM", 4)
                            
                             . $this -> CampoTextAreaGliphycon("Comentário", "obs",$obs,"comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit3",12);
        
        $data["idObjeto"] = $idAutorizacao;
        
        return $data;
    }
    
    //EDITAR A VISITAÇÃO
    public function MontarTelaFornecedorEditar($idFornecedor){
     
        $data = array();                
        $util = new \app\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idApartamento = "";
        $tipoVeiculo = "";
        $dataInclusao = "";
        $data["imagem"] = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Fornecedor","av1"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOR","edi"));
        
        /*$factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $arquivo = "clientes/".$pasta."/fornecedor/";*/

        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idFornecedor_decripto = $seguranca->decripto($idFornecedor);
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        
        //FAZ A BUSCA DO DOCUMENTO
        $fornecedorControle = new \App\Classes\FornecedorModel();
        $fornecedor = $fornecedorControle ->ConsultaFornecedor($idFornecedor);
        
        foreach($fornecedor as $item){
            
            $fornecedor = $item ->CmpRazaoSocial;            
            $dataInclusao = $util ->formatarDataMysqlParaExibicao($item -> CmpDataInclusao);
            $tipoPessoa = $item -> CmpCategoriaPessoa;
            $cnpj_cpf = $item -> CmpCNPJ_CPF;
            $endereco = $item -> CmpEndereco;
            $telFixo = $item -> CmpTelFixo;
            $cel = $item -> CmpCel;
            $email = $item -> CmpEmail;
            $site = $item -> CmpSite;
            $razaoSocial = $item -> CmpRazaoSocial;
            $descricao = $item -> CmpDescricao;
            
            
            $selectPessoa = $this ->MontarCombosPessoa($tipoPessoa);  
           
        }
                        
        //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
        $lista =  $this -> CampoInputValidacaoTamanhoGliphycon("Fornecedor","fornecedor",$razaoSocial,"user",12)
                          . $this -> CampoInputReadonly("Data Cadastro", $dataInclusao, 2)
                            
                          //. $this -> montarFormulario("Categoria Pessoa", "catPessoa", "Escolha o Pessoa física/jurídica do Fornecedor", "Por favor, informe a categoria do bem correta.","", $selectPessoa, "select1",2)
                          . $this -> CampoSelectGliphycon("Categoria Pessoa", "catPessoa", "formacao", $selectPessoa,"SIM", 2)
                          . $this -> CampoInputValidacaoTamanhoGliphycon("CNPJ/CPF","cnpj_cpf",$cnpj_cpf,"doc",2) 
                          . $this -> CampoInputTamanhoGliphycon("Celular","cel",$cel,"cel",2)
                          . $this -> CampoInputTamanhoGliphycon("Telefone Fixo3","telFixo",$telFixo,"tel",2);
                          
                             
                             
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
        
              
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoInputTamanhoGliphycon("Endereço", "endereco", "","generico",12) 
                            . $this ->CampoInputTamanhoGliphycon("Site","site",$site,"generico",6)
                            . $this ->CampoInputTamanhoGliphycon("E-mail","email",$email,"email",6)
                            . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$descricao,"comentario",12)                           
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                            . $this ->CampoFimDivisor();
        
        $data["formulario"] = $lista;
        
        $data["idObjeto"] = $idFornecedor;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
     //EDITAR A VISITAÇÃO
    public function MontarTelaVisitantesEditar($idVisitantes){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $marca = "";
        $idCartao = "";
        $idApartamento = "";
        $tipoVeiculo = "";
        $dataInclusao = "";
        $data["imagem"] = 0;
       
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VIS","edi"));
        
        $factory = new \App\DesignPattern\FactoryMethod();
        $pasta = $factory ->GetClassVariavel() -> ConsultaVariavel(Auth::user()->condominio_idcondominio, "pasta");
        $pasta = $factory ->  GetClassVariavel() -> Path($pasta, "VIS","PARCIAL"); //"clientes/".$pasta."/veiculos/";
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idVisitantes_decripto = $seguranca->decripto($idVisitantes);
        
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        $anexoModel = new \App\Classes\AnexoModel();
        //PESQUISA DE VEICULO POR ID
        $visitantesModel = new \App\Classes\VisitantesModel();
        $visitantes = $visitantesModel -> consultarVisitante($idVisitantes_decripto);               
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($visitantes as $item){
        
            $nomeVisitante = $item -> CmpNome;
            $cnpj_cpf = $item -> CmpCNPJ_CPF;
            $apto_bloco = $item -> CmpApto. "- Bloco ".$item->CmpBloco;
            $obs = $item -> CmpObs; 
            $idApartamento =  $item -> apartamento_idapartamento;
            $dataInclusao = $util->formatarDataMysqlParaExibicao($item -> CmpDataInclusao);
           
                      
            $imagem = $anexoModel ->recuperaAnexo($idVisitantes_decripto, "VIS");
            if($imagem != ""){
                $data["imagem"] = $pasta.$imagem;
            }else{
                $data["imagem"] = "img/silhueta.png"; 
            }  
            //echo $data["imagem"];
            $selectApartamento = $this -> MontarCombosApartamento($idApartamento);

            //PREPARACAO PARA A MONTAGEM DO FORMULÁRIO
            $data["formulario"] = $this ->CampoInputReadonlyTamanho("Data","dataInclusao",$dataInclusao,3)
                                . $this ->CampoInputTamanhoGliphycon("CNPJ/CPF","cnpj_cpf", $cnpj_cpf,"doc",4)                            
                                //. $this -> montarFormulario("Destino", "selApartamento", "Escolha o apartamento", "Por favor, informe o apartamento visitado.","", $selectApartamento, "select1",3)
                                . $this -> CampoSelectGliphycon("Destino", "selApartamento", "casa", $selectApartamento,"SIM", 12)
                                . $this ->CampoInputValidacaoTamanhoGliphycon("Nome Visitante","nome", $nomeVisitante,"user",12)
                                
                                //. $this -> montarFormulario("Observação", "obs", "Digite uma observação.", "", $obs,"", "textarea",12);
                                . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
            
 
       
            $data["idObjeto"] = $idVisitantes;
            
            $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
    
        }   
        
        return $data;
    }
    
    //EDITAR A VISITAÇÃO
    public function MontarTelaReformaApartamentoEditar($idReformaApartamento, $idApartamento){
     
        $data = array();                
        $util = new \App\Util\Util();
        
        $titulo = "";
        $inicioReforma = "";
        $fimReforma = "";
        $descricaoReforma = "";
        $materialUsado = "";
        $responsavelReforma = "";
        $descricaoReforma = "";
            
        $idTipoReforma = "";
        $idTipoReforma = 0;
        
        //$data = $this -> PrepararArrayData(1, "edi","Editar"," Reforma Apartamento","nor"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REFAPA","edi"));
        
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $idReformaApartamento_decripto = $seguranca->decripto($idReformaApartamento);
        $idApartamento_decripto = $seguranca->decripto($idApartamento);
        //MODELO
        $documentoModel = new \App\Classes\DocumentoModel();
        
        //echo "teste";
        //FAZ A BUSCA DO DOCUMENTO
        //PESQUISA DE VEICULO POR ID
        $reformaApartamentoModel = new \App\Classes\ReformaApartamentoModel();
        $reformaApartamento = $reformaApartamentoModel -> consultarReformaApartamento($idReformaApartamento,$idApartamento);
        
        foreach($reformaApartamento as $item){
            
            $titulo = $item ->CmpTitulo;
            $inicioReforma = $util->formatarDataMysqlParaExibicao($item ->CmpInicioReforma);
            $fimReforma = $util->formatarDataMysqlParaExibicao($item ->CmpFimReforma);
            $descricaoReforma = $item -> CmpDescricaoReforma;
            $materialUsado = $item -> CmpMateriaisUsados;
            $responsavelReforma = $item -> CmpResponsavelReforma;
            //$descricao = $item -> CmpDescricao;
            
            $idTipoReforma = $item -> CmpDescricao;
                
        }               
       
        $selectTipoReforma = $this -> MontarCombosTipoReforma($idTipoReforma); 
        
        /*$data["formulario"] = $this ->CampoInputValidacaoTamanho("Título","titulo",$titulo,7)                            
                            . $this ->CampoInputValidacaoTamanho("Início Reforma","dataInicioReforma",$inicioReforma,2)
                            . $this ->CampoInputValidacaoTamanho("Fim Reforma","dataFimReforma",$fimReforma,2)
                            . $this -> montarFormulario("Tpo Reforma", "catTipoReforma", "Escolha o Tipo de Reforma a ser executada", "Por favor, informe o Tipo de Reforma a ser executada correta.","", $selectReformaApartamento, "select1",6)
                            . $this ->CampoInputValidacaoTamanho("Responsável Reforma","respReforma",$responsavelReforma,6)                           
                            . $this -> montarFormulario("Descrição Reforma", "descricaoReforma", "Digite uma descrição necessária.", "",$descricaoReforma,"", "textarea",12)
                            . $this -> montarFormulario("Materiais Usados", "materialUsado", "Digite uma descrição necessária.", "",$materialUsado,"", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);*/
        
            $data["formulario"] = $this ->CampoInputTamanhoGliphycon("Título","titulo",$titulo,"generico",4)
                            . $this ->CampoInputTamanhoGliphycon("Início","dataInicioReforma",$inicioReforma,"calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Fim","dataFimReforma",$fimReforma,"calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Responsável","respReforma",$responsavelReforma,"generico",4)
                           
                            . $this -> CampoSelectGliphycon("Tipo Reforma", "tipoReforma", "formacao", $selectTipoReforma,"SIM", 4)
                            . $this -> CampoTextAreaGliphycon("Descrição Reforma", "desRef",$descricaoReforma,"comentario",12)
                            . $this -> CampoTextAreaGliphycon("Materiais Utilizados", "matUsu",$materialUsado,"comentario",12)
                            /*. $this ->CampoInputValidacaoTamanho("Modelo","modelo","",2)
                            . $this ->CampoInputValidacaoTamanho("Placa","placa","",2)
                            . $this ->CampoInputValidacaoTamanho("Cor","cor","",2)
                            . $this -> montarFormulario("Categoria Veículo", "catVeiculo", "Escolha a categoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectCatVeiculo, "select1",2)
                            . $this -> montarFormulario("APTO", "catVagaGaragem", "Escolha a categoria do Vaga de Garagem", "Por favor, informe a categoria do vaga de garagem correta.","", $selectVagaGaragem, "select1",2)
                            . $this -> montarFormulario("Cartão Estacionamento", "catCartaoEstacionamento", "Escolha o Cartão de Estacionamento", "Por favor, informe a categoria do vaga de garagem correta.","", $selectCartao, "select1",2)
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit2",12);
        
        $data["idObjeto"] = $idApartamento;
        $data["idObjeto2"] = $idReformaApartamento;
        
        return $data;
    }
    
    //EDITAR A VISITAÇÃO
    public function MontarTelaPrevisaoOrcamentariaEditar($idPrevisaoOrcamentaria){
     
        $data = array();
        $contas = array();
        
        $complementos = "";
        $contasDefinidas = 0;
        $totalContas = 0;
        $ano_Previsao = 0;
        $ajuste = 0;
                         
        $util = new \App\Util\Util();
       
        //$data = $this -> PrepararArrayData(72, "edi","Editar"," Previsão Orçamentária"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PREORC","edi"));
      
        //GRADE DE SEGURANCA
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $previsaoOrcamentariaModel = new \App\Classes\PrevisaoOrcamentariaModel();
        $resumoPrevisaoOrcamentaria = new \App\Classes\ResumoPrevisaoOrcamentariaModel();
        $planoContasModel = new \App\Classes\PlanoContasModel();
        $despacho = new \App\Classes\DespachoModel();
         
        $idPrevisaoOrcamentaria_decripto = $seguranca->decripto($idPrevisaoOrcamentaria);       
        $selectContas = $this -> MontarCombosContas($seguranca -> cripto(0),"DES");      
        $selectAno = $this -> MontarCombosAno5();  
        
        //LISTA DAS CONTAS DEFINIDAS PELO CONDOMINIO 
        $listaPlanoContas = $planoContasModel -> ConsultaPlanoContasPorTipo("DES");
        foreach($listaPlanoContas as $item){
            $contas[trim($item->CmpConta)] = "";
        }
        
        //$rec = 1;
        $lista = "";
        $des = 1;
        $obs = "";
        $contador2 = 0;
        $listaPainelTotal = "";
        
        $previsaoOrcamentaria = $previsaoOrcamentariaModel -> ConsultaPrevisaoOrcamentariaPorConta($idPrevisaoOrcamentaria);

        $lista = $lista . $this -> CampoHeader("Contas de Despesa");
        
        //RESPONSAVEL POR EXIBIR O DONO DOS DOCUMENTOS NA BARRA DE MENU
        foreach($previsaoOrcamentaria as $item){

            if($item->CmpAno > 0){
                $ano_Previsao = $item->CmpAno; 
                //echo "<BR>";
            }    
            
            $ajuste = $item -> CmpAjuste;
            
            $CmpDataInclusao = $util->formatarDataMysqlParaExibicao($item->CmpDataInclusao);
                       
            $lista =  $this->CampoInicioPainelTipo($item->CmpConta, 12,'warning')
                            . $this ->CampoInputMoedaD("JAN","jan_d_".$des,$des,$util->FormatNumber($item->CmpMontanteJaneiro),3)
                            . $this ->CampoHidden("jan_d_hidden_".$des, $item->CmpMontanteJaneiro)
                            . $this ->CampoInputMoedaD("FEV","fev_d_".$des,$des,$util->FormatNumber($item->CmpMontanteFevereiro),3)
                            . $this ->CampoHidden("fev_d_hidden_".$des, $item->CmpMontanteFevereiro)
                            . $this ->CampoInputMoedaD("MAR","mar_d_".$des,$des,$util->FormatNumber($item->CmpMontanteMarco),3)
                            . $this ->CampoHidden("mar_d_hidden_".$des, $item->CmpMontanteMarco)
                            . $this ->CampoInputMoedaD("ABR","abr_d_".$des,$des,$util->FormatNumber($item->CmpMontanteAbril),3)
                            . $this ->CampoHidden("abr_d_hidden_".$des, $item->CmpMontanteAbril)
                            . $this ->CampoInputMoedaD("MAI","mai_d_".$des,$des,$util->FormatNumber($item->CmpMontanteMaio),3)
                            . $this ->CampoHidden("mai_d_hidden_".$des, $item->CmpMontanteMaio)
                            . $this ->CampoInputMoedaD("JUN","jun_d_".$des,$des,$util->FormatNumber($item->CmpMontanteJunho),3)
                            . $this ->CampoHidden("jun_d_hidden_".$des, $item->CmpMontanteJunho)
                            . $this ->CampoInputMoedaD("JUL","jul_d_".$des,$des,$util->FormatNumber($item->CmpMontanteJulho),3)
                            . $this ->CampoHidden("jul_d_hidden_".$des, $item->CmpMontanteJulho)
                            . $this ->CampoInputMoedaD("AGO","ago_d_".$des,$des,$util->FormatNumber($item->CmpMontanteAgosto),3)
                            . $this ->CampoHidden("ago_d_hidden_".$des, $item->CmpMontanteAgosto)
                            . $this ->CampoInputMoedaD("SET","set_d_".$des,$des,$util->FormatNumber($item->CmpMontanteSetembro),3)
                            . $this ->CampoHidden("set_d_hidden_".$des, $item->CmpMontanteSetembro)
                            . $this ->CampoInputMoedaD("OUT","out_d_".$des,$des,$util->FormatNumber($item->CmpMontanteOutubro),3)
                            . $this ->CampoHidden("out_d_hidden_".$des, $item->CmpMontanteOutubro)
                            . $this ->CampoInputMoedaD("NOV","nov_d_".$des,$des,$util->FormatNumber($item->CmpMontanteNovembro),3)
                            . $this ->CampoHidden("nov_d_hidden_".$des, $item->CmpMontanteNovembro)
                            . $this ->CampoInputMoedaD("DEZ","dez_d_".$des,$des,$util->FormatNumber($item->CmpMontanteDezembro),3)
                            . $this ->CampoHidden("dez_d_hidden_".$des, $item->CmpMontanteDezembro)
                            . $this ->CampoInputReadonlyTamanho("TOTAL","total_d_".$des,$util->FormatNumber($item->CmpValorOriginal),3)
                            . $this ->CampoHidden("ano_d_".$des,$ano_Previsao)
                            . $this ->CampoHidden("cd".$des,$seguranca->cripto($item->idplano_contas))                            
                            . $this ->CampoHidden("iddpo".$des,$seguranca->cripto($item->idprevisao_orcamentarias))
                            . $this ->CampoHidden("idddes".$des,$seguranca->cripto($item->resumo_prevOrc_idprevOrc))
                            . $this->CampoFimPainelTipo();

                            $des++;

                            if($item->CmpValorOriginal > 0) $contasDefinidas++;
                            $totalContas++;  
       
            //ENCADEAMENTO DA LISTA DE DESPESA
            $contas[trim($item->CmpConta)] = $contas[trim($item->CmpConta)] . $lista;
        }
             
        //echo " ANO  ". $ano_Previsao;
        //FORMATAÇÃO DA LISTA DE CONTAS
        foreach($listaPlanoContas as $item){     
            
            if($contas[trim($item->CmpConta)] == ""){
                
               $lista =  $this->CampoInicioPainelTipo($item->CmpConta, 12,'warning')
                            . $this ->CampoInputMoedaD("JAN","jan_d_".$des,$des,0,3)
                            . $this ->CampoHidden("jan_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("FEV","fev_d_".$des,$des,0,3)
                            . $this ->CampoHidden("fev_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("MAR","mar_d_".$des,$des,0,3)
                            . $this ->CampoHidden("mar_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("ABR","abr_d_".$des,$des,0,3)
                            . $this ->CampoHidden("abr_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("MAI","mai_d_".$des,$des,0,3)
                            . $this ->CampoHidden("mai_d_hidden_".$des,0)
                            . $this ->CampoInputMoedaD("JUN","jun_d_".$des,$des,0,3)
                            . $this ->CampoHidden("jun_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("JUL","jul_d_".$des,$des,0,3)
                            . $this ->CampoHidden("jul_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("AGO","ago_d_".$des,$des,0,3)
                            . $this ->CampoHidden("ago_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("SET","set_d_".$des,$des,0,3)
                            . $this ->CampoHidden("set_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("OUT","out_d_".$des,$des,0,3)
                            . $this ->CampoHidden("out_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("NOV","nov_d_".$des,$des,0,3)
                            . $this ->CampoHidden("nov_d_hidden_".$des, 0)
                            . $this ->CampoInputMoedaD("DEZ","dez_d_".$des,$des,0,3)
                            . $this ->CampoHidden("dez_d_hidden_".$des, 0)
                            . $this ->CampoInputReadonlyTamanho("TOTAL","total_d_".$des,0,3)
                            . $this ->CampoHidden("ano_d_".$des,$ano_Previsao)
                            . $this ->CampoHidden("cd".$des,$seguranca->cripto($item->idplano_contas))                            
                            . $this ->CampoHidden("iddpo".$des,$seguranca->cripto(0))
                            . $this ->CampoHidden("idddes".$des,$seguranca->cripto(0))
                            . $this->CampoFimPainelTipo(); 
               
                            $des++;

                            $contas[trim($item->CmpConta)] = $contas[trim($item->CmpConta)] . $lista;
                            $totalContas++; 
                
            }
            //echo $item->CmpConta . "-".$contas[trim($item->CmpConta)] . "<BR>";
            
            $listaPainelTotal = $listaPainelTotal . $this->MontarTelaCorpoPAINELFAQ($item->CmpConta, $contas[trim($item->CmpConta)], "primary",$contador2);                
            $contador2++;
        }
        
        //echo $lista;
        $des--;
        $complementos = $this -> CampoHidden("total_despesa",$des);
        $complementos = $complementos . $this -> CampoHidden("total_valor_despesa","");
        $complementos = $complementos . $this -> CampoHidden("saldo","");
        $complementos = $complementos . $this -> CampoHidden("resultadoSinal","");
        
       // echo $des;
        
        $data["formulario"] =  $this -> CampoSelectGliphycon("Contas", "contas", "", $selectContas, "NAO",12);
                
        //RESUMO PREVISAO ORCAMENTARIA, APRESENTAÇÃO DE VALORES FINANCEIROS.
        $resumo = $resumoPrevisaoOrcamentaria -> ConsultaResumoPrevisaoOrcamentaria($idPrevisaoOrcamentaria);
        foreach($resumo as $item2){
            $montantePrevisto = $item2 -> CmpMontantePrevisto;
            $obs = $item2 -> CmpObs;
        }
        
        /*$lista = $this -> CampoHeader("Contas de Despesa") 
                . $this->  MontarTelaInicioPAINELFAQ() . $listaPainelTotal . $this->MontarTelaFimPAINELFAQ()
                . $this -> CampoTextAreaGliphycon("Comentário", "obs",$obs,"comentario",12)
                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);*/
        
        $lista = $this->CampoInicioDIV(4)  
              . $this -> CampoHeader("Ano Base") 
              . $this -> montarFormulario("", "ano", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectAno, "select1",12)      
              . " <div class='col-lg-12'><div id='morris-donut-chart'></div></div>"
              . $this->CampoFimDIV()
              . $this->CampoInicioDIV(8)  
              . $this -> CampoHeader("Contas de Despesa")
              . $listaPainelTotal  
              . $this -> CampoTextAreaGliphycon("Comentário", "obs",$obs,"comentario",12)
              . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
              . $this->CampoFimDIV().$complementos; 


        $data["lista"] = $lista;
        $data["rotulo"] = "";
        
        $data["idObjeto"] = $idPrevisaoOrcamentaria;        
       
        $data["contasDefinidas"] = $contasDefinidas;
        $data["contasTotal"] = $totalContas;
        //$data["conta"] = $idPlanoContas;
        
        return $data;
    }
    
    public function MontarTelaDocumentoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        
        //echo "<BR>";
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(75, "cad","Documento",$categoria_documento,"nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","cad"));
        
        //ID DA CATEGORIA DE DOCUMENTO  
        //$data["idcategoria_documento"] = $seguranca->cripto($idObjeto);
        
        //MONTAR FORMULARIO
        //COMBOS DA TELA
        $selectCatProduto = $this -> montarCombos("catProduto",0);        
        $selectSigilo = $this -> montarCombos("sigilo",0);
        $selectCategoriaDocumento = $this -> MontarCombosCategoriaDocumento();
                
        $data["formulario"] = 
                            $this -> CampoInputValidacaoTamanho("Data","dataInclusao","",4)                            
                            . $this -> montarFormulario("Sigilo", "sigilo", "Escolha o Sigilo", "Por favor, informe o Sigilo correto.","", $selectSigilo, "select1",4)
                            . $this -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1",4)
                            . $this ->CampoInputValidacaoTamanho("Assunto","assunto","",12)
                            
                            //. $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao","","comentario",12)
                         //   . $this -> montarFormulario("", "val", "", "",$data["idcategoria_documento"], "", "hidden",0)
        
                            . $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",12);
        
        $data["formulario2"] =   $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
                         
        
        //$data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        
        return $data;
    }
    
    public function    MontarTelaVeiculoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEI","cad"));
        
        $selectCatProduto = $this -> montarCombos("catProduto",0);        
        $selectCatVeiculo = $this -> montarCombos("catVeiculo",0);
       
        $selectCartao = $this -> MontarCombosCartaoEstacionamento(0);//montarCombos("catCartao",0);
        $selectTipoVeiculo = $this -> MontarCombosTipoVeiculo(0);
        $selectApartamento = $this -> MontarCombosApartamento(0);
   
        $selectCores = $this -> MontarCombosCoresCarro(0);
       
        $selectFabricante = $this -> MontarCombosFabricante($seguranca->cripto(0));
   
        $data["formulario"] =  //$this -> CampoInputTamanhoGliphycon("Marca","marca","","car",4)
                             //$this -> CampoInputTamanhoGliphycon("Modelo","modelo", "","car",4)
                             $this -> CampoSelectValidacaoFunction("Marca", "marca", "Escolha a Marca do Carro", "Por favor, informe a Marca do Carro correta.","", $selectFabricante, "select1","onchange='javascript:pesquisa_modelo_carro()'",6)
                            . $this -> CampoSelectValidacaoFunction("Modelo", "modelo", "Escolha a Modelo do Carro", "Por favor, informe o Modelo do Carro correto.","", "", "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)

                            . $this -> CampoInputTamanhoGliphycon("Placa","placa", "","car",4)
                            //. $this -> CampoInputTamanhoGliphycon("Cor","cor", "","car",4)
                            
                            . $this -> CampoSelectGliphycon("Cor ", "cor", "car", $selectCores,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Categoria ", "catVeiculo", "car", $selectCatVeiculo,"SIM", 4)
                            //. $this -> montarFormulario("Categoria Veículo", "catVeiculo", "Escolha acategoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectCatVeiculo, "select1",3)                            
                            . $this -> CampoSelectGliphycon("Pertence ao Apartamento", "selApartamento", "casa", $selectApartamento,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Aluga Vaga do Apartamento", "selApartamentoAlugado", "casa", $selectApartamento,"NAO", 4)
                            //. $this -> montarFormulario("APTO", "selApartamento", "Escolha o Apartamento", "Por favor, informe o Apartamento correta.","", $selectApartamento, "select1",3)
                            . $this -> CampoSelectGliphycon("Cartão Estacionamento","catCartaoEstacionamento","",$selectCartao,"NAO",4)
                
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        $data["formulario2"] = $this ->CampoSelecionaImagem();
        
        
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
    
    public function MontarTelaEscalaServicoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(27, "cad","Escala de Serviço "," Escala de Serviço");      
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ESC","cad"));
        
        $selectFuncionario = $this ->MontarCombosFuncionario($seguranca->cripto(0));
        $selectTurno = $this ->MontarCombosTurno($seguranca->cripto(0));
               
        $data["formulario"] = $this -> CampoInputValidacaoTamanho("Data ","dtServico","calendar",2)
                            //. $this -> montarFormulario("Turno", "turno", "Escolha o turno do Funcionário", "Por favor, informe o turno Funcionário correto.","", $selectTurno, "select1",2)
                            . $this -> CampoSelectGliphycon("Turno", "turno", "trabalho", $selectTurno,"SIM", 12)
                            . $this -> CampoSelectGliphycon("Funcionário", "catFun", "trabalho", $selectFuncionario,"SIM", 12)
                            //. $this -> montarFormulario("Funcionário", "catFun", "Escolha o Funcionário", "Por favor, informe o Funcionário correto.","", $selectFuncionario, "select1",12)
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            //. $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao","","comentario",12)                           
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        
        return $data;
    }
    
    public function MontarTelaFuncaoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(31, "cad","Função "," Função");  
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUN","cad"));
       
               
        $data["formulario"] =  $this ->CampoInputValidacaoTamanhoGliphycon("Função","descricao","","generico",8)
                            . $this -> CampoTextAreaGliphycon("Texto Ajuda", "ajuda","","comentario",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        
                            
        
        return $data;
    }
    
    public function MontarTelaExtintorCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(23, "cad","Extintor "," Extintor");     
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("EXT","cad"));
       
        $selectAreaComum = $this -> MontarCombosAreaComum($seguranca -> cripto(0));
               
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Extintor","descricao","",8)
                            . $this ->CampoInputValidacaoTamanho("Validade","dtValidade","",2)
                            . $this -> montarFormulario("Area Comum", "catAreCom", "Escolha a Área Comum", "Por favor, informe a Área Comum correta.","", $selectAreaComum, "select1",2)
                            . $this -> montarFormulario("Observação", "obs", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
       
        
        return $data;
    }
    
    public function MontarTelaPlanoContasCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(68, "cad","Financeiro "," Plano de Contas");  
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLCO","cad"));
       
        $selectCategoriaConta = $this -> MontarCombosCategoriaConta($seguranca -> cripto(0));
               
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Conta","conta","",12)
                            
                            . $this -> montarFormulario("Categoria Conta", "categConta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectCategoriaConta, "select1",4)
                            
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit3",12);
       
        
        return $data;
    }
    
    public function MontarTelaPlanoSubContasCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(68, "cad","Financeiro "," Plano de Contas");  
        //$data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PLSUCO","cad"));
       
        //$selectCategoriaConta = $this -> MontarCombosCategoriaConta($seguranca -> cripto(0));
               
        $data["formulario"] = $this -> CampoInputValidacaoTamanho("Conta","conta","",8)
                            . $this -> CampoInputTamanhoGliphycon("Classificação","classificacao","","",4)
                            //. $this -> montarFormulario("Categoria Conta", "categConta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectCategoriaConta, "select1",2)
                            //. $this -> montarFormulario("Observação", "obs", "Digite uma descrição necessária.", "","","", "textarea",12);
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit3",12);
       
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();

        
        return $data;
    }
    
    public function MontarTelaPrevisaoOrcamentariaCadastrar(){
              
        $data = array();
        $taxas = array();
        $valores = array();
        
        $contas = array();
        $subcontas = array();
        
        $util = new \app\Util\Util();        
        $lista = "";
        $listaAno = "";
        $listaDespesa = "";
        $listaReceita = "";
        $listaPainel = "";
        $listaPainelTotalDES = "";
        $listaPainelTotalREC = "";
        $des = 0;
        $rec = 100;
        $contador = 1;
        $idPlanoContas = 0;
        $contador2 = 0;
        $contador3 = 100;
        $conta = "";
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(68, "cad","Financeiro "," Previsão Orçamentária");  
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PREORC","cad"));
       
        $selectAno = $this -> MontarCombosAno2();     
        
        //$listaDespesa = $listaDespesa . $this -> CampoHeader("Contas de Despesa");
        
        $planoContasModel = new \App\Classes\PlanoContasModel();
        
        $listaPlanoContasDES = $planoContasModel -> ConsultaPlanoContasPorTipo("DES");
        foreach($listaPlanoContasDES as $item){
            $contas[trim($item->CmpConta)] = "";
        }
        
        $listaPlanoContasREC = $planoContasModel -> ConsultaPlanoContasPorTipo("REC");
        foreach($listaPlanoContasREC as $item){
            $contas[trim($item->CmpConta)] = "";
        }
        
        //CONTAS DE RECEITA
        //$planoSubContas = new \App\Classes\PlanoSubContasModel();
        //$listaPlanoContasDES = $planoSubContas -> ConsultaPlanoSubContasPorTipo("DES");
      
        foreach($listaPlanoContasDES as $item){
           
            $listaDespesa =$this -> CampoInputTotal("Valor","valor_d_".$des,$des,"",4)
                            . $this -> CampoInputAjuste("% Ajuste","ajuste_d_".$des,$des,"",4)
                            . $this -> CampoInputMoedaD("Valor Ajustado","valor_ajustado_d_".$des,$des,"",4)                           

                            . $this -> CampoHidden("cd".$des,$seguranca->cripto($item->idplano_contas));
            //$contador++;
            $des++;
            
            //ENCADEAMENTO DA LISTA DE DESPESA1q
            $contas[trim($item->CmpConta)] = $contas[trim($item->CmpConta)] . $listaDespesa;
                          
        }
        
        /**
         * BAIXAR OS DADOS DE VALOR DE CONDOMINIO E NUMERO DE APARTAMENTOS
         */
        
        $infra = new \App\Classes\InfraEstruturaModel();
        $infraModel = $infra -> ConsultaInfraEstruturaCadastro(Auth::user()->condominio_idcondominio);
        
        
        $taxa = new \App\Classes\TaxaModel();
        $taxaModel = $taxa -> ConsultaTaxa();
        
        foreach($taxaModel as $item){
            echo $item -> CmpValor . " - " . $item -> CmpCategoria. "<BR>";
            $taxas[$item -> CmpCategoria] = $item -> CmpValor;
        }
        
        $valorCondominio = 0;
        $valorTaxaExtra = 0;
        
        foreach($infraModel as $item){
            $valorCondominio = $valorCondominio + $item -> CmpNumAndares * $item -> CmpNumAptosPorAndar * $item -> CmpNumBlocos * $taxas["CON"];
            $valorTaxaExtra = $valorTaxaExtra + $item -> CmpNumAndares * $item -> CmpNumAptosPorAndar * $item -> CmpNumBlocos * $taxas["EXT"];
        }
        
        echo $valorCondominio . " -- " . $valorTaxaExtra;
        $valorCampo = 0;

        
        foreach($listaPlanoContasREC as $item){
           
            if($item->idplano_contas == 135)  $valorCampo = number_format($valorCondominio, 2, ',', '.');
            if($item->idplano_contas == 136)  $valorCampo = number_format($valorTaxaExtra, 2, ',', '.');
            
            $listaReceita = $this ->CampoInputTotal("Valor","valor_d_".$rec,$rec, $valorCondominio,4)
                        . $this -> CampoInputAjuste("% Ajuste","ajuste_d_".$rec,$rec,"",4)
                        . $this ->CampoInputMoedaD("Valor Ajustado","valor_ajustado_d_".$rec,$rec,"",4)                           

                        . $this ->CampoHidden("cd".$rec,$seguranca->cripto($item->idplano_contas));
            //$contador++;
            $rec++;
            
            //ENCADEAMENTO DA LISTA DE DESPESA
            $contas[trim($item->CmpConta)] = $contas[trim($item->CmpConta)] . $listaReceita;
                          
        }
        
        //FORMATAÇÃO DA LISTA DE CONTAS
        foreach($listaPlanoContasDES as $item){           
            $listaPainelTotalDES = $listaPainelTotalDES . $this->MontarTelaCorpoPAINELFAQ($item->CmpConta, $contas[trim($item->CmpConta)], "primary",$contador2);
            $contador2++;
        }
        
        //FORMATAÇÃO DA LISTA DE CONTAS
        foreach($listaPlanoContasREC as $item){           
            $listaPainelTotalREC = $listaPainelTotalREC . $this->MontarTelaCorpoPAINELFAQ($item->CmpConta, $contas[trim($item->CmpConta)], "primary",$contador3);
            $contador3++;
        }
     
        $des--;
        $rec--;
        
        $lista = $lista . $this -> CampoHidden("total_despesa",$des);
        $lista = $lista . $this -> CampoHidden("total_valor_despesa","");
        $lista = $lista . $this -> CampoHidden("saldo","");
        $lista = $lista . $this -> CampoHidden("resultadoSinal","");  
        
        $data["form2"] = $this -> CampoHeader("Ano Base") 
                . $this -> montarFormulario("", "ano", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectAno, "select1",12);
        
        $data["ListaContasDES"] = $this -> CampoHeader("Contas de Despesa") 
                . $this->  MontarTelaInicioPAINELFAQ("DES") . $listaPainelTotalDES . $this->MontarTelaFimPAINELFAQ()
                . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12) . $lista; //segundo tipo de forumalrios
        
         $data["ListaContasREC"] = $this -> CampoHeader("Contas de Receita") 
                . $this->  MontarTelaInicioPAINELFAQ("REC") . $listaPainelTotalREC . $this->MontarTelaFimPAINELFAQ()
                . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12) . $lista; //segundo tipo de forumalrios
        
        //$data["formularioAno"] = $listaAno;
        //$data["formularioRec"] = $listaReceita;
        //$data["formularioDes"] =  $listaDespesa;
        return $data;
    }
    
    public function MontarTelaPagamentoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE             
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PAG","cad"));
        
        $selectFormaPagto = $this-> MontarCombosFormaPagto(0);
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectContas = $this -> MontarCombosContas($seguranca -> cripto(0),"DES");    
        $selectConsumo = $this-> MontarCombosConsumo(0);
        $selectParcelas = $this-> MontarCombosParcelas(0);
               
        $data["formulario"] = $this -> CampoInputValidacaoTamanhoGliphycon("Vencimento","vencto","","calendar",4)    
                            . $this -> CampoInputTamanhoGliphycon("Pagamento","pagto","","calendar",4)
                            . $this -> CampoInputMoedaValidationGliphycon("Valor","valor","","money",4)                           
                            . $this -> CampoSelectValidacaoFunction("Conta", "conta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectContas, "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",6)                            
                            . $this -> CampoSelectGliphycon("Num. de Parcelas", "parcelas", "", $selectParcelas, "SIM",4)                           
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> BotaoSubmitFuncao("Enviar", 12, "");//montarFormulario("Enviar", "", "", "","","","submit",12);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /*
        BAIXAR PAGAMENTO
     *      */
    public function MontarTelaPagamentoBaixar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(69, "cad","Financeiro "," Pagamento");        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PAG","bai"));
               
        $data["formulario"] = $this -> CampoInputValidacaoTamanhoGliphycon("Pagamento","pagto","","calendar",4);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
     public function MontarTelaEntregaBaixar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(69, "cad","Financeiro "," Pagamento");        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ENT","bai"));
               
        $data["formulario"] = $this -> CampoInputValidacaoTamanhoGliphycon("Entregas","baixaEntrega","","calendar",4);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
     public function MontarTelaEntregaRelatorio(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
         
        $selectCategoriaEntrega = $this -> MontarCombosCategoriaEntrega(0);
        $selectApartamento = $this -> MontarCombosApartamento(0);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(69, "cad","Financeiro "," Pagamento");        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ENT","rel"));
               
        $data["formulario"] = $this -> CampoInputTamanhoGliphycon("Emissão","emissao","","calendar",4)
                                . $this -> CampoInputTamanhoGliphycon("Baixa","baixa","","calendar",4)
                                . $this -> CampoInputTamanhoGliphycon("Rastreamento Correio","codCorreio","","",4)
                                . $this -> CampoSelectGliphycon("Categoria", "catEnt", "user", $selectCategoriaEntrega,"NAO", 4)
                                . $this -> CampoSelectGliphycon("Apartamento/Bloco", "apto", "user", $selectApartamento,"NAO", 4)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit2",12);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    public function MontarTelaContratoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(73, "cad","Financeiro "," Contrato");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CON","cad"));        
       
        //$selectCategoriaConta = $this -> MontarCombosCategoriaConta($seguranca -> cripto(0));
        $selectFormaPagto = $this-> MontarCombosFormaPagto(0);
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectContas = $this ->MontarCombosContas($seguranca -> cripto(0));
               
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Vencimento","vencto","",2)
                            . $this ->CampoInputValidacaoTamanho("Pagamento","pagto","",2)
                            . $this ->CampoInputValidacaoTamanho("Valor","valor","",2)
                            . $this -> montarFormulario("Forma de Pagamento", "formPagto", "Escolha a Forma de Pagamento", "Por favor, informe a Categoria da Conta correta.","", $selectFormaPagto, "select1",2)
                            . $this -> CampoSelect("Fornecedores", "fornecedor", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectFornecedor, "select1",2)
                            . $this -> montarFormulario("Conta", "conta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectContas, "select1",2)
                            . $this -> montarFormulario("Observação", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
       
        
        return $data;
    }
    
    public function MontarTelaRedeGasCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(16, "cad","Segurança "," Tomada de Incêndio"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("TOM","cad"));
       
        //$selectCategoriaConta = $this -> MontarCombosCategoriaConta($seguranca -> cripto(0));
        $selectFormaPagto = $this-> MontarCombosFormaPagto(0);
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectContas = $this ->MontarCombosContas($seguranca -> cripto(0));
               
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Vencimento","vencto","",2)
                            . $this ->CampoInputValidacaoTamanho("Pagamento","pagto","",2)
                            . $this ->CampoInputValidacaoTamanho("Valor","valor","",2)
                            . $this -> montarFormulario("Forma de Pagamento", "formPagto", "Escolha a Forma de Pagamento", "Por favor, informe a Categoria da Conta correta.","", $selectFormaPagto, "select1",2)
                            . $this -> CampoSelect("Fornecedores", "fornecedor", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectFornecedor, "select1",2)
                            . $this -> montarFormulario("Conta", "conta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectContas, "select1",2)
                            . $this -> montarFormulario("Observação", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
       
        
        return $data;
    }
    
    
    public function MontarTelaPontoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(16, "cad","Segurança "," Tomada de Incêndio"); 
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PON","reg"));
       
        $selectFuncionario = $this ->MontarCombosFuncionario($seguranca->cripto(0));
        //$selectTurno = $this ->MontarCombosTurno($seguranca->cripto(0));
        //$selectCategoriaConta = $this -> MontarCombosCategoriaConta($seguranca -> cripto(0));
        $data["formulario"] =  $this ->CampoInputValidacaoTamanho("CPF","cpf","",12)
                
                        //$this -> montarFormulario("Funcionário", "catFun", "Escolha o Funcionário", "Por favor, informe o Funcionário correto.","", $selectFuncionario, "select1",12)
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            //. $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        
        return $data;
    }
    
    public function MontarTelaRecebimentoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        // $vagaGaragem = new \App\Classes\VagaGaragemModel();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
       // $data = $controleTela -> PrepararArrayData(69, "cad","Financeiro "," Recebimento");    
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REC","cad"));
       
        //$selectCategoriaConta = $this -> MontarCombosCategoriaConta($seguranca -> cripto(0));
        $selectFormaPagto = $this-> MontarCombosFormaPagto(0);
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectContas = $this ->MontarCombosContas($seguranca -> cripto(0),"REC");
               
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Recebido em:","recebido","",2)
                            . $this ->CampoInputValidacaoTamanho("Valor","valor","",2)
                            . $this -> montarFormulario("Forma de Rcebimento", "formPagto", "Escolha a Forma de Rcebimento", "Por favor, informe a Categoria da Conta correta.","", $selectFormaPagto, "select1",2)
                            . $this -> CampoSelectFunction("Conta", "conta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectContas, "select1","onchange='javascript:pesquisa_sub_conta()'",2)
                            . $this -> CampoSelectFunction("SubConta", "subconta", "Escolha a Categoria da SubConta", "Por favor, informe a Categoria da Conta correta.","", "", "select1","onchange='javascript:recupera_dados_apresentacao_grafico()'",2)
                            . $this -> montarFormulario("Observação", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
       
        
        return $data;
    }
    
    public function MontarTelaFuncionarioCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        /*//DESCRICAO DA DATEGORIA DE DOCUMENTO
        $categoriaDocumento = new \App\Classes\CategoriaDocumentoModel();
        $categoria_documento = $categoriaDocumento -> recuperaDescricaoCategoriaDocumento($id);
       
        */
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $vagaGaragem = new \App\Classes\VagaGaragemModel();
        
       // $id_cripto = $seguranca ->cripto($idObjeto);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FUNC","cad"));
        
        //ID DA CATEGORIA DE DOCUMENTO  
        //$data["idcategoria_documento"] = $id;
        //echo $vagaGaragem ->consultarVagaGaragem();
        //MONTAR FORMULARIO
        //COMBOS DA TELA
        $selectEstadoCivil = $this -> MontarCombosEstadoCivil(0);
        $selectCatProduto = $this -> montarCombos("catProduto",0);        
        $selectCatVeiculo = $this -> montarCombos("catVeiculo",0);
        $selectVagaGaragem = $this -> MontarCombosVagaGaragem(0);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectCartao = $this -> MontarCombosCartaoEstacionamento(0);//montarCombos("catCartao",0);
        
        $selectNaturalidade = $this -> MontarCombosNaturalidade(0);
        $selectNacionalidade = $this -> MontarCombosNacionalidade(0);
        $selectEhDecifiente = $this -> MontarCombosSIM_NAO(0);
        
        $selectEscolaridade = $this -> MontarCombosEscolaridade(0);
         
        $selectFuncao = $this -> MontarCombosFuncao($seguranca->cripto(0));
        $selectUF = $this -> MontarCombosUnidadeFederacao(0); // MontarCombosUnidadeFederal();
       // $selectCategoriaDocumento = $this -> montarCombos("catDocumento", $id);
              
        
        $data["formulario1"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Contratação","dtEntrada","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Dispensa","dtSaida", "","calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","dtNasc", "","calendar",4)        
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome","nome","","user",12)
                            . $this -> CampoSelectGliphycon("Função", "funcao", "trabalho", $selectFuncao,"SIM", 12)
                            . $this -> CampoInputTamanhoGliphycon("Pai", "pai", "","user", 12)
                            . $this -> CampoInputTamanhoGliphycon("Mãe", "mae", "","user", 12)
                            . $this -> CampoInputTamanhoGliphycon("Cônjuge","conjuge","","user",12)
                
                            . $this -> CampoInputTamanhoGliphycon("Endereço", "endereco", "", "casa", 12)
                            . $this -> CampoSelectGliphycon("Unidade Federação", "uf", "formacao", $selectUF,"SIM", 4)
                            . $this -> CampoInputTamanhoGliphycon("E-mail","emailNAO","","email",9) 
                            . $this -> CampoInputTamanhoGliphycon("Celular","cel","","tel",4)
                            . $this -> CampoInputTamanhoGliphycon("Tel.Fixo","tel","","tel",4)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "deficiente", $selectEhDecifiente,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil,"NAO", 4) 
                            . $this -> CampoSelectGliphycon("Naturalidade", "naturalidade", "bandeira", $selectUF,"SIM", 4)  
                            . $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade,"SIM", 4) 
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade,"SIM", 4)
                                                        
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12); 
                
        $data["formulario2"] = $this -> CampoHeader("Documentos Oficiais")
                            . $this -> CampoInputTamanhoGliphycon("CPF","cpf","","doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista","","doc",6) 
                            . $this -> CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral","","doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade","","doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Certificado Militar","cerMilitar","","doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Pis","pis","","doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Cateira de Trabalho (CPTS)","carTrabalho","","doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Série Cateira de Trbalho (CPTS)","serCarTrabalho","","doc",4)
                            . $this -> CampoInputTamanhoGliphycon("Cateira de Trabalho Rural (CPTS Rural)","carTrabalhoRural","","doc",6)
                            . $this -> CampoInputTamanhoGliphycon("Optante FGTS","opfgts","","doc",4)
                            . $this -> CampoInputTamanhoGliphycon("Filiação Sindicato","filSin","","doc",4)
                            . $this -> CampoInputTamanhoGliphycon("Nome Sindicato","nomSin","","doc",4)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obsdoc","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        
        /*
        $data["anexo"] =     $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",2)
                             . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
         */                
        
        
        return $data;
    }
    
    public function MontarTelaOcorrenciaCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util(); 
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("OCO","cad"));
        
        $selectTipoOcorrencia = $this -> MontarCombosTipoOcorrencia(0);
                     
        
        $data["formulario1"] =  $this -> CampoInputValidacaoTamanhoGliphycon("Início","dtEntrada","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Término","dtSaida", "","calendar",4)                                   
                            . $this -> CampoSelectFunction("Tipo", "tipo", "Escolha o ", "Por favor, informe a Categoria da Conta correta.","", $selectTipoOcorrencia, "select1","",2)                                                       
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12); 
                
        
        
        
        return $data;
    }
    
    public function MontarTelaFeriasCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util(); 
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FER","cad"));
        
        $selectTipoOcorrencia = $this -> MontarCombosTipoOcorrencia(0);
        $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto(0));  
              
        $data["formulario1"] =  $this -> CampoInputValidacaoTamanhoGliphycon("Início","dtEntrada","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Término","dtSaida", "","calendar",4)   
                            . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "user", $selectFuncionario,"SIM", 12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                            . $this ->CampoHidden("tipo", 1); 
                
        
        
        
        return $data;
    }
    
    public function MontarTelaFaltaCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util(); 
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FAL","cad"));
        
        $selectTipoOcorrencia = $this -> MontarCombosTipoOcorrencia(0);
        $selectTipoFalta = $this -> MontarCombosTipoFalta(0);
        $selectMotivoFalta = $this -> MontarCombosMotivoOcorrencia(0);
        $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto(0));  
              
        $data["formulario1"] =  $this -> CampoInputValidacaoTamanhoGliphycon("Início","dtEntrada","","calendar",4)
                                . $this -> CampoInputTamanhoGliphycon("Término","dtSaida", "","calendar",4) 
                                . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "user", $selectFuncionario,"SIM", 12)
                                . $this -> CampoSelectGliphycon("Categoria ", "tipoFalta", "", $selectTipoFalta,"SIM", 2)
                                . $this -> CampoSelectGliphycon("Motivo ", "motivoFalta", "", $selectMotivoFalta,"SIM", 4)

                                . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                                . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                                . $this ->CampoHidden("tipo", 1); 
           
        
        return $data;
    }
    
    public function MontarTelaLicencaCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util(); 
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("LIC","cad"));
        
        $selectTipoOcorrencia = $this -> MontarCombosTipoOcorrencia(0);
        $selectTipoFalta = $this -> MontarCombosTipoFalta(0);
        $selectMotivoFalta = $this -> MontarCombosMotivoOcorrencia(0);
        $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto(0));  
        $selectTipoLicenca = $this ->MontarCombosTipoLicenca(0);
              
        $data["formulario1"] =  $this -> CampoInputValidacaoTamanhoGliphycon("Início","dtEntrada","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Término","dtSaida", "","calendar",4) 
                            . $this -> CampoSelectGliphycon("Categoria Licença", "tipoLicenca", "", $selectTipoLicenca,"SIM", 2)
                            
                            . $this -> CampoSelectGliphycon("Funcionario", "funcionario", "user", $selectFuncionario,"SIM", 12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                            . $this ->CampoHidden("tipo", 1); 
           
        
        return $data;
    }
    
    
    //FOLGA
    
    public function TelaConsultarFolga($idfuncionario){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOL","con"));
        
        $ocorrencia = new \App\Classes\OcorrenciaModel();
        $listaOcorrencia = $ocorrencia -> ConsultarOcorrenciasPorCategoria($idfuncionario,3);        
       
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_ocorrencias"] = $listaOcorrencia;   
        $data["idObjeto"] = $idfuncionario;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    public function MontarTelaFolgaCadastrar($idFuncionario,$ano){
              
        $data = array();
        //echo "ano ". $ano ;
       //$ano = "2019";
          //echo "---ano : ". $ano;             
        $util = new \app\Util\Util(); 
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOL","cad"));
        $selectAno = $this -> MontarCombosAno3($ano);
                        
        $data["formulario1"] =  $this -> CampoSelectGliphycon("", "ano", "", $selectAno,"SIM", 8)                                
                                . $this -> CampoHidden("val1", "pesano");
        
        //PARA O CASO DE ESTAR TRABALHANDO COM UM FUNCIONARIO ESPECIFICO
        if($idFuncionario == 0){
            $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto(0));  
            $data["formulario2"] =  $this -> CampoSelectGliphycon("Funcionario", "funcionario", "", $selectFuncionario,"SIM", 12)
                                        . $this -> CampoHidden("val1", "")
                                        . $this -> CampoHidden("val2", $seguranca->cripto($ano));
        }else{
            $data["formulario2"] = $idFuncionario;
        }    
                             
        
        /**
         * 0 - domingo
         * 1 - segu
         * 2 - ter
         * 3 - qua
         * 4 - qui
         * 5 - sex
         * 6 - sab
         */
                
        //$bloqueio = "N";
        
         
        if($ano != ""){
            
            $janeiro = $ano . "-01-";
            $fevereiro = $ano . "-02-";
            $marco = $ano . "-03-";
            $abril = $ano . "-04-";
            $maio = $ano . "-05-";
            $junho = $ano . "-06-";
            $julho = $ano . "-07-";
            $agosto = $ano . "-08-";
            $setembro = $ano . "-09-";
            $outubro = $ano . "-10-";
            $novembro = $ano . "-11-";
            $dezembro = $ano . "-12-";
            
            $data["janeiro"] = $util -> MontarCalendario($janeiro, 1,"jan");        
            $data["fevereiro"] = $util -> MontarCalendario($fevereiro, 2,"fev");
            $data["marco"] = $util -> MontarCalendario($marco,3,"mar");
            $data["abril"] = $util -> MontarCalendario($abril, 4,"abr");
            $data["maio"] = $util -> MontarCalendario($maio, 5,"mai");
            $data["junho"] = $util -> MontarCalendario($junho, 6,"jun");
            $data["julho"] = $util -> MontarCalendario($julho, 7,"jul");
            $data["agosto"] = $util -> MontarCalendario($agosto, 8,"ago");
            $data["setembro"] = $util -> MontarCalendario($setembro, 9,"set");
            $data["outubro"] = $util -> MontarCalendario($outubro, 10, "out");
            $data["novembro"] = $util -> MontarCalendario($novembro, 11,"nov");
            $data["dezembro"] = $util -> MontarCalendario($dezembro, 12,"dez");
            
            $data["botao"] = "S"; 
                    
        }else{
            $data["janeiro"] =  "";       
            $data["fevereiro"] = "";
            $data["marco"] = "";
            $data["abril"] = "";
            $data["maio"] = "";
            $data["junho"] = "";
            $data["julho"] = "";
            $data["agosto"] = "";
            $data["setembro"] = "";
            $data["outubro"] = "";
            $data["novembro"] = "";
            $data["dezembro"] = "";
            
            $data["botao"] = "N";
        }
        
         $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    
    public function MontarTelaFolgaEditar($idFuncionario,$ano){
              
        $data = array();
           
        
        /*echo " FUNC ". $idFuncionario;
        echo "<BR>";
        echo " ANO ". $ano;
        echo "<BR>";*/
        
        $util = new \app\Util\Util(); 
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $anexoModel = new \App\Classes\AnexoModel();
        $factory = new \App\DesignPattern\FactoryMethod();       
        $pasta = $factory ->GetClassVariavel() -> ConsultaPasta();
        $pasta = $factory -> GetClassVariavel() ->Path($pasta, "FUN", "PARCIAL");
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOL","edi"));
        //$selectAno = $this -> MontarCombosAno3($ano);
        
        $funcionarioModel = new \App\Classes\FuncionarioModel();
        $funcionario = $funcionarioModel -> ConsultaFuncionario($idFuncionario);//ConsultaBem($seguranca->cripto(0));

        $data["formulario1"] = "";
        
        foreach($funcionario as $item){
            $data["formulario1"] = $this -> CampoInputReadonlyGliphycon("Funcionário", strtoupper($item->CmpNome),"user", 7)
                    . $this -> CampoInputReadonlyGliphycon("Função", $item->CmpDescricao,"user", 5);
        }
        
        
        $imagem = $anexoModel ->recuperaAnexo($seguranca -> decripto($idFuncionario), "FUN");
        if($imagem != ""){                
            $data["imagem"] = $pasta.$imagem;
        }else{
            $data["imagem"] = "img/silhueta.png";
        }
        
        
        $data["formulario"] =   $this -> CampoHidden("funcionario", $seguranca->decripto($idFuncionario))
                               . $this -> CampoHidden("val2", $ano);            
        /*$data["formulario1"] =  $this -> CampoSelectGliphycon("", "ano", "", $selectAno,"SIM", 8)                                
                                . $this -> CampoHidden("val1", "pesano");
        
        //PARA O CASO DE ESTAR TRABALHANDO COM UM FUNCIONARIO ESPECIFICO
        if($idFuncionario == 0){
            $selectFuncionario = $this -> MontarCombosFuncionario($seguranca->cripto(0));  
            $data["formulario2"] =  $this -> CampoSelectGliphycon("Funcionario", "funcionario", "", $selectFuncionario,"SIM", 12)
                                        . $this -> CampoHidden("val1", "")
                                        . $this -> CampoHidden("val2", $ano);
        }else{
            $data["formulario2"] = $idFuncionario;
        }    */
                             
        
        /**
         * 0 - domingo
         * 1 - segu
         * 2 - ter
         * 3 - qua
         * 4 - qui
         * 5 - sex
         * 6 - sab
         */
             //echo "teste " . $idFuncionario ."_ ".$ano;   
        //$bloqueio = "N";
             //echo $ano;
        $ocorrencia = new \App\Classes\OcorrenciaModel();
        //echo $listaOcorrencia = $ocorrencia -> ConsultarOcorrenciasPorCategoria($idFuncionario,3);
        $ano_Cripto = $ano;
        $ano = $seguranca->decripto($ano);
        $lista = $ocorrencia -> ConsultarOcorrenciasPorCategoria2($idFuncionario,$ano_Cripto, 3);
        //$ano = $seguranca->decripto($ano);
        //echo $ano = "2019";
         
        if($ano != ""){
            
            $janeiro = $ano . "-01-";
            $fevereiro = $ano . "-02-";
            $marco = $ano . "-03-";
            $abril = $ano . "-04-";
            $maio = $ano . "-05-";
            $junho = $ano . "-06-";
            $julho = $ano . "-07-";
            $agosto = $ano . "-08-";
            $setembro = $ano . "-09-";
            $outubro = $ano . "-10-";
            $novembro = $ano . "-11-";
            $dezembro = $ano . "-12-";
            
            $data["janeiro"] = $this->CampoInicioPainel("JANEIRO", 12) . $util -> MontarCalendarioEditar($janeiro, 1,"jan",$lista) . $this->CampoFimPainel();        
            $data["fevereiro"] = $this->CampoInicioPainel("FEREVEIRO", 12) .$util -> MontarCalendarioEditar($fevereiro, 2,"fev",$lista). $this->CampoFimPainel();
            $data["marco"] = $this->CampoInicioPainel("MARÇO", 12) .$util -> MontarCalendarioEditar($marco,3,"mar",$lista). $this->CampoFimPainel();
            $data["abril"] = $this->CampoInicioPainel("ABRIL", 12) .$util -> MontarCalendarioEditar($abril, 4,"abr",$lista). $this->CampoFimPainel();
            $data["maio"] = $this->CampoInicioPainel("MAIO", 12) .$util -> MontarCalendarioEditar($maio, 5,"mai",$lista). $this->CampoFimPainel();
            $data["junho"] = $this->CampoInicioPainel("JUNHO", 12) .$util -> MontarCalendarioEditar($junho, 6,"jun",$lista). $this->CampoFimPainel();
            $data["julho"] = $this->CampoInicioPainel("JULHO", 12) .$util -> MontarCalendarioEditar($julho, 7,"jul",$lista). $this->CampoFimPainel();
            $data["agosto"] = $this->CampoInicioPainel("AGOSTO", 12) .$util -> MontarCalendarioEditar($agosto, 8,"ago",$lista). $this->CampoFimPainel();
            $data["setembro"] = $this->CampoInicioPainel("SETEMBRO", 12) .$util -> MontarCalendarioEditar($setembro, 9,"set",$lista). $this->CampoFimPainel();
            $data["outubro"] = $this->CampoInicioPainel("OUTUBRO", 12) .$util -> MontarCalendarioEditar($outubro, 10, "out",$lista). $this->CampoFimPainel();
            $data["novembro"] = $this->CampoInicioPainel("NOVEMBRO", 12) .$util -> MontarCalendarioEditar($novembro, 11,"nov",$lista). $this->CampoFimPainel();
            $data["dezembro"] = $this->CampoInicioPainel("DEZEMBRO", 12) .$util -> MontarCalendarioEditar($dezembro, 12,"dez",$lista). $this->CampoFimPainel();

            $data["botao"] = "S"; 
                    
        }else{
            $data["janeiro"] =  "";       
            $data["fevereiro"] = "";
            $data["marco"] = "";
            $data["abril"] = "";
            $data["maio"] = "";
            $data["junho"] = "";
            $data["julho"] = "";
            $data["agosto"] = "";
            $data["setembro"] = "";
            $data["outubro"] = "";
            $data["novembro"] = "";
            $data["dezembro"] = "";
            
            $data["botao"] = "N";
        }
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    /**
     * FÉRIAS
     * 964132927 - simone
     */ 
    
    public function TelaConsultarFerias($idfuncionario){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FER","con"));
        
        $ocorrencia = new \App\Classes\OcorrenciaModel();
        $listaOcorrencia = $ocorrencia -> ConsultarOcorrenciasPorCategoria3($idfuncionario,1);        
        
        foreach($listaOcorrencia as $item){
            $item -> CmpNome = strtoupper($item -> CmpNome);
            $item -> CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $item -> CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
            $item -> idocorrencias = $seguranca->cripto($item->idocorrencias);
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_ocorrencias"] = $listaOcorrencia;   
        $data["idObjeto2"] = $idfuncionario;
        
        return $data;
    }
    
    /**
     * FÉRIAS
     */
    
    public function TelaConsultarFalta($idfuncionario){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FAL","con"));
        
        $ocorrencia = new \App\Classes\OcorrenciaModel();
        $listaOcorrencia = $ocorrencia -> ConsultarOcorrenciasPorCategoria3($idfuncionario,2);        
        
        foreach($listaOcorrencia as $item){
            $item -> CmpNome = strtoupper($item -> CmpNome);
            $item -> CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $item -> CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
            $item -> idocorrencias = $seguranca->cripto($item->idocorrencias);
            
            if($item->CmpTipoFalta == 1){ $item->CmpTipoFalta = "JUSTIFICADA"; }
            else{ $item->CmpTipoFalta = "NÃO JUSTIFICADA"; }
            
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_ocorrencias"] = $listaOcorrencia;   
        $data["idObjeto"] = $idfuncionario;
        
        return $data;
    }
    
    /**
     * FÉRIAS
     */
    
    public function TelaConsultarLicenca($idOcorrencia){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        //echo "tetete " .$seguranca ->decripto($idfuncionario);
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("LIC","con"));
        
        $ocorrencia = new \App\Classes\OcorrenciaModel();
        $listaOcorrencia = $ocorrencia -> ConsultarOcorrenciasPorCategoria4($idOcorrencia,4);        
        
        foreach($listaOcorrencia as $item){
            $item -> CmpDataInicio = $util->formatarDataMysqlParaExibicao($item -> CmpDataInicio);
            $item -> CmpDataFim = $util->formatarDataMysqlParaExibicao($item -> CmpDataFim);
            $item -> idocorrencias = $seguranca->cripto($item->idocorrencias);
            
            $item -> CmpNome = strtoupper($item -> CmpNome);
            
        }
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_ocorrencias"] = $listaOcorrencia;   
        $data["idObjeto"] = $idOcorrencia;
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    /**
     * MontarTelaOcorrenciaCadastrar
     * @return string
     */
    public function MontarTelaTrabalhoTurnoCadastrar($idFuncao){
              
        $data = array();
               
        $campo = "";
        
        $util = new \App\Util\Util(); 
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(30, "cad","Funcionário "," Funcionário");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("TUR","cad"));
        
        if($seguranca->decripto($idFuncao) == 0){
            $selectFuncao = $this -> MontarCombosFuncao2($seguranca -> cripto(0));
            $campo = $this -> CampoSelectGliphycon("Função", "funcao", "user", $selectFuncao,"SIM", 12);
            $hidden = "";
            $indicador = $this -> CampoHidden("indicador", "N"); //situação normal
        }else{
            $selectFuncao = $this -> MontarCombosFuncao2($idFuncao);
            $campo = $this ->CampoSelectReadonlyGliphycon("Função", "", "user", $selectFuncao,"SIM", 12);
            $hidden = $this -> CampoHidden("funcao", $idFuncao);
            $indicador =  $this -> CampoHidden("indicador", "S"); //situação readonly 
        }
        $selectHora = $this -> MontarCombosHora("");
        
        
        /*$data["formulario"] = 
                                    "<div class='col-lg-12'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Escolha a Função
                                            </div>
                                                <div class='panel-body'>
                                                      " . $campo . $hidden. $indicador.                                                       
                                               "</div>                                                
                                            </div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Primeiro Turno
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this -> CampoSelectGliphycon("Início", "pritur1", "calendar", $selectHora,"NAO", 4)    
                                                        . $this -> CampoSelectGliphycon("Término", "pritur2", "calendar", $selectHora,"NAO", 4).                                                        
                                               "</div>                                                
                                            </div>
                                    </div>    
                                    <div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Segundo Turno
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this -> CampoSelectGliphycon("Início", "segtur1", "calendar", $selectHora,"NAO", 4)    
                                                        . $this -> CampoSelectGliphycon("Término", "segtur2", "calendar", $selectHora,"NAO", 4).                                                        
                                               "</div>                                               
                                            </div>
                                    </div>  
                                    
                                    <div class='col-lg-12'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Dia de Trabalho 
                                            </div>
                                                <div class='panel-body'>"
                                                    . $this ->CampoCheckBoxTamanho("Domingo", "dom", "", 1) 
                                                    . $this ->CampoCheckBoxTamanho("Segunda", "seg", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Terça", "ter", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Quarta", "qua", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Quinta", "qui", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Sexta", "sex", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Sábado", "sab", "", 1)
                                                        
                                                    . $this -> montarFormulario("Observação", "obs", "Digite uma descrição necessária.", "","","", "textarea",12)
                                                . "</div>
                                                
                                            </div>
                                    </div> ";*/
        $data["formulario"] = 
                                    "<div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Escolha a Função
                                            </div>
                                                <div class='panel-body'>
                                                      " . $campo . $hidden. $indicador.                                                       
                                               "</div>                                                
                                            </div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Turno de Trabalho
                                            </div>
                                                <div class='panel-body'>
                                                      " . $this -> CampoInputValidacaoTamanhoGliphycon("Início", "pritur1","", "calendar2", 3)    
                                                        . $this -> CampoInputValidacaoTamanhoGliphycon("Término", "pritur2","", "calendar2", 3)  .                                                      
                                               " <font color='red'>OBS.: O Turno deve incluir o período de almoço!</font></div>                                                
                                            </div>
                                    </div>    
                                                                         
                                    <div class='col-lg-12'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                Dia de Trabalho 
                                            </div>
                                                <div class='panel-body'>"
                                                    . $this ->CampoCheckBoxTamanho("Domingo", "dom", "", 1) 
                                                    . $this ->CampoCheckBoxTamanho("Segunda", "seg", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Terça", "ter", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Quarta", "qua", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Quinta", "qui", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Sexta", "sex", "", 1)
                                                    . $this ->CampoCheckBoxTamanho("Sábado", "sab", "", 1)
                                                        
                                                    //. $this -> montarFormulario("Observação", "obs", "Digite uma descrição necessária.", "","","", "textarea",12)
                                                    . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)                           
                                                    . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                                                . "</div>
                                                
                                            </div>
                                    </div> ";              
        
        return $data;
    }
    
    public function MontarTelaObraCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
   
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(45, "cad","Obra/Serviço "," Obra/Serviço");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("OBR","cad"));
                
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Título","titulo","",2)
                            . $this ->CampoInputValidacaoTamanho("Objetivo","objetivo","",2)
                            
                            . $this ->CampoInputValidacaoTamanho("Início","dtInicio","",2)
                            . $this ->CampoInputValidacaoTamanho("Fim","dtFim","",2)
                            . $this -> montarFormulario("Descrição", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
        /*
        $data["anexo"] =     $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",2)
                             . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
         */                
        
        
        return $data;
    }
    
    
    public function MontarTelaPetsCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        /*//DESCRICAO DA DATEGORIA DE DOCUMENTO
        $categoriaDocumento = new \App\Classes\CategoriaDocumentoModel();
        $categoria_documento = $categoriaDocumento -> recuperaDescricaoCategoriaDocumento($id);
       
        */
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $vagaGaragem = new \App\Classes\VagaGaragemModel();
        
       // $id_cripto = $seguranca ->cripto($idObjeto);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(40, "cad","Pets "," Pets");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PET","cad")); 
        
        $selectCatSexo = $this -> MontarCombosSexo(0);      
        $selectCatSIM_NAO = $this -> MontarCombosSIM_NAO("");
        $selectApartamento = $this -> MontarCombosApartamento(0);
                
        $data["formulario"] = 
                              $this ->CampoInputValidacaoTamanho("Data Entrada","dataEntrada","",4)  
                            . $this ->CampoInputTamanho("Data Saída","dataSaida","",4) 
                            . $this ->CampoInputValidacaoTamanho("Data Nascimento","dataNasc","",4)
                            . $this ->CampoInputValidacaoTamanho("Nome","nome","",8)
                            . $this -> montarFormulario("Apartamento", "apto", "Escolha o sexo do Pet", "Por favor, informe o sexo correto do Pet.","", $selectApartamento, "select1",2)
                            . $this -> montarFormulario("É Deficiente?", "ehDefic", "Escolha o sexo do Pet", "Por favor, informe o sexo correto do Pet.","", $selectCatSIM_NAO, "select1",2)
                            
                            . $this ->CampoInputValidacaoTamanho("Raça","raca","",2)                           
                            . $this -> montarFormulario("Sexo", "catSexo", "Escolha o sexo do Pet", "Por favor, informe o sexo correto do Pet.","", $selectCatSexo, "select1",2)
                            
                            . $this ->CampoInputValidacaoTamanho("Espécie","especie","",3)
                            . $this ->CampoInputValidacaoTamanho("Cor de Pelo","corPelo","",3)
                            
                               
                            
                            . $this -> montarFormulario("Descrição", "obs", "Digite uma descrição necessária.", "","","", "textarea",12);
        /*
        $data["anexo"] =     $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",2)
                             . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
         */                
        
        
        return $data;
    }
    //REFORMA DE APARTAMENTO
    
    public function MontarTelaReformaApartamentoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        /*//DESCRICAO DA DATEGORIA DE DOCUMENTO
        $categoriaDocumento = new \App\Classes\CategoriaDocumentoModel();
        $categoria_documento = $categoriaDocumento -> recuperaDescricaoCategoriaDocumento($id);
       
        */
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       // $vagaGaragem = new \App\Classes\VagaGaragemModel();
        
       // $id_cripto = $seguranca ->cripto($idObjeto);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(77, "cad"," Cadastrar "," Reforma Apartamento","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("REFAPA","cad"));
        
        //ID DA CATEGORIA DE DOCUMENTO  
        //$data["idcategoria_documento"] = $id;
        //echo $vagaGaragem ->consultarVagaGaragem();
        //MONTAR FORMULARIO
        //COMBOS DA TELA
        /*$selectCatProduto = $this -> montarCombos("catProduto",0);        
        $selectCatVeiculo = $this -> montarCombos("catVeiculo",0);*/
        $selectTipoReforma = $this ->MontarCombosTipoReforma(0);
        //$selectCartao = $this ->MontarCombosCartaoEstacionamento(0);//montarCombos("catCartao",0);
     
       // $selectCategoriaDocumento = $this -> montarCombos("catDocumento", $id);
                
        $data["formulario"] = $this ->CampoInputTamanhoGliphycon("Título","titulo","","generico",4)
                            . $this ->CampoInputTamanhoGliphycon("Início","dataInicioReforma","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Fim","dataFimReforma","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Responsável","respReforma","","generico",4)
                           
                            //. $this -> CampoTextAreaGliphycon("Tipo Reforma", "tipoReforma","","comentario",12)
                            . $this -> CampoSelectGliphycon("Tipo Reforma", "tipoReforma", "formacao", $selectTipoReforma,"SIM", 4)
                            . $this -> CampoTextAreaGliphycon("Descrição Reforma", "desRef","","comentario",12)
                            . $this -> CampoTextAreaGliphycon("Materiais Utilizados", "matUsu","","comentario",12)
                            /*. $this ->CampoInputValidacaoTamanho("Modelo","modelo","",2)
                            . $this ->CampoInputValidacaoTamanho("Placa","placa","",2)
                            . $this ->CampoInputValidacaoTamanho("Cor","cor","",2)
                            . $this -> montarFormulario("Categoria Veículo", "catVeiculo", "Escolha a categoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectCatVeiculo, "select1",2)
                            . $this -> montarFormulario("APTO", "catVagaGaragem", "Escolha a categoria do Vaga de Garagem", "Por favor, informe a categoria do vaga de garagem correta.","", $selectVagaGaragem, "select1",2)
                            . $this -> montarFormulario("Cartão Estacionamento", "catCartaoEstacionamento", "Escolha o Cartão de Estacionamento", "Por favor, informe a categoria do vaga de garagem correta.","", $selectCartao, "select1",2)
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        /*
        $data["anexo"] =     $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",2)
                             . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
         */                
        
        
        return $data;
    }
    
    /*
     * BENS
     */
    
    public function MontarTelaFornecedorCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(1, "cad"," Cadastrar "," Fornecedor","av1");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOR","cad"));
        
        $selectPessoa = $this -> MontarCombosPessoa(0);       
               
        $data["formulario"] = $this ->CampoInputValidacaoTamanhoGliphycon("Fornecedor","fornecedor","","generico",12)
                            //. $this -> montarFormulario("Categoria Pessoa", "catPessoa", "Escolha o Pessoa física/jurídica do Fornecedor", "Por favor, informe a categoria do bem correta.","", $selectPessoa, "select1",2)
                            . $this -> CampoSelectGliphycon("Categoria Pessoa", "catPessoa", "user", $selectPessoa,"SIM", 2)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("CNPJ/CPF", "cnpj_cpf", "","doc",3)
                            . $this -> CampoInputTamanhoGliphycon("Celular", "tel_cel", "","tel",3)
                            . $this -> CampoInputTamanhoGliphycon("Telefone Fixo", "tel_fixo", "","tel",3)                            
                            . $this -> CampoInputTamanhoGliphycon("Endereço", "endereco", "","generico",12)   
                            
                            . $this -> CampoInputTamanhoGliphycon("E-mail", "email", "","email",6)
                            . $this -> CampoInputTamanhoGliphycon("Site", "site", "","generico",6) 
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)                               
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        return $data;
    }
    
    /*
     * BENS
     */
    
    public function MontarTelaEstoqueCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(1, "cad"," Cadastrar "," Fornecedor","av1");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("FOR","cad"));
        
        $selectPessoa = $this ->MontarCombosPessoa(0);       
               
        $data["formulario"] = $this ->CampoInputValidacaoTamanho("Fornecedor","fornecedor","",6)
                            . $this -> montarFormulario("Categoria Pessoa", "catPessoa", "Escolha o Pessoa física/jurídica do Fornecedor", "Por favor, informe a categoria do bem correta.","", $selectPessoa, "select1",2)
                            . $this -> CampoInputValidacaoTamanho("CNPJ/CPF", "cnpj_cpf", "",3)
                            . $this -> CampoInputValidacaoTamanho("Endereço", "endereco", "",3)   
                            . $this -> CampoInputValidacaoTamanho("Tel. Fixo", "tel_fixo", "",5)
                            . $this -> CampoInputValidacaoTamanho("Tel. Cel", "tel_cel", "",5)
                            . $this -> CampoInputValidacaoTamanho("E-mail", "email", "",5)
                            . $this -> CampoInputValidacaoTamanho("Site", "site", "",5)                            
                            . $this -> montarFormulario("Obs", "obs", "Informe um comentário sobre o fornecedor", "","","", "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
       
        return $data;
    }
    
    public function MontarTelaBemCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util(); 
        $lista = "";
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(52, "cad"," Cadastrar "," Bem","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("BEM","cad"));
        
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectAreaComum = $this -> MontarCombosAreaComum($seguranca -> cripto(0),"TODOS");
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectDepreciacao = $this ->MontarCombosDepreciacao($seguranca -> cripto(0));
        $selectCategoriaBem = $this -> MontarCombosCategoriaBem(0);
        
        $lista = $this -> CampoInputValidacaoTamanhoGliphycon("Nome ","nomeBem","","bem",8)                            
                            . $this -> CampoInputTamanhoGliphycon("Data Aquisição", "dataAquisicao", "","calendar",4);   
                             
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoInputMoedaGliphycon("Valor Aquisição","valorAquisicao","","money",4)
                            . $this -> CampoSelectGliphycon("Enquadramento (Depreciação)", "catEnqBem", "bem", $selectDepreciacao, "SIM",4)
                            . $this -> CampoSelectGliphycon("Categoria ", "catBem", "", $selectCategoriaBem, "SIM",4)  
                            . $this ->CampoFimDivisor();
        
        $lista = $lista . $this-> CampoInicioDivisor() 
                            . $this -> CampoSelectGliphycon("Área Comum", "areCom", "", $selectAreaComum, "NAO",12)
                            . $this -> CampoSelectGliphycon("Fornecedor", "forBem", "", $selectFornecedor, "NAO",12)                            
                            . $this -> CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoTextAreaGliphycon("Comentário", "desBem","","comentario",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12)
                            . $this ->CampoFimDivisor();
        
        $data["formulario"] = $lista;
        
        $data["botaoVoltar"] = $this ->MontaBotaoVoltar();
        
        return $data;
    }
    
    
    /***
     * CADASTRO DE DEPENDENTE
     */
    
    public function MontarTelaDependenteCadastrar($idMorador,$banner){
              
        $data = array();
                
        $util = new \App\Util\Util(); 
        $lista = "";
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(52, "cad"," Cadastrar "," Dependente","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DEP","cad"));
        
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectAreaComum = $this -> MontarCombosAreaComum($seguranca -> cripto(0),$seguranca -> cripto("SIM"));
        $selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectDepreciacao = $this ->MontarCombosDepreciacao($seguranca -> cripto(0));
        $selectCategoriaBem = $this -> MontarCombosCategoriaBem(0);
        $selectParentesco = $this -> MontarCombosParentesco(0);
                
        $lista =            $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Entrada Condomínio","dtEntrada","","calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Saída Condomínio","dtSaida","","calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nascimento","dtNasc","","calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome Dependente","nomeDep","","user",9)
                            //. $this -> CampoInputTamanho("Entrada Condomínio", "dtEntrada", "",4)
                            //. $this -> CampoInputTamanho("Saída Condomínio", "dtSaida", "",4)
                            //. $this -> CampoInputValidacaoTamanho("Data Nascimento", "dtNasc", "",4)    
                            //. $this ->CampoInputValidacaoTamanho("Nome Dependente","nomeDep","",9)
                            //. $this -> CampoSelect("Parentesco", "parentesco", "Escolha o Parentesco do Dependente", "Por favor, informe a Parentesco do bem correto.","", $selectParentesco, "select1",3);   
                            . $this -> CampoSelectGliphycon("Parentesco", "parentesco", "user", $selectParentesco,"NAO", 3); 
        $lista = $this->CampoInicioDivisor() . $lista . $this ->CampoFimDivisor();
        
        $lista = $lista . $this->CampoInicioDivisor() . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)         
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit4",12)
                            . $this ->CampoFimDivisor();
        
        $data["formulario"] = $lista;
        $data["idMorador"] = $idMorador;
        $data["banner"] = $banner;
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
    }
    
    
    
    public function MontarTelaManutencaoProgramadaCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(52, "cad"," Agendar "," Manutenção Programada");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("MNTPRO","cad"));
        
        //$selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        $selectAreaComum = $this -> MontarCombosAreaComum($seguranca -> cripto(0),"SIM");
        //$selectFornecedor = $this -> MontarCombosFornecedor($seguranca -> cripto(0));
        //$selectDepreciacao = $this ->MontarCombosDepreciacao($seguranca -> cripto(0));
        //$selectCategoriaBem = $this ->MontarCombosCategoriaBem(0);
                
        $data["formulario"] = 
                              $this -> CampoInputValidacaoTamanho("Início", "datainicio", "",3) 
                            . $this -> CampoInputValidacaoTamanho("Término", "datafim", "",3) 
                            . $this -> CampoInputValidacaoTamanho("Assunto", "assunto", "",12) 
                            . $this -> montarFormulario("Área Comum", "areCom", "Escolha a Área Comum do Bem", "Por favor, informe a Área Comum do Bem correto.","", $selectAreaComum, "select1",6)
                            . $this -> montarFormulario("Descrição ", "descricao", "Informe a descrição da manutenção", "","","", "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        return $data;
    }
    
    public function MontarTelaClassificadosCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CLA","cad"));
        
        $selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0);  
                
        $data["formulario"] =  $this -> CampoInputValidacaoTamanhoGliphycon("Assunto","assunto","","generico",8)
                           // . $this -> montarFormulario("Tipo Negócio", "tipNeg", "Escolha o Tipo de Negócio", "Por favor, informe o tipo de Categoria Correta.","", $selectCategoriaNegocio, "select1",3)
                            . $this -> CampoSelectGliphycon("Categoria", "tipNeg", "trabalho", $selectCategoriaNegocio,"SIM", 4)
                            //. $this -> montarFormulario("Observações", "obs", "Faça um comentário", "","","", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        return $data;
    }
    
    public function MontarTelaCautelaCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("CAU","cad"));
        
        $selectBem = $this -> MontarCombosBem($seguranca->cripto(0));  
                
        $data["formulario"] = $this -> montarFormulario("Bem", "bem", "Escolha o bem para acautelar", "Por favor, informe o tipo de Categoria Correta.","", $selectBem, "select1",2)
                            . $this -> montarFormulario("Observações", "descricao", "Faça um comentário", "","","", "textarea",12);
       
        return $data;
    }
    
    public function MontarTelaSolicitacaoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("SOL","cad"));
        
        //$selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0);
        
        $selectAreacomum = $this->MontarCombosAreaComum($seguranca->cripto(0),"TODOS");
        
        $selectBlocos = $this -> MontarCombosBlocoApartamento(0);
       
        $selectAndares = $this -> MontarCombosInfraEstrutura();
        
        $selectApartamento = $this -> MontarCombosApartamento(0);
        
        $codigoUnico =  $util -> geracaoCodigoUnico("SOL");
                
        $lista = $this ->CampoInputReadonlyTamanho("Código Único","codUnico",$codigoUnico,6)  
                            . $this -> CampoInicioPainel("Localização", 12)
                            . $this -> CampoRadioTamanho("Área Comum", "rad", "are", 3) . $this -> CampoSelectGliphyconV2("", "area", $selectAreacomum, "NAO",9)
                            . $this -> CampoRadioTamanho("Bloco e Andar", "rad", "blo", 3) . $this -> CampoSelectGliphyconV2("", "bloco", $selectBlocos, "NAO",4)  . $this -> CampoSelectGliphyconV2("", "andar", $selectAndares, "NAO",4)
                            . $this -> CampoRadioTamanho("Meu Apartamento", "rad", "apto", 3);
                               
                            
        $lista = $lista .  $this -> CampoFimPainel()
                        . $this -> montarFormulario("Observações", "obs", "Faça um comentário", "","","", "textarea",12)  
                        . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        $data["formulario"] = $lista;
        
        return $data;
    }
    
    
    public function MontarTelaPedidoServicoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("PEDSER","cad"));
        
        //$selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0);
        
        $selectAreacomum = $this->MontarCombosAreaComum($seguranca->cripto(0),"TODOS");
        
        $selectBlocos = $this -> MontarCombosBlocoApartamento(0);
       
        $selectAndares = $this -> MontarCombosInfraEstrutura();
        
        $selectApartamento = $this -> MontarCombosApartamento(0);
        
        $codigoUnico =  $util -> geracaoCodigoUnico("SOL");
                
        $lista = $this ->CampoInputReadonlyTamanho("Código Único","codUnico",$codigoUnico,6)  
                            . $this -> CampoInicioPainel("Localização", 12)
                            . $this -> CampoSelectGliphycon("Área Comum", "area", "", $selectAreacomum, "NAO",12)
                            . $this -> CampoOu(12)
                            . $this -> CampoSelectGliphycon("Bloco", "bloco", "",$selectBlocos, "NAO",6)
                            . $this -> CampoSelectGliphycon("Andar", "andar", "", $selectAndares, "NAO",6)
                            . $this -> CampoOu(12);
                                   
                            $lista = $lista . $this -> CampoCheckBoxV2Tamanho("Meu Apartamento", "apto","N",Auth::user()->apartamento_idapartamento,12);
                               
                            
        $lista = $lista .  $this -> CampoFimPainel()
                        . $this -> montarFormulario("Observações", "obs", "Faça um comentário", "","","", "textarea",12)  
                        . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        $data["formulario"] = $lista;
        
        return $data;
    }
    
    /**
     * TELA DE CADASTRO DE DESPACHO
     * @return string
     */
    public function MontarTelaDespacho($idObjeto,$idSiglaObjeto){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        //echo $seguranca ->decripto($idSiglaObjeto);
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao($seguranca ->decripto($idSiglaObjeto),"sol"));
        
        $selectSolucao = $this -> MontarCombosSolucao(0);       
       
        //$codigoUnico =  $util -> geracaoCodigoUnico("SOL");
                
        $data["formulario"] = $this -> montarFormulario("Ação Tomada", "acatom", "Escolha o Tipo de Negócio", "Por favor, informe o tipo de Categoria Correta.","", $selectSolucao, "select1",4)
                            . $this -> montarFormulario("Observações", "texto", "Faça um comentário", "","","", "textarea",12)  
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        return $data;
    }
    
    public function MontarTelaRamalCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RAM","cad"));
       
        $selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0);  
        $selectAreaComum = $this ->MontarCombosAreaComum($seguranca->cripto(0),"SIM");
          
        $data["formulario"] = $this -> CampoInputValidacaoTamanhoGliphycon("Ramal","ramal","","generico",4)
                             //   $this ->CampoInputValidacaoTamanho("Ramal","ramal","",8)                                                      
                            //. $this -> montarFormulario("Área Comum", "idArea", "Escolha a Área Comum", "Por favor, informe o Área Comum.","", $selectAreaComum, "select1",2)
                            . $this -> CampoSelectGliphycon("Área Comum", "idArea", "casa", $selectAreaComum,"SIM", 2)    
                            //. $this -> montarFormulario("Observações", "comentario", "Faça um comentário", "","","", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "comentario","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        return $data;
    }
    
    public function MontarTelaEventoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
         
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("EVE","cad"));
                
        $selectCategoriaNegocio = $this -> MontarCombosTipoNegocio(0);         
       
                
        $data["formulario"] = $this -> CampoInputValidacaoTamanhoGliphycon("Título","titulo","","generico",12)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Email","email","","email",8)
                            //$this ->CampoInputValidacaoTamanho("Título","titulo","",12)                            
                            //. $this ->CampoInputValidacaoTamanho("Email","email","",8)
                            . $this ->CampoInputTamanhoGliphycon("Telefone","tel","","tel",4)
                            //. $this -> montarFormulario("Observações", "obs", "Faça um comentário", "","","", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
       
        return $data;
    }
    
    public function MontarTelaEntregaCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(1, "cad"," Cadastrar "," Entrega");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ENT","cad"));
        
        $selectCategoriaEntrega = $this -> MontarCombosCategoriaEntrega(0);
        $selectApartamento = $this -> MontarCombosApartamento(0);
             
        $codigoUnico = $util -> geracaoCodigoUnico("ENT");
        $data["formulario"] = $this -> CampoCapturaImagem("Captura de imagem",4);
                            
        $data["formulario2"] =  $this ->CampoInputReadonlyGliphyconV2("Código Único",$codigoUnico,"codUni","trabalho",4)
                            . $this -> CampoInputTamanhoGliphycon("Rastreamento Correio","codCorreio","","trabalho",4)
                            . $this -> CampoSelectGliphycon("Categoria", "catEnt", "trabalho", $selectCategoriaEntrega,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Apartamento", "idApto", "casa", $selectApartamento,"SIM", 4)
                            //. $this -> montarFormulario("", "catEnt", "Escolha a Entrega", "Por favor, informe o Entrega.","", $selectCategoriaEntrega, "select1",4)
                            //. $this -> montarFormulario("Apartamento", "idApto", "Escolha o destino", "Por favor, informe o destino da Entrega.","", $selectApartamento, "select1",4)                            
                            //. $this -> montarFormulario("Observações", "obs", "Faça um comentário", "","","", "textarea",12)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit3",12);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
    /**
     * CADASTRAR AUTORIZACAO
     * @return string
     */
    
    public function MontarTelaAutorizacaoCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
        
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
               
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("AUT","cad"));
        
        //$selectCategoriaEntrega = $this -> MontarCombosCategoriaEntrega(0);
        $selectApartamento = $this -> MontarCombosApartamento(0);
        $selectAutorizacao = $this -> MontarCombosAutorizado(0);
        
        $data["formulario"] = $this ->CampoInputValidacaoTamanhoGliphycon("Início Previsto","data_inicio","","calendar",4)
                            . $this ->CampoInputTamanhoGliphycon("Fim Previsto","data_fim","","calendar",4)
                            . $this ->CampoInputValidacaoTamanhoGliphycon("Autorizado","nome","","user",12)
                            . $this ->CampoInputTamanhoGliphycon("CPF/CNPJ","cpf_cnpj","","",4)
                                                        
                            . $this -> CampoSelectGliphycon("Apartamento", "idApto", "casa", $selectApartamento,"SIM", 4)
                            . $this -> CampoSelectGliphycon("Autorizado?", "idAuto", "", $selectAutorizacao,"SIM", 4)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit3",12);
       //$label,$valorCampo,$tipoCampo,$valorSelect,$requerido,$tamanhoColuna
        /*
         *  $data["formulario"] = $this -> CampoHeader("Dados Pessoais")
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Entrada Condomínio","dtEntrada",$entrada,"calendar",4)
                            . $this -> CampoInputTamanhoGliphycon("Saída Condomínio","dtSaida", $saida,"calendar",4)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Data Nascimento","dtNasc", $data_nasc,"calendar",4)        
                            . $this -> CampoInputValidacaoTamanhoGliphycon("Nome","nome",$nome,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("Cônjuge","conjuge",$conjuge,"user",12)
                            . $this -> CampoInputTamanhoGliphycon("E-mail","email",$email,"email",9)
                            . $this -> CampoInputTamanhoGliphycon("Celular","cel",$cel,"tel",4)
                            . $this -> CampoInputTamanhoGliphycon("Tel.Fixo","tel",$tel,"tel",4)
                            . $this -> CampoSelectGliphycon("É Deficiente?", "ehDeficiente", "deficiente", $selectEhDecifiente, 4)
                                
                            . $this -> CampoInputTamanhoGliphycon("Profissão","profissao",$profissao,"trabalho",10)
                            . $this -> CampoSelectGliphycon("Estado Civil", "estCivil", "", $selectEstadoCivil, 4) 
                            . $this -> CampoSelectGliphycon("Naturalidade Civil", "naturalidade", "bandeira", $selectNaturalidade, 4)  
                            . $this -> CampoSelectGliphycon("Nacionalidade", "nacionalidade", "bandeira", $selectNacionalidade, 4) 
                            . $this -> CampoSelectGliphycon("Escolaridade", "escolaridade", "formacao", $selectEscolaridade, 4) 
                            . $this -> CampoInputReadonlyGliphycon("Proprietário é Morador?", $idEhMorador, "", 4)
                            
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao",$obs,"comentario",12) 
                
                            . $this -> CampoHeader("Documentos")
                            . $this ->CampoInputTamanhoGliphycon("CPF","cpf",$cpf,"doc",6)
                            . $this ->CampoInputTamanhoGliphycon("Cart. Motorista","cartMotorista",$carteiraMotorista,"doc",6) 
                            . $this ->CampoInputTamanhoGliphycon("Título Eleitoral","tituloEleitoral",$titulo,"doc",6)
                            . $this ->CampoInputTamanhoGliphycon("Doc. Identidade","docIdentidade",$docIdent,"doc",6)
                            . $this -> CampoTextAreaGliphycon("Comentário", "obsdoc",$obsDoc,"comentario",12);
         */
        return $data;
    }
    
    public function MontarTelaAreaComumCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
      
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
       // $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("ARE","cad"));        
        $selectCatSIM_NAO = $this -> MontarCombosSIM_NAO(0);
        $selectNumero = $this -> MontarCombosNumeros(0);
                        
        $data["formulario"] = //$this ->CampoInputValidacaoTamanho("Área Comum","areaComum","",12)
                              $this -> CampoInputValidacaoTamanhoGliphycon("Área Comum","areaComum","","trabalho",12)
                              //. $this -> CampoInputValidacaoTamanhoGliphycon("Responsável","responsavel","","user",12)                             
                              //. $this -> CampoSelectGliphycon("<br>Disponível para Reserva?", "dispReserva", "", $selectCatSIM_NAO,"SIM", 4)
                              //. $this -> CampoSelectGliphycon("<br>Cancelamento da reserva(dias)", "maxCanc", "", $selectNumero,"NAO", 4)
                              //. $this -> CampoSelectGliphycon("<br>Inadimplentes podem reservar?", "uniInad", "", $selectCatSIM_NAO,"NAO", 4)                              
                              //. $this -> CampoTextAreaGliphycon("Termo de Uso", "termouso","","comentario",12)
                              . $this -> montarFormulario("Enviar", "", "", "","","","submit",12);
        
        return $data;
    }
    
    //VEICULO VISITANTE
     public function MontarTelaVeiculoVisitanteCadastrar(){
              
        $data = array();
        $util = new \App\Util\Util();        
       
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VEIVIS","cad"));
        
        $selectCatProduto = $this -> montarCombos("catProduto",0);        
        $selectCatVeiculo = $this -> montarCombos("catVeiculo",0);
        $selectApartamento = $this -> MontarCombosApartamento(0);
        $selectCartao = $this -> MontarCombosCartaoEstacionamento(0);//montarCombos("catCartao",0);
                
        $data["formulario"] =  $this -> CampoCapturaImagem("Captura de imagem",4);
        $data["formulario2"] = $this -> CampoInputValidacaoTamanho("Placa Veículo","placa","",4)
                            . $this -> montarFormulario("Categoria Veículo", "catVeiculo", "Escolha a categoria do Veículo", "Por favor, informe a categoria do veículo correta.","", $selectCatVeiculo, "select1",3)
                            . $this -> montarFormulario("Destino", "selApartamento", "Escolha o apartamento", "Por favor, informe o apartamento visitado.","", $selectApartamento, "select1",2)                            
                            . $this -> montarFormulario("Comentários", "descricao", "Digite uma descrição necessária.", "","","", "textarea",12);
        
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
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
    
    
    //VEICULO VISITANTE
     public function MontarTelaReservaCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
       
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
       
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(1, "","Reserva para Salão de Festas "," Reserva para Salão de Festas","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("RES",""));
        
        //$selectVagaGaragem = $this -> MontarCombosVagaGaragem(0);//montarCombos2("catVagaGaragem", $vagaGaragem ->consultarVagaGaragem());
        $selectApartamento = $this -> MontarCombosApartamento(0);
        $selectBlocos = $this -> MontarCombosBlocoApartamento(0);

        $selectMotivoSalao = $this -> MontarCombosMotivoAluguelSalaoFestas(0);//montarCombos("catCartao",0);
        $selectAreaComum = $this -> MontarCombosAreaComum($seguranca -> cripto(0),"S");
        
        $data["formulario"] = $this -> CampoInputReadonlyTamanho("Código","codigo",$util -> GeracaoCodigoUnicoControle("RES", date("m").date("s")+10),4)
                            . $this -> CampoInputValidacaoFunctionTamanho("Data","dataReserva","","onchange='javascript:verificar_data_disponivel()'",4)                            
                            
                            . $this -> montarFormulario("Ocasião", "selMotivo", "Selecione o motivo", "Por favor, informe o motivo da seleção.","", $selectMotivoSalao, "select1",4)                            
                
                            //. $this -> CampoSelectValidacao("", "selAreaComum", $selectAreaComum,4) 
                            . $this -> CampoSelectFunctionGliphycon("Setor Condomínio", "selAreaComum","",$selectAreaComum,"SIM","onchange='javascript:verificar_data_disponivel()'",6)
                            //. $this -> CampoSelectValidacao("Bloco", "selBloco", $selectBlocos,4) 
                            . $this -> CampoSelectFunctionGliphycon("Bloco", "selBloco","",$selectBlocos,"SIM","onchange='javascript:verificar_data_disponivel()'",6)
                            //. $this -> CampoSelectFunction("Conta", "conta", "Escolha a Categoria da Conta", "Por favor, informe a Categoria da Conta correta.","", $selectContas, "select1","onchange='javascript:pesquisa_sub_conta()'",2)
                           
                            /*. $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1")*/
                            //. $this -> montarFormulario("Comentário", "comentario", "Digite uma descrição necessária.", "","","", "textarea",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit2",12);

                            
         $data["formulario2"] =  $this -> CampoCheckBoxValidacaoTamanho("", "acordo","<center><font size='4'>Declaro que as informações acima estão corretas e que estou ciente de que qualquer erro nos dados implicará na NÃO aprovação da reserva ou no seu cancelamento, de acordo com as regras da convenção do condomínio!</font></center>" , 12);
                           
        
        return $data;
    }
    
    
     //VEICULO VISITANTE
     public function MontarTelaVisitanteCadastrar(){
              
        $data = array();
                
        $util = new \App\Util\Util();        
     
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
              
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(1, "cad","Visitante "," Visitante");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("VIS","cad"));        
        $selectApartamento = $this ->MontarCombosApartamento(0);
                      
        $data["formulario"] = $this -> CampoCapturaImagem("Captura de imagem",4);
                            
        $data["formulario2"] = $this -> CampoInputValidacaoTamanhoGliphycon("Visitante","nomeVisitante","","user",12)
                            //. $this -> CampoInputValidacaoTamanho("Visitante","nomeVisitante","",7)
                            . $this -> CampoInputValidacaoTamanhoGliphycon("CNPJ_CPF","cnpj_cpf","","doc",4)
                            //. $this -> CampoInputValidacaoTamanho("CNPJ_CPF","cnpj_cpf","",3)
                            //. $this -> montarFormulario("Destino", "selApartamento", "Escolha o apartamento", "Por favor, informe o apartamento visitado.","", $selectApartamento, "select1",2)                            
                            . $this -> CampoSelectGliphycon("Destino", "selApartamento", "trabalho", $selectApartamento,"SIM", 4)
                            //. $this -> montarFormulario("Descrição", "obs", "Digite uma descrição necessária.", "","","", "textarea",12);
                            . $this -> CampoTextAreaGliphycon("Comentário", "obs","","comentario",12)
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit3",12);
        /*
        $data["anexo"] =     $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",2)
                             . $this -> montarFormulario("Enviar", "", "", "","","","submit",2);
         */                
        $data["botaoVoltar"] = $this -> MontaBotaoVoltar();
        
        return $data;
    }
    
    public function MontarTelaDocumentosCadastrar($idObjeto,$tipoDonoDocumento){
              
        $data = array();                
        $util = new \App\Util\Util();        
        
        //DESCRICAO DA DATEGORIA DE DOCUMENTO
        /*$categoriaDocumento = new \App\Classes\CategoriaDocumentoModel();
        $categoria_documento = $categoriaDocumento -> recuperaDescricaoCategoriaDocumento($id);*/
        $controleTela = new \App\Http\Controllers\Master\ControleSistema\ControleTelaController();
        
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $id_cripto = $seguranca -> decripto($idObjeto);
        //$rotulo_decripto = $seguranca -> decripto($rotulo);
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        //$data = $controleTela -> PrepararArrayData(75, "cad","Documento","Documentos ","nor");
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao("DOC","cad"));
        
        //MONTAR FORMULARIO
        //COMBOS DA TELA
        $selectCatProduto = $this -> montarCombos("catProduto",0);        
        $selectSigilo = $this -> montarCombos("sigilo",0);
        $selectCategoriaDocumento = $this -> montarCombos("catDocumento", $idObjeto);
                
        $data["formulario"] =  $controleTela -> montarFormulario("Categoria", "categoria", "Escolha o Categoria do Documento", "Por favor, informe a Categoria do Documento correto.","", $selectCategoriaDocumento, "select1",4)
                            . $this -> CampoTextAreaGliphycon("Comentário", "descricao","","comentario",12)
                            . $this -> montarFormulario("", "val", "", "",$idObjeto, "", "hidden",0)
                            . $this -> montarFormulario("", "val2", "", "",$tipoDonoDocumento, "", "hidden",0)
        
                            . $this -> montarFormulario("Anexo", "anexo1", "Digite o Endereço", "Por favor, informe o Endereço correto.", "", "", "file",12)
                             
                            . $this -> montarFormulario("Enviar", "", "", "","","","submit2",12);
                            /*. $this -> montarFormulario("Enviar", "", "", "","","","submit",1)
                            . $this -> montarFormulario("Voltar", "", "", "","","","voltar",1);*/
                         
        $data["botaoFechar"] = $this -> MontaBotaoFechar();
        
        return $data;
        
    }
    
    
    /**
     * OBJETIVO: Tela de consultar anexo.
     * @param type $id
     * 
     */
    public function TelaAnexoConsultar($id){
    
        
        
        
        
        
    }
    
     
    //CONTROLE DE ACESSO E BARRA DE FUNCIONALIDADE
    public function PrepararArrayData($menu_link,$atividade,$funcionalidade,$categoria_objeto,$menuAtivo){
            
            $data = array();
            
            $util = new \App\Util\Util();                        
                        
            //CONTROLE DE ACESSO
            $controleAcesso = new \App\Http\Controllers\Master\ControleSistema\ControleAcessoController();
            $data = $controleAcesso -> montarControleAcesso($menu_link, $atividade);     // 1 - documentos(menu Link)   

            //MONTA LINK BLADE PARA APRESENTAÇÃO
            $operacionalController = new \App\Http\Controllers\Master\ControleSistema\OperacionalController();
            $data["linha"] = $operacionalController -> montaNomeLinkBlade($menuAtivo);

            //BARRA DE FUNCIONALIDADE
            $data["barra_funcionalidade"] =  $util -> montagem_barra_funcionalidade($util->DevolveFuncionalidadeExtenso($atividade),$funcionalidade,$categoria_objeto);

            return $data;
            
    }
    
    //CONTROLE DE ACESSO E BARRA DE FUNCIONALIDADE
    public function ControleAcessoApresentacao($vetor){
            
            $data = array();
            $parametros = array();
            $parametros = $vetor;            
            
            $util = new \App\Util\Util();                        
                    
            //CONTROLE DE ACESSO
            $controleAcesso = new \App\Http\Controllers\Master\ControleSistema\ControleAcessoController();
            $data = $controleAcesso -> montarControleAcessoNovo($parametros["menu_link_secao"], $parametros["atividade"]);     // 1 - documentos(menu Link)   

            //MONTA LINK BLADE PARA APRESENTAÇÃO
            $operacionalController = new \App\Http\Controllers\Master\ControleSistema\OperacionalController();
            $data["linha"] = $operacionalController -> montaNomeLinkBlade($parametros["menuAtivo"]);
          
            $anexoModel = new \App\Classes\AnexoModel();        
            $usuario = new \App\Classes\UsuarioModel();
            $item = $usuario -> RecuperarInfoApresentacao(Auth::user()->idusuario,"USU"); 
            if(isset($item) && $item != "")
            {    
                $anexo = $anexoModel -> consultaAnexo2(Auth::user()->idusuario,"USU");
                $data["usuario"] = $item -> apelido; 
                $data["condominio"] = $item -> CmpRazaoSocial; 
                if(isset($anexo)){
                    $data["usuarioIMG"] = "clientes/".$item -> CmpValor."/usuario/".$anexo -> CmpAnexo;
                }else{
                    $data["usuarioIMG"] = "img/silhueta.png";
                }
            }
                        
            /*$menuCondominio = new \App\Http\Controllers\AdministracaoDagoba\MenuCondominio\MenuCondominioController();
            //$data = $menuCondominio -> ConsultarInfApresentacaoMenu(Auth::user()->condominio_idcondominio, Auth::user()->perfil_idperfil);
            $lista = $menuCondominio -> ConsultarInfMenuCondominioAll(Auth::user()->condominio_idcondominio);
                    
            foreach($lista as $item){

                if(Auth::user()->perfil_idperfil == 1){
                    $perfil = $item->CmpMor;
                }
                if(Auth::user()->perfil_idperfil == 2){
                    $perfil = $item->CmpAdm;
                }
                if(Auth::user()->perfil_idperfil == 3){
                    $perfil = $item->CmpOpe;
                }
                if(Auth::user()->perfil_idperfil == 6){
                    $perfil = $item->CmpPor;
                }

                $data[$item->CmpPage] = $perfil;

            }*/
            
            $menuCondominioModel = new \App\Classes\MenuCondominioModel();
            $data["menu"] = $menuCondominioModel -> MontarMenuDinamico();
        
            //echo $parametros["atividade"] ." - ". $parametros["funcionalidade"] ." - ". $parametros["categoria_objeto"];
            //BARRA DE FUNCIONALIDADE
            $data["barra_funcionalidade"] =  $util -> montagem_barra_funcionalidade($util->DevolveFuncionalidadeExtenso($parametros["atividade"]),$parametros["funcionalidade"],$parametros["categoria_objeto"]);

            return $data;
            
    }
    
    /**
     * 
     * 
     */
    public function PrepararDetalhe($campo1,$campo2,$campo3){
        
        if($campo1 != "" && $campo2 != "" && $campo3 != "" ){            
 
            return "<div class='row'>
                    <div class='col-lg-12'>
                        <!-- /.table-responsive -->
                       <div class='panel panel-default'>
                            <div class='panel-heading'>
                                Documentos pertencente ao <b>".$campo1."</b>
                            </div>
                            <div class='panel-body'>                 
                                <div class='col-lg-2'> 
                                    <div class='form-group'>
                                        <label for='inputEmail' class='control-label'>Cadastro</label>
                                        <input type='text' readonly class='form-control' value='".$campo2."'>
                                    </div>
                                </div>
                                <div class='col-lg-10'> 
                                    <div class='form-group'>
                                       <label for='inputEmail' class='control-label'>Nome</label>
                                        <input type='text' readonly class='form-control'  length='150' value='".$campo3."'>
                                    </div>
                                </div>                            

                            </div>    
                       </div>
                     </div>    
                </div>";
        }else{
            return "";
        }
    }
    
    public function PrepararDetalheCompleto($funcionalidade,$campoLabel1,$campoLabel2,$msg,$label1,$label2){
        
        if($funcionalidade != "" && $campoLabel1 != "" && $campoLabel2 != "" ){            
 
            return "<div class='row'>
                    <div class='col-lg-12'>
                        <!-- /.table-responsive -->
                       <div class='panel panel-default'>
                            <div class='panel-heading'>
                                ".$msg." <b>".$funcionalidade."</b>
                            </div>
                            <div class='panel-body'>                 
                                <div class='col-lg-2'> 
                                    <div class='form-group'>
                                        <label for='inputEmail' class='control-label'>".$label1."</label>
                                        <input type='text' readonly class='form-control' value='".$campoLabel1."'>
                                    </div>
                                </div>
                                <div class='col-lg-10'> 
                                    <div class='form-group'>
                                       <label for='inputEmail' class='control-label'>".$label2."</label>
                                        <input type='text' readonly class='form-control'  length='150' value='".$campoLabel2."'>
                                    </div>
                                </div>                            

                            </div>    
                       </div>
                     </div>    
                </div>";
        }else{
            return "";
        }
    }
    
    
     /**
     * TELA CONSULTAR PADRAO
     */
    
    public function TelaConsultar($FUNCIONALIDADE){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $objeto = new \App\Classes\ObjetoModel();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao($FUNCIONALIDADE,"con"));
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_objeto"] = $objeto -> ConsultarObjeto($FUNCIONALIDADE);        
        
        return $data;
    }
    
    //**TELA CADASTRAR
    
    public function TelaCadastrar($FUNCIONALIDADE){
     
        $data = array();                
        $util = new \App\Util\Util();      
     
        $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
        $objeto = new \App\Classes\ObjetoModel();
        
        //DEVOLVE O CONTROLE DE ACESSO E O NOME DA BLADE
        $data = $this -> ControleAcessoApresentacao($util -> ParametrosControleAcessoApresentacao($FUNCIONALIDADE,"con"));
        
        //LISTA DE APARTAMENTOS CONFIGURADA
        $data["lista_objeto"] = $objeto -> ConsultarObjeto($FUNCIONALIDADE);        
        
        return $data;
    }
    
    
    
    //MONTAGEM DOS RELATÓRIOS
      public function MontagemRelatorioInventario(Request $request){
     
            $i = 0; 
      
            $data = array();                
            $util = new \App\Util\Util();      
            //GRADE DE SEGURANCA
            $seguranca = new \App\Http\Controllers\Master\ControleSistema\SegurancaController();
            
            $total = $request->input("tot");        
        
            $sql = "<table > 
                                        <thead>
                                            <tr>   
                                                    <th>Aquisição</th>
                                                    <th>Localização</th>
                                                    <th>Bem</th>                                                
                                                    <th>Valor</th>
                                                    <th>Total</th>                                            

                                            </tr>
                                        </thead>
                                        <tbody>";
                                            
                                             for ($i = 0; $i < $total; $i++){

                                                        $sql = $sql . "<tr class='odd gradeX'> 
                                                            <td width='100'>". $seguranca -> decripto($request->input("val_".$i)) ."</td>
                                                            <td>". $seguranca -> decripto($request->input("val_".$i)) ."</td>
                                                            <td>". $seguranca -> decripto($request->input("val_".$i)) . "</td>
                                                            
                                                        </tr>";

                                            }   
                                            
                                        $sql = $sql . "</tbody>
                                    </table>";

        
            return $sql;
       
    }
    
    public function MontaBotaoVoltar(){
        return "<button class='btn btn-primary' value='Voltar' onClick='history.go(-1)'>Voltar</button>"; 
    }
    
    public function MontaBotaoFechar(){
        return "<button class='btn btn-primary' value='Voltar' onClick='window.close();'><font color='white'>Fechar</font></button>"; 
    }
    
    
    public function TelaRedeSocial($Redator,$dataInclusao,$texto,$listaNoticias2,$idNoticias){
        
        $lista =  "<div class='col-lg-12'>
                                        <div class='panel panel-green'>
                                            <div class='panel-heading'>
                                                <table border='0' width='100%'>
                                                    <tr><td width='8%'><img class='img-responsive img-hover' src='' alt='' width='40'></td>
                                                        <td> <b>".$Redator."</b> </td>
                                                        <td align='right'> <i class='fa fa-clock-o'></i> Postado em <b>".$dataInclusao."</b> </td>
                                                    </tr> 
                                                </table>
                                            </div>
                                                <div class='panel-body'>
                                                      <!-- First Blog Post -->
                                                                    <div >
                                                                        <center>
                                                                            <P><P><P><P>
                                                                            <img class='img-responsive img-hover' src='' alt=''> 
                                                                        </center>  
                                                                    </div>
                                                                    <div class='panel-body'>
                                                                        <h4><p><h4><p align='justify'> <i class='fa fa-comment-o'></i>".$texto." </p> <!--<a href='#'> Curtir</a> -->
                                                                            </h4></p></h4>";                                                                        

                                                                            if(isset($listaNoticias2))
                                                                            {    
                                                                                foreach($listaNoticias2 as $item2)
                                                                                {    
                                                                                    if($idNoticias == $item2 -> idnoticiasrelacionado && $item2 -> CmpTipoObjeto == "RES")
                                                                                    {    
                                                                                        
                                                                                                    $lista = $lista . "<div class='panel panel-green'>
                                                                                                        <div class='panel-heading'>
                                                                                                            <table border='0' width='100%'>
                                                                                                                <tr><td width='8%'><img class='img-responsive img-hover' src='' alt='' width='40'></td>
                                                                                                                    <td> <b>".$item2 -> CmpRedator." </b> </td>
                                                                                                                    <td align='right'> <i class='fa fa-clock-o'></i> Postado em <b>".$item2->CmpDataInclusao."</b> </td>
                                                                                                                </tr> 
                                                                                                            </table>
                                                                                                        </div>
                                                                                                        <div class='panel-body'>
                                                                                                                
                                                                                                                <P>
                                                                                                                <table border='0' width='100%'>                                                    
                                                                                                                    <tr><td>&nbsp;</td><td cols='3'><p align='justify'><i class='fa fa-comment'></i> {{$item2 -> CmpTexto}}</p></td></tr>
                                                                                                                    <tr><td>&nbsp;</td><td cols='3'>&nbsp</td></tr>
                                                                                                                </table>
                                                                                                        </div>                                                
                                                                                                    </div>";
                                                                                                         
                                                                                        
                                                                                    }
                                                                                }
                                                                            }        
                                                                         
                                                                        
                                                                        $lista = $lista . "<div class='col-lg-12'>
                                                                            <div class='panel panel-success'>
                                                                                <div class='panel-heading'>
                                                                                    Comentar
                                                                                </div>
                                                                                    <div class='panel-body'>

                                                                                            <form method='post' id='registration-form' data-toggle='validator' enctype='multipart/form-data'>
                                                                                                     <div class='col-lg-12'> 
                                                                                                         <div class='form-group'>
                                                                                                             
                                                                                                             <textarea name='obsNoticia' rows='2' class='form-control' placeholder='Escreva seus comentários aqui' type='text' data-error=''></textarea>
                                                                                                             <div class='help-block with-errors'></div>                                
                                                                                                             <input type='hidden' name='op' value='valout' />
                                                                                                             <input type='hidden' name='notres' value='".$idNoticias."' />

                                                                                                         </div>  
                                                                                                         {{csrf_field()}}
                                                                                                         <p align='right'>
                                                                                                             <input type='submit' value='Publicar' class='btn btn-success'>                                                
                                                                                                         </p>
                                                                                                     </div>
                                                                                            </form>

                                                                                    </div>                                                
                                                                                </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                        
                                                </div>                                                
                                            </div>
                                    </div>";
    }
    
    
    //CONSTRUÇÃO DE TELA DE INDICADORES DE DESEMPENHO
    public function CaixaIndicador($label,$bandeira,$quantidade,$acao){
        
    
        return "<div class='col-lg-3 col-md-6'>
            <div class='panel panel-".$bandeira."'>
                <div class='panel-heading'>
                    <div class='row'>
                        <div class='col-xs-3'>
                            <i class='fa fa-comments fa-5x'></i>
                        </div>
                        <div class='col-xs-9 text-right'>
                            <div class='huge'>".$quantidade."</div>
                            <div>".$label."</div>
                        </div>
                    </div>
                </div>
                <a href='https://www.gs2i.com.br/gs2i-homologacao/public/master/".$acao."'>
                    <div class='panel-footer'>
                        <span class='pull-left'>Detalhes</span>
                        <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                        <div class='clearfix'></div>
                    </div>
                </a>
            </div>
        </div>";
    }   
    
    public function CaixaIndicadorConsumo($label,$indicador,$cor,$tamanho){
        
        return "<div class='col-lg-".$tamanho."'>
                <div class='panel panel-".$cor."'>
                    <div class='panel-heading'>
                        ".$label."
                    </div>                
                    <div class='panel-body'>
                        <div id='".$indicador."'></div>
                    </div>                
                    </div>            
                </div>";
    }
    
    /**
     * 
     * @param type $label
     * @param type $itens
     * @return type
     * 
     * CONSTRUIR MENU
     *
     */
    public function CmpConstruirMenu($label,$itens){
    
            //if
            return "<li>
                        <a href='#'>
                            <i class='fa fa-building-o fa-fw'></i> ".$label."<span class='fa arrow'></span></a>
                            <ul class='nav nav-second-level'>
                            ".$itens."
                            </ul>
                    <li>";
        
    }
     
    public function CmpConstruirItens($label,$funcao){
        return  "<li>
                    <a href='https://www.gs2i.com.br/gs2i-homologacao/public/master/".$funcao."'>".$label."</a>
                </li>";
    }
    
    
    /**
     * 
     * @param type $idtipo
     * MENU PRINCIPAL
     */
    public function MontarMacroMenu($idtipo){
                           
        switch ($idtipo) {
            case "cnd":
                return "S";
                break;
            case "com":
                return "S";
                break;
            case "rh":
                return "S";
                break;
            case "aqu":
                return "N";
                break;
            case "fin":
                return "S";    
                break;
            case "mnt":
                return "S";
                break;
            case "rel":
                return "S";
                break;            
            
        }        
       
    }
    
    public function DescreverMacroMenu($idtipo){
                           
        switch ($idtipo) {
            case "cnd":
                return "Condomínio";
                break;
            case "com":
                return "Comunicação";
                break;
            case "rh":
                return "RH";
                break;
            case "fin":
                return "Financeiro";    
                break;
            case "mnt":
                return "Manutenção";
                break;
            case "rel":
                return "Relatório";
                break;
            case "aqu":
                return "Aquisição";
                break;   
            case "pai":
                return "Home";
                break;   
            default:
                return "TESTE";
                break;
            
        }        
       
    }
  
}
