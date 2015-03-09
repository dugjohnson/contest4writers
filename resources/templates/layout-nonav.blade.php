<html  ng-app="app">
@include('head')
<body>

<div class="row">
    <div class="small-12 columns">
        <div class="panel radius">
            <a href="/">
                <p>RWA® Mystery/Suspense Chapter presents: The Daphne du Maurier Award for Excellence in
                    Mystery/Suspense</p>
            </a>
        </div>
        <div class="right">
            @if(Auth::check())
                <a href="/auth/logout" class="tiny button radius">Log Out</a>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns" role="content">
        <div class="large-12 columns container">
            <div class="row">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
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
        </div>
    </div>
</footer>
<script>
    $(document).foundation();
</script>

</body>
</html>
