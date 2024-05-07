<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = ContentAction::add();
        if (empty($errors)) {
            header("Location: services.php");
        }
    }
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>
<!-- назад в Таблицу -->
<a href="services.php" class="btn btn-primary mt-3">Таблица</a>
<form action="add_content.php" method="POST" enctype="multipart/form-data">
    <div class="container-xxl px-4">
        <h1>Добавление услуги</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="name">Название:</label>
                <input type="text" class="form-control" name="name" placeholder="Название услуги">
            </div>
            <div class="col-md-6">
                <label for="id_hall">Зал:</label>
                <select class="form-control" name="id_hall">
                    <?php foreach (HallTable::get_all() as $hall): ?>
                        <option value="<?php echo $hall['id']; ?>">
                            <?php echo htmlspecialchars($hall['hall_number']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="cost">Цена:</label>
                <input type="number" class="form-control" name="cost" placeholder="Цена услуги">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="description">Описание:</label>
                <input type="text" class="form-control" name="description"placeholder="Описание услуги">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="image">Картинка:</label>
                <input type="file" class="form-control" name="image">
            </div>
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
