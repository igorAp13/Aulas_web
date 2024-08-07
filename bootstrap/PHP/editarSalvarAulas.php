<?php
    session_start();
    include 'conexaoBD.php';
    
    if(isset($_POST['agendar'])){
    $data = filter_input(INPUT_POST, 'data' , FILTER_SANITIZE_STRING);
    $hora = filter_input(INPUT_POST, 'hora' , FILTER_SANITIZE_STRING);
    $instrutor = filter_input(INPUT_POST, 'instrutor' , FILTER_SANITIZE_STRING);
    $aluno = filter_input(INPUT_POST, 'aluno' , FILTER_SANITIZE_STRING);
    $veiculo = filter_input(INPUT_POST, 'veiculo' , FILTER_SANITIZE_STRING);
    $pago = filter_input(INPUT_POST, 'pago' , FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf' , FILTER_SANITIZE_STRING);

    if(empty($data) || empty($hora) || empty($instrutor) || empty($aluno) || empty($veiculo) || empty($pago) || empty($cpf)){
        echo"<script>
                alert('Algum campo esta em branco');
            </script>";
        exit();
    }
    else{
    $declaracaoBD=$conexao->prepare("INSERT INTO `aula`(`data`,`hora`,`instrutor`,`aluno`,`veiculo`,`pago`,`cpf`)VALUES(?,?,?,?,?,?,?)");
    $declaracaoBD->bind_param("sssssss",$data,$hora,$instrutor,$aluno,$veiculo,$pago,$cpf);

    if($declaracaoBD->execute()){
        echo "<script>
                alert('aula cadastrada com secesso!');
                window.location.href = '../HTML/cadastrarAula.php';
            </script>";
        }
        else{
            echo "Erro ao cadastrar a aula: ". $declaracaoBD->error;
        }
    }
    }
    
?>