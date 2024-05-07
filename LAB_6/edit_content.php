<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php')?>
<?php 
    if (!isset($_POST['content_id'])) {
        header("location: services.php");
    }
    $service = ContentTable::get_by_id($_POST['content_id']);

    $halls = HallTable::get_all();
    
    $errors = ContentAction::edit();

    if (isset($errors) && empty($errors)) {
        header("location: services.php");
    }
?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>
<div class="container-xxl px-4">
    <h1>Редактирование услуги</h1>
    <form action="edit_content.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="content_id" value="<?= $service['id'] ?>">
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="name">Название:</label>
                <input type="text" class="form-control" name="name" value="<?= $service['name'] ?>">
            </div>
            <div class="col-md-6">
                <label for="id_hall">Зал:</label>
                <select class="form-control" name="id_hall">
                    <option value=""></option>
                    <?php foreach ($halls as $hall): ?>
                        <option value="<?php echo $hall['id']; ?>" <?php echo $service['id_hall'] == $hall['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($hall['hall_number']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="cost">Цена:</label>
                <input type="number" class="form-control" name="cost" value="<?= $service['cost'] ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="description">Описание:</label>
                <input type="text" class="form-control" name="description" value="<?= $service['description'] ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="image">Изображение:</label>
                <input type="file" class="form-control" name="image">
            </div>
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