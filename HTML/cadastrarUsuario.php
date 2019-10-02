<?php
require_once "../PHP/conexao.php";
require "../PHP/funcoesUsuario.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de usuário</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/cadastrarUsuario.css">
    <script src = "../JQuery/jquery-3.4.1.min.js" ></script>
    <script src = "../JQuery/jquery.mask.js" ></script>
    <script>
        $(document).ready(function(){
            $('#telefone_usuario').mask('(00) 0000-0000');
    })
        $(document).ready(function(){
           $('#celular_usuario').mask('(00) 00000-0000');
    })
    </script>
  </head>
  <body>
  <img src="../IMAGENS/nixis2.png" width="90" height="40">
  <div class="navegacao">
    <a href="principal.html">Voltar</a>
  </div>
  
  <hr/>
  <fieldset>
        <h1 id = "centro">Cadastrar usuário</h1>
        <hr/>
        <form action = "" method = "post" autocomplete="off">
        <div>
            <label for = "nome_usuario" >*Novo completo: </label>
            <input type = "text" id = "nome_usuario" size="52" maxlength="40" autocomplete="off" name = "nome_usuario"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+" placeholder = "Digite o nome completo" required title = "Formato incorreto, digite novamente">
            <label for = "senha_usuario" >*Nova senha: </label>
            <input type = "password" id = "senha_usuario" size="52" min = "5" maxlength="30" name = "senha_usuario"  pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ!@#=$%¨*_.~`/0-9 ]+" placeholder = "Digite a senha" required title = "Formato incorreto, digite novamente">
        </div>
        <div>
            <label for = "telefone">Telefone: </label>
            <input type="tel" id = "telefone_usuario" size = "52" maxlength="15" autocomplete="off" name = "telefone_usuario" placeholder = "(xx)xxxxx-xxxx"  title = "Formato incorreto, digite novamente">
            <label for = "celular">*Celular: </label>
            <input type="tel" id = "celular_usuario" size = "52" maxlength="15" autocomplete="off" name = "celular_usuario" placeholder = "(xx)xxxxx-xxxx"  required title = "Formato incorreto, digite novamente">
        </div>
        <div>
            <label for = "email">*E-mail: </label>
            <input type = "email" id = "email" size="52" maxlength="40" name = "email_usuario" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder = "E-mail" required title = "Formato incorreto, digite novamente">
            <label for = "categoria">*Cargo: </label>
            <select name="cargo" required>
                <option value = "Dono">Dono</option>
                <option value = "Gerente">Gerente</option>
                <option value = "Estoquista">Estoquista</option>
                <option value = "Balconista/Vendedor">Balconista/Vendedor</option>
            </select> 
        </div>
        <br>
        <br>
			  <strong id = "obrigatorio">Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
              <hr/>
              <div class="button">
                  
                  <button name="enviar" type = "submit" >Confirmar cadastro</button>
              </div>
          </form>
                <?php
                if(isset($_POST['enviar'])){
                    $nomeUsuario = $_POST['nome_usuario'];
                    $senhaUsuario = $_POST['senha_usuario'];
                    $criptografado = base64_encode($senhaUsuario);
                    $telefoneUsuario = $_POST['telefone_usuario'];
                    $celularUsuario = $_POST['celular_usuario'];
                    $emailUsuario = $_POST['email_usuario'];
                    $cargoUsuario = $_POST['cargo'];
                   
                    eliminaMascaraInt($telefoneUsuario);
                    eliminaMascaraInt($celularUsuario);
        
                    $compara = mysqli_query($con, "SELECT email FROM usuario WHERE email = '$emailUsuario'");
                    $row = mysqli_num_rows($compara);
                                            

                    if (empty($nomeUsuario) || empty($senhaUsuario) || empty($celularUsuario) || empty($emailUsuario) || empty($cargoUsuario)){
                        echo "<strong id = 'alert'>Campos obrigatórios vazios, favor preencher</strong>";
                    }else if(verificaEntradaInt($celularUsuario)){
                        echo "<strong id = 'alert'>Não alterar código fonte</strong>";    
                    }else if(verificaEntradaString($nomeUsuario) || verificaEntradaString($emailUsuario) || verificaEntradaString($cargoUsuario)){
                        echo "<strong id = 'alert'>Não alterar código fonte</strong>";                    
                    }else if (strlen($nomeUsuario) < 6 || strlen($senhaUsuario) <= 5|| strlen($celularUsuario) < 11 || strlen($emailUsuario) <= 10 || strlen($cargoUsuario) < 4){
                        echo "<strong id = 'alert'>Algum campo apresenta tamanho inválido</strong>";
                    }else if($emailUsuario == $senhaUsuario || $nomeUsuario == $senhaUsuario || $nomeUsuario == $emailUsuario){
                        echo "<strong id = 'alert'>Alguns campos estão repetidos</strong>";
                    }else{
                        if($row > 0){
                            echo "<strong id = 'alert'>Dados já cadastrados, tente novamente com novos dados</strong>";
                        }if($row == 0){
                            echo "<strong id = 'alert'>Cadastrado com sucesso!</strong>";
                            $sql = "insert into usuario(nome, senha, telefone, celular, email, cargo) values ('$nomeUsuario', '$criptografado', '$telefoneUsuario', '$celularUsuario',
                            '$emailUsuario', '$cargoUsuario')";
                            $result = mysqli_query($con, $sql);
                        }
                    }
                }
                
                ?>
                </fieldset>
	<hr/>
  </body>
</html>