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


//buscar mercadorias
function buscar_mercadorias($conexao){
    $sqlBusca = 'SELECT * FROM mercadorias';
    $resultado = mysqli_query($conexao,$sqlBusca);

    $mercadorias = [];

    while($mercadoria = mysqli_fetch_assoc($resultado)){
        $mercadorias[] = $mercadoria;
    }

    return $mercadorias; 

}

//inserir mercadorias no banco
function inserir_mercadoria($conexao, $mercadoria){
    /*if($mercadoria['validadeProduto'] == ''){
        $validadeProduto = 'null';
    }else{
        $validadeProduto = $mercadoria['validadeProduto'];
    }*/

    $sqlInserir = "INSERT INTO mercadorias
     (codBarra,validadeProduto,marcaProduto,precoProduto,tipoProduto,pesoProduto) 
     VALUES
                    (
                    '{$mercadoria['codBarra']}',
                    '{$mercadoria['validadeProduto']}',
                    '{$mercadoria['marcaProduto']}',
                    '{$mercadoria['precoProduto']}',
                    '{$mercadoria['tipoProduto']}',
                    '{$mercadoria['pesoProduto']}'
                    )";

    mysqli_query($conexao, $sqlInserir);

}


function buscar_mercadoria_para_editar($conexao,$id){

    $sqlBusca = 'SELECT * FROM mercadorias WHERE id = ' .$id;

    $resultado = mysqli_query($conexao,$sqlBusca);

    return mysqli_fetch_assoc($resultado);    
}


function editar_mercadoria($conexao, $mercadoria){

    /*$sqlBusca = "UPDATE `mercadorias` SET 
                `codBarra` = '{$mercadoria['codBarra']}', 
                `validadeProduto` = '{$mercadoria['validadeProduto']}', 
                `marcaProduto` = '{$mercadoria['marcaProduto']}', 
                `precoProduto` = '{$mercadoria['precoProduto']}', 
                `tipoProduto` = '{$mercadoria['tipoProduto']}', 
                `pesoProduto` = '{$mercadoria['pesoProduto']}' 
                WHERE `mercadorias`.`id` = {$mercadoria['id']}";*/
    
    $sqlBusca = "UPDATE mercadorias SET
                    codBarra =  '{$mercadoria['codBarra']}',
                    validadeProduto = '{$mercadoria['validadeProduto']}',
                    marcaProduto = '{$mercadoria['marcaProduto']}',
                    precoProduto = '{$mercadoria['precoProduto']}',
                    tipoProduto = '{$mercadoria['tipoProduto']}',
                    pesoProduto = '{$mercadoria['pesoProduto']}'
                    WHERE id = {$mercadoria['id']}";
    
    mysqli_query($conexao,$sqlBusca);

}


function remover_mercadoria($conexao, $id){
    
    $sqlDelete = "DELETE FROM mercadorias WHERE id = {$id}";

    mysqli_query($conexao,$sqlDelete);
}

?>