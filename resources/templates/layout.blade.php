<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/foundation.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script src="/js/vendor/modernizr.js"></script>
    <link href='/css/app.css' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="row">
    <div class="large-12 columns">
        <div class="panel radius">
            <a href="/">
                <h3>RWA® Mystery/Suspense Chapter presents</h3>

                <h1>The Daphne du Maurier Award</h1>

                <h2>FOR EXCELLENCE IN MYSTERY/SUSPENSE</h2>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="right">
            @if(Auth::check())
                <a href="/users/{!! Auth::user()->id !!}" class="tiny button radius">Check Your Profile</a>
                <a href="/auth/logout" class="tiny button radius">Log Out</a>
            @else
                <a href="/auth/login" class="tiny button radius">Log In</a>
                <a href="/auth/register" class="tiny button radius">Register</a>
            @endif

        </div>
        <div class="nav-bar">
            <ul class="button-group">
                <li><a href="/entries" class="button radius">Entries</a></li>
                <li><a href="/judges" class="button radius">Judges</a></li>
                @if(false)
                    <li><a href="/coordinators" class="button radius">Coordinators</a></li>
                    <li><a href="/administrators" class="button radius">Administrators</a></li>
                @endif
            </ul>
        </div>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-9 columns" role="content">
        <div class="large-12 columns container">
            <div class="row">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    		<aside class="large-3 columns">
                <div class="row">
                    <div class="content">
                        @yield('sidebar','')
                    </div>
                </div>

            </aside>


</div>

<footer class="row">
    <div class="large-12 columns">
        <hr/>
        <div class="row">
            <div class="large-12 columns container quote">{{ Inspiring::quote() }}</div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <p>©2015 Kiss of Death/RWA Mystery/Romantic Suspense Chapter 144</p>
            </div>
            <!--            <div class="large-6 columns">
                            <ul class="inline-list right">
                                <li><a href="#">Enter</a></li>
                                <li><a href="#">Judge</a></li>
                                <li><a href="#">Coordinate</a></li>
                                <li><a href="#">Administer</a></li>
                            </ul>
                        </div>
            -->
        </div>
    </div>
</footer>
<script>
    $(document).foundation();
</script>

</body>
</html>
