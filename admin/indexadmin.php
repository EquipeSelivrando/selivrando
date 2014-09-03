<?php
//session_start();
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Se Livrando | Troca de livros</title>

<link rel="stylesheet" href="../css/estilos3.css" media="screen" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>

</head>

<div id="infoperfil">
	<div id="dadosperfil">
<br><br><br><br><br><br>
	<?php
        include 'admin.php';
        ?>
	<br>
        <h3><a href=../editar_perfil.php?codigo='.$codigo_usuario.' class="editarPerfil"> Atualizar dados</a></h3>	
	</div>

<body>	
 
    <header class="cd-header">
<nav class="cd-main-nav">
	<ul>
	<!-- links -->
	<li><a href="listarUsuario.php"><h6>Listar Usuários</h6></a></li>
	<li><a href="listarAdministradores.php"><h6>Listar Administradores</h6></a></li>
	<li><a href="listarMensagens.php"><h6>Listar Mensagens</h6></a></li>
	<li><a href="listarTroca.php"><h6>Listar Trocas</h6></a></li>
	<li><a href="listarLivro.php"><h6>Listar Livros</h6></a></li>
	<li><a href="../logout.php"><h6>Sair</h6></a></li>
	</ul>
</nav>
</header>
     <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="../js/home.js"></script>
          
</body>
</html>