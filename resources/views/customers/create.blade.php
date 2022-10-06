@extends('layouts.app')

@section('title', 'Add New Customers')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Add Customers</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{ url('/customers') }}" method="POST" class="pb-3">
            @include('customers.form')

            <button type="submit" class="btn btn-outline-success">Add Customer</button>
        </form>
    </div>
</div>
@endsection
