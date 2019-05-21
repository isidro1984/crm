@extends('layout.app')

@section('title', 'Create Client')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-default float-right" href="{{ route('transactions.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
            <h2>Add New transaction</h2>
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
   
<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                <input type="number" name="amount" class="form-control" placeholder="145€" step="0.01">
            </div>             
            <div class="form-group">
                <strong>Client:</strong>
                <select name="client_id" class="form-control">
                    @foreach ($clients->all() as $client)
                        <option value="{{ $client->id }}">{{$client->id }} # {{$client->first_name}} {{$client->last_name}}</option></li>
                    @endforeach
                </select>              
            </div>           
        </div>       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
        </div>
    </div>   
</form>
@endsection