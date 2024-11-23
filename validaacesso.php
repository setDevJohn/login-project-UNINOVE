<?php
  session_start();
  include 'conection.php';
?>

<!DOCTYPE HTML>
<html lang="br" class="no-js">
  <head>
    <title>Sistema de Login e Senha Criptografados</title>
    <link href="./css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div id="conteudo">
      <h1>Sistema de login e senha criptografados - Verificando Informações</h1>
      <div class="borda"></div>

      <?php
        $recebeEmail = $_POST['email'];
        $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);

        $recebeSenha = $_POST['senha'];
        $filtraSenha = filter_var($recebeSenha, FILTER_SANITIZE_SPECIAL_CHARS);

        function criptoSenha($criptoSenha){
          return md5($criptoSenha);
        }
        $criptoSenha = criptoSenha($filtraSenha);

        $consultaInformacoes = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$filtraEmail' AND senha = '$criptoSenha'") or die (mysqli_error($conn));
        $verificaInformacoes = mysqli_num_rows($consultaInformacoes);

        if($verificaInformacoes == 1){
          while ($result = mysqli_fetch_array($consultaInformacoes)){
            $_SESSION['login'] = true;
            $_SESSION['nome'] = $result['nome'];
            header("Location: conteudoExclusivo.php");
            exit;
          }
        } else {
          echo "<p>Nome de Usuário ou Senha informada não confere. Por favor, <a href='javascript:history.back();'>volte</a> e tente novamente!</p>";
        }
      ?>
    </div>
  </body>
</html>
