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