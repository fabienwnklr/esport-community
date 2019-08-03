<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/main.css">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/tournois.css">
    <link rel="stylesheet" href="http://localhost/php/esport-community/assets/css/tournois_admin.css">
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
            <div class="burger">
                <span></span>
            </div>

        </a>
        <a class="logo wrapper" href="http://localhost/php/esport-community/" title="Accueil">
            <?php require_once('logo.php'); ?>
        </a>
        <nav class="main-menu wrapper">
            <ul class="menu-nav">
                <li class="create-toornament">
                    <a href="http://localhost/php/esport-community/pages/tournois.php" title="Tournois">
                        Tournois
                    </a>
                </li>
                <li class="live">
                    <a href="http://localhost/php/esport-community/pages/live.php" title="Live">
                        Live
                    </a>
                </li>
                <li class="contact-us">
                    <a href="http://localhost/php/esport-community/pages/contact-us.php" title="Nous contactez">
                        Nous contactez
                    </a>
                </li>
            </ul>
            <ul id="menu-connected">
                <li class="account">
                    <a href="#" title="Inscription">
                        <img src="" alt="">
                        <?= ucfirst($_SESSION['auth']['firstname']);  ?>
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="http://localhost/php/esport-community/pages/param_admin.php">
                                <i class="fas fa-user-cog"></i>
                                Paramètres
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/php/esport-community/pages/creer-tournoi.php">
                                <i class="fas fa-plus-circle"></i>
                                Créer un tournoi
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/php/esport-community/pages/tournois_admin.php">
                                <i class="fas fa-chess"></i>
                                Mes tournois
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/php/esport-community/pages/logout.php">
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