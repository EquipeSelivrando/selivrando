<?php
echo '<meta charset=UTF-8>';

$server   = 'mysql.hostinger.com.br';
$user     = 'u460739071_slbe';
$password = '0slback1';
$database = 'u460739071_slbd';

$connection = mysql_connect($server, $user, $password);
mysql_select_db($database);

if ($connection === FALSE)
{
    echo 'Não foi possível estabelecer uma conexão com o gerenciador MYSQL <br/>';
    echo mysql_error();
}else{
    if(!mysql_select_db($database, $connection)){
        echo 'Não foi possível selecionar o banco de dados '.$database.'<br/>';
        echo mysql_error();
    }
}