<div class="row">
    <div class="large-12 columns">
        <div class="right">
            @if(Auth::check())
                <a href="/auth/logout" class="tiny button">Log Out</a>
                <a href="/users/{!! Auth::user()->id !!}" class="tiny button">Profile</a>
            @else
                <a href="/auth/login" class="tiny button">Log In</a>
            @endif

            <a href="/auth/register" class="tiny button">Register</a>
        </div>
        <div class="nav-bar">
            <ul class="button-group">
                <li><a href="/entries" class="button">Enter the Competition</a></li>
                <li><a href="/judges" class="button">Be a Judge</a></li>
                <li><a href="/coordinators" class="button">Coordinators</a></li>
                <li><a href="/administrators" class="button">Administrators</a></li>
            </ul>
        </div>
        <hr/>
    </div>
</div>