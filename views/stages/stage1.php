<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/4/2015
 * Time: 8:39 PM
 */

if(empty($_POST['beerSize'])){
echo 'nuh uh, no post here!';
}else{
echo $_POST['beerSize'];
}
