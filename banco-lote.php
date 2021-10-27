<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '123456';
$bdBanco = 'supermercado';

$conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco);

if(mysqli_connect_errno()){
    echo 'Problemas na conexão do Banco de Dados:';
    echo mysqli_connect_error();
    die();
}

function buscar_lotes($conexao){
    $sqlBusca = 'SELECT * FROM supermercado.estoques';
    $resultado = mysqli_query($conexao,$sqlBusca);

    $lotes = [];

    while($lote = mysqli_fetch_assoc($resultado)){
        $lotes[] = $lote;
    }

    return $lotes;

}

function inserir_lote($conexao, $lote){

    $sqlInserir = "INSERT INTO `estoques` (`id`, 
        `codLote`, `validadeLote`, `marcaLote`, 
        `tipoLote`, `valorLote`, `quantidadeLote`, 
        `fornecedorLote`) 
    VALUES 
        (NULL, 
        '{$lote['codLote']}', 
        '{$lote['validadeLote']}', 
        '{$lote['marcaLote']}', 
        '{$lote['tipoLote']}', 
        '{$lote['valorLote']}', 
        '{$lote['quantidadeLote']}', 
        '{$lote['fornecedorLote']}'
        )";

    mysqli_query($conexao, $sqlInserir);
}


function buscar_lote_para_editar($conexao,$id){

    $sqlBusca = 'SELECT * FROM estoques WHERE id = ' .$id;

    $resultado = mysqli_query($conexao,$sqlBusca);

    return mysqli_fetch_assoc($resultado);
}


function editar_lote($conexao, $lote){

    $sqlBusca = "UPDATE estoques SET
                    codLote =  '{$lote['codLote']}',
                    validadeLote = '{$lote['validadeLote']}',
                    marcaLote = '{$lote['marcaLote']}',
                    tipoLote = '{$lote['tipoLote']}',
                    valorLote = '{$lote['valorLote']}',
                    quantidadeLote = '{$lote['quantidadeLote']}',
                    fornecedorLote = '{$lote['fornecedorLote']}'
                    WHERE id = {$lote['id']}";
    
    mysqli_query($conexao,$sqlBusca);
}

function remover_lote($conexao, $id){
    $sqlDelete = "DELETE FROM estoques WHERE id = {$id}";

    mysqli_query($conexao,$sqlDelete);
}

?>