<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Super Mercado</title>
</head>

<?php

require 'banco-lote.php';
require 'ajudantes.php';
require 'navbar.php';


$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = [];

if (array_key_exists('codLote', $_POST) && $_POST['codLote'] != '') {
    $lote = [
        'id' => $_POST['id'],
        'codLote' => $_POST['codLote'],
        'validadeLote' => $_POST['validadeLote'],
        'marcaLote' => $_POST['marcaLote'],
        'tipoLote' => $_POST['tipoLote'],
        'valorLote' => $_POST['valorLote'],
        'quantidadeLote' => $_POST['quantidadeLote'],
        'fornecedorLote' => $_POST['fornecedorLote'],
    ];

      if(strlen($lote['codLote']) == 0){
        $tem_erros = true;
        $erros_validacao['codLote'] = 'O código precisa ser inserido.';
    }

    if(strlen($lote['codLote']) > 0){
        if(validar_codLote($_POST['codLote'])){
            $lote['codLote'] = $_POST['codLote'];
        }else{
            $tem_erros = true;
            $erros_validacao['codLote'] = 'Precisa ser apenas números e 7 digitos';
        }
    }

    if(strlen($_POST['validadeLote']) > 0){
        if(validar_data($_POST['validadeLote'])){
            $lote['validadeLote'] = traduz_data_para_banco( $_POST['validadeLote']);
        }else{
            $tem_erros = true;
            $erros_validacao['validadeLote'] = 'O formato da data precisar ser DD/MM/AAAA';
        }
    }

    if(array_key_exists('marcaLote', $_POST)){
        $lote['marcaLote'] = $_POST['marcaLote'];
    }

    if(array_key_exists('tipoLote', $_POST)){
        $lote['tipoLote'] = $_POST['tipoLote'];
    }

    if(strlen($_POST['valorLote']) > 0){
        if(validar_valor($_POST['valorLote'])){
            $lote['valorLote'] =  $_POST['valorLote'];
        }else{
            $tem_erros = true;
            $erros_validacao['valorLote'] = 'Precisa ser apenas números ex: 9,99 ou 3.00 ou 4';
        }
    }

    if(strlen($_POST['quantidadeLote']) > 0){
        if(validar_quantidade($_POST['quantidadeLote'])){
            $lote['quantidadeLote'] =  $_POST['quantidadeLote'];
        }else{
            $tem_erros = true;
            $erros_validacao['quantidadeLote'] = 'Precisa ser apenas números';
        }
    }

    if(array_key_exists('fornecedorLote', $_POST)){
        $lote['fornecedorLote'] = $_POST['fornecedorLote'];
    }

    if(!$tem_erros){
        editar_lote($conexao, $lote);
        echo "<script>window.location.href = 'cadastro-lote.php';</script>";
        die();
    }
        
}

$lote = buscar_lote_para_editar($conexao, $_GET['id']);

$lote['codLote'] = (array_key_exists('codLote',$_POST)) ? $_POST['codLote'] : $lote['codLote'];

$lote['validadeLote'] = (array_key_exists('validadeLote',$_POST)) ? $_POST['validadeLote'] : $lote['validadeLote'];

$lote['marcaLote'] = (array_key_exists('marcaLote',$_POST)) ? $_POST['marcaLote'] : $lote['marcaLote'];

$lote['tipoLote'] = (array_key_exists('tipoLote',$_POST)) ? $_POST['tipoLote'] : $lote['tipoLote'];

$lote['valorLote'] = (array_key_exists('valorLote',$_POST)) ? $_POST['valorLote'] : $lote['valorLote'];

$lote['quantidadeLote'] = (array_key_exists('quantidadeLote',$_POST)) ? $_POST['quantidadeLote'] : $lote['quantidadeLote'];

$lote['fornecedorLote'] = (array_key_exists('fornecedorLote',$_POST)) ? $_POST['fornecedorLote'] : $lote['fornecedorLote'];

include 'template-lote.php';
require 'footer.php';

?>