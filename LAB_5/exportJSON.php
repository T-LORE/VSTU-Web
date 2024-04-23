<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_5/core.php');
    if (isset($_GET['download'])) {
        $connection = Database::connection();
        $halls = [];
        $sql = "SELECT * FROM services";
        $result = $connection->query($sql);
        $halls = $result->fetchAll();
        
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="data.json"');
        echo json_encode($halls);
    }