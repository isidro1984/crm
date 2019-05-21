@extends('layout.app')

@section('title', 'Edit Client')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-default float-right" href="{{ route('clients.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
                <h2>Edit Client</h2>                 
            </div>           
        </div>
    </div>
   
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
  
    <form action="{{ route('clients.update',$client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="first_name" value="{{ $client->first_name }}" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" value="{{ $client->last_name }}" class="form-control" placeholder="Name" required>
                </div>
                 <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="mail@mail.com" value="{{ $client->email }}">
                 </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Avatar:<i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Minimum Dimensions: 100x100px and Maximum Size: 2MB"></i></strong>
                    @if ($client->avatar !== '')
                        <img src="/img/avatar/{{ $client->avatar }}" width="80" alt="avatar" title="avatar" class="pull-right avatar avatar-edit"/>
                    @else
                       <img src="/img/avatar/default-avatar.png" width="80" alt="avatar" title="avatar" class="pull-right avatar avatar-edit"/>
                    @endif
                    <div id="unlink-avatar" >
                        <span data-toggle="tooltip" data-placement="bottom" title="Click here if you want to change the current avatar. If you click without wanted, refresh the page without saving"><i class="fas fa-trash-alt" ></i>Change Avatar</span>
                    </div>                   
                    <input id="file-avatar" type="file" name="avatar" value="" class="form-control-file display-none file-avatar" >
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
            </div>
        </div>
   
    </form>
@endsection