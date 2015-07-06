       @include('partials/header')
    <body>
      @include('partials/main_nav')
      @include('partials/header-original')
     
          @if (Session::has('message'))
           <section id="main-content" class="warning clearfix">
              <p class="alert">{{ Session::get('message') }}</p>
           </section><!-- /main-content -->
          @endif
           @if($errors->has())
            <div id="form-errors"><!-- form-errors -->
                <p>The following errors have occurred:</p>
                <ul>
                   @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
                </ul>
            </div><!-- /form-errors -->
          @endif
      </section>
  <div class ='container'> 
  @yield('content')
  </div>
    <section>   
       @include('partials/footer')
       @include('partials/scripts')
       </section>
    </body>
</html>