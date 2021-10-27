<?php

//session_start();

require 'banco-mercadoria.php';
require 'ajudantes.php';

$exibir_tabela = true;
$tem_erros = false;
$erros_validacao = [];

$lista_mercadorias = buscar_mercadorias($conexao);

if(tem_post()){
    $mercadoria = [
        'codBarra' => $_POST['codBarra'],
        'validadeProduto' => '',
        'marcaProduto' => '',
        'precoProduto' => '',
        'tipoProduto' => '',
        'pesoProduto' => '',
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
            $mercadoria['validadeProduto'] = traduz_data_para_banco($_POST['validadeProduto']);
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
        inserir_mercadoria($conexao, $mercadoria);
        header('Location: cadastro-mercadoria.php');
        die();
    }
    
}

$mercadoria = [
    'id'=> 0,
    'codBarra' => $_POST['codBarra'] ?? '',
    'validadeProduto' => (isset($_POST['validadeProduto'])) ? traduz_data_para_banco($_POST['validadeProduto']) : '',
    'marcaProduto' => $_POST['marcaProduto'] ?? '',
    'precoProduto' => $_POST['precoProduto'] ?? '',
    'tipoProduto' => $_POST['tipoProduto'] ?? '',
    'pesoProduto' => $_POST['pesoProduto'] ?? '',
];


include 'navbar.php';
include 'template-mercadoria.php';
include 'footer.php';

?>