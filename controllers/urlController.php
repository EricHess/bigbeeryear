<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/3/2015
 * Time: 9:39 PM
 */




class urlController {

    public static function returnURLParameters(){
        $urlParams = '';
        if(!empty($_SERVER['REQUEST_URI'])) {
            if ($_SERVER['REQUEST_URI'] == '/bigbeeryear/index.php' || $_SERVER['REQUEST_URI'] == '/'  ) {
                $urlParams = '';
            } else {
                $urlParams = explode('?', $_SERVER['REQUEST_URI']);
                $urlParams = explode('/', $urlParams[0]);
            }
        }
        return $urlParams;
    }

    public static function urlParametersCount(){
        return count(urlController::returnURLParameters());
    }




}