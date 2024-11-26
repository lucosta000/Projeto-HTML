<?php

$clubes = [
    "Atlético Mineiro",
    "Atlético Paranaense",
    "Bahia",
    "Botafogo",
    "Corinthians",
    "Coritiba",
    "Cruzeiro",
    "Cuiabá",
    "Flamengo",
    "Fluminense",
    "Fortaleza",
    "Goiás",
    "Grêmio",
    "Internacional",
    "Palmeiras",
    "Red Bull Bragantino",
    "Santos",
    "São Paulo",
    "Vasco da Gama"
];

sort($clubes);

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

    if (empty($clube)) {
        echo "Por favor, selecione um clube.";
        exit;
    }

    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, clube) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $nome, $email, $senha, $telefone, $clube);

    if ($stmt->execute()) {
        header("Location: login.php"); 
        exit;
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
        <h2>Cadastro</h2>
        <hr>
        <form method="post" action="">
            <label>Nome <input type="text" name="nome" required></label><br>
            <label>Email <input type="email" name="email" required></label><br>
            <label>Senha <input type="password" name="senha" required></label><br>
            <label>Telefone <input type="text" name="telefone" required></label><br>
            <label>Clube</label>
            <select name="clube" id="time" required>
                <option value="">Selecione</option>
                    <?php foreach ($clubes as $clube): ?>
                <option value="<?php echo htmlspecialchars($clube); ?>">
                    <?php echo htmlspecialchars($clube); ?>
                </option>
                    <?php endforeach; ?>
</select>
            <br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
