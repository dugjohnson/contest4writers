<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/css/foundation.css" />
		<script src="/js/vendor/modernizr.js"></script>
		<link href='/css/app.css' rel='stylesheet' type='text/css'>

	</head>
	<body>

	<div class="row">
		<div class="large-12 columns">
			<div class="nav-bar right">
				<ul class="button-group">
					<li><a href="#" class="button">Link 1</a></li>
					<li><a href="#" class="button">Link 2</a></li>
					<li><a href="#" class="button">Link 3</a></li>
					<li><a href="#" class="button">Link 4</a></li>
				</ul>
			</div>
			<h3>RWA® Mystery/Suspense Chapter presents</h3>
			<h1>The Daphne du Maurier Award</h1>
			<h2>FOR EXCELLENCE IN MYSTERY/SUSPENSE</h2>
			<hr/>
		</div>
	</div>


	<div class="row">


		<div class="large-9 columns" role="content">

			<article>

				<div class="container">
					<div class="content">
						@yield('content')
						<div class="quote">{{ Inspiring::quote() }}</div>
					</div>
				</div>

			</article>

			<hr/>

		</div>

		<aside class="large-3 columns">

			<h5>Categories</h5>
			<ul class="side-nav">
				<li><a href="#">News</a></li>
				<li><a href="#">Code</a></li>
				<li><a href="#">Design</a></li>
				<li><a href="#">Fun</a></li>
				<li><a href="#">Weasels</a></li>
			</ul>

			<div class="panel">
				<h5>Featured</h5>
				<p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p>
				<a href="#">Read More →</a>
			</div>

		</aside>


	</div>






	<footer class="row">
		<div class="large-12 columns">
			<hr/>
			<div class="row">
				<div class="large-6 columns">
					<p>© Copyright no one at all. Go to town.</p>
				</div>
				<div class="large-6 columns">
					<ul class="inline-list right">
						<li><a href="#">Link 1</a></li>
						<li><a href="#">Link 2</a></li>
						<li><a href="#">Link 3</a></li>
						<li><a href="#">Link 4</a></li>
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
