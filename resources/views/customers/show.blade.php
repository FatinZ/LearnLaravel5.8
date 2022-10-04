@extends('layout')

@section('title', 'Customer Details')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>{{ $customer->name }}</h1>
        <a class="btn btn-outline-success mb-3" href="{{ url('/customers\/') . $customer->id . '/edit' }}" role="button">Edit Customer</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <p><strong>Name: </strong>{{ $customer->name }}</p>
        <p><strong>Email: </strong>{{ $customer->email }}</p>
        <p><strong>Company: </strong>{{ $customer->company->name }}</p>
    </div>
</div>
@endsection
