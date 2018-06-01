<?php 

require 'include_database.php';

// Get news
$sql = "SELECT * FROM kundendaten WHERE id = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$_GET['id']]);
$row = $statement->fetch(PDO::FETCH_ASSOC);

// Get categories
$results = $pdo->query('SELECT * FROM kundenkategorie');

?><!doctype html>
<html lang="en">
  <head>
    <?php require 'include_head.php'; ?>
    <title>Nachrichten-System</title>
  </head>
  <body>
    <?php require 'include_navigation.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <h1>Kundendaten bearbeiten</h1>
                <form class="mt-4" action="kundendaten_edit_thanks.php?id=<?php echo $row['id'] ?>" method="POST">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ihr Firmenname" value="<?php echo $row['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="short_text">Rechtsform</label>
                        <input type="text" class="form-control" id="rechtsform" name="rechtsform" placeholder="z.B. GmbH" value="<?php echo $row['rechtsform'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="short_text">Unterzeile</label>
                        <input type="text" class="form-control" id="unterzeile" name="unterzeile" placeholder="The Example Company" value="<?php echo $row['unterzeile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="short_text">Kurztext</label>
                        <input type="text" class="form-control" id="kurztext" name="kurztext" placeholder="Fassen Sie ihr Unternehmen kurz zusammen" value="<?php echo $row['kurztext'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="text">Profil</label>
                        <textarea class="form-control" id="profil" rows="6" name="profil" placeholder="Ihr Unternehmens-Profil"><?php echo $row['profil'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategorie</label>
                        <select class="form-control" id="category" name="category">
                            <?php foreach ($results as $rowCategory): ?>
                                <option value="<?php echo $rowCategory['id'] ?>"<?php if($row['id_category'] == $rowCategory['id']) { ?> selected<?php } ?>><?php echo $rowCategory['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" name="is_active" id="status"<?php if($row['is_active'] == 1) { ?> checked<?php } ?>>
                        <label class="form-check-label" for="status">
                            Aktiviert
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Aktualisieren</button>
                </form>
            </div>
        </div>
    </div>

    <?php require 'include_body_end.php'; ?>
  </body>
</html>