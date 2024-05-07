<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php')?>
<?php $halls = HallTable::get_all()?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/tables_navigation.php')?>
  
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>  
        <?php foreach ($halls as $hall): ?>
        <tr>
            <td><?= htmlspecialchars($hall["id"]) ?></td>
            <td><?= htmlspecialchars($hall["hall_number"]) ?></td>
            
            <!-- форма с пост запросом для кнопки "редактировать" -->
            <td><form action="hall_edit.php" method="post">
                <input type="hidden" name="hall_id" value="<?= $hall["id"] ?>">
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </form></td>
            <td><form action="hall_delete.php" method="post">
                <input type="hidden" name="hall_id" value="<?= $hall["id"] ?>">
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>

  <a class="btn btn-primary" href="hall_create.php" role="button">Добавить зал</a>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>