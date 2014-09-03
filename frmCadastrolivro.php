  <link rel="stylesheet" href="css/estilos2.css" media="screen" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/funcoesValidacao.js"></script>
 <meta charset="UTF-8">
    
<form method="post" action="upload.php" enctype="multipart/form-data">
<label>Definir Foto do Livro:</label> <input type="file" name="arquivoFoto"> <br/>
<input type="submit" value="Salvar" />
</form>       
  
    <form name="Cadastro" enctype="multipart/form-data" method="post" action="inserirLivro.php" class="edperfil" > 
    <label> <h1 class="editarperf">Título:</h1></label><input class="edperfil" type="text" name="titulo" > <br/>
    <label> <h1 class="editarperf">Ano publica��o:</h1></label><input class="edperfil" type="text" name="anopublicacao" onsubmit="return ValidaData(this);" > <br/>
    <label> <h1 class="editarperf">ISBN: </h1></label><input class="edperfil" type="text" name="isbn" maxlength="6" > <br/>
    <label> <h1 class="editarperf">Quantidade de páginas:</h1> </label><input class="edperfil" type="text" name="qntpgs" maxlength="5" /> <br/>
    <label><h1 class="editarperf"> Sinopse: </h1> <br/> </label> <textarea name="sinopse" cols="35" rows="6" maxlength="200" placeholder="máx. 200 caracteres"> </textarea> <br>        
    <label> <h1 class="editarperf">Autor: </h1></label><?php
       include_once 'conexao/conecta.inc';
       session_start();
       $sql0 = "SELECT * FROM autor";
       $result0 = mysql_query($sql0);
       echo '<select name=autor>';
       echo '<option value=""> Selecione o autor </option>';
       while($autores = mysql_fetch_array($result0)){              
       echo '<option value='.$autores['COD_AUTOR'].'>'.utf8_encode($autores['NOME_AUTOR']).'</option>';} 
       echo '</select>';
       ?> <br/>
       
        <label><h1 class="editarperf"> Editora:</h1> </label><?php        
       $sql = "SELECT * FROM editora";
       $result = mysql_query($sql);
       echo '<select name=editora>';
       echo '<option value=""> Selecione a editora </option>';
       while($editoras = mysql_fetch_array($result)){              
       echo '<option value='.$editoras['COD_EDITORA'].'>'.utf8_encode($editoras['NOME_EDITORA']).'</option>';} 
       echo '</select>';
       ?> <br/>
	<br/>
        <label><h1 class="editarperf"> Gênero:</h1> </label><?php               
       $sql1 = "SELECT * FROM genero";
       $result1 = mysql_query($sql1);
       echo '<select name=genero>';
       echo '<option value=""> Selecione o gênero </option>';
       while($generos = mysql_fetch_array($result1)){   
       echo '<option value='.$generos['COD_GENERO'].'>'.utf8_encode($generos['NOME_GENERO']).'</option>';} 
       echo '</select>';
       ?> <br/>
	
       <label> <h1 class="editarperf">Estado de conservação:</h1> </label> <?php               
       $sql2 = "SELECT * FROM estado_conservacao";
       $result2 = mysql_query($sql2);
       echo '<select name=estadoconservacao>';
       echo '<option value=""> Selecione o estado de conservação </option>';       
       while($estadoConserv = mysql_fetch_array($result2)){     
       echo '<option value='.$estadoConserv['COD_ESTADOCONS'].'>'.$estadoConserv['NOME_ESTADO'].'</option>';} 
       echo'</select>'; ?>
        <br/>        <br/><br/>
           <fieldset>
	<legend>Como classificar seu livro</legend>
	
	<label >Novo (Apenas o livro novo, vindo da distribuidora.)</label><br />
	<label >Muito Bom (Capas e miolo em perfeita conservação. Dedicatória, assinatura e pequenos sublinhados a lápis são aceitáveis.)</label><br />
    <label >Bom (Aspecto geral de usado. As páginas podem ter anotações e marcações a tinta e marca-texto, pequenas dobraduras nas capas e manchas.)</label><br />       
    <label >Regular (Apresenta capas com danos, ou pode faltar partes da capa. Páginas com manchas ou frágeis,muitos sublinhados e anotações.) </label><br />
    <label >Ruim (Faltando capas, encadernação frágil, muitas manchas dificultando a leitura, bordas escurecidas e irregulares. Livros com rasgos ou empenado.) </label><br />
    </fieldset> <br/>
    <input class="edperfil" type="submit"  value="Cadastrar" onClick="return validaLivro();" />
 
    </form>