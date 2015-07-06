<div class='header'>
        <div class="jumbotron"> 
          <a href='/'><img class='logo' src='/images/harvard_logo.jpg' alt='Harvard logo'></a>
          <h1 class="title"><strong>MTS</strong></h1> 
          <h1 class="title">Audio Visual Equipment Rental</h1> 
          <div class="line-separator"></div>         
        </div>  
      </div> <!--Header section-->
      <div class="navigation">  
        <section id="cssmenu">         
          <ul class="nav_wapper">
            <li><a href="{{ URL::to('/') }}" class="active">Home</a></li> 
            <li><a href="{{ URL('/admin/equipment/index') }}">Equipment List</a></li>
            <li><a href="{{ URL('/rental/rentEquipment') }}">Rent Equipment</a></li>
            <li><a href="{{ URL('/equipment/returnEquipment') }}">Return Equipment</a></li>
            <li><a href="{{ URL('/equipment/allRentedEquipment') }}">All rented Equitment</a></li>
            <li><a href="{{ URL('/equipment/studentSoundSystem') }}">Student Sound System</a></li>
            <li><a href="{{ URL('http://ims.fas.harvard.edu/services/rental/equipment.html') }}">price list</a></li> 
          </ul>
        </section> <!--navigation section-->  





        <div class="navigation">   
  <section id="cssmenu">   
  <ul class="nav_wapper">
  <li><a href="{{ URL::to('/') }}" class="active">Home</a></li>
  <li><a href="{{ URL('/equipment/index') }}">Equipment Categories</a></li>
  <li><a href="{{ URL('/equipment/rentEquipment')}}">Rent Equipment</a></li>
  <li><a href="{{ URL('/equipment/returnEquipment')}}">Return Equipment</a></li>
  <li><a href="{{ URL('/equipment/allRentedEquitment')}}">All rented Equitment</a></li>
  <li><a href="{{ URL('/equipment/priceList')}}">Price list</a></li> 
  <li><a href="{{ URL('/equipment/contact')}}">Contact US</a></li> 
  </ul>
  </div> 