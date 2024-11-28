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
        <form method="post" action="cadastro.php">
            <div class="input-group">
                <label>Nome <input type="text" name="nome" required></label><br>
                <label>Email <input type="email" name="email" required></label><br>
            </div>
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
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <script>
        document.getElementById('formCadastro').addEventListener('submit', function(e) {
            e.preventDefault();

            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            const telefone = document.getElementById('telefone').value;

            
            fetch('https://localhost/HTML/cadastro.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `nome=${encodeURIComponent(nome)}&email=${encodeURIComponent(email)}&senha=${encodeURIComponent(senha)}&telefone=${encodeURIComponent(telefone)}`
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('resultado').innerText = data.message;
            })
            .catch(error => {
                console.error('Erro:', error);
                document.getElementById('resultado').innerText = 'Erro ao enviar os dados.';
            });
        });
    </script>
</body>
</html>
</body>
</html>
