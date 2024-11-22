<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <div class="site-wrap">
        @include('layouts.header')

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <a href="{{ url('/') }}">Home</a>
                        <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Cart</strong>
                    </div>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" method="post" action="{{ url('cart_delete_selected') }}">
                        @csrf
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAll" class="form-check-input"></th>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cartItems as $item)
                                        <tr>
                                            <td><input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="form-check-input"></td>
                                            <td class="product-thumbnail">
                                                @php
                                                    $imagePath = isset($item->product->image) && $item->product->image ? 'images/products/' . $item->product->image : 'templates/images/product_02.png';
                                                @endphp
                                                <img src="{{ asset($imagePath) }}" 
                                                     alt="{{ $item->product->name }}" 
                                                     class="img-fluid">
                                            </td>
                                            
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $item->product->name }}</h2>
                                            </td>
                                            <td>${{ number_format($item->product->price, 2) }}</td>
                                            <td>
                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus" 
                                                                type="button" 
                                                                data-id="{{ $item->id }}">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center" value="{{ $item->quantity }}" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary js-btn-plus" 
                                                                type="button" 
                                                                data-id="{{ $item->id }}">&plus;</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                            <td>
                                                <a href="{{ url('cart_remove', $item->id) }}" class="btn btn-primary height-auto btn-sm">X</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Your cart is empty!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Add a button to delete selected items -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Delete Selected</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <a href="{{ url('/store') }}" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Subtotal</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">
                                            ${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">
                                            ${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-lg btn-block" 
                                                onclick="window.location='{{ url('checkout') }}'">
                                            Proceed To Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>

    @include('layouts.script')

    <script>
        // Select/Deselect all checkboxes functionality
        document.getElementById('selectAll').addEventListener('change', function () {
            let checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = this.checked;
            });
        });
    </script>
</body>

</html>
