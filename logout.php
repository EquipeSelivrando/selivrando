<?php
session_start();
include_once 'conexao/conecta.inc';

session_destroy();
echo '<script> location.href="index.php" </script>';