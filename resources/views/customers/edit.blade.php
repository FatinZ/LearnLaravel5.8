@extends('layout')

@section('title', 'Edit Customer Details')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>{{ $customer->name }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form action="{{ url('/customers\/') . $customer->id }}" method="POST" class="pb-3">
            @method('PATCH')
            @include('customers.form')

            <button type="submit" class="btn btn-outline-success">Save Customer</button>
        </form>
    </div>
</div>
@endsection
