<?php
include('../includes/functions.php');
if (isset($_POST) && $_POST['get'] == 'selectGame') {
    $name = $_POST['name'];
    $tournois = displayGameTournament($name);
    echo json_encode($tournois);
} else if (isset($_POST) && $_POST['get'] == 'removeTournament') {
    $id = $_POST['id'];
    $delete = deleteTournament($id);
    return;
}