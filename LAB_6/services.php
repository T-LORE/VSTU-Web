<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php')?>
<?php $services = ContentTable::get_all(); ?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>
  
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Hall Number</th>
        <th>Description</th>
        <th>Cost</th>
        <th colspan="2"></th>
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
            
            <!-- форма с пост запросом для кнопки "редактировать" -->
            <td><form action="edit_content.php" method="post">
                <input type="hidden" name="content_id" value="<?= $service['id'] ?>">
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </form></td>
            <td><form action="delete_content.php" method="post">
                <input type="hidden" name="content_id" value="<?= $service['id'] ?>">
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>

  <a class="btn btn-primary" href="add_content.php" role="button">Добавить услугу</a>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>