<?php
class UserLogic
{
    public static function signUp(string $email, string $fullname, string $birthdate, 
        string $address, string $gender, string $interests, string $vk, string $bloodType, 
        string $Rh, string $password, string $passwordConfirm) : array
    {
        $errors = [];
        $errors = array_merge($errors, Validator::validateEmail($email));
        $errors = array_merge($errors, Validator::validatePassword($password, $passwordConfirm));
        $errors = array_merge($errors, Validator::validateVkUrl($vk));
        $errors = array_merge($errors, Validator::validateBirthDate($birthdate));

        if (!count($errors)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            UserTable::create($email, $fullname, $birthdate, 
            $address,  $gender,  $interests,  $vk,  $bloodType, 
             $Rh,  $passwordHash);        
        }

        return $errors;
    }

    public static function signIn(string $email, string $password): string
    {
        if (static::isAuthorized()) {
            return 'Вы уже авторизованы';
        }

        $user = UserTable::get_by_email($email);
        if (null == $user) {
            return 'Пользователь с таким email не зарегистрирован';
        }

        $id = UserTable::get_by_email($email)['id'];
        $attempts = UserAttempts::get_by_id($id);

        if (count($attempts) == 3) {
            return 'Превышено количество попыток входа, попробуйте через час';
        }

        if (!password_verify($password, $user['password'])) {
            UserAttempts::create($id, date('Y-m-d H:i:s'));
            $attempts = UserAttempts::get_by_id($id);
            return 'Неверный пароль, осталось попыток: ' . (3 - count($attempts));
        }



        $_SESSION['USER_ID'] = $user['id'];
        
        return '';
    }

    public static function signOut()
    {
        unset($_SESSION['USER_ID']);
    }

    public static function isAuthorized(): bool
    {       
        return !empty($_SESSION['USER_ID']) && intval($_SESSION['USER_ID']) > 0;
    }

    public static function current(): array
    {

        if (!self::isAuthorized()) {
            
            return [];
        }
        
        return UserTable::get_by_id($_SESSION['USER_ID']);
    }
}