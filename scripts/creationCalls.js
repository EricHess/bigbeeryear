/**
 * Created by eric on 5/13/2015.
 */

var bigbeeryear = function(){};

bigbeeryear.prototype.itemCreate = function(element){
    $.ajax({
        type:'post',
        url:'./controllers/databaseController.php',
        data:element.serialize(),
        success: function(data){
            alert(data);
        }
    })
};

$(document).ready(function(){
    $('form#createUser, form#createBeer, form#createBrewery').submit(function(){
        bigbeeryear.prototype.itemCreate($(this));
        return false;
    });
});