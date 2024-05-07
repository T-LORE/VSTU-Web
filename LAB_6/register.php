<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php');

if(!empty($_SESSION['USER_ID'])){
    header("location: index.php");
    exit;
}

$errors = UserAction::signUp();

$email = isset($_POST['email']) ? $_POST['email'] : null;
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : null;
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;
$interests = isset($_POST['interests']) ? $_POST['interests'] : null;
$vk = isset($_POST['vk']) ? $_POST['vk'] : null;
$bloodType = isset($_POST['bloodType']) ? $_POST['bloodType'] : null;
$Rh = isset($_POST['Rh']) ? $_POST['Rh'] : null;

?>
  
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/header.php')?>  
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success my-5" role="alert">
                Регистрация прошла успешно
            </div>
        <?php else: ?>
            <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/registerform.php')?>
        <?php endif; ?>
    </div>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/components/footer.php')?>