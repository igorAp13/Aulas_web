<?php
include "conexaoBD.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descricao = filter_input(INPUT_POST, 'descricao' , FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data' , FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor' , FILTER_SANITIZE_NUMBER_FLOAT);
    $tipo = filter_input(INPUT_POST, 'tipo' , FILTER_SANITIZE_STRING);

    $declaracao = $conexao->prepare("INSERT INTO `despesas`(`descricao`,`data`,`valor`,`tipo`) VALUES (?,?,?,?)");

    $declaracao->bind_param("ssss", $descricao, $data, $valor, $tipo);
    if ($declaracao->execute()){
        echo"<script>
                alert('Despesa cadastrada');
                window.location.href ='../HTML/despesas.php'
            </script>";
    }

    else{
        echo "Erro ao cadastra despesa: " . $declaracao->error;
    }
    $declaracao->close();
    $conexao->close();
}
?>