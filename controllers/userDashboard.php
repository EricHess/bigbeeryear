<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 4:16 PM
 */

require_once('databaseController.php');

class userDashboard {

    public static function getUserFirstAndLastName(){
        $con = databaseController::connectToDatabase();
        $sql = "SELECT * from `users` where uid = '".$_SESSION["userID"][0][0]."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

    public static function getUserLists(){
        $con = databaseController::connectToDatabase();
        //TODO: Need to associate list_owner_id to userID -- should be simple now.
        $sql = "SELECT * from `lists` where list_owner_id = '".$_SESSION["userID"][0][0]."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

}