@csrf
<div class="form-group mb-3">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
</div>
@error('name')
    @include('error_banner', ['message' => $message])
@enderror

<div class="form-group mb-3">
    <label for="email">Email</label>
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
</div>
@error('email')
    @include('error_banner', ['message' => $message])
@enderror

<div class="form-group mb-3">
    <label for="active">Status</label>
    <select name="status" id="status" class="form-select">
        <option disabled selected>Select customer status</option>
        @foreach ($customer->activeOptions() as $keyOption => $valueOption)
            <option value="{{ $keyOption }}" {{ $customer->status == $valueOption ? 'selected' : '' }}>{{ $valueOption }}</option>
        @endforeach
    </select>
</div>
@error('status')
    @include('error_banner', ['message' => $message])
@enderror

<div class="form-group mb-3">
    <label for="company_id">Status</label>
    <select name="company_id" id="company_id" class="form-select">
        <option disabled selected>Select company</option>
        @foreach ($companies as $c)
            <option value="{{ $c->id }}" {{ $c->id == $customer->company_id ? 'selected' : '' }}>{{ $c->name }}</option>
        @endforeach
    </select>
</div>
@error('company_id')
    @include('error_banner', ['message' => $message])
@enderror
