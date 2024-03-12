<?php
require_once 'dbconnection.php';

$ip = "localhost";
$username = "root";
$password = "";
$dbname = "hairdressing_salon";

$db = new Database($ip, $username, $password, $dbname );
$connection = $db->getConnection();

$sql = "SELECT services.*, halls.hall_number 
        FROM services 
        INNER JOIN halls ON services.id_hall = halls.id";
        
$result = $connection->query($sql);

$services = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
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
            <td><?= $service["id"] ?></td>
            <td><img src="<?= $service["image_path"] ?>" alt="Service Image" style="max-width: 200px;"></td>
            <td><?= $service["name"] ?></td>
            <td><?= $service["hall_number"] ?></td> <!-- Используем hall_number из halls -->
            <td><?= $service["description"] ?></td>
            <td><?= $service["cost"] ?> руб.</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
