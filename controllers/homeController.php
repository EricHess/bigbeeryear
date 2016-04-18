<?php

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
            $beerName = $recentBeer["beer_name"];
            echo $beerName;
            //TODO: create beer name, description, brewery name from the list to show on home page
        }
        
    }
    
    
    
}

?>