<!DOCTYPE html>
<html lang="en">
<head>
    <title>S</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/css/bootstrap.min.css') }}">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/css/style.css') }}">
</head>
<body>

<div class="invoice-16 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner-9" id="invoice_wrapper">
                    <div class="invoice-top">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="logo">
                                    <h1>StockEase</h1>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="invoice">
                                    <h1 style="color: black;">Invoice Number: <span> 000 000 045</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-info">
                        <div class="row">
                            <div class="col-sm-6 mb-50">
                                <div class="invoice-number">
                                    <h4 class="inv-title-1">Invoice Issues On:</h4>
                                    <p class="invo-addr-1">
                                        {{ Carbon\Carbon::now()->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-50">
                                <h4 class="inv-title-1">Customer</h4>
                                <p class="inv-from-1">{{ $customer->name }}</p>
                                
                                <p class="inv-from-1">{{ $customer->email }}</p>
                                <p class="inv-from-1">{{ $customer->phone }}</p>
                                <p class="inv-from-2">{{ $customer->address }}</p>
                            </div>
                            <div class="col-sm-6 text-end mb-50">
                                <h4 class="inv-title-1">Stock</h4>
                                <p class="inv-from-1">StockEase</p>
                                <p class="inv-from-1">(+212) 111222333</p>
                                <p class="inv-from-1">StockEase@aui.ma</p>
                                <p class="inv-from-2">AUI, Ifrane, Morocco</p>
                            </div>
                        </div>
                    </div>
                    <div class="order-summary">
                        <div class="table-outer">
                            <table class="default-table invoice-table">
                                <thead>
                                <tr>
                                    <th style="color: darkblue;">Item</th>
                                    <th style="color: darkblue;">Price</th>
                                    <th style="color: darkblue;">Quantity</th>
                                    <th  style="color: darkblue;">Subtotal</th>
                                    <th style="color: darkgreen;">Total</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($carts as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->subtotal }}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td><strong>Subtotal</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>{{ Cart::subtotal() }}</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Tax</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>{{ Cart::tax() }}</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>{{ Cart::total() }}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="invoice-informeshon-footer">
                        <ul>
                            <li><a href="#">www.StockEase.com</a></li>
                            <li><a href="mailto:k.benazzou@aui.ma">StockEase@aui.ma</a></li>
                            <li><a href="tel:+088-01737-133959">+212 111222333</a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="invoice-btn-section clearfix d-print-none">
                    <a class="btn btn-lg btn-danger" href="{{ route('pos.index') }}">
                      ⬅️ Go Back
                    </a>
                    <button class="btn btn-lg btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modal">
                       💳 Pay Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center mx-auto" id="modalCenterTitle">Invoice of {{ $customer->name }}<br/>Total Amount ${{ Cart::total() }}</h3>
            </div>

            <form action="{{ route('pos.createOrder') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                        <div class="mb-3">
                            <!-- Form Group (type of product category) -->
                            <label class="small mb-1" for="payment_type">Select A Payment Method <span class="text-danger">*</span></label>
                            <select class="form-control @error('payment_type') is-invalid @enderror" id="payment_type" name="payment_type">
                                <!-- <option selected="" disabled=""></option> -->
                                <option value="HandCash">Visa</option>
                                <option value="Cheque">MasterCard</option>
                                <option value="Due">WafaCash</option>
                                <option value="Due">Cheque</option>
                            </select>
                            @error('payment_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-lg btn-danger" type="button" data-bs-dismiss="modal">Cancel Payment</button>
                    <button class="btn btn-lg btn-success" type="submit">Confirm Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
