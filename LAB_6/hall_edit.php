<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php')?>
<?php 
    if (!isset($_POST['hall_id'])) {
        header("location: hall_table_view.php");
    }
    $hall = HallTable::get_by_id($_POST['hall_id']);
    
    $errors = HallAction::edit();

    if (isset($errors) && empty($errors)) {
        header("location: hall_table_view.php");
    }
?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>
<div class="container-xxl px-4">
    <h1>Редактирование услуги</h1>
    <form action="hall_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="hall_id" value="<?= $hall['id'] ?>">
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="name">Название:</label>
                <input type="text" class="form-control" name="hall_number" value="<?= $hall['hall_number'] ?>" placeholder="Имя зала">
            </div>
        <input type="hidden" name="is_edit" value="true">
        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>

    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>