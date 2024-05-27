function seguranca(campo) {
               
                var contador = 0;
                teste = document.getElementById(campo).value;
                teste = teste.toLowerCase();
               
                if(teste.indexOf("select") != -1) contador++;
                if(teste.indexOf("'") != -1) contador++;
                if(teste.indexOf("from") != -1) contador++;
                if(teste.indexOf("insert") != -1) contador++;
                if(teste.indexOf("into") != -1) contador++;
                if(teste.indexOf("count") != -1) contador++;
                if(teste.indexOf("max") != -1) contador++;
                if(teste.indexOf("delete") != -1) contador++;
                if(teste.indexOf("drop") != -1) contador++;
                //if(teste.indexOf("`") != -1) contador++;
                //if(teste.indexOf("+") != -1) contador++;
                //if(teste.indexOf("@") != -1) contador++;
                //if(teste.indexOf("#") != -1) contador++;
                //if(teste.indexOf("$") != -1) contador++;
                //if(teste.indexOf("%") != -1) contador++;
                if(teste.indexOf("union") != -1) contador++;             
                
                //if(teste.indexOf("*") != -1) contador++;                
                //if(teste.indexOf("?") != -1) contador++;
                //if(teste.indexOf("-") != -1) contador++;                
                if(teste.indexOf("1=1") != -1) contador++;
                if(teste.indexOf("1 = 1") != -1) contador++;
                if(teste.indexOf("1= 1") != -1) contador++;
                if(teste.indexOf("1 =1") != -1) contador++;                
              
                if(contador > 0){
                    document.forms['form'].elements['enviar'].disabled = true;                 
                    alert("Seu texto contem palavras e/ou caracteres restritos!!"); 
                }else{
                    document.forms['form'].elements['enviar'].disabled = false; 
                }
            }