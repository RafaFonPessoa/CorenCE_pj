<?php
require_once "./db/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST["item_id"];
    $increment = $_POST["increment"];

    // Consulta SQL para obter a quantidade atual do item
    $sql = "SELECT quantidade FROM tabela_itens WHERE id = '$item_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantidade_atual = $row["quantidade"];
        $nova_quantidade = $quantidade_atual + $increment;

        if ($nova_quantidade >= 0) {
            // Atualizar a quantidade do item no banco de dados
            $update_sql = "UPDATE tabela_itens SET quantidade = '$nova_quantidade' WHERE id = '$item_id'";
            if ($conn->query($update_sql) === TRUE) {
                // Responder ao cliente que a atualização foi bem-sucedida
                echo "success";
            } else {
                // Responder ao cliente em caso de erro na atualização
                echo "update_error: " . $conn->error;
            }
        } else {
            // Responder ao cliente caso a nova quantidade seja negativa (quantidade não pode ser negativa)
            echo "negative_quantity";
        }
    } else {
        // Responder ao cliente caso o item não seja encontrado no banco de dados
        echo "item_not_found";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
