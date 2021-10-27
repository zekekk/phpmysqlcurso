<?php

//session_start();

require 'banco-lote.php';
require 'ajudantes.php';

$exibir_tabela = true;
$tem_erros = false;
$erros_validacao = [];

$lista_lotes = buscar_lotes($conexao);

if(tem_post()){
    $lote = [
        'codLote' => $_POST['codLote'],
        'validadeLote' => '',
        'marcaLote' => '',
        'tipoLote' => '',
        'valorLote' => '',
        'quantidadeLote' => '',
        'fornecedorLote' => '',
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
        inserir_lote($conexao, $lote);
        header('Location: cadastro-lote.php');
        die();
    }
}

$lote = [
    'id'=> 0,
    'codLote' => $_POST['codLote'] ?? '',
    'validadeLote' => (isset($_POST['validadeLote'])) ? traduz_data_para_banco($_POST['validadeLote']) : '',
    'marcaLote' => $_POST['marcaLote'] ?? '',
    'tipoLote' => $_POST['tipoLote'] ?? '',
    'valorLote' => $_POST['valorLote'] ?? '',
    'quantidadeLote' => $_POST['quantidadeLote'] ?? '',
    'fornecedorLote' => $_POST['fornecedorLote'] ?? '',
];



include 'navbar.php';
include 'template-lote.php';
include 'footer.php';


?>
