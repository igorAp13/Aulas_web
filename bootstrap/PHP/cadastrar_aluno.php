<?php
    session_start();
    include 'conexaoBD.php';

    if(isset($_POST['btnCad'])){ 
    $nome = filter_input(INPUT_POST, 'nome' , FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf' , FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular' , FILTER_SANITIZE_STRING);
    $whatsapp = filter_input(INPUT_POST, 'whatsapp' , FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_STRING);
    $categoria = filter_input(INPUT_POST, 'categoria' , FILTER_SANITIZE_STRING);
        
        if(empty($nome) || empty($cpf) || empty($celular) || empty($whatsapp) || empty($email) || empty($categoria)){
            echo"<script>
                    alert('Preencha todos os campos!!!');
                    window.location.href ='../HTML/cadAluno.php;'
                </script>";
            exit;
        }

        $declaracao=$conexao->prepare("select cpf from cadaluno where cpf = ?");
        $declaracao->bind_param("s",$cpf);
        $declaracao->execute();
        $declaracao->store_result();
        
        if($declaracao->num_rows>0){
            echo"<script>
                  alert('Esse cpf já foi cadastrado no sistema!!!');
                  window.location.href ='../HTML/cadAluno.php'
                </script>";
             exit;
             $declaracao->close();
            }
        //$stmt
        $declaracao = $conexao->prepare("INSERT INTO `cadaluno`(`nome`,`cpf`,`celular`,`whatsapp`,`email`,`categoria`) VALUES (?,?,?,?,?,?)");

        $declaracao->bind_param("ssssss", $nome, $cpf, $celular, $whatsapp, $email, $categoria);
        if ($declaracao->execute()){
            echo"<script>
                    alert('Aluno cadastrado com sucesso');
                    window.location.href ='../HTML/cadAluno.php'
                </script>";
        }

        else{
            echo "Erro ao cadastro aluno: " . $declaracao->error;
        }
        $declaracao->close();
        $conexao->close();
    }

    if(isset($_POST['btnCpf'])){
        $buscar_cpf = $_POST['cpf'];

        //Consulta para buscar CPF

        $stmt = $conexao->prepare("SELECT nome, cpf, celular, whatsapp, email, categoria FROM cadaluno WHERE cpf = ?");
        $stmt->bind_param("s", $buscar_cpf);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->bind_result($nome, $cpf, $celular, $whatsapp, $email, $categoria);
            $stmt->fetch();
            $_SESSION['nome'] = $nome;
            $_SESSION['cpf'] = $cpf;
            $_SESSION['celular'] = $celular;
            $_SESSION['whatsapp'] = $whatsapp;
            $_SESSION['email'] = $email;
            $_SESSION['categoria'] = $categoria;

            header("Location: ../HTML/cadAluno.php");
            exit;

        }

        else{
            echo"<script>
                    alert ('CPF não encontrado!')
                    window.location.href ='../HTML/cadAluno.php'
                 </script>";
        }

        //Fecha a declaração e a conexão
        $stmt->close();
        $conexao->close();
    }

?>