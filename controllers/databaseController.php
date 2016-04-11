<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/11/2015
 * Time: 7:54 AM
 */

require('createController.php');

if(!empty($_POST['createType'])){
    $createType = $_POST['createType'];
    databaseController::createNew($createType, $_POST);
}

class databaseController {

    public static function connectToDatabase(){
        $sql = mysqli_connect('localhost','ehess84_bbydb','135Eh183!','ehess84_bbydb');
        return $sql;
    }

    /*
     *
     * Users will have
     * user table: account info (name, pw etc..) EDITABLE INFO
     * list table: their list EDITABLE INFO
     *
     * Global will have
     * Breweries table: updatable from user accounts (name, description, location)
     * Beers table: paired with brewery information
     *
     * */

    public static function createNew($creationType, $creationPackage){
        switch($creationType){
            case('user'):
                createController::userCreate($creationPackage);
                break;
            case('beer'):
                createController::beerCreate($creationPackage);
                break;
            case('brewery'):
                createController::breweryCreate($creationPackage);
                break;
            case('list'):
//                listController::listCreate($creationPackage);
                break;
        };
    }

    public static function getBeerList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_bbydb.beers";
        $query = mysqli_query($connect, $sql);
        $result = mysqli_fetch_all($query);
        return $result;
    }

    public static function getBreweryList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_bbydb.breweries";
        $query = mysqli_query($connect, $sql);
        $result = mysqli_fetch_all($query);
        return $result;
    }
}