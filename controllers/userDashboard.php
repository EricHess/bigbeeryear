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
        $sql = "SELECT * from `lists` where list_owner_id = '".$_SESSION["userID"][0][0]."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

    public static function parseBeerNamesFromIDs($id){
        $con = databaseController::connectToDatabase();
        $sql = "SELECT * from `beers` where beer_id = '".$id."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

    public static function parseBreweryNamesFromIDs($id){
        $con = databaseController::connectToDatabase();
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
        $addArray = explode(",", $addArray);
        $parsedBeerScore = [];
        $parsedBeerScoreAdd = [];

        foreach ($addArray as $finishedBeer) {
            array_push($parsedBeerScore,userDashboard::parseBeerScoresFromIDs($finishedBeer));
        }

        foreach($parsedBeerScore as $scores){
            array_push($parsedBeerScoreAdd, $scores[0][0]);
        }

        return array_sum($parsedBeerScoreAdd);
    }

    public static function getCompletionPercentage($listID)
    {

        //TODO: Clean this up.. Maybe two separate calls? Can I use userDash::getTotalBeerScore ??

        $con = databaseController::connectToDatabase();
        $sql = "SELECT list_beers from lists where list_id = '" . $listID . "'";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result);
        $totalBeerLength = explode(",", $result[0][0]);
        $totalBeerScore=[];
        $totalBeerScoreAdd=[];

        foreach ($totalBeerLength as $finishedBeer) {
            array_push($totalBeerScore,userDashboard::parseBeerScoresFromIDs($finishedBeer));
        }

        foreach($totalBeerScore as $scores){
            if(isset($scores[0])){
                array_push($totalBeerScoreAdd, $scores[0][0]);
            }
        }


        $sql = "SELECT finished_beers from lists where list_id = '" . $listID . "'";
        $result = mysqli_query($con, $sql);
        $result = mysqli_fetch_all($result);
        $finishedBeerLength = explode(",", $result[0][0]);
        $finishedBeerScore = [];
        $finishedBeerScoreAdd = [];
        foreach ($finishedBeerLength as $finishedBeer) {
            array_push($finishedBeerScore,userDashboard::parseBeerScoresFromIDs($finishedBeer));
        }

        foreach($finishedBeerScore as $scores){
            if(isset($scores[0])){
                array_push($finishedBeerScoreAdd, $scores[0][0]);
            }
        }

        echo round((array_sum($finishedBeerScoreAdd)/array_sum($totalBeerScoreAdd))*100);
    }

}