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
            <td><a class="btn btn-primary" type="button" id="edit" href="/LAB_6/edit.php?id=<?= htmlspecialchars($service["id"]) ?>">Редактировать</a></td>
            <td><a class="btn btn-danger delete" data-itemId="<?= htmlspecialchars($service["id"]) ?>">Удалить</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>