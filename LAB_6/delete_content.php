<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

ContentAction::delete();
header("location: services.php");