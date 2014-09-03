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
						 
			    $('#cadastro').validate({
			   
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

                                                cep:{
                                                     required: true                                                   
                                                },  
                                                
                                                num:{
                                                     required: true                                                  
                                                },  
                                                
                                                 
                                                senha:{
                                                     required: true                                                   
                                                },  

                                                   
                                                confsenha:{
                                                     required: true,  
                                                     equalTo: "#senha"                                                   
                                                },  

	                                       captcha:{
                                                     required: true                                                   
                                                },  
                                             
                                                						                                
                                                    /*c�digo*/
                                             
                                             termos: "required"
                                        /*fim c�digo*/
					},
                                        
                                      
				        messages:{
                                                 nome:{
                                                    required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                },
					        email:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                 },
                                                confemail:{
                                                       required: "O campo confirma��o de email � obrigatorio.",
                                                       equalTo: '<font color="red">O campo confirma��o de email deve ser identico ao campo email.</font>'
                                                     },
                                                telefone:{ 
                                                       required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                       
                                                      },
                                                cep: { 
                                                         required: 'Este Campo &eacute; obrigat&oacute;rio', 

                                                      },
						                         num:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio' , 
                                                     remote: '<font color="red">O campo N�mero � obrigat�rio.</font>'},//,

                                                senha:{ 
                                                       required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                      },
                                                confsenha:
                                                      { 
                                                         required: 'Este Campo &eacute; obrigat&oacute;rio', 
                                                         equalTo:  '<font color="red">O campo confirma��o de senha deve ser identico ao campo senha.</font>'
                                                      },
	
	                                            captcha:
                                                      { 
                                                         required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                      },
					              termos: "Para se cadastrar voc� deve aceitar os termos de uso."
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
			};
            

	// Fun��o �nica que far� a transa��o
	function getEndereco() {
			// Se o campo CEP n�o estiver vazio
			if($.trim($("#cep").val()) !== ""){
				/* 
					Para conectar no servi�o e executar o json, precisamos usar a fun��o
					getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
					dataTypes n�o possibilitam esta intera��o entre dom�nios diferentes
					Estou chamando a url do servi�o passando o par�metro "formato=javascript" e o CEP digitado no formul�rio
					http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
				*/
				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
					// o getScript d� um eval no script, ent�o � s� ler!
					//Se o resultado for igual a 1
			  		if(resultadoCEP["resultado"]){
						// troca o valor dos elementos
						$("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
						$("#bairro").val(unescape(resultadoCEP["bairro"]));
						$("#cidade").val(unescape(resultadoCEP["cidade"]));
						$("#estado").val(unescape(resultadoCEP["uf"]));
					}else{
						alert("Endere�o n�o encontrado");
					}
				});				
			}			
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


<meta charset="UTF-8">
<form name="cadastro" id="cadastro" method="post" action="inserirUsuario.php"> 
     Nome: <input type="text" name="nome" id="nome"> <br>
     E-mail: <input type="email" name="email" id="email" onclick="validaEmail();" placeholder="exemplo@exemplo.com" > <br>
     Confirme o e-mail: <input type="email" name="conf_email" id="confemail" > <br>  
     Telefone: <form id="form" name="form" method="post" action="?">
      <input name="telefone" type="text" id="telefone" maxLength="13" size="13" onKeyPress="fone(this,document.cadastro.data)"><br/>
  
  <label for="cep">CEP:</label>
    <input name="cep" id="cep" size="9" maxlength="8" placeholder="Sem tra�os" onBlur="getEndereco()"/>
  <br />
  <label for="rua">Logadouro:</label>
    <input name="rua" id="rua" size="50"/>
  <br/>
  <label for="num">Número:</label>
    <input name="num" id="num" size="2" maxlength="4"/>
  <br/>
  <label for="bairro">Bairro:</label>
    <input name="bairro" id="bairro" size="30"/>
  <br/>
  <label for="cidade">Cidade:</label>
    <input name="cidade" id="cidade"/>
  <br/>
  <label for="estado">Estado</label>
    <input name="estado" id="estado" size="2" maxlength="2"/>
  <br/>
   
     Senha: <input type="password" name="senha" id="senha" maxlength="30" />  <br>
     Confirme a senha: <input type="password" name="conf_senha" id="confsenha" maxlength="30" /> <br> <br>
       
      Aceito os termos e condições de uso: <br>
       <input type="checkbox" name="termos" id="termos">
	   <a href="termos_uso.php"> Leia aqui </a> <br><br>
	   
           
           <img src="captcha.php" height="30" width="60"/> <br> 
           <label>Digite o texto da imagem:</label>
            <input type="text" name="captcha" id="captcha" /><br/>
     
		<input type="submit" value="Cadastre-se">
	</form>
<br/><br/>
                 
</body>
</html>