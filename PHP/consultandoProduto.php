<?php

// Conectando
require "conexao.php";
?>
<html>
 <head>
 <link href="estilos.css" rel="stylesheet" type="text/css">
 <title>Resultado da pesquisa</title>
 </head>
 <body>
 <a href = "../HTML/cadastrarProduto.php">Cadastrar novo produto</a>

 <form action = "editarProduto.php" method = "get">
 <table border="1" style='width:80%'>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Marca</th>
      <th>Numeracao</th>
      <th>Quantidade</th>
      <th>Valor custo</th>
      <th>Valor venda</th>
      <th>Fornecedor</th>
      <th>Categoria</th>
      <th>Cor</th>
      <th>Excluir</th>
      <th>Alterar</th>
    </tr>
  </thead>
  <tbody>
<?php

// Executando consulta SQL
$query = 'SELECT codProduto, nome_produto, marca, numeracao, quantidade, 
    valor_custo, valor_venda, fornecedor, categoria_produto, cor FROM produtos';
$result = mysqli_query($con, $query) or die('Query failed: ' . mysql_error());

// Imprimindo resultados em HTML


while ($registro = mysqli_fetch_array($result)){
 
 ?>

<tr>
    <td><?php echo $registro['codProduto']; ?></td>
    <td><?php echo $registro['nome_produto']; ?></td>
    <td><?php echo $registro['marca']; ?></td>
    <td><?php echo $registro['numeracao']; ?></td>
    <td><?php echo $registro['quantidade']; ?></td>
    <td><?php echo $registro['valor_custo']; ?></td>
    <td><?php echo $registro['valor_venda']; ?></td>
    <td><?php echo $registro['fornecedor']; ?></td>
    <td><?php echo $registro['categoria_produto']; ?></td>
    <td><?php echo $registro['cor']; ?></td>
    <td><a href = "deletarProduto.php?id=<?php echo $registro['codProduto'] ?>">Excluir</a></td>
    <td><a href = "editarProduto.php?id=<?php echo $registro['codProduto'] ?>">Editar</a></td>
  </tr>
    <?php } ?>
</form>