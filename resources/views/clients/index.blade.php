@extends('layout.app')

@section('title', 'Page Title')

@section('content')

	<div class="row clients-list">
		@if(session()->has('success'))
		    <div class="col-md-12">
		    	<div class="alert alert-success">
		        	{{ session('success') }}
		        </div>
			</div>
		@endif
		<h2>Clients list <a href="{{ route('clients.create') }}"><span><i class="fas fa-plus" title="Add"></i></span></a></h2>
	    <table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First Name</th>
		      <th scope="col">Last Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Avatar</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>		  	
		  	@foreach ($clients as $client)
			    <tr>
			      <td scope="row" width="5%">{{ $client->id }}</td>	
			      <td width="15%">{{ $client->first_name }}</td>			      
			      <td width="15%">{{ $client->last_name }}</td>			      
			      <td width="15%">{{ $client->email }}</td>			      
			      <td width="15%" class="avatar-td">
			      	@if ($client->avatar !== '')
					   <img src="/img/avatar/{{ $client->avatar }}" width="24" alt="avatar" title="avatar"/>
					@else
					<img src="/img/avatar/default-avatar.png" width="24" alt="avatar" title="avatar"/>
					@endif
			      </td>			      
			      <td width="20%">
			      		<form action="{{ route('clients.destroy',$client->id) }}" method="POST">   
                			<a class="btn btn-info btn-sm" href="{{ route('clients.show',$client->id) }}"><i class="fas fa-eye"></i> Show</a>    
                			<a class="btn btn-primary btn-sm" href="{{ route('clients.edit',$client->id) }}"><i class="fas fa-edit"></i> Edit</a>
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
			{{ $clients->links() }}
		</div>
	</div>

@endsection