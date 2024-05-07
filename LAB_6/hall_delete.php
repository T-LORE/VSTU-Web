<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

HallAction::delete();
header("location: hall_table_view.php");
// foreign key error
