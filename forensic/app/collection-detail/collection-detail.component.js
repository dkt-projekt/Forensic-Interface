// Define the `PhoneListController` controller on the `phonecatApp` module
angular.module('collectionDetail').
	component('collectionDetail', {
		templateUrl:'app/collection-detail/collection-detail.template.html',
		controller: ['$routeParams',
		   function CollectionDetailController($routeParams) {
			this.collectionId = $routeParams.collectionId;
		   }
		]
	});

