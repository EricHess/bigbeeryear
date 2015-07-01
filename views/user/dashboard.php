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
?>



<section class="userDashboard">

    <header class="welcome">
        <span>Welcome <?php echo $userName; ?> </span>
        <span><a href="#">+ Your Lists</a></span>
    </header>

    <h2>Your Lists:</h2>

    <article class="listContainer">
        <h3><% List Name %></h3>
        <h4>List Score:<% 25 %></h4>

        <article class="listDescription">
            <% LIST DESCRIPTION HERE %>
        </article>

        <aside class="listCompletion">
            <% LIST COMPLETION PERCENTAGE %>
        </aside>

    </article>

</section>