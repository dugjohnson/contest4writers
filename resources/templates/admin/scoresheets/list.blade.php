<div>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-touch.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular-animate.js"></script>
    {!! HTML::script('js/angular/ui-grid.js') !!}
    {!! HTML::style('js/angular/ui-grid.css') !!}
    {!! HTML::script('js/assignment.js') !!}
    <div ng-controller="MainCtrl" class="large-12 columns">
            <strong>Total Scoresheets:</strong> @{{ gridOptions.data.length | number }}
            <div id="scoresheet-grid" ui-grid="gridOptions" ui-grid-edit ui-grid-row-edit ui-grid-cellNav class="scoregrid"></div>
    </div>
</div>
