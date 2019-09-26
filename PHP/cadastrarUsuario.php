<html>
<body>
<?php


$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");

?>

<script type="text/javascript">
	function sucessfully(){
		setTimeout("window.location='../HTML/cadastrarUsuario.html'", 900);
		alert("Cadastrado com sucesso!");
	}

	function failed(){
		setTimeout("window.location='../HTML/cadastrarUsuario.html'", 1300);
		alert("Dados já existentes, tente novamente!");
	}
</script>

<?php


$nomeUsuario = $_POST['nome_usuario'];
$senhaUsuario = $_POST['senha_usuario'];
$criptografado = base64_encode($senhaUsuario);
$telefoneUsuario = $_POST['telefone_usuario'];
$celularUsuario = $_POST['celular_usuario'];
$enderecoUsuario = $_POST['endereco_usuario'];
$numeroUsuario = $_POST['numero_usuario'];
$cidadeUsuario = $_POST['cidade_usuario'];
$emailUsuario = $_POST['email_usuario'];

$compara = mysqli_query($con, "SELECT * FROM usuario WHERE nome = '$nomeUsuario' or email = '$emailUsuario'");
$row = mysqli_num_rows($compara);

if($row > 0 || validarSenha($senhaUsuario)){
	echo "<script>failed()</script>";
}if($row == 0){
	echo '<script>sucessfully()</script>';
	$sql = "insert into usuario(nome, senha, telefone, celular, endereco, numero,
     cidade, email) values ('$nomeUsuario', '$criptografado', '$telefoneUsuario', '$celularUsuario', '$enderecoUsuario',
	 '$numeroUsuario', '$cidadeUsuario', '$emailUsuario')";
}
     
	 


$result = mysqli_query($con, $sql);



?>
</html>
</body>