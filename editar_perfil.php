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

<?php
$codigo = $_SESSION['codigo'];
?>

<header class="cd-header">
<nav class="cd-main-nav">
	<ul>
	<!-- links -->
	<li><a href="home.php"><h2 class="menup">Home</h2></a></li>
	<li><a href="meuperfil.php"><h2 class="menup">Meu Perfil</h2></a></li>
	<li><a href="editar_perfil.php"><h2 class="menup">Editar Perfil</h2></a></li>
	<li><a href="adicionarlivro.php"><h2 class="menup">Adicionar Livro</h2></a></li>
	<li><a href="log.php?codigo='.$codigo.'"><h2 class="menup">Registro de Atividades</h2></a></li>
	<li><a href="contato.php"><h2 class="menup">Contato</h2></a></li>
	<li><a href="login.php"><h2 class="menup">Sair</h2></a></li>
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
        include 'frmAtualizarUsuario.php';
        ?>
</form>