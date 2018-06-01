<?php 

require 'include_database.php';

$results = $pdo->query('SELECT * FROM kundenkategorie');

?>
<!doctype html>
<html lang="en">
  <head>
    <?php require 'include_head.php'; ?>
    <title>Kundendaten-System</title>
  </head>
  <body>
    <?php require 'include_navigation.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <h1>Kundendaten anlegen</h1>
                <form class="mt-4" action="kundendaten_add_thanks.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ihr Firmenname">
                    </div>
                    <div class="form-group">
                        <label for="rechtsform">Rechtsform</label>
                        <input type="text" class="form-control" id="rechtsform" name="rechtsform" placeholder="z.B. GmbH">
                    </div>
                    <div class="form-group">
                        <label for="unterzeile">Unterzeile</label>
                        <input type="text" class="form-control" id="unterzeile" name="unterzeile" placeholder="z.B. The Example Company">
                    </div>
                    <div class="form-group">
                        <label for="kurztext">Kurztext</label>
                        <input type="text" class="form-control" id="kurztext" name="kurztext" placeholder="Fassen Sie ihr Unternehmen kurz zusammen">
                    </div>
                    <div class="form-group">
                        <label for="profil">Profil</label>
                        <textarea class="form-control" id="profil" rows="6" name="profil" placeholder="Ihr Unternehmens-Profil"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategorie</label>
                        <select class="form-control" id="category" name="category">
                            <?php foreach ($results as $row): ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_active" value="true" id="is_active">
                        <label class="form-check-label" for="is_active">
                            Aktiviert
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Anlegen</button>
                </form>
            </div>
        </div>
    </div>

    <?php require 'include_body_end.php'; ?>
  </body>
</html>