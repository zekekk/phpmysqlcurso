<?php

    require 'banco-lote.php';

    remover_lote($conexao,$_GET['id']);

    header('Location: cadastro-lote.php');

?>