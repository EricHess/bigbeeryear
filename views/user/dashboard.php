<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 4:05 PM
 */

include("/controllers/userDashboard.php");
$userDash = userDashboard::getUserFirstAndLastName();
$userName = $userDash[0][1];
$firstName = $userDash[0][4];
$lastName = $userDash[0][5];
$userLists = userDashboard::getUserLists();

?>



<section class="userDashboard">

    <header class="welcome">
        <span>Welcome <?php echo $firstName." ".$lastName; ?> </span>
        <span><a href="#">+ Your Lists</a></span>
    </header>

    <h2>Your Lists:</h2>
    <?php foreach($userLists as $key=>$userList){  ?>
        <article class="dashboardList listContainer" data-list-id="<?php echo $userList[0]?>">
            <h3 class="lft"><?php echo $userList[2];?></h3>
            <h4 class="rt">List Score: <?php echo userDashboard::getTotalBeerScore($userList[3])?></h4>
            <aside class="clr"></aside>
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
    <?php }; ?>

    <a href="/bigbeeryear/create/list">+ Create New List</a>

</section>

<script>
    new BeerListings();
</script>