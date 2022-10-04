@extends('layout')

@section('title', 'Customers List')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Customers</h1>
        {{-- <p><a href="{{ url('/customers/create') }}">Add New Customer</a></p> --}}
        <a class="btn btn-outline-success mb-3" href="{{ url('/customers/create') }}" role="button">Add A Customer</a>
    </div>
</div>

@foreach ($customers as $c)
    <div class="row">
        <div class="col-2">{{ $c->id }}</div>
        <div class="col-4">
            <a href="{{ url('/customers\/') . $c->id }}">{{ $c->name }}</a>
        </div>
        <div class="col-4">{{ $c->company->name }}</div>
        <div class="col-2">{{ $c->status }}</div>
    </div>
@endforeach
@endsection
