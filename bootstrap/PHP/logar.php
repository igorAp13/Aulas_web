<?php
    session_start();
    include 'conexaoBD.php';
    if(isset($_POST['logar'])){
        $email = filter_input(INPUT_POST,'cpEmail',FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST,'cpSenha',FILTER_SANITIZE_STRING);
        
        if(strlen($_POST['cpEmail'])==0){
            echo "<script>
                  alert('Preencha o campo Email')
                  window.location.href= '../HTML/login.html'
                 </script>";
          
            //echo "Preencha o campo email.";
        }
        else if(strlen($_POST['cpSenha'])==0){
            echo "<script>
                    alert('Preencha o campo senha')
                    window.location.href= '../HTML/login.html'
                  </script>";
            //echo "Preencha o campo senha.";
        }
        else{
            $stmt = $conexao->prepare("select email,idusuario from cadastro where senha = ? and email = ?");
            $stmt->bind_param("ss", $senha, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 1){
               $usuario = $result->fetch_assoc();
               $_SESSION['id'] = $usuario['idusuario'];
               $_SESSION['email'] = $usuario['email'];
                echo "<script>
                  alert ('Email verificado com sucesso! Bem vindo ao sistema, ".$usuario['email']."!')
                  window.location.href= '../abc/bemVindo.php'
                </script>";
               exit;
            }

            else{
                echo "<script>
                    alert('Email ou Senha incorretos')
                    window.location.href= '../HTML/login.html'
                  </script>";
                exit;
            }
        }
    }
?>