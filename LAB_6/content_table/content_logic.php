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

    public static function add($content): array
    {
       $errors = self::validate($content);
         if (empty($errors)) {
                $content->image_path = self::save_image($content->image);
                ContentTable::add($content);
            }
        return $errors; 
    }

    private static function validate($content): array
    {
        $errors = [];
        if (empty($content->name)) {
            $errors[] = "Поле 'Название' не может быть пустым";
        }

        if (empty($content->id_hall)) {
            $errors[] = "Поле 'Номер зала' не может быть пустым";
        }

        if (empty($content->cost)) {
            $errors[] = "Поле 'Стоимость' не может быть пустым";
        }

        if (empty($content->description)) {
            $errors[] = "Поле 'Описание' не может быть пустым";
        }

        if ($content->image['error'] !== 0) {
            $errors[] = "Ошибка загрузки изображения";
        }

        return $errors;
    }

    private static function save_image($image): string
    {
        $base_path = $_SERVER['DOCUMENT_ROOT'] . "/LAB_6/Assets/";
        $image_path = "images/" . uniqid() . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $base_path . $image_path);
        return $image_path;
    }
}