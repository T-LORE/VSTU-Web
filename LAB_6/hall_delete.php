<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

$error = HallAction::delete();

$header = "location: hall_table_view.php";
if (isset($error)) {
    $header = "location: hall_table_view.php?error=$error";
}
header($header);
