<?php
class ContentLogic
{
    public static function delete($service_id)
    {
        $service = ContentTable::get_by_id($service_id);
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/LAB_6/Assets//" . $service['image_path'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/LAB_6/Assets//" . $service['image_path']);
        }
        
        ContentTable::delete($service_id);
    }

    public static function edit()
    {
       
    }

    public static function add()
    {
       
    }
}