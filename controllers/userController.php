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

if($_POST['logout'] == "logout"){
    session_start();
    $_SESSION = array();
    session_destroy();
}

class userController {

    public static function userLogin($username, $passwordhash){
        $conn = databaseController::connectToDatabase();
        $pw = md5($passwordhash);
        $sql = "SELECT * from `users` where name = '".$username."' and password='".$pw."'";
        $userCheck = mysqli_query($conn,$sql);

        if($userCheck->num_rows == 1){
            session_start();

            $sql = "SELECT * from `users` where name = '".$username."' and password='".$pw."'";
            $result = mysqli_query($conn,$sql);
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $_SESSION['logged_in']= "logged_in";
            $_SESSION['userID']= $data;

            return true;
        }else{
            return false;
        }

    }

}