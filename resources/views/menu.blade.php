<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"><img src="/img/logo.png" id="logo-header"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @auth
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
      </li>     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clients
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('clients.create') }}"><i class="fas fa-plus"></i> Add</a>          
          <a class="dropdown-item" href="{{ route('clients.index') }}"><i class="fas fa-list-ul"></i> List</a>
        </div>
      </li> 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transactions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('transactions.create') }}"><i class="fas fa-plus"></i> Add</a>          
          <a class="dropdown-item" href="{{ route('transactions.index') }}"><i class="fas fa-list-ul"></i> List</a>
        </div>
      </li>     
    </ul>
    <form method="POST" action="{{ route('logout') }}">
    	@csrf
        @method('POST')
    	<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
	</form>
  </div>
  @endauth
</nav>