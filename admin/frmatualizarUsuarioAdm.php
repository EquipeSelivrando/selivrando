<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/validate.js"></script>
<script type="text/javascript" src="../js/funcoesValidacao.js"> </script>                
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<!-- Faça o include da lib do jQuery -->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">	                          
                 // Função única que fará a transação
	function getEndereco() {
			// Se o campo CEP não estiver vazio
			if($.trim($("#cep").val()) !== ""){
				/* 
					Para conectar no serviço e executar o json, precisamos usar a função
					getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
					dataTypes não possibilitam esta interação entre domínios diferentes
					Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
					http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
				*/
				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
					// o getScript dá um eval no script, então é só ler!
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
              include '../conexao/conecta.inc';      
              echo '<meta charset=UTF-8>';
              $codigo_usuario =  $_GET['codigo'];
              $sql = "SELECT * FROM usuario WHERE COD_USUARIO ='$codigo_usuario'";
              $result = mysql_query($sql);
              $usuarios = mysql_fetch_array($result);                            
        ?>
        
        <form name="atualizar" action="atualizar.php" method="post">
           <input type="hidden" name="codigo" value="<?php echo $usuarios['COD_USUARIO']; ?>" >
           Nome: <input type="text" name="nome"  value="<?php echo $usuarios['NOME_USUARIO'] ?>"> <br>          
           Email: <input type="email" name="email" value="<?php echo $usuarios['EMAIL_USUARIO']?>"> <br>
           Conf. Email: <input type="email" name="confemail"> <br>          
           Telefone: <form id="form" name="form" method="post" action="?">
           <input name="telefone" type="text" id="telefone" maxLength="13" size="13" onKeyPress="fone(this,document.atualizar.data)"><br/>
  <label for="cep">CEP:</label>
  <input name="cep" id="cep" size="9" maxlength="8" placeholder="Sem traços" onBlur="getEndereco()"/>
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