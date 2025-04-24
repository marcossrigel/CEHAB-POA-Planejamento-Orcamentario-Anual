<!-- http://localhost/poa/home.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>POA - Planejamento Orçamentário Anual</title>
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

  <div class="content">
    
    <div class="content-info">
      <h1>Planejamento<br>Orçamentário Anual</h1>
      <div class="logos">
        <img src="cehab_logo.png" alt="CEHAB" class="logo">
        <img src="gov-pe-logo.png" alt="Governo de PE" class="logo">
      </div>
    </div>
    
    <div class="content-login">
      <form class="content-login-box">
        <div class="input-wrapper">
          <span class="material-icons">mail</span>
          <input type="text" class="inputs" placeholder="E-mail ou telefone" id="login">
        </div>

        <div class="input-wrapper">
          <span class="material-icons">lock</span>
          <input type="password" class="inputs" placeholder="Senha" id="senha">
        </div>

        <button type="submit" onclick="logar(); return false" class="btn btn-enter">Entrar</button>
        <a href="#" class="forgot-password">Esqueceu a senha?</a>
        <hr>
        <button type="button" onclick="window.location.href='cadastro.php'" class="btn btn-create-account">
          Criar nova conta
        </button>
      </form>

    </div>

  </div>

  <script>
    function logar(){
      var login = document.getElementById('login').value;
      var senha = document.getElementById('senha').value;

      if(login == "admin" && senha == "admin") {
          location.href = "home.php";
      }
      else {
        alert('Erro: Usuário ou Senha inválidos');
      }

    }
  </script>
