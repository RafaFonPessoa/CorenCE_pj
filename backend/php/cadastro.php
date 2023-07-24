<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href=".../frontend/styles/images/coren-ce_favicon.ico.../frontend/styles/images/coren-ce_favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href=".../frontend/styles/login_cadastro_style.css">
    <title>Pagina de Cadastro</title>
</head>
<body>
<?php 
    //faz conexão com o banco de dados
    require_once '../db/conn.php';

    //Verifica se os dados foram enviados
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Obtem valores do formulário 
        $user = $_POST['user'];
        $password = $_POST['password'];
        
        //Verifica se o usuário já existe
        $query = "SELECT * FROM usuarios WHRE user = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        //Se o usuário já existe, mostra mensagem de erro
        if($result -> num_rows > 0){
            echo"";
        }
    }
?>
</body>
</html>

