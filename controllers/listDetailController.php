<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 7/1/2015
 * Time: 4:19 PM
 */

class listDetailController {

    public static function getSpecificList($listID){
        $con = databaseController::connectToDatabase();
        //TODO: Need to associate list_owner_id to userID -- should be simple now.
        $sql = "SELECT * from `lists` where list_owner_id = '".$_SESSION["userID"][0][0]."' and list_id = '".$listID."'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

}