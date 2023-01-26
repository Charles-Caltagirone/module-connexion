<?php
include('config.php');

/* 
$request = mysqli_query($connect,"SELECT * FROM utilisateurs");
$tab_bbd= mysqli_fetch_all($request,MYSQLI_ASSOC);
foreach($tab_bbd as $user){
}; */

//var_dump($tab_bbd);
//echo"<hr> <br>";
//var_dump($_SESSION);
//echo"<br>";

if (isset($_POST['submit'])) {

    $mess_pw = ""; //variable message password manquant
    $error_pw = ""; //variable message password error
    $modif_succes = "";
    $new_login = $_POST['new_login']; // variable stockage
    $password = $_POST['password'];
    $login = $_SESSION['login'];

    // var_dump($_POST['login']);
    // echo "<br>";

    if (empty($_POST['new_login']) || empty($_POST['old_password']) || empty($_POST['password']) || empty($_POST['password2'])) {

        $mess_pw = "Renseignez les champs à remplir";
    } elseif ($_POST['password'] != $_POST['password2']) {

        $error_pw = "Veuillez rentrez le même password";
    } elseif (($_POST['password'] === $_POST['password2']) && !empty($_POST['old_password'])) {

        //$connect =  mysqli_connect("localhost", "root", "","moduleconnexion");
        $sql = $conn->query("UPDATE utilisateurs SET login ='$new_login',password = '$password' WHERE login='$login' ");

        $modif_succes = "Votre profil a été mise à jour avec succès";
        echo "<br>";
    }
}


?>


<div class="container_session">
    <?php if (@$_SESSION['login']) { ?>
</div>


<!DOCTYPE html>
<html lang="Fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&family=Roboto+Flex:opsz,wght@8..144,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>
    <nav>
        <?php require 'header_menu.php'; ?>
    </nav>


    <div class="container_session">

        <h1><?= @$mess_welcome ?></h1>

        <a href="logout.php">Deconnexion</a>
        <?php if ($_SESSION['login'] == 'admin') : ?>
            <?= "<a href='admin.php'>Page Admin </a>" ?>
        <?php endif; ?>

    </div>


    <div class="message-succes">
        <p><?= @$modif_succes ?></p>
    </div>


    <div class="container-sign">

        <form action="" method="POST" autocomplete="off">

            <br>
            <br>
            <label for="new_login">LOGIN</label><br>

            <input type="text" name="new_login" placeholder="login" value="<?= @$_SESSION['login'] ?>"><br>

            <label for="mtp">Ancien mot de passe</label> <br>
            <input type="password" name="old_password" placeholder="Entrez un mot de passe"> <br>

            <label for="mtp">Nouveau mot de passe</label> <br>
            <input type="password" name="password" placeholder="Entrez un mot de passe"> <br>

            <label for="confirm">CONFIRMATION DE MOT PASSE</label><br>
            <input type="password" name="password2"><br>

            <?php if (isset($error_pass)) { ?>
                <span>
                    <p><?= $error_pass ?></p>
                </span>
            <?php } ?>
            <br>

            <?= @$mess_pw ?>
            <?= @$error_pw ?>
            <br>
            <br>


            <input type="submit" name="submit" value="Sauvegarder" class="btn btn-primary">


        </form>
    </div>
<?php } else {
        header("location: index.php");
    }
    var_dump($_SESSION); ?>


</body>

</html>