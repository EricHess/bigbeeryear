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

        <article class="name">
            <!-- TODO: Make a field for first name, last name as well -->
            <label for="username">Name: </label>
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