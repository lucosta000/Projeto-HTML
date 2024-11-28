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
        } elseif ($clube === 'Vasco da Gama') {
            header('Location: vasco_da_gama.html');


        }if ($clube === 'ABC') {
            header('Location: abc.html');
        } elseif ($clube === 'CRB') {
            header('Location: crb.html');
        } elseif ($clube === 'Cuiabá') {
            header('Location: cuiaba.html');
        } elseif ($clube === 'Chapecoense') {
            header('Location: chapecoense.html');
        } elseif ($clube === 'Guarani') {
            header('Location: guarani.html');
        } elseif ($clube === 'Vila Nova') {
            header('Location: vila_nova.html');
        } elseif ($clube === 'Sampaio Corrêa') {
            header('Location: sampaio_correa.html');
        } elseif ($clube === 'Londrina') {
            header('Location: londrina.html');
        } elseif ($clube === 'Ituano') {
            header('Location: ituano.html');
        } elseif ($clube === 'Vasco da Gama') {
            header('Location: vasco.html');
        } elseif ($clube === 'Ponte Preta') {
            header('Location: ponte_preta.html');
        } elseif ($clube === 'Mirassol') {
            header('Location: mirassol.html');
        } elseif ($clube === 'Operário Ferroviário') {
            header('Location: operario_ferroviario.html');
        } elseif ($clube === 'CRAC') {
            header('Location: crac.html');
        } elseif ($clube === 'Brasil de Pelotas') {
            header('Location: brasil_pelotas.html');
        } elseif ($clube === 'Remo') {
            header('Location: remo.html');
        } elseif ($clube === 'Novo Hamburgo') {
            header('Location: novo_hamburgo.html');
        } elseif ($clube === 'Botafogo-SP') {
            header('Location: botafogo_sp.html');
        } elseif ($clube === 'Piaui') {
            header('Location: piaui.html');
        } else {
            header('Location: outro.html');
        }
        exit; 
    } else {
        echo "<script>alert('$mensagem');</script>";
        
    }
}
?>
