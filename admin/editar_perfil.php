<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Se Livrando | Meu Perfil</title>
    <link rel="stylesheet" href="css/estilos2.css" media="screen" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>

		<style rel="stylesheet" type="text/css">
		body{
		background-color:#fff;
		font-family: 'Open Sans', serif; 
		}
		</style>
		
</head>

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
	<input class="busca" type=text name=q size=20 placeholder="Pesquisar"><input class="buscar" type="submit" value="Buscar">
	</ul>
</nav>
</header>


    <div class="imgperfil">
        <?php $foto = isset($_POST['arquivoFoto'])?utf8_decode($_POST['arquivoFoto']):null; ?>
    </div>

	<div class="infoperfil">
            <form action="upload.php" enctype="multipart/form-data">
	<h2 class="dadosperfilb">Escolha a sua nova foto de perfil:</h2><input class="edperfil" type="file" name="arquivoFoto" ><br>
	<h2 class="dadosperfilb">Escolha a sua nova imagem de fundo:</h2><input class="edperfil" type="file" name="arquivoFoto" ><br>
            </form>
	</div>

<div class="bgperfil b2"></div>
<div class="bamarela">
<h2 class="bamarelaf">Edite seus dados</h2>
</div>


<form class="edperfil">
	<?php 
        session_start();
        include 'frmatualizarUsuarioAdm.php';
        ?>
</form>