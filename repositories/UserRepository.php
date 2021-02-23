<?php

class UserRepository
{
    function getUsers()
    {

        // include database and object files
        include_once './config/Database.php';
        include_once './objects/UserEntity.php';

        // instantiate database and user object
        $database = new Database();
        $db = $database->getConnection();

        // initialize object
        $user = new UserEntity($db);

        // query users
        $stmt = $user->read();
        $num = $stmt->rowCount();

        // users array
        $users_arr = array();
        $users_arr["users"] = array();

        // check if more than 0 record found
        if ($num > 0) {
            // retrieve our table contents
            // fetch() is faster than fetchAll()
            // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // extract row
                // this will make $row['name'] to
                // just $name only
                extract($row);

                $user_item = array(
                    "id" => $id,
                    "name" => $name,
                );

                array_push($users_arr["users"], $user_item);
            }
        } else {
            // tell the user no uses found
            print_r("No users found.");
        }

        return $users_arr;
    }
}