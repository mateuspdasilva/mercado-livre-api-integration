<?php include('../configs/database_config.php'); ?>
<?php include('../configs/token.php'); ?>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(

  CURLOPT_URL => 'https://api.mercadolibre.com/orders/search?seller=' . $id_loja . '&order.date_created.from=2022-07-28T00:00:00.000-00:00&order.date_created.to=2022-08-01T23:59:59.000-04:00',
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

$response = curl_exec($curl);
$resultado = json_decode($response);

$resultado_faturamento = json_decode($response);
//var_dump($response);
curl_close($curl);
?>
<?php
foreach ($resultado_faturamento->results as $linhas_faturamento) {
  $total_pedidos_mercadolivre = count($resultado_faturamento->results);
  $i = 0;
  foreach ($linhas_faturamento->payments as $linhas_faturamento) {
    $faturamento_mercadolivre      += $linhas_faturamento->total_paid_amount;

    if (++$i > 0) break;
  }
}
$ticket_medio_mercadolivre      = ($faturamento_mercadolivre / $total_pedidos_mercadolivre);
?>
Total de pedidos: <?php echo $total_pedidos_mercadolivre; ?>
<br>
Total R$ <?php echo number_format($faturamento_mercadolivre, 2, ',', '.'); ?>
<br>
Ticket medio: R$ <?php echo number_format($ticket_medio_mercadolivre, 2, ',', '.'); ?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- CORRIGIR URL NA LINHA 70 ANTES DE RODAR ESRA REQUEST -->

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Data</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultado->results as $linhas) { ?>
      <tr>
        <?php
        $i = 0;
        foreach ($linhas->payments as $linhas_payments) {
          echo '<td><a href="https://https://localhost/index.php/vendas/pedidos.php/?idVenda=' . $linhas_payments->order_id . '">' . $linhas_payments->order_id . '</a></td>';
          echo '<td>' . $linhas_payments->date_approved . '</td>';
          echo '<td>R$ ' . number_format($linhas_payments->total_paid_amount, 2, ',', '.') . '</td>';
          echo '<td>' . $linhas_payments->status . '</td>';
          if (++$i > 0) break;
        }
        ?>
      </tr>
    <?php } ?>
  </tbody>
</table>