/**
 * Created by eric on 6/3/2015.
 */
var BeerListings = function(){
    this.init();
    //this.filterOnBreweries("f");
};

BeerListings.prototype.init = function(){
  this.bindMethods();
};

BeerListings.prototype.openModal = function(){

};

BeerListings.prototype.bindMethods = function(){
    const beerIds = [];
    //TODO: Add hide/show functionality.. breweries only first, then show next() beer dropdown after change
    $('.breweryList').change(function(){
        if($(this).val() != ""){
            BeerListings.prototype.filterOnBreweries($(this).val());
        }else{
            BeerListings.prototype.showAllBeers();
        }
    });

    $(".beerListDescription").keyup(function(){
        $(".listDescription").val($(this).val());
    });

    $('.beerList').change(function(){
        const beerId = $(this).find(":selected").data("beer-id");
        BeerListings.prototype.pushBeerIdsToHiddenField(beerIds, beerId);
    });

    $('#beerList').submit(function(){
        BeerListings.prototype.saveList($(this));
        return false;
    });

    $(".finishBeer").click(function(){
        var finishedCheck = $(this).parents("aside.zebra").hasClass("finished");
        if(!finishedCheck){
        BeerListings.prototype.finishBeer($(this).parents("aside.zebra").data("beer-id"),$(this).parents("aside.zebra").data("list-id"), $(this));
            }else{
            alert('already clicked finished');
        }
        });

    $(".dashboardList.listContainer").click(function(){
        var goto = $(this).data("list-id");
        window.location = "/list/detail?detailList="+goto;
    })

    $(".completeList").click(function(){
        BeerListings.prototype.completeList({
            "type":"complete",
            "listId": $(this).data("list-id")
        })
    });
};


BeerListings.prototype.pushBeerIdsToHiddenField = function(beerIds, beerId){
    if(beerIds.indexOf(beerId) > -1){
        alert('in array already')
    }else{
        beerIds.push(beerId);
        $('.beerListHidden').val(beerIds);
    }
};

BeerListings.prototype.filterOnBreweries = function(breweryId) {
    $('.beerList option').addClass('hidden');
    $('.beerList option[data-brewery-id="'+breweryId+'"]').removeClass('hidden');
};

BeerListings.prototype.showAllBeers = function(){
  $('.beerList option').removeClass('hidden');
};

BeerListings.prototype.saveList = function(element){
    $.ajax({
        type:'post',
        url:'/controllers/createListController.php',
        data:element.serialize(),
        success: function(data){
            window.location = "/bigbeeryear/user/dashboard"
        }
    })
};

BeerListings.prototype.completeList = function(element){
    $.ajax({
        type:'post',
        url:'/controllers/listController.php',
        data:element,
        success: function(data){
            window.location = "/bigbeeryear/user/dashboard"
        }
    })
};

BeerListings.prototype.finishBeer = function(beerID, listID, element){
    $.ajax({
        type:'post',
        url:'/controllers/listController.php',
        data:{"beerID": beerID, "listID":listID},
        success: function(){
            $(element).parents("aside.zebra").addClass("finished");
        }
    })
};