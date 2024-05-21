<?php
class Validator
{
    public static function validatePassword($password, $passwordConfirm) : array
    {
        $errors = [];

        // Требования к паролю: длиннее 6 символов, обязательно содержит большие латинские буквы, маленькие латинские буквы, спецсимволы (знаки препинания, арифметические действия и тп), пробел, дефис, подчеркивание и цифры. Русские буквы запрещены.
        if (strlen($password) < 6) {
            $errors[] = 'Пароль должен содержать не менее 6 символов';
        }

        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Пароль должен содержать хотя бы одну заглавную латинскую букву';
        }

        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'Пароль должен содержать хотя бы одну строчную латинскую букву';
        }

        if (!preg_match('/\d/', $password)) {
            $errors[] = 'Пароль должен содержать хотя бы одну цифру';
        }

        if (!preg_match('/[!@#$%^&*()`~+=]/', $password)) {
            $errors[] = 'Пароль должен содержать хотя бы один специальный символ (!@#$%^&~*()+`=)';
        }

        if (!preg_match('/\s/', $password)) {
            $errors[] = 'Пароль должен содержать хотя бы один пробел';
        }

        if (!preg_match('/-/', $password)) {
            $errors[] = 'Пароль должен содержать хотя бы один дефис';
        }

        if (!preg_match('/_/', $password)) {
            $errors[] = 'Пароль должен содержать хотя бы одно подчеркивание';
        }

        if (preg_match('/[а-яА-Я]/u', $password)) {
            $errors[] = 'Пароль не должен содержать русские буквы';
        }

        return $errors;
    }

    public static function validateEmail($email) : array
    {
        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Некорректный email';
        } else {
            if (count(UserTable::get_by_email($email)) != 0)
            {
                $errors[] = 'Пользователь с таким email зарегестрирован';
            }
        }

        return $errors;
    }

    public static function validateVkUrl($vk) : array
    {
        $errors = [];

        if (!filter_var($vk, FILTER_VALIDATE_URL)) {
            $errors[] = 'Некорректная ссылка ВК';
        }

        return $errors;
    }
   
    public static function validateBirthDate($birthdate) : array
    {
        $errors = [];

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
            $errors[] = 'Некорректная дата рождения';
        } else {
            $currentDate = date('Y-m-d');
            if ($birthdate > $currentDate) {
                $errors[] = 'Дата рождения не может быть в будущем';
            }
    
            $minDate = date('Y-m-d', strtotime('-125 years'));
            if ($birthdate < $minDate) {
                $errors[] = 'Дата рождения должна быть не более 125 лет назад';
            }
        }

        return $errors;
    }
}