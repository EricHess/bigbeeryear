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

    $('.beerList').change(function(){
        const beerId = $(this).find(":selected").data("beer-id");
        BeerListings.prototype.pushBeerIdsToHiddenField(beerIds, beerId);
    });

    $('#beerList').submit(function(){
        BeerListings.prototype.saveList($(this));
        return false;
    })


};

BeerListings.prototype.pushBeerIdsToHiddenField = function(beerIds, beerId){
    beerIds.push(beerId);
    $('.beerListHidden').val(beerIds);
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
        url:'/bigbeeryear/controllers/createListController.php',
        data:element.serialize(),
        success: function(data){
            alert(data);
        }
    })
};