// Define the `PhoneListController` controller on the `phonecatApp` module
angular.module('collectionList').
	component('collectionList', {
		templateUrl:'app/collection-list/collection-list.template.html',
		controller: function CollectionListController() {
			this.collections = [
			    {
			      name: 'janCol',
			      snippet: 'Fast just got faster with Nexus S.'
			    }, {
			      name: 'julianCol',
			      snippet: 'The Next, Next Generation tablet.'
			    }, {
			      name: 'PeterCol',
			      snippet: 'The Next, Next Generation tablet.'
			    }
			  ];
			}
		});

