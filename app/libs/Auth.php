<?php

namespace App\Libs;

class Auth
{

    public static function user()
    {
        return Session::get("auth_user");
    }

    public static function save_auth($user)
    {
        Session::set("auth_user", $user);
    }

    public static function destroy_auth()
    {
        Session::clear("auth_user");
    }

    public static function exist()
    {
        return Session::get("auth_user");
    }
}