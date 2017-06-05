<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">OTLOB</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ route('products.getCart') }}">
            <i class="fa fa-shopping-cart"></i> Shopping Cart   
            <span class="badge"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
            </span>
          </a>
        </li>
        @if(auth()->check()) 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>  
          {{auth()->user()->email}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('users.logout') }}">Logout</a></li>
          </ul>
        </li>
        @else        
        <li><a href="{{ route('users.signin') }}"><i class="fa fa-sign-in"></i> Login</a></li>
        <li><a href="{{ route('users.signup') }}"><i class="fa fa-user-plus"></i> Sign up</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>