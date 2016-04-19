<?php

require_once 'userDashboard.php';

class homeController {
    
    public static function recentBeers(){
        $con = databaseController::connectToDatabase();
        $sql = "SELECT * FROM `beers` ORDER BY `beers`.`created_date` DESC LIMIT 3";
        $result = mysqli_query($con,$sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
    homeController::outputRecentBeers($data);
    
    }
    
    public static function outputRecentBeers($recentBeers){
    
        foreach($recentBeers as $recentBeer){
            $beerId = $recentBeer["beer_Id"];
            $beerName = $recentBeer["beer_name"];
            $beerImage = $recentBeer["beer_image"];
            $breweryId = $recentBeer["beer_brewery_id"];
            $breweryId = userDashboard::parseBreweryNamesFromIDs($breweryId);
            
            echo '<figure class="added">';
            echo '<img src="http://placehold.it/125x125" alt="image alt text"/>';
            echo '<figcaption>'.$beerName.' From '.$breweryId[0]['brewery_name'].'</figcaption>';
            echo '</figure>';

        }
        
    }
    
    
    
}

?>