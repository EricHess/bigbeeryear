/**
 * Created by eric on 5/13/2015.
 */

var bigbeeryear = function(){};

bigbeeryear.prototype.itemCreate = function(element){
    $.ajax({
        type:'post',
        url:'/controllers/databaseController.php',
        data:element.serialize(),
        success: function(data){
            alert("Element Created!");
        }
    })
};

//bigbeeryear.prototype.listCreate = function(element){
//    $.ajax({
//        type:'post',
//        url:'./controllers/listController.php',
//        data:element.serialize(),
//        success: function(data){
//        }
//    })
//};

$(document).ready(function(){
    $('form#createUser, form#createBeer, form#createBrewery').submit(function(){
        bigbeeryear.prototype.itemCreate($(this));
        return false;
    });

    //$('form#listStep1').submit(function(){
    //    bigbeeryear.prototype.listCreate($(this));
    //    return false;
    //});
});