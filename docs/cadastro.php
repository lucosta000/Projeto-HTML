<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $conn = new mysqli('localhost', 'root', '', 'cadastro');

    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }

    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha']; 
    $clube = $_POST['clube'];

    
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, clube) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $nome, $email, $senha, $telefone, $clube);

    if ($stmt->execute()) {
        header("Location:login.html");
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
