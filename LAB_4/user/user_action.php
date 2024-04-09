<?php
class UserAction
{
    public static function signUp() : array
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return [];
        }

        if (isset($_POST['action']) && 'signup' != $_POST['action']) {
            return [];
        }

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;
        $address = isset($_POST['address']) ? $_POST['address'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $interests = isset($_POST['interests']) ? $_POST['interests'] : null;
        $vk = isset($_POST['vk']) ? $_POST['vk'] : null;
        $bloodType = isset($_POST['bloodType']) ? $_POST['bloodType'] : null;
        $Rh = isset($_POST['Rh']) ? $_POST['Rh'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $passwordConfirm = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : null;
       
        $errors = UserLogic::signUp($email, $fullname, $birthdate, $address, $gender, $interests, $vk, $bloodType, $Rh, $password, $passwordConfirm);
        
        if (!count($errors)) {
            header('Location: ' . $_SERVER['PHP_SELF'] . '?success=y');
            exit;
        }

        return $errors;
    }

    public static function signIn(): string
    {
        if ('POST' != $_SERVER['REQUEST_METHOD']) {
            return '';
        }
        
        if (isset($_POST['action']) && 'signin' != $_POST['action']) {
            return '';
        }
        
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $errors = UserLogic::signIn($email, $password);

        return $errors;
    }

    public static function signOut()
    {
        UserLogic::signOut();
    }
}