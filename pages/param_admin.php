<?php include('../includes/functions.php'); ?>
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php');
} else {
    require_once('../templates/header.php');
} ?>

<?php
checkForm();
echo flash();
?>

<div class="container mt-5">
    <div class="text-center">
        <h2>Vos informations.</h2>
    </div>

</div>
<div class="container">
    <form method="post" action="" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first-name">Nom</label>
                <input type="text" class="form-control" id="first-name" name="first-name" required>
                <div class="invalid-feedback">
                    Un nom est requis.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last-name">Prénom</label>
                <input type="text" class="form-control" id="last-name" name="last-name" required>
                <div class="invalid-feedback">
                    Un prénom est requis.
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email">Adresse mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            <div class="invalid-feedback">
                Merci de renseigner une adresse mail valide.
            </div>
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe</label>
            <input type="password"  name="password" class="form-control" id="password" required>
            <small class="">Votre mot de passe doit contenir au minimum 8 caractères, 1 majuscule, 1 nombre, et un caractère spécial.</small>
            <div class="invalid-feedback">
                Merci de renseigner le champ.
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="country">Pays</label>
                <input type="text" class="form-control" id="country" >
            </div>
        </div>
        <div class="mb-3">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" id="address" >
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary mb-5 btn-lg btn-block" type="submit">Enregistrer</button>
    </form>
</div>
</div>

<?php require_once('../templates/footer.php'); ?>