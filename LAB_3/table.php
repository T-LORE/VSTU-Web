<?php
require_once 'logic.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
  
  <!-- Фильтр -->
  <form action="test.php" method="GET">
    <div class="row">
        <div class="col-md-3">
            <label for="name">Название услуги:</label>
            <input type="text" class="form-control" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
        </div>
        <div class="col-md-3">
                <label for="id_hall">Номер зала:</label>
                <select class="form-control" name="id_hall">
                    <option value=""></option>
                    <?php foreach ($halls as $hall): ?>
                        <option value="<?php echo $hall['id']; ?>" <?php echo $idHall == $hall['id'] ? 'selected' : ''; ?>>
                            <?php echo $hall['hall_number']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        <div class="col-md-3">
            <label for="cost_from">Цена от:</label>
            <input type="number" class="form-control" name="cost_from" value="<?php echo $costFrom ?>">
        </div>
        <div class="col-md-3">
            <label for="cost_to">Цена до:</label>
            <input type="number" class="form-control" name="cost_to" value="<?php echo $costTo ?>">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="description">Описание:</label>
            <input type="text" class="form-control" name="description" value="<?php echo $description?>">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Применить фильтр</button>
            <a class="btn btn-secondary ml-2" href="test.php" role="button">Сбросить фильтр</a>
        </div>
    </div>
  </form>

  <!-- Таблица -->
  <h2 class="my-4">Services</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Hall Number</th>
        <th>Description</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service): ?>
        <tr>
            <td><?= $service["id"] ?></td>
            <td><img src="<?= $service["image_path"] ?>" alt="Service Image" style="max-width: 200px;"></td>
            <td><?= $service["name"] ?></td>
            <td><?= $service["hall_number"] ?></td>
            <td><?= $service["description"] ?></td>
            <td><?= $service["cost"] ?> руб.</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
