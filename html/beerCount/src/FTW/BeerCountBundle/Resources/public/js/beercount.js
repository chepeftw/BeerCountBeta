(function() {

  var app = angular.module('beercount', []).config(function($interpolateProvider){
      $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
  });

  app.controller('BarController', [ '$http', function($http){
    var beerCount = this;
    beerCount.barData = [];

    var dataUrl = $( "body" ).find( ".record_properties" ).attr('data-url');
    
    $http.get( dataUrl ).success(function(data){
      beerCount.barData = data;
    }).error(function(data, status, headers, config) {
      alert('Error');
    });
    
  }]);

})();