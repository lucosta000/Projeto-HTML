
<?php
    $clubes = [
        "Atlético Mineiro",
        "Botafogo",
        "Cruzeiro",
        "Flamengo",
        "Fortaleza",
        "Goiás",
        "Palmeiras",
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
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
     <!-- Menu lateral para mobile-->
     <nav class="menu_late">
        <ul class="mobile">
            <li onclick=fechar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px"
                viewBox="0 -960 960 960" width="50px" fill="#e8eaed">
                <path
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg></a></li>
            <li><a class="nav_li" href="index.html">Início</a></li>
            <li><a class="nav_li" href="serA.html">Série A</a></li>
            <li><a class="nav_li" href="serB.html">Série B</a></li>
            <li><a class="nav_li" href="copa.html">Copa do Brasil</a></li>
            <li><a class="nav_li" href="login.php">Login</a></li>
            <li><a class="nav_li" href="cadastro.php">Cadastro</a></li>

        </ul>
    </nav>

<!-- Menu normal para desktop-->
    <nav class="nav desktop">
        <a href="index.html">Início</a>
        <a href="serA.html">Série A</a>
        <a href="serB.html">Série B</a>
        <a href="copa.html">Copa do Brasil</a>
        <a href="login.php">Login</a>
        <a href="cadastro.php">Cadastro</a>

    </nav>

<!-- trequinho para abrir o menu lateral mobile -->
    <div class="botao_menu  ">
        <p class="mobile" onclick=mostrar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px"
            viewBox="0 -960 960 960" width="50px" fill="#e8eaed">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" /></svg></a>MENU</p>
    </div>

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
            function mostrar() {
            const menu_late = document.querySelector('.menu_late')
            menu_late.style.display = 'flex'
        }

        function fechar() {
            const menu_late = document.querySelector('.menu_late')
            menu_late.style.display = 'none'
        }
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
