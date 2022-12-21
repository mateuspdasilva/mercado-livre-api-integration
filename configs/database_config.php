<?php

$servername = "mysql";
$username   = "root";
$password   = "root";
$db_name    = "default";

$conexao = mysqli_connect($servername, $username, $password, $db_name);


$sql_access_token = mysqli_query($conexao, "SELECT * FROM tokenmercado WHERE id = '1'") or die("Erro");
$resultado_access_token  = mysqli_fetch_assoc($sql_access_token);


$access_token   = $resultado_access_token['access_token'];
$code           = $resultado_access_token['code'];
$client_id      = $resultado_access_token['client_id'];
$client_secret  = $resultado_access_token['client_secret'];
