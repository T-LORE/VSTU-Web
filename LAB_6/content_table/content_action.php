<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php');
class ContentAction
{
    public static function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['is_delete']))
        {
            if (isset($_POST['content_id'])) {
                ContentLogic::delete($_POST['content_id']);
            }
        } 
    }

    public static function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['is_edit']))
        {
            $content = new Content();
            $content->id = $_POST['content_id'];
            $content->name = $_POST['name'];
            $content->id_hall = $_POST['id_hall'];
            $content->cost = $_POST['cost'];
            $content->description = $_POST['description'];
            $content->image = $_FILES['image'];
            $errors = ContentLogic::edit($content);
            return $errors;
        }
       
    }

    public static function add(): array
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['is_add']))
        {
            $content = new Content();
            $content->name = $_POST['name'];
            $content->id_hall = $_POST['id_hall'];
            $content->cost = $_POST['cost'];
            $content->description = $_POST['description'];
            $content->image = $_FILES['image'];
            $errors = ContentLogic::add($content);
                

            return $errors;
        }

        return [];
    }


}