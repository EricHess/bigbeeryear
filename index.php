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
        <link rel="stylesheet" href="/styles/base.css"/>

        <script src="/scripts/jquery.js"></script>
        <script src="/scripts/creationCalls.js"></script>
        <script src="/scripts/loginCalls.js"></script>
        <script src="/scripts/listCalls.js"></script>
    </head>

    <body>
<?php
    if(isset($_SESSION["logged_in"])){
        $userID = $_SESSION["userID"][0][0];
    };
?>
    <header>
<?php  if(!isset($_SESSION["logged_in"])){ ?>

        <form name="userLogin" id="userLogin">
            <input type="text" name="username" />
            <input type="text" name="password" />
            <button type="submit">Login</button>
        </form>

<?php } ?>

    </header>

    <header class="mainHeader">
        <h1>Big Beer Year</h1>
        <nav class="mainMenu">
            <nav itemscope="nav_button"><a href="/">Home</a></nav>
            <nav itemscope="nav_button"><a href="/about-big-beer-year">About</a></nav>
            <nav itemscope="nav_button"><a href="/faqs">FAQs</a></nav>
            <!-- TODO: If logged in.. Don't show create user link (Dashboard), Show logout instead of Login -->
            <?php  if(!isset($_SESSION["logged_in"])){ ?>
            <nav itemscope="nav_button" class="startBtn"><a class="startNow" href="/user/create">Start!</a></nav>
            <nav itemscope="nav_button" class="expandLgn"><a class="expandLogin" href="#">Login</a></nav>
            <?php } else{ ?>
                <nav itemscope="nav_button" class="startBtn"><a class="startNow" href="/user/dashboard">Lists</a></nav>
                <nav itemscope="nav_button" class="expandLgn"><a class="logmeout" href="#">Logout</a></nav>
            <?php }; ?>
        </nav>
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

<form class="hidden" id="logout" name="logout">
    <input type="hidden" name="logout" value="logout" />
    <input type="submit" name='logout' class="logout" value="Logout"/>
</form>
    </body>

</html>