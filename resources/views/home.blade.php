<!doctype html>
<html lang="en" data-framework="angularjs">
	<head>
		<meta charset="utf-8">
		<title>My Book</title>
		
		<link rel="stylesheet" href="{{ URL::to('skin/js/todomvc-app-css/index.css') }}">
        
		<style>[ng-cloak] { display: none; }</style>
	</head>
	<body ng-app="todomvc" ng-controller="TodoCtrl">
    	
		
			<section id="todoapp" class="col">
				
				<header id="header">
					<div class="loginarea">Welcome {{$name}}</div>
					<h1>todos</h1>
					<form id="todo-form" ng-submit="addTodo()">
						<input id="new-todo" placeholder="What your task" ng-model="newTodo" ng-disabled="saving" autofocus>
					</form>
				</header>
				
				
			</section>
            
            <section id="main" >
					<input id="toggle-all" type="checkbox" ng-model="allChecked" ng-click="markAll(allChecked)">
					<label for="toggle-all">Mark all as complete</label>
					<ul id="todo-list">
						<li ng-repeat="todo in todos " ng-class="{completed: todo.completed == '1', editing: todo == editedTodo}">
                        
							<div class="view">
								<input class="toggle" type="checkbox" ng-model="todo.completed" ng-change="toggleCompleted(todo.id,todo.completed)">
								<label ng-dblclick="editTodo(todo)">@{{todo.title}}</label>
								<button class="destroy" ng-click="removeTodo(todo.id)"></button>
							</div>
							<form ng-submit="saveEdits(todo, 'submit')">
								<input class="edit" ng-trim="false" ng-model="todo.title" todo-escape="revertEdits(todo)" ng-blur="saveEdits(todo, 'blur')" todo-focus="todo == editedTodo">
							</form>
						</li>
					</ul>
                    <footer id="footer" >
					
					<ul id="filters">
						<li>
							<a ng-class="{selected: status == ''}" ng-click="alldata()">All</a>
						</li>
						<li>
							<a ng-class="{selected: status == 'active'}" ng-click="active()">Active</a>
						</li>
						<li>
							<a ng-class="{selected: status == 'completed'}" ng-click="completed()">Completed</a>
						</li>
					</ul>
					<button id="clear-completed" ng-click="clearCompletedTodos()" ng-show="completedCount">Clear completed</button>
				</footer>
				</section>
                
			<footer id="info">
				
				
			</footer>
		
		<script src="{{ URL::to('skin/js/angular/angular.js') }}"></script>
		<script src="{{ URL::to('skin/js/angular-route/angular-route.js') }}"></script>
		<script src="{{ URL::to('skin/js/app.js') }}"></script>
		
	</body>
</html>
