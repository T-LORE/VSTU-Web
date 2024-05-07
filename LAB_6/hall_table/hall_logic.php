<?php
class HallLogic
{
    public static function delete($hall_id)
    {
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
