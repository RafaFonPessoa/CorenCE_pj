<?php
require_once "./db/conn.php";

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];

    // Inserir o novo item no banco de dados
    $sql = "INSERT INTO tabela_itens (nome, quantidade) VALUES ('$nome', '$quantidade')";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página principal após adicionar o item
        header("Location: ../pages/almox.php");
        exit;
    } else {
        // Erro ao cadastrar o item no banco de dados
        echo "<script>alert('Erro ao adicionar item.');</script>";
        echo "<script>window.location.href = '../pages/almox.php'</script>";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
