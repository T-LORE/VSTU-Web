<?php
class ContentTable
{
    public static function create()
    {
        //TODO
        
    }

    public static function get_by_id(int $service_id): array
    {
        $query = Database::prepare("SELECT * FROM services WHERE id = :service_id LIMIT 1");
        $query->bindValue(":service_id", $service_id);
        $query->execute();

        $users = $query->fetchAll();
        if (!count($users)) {
            return [];
        }

        return $users[0];
    }

    public static function get_all(): array
    {
        $sql = "SELECT services.*, halls.hall_number 
        FROM services 
        INNER JOIN halls ON services.id_hall = halls.id";

        $query = Database::prepare($sql);
        $query->execute();

        return $query->fetchAll();
        
    }

    public static function delete (int $service_id)
    {
        $query = Database::prepare("DELETE FROM services WHERE id = :service_id");
        $query->bindValue(":service_id", $service_id);
        $query->execute();
    }
}