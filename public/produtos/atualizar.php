<?php include('../configs/database_config.php'); ?>
<?php include('../configs/token.php'); ?>
<?php
$curl = curl_init();

$dados['price']                 = "5500.99";
$dados['available_quantity']    = "45";

$dados['title']    = "titulo teste dos guri";

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mercadolibre.com/items/MLB2766727863',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 0, //Segundos limite para execução do cURL
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, //VERSÃO CURL
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => json_encode($dados),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Accept: application/json',
    'Authorization:Bearer ' . $access_token
  ),
));

$response = curl_exec($curl);

$resultado = json_decode($response);

if ($resultado->id <> "") {
  echo '<b style="color: green;">Produto atualizado</b>';
} else {
  echo '<b style="color: red;">Erro ao atualizar</b>';
}

curl_close($curl);

?>