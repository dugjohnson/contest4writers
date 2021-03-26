<div>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-touch.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-animate.js"></script>
    {!! Html::script('js/angular/ui-grid.js') !!}
    {!! Html::style('js/angular/ui-grid.css') !!}
    {!! Html::script('js/assignment.js') !!}
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
