
@extends('master.layout')

@section('conteudo')
<script>
$(function(){
    
     $("#dataInclusao").datepicker({
        dateFormat : 'dd/mm/yy'
    });
   
});
</script>
<script type="text/javascript">
$(document).ready(function(){

$('.demo1').on('click', function(){
$.goNotification('jQueryScript.net');
});

});


});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script language="JavaScript">
      function take_snapshot() {

              // take snapshot and get image data
              Webcam.snap( function(data_uri) {
                      // display results in page
                      document.getElementById('results').innerHTML = 
                              '<h2>Here is your image:</h2>' + 
                              '<img src="'+data_uri+'" name="teste"/>';
                      
                      document.getElementById("imagem_canvas").value = data_uri;
                       
              } );
      }
  </script>

<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <?php echo $barra_funcionalidade ?>
        <!-- /.row -->
        
    <div id="page-wrapper">
        
         <div class="row">       
             
             <form method="post" id="registration-form" data-toggle="validator" enctype="multipart/form-data">
                <div class="col-lg-12">
                            
                    <div class="tab-pane fade active in" id="service-one">
                        <P><P>
                            <div id="results">Your captured image will appear here...</div>
	
                            <div id="my_camera"></div>

                            <script src="{{ asset('js/webcam.min.js') }}"></script>  

                            <!-- Configure a few settings and attach camera -->
                            <script language="JavaScript">
                                    Webcam.set({
                                            width: 320,
                                            height: 240,
                                            image_format: 'jpeg',
                                            jpeg_quality: 90
                                    });
                                    Webcam.attach( '#my_camera' );
                            </script>

                            <!-- A button for taking snaps -->
                           
                            <input type=button value="Take Snapshot" class="btn btn-primary"onClick="take_snapshot()">
                            <input type="hidden" name="imagem_canvas" id="imagem_canvas" value=''>
                             
                            <!-- Code to handle taking the snapshot and displaying it locally -->
                            
                    </div>


                </div>
            <?php echo $formulario; ?>  
                  {{csrf_field()}}
            </form>
             
        </div>
        
           
              
                             
           
    <!-- -->    
  

    </div>
        
        
        
@endsection