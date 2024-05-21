<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php');
$userLoggedIn = isset($_SESSION['USER_ID']);
$userdata = UserLogic::current();
$userEmail = count($userdata) > 0? $userdata['email'] : '';
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
<div class="container-xxl px-4">   
    <!-- Header -->
        <!-- First header -->  
        <div class="row border-bottom">  
            <!--  Left block -->
            <div class="col-6 d-flex align-items-center my-2 ">
                <a href="index.php" class="fw-bold mx-2 text-decoration-none text-dark fs-5">Главная</a>
                <div class="d-flex align-items-center"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                        </svg>
                    <div class="fw-bold mx-2">8 (962) 759-99-77</div>
                </div>
                <div class="mx-2 "> 
                    <div class="link-primary small-font">Заказать звонок</div>
                </div>
            </div>
                  
            
            <!--  Right block -->
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <div class="d-flex mx-2 align-items-center">
                    <div class="d-flex mx-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" class="mx-2">
                            <path class="loccls-1"
                                d="M14,17H2a2,2,0,0,1-2-2V8A2,2,0,0,1,2,6H3V4A4,4,0,0,1,7,0H9a4,4,0,0,1,4,4V6h1a2,2,0,0,1,2,2v7A2,2,0,0,1,14,17ZM11,4A2,2,0,0,0,9,2H7A2,2,0,0,0,5,4V6h6V4Zm3,4H2v7H14V8ZM8,9a1,1,0,0,1,1,1v2a1,1,0,0,1-2,0V10A1,1,0,0,1,8,9Z">
                            </path>
                        </svg>
                        
                        <?php
                            if ($userLoggedIn) {
                                echo '<div class="d-flex mx-2 align-items-center">';
                                echo '<div class="mx-2">' . htmlspecialchars($userEmail) . '</div>';
                                echo '<a href="signout.php" class="btn btn-primary mx-2">Выйти</a>';
                                echo '</div>';
                            } else {
                                echo '<a href="login.php" class="btn btn-primary mx-2">Войти</a>';
                                echo '<a href="register.php" class="btn btn-primary mx-2">Зарегистрироваться</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="d-flex mx-2 align-items-center">
                    <div class="d-flex mx-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sliders2-vertical ms-2 me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M0 10.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1H3V1.5a.5.5 0 0 0-1 0V10H.5a.5.5 0 0 0-.5.5M2.5 12a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2a.5.5 0 0 0-.5-.5m3-6.5A.5.5 0 0 0 6 6h1.5v8.5a.5.5 0 0 0 1 0V6H10a.5.5 0 0 0 0-1H6a.5.5 0 0 0-.5.5M8 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2A.5.5 0 0 0 8 1m3 9.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1H14V1.5a.5.5 0 0 0-1 0V10h-1.5a.5.5 0 0 0-.5.5m2.5 1.5a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 1 0v-2a.5.5 0 0 0-.5-.5" />
                        </svg>
                        <div class="circle text-light">0</div>
                    </div>
    
                    <div class="d-flex mx-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart ms-2 me-1" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                          </svg>
                        <div class="circle text-light">0</div>
                    </div>
    
                    <div class="d-flex mx-2 align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4 ms-2" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                          </svg>
                        <div class="mx-1 small-font">Корзина</div>
                        <div class="circle me-2 text-light">0</div>
                    </div>
                </div> 
                <div class="d-flex justify-content-left align-items-center">
                    <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search ms-2 me-1" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                          </svg>
                    <div class="flex-fill small-font">Поиск</div>
                </div>
            </div>
        </div>
