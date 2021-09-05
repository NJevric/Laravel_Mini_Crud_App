<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{route('home.index')}}">CRUD App</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
      
          @foreach($menu as $m)
            <li class="nav-item">
              <a class="nav-link" href="{{route($m['route'])}}">{{$m["name"]}}</a>
            </li>
          @endforeach
          
         
         

          @if(session()->has('user'))
          <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>
            @else
            <form action="{{route('login')}}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" class="btn btn-primary" value="Login" >
          </form>
          @endif
        </ul>
      </div>
    </div>
  </nav>
