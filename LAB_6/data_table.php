<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/data_table_logic.php');
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>

  <!-- Фильтр -->
  <form method="GET" class="px-2 py-2 mt-4">
    <div class="row">
        <div class="col-md-3">
            <label for="name">Название услуги:</label>
            <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name) ?>">
        </div>
        <div class="col-md-3">
                <label for="id_hall">Номер зала:</label>
                <select class="form-control" name="id_hall">
                    <option value=""></option>
                    <?php foreach ($halls as $hall): ?>
                        <option value="<?php echo $hall['id']; ?>" <?php echo $idHall == $hall['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($hall['hall_number']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        <div class="col-md-3">
            <label for="cost_from">Цена от:</label>
            <input type="number" class="form-control" name="cost_from" value="<?php echo htmlspecialchars($costFrom) ?>">
        </div>
        <div class="col-md-3">
            <label for="cost_to">Цена до:</label>
            <input type="number" class="form-control" name="cost_to" value="<?php echo htmlspecialchars($costTo) ?>">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="description">Описание:</label>
            <input type="text" class="form-control" name="description" value="<?php echo htmlspecialchars($description)?>">
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
            <td><?= htmlspecialchars($service["id"]) ?></td>
            <td><img src="resource_manager.php?image=<?= htmlspecialchars($service["image_path"]) ?>" alt="Image" width="200" height="200"></td>
            <td><?= htmlspecialchars($service["name"]) ?></td>
            <td><?= htmlspecialchars($service["hall_number"]) ?></td>
            <td><?= htmlspecialchars($service["description"]) ?></td>
            <td><?= htmlspecialchars($service["cost"]) ?> руб.</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>
