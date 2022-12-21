<?php include('../configs/database_config.php'); ?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mercadolibre.com/sites/MLB/categories/all',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' . $access_token,
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$resultado = json_decode($response);
echo '<select>';
foreach ($resultado as $linhas) {
  echo '<option>' . $linhas->id . '</option>';
}
echo '</select>';
curl_close($curl);

?>








