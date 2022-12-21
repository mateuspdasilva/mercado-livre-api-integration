<?php include('../configs/database_config.php');?>
<?php include('../configs/token.php');?>
<?php
$curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.mercadolibre.com/answers',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
            "question_id": "12420996767", 
             "text":"resposta da pergunta" 
            }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization:Bearer '.$access_token
      ),
    ));
    
    $response = curl_exec($curl);
    
    $resultado = json_decode($response);
    
    
    var_dump($response);
    
    curl_close($curl);
    
    
    
    
    
    
    
    
    
    
?>