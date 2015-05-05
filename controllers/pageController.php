<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/3/2015
 * Time: 9:49 PM
 */

require_once('urlController.php');

class pageController {

    public static function determinePage(){
        $desiredPage = null;

        if(urlController::urlParametersCount() > 1){
            $desiredPage = end(urlController::returnURLParameters());
        }else{
            $desiredPage = pageController::createPath();
        }

        return $desiredPage;
    }

    public static function createPath(){
        $directPath = './views/';

        for($i = 2; $i < urlController::urlParametersCount(); $i++ ){
            $directPath .= urlController::returnURLParameters()[$i];
            $directPath .= '/';
        }

        $directPath = rtrim($directPath, '/');
        return $directPath.'.php';
    }

}