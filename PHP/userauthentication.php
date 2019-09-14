<?php
$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");
?>

<html>
<head>
<title></title>
<script type="text/javascript">
	function loginsucessfully(){
		setTimeout("window.location='../HTML/fornecedor.html'", 900);
		alert("Logado com Sucesso!");
	}

	function loginfailed(){
		setTimeout("window.location='../HTML/login.html'", 1000);
		alert("Dados inválidos!");
	}
</script>
</head>
	<body>

<?php
$email=$_POST['email'];
$senha=$_POST['senha'];
$encriptografar = base64_encode($senha);
$sql = mysqli_query($con, "SELECT * FROM usuario WHERE email = '$email' and senha = '$encriptografar'");
$row = mysqli_num_rows($sql);

if($row == 1){
	echo '<script>loginsucessfully()</script>';
}if($row == 0){
	echo "<script>loginfailed()</script>";
}

?>
	</body>
</html>
