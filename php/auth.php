<?php
    require_once "./db/conn.php";

    // Verificar se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter os dados do formulário
        $user = $_POST["user"];
        $password = $_POST["password"];
        
        // Verificar se o usuário existe no banco de dados
        $sql = "SELECT * FROM tabela_usuarios WHERE username = '$user'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Usuário encontrado, verificar a senha
            $row = $result->fetch_assoc();
            if ($row["password"] === $password) {
                // Senha correta, redirecionar para a página principal
                echo "<script>window.location.href = '../pages/almox.html'</script>";
            } else {
                // Senha incorreta, exibir mensagem de erro
                echo "<script>alert('Usuário ou senha incorretos. Tente novamente.');</script>";
                echo "<script>window.location.href = '../pages/login.html'</script>";
            }
        } else {
            // Usuário não encontrado, exibir mensagem de erro
            echo "<script>alert('Usuário ou senha incorretos. Tente novamente.');</script>";
            echo "<script>window.location.href = '../pages/login.html'</script>";
        }
        
        // Fechar a conexão com o banco de dados
        $conn->close();
    }
?>







