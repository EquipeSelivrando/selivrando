<script type="text/javascript" src="js/funcoesValidacao.js"> </script>
 <form id="buscar" method="post" action="busca.php">  
        
       <label> Busca: </label>
       <input type="text" name="busca" value=""/><br/>
    </form>
    
    
	<ul>
	<?php
	include_once 'conexao/conecta.inc';
        session_start();
	// query SQL 
	$strSQL = "SELECT * FROM livro BY titulo_livro DESC";
	// Executar a query (o recordset $rs contém o resultado da query)
	$rs = mysql_query($strSQL);	
	// Loop pelo recordset $rs
	while($row = mysql_fetch_array($rs)) {
	//livro           
	echo $row['titulo'] . " " . $row['nomeautor'];
	  }
        ?> </ul>
<br/>	<br/>		
<select name="buscarlivro" id="buscarLivro" onchange="validabusca();">
<option value="livro"   title="titulo">livro</option>
<option value="autor"    title="autor">Autor</option>
<option value="editora"  selected='selected'  title="editora">Editora</option>
</select>

<input type="text" name="busca" id="busca"> 
<input  type="submit" value="Buscar"/> <br/>
 