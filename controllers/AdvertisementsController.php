<?php

require_once("./repositories/AdvertisementRepository.php");
require_once("./repositories/UserRepository.php");


class AdvertisementsController extends BaseController
{
    public static function showEntityList()
    {
        $advertisements = AdvertisementRepository::getAdvertisements();
        $users = UserRepository::getUsers();

        echo "<ul style=\"list-style-type:none;\">";
        foreach ($advertisements['advertisements'] as $adv) {

            $userName = 'Unknown';

            foreach ($users['users'] as $user) {
                if ($user['id'] === $adv['user_id']) {
                    $userName = $user['name'];
                }
            }

            echo "<li style='; margin: 10px'>" . $adv['title'] . " (" . $userName . ")</li>";
        }
        echo "</ul>";
    }

}