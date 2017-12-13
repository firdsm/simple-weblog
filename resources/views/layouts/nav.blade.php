<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">My Daily Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="/post/create">Create New Post</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="">{{ Auth::user()->name }}</a>
        </li>      
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>