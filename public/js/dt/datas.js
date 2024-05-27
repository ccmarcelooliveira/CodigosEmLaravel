    /**
     * Valida uma data passada
     * @param string dia
     * @param string mes
     * @param string ano
     * @return Bool TRUE em caso de data vÃ¡lida, do contrÃ¡rio FALSE
     */
     function checkDate(dia,mes,ano){
     	var dateRegExp =/^(19|20)\d\d-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])$/;
        if (!dateRegExp.test(ano+"-"+mes+"-"+dia)) return false; // formato invÃƒÂ¡lido
        if (dia == 31 && ( /^0?[469]$/.test(mes) || mes == 11) ) {
            return false; // dia 31 de um mes de 30 dias
        }else if (dia >= 30 && mes == 2) {
            return false; // mais de 29 dias em fevereiro
        }else if (mes == 2 && dia == 29 && !(ano % 4 == 0 && (ano % 100 != 0 || ano % 400 == 0))) {
            return false; // dia 29 de fevereiro de um ano nÃ£o bissexto
        }else {
            return true; // Data vÃ¡lida
        }
    }


     /**
     * Valida uma hora passada
     * @param int h Hora
     * @param int m Minuto
     * @param int s Segundo
     * @return Bool TRUE em caso de horÃ¡rio vÃ¡lido, do contrÃ¡rio FALSE
     */    
    function checkTime(h,m,s){
    	if(!s) s='00';
		var horarioRegExp = /^(0?\d|1\d|2[0-3]):[0-5]?\d:[0-5]?\d$/;
        return horarioRegExp.test(h+":"+m+":"+s);
    }

     /**
     * Valida uma string de data passada
     * @param String data Uma string representando uma data
     * @param String formato O formato em que a data passada se encontra [default = (d/m/Y) + H:i:s 
     * @return Bool TRUE em caso de data/hora vÃ¡lida, do contrÃ¡rio FALSE 10/10/1010
     */ 
	function parseDate(data,formato)
	{
		   
            if(data.length == 10){
                    
                if(!formato) 
                {			
                                var mes = 2;
                                var dia = 1;
                                var ano = 3;
                }
                else
                {
                                // SerÃ¡ usado o formato passado no segundo argumento
                                formato = formato.toLowerCase().replace(/[^dmy]/g,'');
                                var dia = formato.indexOf('d')+1;
                                var mes= formato.indexOf('m')+1;
                                var ano= formato.indexOf('y')+1;	
                }


                var matches = data.match(/^\b(\d+)\D(\d+)\D(\d+)\b\b(?:\s+(\d{1,2})\D(\d{2})\D*((\d{2})?))?\b$/);	


                // validando a data 
                if (!checkDate(matches[dia],matches[mes],matches[ano]))
                {
                    return false;
                }             
                else
                {
                    return true;
                }
            }else{
                    return false;
            }    
	}


	function VerificaData(data,nomeCampo){
            if(parseDate(data,'d/m/Y')){
                    //alert('Data válida');
            }else{        
                    alert('Data inválida');
                    document.getElementById(nomeCampo).value= "";
            }
	}
        
        function DiffData(data1,data2, nomeCampo){
            alert(data1 + '--'+data2 );
            
           //alert("teste "+ date_diff_indays(data1,data2));
          
	}
        
        
	
	

 
        
        
        