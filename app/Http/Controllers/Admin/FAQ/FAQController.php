<?php

namespace App\Http\Controllers\AdministracaoDagoba\FAQ;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FAQController extends Controller
{
    public function ConsultarSupFAQ() {
         
        $data = array();
        $util = new \App\Util\Util(); 
        
        $faq = new \App\Classes\FAQModel();
                
        $listaFAQ = $faq ->ConsultaFAQ();   
        
        
        $data["listaFAQ"] = $listaFAQ;

        //RETORNA PARA A VISÃO.
        return view('administracaoDagoba.FAQ.consultarFAQ', $data);
        
    }

    public function CadastrarInfFAQ(Request $request) {

        $data = array();
        
        if($request->isMethod("POST")){
            //Adicionar os dados do form
            
            $faq = new \App\faq($request->all());
                    
            $faq -> CmpTitulo = $request->input("titulo");
            $faq -> CmpTexto = $request->input("texto");
            $faq -> CmpDataInclusao = date('Y-m-d H:i:s');
            $faq -> CmpStatus = "ATV";

            $faq->save();

            return $this ->ConsultarSupFAQ();
        }
        
        //APRESENTA A VISAO
        return view('administracaoDagoba.FAQ.cadastrarFAQ', $data);       
        
    }   
    
     public function DetalharInfFAQ($idFAQ){
        
        $data = array();
        $listaFAQ = \App\faq::find($idFAQ);
        
        $data["titulo"] = $listaFAQ -> CmpTitulo;
        $data["texto"] = $listaFAQ -> CmpTexto;
        $data["idfaq"] = $idFAQ;
        
        return view('administracaoDagoba.FAQ.detalharFAQ', $data);
                
    }
    
    
     public function EditarInfFAQ(Request $request, $idFAQ) {
        
        $data = array();
        
        $listaFAQ = \App\faq::find($idFAQ);
        
        $data["titulo"] = $listaFAQ -> CmpTitulo;
        $data["texto"] = $listaFAQ -> CmpTexto;
        $data["idfaq"] = $idFAQ;
        
        if ($request->isMethod("post")) {                      
            
            $result = DB::table('faqs')
                                ->where('idfaq', $request->input("val"))
                                ->update(array('CmpTitulo' => $request->input("titulo"),
                                                'CmpTexto' => $request->input("texto")
                                            ));
            
            return $this ->ConsultarSupFAQ();
        }
        
        //Edição        
        return view('administracaoDagoba.FAQ.editarFAQ', $data);
    }
    
    
    public function ExcluirInfFAQ($idFAQ) {
        
        $data = array();
        
        $result = DB::table('faqs')
                            ->where('idfaq', $idFAQ)
                            ->update(array('CmpStatus' => "DTV"));

        return $this ->ConsultarSupFAQ();
        
        
        
    }
}

