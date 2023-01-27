<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
</head>

<body>
  <header>
    <nav>
      <?php
      require 'config.php';
      require 'header_menu.php';
      ?>
    </nav>
  </header>
  <div class="container">

    <h1>
      <?php
      if (isset($_SESSION['user'][0]['login']) == null) {
        echo 'Bonjour !';
      } else {
        echo ' Bienvenue à toi ' . $_SESSION['user'][0]['login'];
        // echo $_SESSION['login'];
      }
      ?>
    </h1>
    <div>
      <button type="submit" name="submit"><a href="login.php">Déjà inscrit ? Connecte toi ici !</a></button>
      <button type="submit" name="submit"><a href="registration.php">Inscription</a></button>

      <!-- <a href="logout.php">Logout</a> -->
    </div>
  </div>
</body>
<?php
// var_dump($_SESSION); 
?>

</html>