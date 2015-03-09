var app = angular.module('app', ['ngTouch', 'ui.grid'])
    .controller('MainCtrl',
    function($log, $scope, scoresheetService) {
        $scope.gridOptions = {
            enableSorting: true,
            enableCellEditOnFocus: true,
            enableFiltering: true,
            columnDefs: [
                { name: 'id', enableSorting: false, enableCellEdit: false, headerCellClass: 'myHeader' },
                { name: 'title', headerCellClass: 'myHeader' },
                { name: 'category', headerCellClass: 'myHeader'},
                { name: 'judge_id', enableCellEdit: true, headerCellClass: 'myHeader' },
                { name: 'published', headerCellClass: 'myHeader'}
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