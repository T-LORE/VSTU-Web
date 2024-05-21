<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/core.php');
UserAction::signOut();
header("location: index.php");