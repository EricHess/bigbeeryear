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

//TODO: Figure out login..
//TODO: Figure out sessions..
?>

<html>
    <head>
    <script src="/bigbeeryear/scripts/jquery.js"></script>
    <script src="/bigbeeryear/scripts/creationCalls.js"></script>
    <script src="/bigbeeryear/scripts/loginCalls.js"></script>
    <script src="/bigbeeryear/scripts/listCalls.js"></script>
    </head>

    <body>

    <header>
        <form id="logout" name="logout">
            <input type="hidden" name="logout" value="logout" />
            <button name='logout' value="logout" class="logout">Logout</button>
        </form>
        User Create:<br />
        <form name="userCreate" id="createUser">
            <input type="hidden" name="createType" value="user" />
            <input type="text" name="username" />
            <input type="text" name="email" />
            <input type="text" name="password" />
            <button type="submit">Click</button>
        </form>
        <br /><br /><br /><br /><br /><br /><br />
        Beer Create:<br />
        <form name="beerCreate" id="createBeer">
            <input type="hidden" name="createType" value="beer" />
            <label for="beer_name">Beer Name </label><input type="text" name="beer_name" />
            <label for="beer_name">Beer Abv </label><input type="text" name="beer_abv" />
            <select name="beer_brewery_id" class="breweriesSelect">
                <?php
                //TODO: Move this in to a module
                $connect = databaseController::connectToDatabase();
                $sql = "SELECT * from bbydb.breweries";
                $result = mysqli_query($connect,$sql);
                $breweries = mysqli_fetch_all($result);
                foreach($breweries as $brewery){
                    echo '<option name="'.$brewery[1].'" value="'.$brewery[0].'">'.$brewery[1].'</option>';
                }
                ?>
            </select>
            <label for="beer_name">Beer Description </label><textarea name="beer_description"></textarea>
            <label for="beer_name">Beer Score </label><input type="text" name="beer_score" />
            <button type="submit">Click</button>
        </form>
        <br /><br /><br /><br /><br /><br /><br />
        Brewery Create:<br />
        <form name="breweryCreate" id="createBrewery">
            <input type="hidden" name="createType" value="brewery" />
            <label for="brewery_name">Brewery Name </label><input type="text" name="brewery_name" />
            <label for="brewery_address">Brewery Address </label><input type="text" name="brewery_address" />
            <label for="brewery_city">Brewery City </label><input type="text" name="brewery_city" />
            <label for="brewery_state">Brewery State </label><input type="text" name="brewery_state" />
            <label for="brewery_zip">Brewery Zip </label><input type="text" name="brewery_zip" />
            <label for="brewery_zip">Brewery Description </label><textarea name="brewery_description"></textarea>
            <button type="submit">Click</button>
        </form>

        <!-- TODO: Figure out list creation
        TODO: Name Of List, Size Of List(?), Beers, Breweries, Brewery Locations, Beer Score, Add up Beer Score for Total List Score
        TODO: Pass off package to PHP
        -->
        <br /><br /><br /><br /><br />
        <form name="listStep1" id="listStep1" method="post" action="./stages/stage1">
            <input type="hidden" name="createType" value="list"/>
            <input type="text" name="listName" value="" placeholder="Name Your List"/>
            <select name="beerSize" class="beerSize">
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>20</option>
            </select>
            <button type="submit">Click</button>
        </form>

        <br /><br /><br /><br /><br /><br />
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