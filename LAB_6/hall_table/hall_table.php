<?php
class HallTable
{
    public static function create()
    {
        //TODO
        
    }

    public static function get_by_id(int $hall_id): array
    {
        $query = Database::prepare("SELECT * FROM halls WHERE id = :hall_id LIMIT 1");
        $query->bindValue(":service_id", $hall_id);
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
}