<script type="text/javascript" src="js/funcoesValidacao.js"> </script>          
<script type="text/javascript">

	$(document).ready(function(){
						 
			    $('#atualizarLivro').validate({
			   
					rules:{                                             
                                            titulo:{
                                                    required: true
                                                },


                                            anopublicacao:{
                                                    required: true,
                                                },

                                            isbn:{
                                                     required: true,
                                                     equalTo: "#email"
                                                },
 
                                            qntpgs:{
                                                     required: true                                                   
                                                }, 

                                            sinopse:{
                                                     required: true                                                   
                                                },  
                                                
                                            arquivo:{
                                                     required: true                                                  
                                            }},  
                                                
              
				        messages:{
                                            titulo:{
                                                    titulo: 'Este Campo &eacute; obrigat&oacute;rio'
                                                },
                                    anopublicacao:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                 },
                                            isbn:{
                                                       'Este Campo &eacute; obrigat&oacute;rio'
                                                  },
                                            qntpgs:{ 
                                                       required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                       
                                                      },
                                             sinopse:
                                                      { 
                                                         required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                      },
                                            arquivo:{
                                                    required: 'Este Campo &eacute; obrigat&oacute;rio'
                                                }
				
                                              }
                            });
                                                           });


</script>
        <?php
              include 'conexao/conecta.inc';
              session_start();
              $codigo_usuario =  $_SESSION['codigo'];                        
              //selecionar estante/item estante/livro
        ?>
        
        <form id="atualizarLivro" class="edperfil" action="atualizarLivro.php" method="post">
    <input type="hidden" name="codigo" value="<?php echo $livros['COD_LIVRO']; ?>" >
    <label> Título:</label><input type="text" name="titulo" value="<?php echo $livros['TITULO_LIVRO']; ?>"> <br/>
    <label> Ano publicação:</label><input type="text" name="anopublicacao" onClick="return ValidaData();" > <br/>
    <label> ISBN: </label><input type="text" name="isbn" maxlength="6" value="<?php echo $livros['ISBN_LIVRO']; ?>"> <br/>
    <label> Quantidade de páginas: </label><input type="text" name="qntpgs" maxlength="5" /> <br/>
    <label> Sinopse:  <br/> </label> <textarea name="sinopse" cols="35" rows="6" maxlength="200" placeholder="máx. 200 caracteres"> </textarea> <br>
    <label> Selecione uma imagem: </label> <input name="arquivo" type="file" ><br/>
       <label> Autor: </label><?php
       include_once 'conexao/conecta.inc';
       session_start();
       $sql0 = "SELECT * FROM autor";
       $result0 = mysql_query($sql0);
       echo '<select name=autor>';
       echo '<option value=""> Selecione o autor </option>';
       while($autores = mysql_fetch_array($result0)){              
       echo '<option value='.$autores['COD_AUTOR'].'>'.$autores['NOME_AUTOR'].'</option>';} 
       echo '</select>';
       ?> <br/>
       
       <label> Editora: </label><?php       
       $sql1 = "SELECT * FROM editora";
       $result1 = mysql_query($sql1);
       echo '<select name=editora>';
       echo '<option value=""> Selecione a editora </option>';
       while($editoras = mysql_fetch_array($result1)){              
       echo '<option value='.$editoras['COD_EDITORA'].'>'.$editoras['NOME_EDITORA'].'</option>';} 
       echo '</select>';
       ?> <br/>

       <label> Gênero: </label><?php               
       $sql2 = "SELECT * FROM genero";
       $result2 = mysql_query($sql2);
       echo '<select name=genero>';
       echo '<option value=""> Selecione o gênero </option>';
       while($generos = mysql_fetch_array($result2)){   
       echo '<option value='.$generos['COD_GENERO'].'>'.$generos['NOME_GENERO'].'</option>';} 
       echo '</select>';
       ?> <br/>
	
       <label> Estado de conservação: </label><?php               
       $sql3 = "SELECT * FROM estado_conservacao";
       $result3 = mysql_query($sql3);
       echo '<select name=estadoconservacao>';
       echo '<option value=""> Selecione o estado de conservação </option>';       
       while($estadoConserv = mysql_fetch_array($result3)){     
       echo '<option value='.$estadoConserv['COD_ESTADOCONS'].'>'.$estadoConserv['NOME_ESTADOCONS'].'</option>';} 
       echo '</select>';
       ?>
        <br/>
          <input type="submit" onclick="return Validacao();" value="Atualizar" >
          </form>