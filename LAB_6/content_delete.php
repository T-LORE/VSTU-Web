<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

ContentAction::delete();
header("location: content_table_view.php");