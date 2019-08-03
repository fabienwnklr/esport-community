<?php
class Validate
{

    public $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/';

    public function email(string $email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) :
            return true;
        else :
            return false;
        endif;
    }

    public function validatePassword($password): bool
    {
        if (preg_match($this->regex, $password)) :
            return true;
        else :
            return false;
        endif;
    }
}
