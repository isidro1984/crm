@extends('layout.app')

@section('title', 'Page Title')

@section('content')

	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">                           
                @if ($client->avatar !== '')
                       <img src="/img/avatar/{{ $client->avatar }}" width="100" alt="avatar" title="avatar" class="float-right avatar"/>
                 @else
                    <img src="/img/avatar/default-avatar.png" width="100" alt="avatar" title="avatar" class="float-right avatar"/>
                 @endif
                 <h2> Client {{ $client->first_name }} {{ $client->last_name }}</h2>
            </div>
            <div class="clearfix"></div> 
            <div><a class="btn btn-default float-right" href="{{ route('clients.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
            </div>          
        </div>
    </div> 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $client->first_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {{ $client->last_name }}
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">   
            <h4>Transactions</h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" width="5%">#</th>
                  <th scope="col" width="60%">Amount</th>
                  <th scope="col">Created at</th>
                </tr>
              </thead>
              <tbody>    
                @foreach ($transactions as $transaction)
                    <tr>
                      <td scope="row">{{ $transaction->id }}</td> 
                      <td>{{ $transaction->amount }} €</td>                  
                      <td>{{ $transaction->created_at }}</td> 
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">            
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
            </div>
        </div>
    </div> 

@endsection