<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../abc/style1.css">
    <title>Agendar Aula - Autoescola</title>
   
</head>
<body>
    <div class="container">
      <h1>Agendar Aula</h1>
        <?php
        include '../PHP/conexaoBD.php';
        
        // Inicializa as variáveis
        $id = '';
        $instrutor = '';
        $cpf = '';
        $aluno = '';
        $data = '';
        $hora = '';
        $pago = '';
        $carro = '';
        
        // Verifica se um ID foi passado na URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            
            // Busca os dados da aula pelo ID
            $sql = "SELECT * FROM aula WHERE idaula = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            // Preenche os campos do formulário com os dados da aula
            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                $instrutor = $linha['instrutor'];
                $cpf = $linha['cpf'];
                $aluno = $linha['aluno'];
                $data = date('Y-m-d', strtotime($linha['data']));
                $hora = $linha['hora'];
                $pago = $linha['pago'];
                $veiculo = $linha['veiculo'];
            }
            
            $stmt->close();
        }
        
        $conexao->close();
        ?>
        <form action="../PHP/editarSalvarAulas.php" method="post">
        <input type="hidden" name="idEditar" value="<?php echo $id; ?>">
            <label for="instrutor">Nome do Instrutor:</label>
            <input type="text" id="instrutorID" name="instrutor" value="<?php echo $instrutor; ?>" >

            <label for="aluno">CPF do Aluno:</label>
            <input type="text" id="cpfID" name="cpf"value="<?php echo $cpf; ?>">

            <button type="submit" class="button">Buscar</button>

            <label for="aluno">Nome do Aluno:</label>
            <input type="text" id="alunoID" name="aluno" value="<?php echo $aluno; ?>" required>
            
            <label for="data">Data:</label>
            <input type="date" id="dataID" name="data" value="<?php echo $data; ?>" required>
            
            <label for="hora">Hora:</label>
            <input type="time" id="horaID" name="hora" value="<?php echo $hora; ?>" required>
            
            <label for="paga">Aula Paga?</label>
            <select id="pagoId" name="pago">
                <option value="sim" <?php if ($pago == 'sim') echo 'selected'; ?>>Sim</option>
                <option value="nao"<?php if ($pago == 'nao') echo 'selected'; ?>>Não</option>
            </select>
            
            <label for="carro">Marca do Carro:</label>
            <input type="text" id="carro" name="veiculo" value="<?php echo $veiculo; ?>" required>
            
            <button type="submit" class="button" name="agendar">Agendar</button>
        </form>
    </div>
</body>
</html>
