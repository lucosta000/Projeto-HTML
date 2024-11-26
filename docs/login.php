<?php
$conn = new mysqli('localhost', 'root', '', 'cadastro');
$mensagem = "Email ou senha incorretos!";

if ($conn->connect_error) {
    die('Falha na conexão: ' . $conn->connect_error);
}
if(isset($_POST['sub'])){
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $s= "select * from usuarios where email='$u' and senha= '$p'";   
   $qu= mysqli_query($conn, $s);
   if(mysqli_num_rows($qu)>0){
      $f= mysqli_fetch_assoc($qu);
      $_SESSION['id']=$f['id'];
      header ('location:index.html');
   }
   else{
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
