<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/main.css">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/tournois.css">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/create.css">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/contact.css">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/footer.css">
    <link rel="icon" href="http://localhost/php/esport-community/assets/svg/logo.svg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>e-Sport Community</title>
</head>


<div class="site-pusher">
    <header id="header">
        <a href="#" id="header-icon" class="header-icon">
            <div id="burger" class="burger">
                <span></span>
            </div>

        </a>
        <a class="logo wrapper" href="accueil" title="Accueil">
            <?php require_once('logo.php'); ?>
        </a>
        <nav class="main-menu wrapper">
            <ul class="menu-nav">
                <li class="create-toornament">
                    <a href="tournois" title="Mes tournois">
                        Tournois
                    </a>
                </li>
                <li class="live">
                    <a href="live" title="Live">
                        Live
                    </a>
                </li>
                <li class="contact-us">
                    <a href="contact" title="Nous contactez">
                        Nous contactez
                    </a>
                </li>
            </ul>
            <ul id="menu-connect">
                <li class="inscription">
                    <a href="inscription" title="Inscription">
                    <i class="fas fa-user-plus"></i>
                        Inscription
                    </a>
                </li>
                <li class="connexion">
                    <a href="connexion" title="Connexion">
                    <i class="fas fa-sign-in-alt"></i>
                        Connexion
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <body id="body">

        <div id="site-cache">