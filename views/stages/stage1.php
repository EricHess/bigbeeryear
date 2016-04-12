<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/4/2015
 * Time: 8:39 PM
 */

if(empty($_POST['beerSize'])){
echo 'nuh uh, no post here!';
}else {
    $beerList = databaseController::getBeerList();
    $breweryList = databaseController::getBreweryList();
?>

    <section class="listContainer">
        <h2>Create A List</h2>
        <article class="lists">
            <h3><?php echo $_POST['listName']?></h3>

            <textarea class="beerListDescription"></textarea>

                <?php
                for($i=0;$i < $_POST['beerSize']; $i++){
                echo '<li>';
                    echo 'Breweries: <select name="breweryList" class="breweryList">
                <option value="">Select One</option>';

                foreach($breweryList as $breweries){
                    echo '<option value="'.$breweries["brewery_id"].'">'.$breweries["brewery_name"].'</option>';
                };
                echo '</select>';

            echo 'Beers: <select name="beerList" class="beerList">
                <option>Select One</option>';
                foreach($beerList as $beers){
                    echo '<option data-beer-id="'.$beers["beer_id"].'" data-brewery-id="'.$beers["brewery_id"].'">'.$beers["beer_name"].'</option>';
                };
            echo '</select></li>';

                }

                ?>
            <form name="beerList" id="beerList">
                    <textarea name="listDescription" class="hidden listDescription"></textarea>
                    <input name="beerListName" class="beerListName" type="hidden" value="<?php echo $_POST['listName']; ?>" />
                    <input name="beerListHidden" class="beerListHidden" type="hidden" />
                    <input class="saveList" id="saveList" name="saveList" type="submit" val="Save List"/>
                </form>

        </article>
<style>
    .hidden{display:none;}
</style>
        <script>
            new BeerListings();
        </script>
</section>

<?php }; ?>