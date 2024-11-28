<?php
$conn = new mysqli('localhost', 'root', '', 'cadastro');
$mensagem = "Email ou senha incorretos!";

if ($conn->connect_error) {
    die('Falha na conexão: ' . $conn->connect_error);
}

if (isset($_POST['sub'])) {
    $u = $_POST['user'];
    $p = $_POST['pass'];

    
    $s = "SELECT * FROM usuarios WHERE email='$u' AND senha='$p'";
    $qu = mysqli_query($conn, $s);

    if (mysqli_num_rows($qu) > 0) {
        $f = mysqli_fetch_assoc($qu);

        
        $clube = $f['clube'];

        
        if ($clube === 'Atlético Mineiro') {
            header('Location: atletico_mineiro.html');
        } elseif ($clube === 'Atlético Paranaense') {
            header('Location: atletico_paranaense.html');
        } elseif ($clube === 'Bahia') {
            header('Location: bahia.html');
        } elseif ($clube === 'Botafogo') {
            header('Location: botafogo.html');
        } elseif ($clube === 'Corinthians') {
            header('Location: corinthians.html');
        } elseif ($clube === 'Coritiba') {
            header('Location: coritiba.html');
        } elseif ($clube === 'Cruzeiro') {
            header('Location: cruzeiro.html');
        } elseif ($clube === 'Cuiabá') {
            header('Location: cuiaba.html');
        } elseif ($clube === 'Flamengo') {
            header('Location: flamengo.html');
        } elseif ($clube === 'Fluminense') {
            header('Location: fluminense.html');
        } elseif ($clube === 'Fortaleza') {
            header('Location: fortaleza.html');
        } elseif ($clube === 'Goiás') {
            header('Location: goias.html');
        } elseif ($clube === 'Grêmio') {
            header('Location: gremio.html');
        } elseif ($clube === 'Internacional') {
            header('Location: internacional.html');
        } elseif ($clube === 'Palmeiras') {
            header('Location: palmeiras.html');
        } elseif ($clube === 'Red Bull Bragantino') {
            header('Location: red_bull_bragantino.html');
        } elseif ($clube === 'Santos') {
            header('Location: santos.html');
        } elseif ($clube === 'São Paulo') {
            header('Location: sao_paulo.html');
        } else ($clube === 'Vasco da Gama') {
            header('Location: vasco_da_gama.html');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2><hr>
        <form action="" method="POST">
            <div class="div">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="user">
            </div>
            <div class="div">   
                <label for="senha">Senha</label>
                <input type="password" placeholder="Senha" name="pass">
            </div>
            <div class="div">
                <button type="submite" name="sub">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>
