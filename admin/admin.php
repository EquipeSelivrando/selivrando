<script type="text/javascript" src="js/funcoesValidacao.js"> </script>
<?php
include_once '../includes/funcoesuteis.inc';
validaAutenticacao('../index.php', '2');
        
     
    $codigo_usuario =  $_SESSION['codigo'];
    $query = "SELECT * FROM usuario WHERE COD_USUARIO = $codigo_usuario";
    $result = mysql_query($query);
    $usuario = mysql_fetch_array($result);

echo '<meta charset=UTF-8>';

echo '<h2> Nome: '.$usuario['NOME_USUARIO'].'<br/>';
echo 'E-mail: '.$usuario['EMAIL_USUARIO'].'<br/> </h2>';

/*echo '<a href=../frmAtualizarUsuario.php class=editarPerfil > Atualizar Dados </a>'.'<br/>';
echo '<a href=listarUsuario.php> <h6 class=Listar> Listar Usuários </h6> </a> | ';
echo '<a href=listarAdministradores.php> <h6 class=Listar> Listar Administradores </h6> </a> | ';
echo '<a href=listarMensagens.php> <h6 class=Listar> Listar Mensagens </h6> </a> | ';
echo '<a href=listarTroca.php> <h6 class=Listar> Listar Trocas </h6> </a> | ';
echo '<a href=listarLivro.php> <h6 class=Listar> Listar Livros </h6> </a> | ';
echo '<a href=../logout.php> <h6 class=Listar> Logout </a> </h6> ';
*/