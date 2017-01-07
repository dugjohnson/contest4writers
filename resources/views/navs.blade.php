<div class="row">
    <div class="large-12 columns">
        <div class="right">
            @if(Auth::check())
                <a href="/logout" class="tiny button radius">Log Out</a>
                <a href="/users/{!! Auth::user()->id !!}" class="tiny button radius">Profile</a>
            @else
                <a href="/login" class="tiny button radius">Log In</a>
            @endif

            <a href="/register" class="tiny button radius">Register</a>
        </div>
        <div class="nav-bar">
            <ul class="button-group">
                <li><a href="/entries" class="button radius">Enter the Competition</a></li>
                <li><a href="/judges" class="button radius">Be a Judge</a></li>
                <li><a href="/coordinators" class="button radius">Coordinators</a></li>
                <li><a href="/administrators" class="button radius">Administrators</a></li>
            </ul>
        </div>
        <hr/>
    </div>
</div>