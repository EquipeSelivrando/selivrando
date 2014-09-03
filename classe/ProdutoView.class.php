<?php

class LivroView {
    
    public function listarLivrosView($livros)
    {
      
        $i = 0;
        $sql = "SELECT * FROM livro";
		$result = mysql_query($sql);
        echo '<table>';
		echo '<tr>';
		
		
    if(($i % 5 == 0) and ($i != 0))
       {
          echo "</tr><tr>";  
          $i++;
	   } 
          echo "</table>";
          echo "</div>";    
    }        				
	
    function imagens(){
            
            while ($livros = mysql_fetch_array($result)){
		echo '<td>';
		echo '<a href=perfil.php?'.$livros['$cod_livro'].'">';
		echo '<img src="'.$livros['URL_IMAGEM'].'"/>';
		echo '</td>';
		
/* Aqui criamos 6 divs, 5 equivale a 5 colunas criadas e a sexta vai executar uma ação-Enviar-*/

	echo "<td><div id=livro>
                    <div id=livro>
                      <div id=img>{$livros->getSinopse()}</div>
                        
                    <div id=livro>
                      <div id=img>{$livros->getSinopse()}</div>
					  
					<div id=livro>
                      <div id=img>{$livros->getSinopse()}</div>

                    <div id=livro>
                      <div id=img>{$livros->getSinopse()}</div>	
					  
                    <div id=livro>
                      <div id=img>{$livros->getSinopse()}</div>	
                     
					<div id=Submit></div>
					                
                        </div></td>";		
	 
        } }
    }