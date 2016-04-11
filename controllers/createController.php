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
        $fname = $createPackage['fname'];
        $lname = $createPackage['lname'];
        $password = md5($createPackage['password']);
        $sqlStatement = "INSERT INTO `ehess84_bbydb`.`users` (`uid`, `name`, `email`, `password`, `fname`, `lname`) VALUES ('','".$username."','".$email."','".$password."','".$fname."','".$lname."')";
        mysqli_query($connect,$sqlStatement);
    }

    public static function beerCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $beerName = $createPackage['beer_name'];
        $beerAbv = $createPackage['beer_abv'];
        $beerBreweryId = $createPackage['beer_brewery_id'];
        $beerDescription = $createPackage['beer_description'];
        $beerScore = $createPackage['beer_score'];
        $sqlStatement = "INSERT INTO `ehess84_bbydb`.`beers` (`beer_id`, `beer_name`, `beer_abv`, `beer_brewery_id`, `beer_description`, `beer_score`) VALUES ('','".$beerName."','".$beerAbv."','".$beerBreweryId."','".$beerDescription."','".$beerScore."')";
        echo $sqlStatement;
        mysqli_query($connect,$sqlStatement);
    }

    //TODO: Create lat / long from address
    public static function breweryCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $breweryName = $createPackage['brewery_name'];
        $breweryAddress = $createPackage['brewery_address'];
        $breweryCity = $createPackage['brewery_city'];
        $breweryState = $createPackage['brewery_state'];
        $breweryZip = $createPackage['brewery_zip'];
        $breweryLat ='';
        $breweryLong='';
        $breweryDescription = $createPackage['brewery_description'];
        $sqlStatement = "INSERT INTO `ehess84_bbydb`.`breweries` (`brewery_id`, `brewery_name`, `brewery_address`, `brewery_city`, `brewery_state`, `brewery_zip`, `brewery_lat`, `brewery_long`, `brewery_description`) VALUES ('','".$breweryName."','".$breweryAddress."','".$breweryCity."','".$breweryState."', '".$breweryZip."','".$breweryLat."','".$breweryLong."','".$breweryDescription."')";
        mysqli_query($connect,$sqlStatement);

    }

}