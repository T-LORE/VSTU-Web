<?php
class HallLogic
{
    public static function delete($hall_id)
    {
        $hall = HallTable::get_by_id($hall_id);
        if ($hall['is_allow_to_delete'] == 0) {
            return "Это поле запрещено удалять";
        }
        $contents_to_delete = ContentTable::get_all_with_hall($hall_id);
        foreach ($contents_to_delete as $content) {
            ContentLogic::delete($content['id']);
        }
        HallTable::delete($hall_id);
    }

    public static function edit($hall): array
    {
        $errors = self::validate($hall);
        if (empty($errors)) {
            HallTable::edit($hall);
        }
        return $errors;
    }

    public static function add($hall): array
    {
        $errors = self::validate($hall);
        if (empty($errors)) {
            HallTable::add($hall);
        }
        return $errors;
    }

    private static function validate($hall): array
    {
        $errors = [];
        if (empty($hall->hall_number)) {
            $errors[] = "Поле 'Номер зала' не может быть пустым";
        }

        return $errors;
    }
}
