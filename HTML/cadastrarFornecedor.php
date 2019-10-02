<?php
require_once "../PHP/conexao.php";
require "../PHP/funcoesFornecedor.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de fornecedores</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/cadastrarFornecedor.css"></style>
  </head>
  <script src = "../JQuery/jquery-3.4.1.min.js" ></script>
  <script src = "../JQuery/jquery.mask.js" ></script>
  <script>
    $(document).ready(function(){
         $('#cep').mask('00000-000');
    })
    $(document).ready(function(){
           $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
    })
    $(document).ready(function(){
          $('#telefone').mask('(00) 0000-0000');
    })
        $(document).ready(function(){
          $('#celular').mask('(00) 00000-0000');
    })
    
  </script>
  <body>
  <img src="../IMAGENS/nixis2.png" width="90" height="40">
  <div class="navegacao">
    <a href="principal.html">Voltar</a>
  </div>
  <hr/>
  <fieldset>
        <h1 id = "centro">Cadastrar Fornecedor</h1>
        <hr/>
        <form action = "../PHP/cadastrarFornecedor.php" method = "post" autocomplete="off">
        <div>
            <label for = "nomefantasia" >*Nome fantasia: </label>
            <input type = "text" id = "nomefantasia" size="52" maxlength="40" name = "nome_fantasia"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ!@#=$%¨*_/0-9 ]+"  placeholder = "Nome completo" required title = "Formato incorreto, digite novamente">
            <label for = "email">*E-mail: </label>
            <input type = "email" id = "email" size="52" maxlength="40" name = "email_fornecedor" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder = "E-mail" required title = "Formato incorreto, digite novamente">
        </div>
        <div>
            <label for = "telefone">Telefone: </label>
            <input type="tel" id = "telefone" size = "52" maxlength="15" name = "telefone_fornecedor"  placeholder = "(xx) xxxxx-xxxx"  title = "Formato incorreto, digite novamente">
            <label for = "celular">*Celular: </label>
            <input type="tel" id = "celular" size = "52" maxlength="15" name = "celular_fornecedor" placeholder = "(xx) xxxxx-xxxx" required title = "Formato incorreto, digite novamente">
        </div>
        <div>
            <label for = "endereco">*Endereço: </label>
            <input type = "text" id = "endereco" size="52" maxlength="30" name = "endereco_fornecedor" placeholder = "Endereço completo" pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" required title = "Formato incorreto, digite novamente">
            <label for = "numero">*Número: </label>
            <input type = "text" id = "numero" size = 52 maxlenght = "5" name = "numero_fornecedor" placeholder = "Número" pattern="[0-9]+$" required title = "Formato incorreto, digite novamente">
        </div>
        <div>
            <label for = "cep">*CEP: </label>
            <input type = "text" id = "cep" size="52" maxlength="8" name = "cep_fornecedor"  placeholder = "Digite o CEP" required title = "Formato incorreto, digite novamente">
            <label for = "cnpj">*CPNJ: </label>
            <input type = "text" id = "cnpj" size="52" maxlength="14" name = "cnpj_fornecedor" placeholder = "Digite o CNPJ" required title = "Formato incorreto, digite novamente">
        </div>
        <div>
			<label for = "cidade">*Cidade: </label>
			<input type = "text" id = "cidade"  maxlength="30" name = "cidade_fornecedor" placeholder = "Cidade" pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" required>
            <label for = "a">*Estado: </label> 
			<select name="estado_fornecedor">
                <option value = "Acre">Acre</option>
                <option value = "Alagoas">Alagoas</option>
                <option value = "Amapá">Amapá</option>
	              <option value = "Amazonas">Amazonas</option>
                <option value = "Bahia">Bahia</option>
                <option value = "Ceará">Ceará</option>
                <option value = "Distrito Federal">Distrito Federal</option>
                <option value = "Espírito Santo">Espírito Santo</option>
                <option value = "Goiás">Goiás</option>
                <option value = "Maranhão">Maranhão</option>
                <option value = "Mato Grosso">Mato Grosso</option>
                <option value = "Mato Grosso do Sul">Mato Grosso do Sul</option>
                <option value = "Minas Gerais">Minas Gerais</option>
                <option value = "Pará">Pará</option>
                <option value = "Paraíba">Paraíba</option>
                <option value = "Paraná">Paraná</option>
                <option value = "Pernambuco">Pernambuco</option>
                <option value = "Piauí">Piauí</option>
                <option value = "Rio de Janeiro">Rio de Janeiro</option>
                <option value = "Rio Grande do Norte">Rio Grande do Norte</option>
                <option value = "Rio Grande do Sul">Rio Grande do Sul</option>
                <option value = "Rondônia">Rondônia</option>
                <option value = "Roraima">Roraima</option>
                <option value = "Santa Catarina">Santa Catarina</option>
                <option value = "São Paulo">São Paulo</option>
                <option value = "Sergipe">Sergipe</option>
                <option value = "Tocantins">Tocantins</option>
            </select> 
            <br>
            <br>
			<strong id = "obrigatorio">Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
        </div>
        <hr/>
        <div class="button">
            <button name = "enviar" type = "submit">Enviar</button>
        </div>
    </form>
    
            <?php
                if(isset($_POST['enviar'])){
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
                   
                    eliminaMascaraInt($telefoneFornecedor);
                    eliminaMascaraInt($celularFornecedor);
                    eliminaMascaraInt($cepFornecedor);
                    eliminaMascaraInt($cnpjFornecedor);
        
                    $compara = mysqli_query($con, "SELECT * FROM produtos WHERE marca = '$marcaProduto' and numeracao = '$numeracaoProduto' and categoria_produto = '$categoriaProduto' and cor = '$corProduto' and quantidade = '$quantidadeProduto'");
                    $row = mysqli_num_rows($compara);
                                            

                    if (empty($nomeFornecedor) || empty($emailFornecedor) || empty($celularFornecedor) || empty($enderecoFornecedor) || empty($numeroFornecedor) || empty($cepFornecedor) || empty($cnpjFornecedor) || empty($cidadeFornecedor) || empty($estadoFornecedor)){
                        echo "<strong id = 'alert'>Campos obrigatórios vazios, favor preencher</strong>";
                    }else if(verificaEntradaInt($celularUsuario) || verificaEntradaInt($numeroFornecedor) || verificaEntradaInt($cepFornecedor) || verificaEntradaInt($cnpjFornecedor)){
                        echo "<strong id = 'alert'>Não alterar código fonte</strong>";    
                    }else if(verificaEntradaString($nomeFornecedor) || verificaEntradaString($emailFornecedor) || verificaEntradaString($enderecoFornecedor) ||verificaEntradaString($cidadeFornecedor) ||verificaEntradaString($estadoFornecedor)){
                        echo "<strong id = 'alert'>Não alterar código fonte</strong>";                    
                    }else if (strlen($nomeFornecedor) < 6 || strlen($emailFornecedor) < 10|| strlen($celularFornecedor) < 11|| strlen($enderecoFornecedor) < 8 || strlen($numeroFornecedor) < 1 || strlen($cepFornecedor) < 8 || strlen($cnpjFornecedor) < 14|| strlen($cidadeFornecedor) < 5|| strlen($estadoFornecedor) < 2){
                        echo "<strong id = 'alert'>Algum campo apresenta tamanho inválido</strong>";
                    }else if($nomeFornecedor == $emailFornecedor || $nomeFornecedor == $enderecoFornecedor || $nomeFornecedor == $cidadeFornecedor || $cepFornecedor == $cnpjFornecedor || $cidadeFornecedor == $enderecoFornecedor || $enderecoFornecedor == $numeroFornecedor){
                        echo "<strong id = 'alert'>Alguns campos estão repetidos</strong>";
                    }else{
                        if($row > 0){
                            echo "<strong id = 'alert'>Dados já cadastrados, tente novamente com novos dados</strong>";
                        }if($row == 0){
                            echo "<strong id = 'alert'>Cadastrado com sucesso!</strong>";
                            $sql = "insert into fornecedor(nomeFornecedor, emailFornecedor, telefoneFornecedor, celularFornecedor, enderecoFornecedor, numeroFornecedor,
			                cepFornecedor, cnpjFornecedor, cidadeFornecedor, estadoFornecedor) values ('$nomeFornecedor', '$emailFornecedor', '$telefoneFornecedor', '$celularFornecedor', '$enderecoFornecedor',
			                '$numeroFornecedor', '$cepFornecedor', '$cnpjFornecedor', '$cidadeFornecedor', '$estadoFornecedor')"; 
                            $result = mysqli_query($con, $sql);
                        }
                    }
                }
                
            ?>

    </fieldset>
	<hr/>
  </body>
</html>
