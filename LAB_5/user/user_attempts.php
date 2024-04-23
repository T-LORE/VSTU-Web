<?php
class UserAttempts
{
    public static function create(string $user_id, string $datetime)
    {
        $query = Database::prepare(
            "INSERT INTO user_attempts (user_id, time)" .
            "VALUES (:user_id, :datetime)"
        );

        $query->bindValue(":user_id", $user_id);
        $query->bindValue(":datetime", $datetime);

        if (!$query->execute()) {
            throw new PDOException("При добавлении попытки возникла ошибка");
        }
    }

    public static function get_by_id(int $user_id): array
    {
        $query = Database::prepare("SELECT * FROM user_attempts WHERE user_id = :user_id AND time > DATE_SUB(NOW(), INTERVAL 1 HOUR)");
        $query->bindValue(":user_id", $user_id);
        $query->execute();

        $attempts = $query->fetchAll();
        if (!count($attempts)) {
            return [];
        }

        return $attempts;
    }
}