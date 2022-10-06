@extends('layout')

@section('title', 'Contact Us')

@section('content')
<h1>Contact Us</h1>

@if (!session()->has('message'))
    <form action="{{ url('/contact') }}" method="POST" id="contactForm">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        @error('name')
            @include('error_banner', ['message' => $message])
        @enderror

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
        </div>
        @error('email')
            @include('error_banner', ['message' => $message])
        @enderror

        <div class="form-group mb-3">
            <label for="message">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('email') }}</textarea>
        </div>
        @error('message')
            @include('error_banner', ['message' => $message])
        @enderror

        <button type="submit" id="btnSubmit" class="btn btn-outline-success">Send Message</button>
    </form>
@endif
@endsection

@section('script')
<script>
    $('#contactForm').submit(function() {
        var btn = $(this).find('#btnSubmit');
        btn.prop('disabled', true);
        btn.prop("class", "btn btn-success");
        btn.html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...'
        );
    });
</script>
@endsection
