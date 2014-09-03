<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/funcoesValidacao.js"> </script>                
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="js/validaEmail.js"></script>
	        <!--<meta HTTP-EQUIV="refresh" CONTENT="1">-->
		<!-- Inclus&#65533;o do Jquery -->
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js" ></script>-->
                <script type="text/javascript" src="js/jquery.min.js"></script>
		<!-- Inclus&#65533;o do Jquery Validate -->
		<!--<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.js" ></script>-->
                <script type="text/javascript" src="js/validate.js"></script>
		<!-- Valida&#65533;&#65533;o do foruml&#65533;rio -->
		<script type="text/javascript">
			$(document).ready(function(){
						 
			    $('#login').validate({
			   
					rules:{                                             
                                               

                                                email:{
                                                    required: true,
                                                    remote: 'includes/verificaemail.php'
                                                    
                                                },

                                               
                                             
                                                						                                
                                                    /*código*/
                                             
                                             
                                        /*fim código*/
					},
                                        
                                      
				        messages:{
                                                 
					        email:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                 },
                                               
                                              }
					});
			
                                    });	


                          window.onload = function() {
					
                    // $('#email').keypress function(){alert("");});
					  
                       $("#email").keypress(function() {

					     $('div.loader').show();
                     });
									
                       $("#email").focusout(function() {

					     $('div.loader').hide();
                     });									
					 $("#email").keyup(function() {
                       $('div.loader').hide();
                     });
			}
            

	
	

</script>

</head>

<body>


<meta charset="UTF-8">

    <h3> Formulário de Recuperar Senha </h3>
<form name="login" id="login" method="post" action="recuperar.php"> 
 
     E-mail: <input type="email" name="email" id="email" onclick="validaEmail();" placeholder="exemplo@exemplo.com" > <br>
    
   
     
		<input type="submit" value="Enviar">
 <header>
    <article id="pag">		  
    <div class="loginf" data-type="background">    
    <div id="login">
    <img src="img/marca.png" id="marca" width="410px">
    
	    </div>
    </div>
	 </article>
    </header>		
		
		
	</form>
<br/><br/>
                 
</body>
</html>