<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/foundation.css"/>
    <script src="/js/vendor/modernizr.js"></script>
    <link href='/css/app.css' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <h3>RWA® Mystery/Suspense Chapter presents</h3>

            <h1>The Daphne du Maurier Award</h1>

            <h2>FOR EXCELLENCE IN MYSTERY/SUSPENSE</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <div class="right">
            <a href="auth/login" class="tiny button">Log In</a>
            <a href="auth/register" class="tiny button">Register</a>
        </div>
        <div class="nav-bar">
            <ul class="button-group">
                <li><a href="#" class="button">Enter the Competition</a></li>
                <li><a href="#" class="button">Be a Judge</a></li>
                <li><a href="#" class="button">Coordinators</a></li>
                <li><a href="#" class="button">Administrators</a></li>
            </ul>
        </div>
        <hr/>
    </div>
</div>
<div class="row">
    <div class="large-9 columns" role="content">
        <div class="container">
            <div class="content">
                @yield('content')
                <div class="quote">{{ Inspiring::quote() }}</div>
            </div>
        </div>
    </div>

    <!--		<aside class="large-3 columns">

                <h5>Categories</h5>
                <ul class="side-nav">
                    <li><a href="#">News</a></li>
                    <li><a href="#">Code</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Fun</a></li>
                    <li><a href="#">Weasels</a></li>
                </ul>

            </aside>
    -->


</div>

<footer class="row">
    <div class="large-12 columns">
        <hr/>
        <div class="row">
            <div class="large-6 columns">
                <p>©2015 Kiss of Death/RWA Mystery/Romantic Suspense Chapter 144</p>
            </div>
            <div class="large-6 columns">
                <ul class="inline-list right">
                    <li><a href="#">Enter</a></li>
                    <li><a href="#">Judge</a></li>
                    <li><a href="#">Coordinate</a></li>
                    <li><a href="#">Administer</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="/js/vendor/jquery.js"></script>
<script src="/js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>

</body>
</html>
