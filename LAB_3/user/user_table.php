<?php
class UserTable
{
    public static function create(string $email, string $fullname, string $birthdate, 
    string $address, string $gender, string $interests, string $vk, string $bloodType, 
    string $Rh, string $password)
    {
        $query = Database::prepare(
            "INSERT INTO users (email, fio, birthdate, address, gender, interests, vk, blood_type, Rh, password)" .
            "VALUES (:email, :fullname, :birthdate, :address, :gender, :interests, :vk, :blood_type, :Rh, :password)"
        );
        $query->bindValue(":email", $email);
        $query->bindValue(":fullname", $fullname);
        $query->bindValue(":birthdate", $birthdate);
        $query->bindValue(":address", $address);
        $query->bindValue(":gender", $gender);
        $query->bindValue(":interests", $interests);
        $query->bindValue(":vk", $vk);
        $query->bindValue(":blood_type", $bloodType);
        $query->bindValue(":Rh", $Rh);
        $query->bindValue(":password", $password);

        if (!$query->execute()) {
            throw new PDOException("При добавлении пользователя возникла ошибка");
        }
    }

    public static function get_by_email(string $email): array
    {
        $query = Database::prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $query->bindValue(":email", $email);
        $query->execute();

        $users = $query->fetchAll();

        if (!count($users)) {
            return [];
        }

        return $users[0];
    }

    public static function get_by_id(int $user_id): array
    {
        $query = Database::prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1");
        $query->bindValue(":user_id", $user_id);
        $query->execute();

        $users = $query->fetchAll();
        if (!count($users)) {
            return [];
        }

        return $users[0];
    }
}