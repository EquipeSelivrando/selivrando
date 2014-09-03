<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Se Livrando | Detalhes do Livro</title>
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
	<li><a href="#0"><h2 class="menup">Sair</h2></a></li>
	<input class="busca" type=text name=q size=20 placeholder="Pesquisar"><input class="buscar" type="submit" value="Buscar">
	</ul>
</nav>
</header>

<div id="imgdetalhe"></div>
<div id="descricaolivro">
	<h1 class="titulo">Título do Livro</h1>
	<h3 class="autor">Autor, 2000, Editora Editora</h1>
	<h2 class="descricao">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id massa sapien. Sed at velit adipiscing enim luctus iaculis at non leo. Quisque at nulla pellentesque, cursus ligula gravida, volutpat leo. Aliquam euismod ultricies tortor vitae imperdiet. Curabitur vulputate aliquam diam id porta. Quisque lacinia sagittis eros, sit amet pulvinar tortor pellentesque ac. In porttitor, sapien in ultrices fringilla, quam eros suscipit elit, id porta lorem leo quis lorem.
	</h2>
	<br>
	<h1 class="estadolivro">Estado do livro:</h1>
	<ul>
	<li><h2 class="descricao"><input type="checkbox" name="otimo" id="otimo" />Ótimo estado</h2><br /></li>
	<li><h2 class="descricao"><input type="checkbox" name="bom" id="bom" />Bom Estado</h2><br /></li>
	<li><h2 class="descricao"><input type="checkbox" name="regular" id="regular" />Estado Regular</h2><br /></li>
	</ul>
	
	<ul>
	<li><h2 class="descricao"><input type="checkbox" name="ruim" id="ruim" />Estado Ruim</h2><br /></li>
	<li><h2 class="descricao"><input type="checkbox" name="pessimo" id="pessimo" />Péssimo estado</h2><br /></li>
</div>

<div id="quero">
    <input type="button" value="Eu quero!" class="querolivro">
	</div>

</body>
</html>