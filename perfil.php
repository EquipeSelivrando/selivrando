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
	<li><a href="home.php"><h2 class="menup">Home</h2></a></li>
	<li><a href="meuperfil.php"><h2 class="menup">Meu Perfil</h2></a></li>
	<li><a href="editar_perfil.php"><h2 class="menup">Editar Perfil</h2></a></li>
	<li><a href="adicionarlivro.php"><h2 class="menup">Adicionar Livro</h2></a></li>
	<li><a href="registro.php"><h2 class="menup">Registro de Atividades</h2></a></li>
	<li><a href="contato.php"><h2 class="menup">Contato</h2></a></li>
	<li><a href=logout.php><h2 class="menup">Sair</h2></a></li>
       <li> <input class="busca" type=text name=q size=20 placeholder="Pesquisar"><input class="buscar" type="submit" value="Buscar"> </li>
	</ul>
</nav>
</header>


	<div class="imgperfil"> <!-- Exibir imagem do perfil --> </div>

	<div class="infoperfil">
            <?php
            include 'perfilUsuario.php';	
            ?>
	</div>
	

<div class="bgperfil b2"></div>

<!-- Se n�o ficar legal, usar h1 class="perfiltexto" pra voltar com a fonte da marca :) -->

<div class="bamarela">
<ul class="labelperfil">
<li class="labelperfil2"><h1 class="perfiltexto">Livros na Estante</h1></li>
<li class="labelperfil2"><h1 class="perfiltexto2">Usu�rios Favoritos</h1></li>
</ul>
</div>
	
<div id="infolivros">

<ul class="tablivros">
	 <li><div id= "livro1" >
	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
		<a href="#" class="buttonedit">Editar Livro</a>
	</div> </li>
	
	 <li><div id= "livro2" >
	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
		<a href="#" class="buttonedit">Editar Livro</a>
	</div> </li>
	
	 <li><div id= "livro3" >
	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
		<a href="#" class="buttonedit">Editar Livro</a>
	</div></li>
</ul>	

<ul class="tablivros">
	 <li><div id= "livro1" >
	 	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
			<a href="#" class="buttonedit">Editar Livro</a>
	</div> </li>
	
	 <li><div id= "livro2" >
	 	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
			<a href="#" class="buttonedit">Editar Livro</a>
	</div> </li>
	
	 <li><div id= "livro3" >
	 	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
			<a href="#" class="buttonedit">Editar Livro</a>
	</div></li>
</ul>

<ul class="tablivros">
	 <li><div id= "livro1" >
	 	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
			<a href="#" class="buttonedit">Editar Livro</a>
	</div> </li>
	
	 <li><div id= "livro2" >
	 	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
			<a href="#" class="buttonedit">Editar Livro</a>
	</div> </li>
	
	 <li><div id= "livro3" >
	 	 	<a href="desclivro.php" class="button">12 anos de Escravid�o</a>
			<a href="#" class="buttonedit">Editar Livro</a>
	</div></li>
</ul>
		
</div> 


<div id="favoritos">

<ul class="editeste">

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil"><a href="#">Isabela</a></h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Evelyn</h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Teste!!</h2></li>

</ul>

<ul class="editeste">

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil"><a href="#">Isabela</a></h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Evelyn</h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Teste!!</h2></li>

</ul>

<ul class="editeste">

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil"><a href="#">Isabela</a></h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Evelyn</h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Teste!!</h2></li>

</ul>

<ul class="editeste">

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil"><a href="#">Isabela</a></h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Evelyn</h2></li>

<li class="linha"><div class="testelivro"></div><h2 class="nomesperfil">Teste!!</h2></li>

</ul>

</div>

<script type="text/javascript">
$(document).ready(function(){
$('head').append('<link href="/estilos2.css" rel="stylesheet"/>');
}); 
</script>

</body>
</html>		