<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MTS RentalApp</title>

    <link href="/css/app.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
     {! HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css') !}
    {! HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')!} 
    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css"> -->
    <!-- Add custom CSS here -->
    {! HTML::style('css/blog-home.css') !}
    {! HTML::style('css/blog-post.css') !}

   <link rel='stylesheet' href='/css/header.css' type='text/css'>  
   <!-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> -->
  <link href="/css/app.css" rel="stylesheet">
  

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  
  <link rel='stylesheet' href='/css/header.css' type='text/css'> 
  <!-- <link rel='stylesheet' href='/css/navigation.css' type='text/css'>  -->
   <link rel='stylesheet' href='/css/default.css' type='text/css'>  
        
    </head>

    
  <body>
    
      <section> 
        @include('partials.admin_nav')  
        </section> 

        <section> 
            @include('partials.header')  
        </section>

        



    <div class="container">
      <div class="row">
        <div class="col-lg-12">

        

        @yield('content')
        </div>
        
        
      </div>
      
      <hr>
      
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Company 2013 &middot; Facebook &middot; Twitter &middot; Google+</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 
    <script src="/js/script.js"></script>


   <!--  {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}} -->
    <!-- {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js')}} -->
   <!--  {{ HTML::script('/ckeditor/ckeditor.js')}} -->
  </body>
</html>
