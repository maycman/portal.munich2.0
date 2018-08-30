<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{!! $title !!} - Munich Automotriz</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/content/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/content/bootstrap-toggle.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/content/normalize.css">
    <link rel="stylesheet" type="text/css" href="/assets/content/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/content/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/content/animate.css">
	<link rel="stylesheet" type="text/css" href="/assets/content/index.css">
	<link rel="stylesheet" type="text/css" href="/assets/content/navbar.css">
	<link rel="stylesheet" type="text/css" href="/assets/content/circle.css">
	<link rel="stylesheet" type="text/css" href="/assets/content/mdb.css">
</head>
<body>
	@include("head")
	<section id="wrap">
		@yield("content")
	</section>
	@include("footer")
<script src="/assets/scripts/jquery-3.1.1.slim.min.js" type="text/javascript"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="/assets/scripts/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/scripts/bootstrap-toggle.min.js" type="text/javascript"></script>
<script src="/assets/scripts/moment.js" type="text/javascript"></script>
<script src="/assets/scripts/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="/assets/scripts/index.js" type="text/javascript"></script>
</body>
</html>