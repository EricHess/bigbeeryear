<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 7/1/2015
 * Time: 4:19 PM
 */

class listDetailController extends userDashboard {

    public static function getSpecificList($listID){
        $con = databaseController::connectToDatabase();
        $sql = "SELECT * from `lists` where list_owner_id = '".$_SESSION["userID"]["uid"]."' and list_id = '".$listID."'";
        $result = mysqli_query($con,$sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public static function getFinishedList($listID){
        $con = databaseController::connectToDatabase();
        $sql = "SELECT finished_beers FROM lists where list_id= ".$listID;
        $result = mysqli_query($con,$sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

}