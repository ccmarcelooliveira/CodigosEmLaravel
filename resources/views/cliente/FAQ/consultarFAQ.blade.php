@extends('master.layout2')

@section('conteudo')

            <?php echo $barra_funcionalidade ?>
        
    <div class="panel-group" id="faqAccordion">
        @if(isset($lista))
            @foreach($lista as $item)
            <div class="panel panel-warning ">
                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                     <h4 class="panel-title">
                        <a href="#" class="ing">Questão: {{$item -> CmpTitulo}}?</a>
                  </h4>

                </div>
                <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                         <h5><span class="label label-primary">Resposta</span></h5>

                        <p>{{$item -> CmpTexto}}
                            </p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        
    </div>

           
@endsection