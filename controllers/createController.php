<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/11/2015
 * Time: 10:45 PM
 */


class createController {

    public static function userCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $username = $createPackage['username'];
        $email = $createPackage['email'];
        $password = $createPackage['password'];
        $sqlStatement = "INSERT INTO `bbydb`.`users` (`uid`, `name`, `email`, `password`) VALUES ('','".$username."','".$email."','".$password."')";
        mysqli_query($connect,$sqlStatement);
    }

    public static function beerCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $username = $createPackage['username'];
        $email = $createPackage['email'];
        $password = $createPackage['password'];
        $sqlStatement = "INSERT INTO `bbydb`.`beers` (`beer_id`, `beer_name`, `beer_abv`, `beer_brewery_id`, `beer_brewery_id`, `beer_description`, `beer_score`) VALUES ('','".$username."','".$email."','".$password."', '','".$username."','".$email."')";
        mysqli_query($connect,$sqlStatement);
    }

    public static function breweryCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $username = $createPackage['username'];
        $email = $createPackage['email'];
        $password = $createPackage['password'];
        $sqlStatement = "INSERT INTO `bbydb`.`breweries` (`brewery_id`, `brewery_name`, `brewery_address`, `brewery_city`, `brewery_state`, `brewery_zip`, `brewery_lat`, `brewery_long`, `brewery_description`) VALUES ('','".$username."','".$email."','".$password."', '','".$username."','".$email."','".$email."','".$email."')";
        mysqli_query($connect,$sqlStatement);

    }

    public static function listCreate($createPackage){
        //not sure yet.. catalog_it integration?
    }

}