<?php
include "conexaoBD.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descricao = filter_input(INPUT_POST, 'descricao' , FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data' , FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor' , FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo' , FILTER_SANITIZE_STRING);
    // "Formatação" do valor para enviar ao banco de dados com "." 
    $valor = str_replace(',','.',$valor);
    $valor = floatval($valor);

    $declaracao = $conexao->prepare("INSERT INTO `despesas`(`descricao`,`data`,`valor`,`tipo`) VALUES (?,?,?,?)");

    $declaracao->bind_param("ssss", $descricao, $data, $valor, $tipo);
    if ($declaracao->execute()){
        $declaracao = $conexao -> prepare("SELECT tipo, descricao, valor, data from despesas order by data desc;");
        $declaracao -> execute();
        $resultado = $declaracao -> get_result();
        $contas = "";

        // Código para exibir os dados a tabela
        while($linha = $resultado -> fetch_assoc()){
            $valorFormatado = number_format($linha['valor'], 2, ',','.');
            $dataFormatada = date('d/m/Y', strtotime($linha['data']));
            $contas .= 
            "<tr>
                <th>{$linha['tipo']}</th>
                <th>{$linha['descricao']}</th>
                <th>R$ {$valorFormatado}</th>
                <th>{$dataFormatada}</th>
            </tr>";
        }
        $_SESSION['contas'] = $contas;

        // Código para exibir o valor total das despesas
        $declaracao = $conexao->prepare
        ("SELECT SUM(valor) AS total FROM DESPESAS");
        $declaracao->execute();
        $resultado = $declaracao -> get_result();
        $row = $resultado -> fetch_assoc();
        $total = $row ['total'] ?? 0;
        $_SESSION['totalFormatado'] = number_format($total, 2, ',','.');

        // "Reformatação" do valor para a exibir ao usuário com ","
        $totalFormatado = number_format($total, 2, ',','.');

        // Mensagem para confirmar que determinada despesa foi salva ao banco
        echo"<script>
                alert('Despesa cadastrada com sucesso');
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