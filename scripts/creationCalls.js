/**
 * Created by eric on 5/13/2015.
 */

var bigbeeryear = function(){};

bigbeeryear.prototype.userCreate = function(element){
    $.ajax({
        type:'post',
        url:'./controllers/databaseController.php',
        data:element.serialize(),
        success: function(){
            alert('user created');
        }
    })
};

$(document).ready(function(){
    $('form#createUser').submit(function(){
        bigbeeryear.prototype.userCreate($(this));
        return false;
    });
});