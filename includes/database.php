<?php
require_once('config.php');

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->exec('SET CHARACTER SET utf8');

    if (DEBUG) {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
} catch (Exception $e) {
    if (DEBUG) {
        echo utf8_encode($e->getMessage());
    } else {
        echo 'Erreur de connexion a la base de données.';
    }
    die();
}
