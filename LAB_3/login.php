<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/core.php');

if(!empty($_SESSION['USER_ID'])){
    header("location: index.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $error = UserAction::signIn();

    if (empty($error))
    {
        header("Location: index.php");
    }
}
?>


<!-- main container -->
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/header.php')?>
<div class="container-xxl px-4">   
    <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/loginform.php')?>
</div>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/footer.php')?>
