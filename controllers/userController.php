<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/21/2015
 * Time: 7:51 AM
 */

require_once('databaseController.php');

if(!empty($_POST['username'])){
    userController::userLogin($_POST['username'], $_POST['password']);
}

class userController {

    public static function userLogin($username, $passwordhash){
        $conn = databaseController::connectToDatabase();
        $pw = md5($passwordhash);
        $sql = "SELECT * from `users` where name = '".$username."' and password='".$pw."'";
        $userCheck = mysqli_query($conn,$sql);
        if($userCheck->num_rows == 1){
            return true;
        }else{
            return false;
        }
    }

}