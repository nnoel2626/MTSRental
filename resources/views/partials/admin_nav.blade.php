<nav class="navbar navbar-inverse {{--navbar-fixed-top--}}" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {!! HTML::link('/', 'Home', array('class' => 'navbar-brand')) !!}
          
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
           <li>{!! HTML::linkAction('EquipmentController@index', 'Equipment')  !!}</li>
           <li>{!! HTML::linkAction('CategoriesController@index', 'Categories') !!}</li>
           <li>{!! HTML::linkAction('UserController@index', 'Users') !!}</li>
            <li>{!! HTML::link('logout', 'Logout') !!}</li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
        </nav>