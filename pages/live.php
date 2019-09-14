<?php include('../includes/functions.php');?>
<?php if (isset($_SESSION['auth'])) {
    require_once('../templates/header_admin.php'); 
} else {
    require_once('../templates/header.php'); 
} ?>

<div id="twitch-embed" style="height:600px"></div>

<script src="https://embed.twitch.tv/embed/v1.js"></script>
<script>
new Twitch.Embed("twitch-embed", {
    width: "100%",
    height: 600,
    channel: "gotaga",
    theme: "dark",
});
</script>

<?php require_once('../templates/footer.php'); ?>