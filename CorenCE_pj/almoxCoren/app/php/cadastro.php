<?php
    require_once "./db/conn.php";

    // Verificar se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter os dados do formulário
        $user = $_POST["user"];
        $password = $_POST["password"];
        
        // Verificar se o usuário já existe no banco de dados
        $sql = "SELECT * FROM tabela_usuarios WHERE username = '$user'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Usuário já cadastrado, exibir alerta e redirecionar para cadastro.html
            echo "<script>alert('Usuário já cadastrado. Tente outro nome de usuário.');</script>";
            echo "<script>window.location.href = '../pages/cadastro.html'</script>";
        } else {
            // Usuário não existe, realizar o cadastro no banco de dados
            $sql = "INSERT INTO tabela_usuarios (username, password) VALUES ('$user', '$password')";
        
            if ($conn->query($sql) === TRUE) {
                // Cadastro realizado com sucesso, redirecionar para transicao.html
                echo "<script>window.location.href = '../pages/transicao.html'</script>";
            } else {
                // Erro ao cadastrar no banco de dados
                echo "<script>alert('Erro ao cadastrar usuário.');</script>";
                echo "<script>window.location.href = '../pages/cadastro.html'</script>";
            }
        }
        
        // Fechar a conexão com o banco de dados
        $conn->close();
    }
?>






