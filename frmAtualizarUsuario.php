<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/funcoesValidacao.js"> </script>                
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="js/validaEmail.js"></script>

<!-- FaÃ§a o include da lib do jQuery -->
<script type="text/javascript" src="scripts/lib/jquery.js"></script>
<script type="text/javascript">	  
	$(document).ready(function(){
						 
			    $('#atualizar').validate({
			   
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

                                             
                                                						                                
                                                    /*cÃ³digo*/
                                             
                                             termos: "required"
                                        /*fim cÃ³digo*/
					},
                                        
                                      
				        messages:{
                                                 nome:{
                                                    required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                },
						          email:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio' , 
                                                 },
                                                confemail:{
                                                       required: "O campo confirmação de email é obrigatorio.",
                                                       equalTo: '<font color="red">O campo confirmação de email deve ser idêntico ao campo email.</font>'
                                                     },
                                                telefone:{ 
                                                       required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                       
                                                      },
                                                cep:
                                                      { 
                                                         required: 'Este Campo &eacute; obrigat&oacute;rio', 

                                                      },
                                                                     nome:{
                                                    required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                },
						           num:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio' , 
                                                     remote: '<font color="red">O campo Número é obrigatório.</font>'},

                                                senha:{ 
                                                       required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                      },
                                                confsenha:
                                                      { 
                                                         required: 'Este Campo &eacute; obrigat&oacute;rio', 
                                                         equalTo:  '<font color="red">O campo confirmação de senha deve ser idêntico ao campo senha.</font>'
                                                      },
	
					              termos: "Para se cadastrar vocÃª deve aceitar os termos de uso."
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
            







                        
                 // FunÃ§Ã£o Ãºnica que farÃ¡ a transaÃ§Ã£o
	function getEndereco() {
			// Se o campo CEP nÃ£o estiver vazio
			if($.trim($("#cep").val()) !== ""){
				/* 
					Para conectar no serviço e executar o json, precisamos usar a função
					getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
					dataTypes não possibilitam esta interação entre domÃ­nios diferentes
					Estou chamando a url do serviÃ§o passando o parÃ¢metro "formato=javascript" e o CEP digitado no formulÃ¡rio
					http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
				*/
				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
					// o getScript dÃ¡ um eval no script, entÃ£o Ã© sÃ³ ler!
					//Se o resultado for igual a 1
			  		if(resultadoCEP["resultado"]){
						// troca o valor dos elementos
						$("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
						$("#bairro").val(unescape(resultadoCEP["bairro"]));
						$("#cidade").val(unescape(resultadoCEP["cidade"]));
						$("#estado").val(unescape(resultadoCEP["uf"]));
					}else{
						alert("Endereço não encontrado");
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


        <?php
              include 'conexao/conecta.inc';
              session_start();
              $codigo_usuario =  $_SESSION['codigo'];
              $sql = "SELECT * FROM usuario WHERE COD_USUARIO ='$codigo_usuario'";
              $result = mysql_query($sql);
              $usuarios = mysql_fetch_array($result);
        ?>
        
        <form id="atualizar" name="atualizar" action="perfil.php" method="post">
           <input type="hidden" name="codigo" value="<?php echo $usuarios['COD_USUARIO'];?>" >
           Nome: <input type="text" name="nome"  value="<?php echo $usuarios['NOME_USUARIO']?>"> <br>           
           Email: <input type="email" name="email" value="<?php echo $usuarios['EMAIL_USUARIO']?>"> <br>
           Telefone: <form id="form" name="form" method="post" action="?">
           <input name="telefone" type="text" id="telefone" maxLength="13" size="13" onKeyPress="fone(this,document.atualizar.data)"><br/>
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
 
           <input type="submit" onclick="return Validacao();" value="Atualizar" >
           </form>