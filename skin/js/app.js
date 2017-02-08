/*global angular */

/**
 * The main TodoMVC app module
 *
 * @type {angular.Module}
 */
var app = angular.module('todomvc',['ngRoute'])
	
app.controller('TodoCtrl', function TodoCtrl($scope, $routeParams, $filter,$http) {
	$scope.todos = [];
	$http({
			method:'GET',
			url: 'todos',
			headers : {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data){
				$scope.todos =  data;
			})
		
	$scope.addTodo =  function(){
		$http({
			method:'POST',
			url: 'insert',
			headers : {'Content-Type': 'application/x-www-form-urlencoded'},
			data:  JSON.stringify({title: $scope.newTodo})
			}).success(function(data){
				$scope.todos =  data;
				$scope.newTodo = '';
			})
	};
	$scope.toggleCompleted = function(updateid,complete){  
		$http({
			method:'POST',
			url: 'docomplete',
			headers : {'Content-Type': 'application/x-www-form-urlencoded'},
			data:  JSON.stringify({id: updateid,complete:complete})
			}).success(function(data){
				$scope.todos =  data;
				$scope.newTodo = '';
			})
	}
	
	$scope.removeTodo = function(deleteid){ 
		$http({
			method:'POST',
			url: 'dodelete',
			headers : {'Content-Type': 'application/x-www-form-urlencoded'},
			data:  JSON.stringify({id: deleteid})
			}).success(function(data){
				$scope.todos =  data;
				$scope.newTodo = '';
			})
	}
	$scope.alldata = function(){  
		$http({
			method:'GET',
			url: 'todos',
			headers : {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data){
				$scope.todos =  data;
			})
	}
	
	$scope.active = function(){ 
		$http({
			method:'GET',
			url: 'todosactive',
			headers : {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data){
				$scope.todos =  data;
			})
	}
	
	$scope.completed = function(){ 
		$http({
			method:'GET',
			url: 'todoscompleted',
			headers : {'Content-Type': 'application/x-www-form-urlencoded'},
			}).success(function(data){
				$scope.todos =  data;
			})
	}
			
});
	
