<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Se Livrando | Troca de Livros</title>
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
	<li><a href="logout.php"><h2 class="menup">Sair</h2></a></li>
	<input class="busca" type=text name=q size=20 placeholder="Pesquisar"><input class="buscar" type="submit" value="Buscar">
	</ul>
</nav>
</header>	   

<div class="bamarelab">
<h2 class="bamarelaf">Adicione um livro!</h2>
</div>

	<form class="edperfil">	  
  <?php
  include 'frmCadastrolivro.php';
  ?>
</form>   
	   
    </body>
</html>