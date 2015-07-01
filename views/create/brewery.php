<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 6/30/2015
 * Time: 11:31 PM
 */

?>

Brewery Create:<br />
<form name="breweryCreate" id="createBrewery">
    <input type="hidden" name="createType" value="brewery" />
    <label for="brewery_name">Brewery Name </label><input type="text" name="brewery_name" />
    <label for="brewery_address">Brewery Address </label><input type="text" name="brewery_address" />
    <label for="brewery_city">Brewery City </label><input type="text" name="brewery_city" />
    <label for="brewery_state">Brewery State </label><input type="text" name="brewery_state" />
    <label for="brewery_zip">Brewery Zip </label><input type="text" name="brewery_zip" />
    <label for="brewery_zip">Brewery Description </label><textarea name="brewery_description"></textarea>
    <button type="submit">Click</button>
</form>