<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = HallAction::add();
        if (empty($errors)) {
            header("Location: hall_table_view.php");
        }
    }
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>
<!-- назад в Таблицу -->
<a href="hall_table_view.php" class="btn btn-primary mt-3">Таблица</a>
<form action="hall_create.php" method="POST" enctype="multipart/form-data">
    <div class="container-xxl px-4">
    <input type="hidden" name="is_add" value="<?= true ?>">
    <h1>Добавление зала</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="hall_number">Имя зала:</label>
                <input type="text" class="form-control" name="hall_number" placeholder="Имя зала">
            </div>
        </div>
        
        <div class="col-md-6">
                <label for="is_allow_to_delete">Зал:</label>
                <select class="form-control" name="is_allow_to_delete">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </div>
</form>

<?php if (isset($errors)): ?>
    <div class="container-xxl px-4">
        <div class="alert alert-danger mt-3" role="alert">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
    
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>