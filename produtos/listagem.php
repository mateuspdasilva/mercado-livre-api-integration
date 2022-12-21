<?php include('../configs/database_config.php'); ?>
<?php include('../configs/token.php'); ?>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mercadolibre.com/users/' . $id_loja . '/items/search/?offset=0&limit=10',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
  ),
));

$response = curl_exec($curl);


$resultado = json_decode($response);


echo 'Total de cadastros: ' . $resultado->paging->total;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Titulo</th>
      <th>Preco</th>
      <th>Estoque</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($resultado->results as $linhas) {

      $curl_item = curl_init();

      curl_setopt_array($curl_item, array(
        CURLOPT_URL => 'https://api.mercadolibre.com/items/' . $linhas,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Authorization:Bearer ' . $access_token
        ),
      ));


      $response_item = curl_exec($curl_item);

      $resultado_item = json_decode($response_item);

    ?>



      <tr>
        <td><?php echo $linhas; ?></td>
        <td><?php echo $resultado_item->title; ?></td>
        <td>R$ <?php echo $resultado_item->price; ?></td>
        <td><?php echo $resultado_item->available_quantity; ?></td>
      </tr>

    <?php

      curl_close($curl_item);
    }



    curl_close($curl);
    ?>
  <tbody>
</table>