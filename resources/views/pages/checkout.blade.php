<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <!-- Meta and Styles -->
    @include('layouts.head')
</head>

<body>
    <div class="site-wrap">
        <!-- Header -->
        @include('layouts.header')

        <!-- Breadcrumb -->
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <a href="{{ url('/') }}">Home</a>
                        <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Checkout</strong>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Main Content -->
        <div class="site-section">
            <div class="container">
                <!-- Alert for returning customers -->
                @if (!Auth::check())
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="bg-light rounded p-3">
                                <p class="mb-0">
                                    Returning customer?
                                    <a href="{{ url('login') }}" class="d-inline-block">Click here</a> to login.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Billing and Order Details -->
                <div class="row">
                    <!-- Billing Details -->
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border">
                            <form method="POST" action="{{ route('checkout.process') }}">
                                @csrf
                                <!-- Country Selection -->
                                <div class="form-group">
                                    <label for="c_country" class="text-black">Country <span
                                            class="text-danger">*</span></label>
                                    <select id="c_country" class="form-control" name="country">
                                        <option value="">Select a country</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="India">India</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Japan">Japan</option>
                                        <option value="China">China</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Russia">Russia</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <!-- Add more countries -->
                                    </select>
                                </div>

                                <!-- Name Fields -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_fname" name="first_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_lname" class="text-black">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_lname" name="last_name">
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="address"
                                        placeholder="Street address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address_optional"
                                        placeholder="Apartment, suite, etc. (optional)">
                                </div>

                                <!-- State and Zip -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_state_country" class="text-black">State / Country <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_state_country"
                                            name="state_country">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_postal_zip" class="text-black">Postal / Zip <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_postal_zip" name="postal_zip">
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_email_address" class="text-black">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="c_email_address"
                                            name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_phone" class="text-black">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_phone" name="phone">
                                    </div>
                                </div>

                                <!-- Order Notes -->
                                <div class="form-group">
                                    <label for="c_order_notes" class="text-black">Order Notes</label>
                                    <textarea name="order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                        placeholder="Write your notes here..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">Place Order</button>
                            </form>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-md-6">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        <th>Status</th> <!-- Added Status Column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td> <!-- Product Name -->
                                                <td>{{ $item->quantity }}</td>
                                                <td>${{ number_format($item->price, 2) }}</td>
                                                <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                                                <td>{{ ucfirst($order->status) }}</td> <!-- Order Status -->
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="5">No orders found.</td>
                                            <!-- Adjusted colspan to 5 to include the new column -->
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Total Orders Count -->
                            <p class="text-dark">Total Orders: <strong>{{ $orders->count() }}</strong></p>

                            {{-- @if (Auth::check())
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed to Payment</button>
                            @else
                                <p class="text-danger">Please log in to place your order.</p>
                            @endif --}}
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
</body>

</html>
