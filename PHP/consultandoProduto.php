<?php

// Conectando
$con = mysqli_connect("localhost", "root", "", "NIXIS")
        or die('Could not connect: ' . mysql_error());
echo 'Connected successfully' . "\n";
mysqli_set_charset($con,"utf8");
// Selecionando banco de dados
?>
<html>
 <head>
 <link href="estilos.css" rel="stylesheet" type="text/css">
 <title>Resultado da pesquisa</title>
 </head>
 <body>
 
 <!-- Criando tabela e cabeçalho de dados: -->
 <table border="1" style='width:50%'>
 <tr>
 <th>Código Produto</th>

 <th>nome_produto</th>
 <th>marca</th>
 <th>numeracao</th>
 <th>quantidade</th>
 <th>valor_custo</th>
 <th>valor_venda</th>
 <th>fornecedor</th>
 <th>categoria_produto</th>
 <th>COR</th>
 </tr>
<?php
// Executando consulta SQL
$query = 'SELECT cod_produto, nome_produto, marca, numeracao, quantidade, 
    valor_custo, valor_venda, fornecedor, categoria_produto, cor FROM produtos';
$result = mysqli_query($con, $query) or die('Query failed: ' . mysql_error());

// Imprimindo resultados em HTML


while ($registro = mysqli_fetch_array($result))
 {
   $id = $registro['cod_produto'];
   $nomeProduto = $registro['nome_produto'];
   $marcaProduto = $registro['marca'];
   $numeracaoProduto = $registro['numeracao'];
   $quantidadeProduto = $registro['quantidade'];
   $valorCusto = $registro['valor_custo'];
   $valorVenda = $registro['valor_venda'];
   $fornecedorProduto = $registro['fornecedor'];
   $categoriaProduto = $registro['categoria_produto'];
   $corProduto = $registro['cor'];
   echo "<tr>";
   echo "<td>".$id."</td>";
   echo "<td>".$nomeProduto."</td>";
   echo "<td>".$marcaProduto."</td>";
   echo "<td>".$numeracaoProduto."</td>";
   echo "<td>".$quantidadeProduto."</td>";
   echo "<td>".$valorCusto."</td>";
   echo "<td>".$valorVenda."</td>";
   echo "<td>".$fornecedorProduto."</td>";
   echo "<td>".$categoriaProduto."</td>";
   echo "<td>".$corProduto."</td>";
   echo "</tr>";
 }

//  Liberando memória
mysqli_free_result($result);

// Fechando conexão
mysqli_close($con);

?>