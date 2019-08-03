<?php include('../includes/functions.php');?>
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php'); 
} else {
    require_once('../templates/header.php'); 
} ?>

<div id="twitch-embed"></div>

<script src="https://embed.twitch.tv/embed/v1.js"></script>
<script src="../assets/js/twitch.js"></script>

<?php require_once('../templates/footer.php'); ?>