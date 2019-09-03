<?php include('../includes/functions.php');
$idUser = $_SESSION['auth']['id'];
deleteUser($idUser);
?>
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php');
} else {
    require_once('../templates/header.php');
} ?>


<?php
editPassword($idUser);
editUserInfos($idUser);
editAvatar($idUser);
$dataUser = userData($idUser);
echo flash();
?>

<div class="container mt-5 mb-4">
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
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="infos" role="tabpanel" aria-labelledby="infos-tab">
            <form for="infos" method="post" class="mt-3 container">
                <h5>Mes informations</h5>
                <div class="form-group">
                    <label for="edit_lastname">Nom*</label>
                    <input type="text" class="form-control" id="edit_lastname" name="edit_lastname" value="<?= ucfirst($dataUser[0]['lastname']) ?>">
                </div>
                <div class="form-group">
                    <label for="edit_firstname">Prénom*</label>
                    <input type="text" class="form-control" id="edit_firstname" name="edit_firstname" value="<?= ucfirst($dataUser[0]['firstname']) ?>">
                </div>
                <div class="form-group">
                    <label for="edit_email">Email*</label>
                    <input type="email" class="form-control" id="edit_email" name="edit_email" value="<?= $dataUser[0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="edit_ville">Ville </label>
                    <input type="text" class="form-control" id="edit_ville" name="edit_ville">
                </div>
                <div class="form-group">
                    <label for="edit_pays">Pays</label>
                    <input type="text" class="form-control" id="edit_pays" name="edit_pays">
                </div>
                <button type="submit" id="infos" class="btn btn-success">Valider modification(s)</button>
            </form>
        </div>
        <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
            <form for="editAvatar" method="post" enctype="multipart/form-data">
                <div class="mt-4 mb-3">
                    <h5>Ajouter/Modifier votre avatar</h5>
                </div>
                <?php if (!empty($avatar[0]['avatar'])) { ?>
                    <div class="text-center mt-4 mb-4">
                        <img class="rounded-circle w-25" src="assets/avatar_<?= $_SESSION['auth']['id'] . '/' . $avatar[0]['avatar']; ?>" alt="<?= $avatar[0]['avatar']; ?>">
                    </div>
                <?php } else { ?>
                    <div class="text-center mt-4 mb-4">
                        <img class="rounded-circle w-25" src="assets/avatar_default/avatar.jpg" alt="avatar">
                    </div>
                <?php } ?>
                <div class="input-group">
                    <div class="custom-file">
                        <label class="custom-file-label" for="avatar">Choisir un fichier ...</label>
                        <input type="file" name="avatar" class="custom-file-input" id="avatar" aria-describedby="avatar">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="editAvatar">Enregistrer</button>
                    </div>
                </div>
                <small>Taille maximum : 800 x 800</small>
            </form>
        </div>
        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            <div class="mt-4 mb-3">
                <h5>Changer votre mot de passe</h5>
            </div>
            <form for="editPassword" method="post">
                <div>
                    <label for="actualPassword">Mot de passe actuel</label>
                    <input id="actualPassword" name="actualPassword" type="password" class="form-control">
                </div>
                <div>
                    <label for="newPassword">Nouveau mot de passe</label>
                    <input id="newPassword" name="newPassword" type="password" class="form-control">
                </div>
                <div>
                    <label for="confirmNewPassword">Confirmer nouveau mot de passe</label>
                    <input id="confirmNewPassword" name="confirmNewPassword" type="password" class="form-control">
                </div>
                <button id="editPassword" type="submit" class="mt-3 btn btn-success">Changer mot de passe</button>
            </form>
        </div>
        <div class="tab-pane fade" id="deleteAccount" role="tabpanel" aria-labelledby="deleteAccount-tab">
            <div class="mt-4 mb-3">
                <h5>Suppression de compte</h5>
            </div>
            <form for="confirmDelete" method="post">
                <div class="mb-3">
                    <label for="deleteAccount">Votre mot de passe</label>
                    <input id="deleteAccount" name="deleteAccount" type="password" class="form-control">
                </div>
                <button id="confirmDelete" type="submit" class="btn btn-danger">Supprimer votre compte</button>
            </form>
        </div>
    </div>
</div>

<?php require_once('../templates/footer.php'); ?>

<script>
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });

    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }
</script>