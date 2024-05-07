<?php
class ContentAction
{
    public static function delete()
    {
        if (isset($_POST['content_id'])) {
            ContentLogic::delete($_POST['content_id']);
        }
        
    }

    public static function edit()
    {
       
    }

    public static function add()
    {
       
    }
}