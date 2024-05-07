<?php
class HallTable
{
    public static function add($hall)
    {
        $query = Database::prepare("INSERT INTO halls (hall_number) VALUES (:hall_number)");
        $query->bindValue(":hall_number", $hall->hall_number);
        $query->execute();
        
    }

    public static function get_by_id(int $hall_id): array
    {
        $query = Database::prepare("SELECT * FROM halls WHERE id = :hall_id LIMIT 1");
        $query->bindValue(":hall_id", $hall_id);
        $query->execute();

        $halls = $query->fetchAll();
        if (!count($halls)) {
            return [];
        }

        return $halls[0];
    }

    public static function get_all(): array
    {
        $query = Database::prepare("SELECT * FROM halls");
        $query->execute();

        return $query->fetchAll();
        
    }

    public static function delete (int $hall_id)
    {
        $query = Database::prepare("DELETE FROM halls WHERE id = :hall_id");
        $query->bindValue(":hall_id", $hall_id);
        $query->execute();
    }

    public static function edit($hall)
    {
        $query = Database::prepare("UPDATE halls SET hall_number = :hall_number WHERE id = :id");
        $query->bindValue(":hall_number", $hall->hall_number);
        $query->bindValue(":id", $hall->id);
        $query->execute();
    }
}