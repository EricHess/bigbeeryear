<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/3/2015
 * Time: 9:39 PM
 */




class urlController {

    public static function returnURLParameters(){
        $urlParams =  explode('/',$_SERVER['REDIRECT_URL']);
        return $urlParams;
    }

    public static function urlParametersCount(){
        return count(urlController::returnURLParameters());
    }




}