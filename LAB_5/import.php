<?php  
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_5/core.php');
function checkJSONElement($element) : array {
    // проверить что элемент содержит все необходимые поля
    $errors = [];
    // проверить количество полей
    if (count($element) !== 6) {
        $errors[] = 'Неверное количество полей';

        return $errors;
    }

    if (!isset($element['cost'])) {
        $errors[] = 'Отсутствует поле cost';
    }

    if (!isset($element['image_path'])) {
        $errors[] = 'Отсутствует поле image_path';
    }

    if (!isset($element['name'])) {
        $errors[] = 'Отсутствует поле name';
    }

    if (!isset($element['id_hall'])) {
        $errors[] = 'Отсутствует поле id_hall';
    }

    if (!isset($element['description'])) {
        $errors[] = 'Отсутствует поле description';
    }

    if (!isset($element['id'])) {
        $errors[] = 'Отсутствует поле id';
    }

    if (count($errors) > 0) {
        return $errors;
    }

    if (!is_numeric($element['id_hall'])) {
        $errors[] = 'Поле id_hall должно быть числом';
    }
    
    if (!is_numeric($element['cost'])) {
        $errors[] = 'Поле cost должно быть числом';
    }
    
    if (!is_string($element['image_path'])) {
        $errors[] = 'Поле image_path должно быть строкой';
    }

    if (!is_string($element['name'])) {
        $errors[] = 'Поле name должно быть строкой';
    }

    if (!is_string($element['description'])) {
        $errors[] = 'Поле description должно быть строкой';
    }

    if (!is_numeric($element['id'])) {
        $errors[] = 'Поле id должно быть числом';
    }

    return $errors;

}
function import() : array {
    $result = [];
    if (empty($_POST['path'])) {
        $result['error'] = 'Поле пути не заполнено';
        return $result;
    }

    $path = $_SERVER['DOCUMENT_ROOT'] .'/' . $_POST['path'] ;
    if (!file_exists($path)) {
        $result['error'] = 'Файл не найден';
        return $result;
    }
    if (!is_readable($path)) {
        $result['error'] = 'Файл не доступен для чтения';
        return $result;
    }
    $data = file_get_contents($path);
    $json = json_decode($data, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        $result['error'] = 'Ошибка при декодировании JSON';
        return $result;
    }

    $connection = Database::connection();

    $create_table = "CREATE TABLE IF NOT EXISTS services_imported (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        image_path VARCHAR(45),
        name VARCHAR(45),
        id_hall INT(10) UNSIGNED,
        description VARCHAR(4000),
        cost DOUBLE NOT NULL,
        FOREIGN KEY (id_hall) REFERENCES halls(id)
    );";
    $connection->exec($create_table);

    $connection->exec('TRUNCATE TABLE services_imported');

    for ($i = 0; $i < count($json); $i++) {
        $errors = checkJSONElement($json[$i]);
        if (!empty($errors)) {
            $result['error'] = 'Ошибка в элементе ' . ++$i . ': ' . implode(', ', $errors);
            return $result;
        }
        $sql = 'INSERT INTO services_imported (image_path, name, id_hall, description, cost) VALUES (:image_path, :name, :id_hall, :description, :cost)';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':image_path', $json[$i]['image_path']);
        $stmt->bindParam(':name', $json[$i]['name']);
        $stmt->bindParam(':id_hall', $json[$i]['id_hall']);
        $stmt->bindParam(':description', $json[$i]['description']);
        $stmt->bindParam(':cost', $json[$i]['cost']);
        if (!$stmt->execute()) {
            throw new PDOException("При добавлении возникла ошибка");
        }
    }
    $result['success'] = "Успешно импротированы данные из файла $path. Создана таблица services_imported. В таблицу добавлено " . count($json) . " записей.";
    return $result;   
}

if (isset($_POST['path'])) {
    $path = $_POST['path'];
    $result = import();
    if (isset($result['error']))
    {
        $error = $result['error'];
    }
    if (isset($result['success']))
    {
        $success = $result['success'];
    }        
}
?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/header.php')?>
<div class="container-xxl px-4">   
<form action="import.php" method="POST">
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="form-group">
                <label for="path">Путь импортируемого JSON файла относительно корня сайта</label>

                <input type="text" class="form-control" id="path" name="path" placeholder="LAB_5/data.json" value="<?php echo isset($path) ? $path : ''; ?>">
            </div>
        </div>
        <div class="col-md-6 offset-md-3">
            <button type="submit" name="download" value="true" class="btn btn-primary">Импортировать JSON</button>
        </div>
    </div> 
</form>

<!-- вывод ошибки -->
<?php if (isset($error)): ?>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- вывод успешного импорта -->
<?php if (isset($success)): ?>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/footer.php')?>
