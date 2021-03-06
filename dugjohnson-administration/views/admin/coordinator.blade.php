<div class="nav-bar">
    <ul class="button-group">
        <li><a href="/coordinators/entries" class="button radius">Entry Access</a></li>
        @if($isAdministrator)
            <li><a href="/coordinators/judges" class="button radius">Judge Access</a></li>
        @endif
        <li><a href="/coordinators/scoresheets" class="button radius">Scoresheet Access</a></li>
        <li><a href="/coordinators/reports/scoresummary" class="button radius">Scoresheet Summary</a></li>
    </ul>
</div>
