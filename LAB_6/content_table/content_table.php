<?php
class ContentTable
{
    public static function add($content)
    {
        $query = Database::prepare("INSERT INTO services (name, id_hall, cost, description, image_path) VALUES (:name, :id_hall, :cost, :description, :image_path)");
        $query->bindValue(":name", $content->name);
        $query->bindValue(":id_hall", $content->id_hall);
        $query->bindValue(":cost", $content->cost);
        $query->bindValue(":description", $content->description);
        $query->bindValue(":image_path", $content->image_path);
        $query->execute();
        
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
            LEFT JOIN halls ON services.id_hall = halls.id";

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

    public static function edit($content)
    {
        $query = Database::prepare("UPDATE services SET name = :name, id_hall = :id_hall, cost = :cost, description = :description, image_path = :image_path WHERE id = :id");
        $query->bindValue(":name", $content->name);
        $query->bindValue(":id_hall", $content->id_hall);
        $query->bindValue(":cost", $content->cost);
        $query->bindValue(":description", $content->description);
        $query->bindValue(":image_path", $content->image_path);
        $query->bindValue(":id", $content->id);
        $query->execute();
    }

    public static function get_all_with_hall($hall_id): array
    {
        $sql = "SELECT services.*, halls.hall_number 
            FROM services 
            LEFT JOIN halls ON services.id_hall = halls.id
            WHERE halls.id = :hall_id";

        $query = Database::prepare($sql);
        $query->bindValue(":hall_id", $hall_id);
        $query->execute();

        return $query->fetchAll();
    }
}