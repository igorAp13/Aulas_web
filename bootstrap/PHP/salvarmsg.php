<?php 
    include 'conexaoBD.php';
 
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha' , FILTER_SANITIZE_STRING);
    $endereco1 = filter_input(INPUT_POST, 'endereco1' , FILTER_SANITIZE_STRING);
    $endereco2 = filter_input(INPUT_POST, 'endereco2' , FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade' , FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado' , FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep' , FILTER_SANITIZE_STRING);

    $salvar = "INSERT INTO `cadastro`(`email`,`senha`,`endereco1`,`endereco2`,`cidade`,`estado`,`cep`) VALUES ('$email','$senha','$endereco1','$endereco2','$cidade','$estado','$cep')";

    $resultado = mysqli_query($conexao,$salvar);

    if($resultado){
        echo"<script>
            window.location.href ='../formCadastro.html?status=success';
             </script>";
    }
    
    else{
        echo"<script>
        window.location.href ='../formCadastro.html?status=error';
        </script>";
    }
?>