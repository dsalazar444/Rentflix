<?php

// Made by: Samuel Martínez Arteaga

namespace App\Utils;

use App\Models\User;
use Exception;

class UserDataUtils
{
    static public function bringSessionUser(): User | Null
    {
        try {
            return User::find(session('user_id'));
        } catch (Exception $error) {
            return null;
        }
    }
}
