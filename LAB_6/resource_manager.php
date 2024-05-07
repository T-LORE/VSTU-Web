<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/LAB_6/core.php';
class ResourceManager
{
    public static function getImage($path)
    {
        header('Content-Type: image/jpeg');
        

        if (!Userlogic::isAuthorized()) {
            
            return readfile($_SERVER['DOCUMENT_ROOT'] . '/LAB_6/Assets/placeholder.jpg');
        }

        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/LAB_6/Assets//' . $path;
        
        header('Content-Length: ' . filesize($imagePath));
        readfile($imagePath);
        return true;
    }
}

if (isset($_GET['image'])) {
    ResourceManager::getImage($_GET['image']);
}
