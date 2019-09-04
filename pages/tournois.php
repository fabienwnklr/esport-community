<?php include('../includes/functions.php');
$tournaments = displayTournament();
$platform = platformSelect();
?>
<!-- Condition pour appeler le header adapter -->
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php');
} else {
    require_once('../templates/header.php');
} ?>

<div class="container_tournois wrapper">
    <div class="title">
        <h2 class="first-title">Tous les tournois</h2>
    </div>

    <!-- Affichage de touts les tournois -->
    <?php foreach ($tournaments as $key) { ?>
        <?php
        $game = strtolower(str_replace(' ', '', $key['game']));
        $date = $key['date'];
        $heure = str_replace(':', 'h', $key['heure']);
        ?>
        <div class="tournoi">
            <a href="#">
                <img src="http://localhost/php/esport-community/assets/img/icon-<?= $game; ?>.png" alt="<?= $key['game']; ?>">
                <div class="details_tournoi">
                    <h4 class="game_name"><?= $key['name']; ?></h3>
                        <p><?= $key['game']; ?></p>
                        <p>Date : <?= $date ?></p>
                        <p>Heure du tournoi : <time><?= $heure; ?></time></p>

                </div>
            </a>
        </div>
    <?php }; ?>
</div>

<?php require_once('../templates/footer.php'); ?>