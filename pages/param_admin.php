<?php include('../includes/functions.php'); ?>
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php');
} else {
    require_once('../templates/header.php');
} ?>

<?php
$idUser = $_SESSION['auth']['id'];
checkForm();
echo flash();
$dataUser = userData($idUser);
debug($dataUser);
?>

<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="infos-tab" data-toggle="tab" href="#infos" role="tab" aria-controls="infos" aria-selected="true">Informations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar" aria-selected="false">Avatar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Mot de passe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="deleteAccount-tab" data-toggle="tab" href="#deleteAccount" role="tab" aria-controls="deleteAccount" aria-selected="false">Supprimer le compte</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent" style="height=60vh">
        <div class="tab-pane fade show active" id="infos" role="tabpanel" aria-labelledby="infos-tab">
            <form class="mt-3 container">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" id="firstname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="ville" class="form-control" id="ville" aria-describedby="villeHelp">
                </div>
                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="pays" class="form-control" id="pays" aria-describedby="paysHelp">
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">

        </div>
        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

        </div>
        <div class="tab-pane fade" id="deleteAccount" role="tabpanel" aria-labelledby="deleteAccount-tab">

        </div>
    </div>
</div>

<?php require_once('../templates/footer.php'); ?>