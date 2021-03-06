<?php
$idUser = $_SESSION['auth']['id'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/esport-community/assets/css/main.css">
    <link rel="stylesheet" href="http://localhost/esport-community/assets/css/tournois.css">
    <link rel="stylesheet" href="http://localhost/esport-community/assets/css/tournois_admin.css">
    <link rel="stylesheet" href="http://localhost/esport-community/assets/css/create.css">
    <link rel="stylesheet" href="http://localhost/esport-community/assets/css/contact.css">
    <link rel="stylesheet" href="http://localhost/esport-community/assets/css/footer.css">
    <link rel="icon" href="http://localhost/esport-community/assets/avatar_default/avatar.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>e-Sport Community</title>
</head>


<div class="site-pusher">
    <header id="header">
        <a href="#" id="header-icon" class="header-icon">
            <div class="burger">
                <span></span>
            </div>
        </a>
        <a class="logo wrapper" href="accueil" title="Accueil">
            <?php require_once('logo.php'); ?>
        </a>
        <nav class="main-menu wrapper">
            <ul class="menu-nav">
                <li class="create-toornament">
                    <a href="tournois" title="Tournois">
                        Tournois
                    </a>
                </li>
                <li class="live">
                    <a href="live" title="Live">
                        Live
                    </a>
                </li>
                <li class="contact-us">
                    <a href="contact" title="Contact">
                        Contact
                    </a>
                </li>
            </ul>
            <ul id="menu-connected">
                <?php if (!empty($avatar[0]['avatar'])) { ?>
                    <img class="avatar" src="assets/avatar_<?= $_SESSION['auth']['id'] . '/' . $avatar[0]['avatar']; ?>" alt="<?= $avatar[0]['avatar']; ?>">
                <?php } else { ?>
                    <img class="avatar" src="assets/avatar_default/avatar.jpg" alt="avatar">
                <?php } ?>
                
                    <a href="#">
                        <?= ucfirst($_SESSION['auth']['lastname']);  ?>
                    </a>
                
                <i class="fas fa-angle-down"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="parametres">
                            <i class="fas fa-user-cog"></i>
                            Paramètres
                        </a>
                    </li>
                    <li>
                        <a href="creer-tournoi">
                            <i class="fas fa-plus-circle"></i>
                            Créer un tournoi
                        </a>
                    </li>
                    <li>
                        <a href="mes-tournois">
                            <i class="fas fa-chess"></i>
                            Mes tournois
                        </a>
                    </li>
                    <li>
                        <a href="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            Déconnexion
                        </a>
                    </li>
                </ul>
                </li>
            </ul>
        </nav>
    </header>

    <body id="body">

        <div id="site-cache">