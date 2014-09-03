<?php
session_start();
//header("Location: http://www.selivrando.com.br/home.php"); (Redireciona a página)
/* VERIFICAR SE O USUÁRIO JÁ ESTÁ LOGADO...
if ($_SESSION['codigo'] != NULL){
    $codigo = $_SESSION['codigo'];
    header("Location: http://www.selivrando.esy.es/perfil.php?codigo='.$codigo.'");
}
 */
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Se Livrando | Troca de livros</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
<script src="js/prefixfree.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>

<body>
	
    <div id="scroll-pos">
    </div>

<div class="background" id="background">
<img src="img/login3.png">  
</div>

    <header>
    <article id="pag">		  
    <div class="loginf" data-type="background">    
    <div id="login">
<!--    <img src="img/marca.png" id="marca" width="410px">-->

<!--BACK-->
           <?php        
           include_once './frmlogin.php';
           ?>

    </div>

    </div>

    </article>
                        	<article class="sobre">
         <img src="img/marca.png" id="marca" width="410px">
	<h1></h1>
	<p class="branco">Se Livrando é uma rede social de troca de livros onde os usuários trocam livros entre si. O Se Livrando proporciona para o usuário o desapego dos livros que não quer, que já leu ou não necessita mais consultá-lo e garante novas leituras.
        <br>Ainda não entendeu? Leia as nossas perguntas mais frequentes.</p></article>
    </header>
  
	<main>
	<article>
	<h1>High Life Bushwick hoodie occupy letterpress direct trade +1.</h1>
	<p class="branco">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id massa sapien. Sed at velit adipiscing enim luctus iaculis at non leo. Quisque at nulla pellentesque, cursus ligula gravida, volutpat leo. Aliquam euismod ultricies tortor vitae imperdiet. Curabitur vulputate aliquam diam id porta. Quisque lacinia sagittis eros, sit amet pulvinar tortor pellentesque ac. In porttitor, sapien in ultrices fringilla, quam eros suscipit elit, id porta lorem leo quis lorem. </p>
	</article>
	</main>

	<script src="js/index.js"></script>
	
</body>

</html>