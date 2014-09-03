<script type="text/javascript" src="js/funcoesValidacao.js"> </script>
<?php

include_once 'conexao/conecta.inc';
include_once 'includes/funcoesuteis.inc';

validaAutenticacao('index.php', '1');

    $codigo_usuario =  $_SESSION['codigo'];
    $query = "SELECT * FROM usuario WHERE COD_USUARIO = $codigo_usuario";
    $result = mysql_query($query);
    $usuario = mysql_fetch_array($result);

echo '<meta charset=UTF-8>';
echo '<h1 class=dadosperfil> '.$usuario['NOME_USUARIO'].'</h1><br/>';
echo '<h3 class=dadosperfilb> '.$usuario['EMAIL_USUARIO'].'</h3><br/>';
echo '<h3 class=dadosperfilb> '.$usuario['TELEFONE_USUARIO'].'</h3><br/>'.'</h6>';

//Buscar usuário por perfil: <a href="perfilUsuario.php?perfil=$login">Perfil de fulano </a>
?>