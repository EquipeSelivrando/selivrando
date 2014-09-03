<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Se Livrando | Troca de Livros</title>
    <link rel="stylesheet" href="css/estilos2.css" media="screen" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>
<style rel="stlylesheet" type ="text/css">
body{
background-color: #ffcf00;
}
</style>	
</head>


<body>

<header class="cd-header">
<nav class="cd-main-nav">
	<ul>
	<!-- links -->
	<li><a href="home.php"><h2 class="menup">Home</h2></a></li>
	<li><a href="meuperfil.php"><h2 class="menup">Meu Perfil</h2></a></li>
	<li><a href="editar_perfil.php"><h2 class="menup">Editar Perfil</h2></a></li>
	<li><a href="adicionarlivro.php"><h2 class="menup">Adicionar Livro</h2></a></li>
	<li><a href="registro.php"><h2 class="menup">Registro de Atividades</h2></a></li>
	<li><a href="contato.php"><h2 class="menup">Contato</h2></a></li>
	<li><a href="logout.php"><h2 class="menup">Sair</h2></a></li>
	<li><input class="busca" type=text name=q size=20 placeholder="Pesquisar"><input class="buscar" type="submit" value="Buscar"></li>
	</ul>
</nav>
</header>
	
	<div class="infoperfil">
	<h1> Fale conosco!</h1>
	<!-- <h3 class="dadosperfil"></h3><br> -->
	<h3 class="dadosperfilb">twitter: @linkdotwitter</h3><br>
	<h3 class="dadosperfilb">facebook.com/paginadofacebook</h3><br>
	<br/>
		<?php
                session_start();
                include 'frmContato.php';
                ?>
	</div>
    </body>	
</html>