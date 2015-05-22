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

?>

<html>
    <head>
    <script src="./scripts/jquery.js"></script>
    <script src="./scripts/creationCalls.js"></script>
    <script src="./scripts/loginCalls.js"></script>
    </head>

    <body>

    <header>
        User Create:<br />
        <form name="userCreate" id="createUser">
            <input type="hidden" name="createType" value="user" />
            <input type="text" name="username" />
            <input type="text" name="email" />
            <input type="text" name="password" />
            <button type="submit">Click</button>
        </form>

        Login:<br />
        <form name="userLogin" id="userLogin">
            <input type="text" name="username" />
            <input type="text" name="password" />
            <button type="submit">Login</button>
        </form>

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