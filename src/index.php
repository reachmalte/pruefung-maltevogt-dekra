<?php 

require 'include_database.php';

$results = $pdo->query('SELECT 
    kundendaten.name, 
    kundendaten.id,
    kundendaten.rechtsform, 
    kundenkategorie.name AS kundenkategorie_name
FROM 
    kundendaten, 
    kundenkategorie
WHERE 
    kundendaten.id_category = kundenkategorie.id');

?><html lang="en">
  <head>
    <?php require 'include_head.php'; ?>
    <title>Administrationssystem</title>
  </head>
  <body>
    <?php require 'include_navigation.php'; ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Kundendaten</h1>
            </div>
            <div class="col pt-1">
                <a class="btn btn-primary btn-lg float-right" href="kundendaten_add.php" role="button">Anlegen</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Rechtsform</th>
                    <th scope="col">Kategorie</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                <tr>
                    <th scope="row"><?php echo $row['id'] ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['rechtsform'] ?></td>
                    <td><?php echo $row['kundenkategorie_name'] ?></td>
                    <td>
                        <div class="float-right">
                            <a href="kundendaten_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary btn-sm">Bearbeiten</a>
                            <a href="kundendaten_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Löschen</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php require 'include_body_end.php'; ?>
  </body>
</html>