 <nav class="navbar navbar-inverse">

    <div class="container-fluid">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="#">MTS Equipment Rental App</a>
      </div>
       
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/') }}">Home</a></li>
           <li><a href="{{ URL('/rental/index') }}">Equipment Categories</a></li>
            <li><a href="{{ URL('/admin/equipment/rentEquipment')}}">Rent Equipment</a></li>
            <li><a href="{{ URL('/admin/equipment/returnEquipment')}}">Return Equipment</a></li>
            <li><a href="{{ URL('/admin/equipment/allRentedEquitment')}}">All rented Equitment</a></li>
            <li><a href="{{ URL('/equipment/priceList')}}">Price list</a></li> 
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
 


             

        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="{{ url('/auth/login') }}">Login</a></li>
            <li><a href="{{ url('/auth/register') }}">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>


 