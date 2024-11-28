<?php
session_start(); 

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
        $_SESSION['id'] = $f['id'];

       
        if ($clube === 'Atlético Mineiro') {
            header('Location: atleticomg.html');
        } elseif ($clube === 'Botafogo') {
            header('Location: botafogo.html');
        }   elseif ($clube === 'Cruzeiro') {
            header('Location: cruzeiro.html');
        }  elseif ($clube === 'Flamengo') {
            header('Location: flamengo.html');
        }  elseif ($clube === 'Fortaleza') {
            header('Location: fortaleza.html');
        } elseif ($clube === 'Goiás') {
            header('Location: goias.html');
        }   elseif ($clube === 'Palmeiras') {
            header('Location: palmeiras.html');
        }  elseif ($clube === 'Santos') {
            header('Location: santos.html');
        } elseif ($clube === 'São Paulo') {
            header('Location: saopaulo.html');
        } elseif ($clube === 'Vasco da Gama') {
            header('Location: vasco.html');


        } elseif ($clube === 'Guarani') {
            header('Location: guarani.html');
        }  elseif ($clube === 'Ponte Preta') {
            header('Location: ponte_preta.html');
        } elseif ($clube === 'Mirassol') {
            header('Location: mirassol.html');
        } elseif ($clube === 'Novorizontino') {
            header('Location: novorizontino.html');
        } elseif ($clube === 'Sport') {
            header('Location: sport.html');
        } elseif ($clube === 'Ceará') {
            header('Location: ceara.html');
        }
         else {
            header('Location: outro.html');
        }
        exit; 
    } else {
        echo "<script>alert('$mensagem');</script>";
        
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <!-- script para mostrar/ocultar o menu lateral do mobile-->
    <script>
        function mostrar() {
            const menu_late = document.querySelector('.menu_late')
            menu_late.style.display = 'flex'
        }

        function fechar() {
            const menu_late = document.querySelector('.menu_late')
            menu_late.style.display = 'none'
        }
    </script>
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

        </ul>
    </nav>

<!-- Menu normal para desktop-->
    <nav class="nav desktop">
        <a href="index.html">Início</a>
        <a href="serA.html">Série A</a>
        <a href="serB.html">Série B</a>
        <a href="copa.html">Copa do Brasil</a>
    </nav>

<!-- trequinho para abrir o menu lateral mobile -->
    <div class="botao_menu  ">
       <p class="mobile" onclick=mostrar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px"
            viewBox="0 -960 960 960" width="50px" fill="#e8eaed">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" /></svg></a>MENU</p>
    </div>
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

    <script>
        document.getElementById('formLogin').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;

            // Faz a requisição para o servidor PHP externo
            fetch('https://meusite.com/login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `email=${encodeURIComponent(email)}&senha=${encodeURIComponent(senha)}`
            })
            .then(response => response.json())
            .then(data => {
                // Exibe o resultado no front-end
                if (data.success) {
                    document.getElementById('resultado').innerHTML = `<p style="color: green;">${data.message}</p>`;
                } else {
                    document.getElementById('resultado').innerHTML = `<p style="color: red;">${data.message}</p>`;
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                document.getElementById('resultado').innerHTML = `<p style="color: red;">Erro ao processar o login.</p>`;
            });
        });
    </script>
</body>
</html>
