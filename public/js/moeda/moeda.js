function moeda(z){
    v = z.value;
    v=v.replace(/\D/g,"") // permite digitar apenas numero
    v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
    v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
    v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
    v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
    v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
    z.value = v;
}

function formatarMoeda(valor, casas, separdor_decimal, separador_milhar){ 
 
 var valor_total = parseInt(valor * (Math.pow(10,casas)));
 var inteiros =  parseInt(parseInt(valor * (Math.pow(10,casas))) / parseFloat(Math.pow(10,casas)));
 var centavos = parseInt(parseInt(valor * (Math.pow(10,casas))) % parseFloat(Math.pow(10,casas)));
 
  
 if(centavos%10 == 0 && centavos+"".length<2 ){
  centavos = centavos+"0";
 }else if(centavos<10){
  centavos = "0"+centavos;
 }
  
 var milhares = parseInt(inteiros/1000);
 inteiros = inteiros % 1000; 
 
 var retorno = "";
 
 if(milhares>0){
  retorno = milhares+""+separador_milhar+""+retorno
  if(inteiros == 0){
   inteiros = "000";
  } else if(inteiros < 10){
   inteiros = "00"+inteiros; 
  } else if(inteiros < 100){
   inteiros = "0"+inteiros; 
  }
 }
 retorno += inteiros+""+separdor_decimal+""+centavos;
 
 
 return retorno;
 
}
    
    function formatar(texto){
        if(texto != ''){
            texto = texto.replace('.', '');
            texto = texto.replace(',', '.');
           
            texto = parseFloat(texto);
            //alert('format ' + s1);            
        }
        return texto;
    }
    
    function somarTotal(){
        
        
        //alert(total_receita);
        var total_rec;
        var contador_receita =0;
        var total_vetor2 = 0, total_vetor = 0;
        
        //RECEITA
        var total_receita =  document.getElementById("total_receita").value;
        if(total_receita > 0){
            meuVetor1 = new Array (total_receita);
        }        
        for (i = 0; i < total_receita; i++) {
            indice2 = i+1;            
            meuVetor1[i] = formatar(document.getElementById("total_r_"+indice2).value);           
        }    
        if(total_receita > 0){
            total_vetor2 = meuVetor1[0];
            for (j = 1; j < total_receita; j++) {
                if(meuVetor1[j] != null && meuVetor1[j] != ''){
                    total_vetor2 = total_vetor2 + meuVetor1[j];
                    //alert(total_vetor2);
                }    
            }
            
            document.getElementById("total_valor_receita").value = formatarMoeda(total_vetor2,2,',','.');
            //alert('Total Receita' + document.getElementById("total_valor_receita").value); 
            
        }    
        
        //DESPESA
        var total_despesa =  document.getElementById("total_despesa").value;
        if(total_despesa > 0){
            meuVetor = new Array (total_despesa);
        }
                
        for (j = 0; j < total_despesa; j++) {
            indice = j+1;
            //alert(indice);
            //alert(document.getElementById("total_d_"+indice).value);
            meuVetor[j] = formatar(document.getElementById("total_d_"+indice).value);
            //alert('vetor ' + meuVetor[j]);
        }    
        
        if(total_despesa > 0){
            total_vetor = meuVetor[0];
            for (j = 1; j < total_despesa; j++) {
                if(meuVetor[j] != null && meuVetor[j] != ''){
                    total_vetor = total_vetor + meuVetor[j];
                }    
            }
            
            document.getElementById("total_valor_despesa").value = formatarMoeda(total_vetor,2,',','.');
            //alert('Total Despesa' + document.getElementById("total_valor_despesa").value);   
        }    
        
        document.getElementById("saldo").value = total_vetor2 - total_vetor;
        //alert('Saldo ' + document.getElementById("saldo").value);
        
        document.getElementById("resultadoSinal").value = Math.sign(total_vetor2 - total_vetor);
        //alert('Sinal ' + document.getElementById("resultadoSinal").value);
        //alert('teste');
        //alert(Math.sign(total_vetor2 - total_vetor));
        //alert(total_vetor2 - total_vetor);
    }
    
    function somarValoresR(ordem){
       
        var s1 = '',s2 = '',s3 = '',s4 = '',s5 = '',s6 = '',s7 = '',s8 = '',s9 = '',s10 = '',s11 = '',s12 = '';
        
        var s1 =  document.getElementById("jan_r_"+ordem).value;
        s1 = formatar(s1);
      
        var s2 =  document.getElementById("fev_r_"+ordem).value;
        s2 = formatar(s2);
        
        var s3 =  document.getElementById("mar_r_"+ordem).value;
        s3 = formatar(s3);
        
        var s4 =  document.getElementById("abr_r_"+ordem).value;
        s4 = formatar(s4);
        
        var s5 =  document.getElementById("mai_r_"+ordem).value;
        s5 = formatar(s5);
        
        var s6 =  document.getElementById("jun_r_"+ordem).value;
        s6 = formatar(s6);
        
        var s7 =  document.getElementById("jul_r_"+ordem).value;
        s7 = formatar(s7);
        
        var s8 =  document.getElementById("ago_r_"+ordem).value;
        s8 = formatar(s8);
        
        var s9 =  document.getElementById("set_r_"+ordem).value;
        s9 = formatar(s9);
        
        var s10 =  document.getElementById("out_r_"+ordem).value;
        s10 = formatar(s10);
        
        var s11 =  document.getElementById("nov_r_"+ordem).value;
        s11 = formatar(s11);
        
        var s12 =  document.getElementById("dez_r_"+ordem).value;
        s12 = formatar(s12);
        
        var total = s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12; 
                 
        //total = total.replace('.', '!');
        //total = total.replace('!', ',');
        //alert(formatReal(total));
        total = formatarMoeda(total,2,',','.');
        document.getElementById("total_r_"+ordem).value = total; 
        
        somarTotal(ordem);
        
    }
    
    function somarValoresD(ordem){
       
        var s1 = '',s2 = '',s3 = '',s4 = '',s5 = '',s6 = '',s7 = '',s8 = '',s9 = '',s10 = '',s11 = '',s12 = '';
        
        var s1 =  document.getElementById("jan_d_"+ordem).value;
        s1 = formatar(s1);
      
        var s2 =  document.getElementById("fev_d_"+ordem).value;
        s2 = formatar(s2);
        
        var s3 =  document.getElementById("mar_d_"+ordem).value;
        s3 = formatar(s3);
        
        var s4 =  document.getElementById("abr_d_"+ordem).value;
        s4 = formatar(s4);
        
        var s5 =  document.getElementById("mai_d_"+ordem).value;
        s5 = formatar(s5);
        
        var s6 =  document.getElementById("jun_d_"+ordem).value;
        s6 = formatar(s6);
        
        var s7 =  document.getElementById("jul_d_"+ordem).value;
        s7 = formatar(s7);
        
        var s8 =  document.getElementById("ago_d_"+ordem).value;
        s8 = formatar(s8);
        
        var s9 =  document.getElementById("set_d_"+ordem).value;
        s9 = formatar(s9);
        
        var s10 =  document.getElementById("out_d_"+ordem).value;
        s10 = formatar(s10);
        
        var s11 =  document.getElementById("nov_d_"+ordem).value;
        s11 = formatar(s11);
        
        var s12 =  document.getElementById("dez_d_"+ordem).value;
        s12 = formatar(s12);
        
        var total = s1+s2+s3+s4+s5+s6+s7+s8+s9+s10+s11+s12; 
                 
        //total = total.replace('.', '!');
        //total = total.replace('!', ',');
        //alert(formatReal(total));
        total = formatarMoeda(total,2,',','.');
        document.getElementById("total_d_"+ordem).value = total; 
        
        
        somarTotal(ordem);
    }
    
    function somarValorTotal(ordem){
       
        var s1 = '',s2 = '',s3 = '',s4 = '',s5 = '',s6 = '',s7 = '',s8 = '',s9 = '',s10 = '',s11 = '',s12 = '';
        
        var total =  document.getElementById("valor_d_"+ordem).value;
        total = formatar(total);
        
        var ajuste =  document.getElementById("ajuste_d_"+ordem).value;
        ajuste = formatar(ajuste);
          
        teste =  total + total*(ajuste/100); 
        var total = teste; 
       
        teste = formatarMoeda(teste,2,',','.');
        document.getElementById("valor_ajustado_d_"+ordem).value = teste; 
        
        somarTotal(ordem);
    }