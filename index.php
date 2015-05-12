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

    </head>

    <body>
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