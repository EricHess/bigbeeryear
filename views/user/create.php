<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 11:30 PM
 */

?>
<section class="createUser">
    <h2>Create A User</h2>

    <form name="userCreate" id="createUser">
        <input type="hidden" name="createType" value="user" />

        <article class="fname">
            <label for="fname">First Name: </label>
            <input id="fname" type="text" name="fname" />
        </article>

        <article class="lname">
            <label for="lname">Last Name: </label>
            <input id="lname" type="text" name="lname" />
        </article>

        <article class="username">
            <label for="username">Username: </label>
            <input id="username" type="text" name="username" />
        </article>

        <article class="email">
            <label for="email">Email: </label>
            <input id="email" type="text" name="email" />
        </article>

        <article class="password">
            <label for="password">Password: </label>
            <input id="password" type="text" name="password" />
        </article>

        <!-- TODO: Redirect to user dashboard after creation -->
        <button type="submit">Click</button>
    </form>
</section>