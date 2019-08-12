<?php
include('includes/functions.php');
if (isset($_SESSION['auth'])) {
    require_once('templates/header_admin.php'); 
} else {
    require_once('templates/header.php'); 
}
// debug($_SESSION);

 ?>

<!-- Content home page -->
<?= flash(); ?>
    <main class="wrapper">
        <section class="content-home">


            <form class="form-search-tournament" action="" method="get">
                <div class="title-home">
                    <h1 class="title">Recherche ton tournoi</h1>
                </div>


                <?php $game = gameSelect('ASC'); ?>
                <?php $platform = platformSelect(); ?>
                <select name="games" class="select-game">
                <option value="">-- Jeu --</option>
                    <?php foreach ($game as $value) : ?>
                        <option value="all-games"><?= $value['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="platforms" id="select-platform">
                    <option value="">-- Plateforme --</option>
                    <?php foreach ($platform as $value) : ?>
                        <option value=" <?= $value['name']; ?>">
                            <?= $value['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="search-toornament" id="input-search" placeholder="Recherche ton tournoi" autocomplete="off">
                <div class="validate">
                    <button type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>


            <div id="containerGame" class="container-game">
                <?php $game = gameSelect('ASC', 7); ?>
                <?php foreach ($game as $value) : ?>
                    <article class="game">
                        <a id="gameSelected" href="javascript:displayTournamentGame('<?= $value['name']; ?>')">
                            <img id="game" src="<?= $value['image']; ?>" alt="<?= $value['name']; ?>">
                            <div class="hover"></div>
                        </a>
                    </article>
                <?php endforeach; ?>
                <article class="game">
                    <a href="http://localhost/php/esport-community/accueil/pages/tournois.php">
                        <img src="assets/img/all.jpg" alt="Voir tout">
                        <div class="hover"></div>
                    </a>
                </article>
            </div>
        </section>
    </main>

    <?php require_once('templates/footer.php'); ?>