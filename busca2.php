<script type="text/javascript" src="js/funcoesValidacao.js"> </script>

<?php
include 'conexao/conecta.inc';
session_start();

$_BS['PorPagina'] = 20; // N�mero de registros por p�gina

// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante
if (!isset($_GET['consulta'])) {
header("Location: http://www.selivrando.esy.es/");
exit;
}

// Salva o que foi buscado em uma vari�vel
$busca = $_GET['consulta'];
$select = isset($_GET['busca'])?$_GET['busca']:null;
// Usa a fun��o mysql_real_escape_string() para evitar erros no MySQL
$busca = mysql_real_escape_string($busca);

        if ($select == "livro"){
            // Monta a consulta MySQL para saber quantos registros ser�o encontrados
            $sql = "SELECT COUNT(*) AS total FROM livro WHERE ((TITULO_LIVRO LIKE '%".$busca."%') OR ('%".$busca."%'))";
            // Executa a consulta
            $query = mysql_query($sql);
            // Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
            $total = mysql_result($query, 0, 'total');
			
            // Calcula o m�ximo de paginas
            $paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
			$_SESSION['paginas'] = $paginas;
} 
        else if ($select == "autor"){
                // Monta a consulta MySQL para saber quantos registros ser�o encontrados
                $sql = "SELECT COUNT(*) AS total FROM autor WHERE ((NOME_AUTOR LIKE '%".$busca."%') OR ('%".$busca."%'))";
                // Executa a consulta
                $query = mysql_query($sql);
                // Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
                $total = mysql_result($query, 0, 'total');
				//$total = mysql_num_rows($query);
                // Calcula o m�ximo de paginas
                $paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
				$_SESSION['paginas']  = $paginas;
}
    else if ($select == "editora"){
            // Monta a consulta MySQL para saber quantos registros ser�o encontrados
            $sql = "SELECT COUNT(*) AS total FROM editora WHERE ((NOME_EDITORA LIKE '%".$busca."%') OR ('%".$busca."%'))";
            // Executa a consulta
            $query = mysql_query($sql);
            // Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
            $total = mysql_result($query, 0, 'total');
            // Calcula o m�ximo de paginas
            $paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
}
else if ($select == "genero"){        
            // Monta a consulta MySQL para saber quantos registros ser�o encontrados
            $sql = "SELECT COUNT(*) AS total FROM genero WHERE ((NOME_GENERO LIKE '%".$busca."%') OR ('%".$busca."%'))";
            // Executa a consulta
            $query = mysql_query($sql);
            // Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
            $total = mysql_result($query, 0, 'total');
            // Calcula o m�ximo de paginas
            $paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
}

// ============================================

// Sistema simples de pagina��o, verifica se h� algum argumento 'pagina' na URL
if (isset($_GET['pagina'])) {
$pagina = (int)$_GET['pagina'];
} else {
$pagina = 1;
}
$pagina = max(min($_SESSION['paginas'] , $pagina), 1);
$inicio = ($pagina - 1) * $_BS['PorPagina'];

// ============================================
if ($select == "livro"){
    // Monta outra consulta MySQL, agora a que far� a busca com pagina��o
    $sql = "SELECT * FROM livro WHERE ((TITULO_LIVRO LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY TITULO_LIVRO DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
    // Executa a consulta
    $query = mysql_query($sql);
} else if ($select == "autor"){
    $sqlAutor = "SELECT COD_AUTOR FROM autor WHERE NOME_AUTOR LIKE '%".$busca."%'";
    $resultAutor = mysql_query($sqlAutor);
    $codAutor = mysql_fetch_array($resultAutor);
    
    $sql = "SELECT * FROM livro WHERE ((AUTOR_COD_AUTOR LIKE '%".$codAutor."%') OR ('%".$codAutor."%')) ORDER BY TITULO_LIVRO DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];    
    $query = mysql_query($sql);
	//echo $sql . '<br/>';

} else if ($select == "editora"){
        $sqlEditora = "SELECT COD_EDITORA FROM editora WHERE NOME_EDITORA LIKE '%".$busca."%'";
        $resultEditora = mysql_query($sqlEditora);
        $codEditora = mysql_fetch_array($resultEditora);
    
    $sql = "SELECT * FROM livro WHERE ((COD_EDITORA LIKE '%".$codEditora."%') OR ('%".$codEditora."%')) ORDER BY TITULO_LIVRO DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];   
    $query = mysql_query($sql);    
} 
    else if ($select == "genero"){
        $sqlGenero = "SELECT COD_GENERO FROM genero WHERE NOME_GENERO LIKE '%".$busca."%'";
        $resultGenero = mysql_query($sqlGenero);
        $codGenero = mysql_fetch_array($resultGenero);
    
    $sql = "SELECT * FROM livro WHERE ((COD_GENERO LIKE '%".$codGenero."%') OR ('%".$codGenero."%')) ORDER BY TITULO_LIVRO DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];   
    $query = mysql_query($sql);
}

// ============================================

// Come�a a exibi��o dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>

echo "<ul>";
while ($resultado = mysql_fetch_assoc($query)) {

$titulo = $resultado['TITULO_LIVRO'];
$codigo = $resultado['COD_LIVRO'];
$link = 'http://www.selivrando.esy.es/perfilLivro.php?codigo=' . $resultado['COD_LIVRO'];
echo "<li>";
echo '<a href="'.$link.'" title="'.$titulo.'">'.$titulo.'</a><br />';
//echo date('d/m/Y H:i', strtotime($resultado['']));
//echo '<p>'.$codigo.'</p>';
//echo '<a href="'.$link.'" title="'.$titulo.'">'.$link.'</a>';
echo "</li>";
}
echo "</ul>";

// ============================================
// Come�a a exibi��o dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++) {
echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
}
}

?>