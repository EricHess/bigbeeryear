<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/11/2015
 * Time: 7:54 AM
 */

require('createController.php');

//TODO: call createNew with sanitized "$creationType" from the $_POST
if($_POST){
    $createType = $_POST['createType'];
    databaseController::createNew($createType, $_POST);
}

class databaseController {

    //TODO: Determine schemas for desired dBs
    //TODO: Create user profiles and paths

    public static function connectToDatabase(){
        $sql = mysqli_connect('localhost','root','','bbyDb');
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
                createController::listCreate($creationPackage);
                break;
        };
    }

}