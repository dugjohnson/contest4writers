var app = angular.module('app', ['ngTouch','ui.grid', 'ui.grid.edit', 'ui.grid.rowEdit','ui.grid.cellNav'])
    .controller('MainCtrl',
    function ($log, $scope, scoresheetService) {
        $scope.gridOptions = {
            enableSorting: true,
            enableCellEditOnFocus: true,
            enableFiltering: true,
            columnDefs: [
                {name: 'id', enableSorting: false, enableCellEdit: false},
                {name: 'title', enableCellEdit: false},
                {name: 'category', enableCellEdit: false},
                {name: 'judge_id', enableCellEdit: true, enableCellEditOnFocus: true},
                {name: 'published', enableCellEdit: false}
            ]
        };
        $scope.gridOptions.onRegisterApi = function(gridApi){
            //set gridApi on scope
            $scope.gridApi = gridApi;
            gridApi.rowEdit.on.saveRow($scope, $scope.saveRow);
        };
        $scope.saveRow = function (rowEntity) {
            var promise = scoresheetService.setScoresheet(rowEntity);
            $scope.gridApi.rowEdit.setSavePromise(rowEntity, promise);
        };
        $scope.getScoresheetList = function () {
            var promise =
                scoresheetService.getScoresheets();
            promise.then(
                function (payload) {
                    $scope.gridOptions.data = payload.data;
                },
                function (errorPayload) {
                    $log.error('failure loading scoresheets', errorPayload);
                });
        };
        $scope.getScoresheetList();
    })
    .factory('scoresheetService', function ($http) {
        return {
            getScoresheets: function () {
                return $http.get('/api/v1/scoresheets');
            },
            setScoresheet: function (rowEntity) {
                $http.defaults.headers.common["X-CSRF-Token"] =  $('meta[name="_token"]').attr('content');
                $http.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
                return $http.post('/api/v1/scoresheets',
                    {id: rowEntity.id, judgeID: rowEntity.judge_id}).
                success(function(data, status, headers, config) {
                    // this callback will be called asynchronously
                    // when the response is available
                }).
                    error(function(data, status, headers, config) {
                        return data;
                        // called asynchronously if an error occurs
                        // or server returns response with an error status.
                    });
            }
        }
    });