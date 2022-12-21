<?php include('../configs/database_config.php'); ?>
<?php
$curl = curl_init();

$dados['title']                 = "produto teste - nao comprar";
$dados['category_id']           = "MLB38870";
$dados['price']                 = "7000.97";
$dados['currency_id']           = "BRL";
$dados['available_quantity']    = "7";
$dados['buying_mode']           = "buy_it_now";
$dados['condition']             = "new";
$dados['listing_type_id']       = "bronze";

$dados['pictures'][0]['source'] = "https://http2.mlstatic.com/D_NQ_NP_728237-MLB43823334592_102020-O.webp";
$dados['pictures'][1]['source'] = "https://http2.mlstatic.com/D_NQ_NP_964118-MLB43823345319_102020-O.webp";

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mercadolibre.com/items',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($dados),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
  ),
));

$response = curl_exec($curl);

$resultado = json_decode($response);

var_dump($response);
curl_close($curl);


//CRIAR DESCRIÇÃO
$curl_desc = curl_init();

curl_setopt_array($curl_desc, array(
  CURLOPT_URL => 'https://api.mercadolibre.com/items/' . $resultado->id . '/description',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{
          "plain_text" = "description test"
      }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
  ),
));

$response_desc = curl_exec($curl_desc);

$resultado_desc = json_decode($response_desc);

curl_close($curl_desc);

?>