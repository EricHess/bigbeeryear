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
        $connect = databaseController::connectToDatabase();
        $listName = $createdPackage["beerListName"];
        //TODO: GET USER ID AND ATTACH IT
        $listOwner = $createdPackage["beerListName"];
        $beerIDs = $createdPackage["beerListHidden"];
        $sqlStatement = "INSERT INTO `bbydb`.`lists` (`list_id`, `list_owner_id`, `list_name`, `list_beers`) VALUES ('','".$listOwner."','".$listName."','".$beerIDs."')";
        mysqli_query($connect,$sqlStatement);
    }

}
