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
	function nullValue(){
		setTimeout("window.location='../HTML/cadastrarUsuario.html'", 1200);
		alert("Obrigatório o preenchimento do campo, tente novamente!");
	}
	function valuesEquals(){
		setTimeout("window.location='../HTML/cadastrarUsuario.html'", 1200);
		alert("Valores repetidos, tente novamente!");
	}function lenExceeded(){
		setTimeout("window.location='../HTML/cadastrarUsuario.html'", 1200);
		alert("Tamanho inválido , tente( novamente!");
	}function valuesInvalid(){
		setTimeout("window.location = '../HTML/cadastraUsuario.html'", 1200);
		alert("Não alterar código fonte!");
	}
</script>

<?php
$nomeUsuario = $_POST['nome_usuario'];
$senhaUsuario = $_POST['senha_usuario'];
$criptografado = base64_encode($senhaUsuario);
$telefoneUsuario = $_POST['telefone_usuario'];
$celularUsuario = $_POST['celular_usuario'];
$emailUsuario = $_POST['email_usuario'];
$cargoUsuario = $_POST['cargo'];

function eliminaMascaraString($variavel){
    $variavel = str_replace(".", "", $variavel);
    $variavel = str_replace("-", "", $variavel);
    $variavel = str_replace("/", "", $variavel);
    $variavel = str_replace("(", "", $variavel);
    $variavel = str_replace(")", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = (int)$variavel;
    if($variavel != 0 ){
		echo '<script>valuesInvalid()</script>';
    }
}
function eliminaMascaraInt(&$variavel){
    $variavel = str_replace(".", "", $variavel);
    $variavel = str_replace("-", "", $variavel);
    $variavel = str_replace("/", "", $variavel);
    $variavel = str_replace("(", "", $variavel);
    $variavel = str_replace(")", "", $variavel);
    $variavel = str_replace(" ", "", $variavel);
    $variavel = (int)$variavel;
    if($variavel == 0){
		echo '<script>valuesInvalid()</script>';
    }
}

eliminaMascaraString($nomeUsuario);
eliminaMascaraString($telefoneUsuario);
eliminaMascaraString($celularUsuario);
eliminaMascaraString($emailUsuario);
eliminaMascaraString($cargoUsuario);


$compara = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$emailUsuario'");
$row = mysqli_num_rows($compara);

if (empty($nomeUsuario) || empty($senhaUsuario) || empty($celularUsuario) || empty($emailUsuario) || empty($cargoUsuario)){
	echo '<script>nullValue()</script>';
}if (strlen($nomeUsuario) < 6 || strlen($senhaUsuario) <= 5|| strlen($celularUsuario) < 15 || strlen($emailUsuario) <= 15 || strlen($cargoUsuario) < 4){
	echo '<script>lenExceeded()</script>';
}if($emailUsuario == $senhaUsuario || $nomeUsuario == $senhaUsuario){
	echo '<script>valuesEquals()</script>';
}else{
	if($row > 0){
		echo "<script>failed()</script>";
	}if($row == 0){
		echo '<script>sucessfully()</script>';
		$sql = "insert into usuario(nome, senha, telefone, celular, email, cargo) values ('$nomeUsuario', '$criptografado', '$telefoneUsuario', '$celularUsuario',
		'$emailUsuario', '$cargoUsuario')";
		$result = mysqli_query($con, $sql);
	}
} 

?>
</html>
</body>