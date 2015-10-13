categorias
    .controller('CategoriasCtrl', [
        '$scope',
        'CategoriasSrv',
        function ($scope, CategoriasSrv) {
            $scope.nome = "Roberto";

            $scope.load = function () {
                $scope.registros = CategoriasSrv.query();
            }
            $scope.load();

            $scope.add = function (item) {
                $scope.result = CategoriasSrv.save(
                    {},
                    item,
                    function (data, status, header, config) {
                        $location.path('/categorias/');
                    },
                    function (data, status, header, config) {
                        alert("Erro ao inserir o registro"+data.messages[0]);

                    }
                );
            }
        }
    ]);