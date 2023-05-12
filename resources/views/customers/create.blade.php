@extends('dashboard.body.main')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<header class="page-header  pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        🆕 Add New Customer
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">📉 Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">👥 Customers</a></li>
                    <li class="breadcrumb-item active">🆕 Create</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header" style="color: black;">Profile Picture</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />
                  
                        <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 2 MB</div>
                        
                        <input class="form-control form-control-solid mb-2 @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header" style="color: black;">
                        Customer Details
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="small mb-1" for="name"> <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Enter cutomer's full name." value="{{ old('name') }}" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email"> <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="Enter cutomer's email address." value="{{ old('email') }}" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Form Row -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone"> <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" placeholder="Enter cutomer's phone number" value="{{ old('phone') }}" />
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Form Group (bank name) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="bank_name">Select Bank Name</label>
                                <select class="form-select form-control-solid @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                    <option selected="" disabled="">Select a bank:</option>
                                    <option value=" BMCE" @if(old('bank_name') == ' BMCE')selected="selected"@endif>BMCE</option>
                                    <option value="BP" @if(old('bank_name') == 'BP')selected="selected"@endif>BP</option>
                                    <option value="BMCI" @if(old('bank_name') == 'BMCI')selected="selected"@endif>BMCI</option>
                                    <option value="CIH" @if(old('bank_name') == 'CIH')selected="selected"@endif>CIH</option>
                                    <option value="Other" @if(old('bank_name') == 'Other')selected="selected"@endif>Other</option>
                                </select>
                                @error('bank_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Form Row -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (account holder) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="account_holder"> Bank Account Holder</label>
                                <input class="form-control form-control-solid @error('account_holder') is-invalid @enderror" id="account_holder" name="account_holder" type="text" placeholder="Enter Name" value="{{ old('account_holder') }}" />
                                @error('account_holder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Form Group (account_name) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="account_number">Bank Account Number</label>
                                <input class="form-control form-control-solid @error('account_number') is-invalid @enderror" id="account_number" name="account_number" type="text" placeholder="" value="{{ old('account_number') }}" />
                                @error('account_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Form Group (address) -->
                        <div class="mb-3">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-solid @error('address') is-invalid @enderror" id="address" name="address" rows="2">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <!-- Submit button -->
                        <button class="btn btn-success" type="submit">➕ Add New Customer</button>
                        <a class="btn btn-outline-danger" href="{{ route('customers.index') }}"> ❌ Cancel </a>
                    </div>
                </div>
                <!-- END: Customer Details -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->
@endsection
