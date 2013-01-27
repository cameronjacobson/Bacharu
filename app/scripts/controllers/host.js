'use strict';

BacharuApp.controller('HostCtrl', function($scope,$http) {

	$scope.getHosts = function(){
		$http.get('/host/get_all').success(function(data,status,headers,config){
			$scope.hosts = data;
		});
	}

	$scope.getHosts();
});
