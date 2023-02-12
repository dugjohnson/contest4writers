<div>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-touch.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-animate.js"></script>
    <script src="/js/angular/ui-grid.js"></script>
    <link href="/js/angular/ui-grid.css" rel="stylesheet" type="text/css">
    <script src="/js/assignment.js"></script>

    <style type="text/css" media="screen">
        div.ui-grid-header-cell-wrapper{
            height: auto;
        }
    </style>
    <div ng-controller="MainCtrl" class="large-12 columns">
            <strong>Total Scoresheets:</strong> @{{ gridOptions.data.length | number }}
            <div id="scoresheet-grid" ui-grid="gridOptions" ui-grid-edit ui-grid-row-edit ui-grid-cellNav class="scoregrid"></div>
    </div>
</div>
