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
        } elseif ($clube === 'Corinthians') {
            header('Location: corinthians.html');
        }  elseif ($clube === 'Cruzeiro') {
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
            header('Location: sao_paulo.html');
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
