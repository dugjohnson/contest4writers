<html>
	<head>
		<link href='css/app.css' rel='stylesheet' type='text/css'>

	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Daphne du Maurier Writing Competition</div>
				@yield('content')
				<div class="quote">{{ Inspiring::quote() }}</div>
			</div>
		</div>
	</body>
</html>
