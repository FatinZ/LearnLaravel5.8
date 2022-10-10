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
        <form action="{{ route('customers.store') }}" method="POST" class="pb-3" id="addCust" enctype="multipart/form-data">
            @include('customers.form')

            <button type="submit" class="btn btn-outline-success" id="btnSubmit">Add Customer</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#addCust').submit(function() {
        var btn = $(this).find('#btnSubmit');
        btn.prop('disabled', true);
        btn.prop("class", "btn btn-success");
        btn.html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...'
        );
    });
</script>
@endsection
