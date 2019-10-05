<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "../CSS/login.css">
    </script>
  </head>
  <body>
  <img src="../IMAGENS/nixis2.png" width="90" height="40">
  <div class="navegacao">
    <a href="../HTML/index.html">Voltar</a>
  </div>
  
  <hr/>
  <fieldset>
        <h1 id = "centro">Login</h1>
        <hr/>
        <form action = "../PHP/userauthentication.php" method = "post" autocomplete="off">
        <div class = "centro">
            <label for = "email">*E-mail do usuário: </label>
            <input type = "email" id = "email" size="52" maxlength="40" name = "email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder = "E-mail" required title = "Digite o seu E-mail completo">
        </div>
        <div class = "centro">    
            <label for = "senha">*Senha do usuário: </label>
             <input type = "password" id = "senha" size="52"  maxlength="14" name = "senha" placeholder = "Senha" pattern= "^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ!@#$=.%¨*_~`/0-9]+"   title = "Digite a sua senha" required>
        </div>
        <br>
        
        <hr/>
        <div class="button">
            <button type = "submit" name = "entrar" onclick = "funcaoEnviar()">Confirmar dados</button>
            <br>
            <br>
        </div>
        <br>
        <br>
			  <strong id = 'obrigatorio'>Os campos marcados com asterisco são de preenchimento obrigatório.</strong>
    </fieldset>
	<hr/>
  

    <script language="php">
       if
    </script>

  </body>
</html>