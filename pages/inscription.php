<?php
require_once('../includes/functions.php');
redirect();
require('../templates/header.php');
?>

<?php
checkForm();
echo flash();
?>

<div class="container mt-5">
    <div class="text-center">
        <h2>Formulaire d'inscription</h2>
        <p class="lead">
            Si vous êtes arriver jusqu'ici, c'est que vous aussi vous êtes passionné(e) de jeux vidéos!
            Nous vous souhaitons la bienvenue et ésperons que vous trouverez ici ce que vous chercher ! Merci et à très vite.
        </p>
    </div>

</div>
<div class="container">
    <form method="post" action="" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first-name">Nom*</label>
                <input type="text" class="form-control" id="first-name" name="first-name" required>
                <div class="invalid-feedback">
                    Un nom est requis.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last-name">Prénom*</label>
                <input type="text" class="form-control" id="last-name" name="last-name" required>
                <div class="invalid-feedback">
                    Un prénom est requis.
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email">Adresse mail*</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            <div class="invalid-feedback">
                Merci de renseigner une adresse mail valide.
            </div>
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe*</label>
            <input type="password" name="password" class="form-control" id="password" required>
            <small class="">Votre mot de passe doit contenir au minimum 8 caractères, 1 majuscule, 1 nombre, et un caractère spécial.</small>
            <div class="invalid-feedback">
                Merci de renseigner le champ.
            </div>
        </div>
        <div class="mb-3">
            <label for="password-confirm">Vérification mot de passe*</label>
            <input type="password" name="password-confirm" class="form-control" id="password-confirm" required>
            <div class="invalid-feedback">
                Merci de renseigner le champ.
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="country">Pays <span class="text-muted">(Facultatif)</span></label>
                <input type="text" class="form-control" id="country" >
            </div>
        </div>
        <div class="mb-3">
            <label for="address">Adresse postale <span class="text-muted">(Facultatif)</span></label>
            <input type="text" class="form-control" id="address" >
        </div>
        <hr class="mb-4">
        <small>* Indique les champs obligatoires.</small>
        <div class="custom-control text-center custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="save-info" id="save-info" required>
            <label class="custom-control-label align-middle" for="save-info">J'accepte les Conditions Général d'Utilisations</label>
            <a href="cgu.php" class="badge badge-warning ml-4 text-uppercase p-4 align-middle">Voir les CGU</a>
            <a href="" class="badge badge-warning ml-2 text-uppercase p-4 align-middle">Voir la RGPD</a>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary mb-5 btn-lg btn-block" type="submit">Je m'inscrit</button>
    </form>
</div>
</div>

<?php include('../templates/footer.php') ?>