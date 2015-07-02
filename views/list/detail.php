<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 7/1/2015
 * Time: 4:13 PM
 */

//TODO: Figure out completion

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

<header class="welcome">
    <span>Welcome <?php echo $userName; ?> </span>
    <span><a href="#">+ Your Lists</a></span>
</header>

<section class="listDetail">
    <h2><?php echo $listName; ?></h2>
    <span><?php echo $listScore; ?></span>
    <p><?php echo $listDescription; ?></p>

    <p>List Completion: <% LIST COMPLETION %></p>

    <article class="beersInList">
        <?php //TODO: Parse list of beerIDs to get the actual Beer Names, Brewery, Score and foreach them
            foreach($listBeerArray as $beer){

                $beerName = userDashboard::parseBeerNamesFromIDs($beer);
                $beerName = $beerName[0][1];

                $breweryName = userDashboard::parseBreweryNamesFromIDs($beer);
                $breweryName = $breweryName[0][0];

                $beerScore = userDashboard::parseBeerScoresFromIDs($beer);
                $beerScore = $beerScore[0][0];

                echo $beerName."<br />";
                echo $breweryName."<br />";
                echo $beerScore."<br />";


            }
        ?>
    </article>

</section>


<?php
}else{
    echo "Whoops! Something went horrible wrong.. No list ID was received. Are you logged in?";
};
?>