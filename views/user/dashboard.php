<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 4:05 PM
 */

//TODO: Style.

include("/controllers/userDashboard.php");
$userDash = userDashboard::getUserFirstAndLastName();
$userName = $userDash[0][1];
$userLists = userDashboard::getUserLists();

?>



<section class="userDashboard">

    <header class="welcome">
        <span>Welcome <?php echo $userName; ?> </span>
        <span><a href="#">+ Your Lists</a></span>
    </header>

    <h2>Your Lists:</h2>
    <?php foreach($userLists as $key=>$userList){  ?>
        <article class="listContainer" data-list-id="<?php echo $userList[0]?>">
            <h3><?php echo $userList[2];?></h3>
            <h4>List Score: <?php echo userDashboard::getTotalBeerScore($userList[3])?></h4>

            <article class="listDescription">
                <?php echo $userList[4];?>
            </article>

            <aside class="listCompletion">
                <!-- TODO: Need to add beer completion logic to list -->
                <% LIST COMPLETION PERCENTAGE %>
                <?php echo (userDashboard::getTotalBeerScore($userList[3]))/3?>
            </aside>

        </article>
    <?php }; ?>

</section>