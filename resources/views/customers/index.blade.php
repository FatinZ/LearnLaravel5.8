@extends('layouts.app')

@section('title', 'Customers List')

@section('content')
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Customers</h1>
            @can('create', App\Customer::class)
                <a class="btn btn-outline-success" href="{{ route('customers.create') }}" role="button">Add A Customer</a>
            @endcan
        </div>
    </div>

@foreach ($customers as $c)
    <div class="row">
        <div class="col-2">{{ $c->id }}</div>
        <div class="col-4">
            @can('view', $c)
                <a href="{{ route('customers.show', ['customer' => $c]) }}">{{ $c->name }}</a>
            @endcan

            @cannot('view', $c)
                {{ $c->name }}
            @endcannot
        </div>
        <div class="col-4">{{ $c->company->name }}</div>
        <div class="col-2">{{ $c->status }}</div>
    </div>
@endforeach

<div class="row">
    <div class="col-12 pt-5">
        {{ $customers->links() }}
    </div>
</div>
@endsection
