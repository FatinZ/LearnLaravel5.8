@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>{{ $customer->name }}</h1>
        <a class="btn btn-outline-success mb-3" href="{{ route('customers.edit', ['customer' => $customer]) }}" role="button">Edit Customer</a>

        <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-outline-danger mb-3">Delete Customer</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <p><strong>Name: </strong>{{ $customer->name }}</p>
        <p><strong>Email: </strong>{{ $customer->email }}</p>
        <p><strong>Company: </strong>{{ $customer->company->name }}</p>
    </div>
</div>

@if ($customer->image)
    <div class="row">
        <div class="col-12">
            <img src="{{ asset('storage/' . $customer->image) }}" alt="Profile Picture" class="img-thumbnail rounded">
        </div>
    </div>
@endif
@endsection
