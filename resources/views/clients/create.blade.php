@extends('layout.app')

@section('title', 'Create Client')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left"> 
        	<a class="btn btn-default float-right" href="{{ route('clients.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
            <h2>Add New client</h2>
        </div>        
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
            </div>
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="mail@mail.com">
            </div>
            <div class="form-group">
                <strong>Avatar: <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Minimum Dimensions: 100x100px and Maximum Size: 2MB"></i></strong>
                <input type="file" name="avatar" class="form-control-file">
            </div>
        </div>       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
        </div>
    </div>

    <div class="row">
    	<div class="container-back float-right">
           
        </div>
    </div>
   
</form>
@endsection