<?php include('../configs/database_config.php');?>
<?php include('../config/token.php');?>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mercadolibre.com/questions/search?seller_id='.$id_loja.'&api_version=4',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization:Bearer '.$access_token
  ),
));

    $response = curl_exec($curl);
    
    
    $resultado = json_decode($response);
    
    echo $resultado->paging->total;
    
    foreach ($resultado->questions as $linhas) {
        echo $linhas->id.' - '.$linhas->item_id.' - '.$linhas->date_created.' - '.$linhas->text.'<br>';
    }
    
curl_close($curl);
    
?>
