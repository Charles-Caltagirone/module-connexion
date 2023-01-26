<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Index</title>
  <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
  <header>
    <nav>
      <?php
      require 'config.php';
      // require 'header_menu.php';
      ?>
    </nav>
  </header>


  <?php
  if (isset($_SESSION['user'][0]['login']) == null) {
    echo '<h1> Welcome </h1>';
  } else {
    require 'header_menu.php';
    echo '<h1> Welcome </h1>' . $_SESSION['user'][0]['login'];
    // echo $_SESSION['login'];
  }
  ?>
  <div>
    <a href="login.php">• Se connecter •</a>
    <a href="registration.php">• S'enregistrer •</a>
    <!-- <a href="logout.php">Logout</a> -->
  </div>
</body>
<?php var_dump($_SESSION); ?>

</html>