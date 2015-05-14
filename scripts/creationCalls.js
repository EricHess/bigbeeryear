/**
 * Created by eric on 5/13/2015.
 */

var bigbeeryear = function(){};

bigbeeryear.prototype.userCreate = function(element){
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
    $('form#createUser').submit(function(){
        alert('sub');
        bigbeeryear.prototype.userCreate($(this));
        return false;
    });
});