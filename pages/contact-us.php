<?php include('../includes/functions.php'); ?>
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php');
} else {
    require_once('../templates/header.php');
} ?>


<div class=" mt-5 mb-5 container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contactez nous.
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Votre nom et prénom</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary text-right">Envoyer</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Adresse</div>
                <div class="card-body">
                    <p>3 rue des Champs Elysées</p>
                    <p>75008 PARIS</p>
                    <p>France</p>
                    <p>Email : email@example.com</p>
                    <p>Tel. 06 12 56 11 51 84</p>

                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once('../templates/footer.php') ?>