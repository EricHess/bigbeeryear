<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 11:32 PM
 */

?>

<!--
TODO: Name Of List, Size Of List(?), Beers, Breweries, Brewery Locations, Beer Score, Add up Beer Score for Total List Score
TODO: Pass off package to PHP
-->
<br /><br /><br /><br /><br />
<form name="listStep1" id="listStep1" method="post" action="/bigbeeryear/stages/stage1">
    <input type="hidden" name="createType" value="list"/>
    <input type="text" name="listName" value="" placeholder="Name Your List"/>
    <select name="beerSize" class="beerSize">
        <option>5</option>
        <option>10</option>
        <option>15</option>
        <option>20</option>
    </select>
    <button type="submit">Click</button>
</form>
