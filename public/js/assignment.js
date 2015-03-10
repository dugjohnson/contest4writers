var app = angular.module('app', ['ui.grid', 'ui.grid.edit','ui.grid.rowEdit'])
    .controller('MainCtrl',
    function($log, $scope, scoresheetService) {
        $scope.gridOptions = {
            enableSorting: true,
            enableCellEditOnFocus: true,
            enableFiltering: true,
            columnDefs: [
                { name: 'id', enableSorting: false, enableCellEdit: false, headerCellClass: 'myHeader' },
                { name: 'title', enableCellEdit: false, headerCellClass: 'myHeader' },
                { name: 'category', enableCellEdit: false, headerCellClass: 'myHeader'},
                { name: 'judge_id', enableCellEdit: true, enableCellEdit: true, headerCellClass: 'myHeader' },
                { name: 'published', enableCellEdit: false, headerCellClass: 'myHeader'}
            ]
        };
        $scope.getScoresheetList = function() {
            var promise =
                scoresheetService.getScoresheets();
            promise.then(
                function(payload) {
                    $scope.gridOptions.data = payload.data;
                },
                function(errorPayload) {
                    $log.error('failure loading scoresheets', errorPayload);
                });
        };
        $scope.getScoresheetList();
    })
    .factory('scoresheetService', function($http) {
        return {
            getScoresheets: function() {
                return $http.get('/api/v1/scoresheets');
            }
        }
    });