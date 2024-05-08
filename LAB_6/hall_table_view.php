<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php')?>
<?php $halls = HallTable::get_all()?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/tables_navigation.php')?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['error']))
    {
        $error = $_GET['error'];
    }
?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>
        
<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Is allow to delete</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>  
        <?php foreach ($halls as $hall): ?>
        <tr>
            <td><?= htmlspecialchars($hall["id"]) ?></td>
            <td> <?= $hall["is_allow_to_delete"] ? "Да" : "Нет" ?></td>
            <td><?= htmlspecialchars($hall["hall_number"]) ?></td>
            
            
            <td><form action="hall_edit.php" method="post">
                <input type="hidden" name="hall_id" value="<?= $hall["id"] ?>">
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </form></td>
            <td><form action="hall_delete.php" method="post">
                <input type="hidden" name="hall_id" value="<?= $hall["id"] ?>">
                <input type="hidden" name="is_delete" value="<?= true ?>">
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>

  <a class="btn btn-primary" href="hall_create.php" role="button">Добавить зал</a>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>