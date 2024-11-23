<?php
  session_start();
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
        <?php
          if (isset($_SESSION['login']) && $_SESSION['login']){
        ?>
          <h1><span class="destaca"><?php echo $_SESSION['nome']; ?></span>, seja bem-vindo ao Conteúdo Exclusivo</h1>
          <div class="borda"></div>
          
          <div class="logout">
            <p class="sairSistema"><a href="logout.php">Clique aqui</a> para sair do sistema</p>
          </div>
          <div class="clear"></div>
          
          <h3>Conteúdo exclusivo 01</h3>

          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy. Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla.
          </p>
          <p>
            Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ac magna. Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis. Pellentesque porttitor, velit lacinia egestas auctor, diam eros tempus arcu, nec vulputate augue magna vel risus. Cras non magna vel ante adipiscing rhoncus. Vivamus a mi. Morbi neque. Aliquam erat volutpat. Integer ultrices lobortis eros.
          </p>
          <div class="borda"></div>
        <?php 
          } else { 
        ?>
          <h1>Sistema de login e senha criptografados</h1>
          <div class="borda"></div>

          <p>Proibido o acesso por esse meio. Volte e informe os dados corretamente!</p>
          <p><a href="index.php">Página inicial</a></p>
        <?php 
          }
        ?>
      </div>
    </body>
</html>