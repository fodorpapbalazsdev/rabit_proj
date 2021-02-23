<?php

require_once("./repositories/UserRepository.php");

class UsersController extends BaseController
{
    public static function showEntityList()
    {
        $users = UserRepository::getUsers();
        echo "<ul style=\"list-style-type:none;\">";
        foreach ($users['users'] as $user) {
            echo "<li style='; margin: 10px'>" . $user['name'] . "</li>";
        }
        echo "</ul>";
    }
}