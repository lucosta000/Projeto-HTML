
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $conn = new mysqli('localhost', 'root', '', 'cadastro');

    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }

    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 
    $telefone = $_POST['telefone'];
    $clube = $_POST['clube'];

    
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, clube) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $nome, $email, $senha, $telefone, $clube);

    if ($stmt->execute()) {
        header("Location:login.php");
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
    <div class="form-container">
        <h2>Cadastro</h2><hr>
        <form method="post" action="">
            <label>Nome <input type="text" name="nome" required></label><br>
            <label>Email <input type="email" name="email" required></label><br>
            <label>Senha <input type="password" name="senha" required></label><br>
            <label>Telefone <input type="text" name="telefone" required></label><br>
            <label>Clube</label>
            <select name="clube" id="">
                <option value="Corinthians">Corinsthians</option>
                <option value="Palmeiras">Palmeiras</option>
                <option value="Santos">Santos</option>
                <option value="São Paulo">São Paulo</option>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
