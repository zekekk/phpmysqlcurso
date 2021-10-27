<?php

include 'banco.php';
include 'ajudantes.php';

$tem_erros = false;
$erros_validacao = [];

if(tem_post()){

}

$tarefa = buscar_mercadorias($conexao, $_GET['id']);

include 'template_tarefa.php';

?>