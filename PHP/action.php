<?php
require_once "conexao.php";

$con = mysqli_connect("localhost", "root", "", "NIXIS");
mysqli_set_charset($con,"utf8");


if($con)
	echo "Conectado";
else 
	echo "Não comectado";

$nomeFornecedor = $_POST['nome_fantasia'];
$emailFornecedor = $_POST['email_fornecedor'];
$telefoneFornecedor = $_POST['telefone_fornecedor'];
$celularFornecedor = $_POST['celular_fornecedor'];
$enderecoFornecedor = $_POST['endereco_fornecedor'];
$numeroFornecedor = $_POST['numero_fornecedor'];
$cepFornecedor = $_POST['cep_fornecedor'];
$cnpjFornecedor = $_POST['cnpj_fornecedor'];
$cidadeFornecedor = $_POST['cidade_fornecedor'];
$estadoFornecedor = $_POST['estado_fornecedor'];

echo "$nomeFornecedor
$emailFornecedor $telefoneFornecedor 
$celularFornecedor 
$enderecoFornecedor 
$numeroFornecedor 
$cepFornecedor 
$cnpjFornecedor 
$cidadeFornecedor
$estadoFornecedor";

if (is_string($nomeFornecedor)) and (filter_var($emailFornecedor, FILTER_VALIDATE_EMAIL)) and (is_integer($telefoneFornecedor )) and (is_integer($celularFornecedor )) and (is_string($enderecoFornecedor )) and (is_integer($numeroFornecedor )) and (is_integer($cepFornecedor)) and (is_integer($cnpjFornecedor )) and (is_string($cidadeFornecedor)) and (is_string($estadoFornecedor)):
	$sql = "insert into fornecedor(nomeFornecedor, emailFornecedor, telefoneFornecedor, celularFornecedor, enderecoFornecedor, numeroFornecedor,
	cepFornecedor, cnpjFornecedor, cidadeFornecedor, estadoFornecedor) values ('$nomeFornecedor', '$emailFornecedor', '$telefoneFornecedor', '$celularFornecedor', '$enderecoFornecedor',
   '$numeroFornecedor', '$cepFornecedor', '$cnpjFornecedor', '$cidadeFornecedor', '$estadoFornecedor')";
else:
	echo 'erro';


$result = mysqli_query($con, $sql);

if($result)
	echo "Imserido";
else
	echo "Erro";
header("Location: ../HTML/fornecedor.html");


?>