<?php include('./configs/database_config.php'); ?>
<?php include('./configs/token.php'); ?>
<?php
//se não houver o token, será redirecionado para a solicitação de permissão 
//se houver o token, o app retorna o id da loja e nome do usuário
if ($code == '') {
    include('./configs/permissao.php');
} else {
    echo 'Tudo certo!<br>';
    echo 'ID: ' . $id_loja . '<br>';
    echo 'Usuario: ' . $first_name . '<br>';
}
?>




