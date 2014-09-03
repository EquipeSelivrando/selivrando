<script type="text/javascript" src="js/funcoesValidacao.js"></script>
		
    
    <form id="loginAdm" name="loginAdm" method="post" action="login.php"> 
        
   E-mail: <input type="text" name="email" id="email"><br>
   Senha: <input type="password" name="senha" id="senha" maxlength="30"> <br><br>
    <input class="btn" type="submit" onClick="return validaLogin2()" value="Login"><br>
    <input class="btn1" type="button" onClick="window.location.href='cadastro.php'" value="Não é cadastrado?"><br>
    <input class="btn1" type="button" onClick="window.location.href='AlterarSenha.php'" value="Não consegue acessar sua conta?"><br>

    </form>