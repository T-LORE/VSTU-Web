<?php

date_default_timezone_set('Europe/Moscow');

// Подключение к БД
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/dbconnection.php');

// Старт сессии
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/user/sessions.php');

// Регистрация пользователя
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/user/user_logic.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/user/user_table.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/user/user_action.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/user/user_attempts.php');

// Таблица услуг
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/content_table/content.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/content_table/content_action.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/content_table/content_logic.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/content_table/content_table.php');

// Таблица залов
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/hall_table/hall_action.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/hall_table/hall_logic.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/hall_table/hall_table.php');

// Валидация данных
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/user/validator.php');
