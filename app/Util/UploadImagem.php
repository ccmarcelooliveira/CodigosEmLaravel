<?php

namespace app\Util;

class UploadImagem{

        public $width; // Definida no arquivo index.php, ser� a largura m�xima da nossa imagem
        public $height; // Definida no arquivo index.php, ser� a altura m�xima da nossa imagem
        protected $tipos = array("jpeg", "png", "gif"); // Nossos tipos de imagem dispon�veis para este exemplo

        // Fun��o que ir� redimensionar nossa imagem
        protected function redimensionar($caminho, $nomearquivo,$novo_nome){
            
            // Determina as novas dimens�es
            $width = $this->width;
            $height = $this->height;

            
            // Pegamos a largura e altura originais, al�m do tipo de imagem
            list($width_orig, $height_orig, $tipo, $atributo) = getimagesize($caminho.$nomearquivo);

            // Se largura � maior que altura, dividimos a largura determinada pela original e multiplicamos a altura pelo resultado, para manter a propor��o da imagem
            if($width_orig > $height_orig){
                $height = ($width/$width_orig)*$height_orig;
            // Se altura � maior que largura, dividimos a altura determinada pela original e multiplicamos a largura pelo resultado, para manter a propor��o da imagem
            } elseif($width_orig < $height_orig) {
                $width = ($height/$height_orig)*$width_orig;
            } // -> fim if
            //
            
            //echo "TIPO ". $tipo;
            //echo $caminho.$nomearquivo;
            // Criando a imagem com o novo tamanho
            $novaimagem = imagecreatetruecolor($width, $height);
            switch($tipo){

            // Se o tipo da imagem for gif
            case 1:
                //echo "1";
                // Obt�m a imagem gif original
                $origem = imagecreatefromgif($caminho.$nomearquivo);
                // Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                // Envia a nova imagem gif para o lugar da antiga
                imagegif($novaimagem, $caminho.$novo_nome.".gif");
            break;

            // Se o tipo da imagem for jpg
            case 2:
                //echo "JPG";
                // Obt�m a imagem jpg original
                $origem = imagecreatefromjpeg($caminho.$nomearquivo);
                // Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                // Envia a nova imagem jpg para o lugar da antiga
                imagejpeg($novaimagem, $caminho.$novo_nome.".jpg");
            
            break;

            // Se o tipo da imagem for png
            case 3:
                //echo "3";
                // Obt�m a imagem png original
                $origem = imagecreatefrompng($caminho.$nomearquivo);
                // Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                // Envia a nova imagem png para o lugar da antiga
                imagepng($novaimagem, $caminho.$novo_nome.".png");
            
            break;
            } // -> fim switch

            
            
            // Destr�i a imagem nova criada e j� salva no lugar da original
            imagedestroy($novaimagem);
            //APAGA, DEFINITIVAMENTE, O ARQUIVO DA BASE
            unlink($caminho.$nomearquivo);
            // Destr�i a c�pia de nossa imagem original
            imagedestroy($origem);
            //unlink($origem);
        } // -> fim function redimensionar()

        protected function tirarAcento($texto){
                // array com letras acentuadas
                $com_acento = array('�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','O','�','�','�','�',);
                // array com letras correspondentes ao array anterior, por�m sem acento
                $sem_acento = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y',);
                // procuramos no nosso texto qualquer caractere do primeiro array e substitu�mos pelo seu correspondente presente no 2� array
                $final = str_replace($com_acento, $sem_acento, $texto);
                // array com pontua��o e acentos
                $com_pontuacao = array('�','`','�','^','~',' ','-');
                // array com substitutos para o array anterior
                $sem_pontuacao = array('','','','','','_','_');
                // procuramos no nosso texto qualquer caractere do primeiro array e substitu�mos pelo seu correspondente presente no 2� array
                $final = str_replace($com_pontuacao, $sem_pontuacao, $final);
                // retornamos a vari�vel com nosso texto sem pontua��es, acentos e letras acentuadas
                return $final;
        } // -> fim function tirarAcento()

        // Fun��o que ir� fazer o upload da imagem
        public function salvar($caminho, $file, $novo_nome){

            $mensagem = "";    
            
            // Retiramos acentos, espa�os e h�fens do nome da imagem
            $file['name'] = $this->tirarAcento(($file['name']));
            
            // Atribu�mos caminho e nome da imagem a uma vari�vel apenas
            $uploadfile = $caminho.$file['name'];

            $teste =  explode('/', $file['type']);
            
            if(count($teste) >= 2){ //TESTE PARA DETERMINAR SE O VETOR TERM O TAMANHO DESEJADO.
                
                if($teste[0] != "image"){ //TESTE PARA DETERMINAR SE É UMA IMAGEM
                    
                    $mensagem = "<font color='#F00'>Envie apenas imagens no formato jpeg, png ou gif, com menos de 1MB de tamanho!</font>";
                    return $mensagem;
                }else{
                    $tipo = $teste[1];
                    //TESTE PARA DETERMINAR SE ESTÁ NO DENTRO DO VETOR.
                    if (array_search($tipo, $this->tipos) === false) {
                        $mensagem = "<font color='#F00'>Envie apenas imagens no formato jpeg, png ou gif, com menos de 1MB de tamanho!</font>";
                        return $mensagem;
                    }                    
                }
                              
            }else{
                $mensagem = "<font color='#F00'>Envie apenas imagens no formato jpeg, png ou gif, com menos de 1MB de tamanho!</font>";
                return $mensagem;
            }    
            
            
            // Se a imagem tempor�ria n�o for movida para onde a vari�vel com caminho e nome indica, exibiremos uma mensagem de erro
            if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
                
                switch($file['error']){
                    case 1:
                    $mensagem = "<font color='#F00'>O tamanho do arquivo � maior que o tamanho permitido.</font>";
                    break;
                    case 2:
                    $mensagem = "<font color='#F00'>O tamanho do arquivo � maior que o tamanho permitido.</font>";
                    break;
                    case 3:
                    $mensagem = "<font color='#F00'>O upload do arquivo foi feito parcialmente.</font>";    
                    case 4:
                    $mensagem = "<font color='#F00'>N�o foi feito o upload de arquivo.</font>";
                    break;  
                } // -> fim switch

            // Se a imagem tempor�ria for movida
            } /* -> fim if */ 
            else{
                       
                //echo $uploadfile;
                // Pegamos sua largura e altura originais
                list($width_orig, $height_orig) = getimagesize($uploadfile);
                
                // Chamamos a fun��o que redimensiona a imagem
                $this->redimensionar($caminho, $file['name'],$novo_nome);
                
        // Exibiremos uma mensagem de sucesso
        $mensagem = "<a href='".$uploadfile."'><font color='#070'>Upload realizado com sucesso!</font><a>";
        } // -> fim else

        // Retornamos a mensagem com o erro ou sucesso
        return $mensagem;

        } // -> fim function salvar()
} // -> fim classe
?>