<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Se Livrando | Troca de Livros</title>
    <link rel="stylesheet" href="../css/estilos3.css" media="screen" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>
</head>

	
<div id="infoperfil">
	<div id="dadosperfil">
<br><br><br><br><br><br>
	<?php
        include 'admin.php';
        ?>
	<h4></h4>
	<br>
	
	</div>
	
		<br><br>
		<h3><a href="#" class="editarperfil">Atualizar dados</a></h3>

</div>
<body>

<header class="cd-header">
<div id="cd-logo"><a href="../home.php"><img src="../img/marca.png" width="400px" alt="Logo"></a></div>
<nav class="cd-main-nav">
	<ul>
	<!-- links -->

	<li><a href="listarUsuario.php"><h6 class="listar">Listar Usuários</h6></a></li>
	<li><a href="listarAdministradores.php"><h6 class="listar">Listar Administradores</h6></a></li>
	<li><a href="listarMensagens.php"><h6 class="listar">Listar Mensagens</h6></a></li>
	<li><a href="listarTroca.php"><h6 class="listar">Listar Trocas</h6></a></li>
	<li><a href="listarLivro.php"><h6 class="listar">Listar Livros</h6></a></li>
	<li><a href="../logout.php"><h6 class="listar">Sair</h6></a></li>
	</ul>
</nav>
</header>

<div id=tabelaLivro>
<?php
 include_once 'listarLivros.php';
?>
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="../js/home.js"></script>

</body>

</html>