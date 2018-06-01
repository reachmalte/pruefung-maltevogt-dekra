<?php

require 'include_database.php';

if ($_POST['is_active'] == 'true') {
  $is_active = 1;
} else {
  $is_active = 0;
}

$sql = 'UPDATE 
  kundendaten 
SET 
  name = ?, 
  rechtsform = ?, 
  unterzeile = ?,
  kurztext = ?,
  profil = ?, 
  is_active = ?, 
  id_category = ?
WHERE 
  id = ?';

$pdo->prepare($sql)->execute([
  $_POST['name'], 
  $_POST['rechtsform'], 
  $_POST['unterzeile'],
  $_POST['kurztext'],
  $_POST['profil'], 
  $is_active, 
  $_POST['category'], 
  $_GET['id']
]);

?><!doctype html>
<html lang="en">
  <head>
    <?php require 'include_head.php'; ?>
    <title>Nachrichten-System</title>
  </head>
  <body>
    <?php require 'include_navigation.php'; ?>

    <div class="container mt-4">
        <h1>Nachricht aktualisiert</h1>
        <p class="mt-4">Die Nachricht wurde erfolgreich im System aktualisiert.</p>
        <a class="btn btn-primary mt-3" href="index.php" role="button">Zur Übersicht</a>
    </div>

    <?php require 'include_body_end.php'; ?>
  </body>
</html>