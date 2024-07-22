<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estilização</title>
    <?php
        $text = $_POST['text'];
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
    ?> 

    <style>
        span.text{
            font-size: <?php echo $tamanho; ?>;
            color: <?php echo $cor; ?>;
        }
    </style>
</head>
<body>
    <h1>Veja o resultado do seu texto:</h1>

    <?php 
        echo"<span class = 'text'> $text </span>"
    ?>
</body>
</html>