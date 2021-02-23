<?php

class AdvertisementRepository
{
    function getAdvertisements()
    {

        // include database and object files
        include_once './config/Database.php';
        include_once './objects/AdvertisementEntity.php';

        // instantiate database and advertisement object
        $database = new Database();
        $db = $database->getConnection();

        // initialize object
        $advertisement = new AdvertisementEntity($db);

        // query advertisements
        $stmt = $advertisement->read();
        $num = $stmt->rowCount();

        // advertisements array
        $advertisements_arr = array();
        $advertisements_arr["advertisements"] = array();

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

                $advertisement_item = array(
                    "id" => $id,
                    "user_id" => $user_id,
                    "title" => $title,
                );

                array_push($advertisements_arr["advertisements"], $advertisement_item);
            }
        } else {
            // tell the advertisement no uses found
            print_r("No advertisements found.");
        }

        return $advertisements_arr;
    }

}