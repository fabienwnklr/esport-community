<?php include('../includes/functions.php'); ?>
<?php if (isset($_SESSION['auth'])) {
    include('../templates/header_admin.php');
    checkFormCreateTournament();
    echo flash()
    ?>
<main class="create-tournament-main">

    <!-- DEBUT TITRE PAGE -->
    <h1 class="first-title">Créer ton tournoi</h1>
    <!-- FIN TITRE PAGE -->

    <!-- DEBUT DU CONTENT POUR CREER TOURNOI -->
    <section class="section-create">
        <form method="post" class="form-create-tournament" action="" class="needs-validation" novalidate>

            <!-- DEBUT NOM TOURNOI -->
            <div class="form-name-tournament">
                <label class="label-name-tournament" for="name_tournament">Nom du tournoi (30 caractères max.)</label>
                <input type="text" name="name_tournament" id="name_tournament" class="input-name-toornament" placeholder="Nom du tournoi (30 caractères max.)" required>
            </div>
            <!-- FIN NOM TOURNOI -->

            <!-- DEBUT CHOIX JEUX PAR IMG -->
            <div class="choose-game-container">
                <?php $game = gameSelect('ASC', 6); ?>
                <?php foreach ($game as $value) : ?>
                <article class="choose-game">
                    <img id="game" onclick="returnSelectedGame(this)" src="<?= $value['image']; ?>" alt="<?= $value['name']; ?>">
                </article>
                <?php endforeach; ?>
            </div>
            <!-- FIN CHOIX JEUX PAR IMG -->

            <?php $game = gameSelect('ASC'); ?>
            <?php $platform = platformSelect(); ?>
            <label for="game_selected"></label>
            <input type="search" id="inputToReturnValue" name="game_selected" class="input-game-selected" placeholder="Choisit ton jeu..." required>

            <!-- DEBUT CHECKBOX SELECT PLATFORM -->
            <div class="platforms-container">
                <?php foreach ($platform as $value) : ?>
                <div class="check-platform">
                    <input type="checkbox" id="platform_checkbox_<?= $value['name']; ?>" name="platform[]" value="<?= $value['name']; ?>" required>
                    <label for="platform_checkbox_<?= $value['name']; ?>">
                        <?= $value['name']; ?>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- FIN CHECKBOX SELECT PLATFORM -->

            <!-- DEBUT DATE ET HEURE TOURNOI -->
            <div class="container-date">
                <div class="date">
                    <label for="date">Date</label>
                    <input id="date" name="date" type="date" required>
                </div>
                <div class="heure">
                    <label for="heure">Heure</label>
                    <input name="heure" id="heure" type="time" required>
                </div>
            </div>
            <!-- FIN DATE ET HEURE TOURNOI -->

            <!-- RÉSUMER DU FORM -->
            <div class="summarize-container table-responsive mt-5">
                <h2>Récapitulatif</h2>
                <table id="table" class="table table-sm table-dark">
                    <tbody>
                        <tr>
                            <td>Nom du tournoi</td>
                            <td id="preview_name"></td>
                        </tr>
                        <tr>
                            <td>Jeu</td>
                            <td id="preview_game"></td>
                        </tr>
                        <tr>
                            <td>Plateforme</td>
                            <td id="preview_platform"></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td id="preview_date"></td>
                        </tr>
                        <tr>
                            <td>Heure</td>
                            <td id="preview_heure"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- FIN RÉSUMER DU FORM -->

            <!-- BUTTON CREER TOURNOI -->
            <div class="create-button">
                <button type="submit">
                    <span class="creer"> Créer</span>
                </button>
            </div>
            <!-- BUTTON CREER TOURNOI -->
        </form>
    </section>
    <!-- FIN CONTENT CREER TOURNOI -->
</main>
<?php include('../templates/footer.php'); ?>
<?php } else {
    include('../error/404.html');
} ?>