<?php include('../includes/functions.php');
$tournaments = displayTournament('name ASC');
// debug($tournaments);
 ?>
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php'); ?>

    <div class="container-tournament wrapper">
        <div class="global-display">
            <a href="creer-tournoi">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                    <circle style="fill:#43B05C;" cx="25" cy="25" r="25" />
                    <line style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" x1="25" y1="13" x2="25" y2="38" />
                    <line style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" x1="37.5" y1="25" x2="12.5" y2="25" />
                </svg>

                <h1 class="title">Créer un nouveau tournoi</h1>
            </a>
        </div>


        <?php foreach ($tournaments as $key) { ?>
            <?php
            $game = strtolower(str_replace(' ', '', $key['game']));
            $date = $key['date'];
            $heure = str_replace(':', 'h', $key['heure']);
            ?>

            <div class="global-display">
                <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/esport-community/assets/svg/cancel.svg') ?>
                <a class="tournament" href="#">
                    <img src="http://localhost/php/esport-community/assets/img/<?= $game; ?>-small.jpg" alt="<?= $key['game']; ?>">
                    <div>
                        <p><?= $key['game']; ?></p>
                        <p>Date : <?= $date ?></p>
                        <p>Heure du tournoi : <time><?= $heure; ?></time></p>
                        <h3><?= $key['name']; ?></h3>
                    </div>
                </a>
            </div>
        <?php }; ?>


    </div>

<?php } else {
    $_SESSION['message'] = [
        'label' => 'Pour créer un tournois, vous devez vous inscrire ',
        'status' => 'info'
    ];
    require_once('../templates/header.php'); ?>
    <?= flash('http://localhost/php/esport-community/pages/inscription.php', 'ici'); ?>
    <div class="container-tournament wrapper">
        <?php foreach ($tournaments as $key) { ?>
            <?php
            $game = strtolower(str_replace(' ', '', $key['game']));
            $date = $key['date'];
            $heure = str_replace(':', 'h', $key['heure']);
            ?>
            <div class="global-display">
                <a class="tournament" href="">
                    <img src="http://localhost/php/esport-community/assets/img/<?= $game; ?>-small.jpg" alt="<?= $key['game']; ?>">
                    <div>
                        <p><?= $key['game']; ?></p>
                        <p>Date : <?= $date ?></p>
                        <p>Heure du tournoi : <time><?= $heure; ?></time></p>
                        <h3><?= $key['name']; ?></h3>
                    </div>
                </a>
            </div>
        <?php }; ?>
    </div>

<?php } ?>







<?php require_once('../templates/footer.php'); ?>