<?php

namespace app\Util;

/*
 * Inclui todas as constantes utilizadas no sistema
 */

class Constantes
{

    public function recuperaRelacaoTabela($tabela)
    {
        
       

        switch ($tabela) {
            case "DOCUMENTO":
                return 1;
                break;
            case "INFRAESTRUTURA":
                return 2;
                break;
            case "FORNECEDOR":
                return 27;
                break;
            case "ANEXO":
                return 10;
                break;
            case "DOCUMENTO_CRIADO":
                return 1;
                break;
            case "DOCUMENTO_FIGURA":
                return 13;
                break;
            case "CONDOMINIO":
                return 8;
                break;
            case "CONTROLE_CONTA":
                return 26;
                break;
            case "USUARIO":
                return 7;
                break;
            case "PROPRIETARIO":
                return 17;
                break;
            case "RAMAL":
                return 3;
                break;
            case "VAGA_GARAGEM":
                return 5;
                break;
            case "APARTAMENTO":
                return 4;
                break;
            case "VEICULO":
                return 14;
                break;
            case "MORADOR":
                return 6;
                break;
            case "VARIAVEL":
                return 9;
                break;
            case "MENU_CONDOMINIO_PADRAO":
                return 34;
                break;
            case "MENU_CONDOMINIO":
                return 35;
                break;
            case "CARTAO":
                return 36;
                break;            
            case "BEM":
                return 37;
                break;
            case "PLANO":
                return 38;
                break;            
            case "VACINA":
                return 39;
                break;            
            case "PROCESSO":
                return 40;
                break;            
            case "FALECONOSCO":
                return 41;
                break;
            case "EMPRESA":
                return 42;
                break;
            case "SERVICO":
                return 42;
                break;
            case "AREACOMUM":
                return 43;
                break;
            case "FALECONOSCO":
                return 41;
                break;
            case "EMPRESA":
                return 42;
                break;
            case "SERVICO":
                return 43;
                break;
            case "AREACOMUM":
                return 44;
                break;
            case "FUNCIONARIO":
                return 45;
                break;
            case "VISITANTE":
                return 46;
                break;
            case "NOTICIA":
                return 47;
                break;
            case "ANEXOS":
                return 48;
                break;
            case "GRUPORAMAL":
                return 49;
                break;
            case "PETS":
                return 50;
                break;
            case "PLANOCONTAS":
                return 51;
                break;
            case "PLANOSUBCONTAS":
                return 52;
                break;
            case "CONTRATO":
                return 53;
                break;
            case "REDESOCIAL":
                return 54;
                break;
            case "MENSAGEM":
                return 55;
                break;
            case "PAGAMENTO":
                return 56;
                break;
            case "RESUMOPREVISAOORCAMENTARIA":
                return 57;
                break;
            case "DESPACHO":
                return 58;
                break;
            case "SALDOATUALCONTAS":
                return 59;
                break;
            case "REGISTROENVIAEMAIL":
                return 60;
                break;
            case "SALAOFESTAS":
                return 61;
                break;
            case "AUTORIZAÇÃO":
                return 62;
                break;
            case "MANUTENCAOPROGRAMADA":
                return 63;
                break;
            case "CAUTELAS":
                return 64;
                break;
            case "ESCALASERVICO":
                return 65;
                break;
            case "PONTO":
                return 66;
                break;
            case "ESTOQUE":
                return 67;
                break;
            case "REDEGAS":
                return 68;
                break;
            case "TOMADAINCENDIO":
                return 69;
                break;
            case "REDEINCENDIO":
                return 70;
                break;
            case "REDEINTERFONE":
                return 71;
                break;
            case "MANGUEIRAINCENDIO":
                return 72;
                break;
            case "PORTACORTAFOGO":
                return 73;
                break;
            case "EXTINTOR":
                return 74;
                break;
            case "BALANCOCONTAS":
                return 75;
                break;
            case "CONTASPAGAR":
                return 76;
                break;
            case "CONTASRECEBER":
                return 77;
                break;
            case "TEMPLATES":
                return 78;
                break;
            case "EVACUACAO":
                return 79;
                break;
            case "RECEBIMENTOS":
                return 80;
                break;
            case "CURSOCOMBATEINCENDIO":
                return 81;
                break;
            case "DEPENDENTE":
                return 81;
                break;
        }
    }

    /**
     * DT: 21/05/2018 - substituído para ganho de performance.
     */
    
    public function links($sigla)
    {

        switch ($sigla) {

            case "MASTER":
                return "http://localhost/dagoba/public/master/";
                break;

            case "INSUCESSO":
                return "http://localhost/dagoba/public/master/";
                break;

            case "INEXISTENTE":
                return 3;
                break;

            
        }
    }
    
    
}