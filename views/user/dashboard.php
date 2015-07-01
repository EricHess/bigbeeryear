<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 4:05 PM
 */

/*
 * TODO: Create controller
 * TODO: Start session
 * TODO: Get User ID
 * TODO: Query for first and last name from User ID
 * TODO: Query for lists from User ID
 * TODO: FIGURE OUT SCORING!
 */

include("/controllers/userDashboard.php");
$userDash = userDashboard::getUserFirstAndLastName();
$userName = $userDash[0][1];
$userLists = userDashboard::getUserLists();

//TODO: Need to get ALL lists
//$userListsBeers = $userLists[0][3];
//$userListsBeers = explode(",",$userListsBeers);
//
//$beersInList = array();
//
////TODO: Take all user lists beers and parse names
//foreach($userListsBeers as $userListsBeer){
//    array_push($beersInList,userDashboard::parseBeerNamesFromIDs($userListsBeer));
//}

?>



<section class="userDashboard">

    <header class="welcome">
        <span>Welcome <?php echo $userName; ?> </span>
        <span><a href="#">+ Your Lists</a></span>
    </header>

    <h2>Your Lists:</h2>
    <?php foreach($userLists as $userList){  ?>
        <article class="listContainer" data-list-id="<?php echo $userList[0]?>">
            <h3><?php echo $userList[2];?></h3>
            <!-- TODO: Need to add beer score to beer creation -->
            <h4>List Score:<% 25 %></h4>

            <article class="listDescription">
                <!-- TODO: Need to add description to list creation -->
                <% LIST DESCRIPTION HERE %>
            </article>

            <aside class="listCompletion">
                <!-- TODO: Need to add beer completion logic to list -->
                <% LIST COMPLETION PERCENTAGE %>
            </aside>

        </article>
    <?php }; ?>

</section>