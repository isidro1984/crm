@extends('layout.app')

@section('title', 'Page Title')

@section('content')

	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <a class="btn btn-default float-right" href="{{ route('transactions.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
                <h2>Transaction #{{ $transaction->id }}</h2>
            </div>           
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                {{ $transaction->amount }} €
            </div>
            <div class="form-group">
                <strong>Client:</strong>
                {{ $transaction->client->first_name }} {{ $transaction->client->last_name }}
            </div>
        </div>       
    </div>
@endsection