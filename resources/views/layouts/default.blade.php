<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>   
     {!! HTML::style('css/bootstrap.min.css') !!}
 	{!! HTML::style('css/main.css') !!} 
    {!! HTML::style('css/default.css') !!}
    {!! HTML::style('css/header.css') !!}
    
	<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	
	<link rel='stylesheet' href='/css/header.css' type='text/css'> 
	<!-- <link rel='stylesheet' href='/css/navigation.css' type='text/css'>  -->
	<!--  <link rel='stylesheet' href='/css/default.css' type='text/css'>  --> -->




	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	 <section> 
		@include('partials.main_nav')  
	</section> 

	<section> 
		@include('partials.header-original')  
	</section>

	

	@if(Session::get('flash_message'))
	<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif
	<section> 
	
	</section>
	<div class ='container'> 
	@yield('content')
	</div>
		
	<!-- Scripts -->
	<section>   
       @include('partials/footer')
       @include('partials/scripts')
       
	
</section>
</body>
</html>
