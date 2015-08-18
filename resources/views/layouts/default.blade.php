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
	 <link rel='stylesheet' href='/css/navigation.css' type='text/css'>  
	  <link rel='stylesheet' href='/css/default.css' type='text/css'>  --> 




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
		@include('partials.header-original')  
	</section>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">MTS Rental</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ URL('/rental/index') }}">Equipment Categories</a></li>
            		<!-- <li><a href="{{ URL('/admin/equipment/rentEquipment')}}">Rent Equipment</a></li>
            		<li><a href="{{ URL('/admin/equipment/returnEquipment')}}">Return Equipment</a></li> -->
            		
            		<li><a href="{{ URL('/equipment/priceList')}}">Price list</a></li> 
          			<li><a href="{{ url('/contact') }}">Contact</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
                    <li>
                        {!! Form::open(['url'=>'#', 'method'=>'GET', 'class'=>'navbar-form navbar-right']) !!}
                        {!! Form::input('search', 'q' ,'', ['class'=>'form-control', 'placeholder'=>'Search...']) !!}
                        {!! Form::close() !!}
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Cart<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/cart/emptyCart') }}"><span class="glyphicon glyphicon-trash"></span> Empty Cart</a></li>
                            <li>
                                <a href="{{ url('/cart') }}"><span class="glyphicon glyphicon-eye-open"></span>
                                    View Cart
                                    @if(!Auth::user())
                                        <p class="pull-right">{{ Cart::count() }}</p>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </li>
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						<li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
                                
                                <li><a href="{{ url('#') }}"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	

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
