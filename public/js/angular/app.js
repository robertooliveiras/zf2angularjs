'use strict'
angular.module('myApp',[
    'ngRoute',
    'myApp.controllers'
])
    .config([
        '$routeProvider',
        function($routeProvider) {
            $routeProvider
                .when('/categorias/',{
                    templateUrl: 'js/angular/templates/categorias.html',
                    controller: 'CategoriasCtrl'
                })
                .when('/categorias/novo/',{
                    templateUrl: 'js/angular/templates/categorias_novo.html',
                    controller: 'CategoriasCtrl'
                })
                .when('/categorias/editar/:id',{
                    templateUrl: 'js/angular/templates/categorias_editar.html',
                    controller: 'CategoriasCtrl'
                }).when('/produtos/',{
                    templateUrl: 'js/angular/templates/produtos.html',
                    controller: 'ProdutosCtrl'
                })
                .when('/produtos/novo/',{
                    templateUrl: 'js/angular/templates/produtos_novo.html',
                    controller: 'ProdutosCtrl'
                })
                .when('/produtos/editar/:id',{
                    templateUrl: 'js/angular/templates/produtos_editar.html',
                    controller: 'ProdutosCtrl'
                });
        }
    ]);