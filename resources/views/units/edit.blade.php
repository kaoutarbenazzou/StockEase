@extends('dashboard.body.main')

@section('content')
<!-- BEGIN: Header -->
<header class="page-header   pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        🖋️ Edit Unit
                    </h1>
                </div>
            </div>






            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">📉 Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('units.index') }}">🖇️ Units</a></li>
                    <li class="breadcrumb-item active">🖋️ Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('units.update', $unit->slug) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">

            <div class="col-xl-12">
                <!-- BEGIN: Unit Details -->
                <div class="card mb-4">
                    <div class="card-header" style="color: black;">
                        Unit Details
                    </div>
                    <div class="card-body">
                        <!-- Form Group (name) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Unit Name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name', $unit->name) }}" autocomplete="off" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Submit button -->
                        <button class="btn btn-success" type="submit">✅ Update</button>
                        <a class="btn btn-outline-danger" href="{{ route('units.index') }}">❌ Cancel</a>
                    </div>
                </div>
                <!-- END: Unit Details -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->

<script>
    // Slug Generator
    const title = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });
</script>
@endsection
