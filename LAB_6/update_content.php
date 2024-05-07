<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');
ContentAction::edit();
header("location: index.php");