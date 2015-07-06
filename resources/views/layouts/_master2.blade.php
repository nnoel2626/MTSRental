<!DOCTYPE html>
<html>


<head>
<title>@yield('title','MTS AV Rental')</title> 
<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
<link rel='stylesheet' href='/css/main.css' type='text/css'>
@yield('head') 

</head>

<body>

 @if(Session::get('flash_message'))
<div class='flash-message'>{{ Session::get('flash_message') }}</div> 
@endif


<a><img class='logo' src='/images/harvard_logo.jpg' alt='Harvard logo'></a>

<nav>
<ul>

@if(Auth::check())

<li><a href='/account/logout'>Log out {{ Auth::user()->email; }}</a></li>
<li><a href='/equipment/index'>All equipment</a></li>
<li><a href='/equipment/search'>Search equipment (w/ Ajax)</a></li>
<li><a href='/category/index'>All Categories</a></li>
<li><a href='/equipment/create'>+ Add equipment</a></li>

@else
<li><a href='/account/signup'>Sign up</a> or <a href='/account/login'>Log in</a></li>
@endif
</ul>
</nav>
<a href='https://github.com/nnoel2626/DWA15_NN_P4'>View on Github</a>
@yield('content')

@yield('/body')
</body>
</html>
