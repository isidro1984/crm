@extends('layout.app')

@section('title', 'Page Title')

@section('content')
	<div class="row home-menu">
	    <div class="card">
	    	<a href="{{ route('clients.index' )}}">
		 	 <img class="card-img-top" src="./img/client.jpg" alt="Card image cap">
			</a>
		  <div class="card-body">
		    <h5 class="card-title">Clients</h5>
		    <p class="card-text">List of our fellow clients</p>
		    <a href="{{ route('clients.index' )}}" class="btn btn-primary"> List</a>
		  </div>
		</div>
		<div class="card">
		  <a href="{{ route('transactions.index' )}}">
		  	<img class="card-img-top" src="./img/transactions.jpg" alt="Card image cap">
		  </a>
		  <div class="card-body">
		    <h5 class="card-title">Transactions</h5>
		    <p class="card-text">List of the transactions</p>
		    <a href="{{ route('transactions.index' )}}" class="btn btn-primary">List</a>
		  </div>
		</div>
	</div>
@endsection