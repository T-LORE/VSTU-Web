<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');

class HallAction
{
    public static function delete()
    {   if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['is_delete'])){
            if (isset($_POST['hall_id'])) {
                $error = HallLogic::delete($_POST['hall_id']);
                if (isset($error)) {
                    return $error;
                }
            }
        }
    }

    public static function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['is_edit']))
        {
            $hall = new Hall();
            $hall->id = $_POST['hall_id'];
            $hall->is_allow_to_delete = $_POST['is_allow_to_delete'];
            $hall->hall_number = $_POST['hall_number'];
            $errors = HallLogic::edit($hall);
            return $errors;
        }
    }

    public static function add(): array
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['is_add']))
        {
            $hall = new Hall();
            $hall->hall_number = $_POST['hall_number'];
            $hall->is_allow_to_delete = $_POST['is_allow_to_delete'];
            $errors = HallLogic::add($hall);
            return $errors;
        }

        return [];
    }
}
