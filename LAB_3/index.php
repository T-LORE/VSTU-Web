<?php
require_once 'logic.php';
?>
<!doctype html>
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
    <!-- main container -->
    <div class="container-xxl px-4">   
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/header.php')?>
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/registerform.php')?>
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/loginform.php')?>
        
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/table.php')?>
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/footer.php')?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>