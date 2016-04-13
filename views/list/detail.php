<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 7/1/2015
 * Time: 4:13 PM
 */

include("./controllers/userDashboard.php");
include("./controllers/listDetailController.php");
$userDash = userDashboard::getUserFirstAndLastName();
$userName = $userDash[0]["fname"];

if(isset($_GET["detailList"])){
    $detailList = $_GET["detailList"];
}

if(isset($detailList)){

    $entireList= listDetailController::getSpecificList($detailList);
    $listName = $entireList[0]["list_name"];
    $listDescription = $entireList[0]["list_description"];
    $listBeers = $entireList[0]["list_beers"];
    $listScore = userDashboard::getTotalBeerScore($entireList[0]["list_beers"]);
    $listBeerArray = explode(",",$listBeers);
    ?>
<script src="/scripts/listCalls.js"></script>
<style>
    .finished{text-decoration:line-through}
</style>
<header class="welcome">
    <span>Welcome <?php echo $userName; ?> </span>
    <span><a href="#">+ Your Lists</a></span>
</header>

<section class="listDetail listContainer">
    <h3 class="lft"><?php echo $listName; ?></h3>
    <h4 class="rt">List Score: <?php echo $listScore; ?></h4>
    <div class="clr"></div>
    <article class="listDescription"><?php echo $listDescription; ?></article>

    <aside class="listCompletion">
        List Completion: <?php echo userDashboard::getCompletionPercentage($detailList, "",""); ?>%
        <aside class="completionBar">
            <aside class="completionPercentage" style="width:<?php echo userDashboard::getCompletionPercentage($detailList, "",""); ?>%;"></aside>
        </aside>
    </aside>

    <article class="beersInList">
        <!-- TODO: Create Title Bar -->
        <?php
            foreach($listBeerArray as $beer){

                $beerName = userDashboard::parseBeerNamesFromIDs($beer);
                $beerName = $beerName[0]["beer_name"];

                $breweryName = userDashboard::parseBreweryNamesFromIDs($beer);
                $breweryName = $breweryName[0]["brewery_name"];

                $beerScore = userDashboard::parseBeerScoresFromIDs($beer);
                $beerScore = $beerScore[0]["beer_score"];

                $finishedBeers = listDetailController::getFinishedList($detailList);
                $finishedBeers = explode(",", $finishedBeers[0]["finished_beers"]);


                if(in_array($beer, $finishedBeers)){
                    $finished = "finished";
                }else{
                    $finished = "";
                }

                ?>
                <aside class="zebra <?php echo $finished; ?>" data-beer-id="<?php echo $beer; ?>" data-list-id="<?php echo $detailList;?>">
                <?php

                echo "<span class='beerName'>".$beerName."</span>";
                echo "<span class='breweryName'>".$breweryName."</span>";
                echo "<span class='beerScore'>".$beerScore."</span>";
                echo "<span class='finishBeer'>Mark Complete</span>";
                ?>
                </aside>

        <?php } ?>

    </article>
<script>new BeerListings();</script>
    <a href="/user/dashboard">< Back To Dashboard</a>
</section>


<?php
}else{
    echo "Whoops! Something went horrible wrong.. No list ID was received. Are you logged in?";
};
?>