<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/29/2015
 * Time: 1:35 PM
 */

//include_once("databaseController.php");

$listID = $_POST["listID"];
$finishedBeer = $_POST["beerID"];

listController::finishBeer($listID, $finishedBeer);

class listController {

    public static function finishBeer($listID, $finishedBeer){
        $con = mysqli_connect('localhost','root','','bbyDb');
        $sql = "UPDATE lists";
        $sql .= " SET finished_beers = concat(finished_beers,',".$finishedBeer."')";
        $sql .= " WHERE list_id = ".$listID;
        echo $sql;
        mysqli_query($con, $sql);

    }

}