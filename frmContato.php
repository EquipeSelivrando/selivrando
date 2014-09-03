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
						 
			    $('#contato').validate({
			   
					rules:{                                             
                                               nome:{
                                                    required: true
                                                },


                                                email:{
                                                    required: true,
                                                    remote: 'includes/verificaemail.php'
                                                    
                                                },

                                                confemail:{
                                                     required: true,
                                                     equalTo: "#email"
                                                },
 
                                                telefone:{
                                                     required: true                                                   
                                                }, 

                                               
                                                						                                
                                                    /*código*/
                                             
                                            
                                        /*fim código*/
					},
                                        
                                      
				        messages:{
                                                 nome:{
                                                    required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                },
					        email:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                 },
                                                confemail:{
                                                       required: "O campo confirmação de email é obrigatorio.",
                                                       equalTo: '<font color="red">O campo confirmação de email deve ser identico ao campo email.</font>'
                                                     },
                                                telefone:{ 
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
            


	
	
function fone(){
if (document.frm.campo.value.length == 0){
document.frm.campo.value = "(" + document.frm.campo.value; }
if (document.frm.campo.value.length == 4){
document.frm.campo.value = document.frm.campo.value + ")"; }
if (document.frm.campo.value.length == 9){
document.frm.campo.value = document.frm.campo.value + "-";}
}

function fone(obj,prox) {
switch (obj.value.length) {
	case 1:
		obj.value = "(" + obj.value;
		break;
	case 3:
		obj.value = obj.value + ")";
		break;	
	case 8:
		obj.value = obj.value + "-";
		break;	
	case 13:
		prox.focus();
		break;
}
}
</script>

</head>
<body>
     <?php
              include 'conexao/conecta.inc';
              session_start();
              $codigo_usuario = $_SESSION['codigo'];              
              $sql = "SELECT * FROM usuario WHERE COD_USUARIO ='$codigo_usuario'";
              $result = mysql_query($sql);
              $usuarios = mysql_fetch_array($result);
        ?>

<form name="contato" id="contato" method="post" action="novoContato.php"> 
           Nome: <input type="text" name="nome"  value="<?php echo $usuarios['NOME_USUARIO']?>"> <br>           
     E-mail: <input type="email" name="email" id="email" onclick="validaEmail();" placeholder="exemplo@exemplo.com" > <br>
     Telefone: <form id="form" name="form" method="post" action="?">
      <input name="telefone" type="text" id="telefone" maxLength="13" size="13" onKeyPress="fone(this,document.contato.data)"><br/>
    Assunto: <input type="text" name="assunto" id="assunto" placeholder="Digite o assunto" > <br>  
     Mensagem: <br/><textarea name="mensagem" cols="30" rows="10" placeholder="Digite sua mensagem aqui!"></textarea> <br/>
     Status: 
    <select name="status"> 
        <option name="naoResolvido" selected> Não Resolvido </option>
		<option name="resolvido"> Resolvido </option>
    </select>
<br/>
<input type="reset" name="Limpar Dados" Value="Limpar">
<input type="submit" value="Enviar">

	</form>
<br/><br/>
                 
</body>
</html>