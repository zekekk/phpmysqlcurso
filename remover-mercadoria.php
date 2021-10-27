<?php

    require 'banco-mercadoria.php';

    remover_mercadoria($conexao,$_GET['id']);

    header('Location: cadastro-mercadoria.php');

?>