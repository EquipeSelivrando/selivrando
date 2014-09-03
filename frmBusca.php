<html>

<!--form method="POST" action="http://www.selivrando.esy.es/busca.php"-->
<form method="POST" action="busca2.php">
<label for="consulta">Buscar:</label>
<select name="busca"> 
    <option value="livro"> Livro </option>
    <option value="autor"> Autor </option>
    <option value="editora"> Editora </option>
    <option value="genero"> Genero </option>
</select>
<input type="text" id="consulta" name="consulta" maxlength="255" />
<input type="submit" value="Buscar" />
</form>
