<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Super Mercado</title>
</head>


<?php

require 'banco-mercadoria.php';
require 'ajudantes.php';
require 'navbar.php';

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = [];

if(array_key_exists('codBarra', $_POST) && $_POST['codBarra'] != ''){
    $mercadoria = [
        'id' => $_POST['id'],
        'codBarra' => $_POST['codBarra'],
        'validadeProduto' => $_POST['validadeProduto'],
        'marcaProduto' => $_POST['marcaProduto'],
        'precoProduto' => $_POST['precoProduto'],
        'tipoProduto' => $_POST['tipoProduto'],
        'pesoProduto' => $_POST['pesoProduto'],
    ];

    if(strlen($mercadoria['codBarra']) == 0){
      $tem_erros = true;
      $erros_validacao['codBarra'] = 'O código precisa ser inserido.';
    }

    if(strlen($mercadoria['codBarra']) > 0){
      if(validar_codBarra($_POST['codBarra'])){
          $mercadoria['codBarra'] = $_POST['codBarra'];
      }else{
          $tem_erros = true;
          $erros_validacao['codBarra'] = 'Precisa ser apenas números e 9 digitos';
      }
    }

    if(strlen($_POST['validadeProduto']) > 0){
      if(validar_data($_POST['validadeProduto'])){
          $mercadoria['validadeProduto'] = traduz_data_para_banco( $_POST['validadeProduto']);
      }else{
          $tem_erros = true;
          $erros_validacao['validadeProduto'] = 'O formato da data precisar ser DD/MM/AAAA';
      }
    }

    if(strlen($_POST['precoProduto']) > 0){
      if(validar_valor($_POST['precoProduto'])){
          $mercadoria['precoProduto'] =  $_POST['precoProduto'];
      }else{
          $tem_erros = true;
          $erros_validacao['precoProduto'] = 'Precisa ser apenas números ex: 9,99 ou 3.00 ou 4';
      }
    }

    
    if(array_key_exists('marcaProduto', $_POST)){
      $mercadoria['marcaProduto'] = $_POST['marcaProduto'];
    }

    if(array_key_exists('tipoProduto', $_POST)){
      $mercadoria['tipoProduto'] = $_POST['tipoProduto'];
    }

    if(array_key_exists('pesoProduto', $_POST)){
      $mercadoria['pesoProduto'] = $_POST['pesoProduto'];
    }

    if(!$tem_erros){
      editar_mercadoria($conexao, $mercadoria);
      echo "<script>window.location.href = 'cadastro-mercadoria.php';</script>";
      die();
    }

}

$mercadoria = buscar_mercadoria_para_editar($conexao, $_GET['id']);

$mercadoria['codBarra'] = (array_key_exists('codBarra',$_POST)) ? $_POST['codBarra'] : $mercadoria['codBarra'];

$mercadoria['validadeProduto'] = (array_key_exists('validadeProduto',$_POST)) ? $_POST['validadeProduto'] : $mercadoria['validadeProduto'];

$mercadoria['marcaProduto'] = (array_key_exists('marcaProduto',$_POST)) ? $_POST['marcaProduto'] : $mercadoria['marcaProduto'];

$mercadoria['precoProduto'] = (array_key_exists('precoProduto',$_POST)) ? $_POST['precoProduto'] : $mercadoria['precoProduto'];

$mercadoria['tipoProduto'] = (array_key_exists('tipoProduto',$_POST)) ? $_POST['tipoProduto'] : $mercadoria['tipoProduto'];

$mercadoria['pesoProduto'] = (array_key_exists('pesoProduto',$_POST)) ? $_POST['pesoProduto'] : $mercadoria['pesoProduto'];

include 'template-mercadoria.php';
require 'footer.php';

?>