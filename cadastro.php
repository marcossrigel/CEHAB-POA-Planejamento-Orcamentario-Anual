<?php

  if(isset($_POST['submit']))
  {
    include_once('config.php');

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $genero = $_POST['genero'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario = $_POST['usuario'];

    $meses = [
      "jan" => "01", "fev" => "02", "mar" => "03", "abr" => "04",
      "mai" => "05", "jun" => "06", "jul" => "07", "ago" => "08",
      "set" => "09", "out" => "10", "nov" => "11", "dez" => "12"
    ];
    $mesConvertido = $meses[strtolower($mes)] ?? "01";
    $data_nascimento = "$ano-$mesConvertido-$dia";

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, sobrenome, usuario, data_nascimento, genero, email, senha) VALUES('$nome', '$sobrenome','$usuario', '$data_nascimento', '$genero', '$email', '$senha')");
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="cadastro.css">

  <title>Cadastre-se</title>
</head>

<body>
  <form class="formulario" action="cadastro.php" method="POST">
    <h1>Criar uma nova conta</h1>
    <div class="linha">
      <input type="text" name="nome" placeholder="Nome" class="campo">
      <input type="text" name="sobrenome" placeholder="Sobrenome" class="campo">
      <input type="text" name="usuario" placeholder="Usuário" class="campo">
    </div>

    <br>
    <label class="label">Data de nascimento</label>
    <div class="linha">
      <select name="dia" class="campo">
        <option disabled selected>Dia</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
        <option>21</option>
        <option>22</option>
        <option>23</option>
        <option>24</option>
        <option>25</option>
        <option>26</option>
        <option>27</option>
        <option>28</option>
        <option>29</option>
        <option>30</option>
        <option>31</option>
      </select>

      <select name="mes" class="campo">
        <option disabled selected>Mês</option>
        <option>jan</option>
        <option>fev</option>
        <option>mar</option>
        <option>abr</option>
        <option>mai</option>
        <option>jun</option>
        <option>jul</option>
        <option>ago</option>
        <option>set</option>
        <option>out</option>
        <option>nov</option>
        <option>dez</option>
      </select>

      <select name="ano" class="campo">
        <option disabled selected>Ano</option>
        <option>2025</option>
        <option>2024</option>
        <option>2023</option>
        <option>2022</option>
        <option>2021</option>
        <option>2020</option>
        <option>2019</option>
        <option>2018</option>
        <option>2017</option>
        <option>2016</option>
        <option>2015</option>
        <option>2014</option>
        <option>2013</option>
        <option>2012</option>
        <option>2011</option>
        <option>2010</option>
        <option>2009</option>
        <option>2008</option>
        <option>2007</option>
        <option>2006</option>
        <option>2005</option>
        <option>2004</option>
        <option>2003</option>
        <option>2002</option>
        <option>2001</option>
        <option>2000</option>
        <option>1999</option>
        <option>1998</option>
        <option>1997</option>
        <option>1996</option>
        <option>1995</option>
        <option>1994</option>
        <option>1993</option>
        <option>1992</option>
        <option>1991</option>
        <option>1990</option>
        <option>1989</option>
        <option>1988</option>
        <option>1987</option>
        <option>1986</option>
        <option>1985</option>
        <option>1984</option>
        <option>1983</option>
        <option>1982</option>
        <option>1981</option>
        <option>1980</option>
        <option>1979</option>
        <option>1978</option>
        <option>1977</option>
        <option>1976</option>
        <option>1975</option>
        <option>1974</option>
        <option>1973</option>
        <option>1972</option>
        <option>1971</option>
        <option>1970</option>
        <option>1969</option>
        <option>1968</option>
      </select>
    </div>
    <br>

    <label class="label">Gênero</label>
  <div class="linha-genero">
  <label class="genero-opcao">
  <input type="radio" name="genero" value="feminino">
    Feminino
  </label>

  <label class="genero-opcao">
  <input type="radio" name="genero" value="masculino">
    Masculino
  </label>

  <label class="genero-opcao">
  <input type="radio" name="genero" value="personalizado">
    Personalizado
  </label>
  </div>

  <div id="campo-genero-personalizado" style="display: none; margin-top: 10px;">
    <input type="text" name="genero_personalizado" placeholder="Qual o seu gênero?" class="campo"> 
  </div>
  <br>
  <div class="linha">
    <input type="email" name="email" class="campo" placeholder="Email">
  </div>
  <div class="linha">
    <input type="password" name="senha" class="campo" placeholder="Senha">
  </div>
    <button type="submit" name="submit" id="submit" class="btn btn-create-account">Criar nova conta</button>
    
    <p class="texto-login">
      <a href="login.php">ou já possui uma conta?</a>
    </p>

  </form>

  <script>
    const radiosGenero = document.querySelectorAll('input[name="genero"]');
    const campoPersonalizado = document.getElementById('campo-genero-personalizado');
  
    radiosGenero.forEach(radio => {
      radio.addEventListener('change', () => {
        if (radio.value === 'personalizado') {
          campoPersonalizado.style.display = 'block';
        } else {
          campoPersonalizado.style.display = 'none';
        }
      });
    });
  </script>
  
</body>
</html>
