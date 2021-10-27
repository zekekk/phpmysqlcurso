<?php 

function traduz_data_para_banco($data){
    if($data == ''){
        return '';
    }

    /*$objeto_data = DateTime::createFromFormat('d/m/Y', $data);

    return $objeto_data->format('Y-m-d');*/

    
    $dados = explode("/", $data);

    $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_banco;
}

function traduz_data_para_exibir($data){
    if($data == '' OR $data == '0000-00-00'){
        return '';
    }

    /*$objeto_data = DateTime::createFromFormat('Y-m-d', $data);

    return $objeto_data->format('d/m/Y');*/

    
    $dados = explode("-",$data);

    if(count($dados) != 3){
        return $data;
    }

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $data_exibir;
}

function traduz_valor_para_exibir($valor){
    
    $valor = 'R$'. $valor;
    
    return $valor;

}


function mostra_cpf($cpf){
    $padrao = '/([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})/';
    $verifica = preg_match($padrao,$cpf);

    if(!$verifica){
        return $cpf;
    }

    $cpfPartido = preg_split($padrao,$cpf,-1,PREG_SPLIT_DELIM_CAPTURE);

    return $cpfPartido[1].'.'.$cpfPartido[2].'.'.$cpfPartido[3].'-'.$cpfPartido[4];
}

function mostra_telefone($telefone){
    $padrao = '/([0-9]{2})+([0-9]{4,5})+([0-9]{4})/';
    $verifica = preg_match($padrao,$telefone);

    if(!$verifica){
        return $telefone;
    }

    $telPartido = preg_split($padrao,$telefone,-1,PREG_SPLIT_DELIM_CAPTURE);


    return '('.$telPartido[1].') '.$telPartido[2].'-'.$telPartido[3];

}

function tem_post(){
    if(count($_POST) > 0){
        return true;
    }else{
        return false;
    }
}

function validar_data($data){
    $expressao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($expressao, $data);

    if($resultado == 0){
        return false;
    }

    $dados = explode('/', $data);
    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    return checkdate($mes,$dia,$ano);
}

function validar_codLote($codigo_lote){
    $expressao = '/\d{7,7}/';
    $resultado_lote = preg_match($expressao, $codigo_lote);

    return($resultado_lote == 1);

}

function validar_codBarra($codigo){
    $expressao = '/\d{9,9}/';
    $resultado = preg_match($expressao, $codigo);

    return($resultado == 1);
}

function validar_quantidade($valor){
    $expressao = '/^[0-9][0-9,\.]+$/';
    $resultado = preg_match($expressao, $valor);

    return($resultado == 1);
}

function validar_valor($valor){
    $expressao = '/([0-9]+[\.]*[0-9]*[\,.]*[0-9]+$*)/';
    $resultado1 = preg_match($expressao, $valor);

    return($resultado1 == 1);

}

?>
