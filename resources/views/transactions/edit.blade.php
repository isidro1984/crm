@extends('layout.app')

@section('title', 'Edit Transaction')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-default float-right" href="{{ route('transactions.index') }}"><i class="fas fa-chevron-left"></i> Back</a>
                <h2>Edit Transaction</h2>
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
  
    <form action="{{ route('transactions.update',$transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="number" name="amount" value="{{ $transaction->amount }}" class="form-control" placeholder="112 " step="0.01" required>
                </div>
            </div>                      
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Edit</button>
            </div>
        </div>
   
    </form>
@endsection