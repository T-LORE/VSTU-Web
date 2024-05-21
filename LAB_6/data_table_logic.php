<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

if(empty($_SESSION['USER_ID'])){
    header("location: login.php");
    exit;
}

$connection = Database::connection();

$halls = [];
$sql = "SELECT * FROM halls";
$result = $connection->query($sql);
$halls = $result->fetchAll();

$sql = "SELECT services.*, halls.hall_number 
        FROM services 
        INNER JOIN halls ON services.id_hall = halls.id";

$name = '';
$costFrom = '';
$idHall = '';
$costTo = '';
$description = '';

$conditions = [];
$binds = [];

if (count($_GET) > 0) {

    if (!empty($_GET['name'])) {
        $conditions[] = "name LIKE :name";
        $binds['name'] = "%" . $_GET['name'] . "%";
        $name = $_GET['name'];
    }
    if ($_GET['id_hall']) {
        $conditions[] = "id_hall = :id_hall";
        $binds['id_hall'] = $_GET['id_hall'];
        $idHall = $_GET['id_hall'];
    }
    if ($_GET['cost_from']) {
        $conditions[] = "cost >= :cost_from";
        $binds['cost_from'] = $_GET['cost_from'];
        $costFrom = $_GET['cost_from'];
    }
    if ($_GET['cost_to']) {
        $conditions[] = "cost <= :cost_to";
        $binds['cost_to'] = $_GET['cost_to'];
        $costTo = $_GET['cost_to'];
    }
    if ($_GET['description']) {
        $conditions[] = "description LIKE :description";
        $binds['description'] = "%" . $_GET['description'] . "%";
        $description = $_GET["description"];
    }

    if (!empty($conditions)) {
      $sql .= " WHERE " . implode(" AND ", $conditions); 
    }
}

$result = $connection->prepare($sql);
$result->execute($binds);   
$services = $result->fetchAll();