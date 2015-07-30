<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 7/1/2015
 * Time: 4:13 PM
 */

include("/controllers/userDashboard.php");
include("/controllers/listDetailController.php");
$userDash = userDashboard::getUserFirstAndLastName();
$userName = $userDash[0][1];

if(isset($_GET["detailList"])){
    $detailList = $_GET["detailList"];
}

if(isset($detailList)){

    $entireList= listDetailController::getSpecificList($detailList);
    $listName = $entireList[0][2];
    $listDescription = $entireList[0][4];
    $listBeers = $entireList[0][3];
    $listScore = userDashboard::getTotalBeerScore($entireList[0][3]);
    $listBeerArray = explode(",",$listBeers);
    ?>
<script src="/bigbeeryear/scripts/listCalls.js"></script>
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
                $beerName = $beerName[0][1];

                $breweryName = userDashboard::parseBreweryNamesFromIDs($beer);
                $breweryName = $breweryName[0][0];

                $beerScore = userDashboard::parseBeerScoresFromIDs($beer);
                $beerScore = $beerScore[0][0];

                $finishedBeers = listDetailController::getFinishedList($detailList);
                $finishedBeers = explode(",", $finishedBeers[0][0]);


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
    <a href="/bigbeeryear/user/dashboard">< Back To Dashboard</a>
</section>


<?php
}else{
    echo "Whoops! Something went horrible wrong.. No list ID was received. Are you logged in?";
};
?>