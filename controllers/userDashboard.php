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

    public static function parseBeerNamesFromIDs($id){
        $con = databaseController::connectToDatabase();
        //TODO: Need to associate list_owner_id to userID -- should be simple now.
        $sql = "SELECT * from `beers` where beer_id = '".$id."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

    public static function parseBreweryNamesFromIDs($id){
        $con = databaseController::connectToDatabase();
        //TODO: Need to associate list_owner_id to userID -- should be simple now.
        $sql = "SELECT beer_brewery_id from `beers` where beer_id = '".$id."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);

        $sql = "SELECT brewery_name from `breweries` where brewery_id = '".$result[0][0]."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);

        return $result;
    }

    public static function parseBeerScoresFromIDs($id){
        $con = databaseController::connectToDatabase();
        $sql = "SELECT beer_score from `beers` where beer_id = '".$id."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

    public static function getTotalBeerScore($addArray){
        return array_sum(explode(",",$addArray));
    }

}