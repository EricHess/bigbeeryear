<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 11:31 PM
 */

?>

Beer Create:<br />
<form name="beerCreate" id="createBeer">
    <input type="hidden" name="createType" value="beer" />
    <label for="beer_name">Beer Name </label><input type="text" name="beer_name" />
    <label for="beer_name">Beer Abv </label><input type="text" name="beer_abv" />
    <select name="beer_brewery_id" class="breweriesSelect">
        <?php
        //TODO: Move this in to a module
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_bbydb.breweries";
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