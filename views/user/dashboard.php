<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 4:05 PM
 */

include("./controllers/userDashboard.php");
$userDash = userDashboard::getUserFirstAndLastName();
$userName = $userDash[0][1];
$firstName = $userDash[0]["fname"];
$lastName = $userDash[0]["lname"];
$userLists = userDashboard::getUserLists();
?>



<section class="userDashboard">

    <header class="welcome">
        <span>Welcome <?php echo $firstName." ".$lastName; ?> </span>
        <span><a href="#">+ Your Lists</a></span>
    </header>

    <h2>Your Active Lists:</h2>
    <?php
        foreach($userLists as $key=>$userList){
            if($userList[6] == 0) { ?>
            <article class="dashboardList listContainer" data-list-id="<?php echo $userList[0]?>">
                <input type="checkbox" class="completeList" data-list-id="<?php echo $userList[0]?>">Complete List</input>
                <header class="listTitles">
                    <h3 class="lft"><?php echo $userList[2];?></h3>
                    <h4 class="rt">List Score: <?php echo userDashboard::getTotalBeerScore($userList[3])?></h4>
                    <aside class="clr"></aside>
                </header>
                <article class="listDescription">
                    <?php echo $userList[4];?>
                </article>

                <aside class="listCompletion">
                    List Completion: <?php echo userDashboard::getCompletionPercentage($userList[0], "",""); ?>%
                    <aside class="completionBar">
                        <aside class="completionPercentage" style="width:<?php echo userDashboard::getCompletionPercentage($userList[0], "",""); ?>%;"></aside>
                    </aside>
                </aside>

            </article>
        <?php }
    };
    ?>

    <h2>Your Completed Lists:</h2>
    <?php
    foreach($userLists as $key=>$userList){
        if($userList[6] == 1) {

            //TODO: un-complete functionality
            //TODO: on click of checkbox, update 1 to 0
            ?>

            <article class="dashboardList listContainer" data-list-id="<?php echo $userList[0]?>">
                <header class="listTitles">
                    <h3 class="lft"><?php echo $userList[2];?></h3>
                    <h4 class="rt">List Score: <?php echo userDashboard::getTotalBeerScore($userList[3])?></h4>
                    <aside class="clr"></aside>
                </header>
                <article class="listDescription">
                    <?php echo $userList[4];?>
                </article>

                <aside class="listCompletion">
                    List Completion: <?php echo userDashboard::getCompletionPercentage($userList[0], "",""); ?>%
                    <aside class="completionBar">
                        <aside class="completionPercentage" style="width:<?php echo userDashboard::getCompletionPercentage($userList[0], "",""); ?>%;"></aside>
                    </aside>
                </aside>

            </article>
        <?php }
    };
    ?>
    <a href="/create/list">+ Create New List</a>

</section>

<script>
    new BeerListings();
</script>