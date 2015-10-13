'use strict'
var categorias = angular.module('categorias',[
    'ngRoute',
    'ngResource'
]);

categorias
    .config([
        '$routeProvider',
        function($routeProvider) {
            $routeProvider
                .when('/categorias/',{
                    templateUrl: 'js/angular/templates/categorias.html'
                })
                .when('/categorias/novo/',{
                    templateUrl: 'js/angular/templates/categorias_novo.html'
                });
        }
    ]);