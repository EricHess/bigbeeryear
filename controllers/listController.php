<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/29/2015
 * Time: 1:35 PM
 */


$listID = $_POST["listID"];
$finishedBeer = $_POST["beerID"];

if(isset($_POST["listID"]) && isset($_POST["beerID"])){
    listController::finishBeer($listID, $finishedBeer);
}else if($_POST["type"] == "complete" && isset($_POST["listId"])){
    listController::completeList($_POST["listId"]);
}

class listController {

    public static function finishBeer($listID, $finishedBeer){
        $con = mysqli_connect('localhost','ehess84_bbydb','135Eh183!','ehess84_bbydb');
        $sql = "UPDATE lists";
        $sql .= " SET finished_beers = concat(finished_beers,',".$finishedBeer."')";
        $sql .= " WHERE list_id = ".$listID;
        mysqli_query($con, $sql);

    }


    public static function completeList($listID){
        $con = mysqli_connect('localhost','ehess84_bbydb','135Eh183!','ehess84_bbydb');
        $sql = "UPDATE lists";
        $sql .= " SET list_complete = 1";
        $sql .= " WHERE list_id = ".$listID;
        mysqli_query($con, $sql);

    }

}