<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/3/2015
 * Time: 9:35 PM
 */

require('./controllers/urlController.php');
require('./controllers/pageController.php');
require('./controllers/databaseController.php');

session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/bigbeeryear/styles/base.css"/>

        <script src="/bigbeeryear/scripts/jquery.js"></script>
        <script src="/bigbeeryear/scripts/creationCalls.js"></script>
        <script src="/bigbeeryear/scripts/loginCalls.js"></script>
        <script src="/bigbeeryear/scripts/listCalls.js"></script>
    </head>

    <body>
<?php
    if(isset($_SESSION["logged_in"])){
        $userID = $_SESSION["userID"][0][0];
    };
?>
    <header>
<?php  if(!isset($_SESSION["logged_in"])){ ?>
        Login:<br />
        <form name="userLogin" id="userLogin">
            <input type="text" name="username" />
            <input type="text" name="password" />
            <button type="submit">Login</button>
        </form>
    <a href="/bigbeeryear/user/create">Create An Account</a>
<?php } else{ ?>

        <form id="logout" name="logout">
            <input type="hidden" name="logout" value="logout" />
            <input type="submit" name='logout' class="logout" value="Logout"/>
        </form>
<?php } ?>

    </header>

        <?php
            //Include the necessary page from the path
            if(pageController::createPath() === false){
                http_response_code(404);
                include './views/404.php';
            }else{
                include pageController::createPath().'';
            }
        ?>


    </body>

</html>