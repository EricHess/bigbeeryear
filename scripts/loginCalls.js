/**
 * Created by eric on 5/21/2015.
 */

/**
 * Created by eric on 5/13/2015.
 */

var bigbeeryearLogin = function(){};

bigbeeryearLogin.prototype.userLogin = function(element){
    $.ajax({
        type:'post',
        url:'./controllers/userController.php',
        data:element.serialize(),
        success: function(data){
            window.location = "./main/begin"
        }
    })
};


$(document).ready(function(){
    $('form#userLogin').submit(function(){
        bigbeeryearLogin.prototype.userLogin($(this));
        return false;
    });
});