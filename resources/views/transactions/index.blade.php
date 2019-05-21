@extends('layout.app')

@section('title', 'Page Title')

@section('content')

	<div class="row transactions-list">
		@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error: </strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    	@endif
    	@if(session()->has('success'))
		    <div class="col-md-12">
		    	<div class="alert alert-success">
		        	{{ session('success') }}
		        </div>
			</div>
		@endif
		<h2>Transactions list <a href="{{ route('transactions.create') }}"><span><i class="fas fa-plus" title="Add"></i></span></a></h2>
	    <table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Client</th>
		      <th scope="col">Amount</th>
		      <th scope="col">Created at</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>		  	
		  	@foreach ($transactions as $transaction)
			    <tr>
			      <td scope="row" width="5%">{{ $transaction->id }}</td>	
			      <td width="25%"><a href="{{ route('clients.show', $transaction->client->id )}}">{{ $transaction->client->first_name }} {{ $transaction->client->last_name }}</a></td>
			      <td width="25%">{{ $transaction->amount }} €</td>			      
			      <td width="15%">{{ $transaction->created_at }}</td>			      
			      <td width="20%">
			      		<form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST">   
                			<a class="btn btn-info btn-sm" href="{{ route('transactions.show',$transaction->id) }}"><i class="fas fa-eye"></i> Show</a>    
                			<a class="btn btn-primary btn-sm" href="{{ route('transactions.edit',$transaction->id) }}"><i class="fas fa-edit"></i> Edit</a>
                			<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fas fa-trash-alt"></i>Delete</button>   
                   			@csrf
                    		@method('DELETE')
            			</form>
            		</td>			      		      
		    	</tr>
			@endforeach
		  </tbody>
		</table>
	</div>
	<div class="row">
		<div class="paginator align-center">
			{{ $transactions->links() }}
		</div>
	</div>
@endsection