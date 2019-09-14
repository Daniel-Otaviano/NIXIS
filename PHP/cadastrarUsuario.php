<html>
<body>
<?php
require_once "conexao.php";

$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");


if($con)
	echo "Conectado";
else 
	echo "Não comectado";

$nomeUsuario = $_POST['nome_usuario'];
$senhaUsuario = $_POST['senha_usuario'];
$criptografado = base64_encode($senhaUsuario);
$telefoneUsuario = $_POST['telefone_usuario'];
$celularUsuario = $_POST['celular_usuario'];
$enderecoUsuario = $_POST['endereco_usuario'];
$numeroUsuario = $_POST['numero_usuario'];
$cidadeUsuario = $_POST['cidade_usuario'];
$emailUsuario = $_POST['email_usuario'];


$sql = "insert into usuario(nome, senha, telefone, celular, endereco, numero,
     cidade, email) values ('$nomeUsuario', '$criptografado', '$telefoneUsuario', '$celularUsuario', '$enderecoUsuario',
	 '$numeroUsuario', '$cidadeUsuario', '$emailUsuario')";

     
	 


$result = mysqli_query($con, $sql);

if($result)
	echo "Imserido";
else
	echo "Erro";
header("Location: ../HTML/fornecedor.html");


?>
</html>
</body>