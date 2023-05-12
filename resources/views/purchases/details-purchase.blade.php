@extends('dashboard.body.main')

@section('content')

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        👀 View Purchase Details
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="container-xl px-4">
    <div class="row">

        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header" style="color: black;">
                    Information About Supplier
                </div>
                <div class="card-body">
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1">Name:</label>
                            <div class="form-control form-control-solid">{{ $purchase->supplier->name }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1">Phone:</label>
                            <div class="form-control form-control-solid">{{ $purchase->supplier->phone }}</div>
                        </div>
                    </div>
                  
                    <div class="row gx-3 mb-3">
                        
                        <div class="col-md-6">
                            <label class="small mb-1">Email:</label>
                            <div class="form-control form-control-solid">{{ $purchase->supplier->email }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1">Purchase ID:</label>
                            <div class="form-control form-control-solid">{{ $purchase->purchase_no }}</div>
                        </div>
                    </div>
                    <!-- Form Row -->
                    <div class="row gx-3 mb-3">
                       
                        <div class="col-md-6">
                            <label class="small mb-1">Order Date:</label>
                            <div class="form-control form-control-solid">{{ $purchase->purchase_date }}</div>
                        </div>
                        
                        <!-- Form Group (paid amount) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Total (MAD):</label>
                            <div class="form-control form-control-solid">{{ $purchase->total_amount }}</div>
                        </div>
                    </div>
                    <!-- Form Row -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (due amount) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Created By:</label>
                            <div class="form-control form-control-solid">{{ $purchase->user_created->name }}</div>
                        </div>
                        <!-- Form Group (paid amount) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Updated By:</label>
                            <div class="form-control form-control-solid">{{ $purchase->user_updated ? $purchase->user_updated->name : '-' }}</div>
                        </div>
                    </div>
                    <!-- Form Group (address) -->
                    <div class="mb-3">
                        <label  class="small mb-1">Address</label>
                        <div class="form-control form-control-solid">{{ $purchase->supplier->address }}</div>
                    </div>

                    @if ($purchase->purchase_status == 0)
                    <form action="{{ route('purchases.updatePurchase') }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $purchase->id }}">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to procced to approve this purchase?')">Approve Purchase ✔️</button>
                        <a class="btn btn-outline-danger" href="{{ URL::previous() }}">Back 🔙</a>
                    </form>
                    @else
                    <a class="btn btn-outline-danger" href="{{ URL::previous() }}">Back 🔙</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- END: Information Supplier -->


        <!-- BEGIN: Table Product -->
        <div class="col-xl-12">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">List Product</div>

                <div class="card-body">
                    <!-- BEGIN: Products List -->
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Code</th>
                                        <th scope="col">Current Stock</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchaseDetails as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration  }}</td>
                                        <td scope="row">
                                            <div style="max-height: 80px; max-width: 80px;">
                                                <img class="img-fluid"  src="{{ $item->product->product_image ? asset('storage/products/'.$item->product->product_image) : asset('assets/img/products/default.webp') }}">
                                            </div>
                                        </td>
                                        <td scope="row">{{ $item->product->product_name }}</td>
                                        <td scope="row">{{ $item->product->product_code }}</td>
                                        <td scope="row">{{ $item->product->stock }}</span></td>
                                        <td scope="row">{{ $item->quantity }}</span></td>
                                        <td scope="row">{{ $item->unitcost }}</td>
                                        <td scope="row">
                                            <span  class="btn btn-warning">{{ $item->total }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END: Products List -->
                </div>
            </div>
        </div>
        <!-- END: Table Product -->
    </div>
</div>
<!-- END: Main Page Content -->
@endsection
