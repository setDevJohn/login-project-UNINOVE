<?php
  include "conection.php";
?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema de Login e Senha Criptografados</title>
    <link href="./css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div id="conteudo">
      <h1>Sistema de login e senha criptografados</h1>
      <div class="borda"></div>

      <?php
          $recebeNome = $_POST['nome'];
          $filtraNome = filter_var($recebeNome,FILTER_SANITIZE_SPECIAL_CHARS);

          $recebeEmail = $_POST['email'];
          $filtraEmail = filter_var($recebeEmail,FILTER_SANITIZE_SPECIAL_CHARS);

          $recebeSenha = $_POST['senha'];
          $filtraSenha = filter_var($recebeSenha,FILTER_SANITIZE_SPECIAL_CHARS);

          function criptoSenha($criptoSenha){
            return md5($criptoSenha);
          }
          $criptoSenha = criptoSenha($filtraSenha);

          $consultaBanco = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$recebeEmail'") or die (mysqli_error($conn));
          $verificaBanco = mysqli_num_rows($consultaBanco);

          if($verificaBanco == 1){
            echo "<p>Prezado(a) <strong>$recebeNome</strong>, o endereço de e-mail informado (<strong><em>$recebeEmail</em></strong>) já consta em nossa base de dados!</p>";
            echo "<p><a href='javascript:history.back();'>Volte</a> para a página anterior e informe um novo endereço! Obrigado!</p>";
            return false;
          }
          else {
            $insereDados = mysqli_query($conn, "INSERT INTO usuario (nome, email, senha) VALUES ('$filtraNome', '$filtraEmail', '$criptoSenha')") or die (mysqli_error($conn));
            echo "<p>Seu cadastro foi efetuado com sucesso!</p>";
            echo "<p><a href='index.php'>Volte a tela inicial</a></p>";
          }
      ?>
    </div>
  </body>
</html>