<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.mercadolibre.com/oauth/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
            "grant_type":"authorization_code",
            "client_id": ' . $client_id . ',
            "client_secret": ' . $client_secret . ',
            "code": ' . $_GET['code'] . ',
            "redirect_uri":"https://localhost/index.php/",
            "accept":" application/json",
            "content-type": "application/x-www-form-urlencoded"
            }'
));

$response = curl_exec($curl);
$resultado = json_decode($response);


$query = "UPDATE tokenmercado SET
                code = '" . $resultado->refresh_token . "',
                access_token = '" . $resultado->access_token . "'
            WHERE id='1'";
mysqli_query($conexao, $query);

curl_close($curl);
echo '<a href="https://auth.mercadolivre.com.br/authorization?response_type=code&client_id=' . $client_id . '&redirect_uri=https://localhost/index.php/">Solicitar permissão</a>';
