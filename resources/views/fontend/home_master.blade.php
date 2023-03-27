<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HBLCO Online News</title>
        

        <link href="{{ asset('fontend') }}/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('fontend') }}/assets/css/menu.css" rel="stylesheet">
        <link href="{{ asset('fontend') }}/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('fontend') }}/assets/css/font-awesome.css" rel="stylesheet">
        <link href="{{ asset('fontend') }}/assets/css/responsive.css" rel="stylesheet">
        <link href="{{ asset('fontend') }}/assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="{{ asset('fontend') }}/assets/style.css" rel="stylesheet">

    </head>
    <body>
        
@include('fontend.body.header')
	
@yield('content')

@include('fontend.body.footer')
	
			
		<script src="{{ asset('fontend') }}/assets/js/jquery.min.js"></script>
		<script src="{{ asset('fontend') }}/assets/js/bootstrap.min.js"></script>
		<script src="{{ asset('fontend') }}/assets/js/main.js"></script>
		<script src="{{ asset('fontend') }}/assets/js/owl.carousel.min.js"></script>
	</body>
</html> 