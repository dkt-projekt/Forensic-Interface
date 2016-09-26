angular.
  module('forensicApp').
  config(['$locationProvider', '$routeProvider',
    function config($locationProvider, $routeProvider) {
      $locationProvider.hashPrefix('!');

      $routeProvider.
        when('/collections', {
          template: '<collection-list></collection-list>'
        }).
        when('/collections/:collectionId', {
          template: '<collection-detail></collection-detail>'
        }).
        otherwise('/collections');
    }
  ]);
