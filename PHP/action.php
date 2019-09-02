<?php
require_once "conexao.php";

$con = mysqli_connect("localhost", "root", "", "NIXIS");

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

$sql = "insert into fornecedor(nomeFornecedor, emailFornecedor, telefoneFornecedor, celularFornecedor, enderecoFornecedor, numeroFornecedor,
cepFornecedor, cnpjFornecedor, cidadeFornecedor, estadoFornecedor) values ('$nomeFornecedor', '$emailFornecedor', '$telefoneFornecedor', '$celularFornecedor', '$enderecoFornecedor',
'$numeroFornecedor', '$cepFornecedor', '$cnpjFornecedor', '$cidadeFornecedor', '$estadoFornecedor')";

$result = mysqli_query($con, $sql);

if($result)
	echo "Imserido";
else
	echo "Erro";
header("Location: ../HTML/fornecedor.html");


?>