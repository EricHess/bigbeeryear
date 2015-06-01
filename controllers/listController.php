<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/29/2015
 * Time: 1:35 PM
 */

if(!empty($_POST['createType'])){
    $createType = $_POST['createType'];
    listController::listCreate($_POST);
}

class listController {

    public static function listCreate($createPackage){
        print_r($createPackage);
    }

}