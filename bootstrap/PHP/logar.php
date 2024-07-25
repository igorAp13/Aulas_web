<?php
    include 'conexaoBD.php';
    if(isset($_POST['logar'])){
        $email = filter_input(INPUT_POST,'cpEmail',FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST,'cpSenha',FILTER_SANITIZE_STRING);
        
        if(strlen($_POST['cpEmail'])==0){
            "<script>
                 if(cpEmail){
                      alert('Preencha o campo Email')
                 }
            </script>";
          
            //echo "Preencha o campo email.";
        }
        else if(strlen($_POST['cpSenha'])==0){
            "<script>
                    alert(Preencha o campo 'senha'.)
            </script>";
            //echo "Preencha o campo senha.";
        }
        else{
            
        }
    }
?>