<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/18/2015
 * Time: 4:11 PM
 */

require("databaseController.php");
$createPackage = $_POST;
createListController::createList($createPackage);

class createListController {

    public static function createList($createdPackage){
        session_start();
        $connect = databaseController::connectToDatabase();
        $listName = $createdPackage["beerListName"];
        $listDescription = $createdPackage["listDescription"];
        //TODO: GET USER ID AND ATTACH IT
        $listOwner = $_SESSION['userID'][0][0];
        $beerIDs = $createdPackage["beerListHidden"];
        $sqlStatement = "INSERT INTO `bbydb`.`lists` (`list_id`, `list_owner_id`, `list_name`, `list_beers`, `list_description`, `finished_beers`) VALUES ('','".$listOwner."','".$listName."','".$beerIDs."','".$listDescription."', '')";
        mysqli_query($connect,$sqlStatement);
    }

}
