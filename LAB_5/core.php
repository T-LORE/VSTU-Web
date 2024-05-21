<?php

date_default_timezone_set('Europe/Moscow');

// Подключение к БД
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_3/dbconnection.php');

// Старт сессии
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_3/user/sessions.php');

// Регистрация пользователя
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_3/user/user_logic.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_3/user/user_table.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_3/user/user_action.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_3/user/user_attempts.php');

// Валидация данных
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_3/user/validator.php');
